<?php
    // Include necessary files for database configuration and essential functions
    require('../inc/db_config.php');
    require('../inc/essentials.php');

    // Ensure the admin is logged in before processing any requests
    adminLogin();
    // Handling request to add a new room
    if (isset($_POST['add_room']))
    {
        // Filter and decode JSON data for features and facilities
        $features = filteration(json_decode($_POST['features']));
        $facilities = filteration(json_decode($_POST['facilities']));

        $frm_data = filteration($_POST);
        $flag = 0;

        // Query to insert room details into the 'rooms' table
        $q1 = "INSERT INTO `rooms` (`name`,`area`,`price`, `quantity`, `adult`, `children`, `description`) VALUES (?,?,?,?,?,?,?)";
        $values =[$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantity'], $frm_data['adult'], $frm_data['children'], $frm_data['desc']];

        // Execute the query and set flag if successful
        if(insert($q1, $values,'siiiiis')){
            $flag = 1;
        }

        // Get the ID of the newly inserted room
        $room_id = mysqli_insert_id($con);

        // Query to insert room facilities into the 'room_facilities' table
        $q2 = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?,?)";
        if ($stmt = mysqli_prepare($con,$q2))
        {
            // Bind and execute the statement for each facility
            foreach ($facilities as $f){
                mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
        }
        else{
            $flag = 0;
            die('query cannot be prepared - insert');
        }

        // Query to insert room features into the 'room_features' table
        $q3 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";
        if ($stmt = mysqli_prepare($con,$q3))
        {
            // Bind and execute the statement for each feature
            foreach ($features as $f){
                mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
        }
        else{
            $flag = 0;
            die('query cannot be prepared - insert');
        }

        // Return success or failure based on the flag
        if($flag){
            echo 1;
        }
        else{
            echo 0;
        }

    }

    // Handle the request to fetch all rooms
    if (isset($_POST['get_all_rooms']))
    {
        // Fetch all rooms from the database
        $res = selectAll('rooms');
        $i=1;

        $data=""; // Initialize an empty string to store HTML data
        // Loop through each room and generate HTML rows
        while($row = mysqli_fetch_assoc($res))
        {
            // Determine the status button based on the room's status
            if($row['status'] == 1){
                $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>Active</button>";
            }
            else{
                $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-warning btn-sm shadow-none'>Inactive</button>";
            }
            // Append the row data to the HTML string
            $data.="
                <tr class= 'align-middle'>
                    <td>$i</td>
                    <td>$row[name]</td>
                    <td>$row[area] sq. ft.</td>
                    <td>
                        <span class= 'badge rounded-pill bg-light text-dark'>
                            Adult: $row[adult]
                        </span><br>
                        <span class= 'badge rounded-pill bg-light text-dark'>
                            Children: $row[children]
                        </span>
                    </td>
                    <td>Rs$row[price]</td>
                    <td>$row[quantity]</td>
                    <td>$status</td>
                    <td>
                        <button type='button' onclick='edit_details($row[id])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                            <i class='bi bi-pencil-square'></i>
                        </button>
                    </td>
                </tr>
            ";
            $i++;
        }
        // Output the generated HTML
        echo $data;
    }

    // Handle the request to fetch details of a specific room
    if (isset($_POST['get_room']))
    {
        $frm_data = filteration($_POST);
        // Fetch room details, features, and facilities from the database
        $res1 = select("SELECT * FROM `rooms` WHERE `id` = ?", [$frm_data['get_room']], 'i');
        $res2 = select("SELECT * FROM `room_features` WHERE `room_id` = ?", [$frm_data['get_room']], 'i');
        $res3 = select("SELECT * FROM `room_facilities` WHERE `room_id` = ?", [$frm_data['get_room']], 'i');

         // Fetch room data and initialize arrays for features and facilities
        $roomdata = mysqli_fetch_assoc($res1);
        $features = [];
        $facilities = [];

        // Loop through each feature and facility and push them to the respective arrays
        if(mysqli_num_rows($res2) > 0)
        {
            while($row = mysqli_fetch_assoc($res2)){
                array_push($features, $row['features_id']);
            }
        }
        if(mysqli_num_rows($res3) > 0)
        {
            while($row = mysqli_fetch_assoc($res3)){
                array_push($facilities, $row['facilities_id']);
            }
        }

        // Combine the data into a single array and encode it into JSON
        $data = ["roomdata" => $roomdata, "features" => $features,"facilities" => $facilities];

        $data = json_encode($data);
        echo $data;
    }

    // Handle the request to edit a room
    if (isset($_POST['edit_room']))
    {
        // Filter and decode JSON data for features and facilities
        $features = filteration(json_decode($_POST['features']));
        $facilities = filteration(json_decode($_POST['facilities']));

        $frm_data = filteration($_POST);
        $flag = 0;

        // Query to update room details in the 'rooms' table
        $q1 = "UPDATE `rooms` SET `name` = ?, `area` = ?, `price` = ?, `quantity` = ?, `adult` = ?, `children` = ?, `description` = ? WHERE `id` = ?";
        $values =[$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantity'], $frm_data['adult'], $frm_data['children'], $frm_data['desc'], $frm_data['room_id']];

        // Execute the query and set flag if successful
        if(update($q1, $values, 'siiiiisi')){
            $flag = 1;
        }

        // Delete existing room features and facilities 
        $del_features = delete("DELETE FROM `room_features` WHERE `room_id` = ?", [$frm_data['room_id']], 'i');
        $del_facilities = delete("DELETE FROM `room_facilities` WHERE `room_id` = ?", [$frm_data['room_id']], 'i');

        // Check if deletion was successful
        if (!($del_facilities && $del_features)){
            $flag = 0;
        }

        // Query to insert updated room facilities into the 'room_facilities' table
        $q2 = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?,?)";
        if ($stmt = mysqli_prepare($con,$q2))
        {
            // Bind and execute the statement for each facility
            foreach ($facilities as $f){
                mysqli_stmt_bind_param($stmt, 'ii', $frm_data['room_id'], $f);
                mysqli_stmt_execute($stmt);
            }
            $flag = 1;
            mysqli_stmt_close($stmt);
        }
        else{
            $flag = 0;
            die('query cannot be prepared - insert');
        }

        // Query to insert updated room features into the 'room_features' table
        $q3 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";
        if ($stmt = mysqli_prepare($con,$q3))
        {
            // Bind and execute the statement for each feature
            foreach ($features as $f){
                mysqli_stmt_bind_param($stmt, 'ii', $frm_data['room_id'], $f);
                mysqli_stmt_execute($stmt);
            }
            $flag = 1;
            mysqli_stmt_close($stmt);
        }
        else{
            $flag = 0;
            die('query cannot be prepared - insert');
        }

        // Return success or failure based on the flag
        if($flag){
            echo 1;
        }
        else{
            echo 0;
        }
    }


    // Handle the request to toggle the status of a room
    if (isset($_POST['toggle_status']))
    {
        
        $frm_data = filteration($_POST);

        // Query to update the status of a room
        $q = "UPDATE `rooms` SET `status` = ? WHERE `id` = ?";
        $v = [$frm_data['value'], $frm_data['toggle_status']];

        // Execute the query and return success or failure
        if(update($q, $v, 'ii')){
            echo 1;
        }
        else{
            echo 0;
        }
    }

?>