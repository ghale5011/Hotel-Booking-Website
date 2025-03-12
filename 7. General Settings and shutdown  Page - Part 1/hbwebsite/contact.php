<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SATKAR Hotel - CONTACT</title>

    <!-- Include Additional Links -->
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">

    <!-- Header -->
    <?php require('inc/header.php'); ?>

    <!-- Page Title Section -->
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Deserunt, ea sunt neque totam <br>repudiandae necessitatibus
            eligendi officia pariatur nesciunt. Id?
        </p>
    </div>

    <!-- Contact Section -->
    <div class="container">
        <div class="row">

            <!-- Contact Info -->
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <!-- Google Map -->
                    <iframe
                        class="w-100 rounded mb-4"
                        height="320px"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5034.0863528760165!2d85.31563585839744!3d27.712318740433883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19016c9d9fcb%3A0xd2291eee6917d60a!2sDurbar%20Marg%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1735829148224!5m2!1sen!2snp"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                    <!-- Address -->
                    <h5>Address</h5>
                    <a href="https://maps.app.goo.gl/r8gaWdu2GWgxByXw8" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i> Darbarmarg, Kathmandu, Nepal
                    </a>

                    <!-- Phone -->
                    <h5 class="mt-4">Call us</h5>
                    <a href="tel:+9779761702072" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +9779761702072
                    </a>
                    <br>
                    <a href="tel:+9779761702072" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +9779761702072
                    </a>

                    <!-- Email -->
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto:sumanghale396@gmail.com" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-envelope-fill"></i> sumanghale396@gmail.com
                    </a>

                    <!-- Social Links -->
                    <h5 class="mt-4">Follow us</h5>
                    <a href="#" class="d-inline-block text-dark fs-5 me-2">
                        <i class="bi bi-twitter-x me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block text-dark fs-5 me-2">
                        <i class="bi bi-facebook me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block text-dark fs-5">
                        <i class="bi bi-instagram me-1"></i>
                    </a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form>
                        <h5>Send a message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input type="email" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Subject</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                        </div>
                        <button type="submit" class="btn text-white custom-bg mt-3">SEND</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <?php require('inc/footer.php'); ?>

</body>

</html>
