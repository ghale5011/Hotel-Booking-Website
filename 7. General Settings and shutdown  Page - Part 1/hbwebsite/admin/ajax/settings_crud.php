<?php
require('../inc/db_config.php'); // Include database configuration
require('../inc/essentials.php'); // Include essential functions

adminLogin(); // Ensure the admin is logged in before processing requests

// Fetch General Settings
if (isset($_POST['get_general'])) {
    $q = "SELECT * FROM `settings` WHERE `sr_no` = ?";
    $values = [1];
    $res = select($q, $values, "i");
    $data = mysqli_fetch_assoc($res);
    echo json_encode($data); // Return settings data as JSON
} 

// Update General Settings
if (isset($_POST['upd_general'])) {
    $frm_data = filteration($_POST); // Sanitize input data

    $q = "UPDATE `settings` SET `site_title` = ?, `site_about` = ? WHERE `sr_no` = ?";
    $values = [$frm_data['site_title'], $frm_data['site_about'], 1]; 
    $res = update($q, $values, 'ssi'); // Execute update query
    echo $res; // Return update status
}

// Toggle Website Shutdown Mode
if (isset($_POST['upd_shutdown'])) {
    $frm_data = ($_POST['upd_shutdown'] == 0) ? 1 : 0; // Toggle shutdown value

    $q = "UPDATE `settings` SET `shutdown` = ? WHERE `sr_no` = ?";
    $values = [$frm_data, 1]; 
    $res = update($q, $values, 'ii'); // Execute update query
    echo $res; // Return update status
}
?>
