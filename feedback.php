<!DOCTYPE html>
<html lang="en">
<?php include 'pages/head.php'; ?>

<head>
<style>
        #body{
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #feedback-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            
        }

        h3 {
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .star-rating span {
            color: #ccc;
            font-size: 24px;
            cursor: pointer;
        }

        .star-rating span:hover,
        .star-rating span.active {
            color: gold;
        }

        select, textarea, button {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #001F3F;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #001F3F;
        }
    </style>
</head>


<body data-spy="scroll" data-target=".site-navbar-target" data-offset="200">

    <!-- <div class="site-wrap"> -->

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-3 js-site-navbar site-navbar-target" role="banner" id="site-navbar">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-11 col-xl-2 site-logo">
                    <h1 class="mb-0"><a href="index.php" class="text-white h5 mb-0">2NK Sacco</a></h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                            <li><a href="index.php#section-home" class="nav-link">Home</a></li>
                            <li>
                                <a href="index.php#section-about" class="nav-link">About Us</a>
                            </li>
                            <li><a href="index.php#section-gallery" class="nav-link">Gallery</a></li>
                            <li><a href="index.php#section-contact" class="nav-link">Contact</a></li>
                            <?php if(isset($_SESSION['customer'])) :?>
                            <li><a href="profile.php" class="nav-link active">Profile</a></li>
                            <li><a href="tracking.php" class="nav-link">Tracking</a></li>
                            <li><a href="feedback.php" class="nav-link">Reviews</a></li>
                            <li><a href="admin/logout.php" class="nav-link">Logout</a></li>
                            <?php else :?>
                            <li><a href="admin/login.php" class="nav-link">Login</a></li>
                            <?php endif;?>
                            <li><a href="request.php" class="nav-link ">Request</a></li>
                        </ul>
                    </nav>
                </div>


                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a
                        href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>

            </div>

        </div>
        </div>

    </header>

    <div class="site-blocks-cover overlay" style=" height: 100px; background-image: url(/cims/server/uploads/settings/home_image.jpg);"
        data-aos="fade" data-stellar-background-ratio="0.5" id="section-home">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">


                    <h1 class="text-white font-weight-light text-uppercase font-weight-bold" data-aos="fade-up">Reviews 
                    </h1>

                </div>
            </div>
        </div>
    </div>
    <div id="body">
    <div id="feedback-form">
        <h3>Please provide your Review here:</h3>
        <form action="submit_feedback.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="delivery_process_rating">Delivery Process Rating:</label>
            <div class="star-rating" data-rating="0" data-name="delivery_process_rating"></div>

            <label for="service_satisfaction_rating">Service Satisfaction Rating:</label>
            <div class="star-rating" data-rating="0" data-name="service_satisfaction_rating"></div>

            <label for="package_condition_rating">Package Condition Rating:</label>
            <div class="star-rating" data-rating="0" data-name="package_condition_rating"></div>

            <label for="suggestions">Suggestions:</label>
            <textarea name="suggestions"></textarea>

            <button type="submit">Submit Review</button>
        </form>
    </div>
    </div>

    
    
    <?php include 'pages/footer.php'; ?>
    <!-- </div> -->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const starContainers = document.querySelectorAll('.star-rating');

            starContainers.forEach(container => {
                const ratingName = container.getAttribute('data-name');
                const stars = Array.from({ length: 5 }, (_, index) => index + 1);

                stars.forEach(star => {
                    const starSpan = document.createElement('span');
                    starSpan.innerHTML = '&#9733;';

                    starSpan.addEventListener('click', function () {
                        container.setAttribute('data-rating', star);
                        updateStarRating(container, ratingName);
                    });

                    container.appendChild(starSpan);
                });
            });

            function updateStarRating(container, ratingName) {
                const rating = container.getAttribute('data-rating');
                const starSpans = container.querySelectorAll('span');

                starSpans.forEach((span, index) => {
                    if (index < rating) {
                        span.classList.add('active');
                    } else {
                        span.classList.remove('active');
                    }
                });

                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = ratingName;
                hiddenInput.value = rating;

                const existingInput = container.querySelector('input[name="' + ratingName + '"]');
                if (existingInput) {
                    container.removeChild(existingInput);
                }

                container.appendChild(hiddenInput);
            }
        });
    </script>
</body>

</html>