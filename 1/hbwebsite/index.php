<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SATKAR Hotel</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
    <link rel="stylesheet" href="css/common.css">

    <!-- Custom CSS -->
    <style>

        /* Availability form adjustments */
        .availability-form{
            margin-top: -50px;
            z-index: 11;  
            position: relative;
            max-width: 1220px; /* Adjust this value if needed */
        }
        /* Media query for small screens (max-width: 575px) */
        @media screen and (max-width: 575px) {
            .availability-form{
                margin-top: 25px;
                padding: 0 35px;
            }
        }

    </style>
</head>
<body class="bg-light"> 
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">SATKAR HOTEL</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active me-2" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link me-2" href="#">Rooms</a></li>
                    <li class="nav-item"><a class="nav-link me-2" href="#">Facilities</a></li>
                    <li class="nav-item"><a class="nav-link me-2" href="#">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link me-2" href="#">About</a></li>
                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                    <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                        Register
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-circle fs-3 me-2"></i> User Login
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control shadow-none">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                            <a href="javascript:void(0)" class="text-secondary text-decoration-none">Forgot Password?</a> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-lines-fill fs-3 me-2"></i> User Registration
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Note: Your details must match with your ID (passport, driving license, etc.) that will be required during check-in.
                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="number" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Picture</label>
                                    <input type="file" class="form-control shadow-none">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control shadow-none" rows="1"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pin Code</label>
                                    <input type="number" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control shadow-none">
                                </div>
                            </div>
                            <div class="text-center my-1">
                                <button type="submit" class="btn btn-dark shadow-none">REGISTER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Image Carousel -->
    <div class="container-fluid px-lg-4 mt-4">
    <div class="swiper-container">
        <div class="swiper-wrapper">
        <div class="swiper-slide">
                <img src="images/carousel/a.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/b.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/c.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/d.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/e.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/f.png" class="w-100 d-block">
            </div>  

        </div>

    </div>

<!-- Check availability form -->
<div class="container availability-form">
    <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class="mb-4">Check  Booking Availability</h5>
            <form>
                <div class="row align-items-end"> 
                    <!-- Check-in Date -->
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Check-in</label>
                        <input type="date" class="form-control shadow-none" id="checkin" required>
                    </div>

                    <!-- Check-out Date -->
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Check-out</label>
                        <input type="date" class="form-control shadow-none" id="checkout" required>
                    </div>

                    <!-- Adult Select -->
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Adult</label>
                        <select class="form-select shadow-none">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <!-- Children Select -->
                    <div class="col-lg-2 mb-3">
                        <label class="form-label" style="font-weight: 500;">Children</label>
                        <select class="form-select shadow-none">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="col-lg-1 mb-lg-3 mt-2"> 
                        <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Our Rooms -->
<h2 class="mt-5 pt-4 text-center fw-bold h-font">OUR ROOMS</h2>

<div class="container">
    <div class="row">
        <!-- Room Card -->
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <!-- Room Image -->
                <img src="images/rooms/a.png" class="card-img-top">

                <div class="card-body">
                    <!-- Room Title and Price -->
                    <h5>Supreme Deluxe Room</h5>
                    <h6 class="mb-4">Rs. 5000 per night</h6>

                    <!-- Features Section -->
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">2 Rooms</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">1 Bathroom</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">1 Balcony</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">3 Sofa</span>
                    </div>

                    <!-- Facilities Section -->
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Television</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">AC</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Room Heater</span>
                    </div>

                    <!-- Rating Section -->
                    <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                        <span class="badge rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </span>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Room Card -->
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <!-- Room Image -->
                <img src="images/rooms/a.png" class="card-img-top">

                <div class="card-body">
                    <!-- Room Title and Price -->
                    <h5>Supreme Deluxe Room</h5>
                    <h6 class="mb-4">Rs. 5000 per night</h6>

                    <!-- Features Section -->
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">2 Rooms</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">1 Bathroom</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">1 Balcony</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">3 Sofa</span>
                    </div>

                    <!-- Facilities Section -->
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Television</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">AC</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Room Heater</span>
                    </div>

                    <!-- Rating Section -->
                    <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                        <span class="badge rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </span>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Room Card -->
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <!-- Room Image -->
                <img src="images/rooms/a.png" class="card-img-top">

                <div class="card-body">
                    <!-- Room Title and Price -->
                    <h5>Supreme Deluxe Room</h5>
                    <h6 class="mb-4">Rs. 5000 per night</h6>

                    <!-- Features Section -->
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">2 Rooms</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">1 Bathroom</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">1 Balcony</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">3 Sofa</span>
                    </div>

                    <!-- Facilities Section -->
                    <div class="facilities mb-4">
                        <h6 class="mb-1">Facilities</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Television</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">AC</span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">Room Heater</span>
                    </div>

                    <!-- Rating Section -->
                    <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                        <span class="badge rounded-pill bg-light">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </span>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- More Rooms Button -->
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
        </div>
    </div>
</div>

<!-- Our Facilities -->
<h2 class="mt-5 pt-4 text-center fw-bold h-font">OUR FACILITIES</h2>
<div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
        
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/features/wifi.svg" width="80px" alt="Wifi Icon">
            <h5 class="mt-3">Wifi</h5>
        </div>
        
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/features/wifi.svg" width="80px" alt="Wifi Icon">
            <h5 class="mt-3">Wifi</h5>
        </div>
        
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/features/wifi.svg" width="80px" alt="Wifi Icon">
            <h5 class="mt-3">Wifi</h5>
        </div>
        
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/features/wifi.svg" width="80px" alt="Wifi Icon">
            <h5 class="mt-3">Wifi</h5>
        </div>
        
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/features/wifi.svg" width="80px" alt="Wifi Icon">
            <h5 class="mt-3">Wifi</h5>
        </div>
        
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">
                More Facilities >>>
            </a>
        </div>
    </div>
</div>


<!-- Testimonials --> 
<h2 class="mt-5 pt-4 text-center fw-bold h-font">Testimonials</h2>

<div class="container mt-5">
    <!-- Swiper -->
    <div class="swiper swiper-testimonials">
        <div class="swiper-wrapper mb-5">
            <!-- Testimonial Slide 1 -->
            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="images/features/profile.svg" width="30px" alt="User Profile">
                    <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Saepe, ea sit quod praesentium ducimus modi dolor provident 
                    reiciendis ullam quisquam.
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                </div>
            </div>

            <!-- Testimonial Slide 2 -->
            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="images/features/star.svg" width="30px" alt="User Profile">
                    <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Saepe, ea sit quod praesentium ducimus modi dolor provident 
                    reiciendis ullam quisquam.
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                </div>
            </div>

            <!-- //Testimonial Slide 3 -->
            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="images/features/star.svg" width="30px" alt="User Profile">
                    <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Saepe, ea sit quod praesentium ducimus modi dolor provident 
                    reiciendis ullam quisquam.
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                </div>
            </div>

            <!-- Testimonial Slide 4 -->
            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="images/features/star.svg" width="30px" alt="User Profile">
                    <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Saepe, ea sit quod praesentium ducimus modi dolor provident 
                    reiciendis ullam quisquam.
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                </div>
            </div>

            <!-- Testimonial Slide 5 -->
            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="images/features/star.svg" width="30px" alt="User Profile">
                    <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Saepe, ea sit quod praesentium ducimus modi dolor provident 
                    reiciendis ullam quisquam.
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                </div>
            </div>
        </div>
        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>



<!-- Reach Us -->

<br><br><br>  
<br><br><br>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
    //Initialize Swiper for hotel cover image
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,          // Space between slides
        effect: "fade",            // Fade effect for transitions
        loop: true,                // Enable looping
        autoplay: {                 // Autoplay settings
            delay: 3500,
            disableOnInteraction: false, 
        },
    });

  // Initialize Swiper for testimonials
var swiper = new Swiper(".swiper-testimonials", {
    // General settings
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    loop: true,
    
    // Autoplay configuration
    autoplay: {
        delay: 3000, // Auto slide every 3 seconds
        disableOnInteraction: false,
    },

    // Coverflow effect settings
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
    },

    pagination: {
        el: ".swiper-pagination",
    },

    // Responsive breakpoints
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },

    // Initial behavior
    slidesPerView: 3, // Default number of slides visible
});

</script>


</body>
</html>
