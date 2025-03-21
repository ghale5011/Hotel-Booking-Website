<?php
// Ensure the admin is logged in before accessing settings
require('inc/essentials.php'); // Include essential functions
require('inc/db_config.php'); // Include database configuration
adminLogin(); // Check if the admin is logged in
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Rooms</title>
    <!-- Include necessary stylesheets and scripts -->
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">

<!-- Include the navigation header -->
<?php require('inc/header.php'); ?>

<!-- Main Content Section -->
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-4">ROOMS</h3>

            <!-- Rooms Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="text-end mb-4">
                        <!-- Button to open the modal for adding a new room -->
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                            <i class="bi bi-file-plus"></i> Add
                        </button>
                    </div>

                    <!-- Table to display rooms -->
                    <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                        <table class="table table-hover border text-center">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">Guests</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <!-- Rooms data will be dynamically inserted here -->
                            <tbody id="room-data">
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Add room Modal -->
<div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Form for adding a new feature -->
        <form id="add_room_form" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Room</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="name" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Area</label>
                            <input type="number" min="1" name="area" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Price</label>
                            <input type="number" min="1" name="price" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Quantity</label>
                            <input type="number" min="1" name="quantity" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Adult (Max.)</label>
                            <input type="number" min="1" name="adult" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Children (Max.)</label>
                            <input type="number" min="1" name="children" class="form-control shadow-none" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Features</label>
                            <div class="row">
                                <?php 
                                // Fetch all features from the database
                                    $res = selectAll('features' );
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo"
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Facilities</label>
                            <div class="row">
                                <?php 
                                // Fetch all facilities from the database
                                    $res = selectAll('facilities' );
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo"
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- Buttons to Cancel or Submit Changes -->
                    <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit room Modal -->
<div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Form for adding a new feature -->
        <form id="edit_room_form" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Room</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="name" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Area</label>
                            <input type="number" min="1" name="area" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Price</label>
                            <input type="number" min="1" name="price" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Quantity</label>
                            <input type="number" min="1" name="quantity" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Adult (Max.)</label>
                            <input type="number" min="1" name="adult" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Children (Max.)</label>
                            <input type="number" min="0" name="children" class="form-control shadow-none" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Features</label>
                            <div class="row">
                                <?php 
                                // Fetch all features from the database
                                    $res = selectAll('features' );
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo"
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }

                                ?>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Facilities</label>
                            <div class="row">
                                <?php 
                                // Fetch all facilities from the database
                                    $res = selectAll('facilities' );
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo"
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }

                                ?>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="desc" rows="3" class="form-control shadow-none" required></textarea>
                        </div>
                        <input type="hidden" name="room_id">
                    </div>
                </div>
                
                <div class="modal-footer">
                    <!-- Buttons to Cancel or Submit Changes -->
                    <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>
</div>



<!-- Include scripts -->
<?php require('inc/scripts.php'); ?>
<script>
    let add_room_form = document.getElementById('add_room_form');

    // Event listener for submitting the add room form
    add_room_form.addEventListener('submit', function(e) {
        e.preventDefault();
        add_room();
    });

    // Function to add a new room
    function add_room()
    {
        let data = new FormData();
        data.append('add_room', '');
        data.append('name', add_room_form.elements['name'].value);
        data.append('area', add_room_form.elements['area'].value);
        data.append('price', add_room_form.elements['price'].value);
        data.append('quantity', add_room_form.elements['quantity'].value);
        data.append('adult', add_room_form.elements['adult'].value);
        data.append('children', add_room_form.elements['children'].value);
        data.append('desc', add_room_form.elements['desc'].value);

        let features = [];
         // Collect selected features
        add_room_form.elements['features'].forEach(el =>{
            if (el.checked) {
                features.push(el.value);
            }
        });

        let facilities = [];
        // Collect selected facilities
        add_room_form.elements['facilities'].forEach(el =>{
            if (el.checked) {
                facilities.push(el.value);
            }
        });

        data.append('features', JSON.stringify(features));
        data.append('facilities', JSON.stringify(facilities));

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('add-room');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('success', 'New room added!');
                add_room_form.reset();
                get_all_rooms();
            } else {
                alert('error', 'Server Down!');
            }
        }
        xhr.send(data);
    }
    // Function to fetch all rooms and display them in the table
    function get_all_rooms()
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('room-data').innerHTML = this.responseText;
        }
        
        xhr.send('get_all_rooms');
    }

    let edit_room_form = document.getElementById('edit_room_form');

    // Function to fetch room details and display them in the edit form
    function edit_details(id)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            let data = JSON.parse(this.responseText);
            edit_room_form.elements['name'].value = data.roomdata.name;
            edit_room_form.elements['area'].value = data.roomdata.area;
            edit_room_form.elements['price'].value = data.roomdata.price;
            edit_room_form.elements['quantity'].value = data.roomdata.quantity;
            edit_room_form.elements['adult'].value = data.roomdata.adult;
            edit_room_form.elements['children'].value = data.roomdata.children;
            edit_room_form.elements['desc'].value = data.roomdata.description;
            edit_room_form.elements['room_id'].value = data.roomdata.id;

            // Check the features and facilities that are already assigned to the room
            edit_room_form.elements['features'].forEach(el => {
                if (data.features.includes(Number(el.value))) {
                    el.checked = true;
                }
            });

            edit_room_form.elements['facilities'].forEach(el => {
                if (data.facilities.includes(Number(el.value))) {
                    el.checked = true;
                }
            });
        }      
        
        xhr.send('get_room='+id);     
    }

    // Event listener for submitting the edit room form
    edit_room_form.addEventListener('submit', function(e) {
        e.preventDefault();
        submit_edit_room();
    });

    // Function to submit the edited room details
    function submit_edit_room()
    {
        let data = new FormData();
        data.append('edit_room', '');
        data.append('room_id', edit_room_form.elements['room_id'].value);
        data.append('name', edit_room_form.elements['name'].value);
        data.append('area', edit_room_form.elements['area'].value);
        data.append('price', edit_room_form.elements['price'].value);
        data.append('quantity', edit_room_form.elements['quantity'].value);
        data.append('adult', edit_room_form.elements['adult'].value);
        data.append('children', edit_room_form.elements['children'].value);
        data.append('desc', edit_room_form.elements['desc'].value);

        let features = [];
        edit_room_form.elements['features'].forEach(el =>{
            if (el.checked) {
                features.push(el.value);
            }
        });

        let facilities = [];
        edit_room_form.elements['facilities'].forEach(el =>{
            if (el.checked) {
                facilities.push(el.value);
            }
        });

        data.append('features', JSON.stringify(features));
        data.append('facilities', JSON.stringify(facilities));

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('edit-room');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('success', 'Room data edited!');
                edit_room_form.reset();
                get_all_rooms();
            } else {
                alert('error', 'Server Down!');
            }
        }
        xhr.send(data);
    }

    // Function to toggle the status of a room (active/inactive)
    function toggle_status(id,val)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function() {
            if(this.responseText==1){
                alert('success', 'Status toggled!');
                get_all_rooms();
            }
            else{
                alert('error', 'Server Down!');
            }
        }
        xhr.send('toggle_status='+id+'&value='+val);
    }

    // Fetch all rooms when the page loads
    window.onload = function() {
        get_all_rooms();
    }


</script>

</body>
</html>