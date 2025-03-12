<?php 

// Function to ensure admin login and session management
function adminLogin() {
    session_start(); // Start a new or resume an existing session

    // Check if admin is logged in; if not, redirect to the login page
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        echo "<script>
            window.location.href='index.php';
        </script>";
    }

    // Regenerate session ID to prevent session fixation attacks
    session_regenerate_id(true);
}

// Function to redirect to a specified URL
function redirect($url) {
    echo "<script>
        window.location.href='$url';
    </script>";
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

?>
