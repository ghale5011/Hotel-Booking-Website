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
    <title>Admin Panel - Features & Facilities</title>
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
            <h3 class="mb-4">FEATURES & FACILITIES</h3>

            <!-- Features Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Features</h5>
                        <!-- Button to open the modal for adding a new feature -->
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                            <i class="bi bi-file-plus"></i> Add
                        </button>
                    </div>

                    <!-- Table to display features -->
                    <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                        <table class="table table-hover border">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="features_data">
                                <!-- Features data will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Facilities Section -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Facilities</h5>
                        <!-- Button to open the modal for adding a new facility -->
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
                            <i class="bi bi-file-plus"></i> Add
                        </button>
                    </div>

                    <!-- Table to display facilities -->
                    <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                        <table class="table table-hover border">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" width="40%">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="facilities_data">
                                <!-- Facilities data will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Feature Modal -->
<div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form for adding a new feature -->
        <form id="feature_s_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Feature</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" name="feature_name" class="form-control shadow-none" required>
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

<!-- Facility Modal -->
<div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form for adding a new facility -->
        <form id="facility_s_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Facility</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" name="facility_name" class="form-control shadow-none" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Icon</label>
                        <input type="file" name="facility_icon" accept=".svg" class="form-control shadow-none" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="facility_desc" class="form-control shadow-none" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- Buttons to Cancel or Submit Changes -->
                    <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Include scripts -->
<?php require('inc/scripts.php'); ?>

<script>
    let feature_s_form = document.getElementById('feature_s_form');
    let facility_s_form = document.getElementById('facility_s_form');

    // Event listener for feature form submission
    feature_s_form.addEventListener('submit', function(e) {
        e.preventDefault();
        add_feature();
    });

    // Function to add a new feature via AJAX
    function add_feature() {
        let data = new FormData();
        data.append('name', feature_s_form.elements['feature_name'].value);
        data.append('add_feature', '');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_facilities.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('feature-s');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 1) {
                alert('success', 'New feature added!');
                feature_s_form.elements['feature_name'].value = '';
                get_features();
            } else {
                alert('error', 'Server Down!');
            }
        }
        xhr.send(data);
    }

    // Function to fetch and display features
    function get_features() {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_facilities.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('features_data').innerHTML = this.responseText;
        }
        xhr.send('get_features');
    }

    // Function to remove a feature
    function rem_feature(val) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_facilities.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (this.responseText == 1) {
                alert('success', 'Feature removed!');
                get_features();
            } else if (this.responseText == 'room_added') {
                alert('error', 'Feature is added in room!');
            } else {
                alert('error', 'Server down!');
            }
        }

        xhr.send('rem_feature=' + val);
    }

    // Event listener for facility form submission
    facility_s_form.addEventListener('submit', function(e) {
        e.preventDefault();
        add_facility();
    });

    // Function to add a new facility via AJAX
    function add_facility() {
        let data = new FormData();
        data.append('name', facility_s_form.elements['facility_name'].value);
        data.append('icon', facility_s_form.elements['facility_icon'].files[0]);
        data.append('desc', facility_s_form.elements['facility_desc'].value);
        data.append('add_facility', '');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_facilities.php", true);

        xhr.onload = function() {
            var myModal = document.getElementById('facility-s');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if (this.responseText == 'inv_img') {
                alert('error', 'Only SVG images are allowed!');
            } else if (this.responseText == 'inv_size') {
                alert('error', 'Image size should be less than 2MB!');
            } else if (this.responseText == 'upd_failed') {
                alert('error', 'Image upload failed. Server Down!');
            } else {
                alert('success', 'New facility added!');
                facility_s_form.reset();
                get_facilities();
            }
        }
        xhr.send(data);
    }

    // Function to fetch and display facilities
    function get_facilities() {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_facilities.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('facilities_data').innerHTML = this.responseText;
        }
        xhr.send('get_facilities');
    }

    // Function to remove a facility
    function rem_facility(val) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_facilities.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (this.responseText == 1) {
                alert('success', 'Facility removed!');
                get_facilities();
            } else if (this.responseText == 'room_added') {
                alert('error', 'Facility is added in room!');
            } else {
                alert('error', 'Server down!');
            }
        }

        xhr.send('rem_facility=' + val);
    }

    // Load features and facilities when the page loads
    window.onload = function() {
        get_features();
        get_facilities();
    }
</script>

</body>
</html>