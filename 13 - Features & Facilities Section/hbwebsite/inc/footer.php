<!-- Footer Section -->
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <!-- Hotel Description -->
        <div class="col-lg-4 p-4">
            <h3 class="h-font fw-bold fs-3 mb-2">SATKAR HOTEL</h3>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Tempore obcaecati quisquam, quo rem debitis qui consectetur?
                Laudantium adipisci eaque quos, aliquid animi rerum blanditiis
                fugiat culpa a sint provident facilis.
            </p>
        </div>

        <!-- Links Section -->
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Links</h5>
            <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a> <br>
            <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a> <br>
            <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a> <br>
            <a href="contat.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact us</a> <br>
            <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a>
        </div>

        <!-- Social Media Section -->
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Follow us</h5>
            <?php 
                if($contact_r['tw']!=''){
                    echo<<<data
                        <a href="$contact_r[tw]" class="d-inline-block text-dark text-decoration-none mb-2">
                            <i class="bi bi-twitter me-1"></i> Twitter
                        </a><br>
                        data;
                    }
            ?>
            <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
                <i class="bi bi-facebook me-1"></i> Facebook
            </a><br>
            <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block text-dark text-decoration-none">
                <i class="bi bi-instagram me-1"></i> Instagram
            </a>
        </div>
    </div>
</div>

<!-- Footer Credit -->
<h6 class="text-center bg-dark text-white p-3 mb-0">
    Designed and Developed by Suman Ghale
</h6>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    // Function to set the active class on the navigation bar links
    function setActive()
    {
        // Get the navbar element by its ID
        let navbar = document.getElementById('nav-bar');
        
        // Get all the anchor (<a>) tags within the navbar
        let a_tags = navbar.getElementsByTagName('a');

        // Loop through each anchor tag
        for(i=0; i<a_tags.length; i++)
        {
            // Extract the file name from the href attribute
            // split('/').pop() gets the last part of the URL after the last '/'
            let file = a_tags[i].href.split('/').pop();
            
            // Extract the file name without the extension
            // split('.')[0] gets the part before the first '.'
            let file_name = file.split('.')[0];

            // Check if the current document's URL contains the file name
            if(document.location.href.indexOf(file_name) >= 0){
                // If it does, add the 'active' class to the anchor tag
                a_tags[i].classList.add('active');
            }
        }
    }
    // Call the setActive function to apply the active class
    setActive();
</script>
