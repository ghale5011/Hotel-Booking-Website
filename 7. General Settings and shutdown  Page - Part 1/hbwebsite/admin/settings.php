<?php
require('inc/essentials.php');
adminLogin(); // Ensure the admin is logged in before accessing settings
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Settings</title>
    <?php require('inc/links.php'); ?> <!-- Include necessary stylesheets and scripts -->
</head>

<body class="bg-light">

<?php require('inc/header.php'); ?> <!-- Include the navigation header -->

<!-- Main Content Section -->
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-4">SETTINGS</h3>

            <!-- General Settings Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">General Settings</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                    </div>
                    
                    <!-- Display General Settings Data -->
                    <h6 class="card-subtitle mb-1 fw-bold">Side Title</h6>
                    <p class="card-text" id="site_title"></p>
                    <h6 class="card-subtitle mb-1 fw-bold">About us</h6>
                    <p class="card-text" id="site_about"></p>
                </div>
            </div>

            <!-- Modal for Editing General Settings -->
            <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog"> 
                    <form>
                        <div class="modal-content">
                            <div class="modal-header">  
                                <h5 class="modal-title">General Settings</h5>
                            </div>
                            <div class="modal-body">
                                <!-- Input Fields for Site Title and About Us -->
                                <div class="mb-3">
                                    <label class="form-label">Side Title</label>
                                    <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">About us</label>
                                    <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- Buttons to Cancel or Submit Changes -->
                                <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" onclick="upd_general(site_title.value, site_about.value)" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Shutdown Website Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Shutdown Website</h5>
                        <div class="form-check form-switch">
                            <form>
                                <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                            </form>
                        </div>
                    </div>
                    <p class="card-text">No customer will be allowed to access the website when Shutdown is enabled.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('inc/scripts.php'); ?> <!-- Include scripts -->

<script>
    let general_data;

    // Function to Retrieve General Settings from the Server
    function get_general() {
        let site_title = document.getElementById('site_title');
        let site_about = document.getElementById('site_about');
        let site_title_inp = document.getElementById('site_title_inp');
        let site_about_inp = document.getElementById('site_about_inp');
        let shutdown_toggle = document.getElementById('shutdown-toggle');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crud.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            general_data = JSON.parse(this.responseText);
            
            // Update UI with fetched data
            site_title.innerText = general_data.site_title;
            site_about.innerText = general_data.site_about;
            site_title_inp.value = general_data.site_title;
            site_about_inp.value = general_data.site_about;
            
            if (general_data.shutdown == 0){
                    shutdown_toggle.checked = false; 
                    shutdown_toggle.value = 0;
                }
                else{
                    shutdown_toggle.checked = true; 
                    shutdown_toggle.value = 1;
                }
        }

        xhr.send('get_general');
    }

    // Function to Update General Settings
    function upd_general(site_title_val, site_about_val) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crud.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            var myModal = document.getElementById('general-s');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();
            
            if (this.responseText == 1) {
                alert('success', 'Changes saved!');
                get_general();
            } else {
                alert('error', 'No changes made!');
            }
        }
        
        xhr.send('site_title=' + site_title_val + '&site_about=' + site_about_val + '&upd_general');
    }

    // Function to Toggle Website Shutdown Mode
    function upd_shutdown(val) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/settings_crud.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (this.responseText == 1) {
                alert('success', general_data.shutdown == 0 ? 'Site has been shutdown!' : 'Shutdown mode off!');
            }
            get_general();
        }

        xhr.send('upd_shutdown=' + val);
    }

    // Fetch General Settings on Page Load
    window.onload = function() {
        get_general();
    }
</script>

</body>
</html>
