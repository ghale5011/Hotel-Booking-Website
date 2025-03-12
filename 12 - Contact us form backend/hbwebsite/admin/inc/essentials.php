<?php

//frontend purposes data

define('SITE_URL', 'http://127.0.0.1/hbwebsite/'); // Define the site URL
define('ABOUT_IMG_PATH', SITE_URL.'images/about/') ; // Define the path to About images
define('CAROUSEL_IMG_PATH', SITE_URL.'images/carousel/') ; // Define the path to Carousel images


//backend upload process needs the data
define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/hbwebsite/images/'); // Define the path to upload images
define('ABOUT_FOLDER', 'about/');
define('CAROUSEL_FOLDER', 'carousel/');

// Function to ensure admin login and session management
function adminLogin() {
    session_start(); // Start a new or resume an existing session

    // Check if admin is logged in; if not, redirect to the login page
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        echo "<script>
            window.location.href='index.php';
        </script>";
        exit; // Stop further execution of the script
    }
}

// Function to redirect to a specified URL
function redirect($url) {
    echo "<script>
        window.location.href='$url';
    </script>";
    exit;
}

// Function to display alert messages
// Parameters:
// $type: Type of alert ('success' or any other value for 'danger')
// $msg: The message to display
function alert($type, $msg) {
    // Determine the Bootstrap class for the alert based on the type
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";

    // Display the alert message with a close button
    echo <<<alert
        <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">$msg</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    alert;
}

// Function to upload an image
function uploadImage($image, $folder) {
    $valid_mime = ['image/jpeg', 'image/png', 'image/webp']; // Define valid image MIME types
    $img_mime = $image['type']; // Get the MIME type of the uploaded image

    // Check if the uploaded file has a valid MIME type
    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_image'; // Invalid image MIME or format
    }
    // Check if the file size is greater than 2MB
    else if (($image['size'] / (1024 * 1024)) > 2) {
        return 'inv_size'; // Invalid size greater than 2MB
    }
    else {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION); // Get the extension of the uploaded image
        $rname = 'IMG_' . random_int(11111, 99999) . ".$ext"; // Generate a random name for the image

        $img_path = UPLOAD_IMAGE_PATH . $folder .$rname; // Define the full path to save the image

        // Move the uploaded file to the destination folder
        if (move_uploaded_file($image['tmp_name'], $img_path)) {
            return $rname; // Return the name of the uploaded image
        }
        else {
            return 'upd_failed'; // Return an error message if the image could not be uploaded
        }
    }
}

// Function to delete an image
function deleteImage($image, $folder)
{
    if(unlink(UPLOAD_IMAGE_PATH.$folder.$image)){
        return true; // Return true if the image is deleted successfully
        }else {
        return false; // Return false if the image could not be deleted successfully
    }
}

?>