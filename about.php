<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <?php require('include/links.php') ?>
    <title><?php echo $settings_r['site_title'] ?> - About</title>
    <style>
        .box {
            border-top-color: #2ec1ac !important;
        }
    </style>
</head>

<body class="bg-body-tertiary">

    <?php require('include/header.php'); ?>

    <div class="my-5 px-4 text-center delay">
        <h2 class="fw-bold h-font text-center delay">ABOUT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3 p-5 mx-5 delay">
            <?php echo $settings_r['site_about'] ?>
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 clo-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <h3 class="mb-3 h-font delay">OUR TEAM</h3>
                <p class="delay">We are classmates and luckiely room mates and hence thaught of creating somethnig fun which can add value of our lives and hence made this. <i class="bi bi-cup-hot-fill"></i></p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                <img src="images/users/group.jpg" alt="" class="w-100 rounded delay">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-dark-subtle rounded shadow p-4 border-top border-4 text-center box delay">
                    <img src="images/about/hotel.svg" width="70px" alt="">
                    <h4 class="mt-3">100+ ROOMS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-dark-subtle rounded shadow p-4 border-top border-4 text-center box delay">
                    <img src="images/about/customers.svg" width="70px" alt="">
                    <h4 class="mt-3">200+ CUSTOMERS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-dark-subtle rounded shadow p-4 border-top border-4 text-center box delay">
                    <img src="images/about/rating.svg" width="70px" alt="">
                    <h4 class="mt-3">150+ REVIEWS</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-dark-subtle rounded shadow p-4 border-top border-4 text-center box delay">
                    <img src="images/about/hotel.svg" width="70px" alt="">
                    <h4 class="mt-3">200+ STAFFS</h4>
                </div>
            </div>
        </div>
    </div>

    <h3 class="my-5 fw-bold h-font text-center delay">MANAGEMENT TEAM</h3>

    <!-- Management carousel -->

    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5 ">

                <?php
                $about_r = selectAll('team_details');
                $path = ABOUT_IMG_PATH;

                while ($row = mysqli_fetch_assoc($about_r)) {
                    echo <<<data
                    <div class="swiper-slide bg-dark-subtle text center overflow-hidden rounded delay">
                    <img src="$path$row[picture]" alt="" class="w-100 rounded">
                    <h5 class="mt-2 ps-4">$row[name]</h5>
                    </div>
                    data;
                }
                ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <?php require('include/Footer.php') ?>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {

            spaceBetween: 40,
            pagination: {
                el: ".swiper-pagination",
            },
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
                }
            }
        });
    </script>

</body>

</html>