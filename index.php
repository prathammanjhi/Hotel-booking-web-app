<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <?php require('include/links.php') ?>
    <title><?php echo $settings_r['site_title'] ?>- Home</title>

    <style>
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 0;
                padding: 25px 35px;
            }
        }
    </style>
</head>

<body class="bg-body-tertiary">

    <?php require('include/header.php'); ?>

    <!-- carousel -->

    <div class="container-fluid px-lg-4 mt-4 delay">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">

                <?php
                $res = selectAll('carousel');

                while ($row = mysqli_fetch_assoc($res)) {
                    $path = CAROUSEL_IMG_PATH;
                    echo <<<data
                        
                        <div class="swiper-slide ">
                        <img src="$path$row[image]" class="w-100 d-block" />
                        </div>
                    data;
                }

                ?>

            </div>
            <!-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div> -->
        </div>
    </div>


    <!-- check availability form -->

    <div class="container availability-form delay">
        <div class="row">
            <div class="col-lg-12 bg-dark-subtle shadow p-4 rounded">
                <h5 class="mb-4">Check Booking Availability</h5>
                <form action="">
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3 ">
                            <label class="form-label p-0 " style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label p-0 " style="font-weight: 500;">Check-out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label p-0 " style="font-weight: 500;">Adult</label>
                            <select class="form-select shadow-none">

                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label p-0 " style="font-weight: 500;">Children</label>
                            <select class="form-select shadow-none">

                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mt-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg mb-lg-3">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Room Cards -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font delay">OUR ROOMS</h2>

    <div class="container delay">
        <div class="row">

            <!-- Cards -->

            <?php
            $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3", [1, 0], 'ii');

            while ($room_data = mysqli_fetch_assoc($room_res)) {
                //get features of room

                $fea_q = mysqli_query($con, "SELECT f.name FROM `features` f INNER JOIN `room_features` rfea ON f.id = rfea.features_id WHERE rfea.room_id ='$room_data[id]'");

                $features_data = "";
                while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                    $features_data .= "<span class='badge text-bg-light text-wrap lh-base me-1 mb-1'>
                        $fea_row[name]
                        </span>";
                }

                //get facilities of room

                $fac_q = mysqli_query($con, "SELECT f.name FROM `facilities` f
                    INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id
                    WHERE rfac.room_id = '$room_data[id]'");

                $facilities_data = "";
                while ($fac_row = mysqli_fetch_assoc($fac_q)) {
                    $facilities_data .= "<span class='badge text-bg-light text-wrap lh-base me-1 mb-1'>
                        $fac_row[name]
                        </span>";
                }

                //get thumbnail of room

                $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpg";
                $thumb_q = mysqli_query($con, "SELECT * FROM `room_images` WHERE `room_id`='$room_data[id]' AND `thumb`='1'");

                if (mysqli_num_rows($thumb_q) > 0) {
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
                }

                $book_btn = "";

                if (!$settings_r['shutdown']) {
                    $login = 0;
                    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                        $login = 1;
                    }
                    $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm text-white custom-bg shadow-none'>Book Now</button>";
                }

                //print room card

                echo <<<data

                    <div class="col-lg-4 col-md-6 my-3 delay">
                    <div class="card border-0 shadow-none bg-dark-subtle" style="max-width: 350px; margin: auto;">
                        <img src="$room_thumb" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5>$room_data[name]</h5>
                            <h6 class="mb-4">₹$room_data[price] per night</h6>
                            <div class="features mb-4">
                                <h6 class="mb-1">Features</h6>
                                $features_data
                            </div>
                            <div class="facilities mb-4">
                                <h6 class="mb-1">Facilities</h6>
                                $facilities_data
                            </div>

                            <div class="guests mb-4">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge text-bg-light text-wrap lh-base">
                                $room_data[adult] Adults
                                </span>
                                <span class="badge text-bg-light text-wrap lh-base">
                                $room_data[children] Children
                                </span>

                            </div>

                            <div class="rating mb-4">
                                <h6 class="mb-1">Rating</h6>
                                <spanv class="badge rounded-pill bg-light">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    </span>
                            </div>
                            <div class="d-flex justify-content-evenly mb-2">
                                $book_btn
                                <a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                            </div>
                        </div>
                        </div>
                        </div>

                    data;

                // echo $features_data;
            }
            ?>


            <div class="col-lg-12 text-center mt-5 delay">
                <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
            </div>
        </div>
    </div>

    <!-- Our Facilities -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font delay">OUR Facilities</h2>

    <div class="container delay">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">

            <?php
            $res = mysqli_query($con, "SELECT * FROM `facilities` ORDER BY `id` DESC LIMIT 5");
            $path = FACILITIES_IMG_PATH;

            while ($row = mysqli_fetch_assoc($res)) {
                echo <<<data
                <div class="col-lg-2 col-md-2 text-center bg-dark-subtle rounded shadow py-4 my-3 ">
                <img src="$path$row[icon]" width="80px">
                <h5 class="mt-3">$row[name]</h5>
                </div>
                data;
            }
            ?>

            <div class="col-lg-12 text-center mt-5 delay">

                <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities >>></a>

            </div>

        </div>
    </div>

    <!-- Testimonials -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font delay">TESTIMONIALS</h2>

    <div class="container mt-5 delay">
        <div class="swiper swiper-testimonials">

            <div class="swiper-wrapper mb-5">

                <div class="swiper-slide bg-dark-subtle rounded p-4 delay">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/profiles/pratham.jpg" class="rounded-circle" width="30px">
                        <h6 class="m-0 ms-2">Pratham</h6>
                    </div>
                    <p>
                        This Site gives the perfect thing which we want thanks to the filters
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-dark-subtle rounded p-4 delay">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/profiles/hemant.jpg" class="rounded-circle" alt="" width="30px">
                        <h6 class="m-0 ms-2">Hemant</h6>
                    </div>
                    <p>
                        Astonished by the functioning of this website
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-dark-subtle rounded p-4 delay">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/profiles/shikhar.jpg" class="rounded-circle" alt="" width="30px">
                        <h6 class="m-0 ms-2">Shikher</h6>
                    </div>
                    <p>
                        Best place to find a shelter while traveling whole nation.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>


            </div>

            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="col-lg-12 text-center mt-5 delay">

        <a href="about.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Know More >>></a>

    </div>

    <!-- Reach us -->



    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font delay">Reach Us</h2>

    <div class="container delay">
        <div class="row ">
            <div class="col-lg-8 col-md-8 p-2 mb-lg-0 mb-3 bg-dark-subtle rounded">
                <iframe class="w-100 rounded p-0" style="height: 100%;" src="<?php echo $contact_r['iframe'] ?>" height="320" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4 delay">


                <!-- <div class="bg-white p-4 col-md-4 m-0"> -->
                <div class="bg-dark-subtle col-lg-8 p-4 rounded col-md-4">
                    <h5>Call us</h5>
                    <a href="tel: +<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>+<?php echo $contact_r['pn1'] ?></a>
                    <br>
                    <?php
                    if ($contact_r['pn2'] != '') {
                        echo <<<data
                            <a href="tel: +$contact_r[pn2]" class="d-inline-block  text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>+$contact_r[pn2]</a>
                        data;
                    }
                    ?>



                </div>
                <br>
                <!-- <div class="bg-white me-0 p-3 rounded col-lg-4 col-md-4 " > -->
                <div class="bg-dark-subtle col-lg-8 p-4 rounded col-md-4 delay">
                    <h5>Follow us</h5>
                    <?php
                    if ($contact_r['tw'] != '') {
                        echo <<<data
                            <a href="$contact_r[tw]" class="d-inline-block mb-3 ">
                            <span class="badge bg-light text-dark fs-6 p-2">
                                <i class="bi bi-twitter me-1"></i> Twitter
                            </span>
                            </a>
                        data;
                    }
                    ?>

                    <br>
                    <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block mb-3 ">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i> Instagram
                        </span>
                    </a>
                    <br>
                    <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-3 ">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i> Facebook
                        </span>
                    </a>
                </div>

            </div>
        </div>
    </div>


    <!-- password reset Modal -->
    <div class="modal fade" id="recoveryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="recovery-form">
                    <!-- MODAL HEAD -->
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 d-flex align-items-center"><i class="bi bi-shield-lock fs-3 me-2"></i>Reset Password</h1>
                    </div>
                    <!-- MODAL BODY -->
                    <div class="modal-body">
                        <div class="mb-4">
                            <label class="form-label">New Password</label>
                            <input type="password" name="pass" class="form-control shadow-none" required>
                            <input type="hidden" name="email">
                            <input type="hidden" name="token">

                        </div>
                        <div class=" mb-2 text-end">
                            <button type="button" class="btn shadow-none me-2" data-bs-dismiss="modal">CANCEL</button>
                            <button type="submit" class="btn btn-outline-secondary shadow-none">RESET</button>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>


    <?php require('include/Footer.php') ?>

    <?php

    if (isset($_GET['account_recovery'])) {
        $data = filteration($_GET);

        $t_date = date("Y-m-d");

        $query = select("SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? AND `t_expire`=? LIMIT 1", [$data['email'], $data['token'], $t_date], 'sss');

        if (mysqli_num_rows($query) == 1) {
            echo <<<showModal
            <script>
            var myModal = document.getElementById('recoveryModal');

            myModal.querySelector("input[name='email']").value = '$data[email]';
            myModal.querySelector("input[name='token']").value = '$data[token]';

            var modal = bootstrap.Modal.getOrCreateInstance(myModal);
            modal.show();
            </script>
            showModal;
        } else {
            alert('error', 'Invalid or Expired Link!');
        }
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- carousel script  -->
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            }
            // navigation: {
            //     nextEl: ".swiper-button-next",
            //     prevEl: ".swiper-button-prev",
            // },
            // pagination: {
            //     el: ".swiper-pagination",
            //     clickable: true,
            // },
        });

        // Testimonial swiper

        var swiper = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
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

        // recover account

        let recovery_form = document.getElementById('recovery-form');

        recovery_form.addEventListener('submit', (e) => {
            e.preventDefault();

            let data = new FormData();

            data.append('email', recovery_form.elements['email'].value);
            data.append('token', recovery_form.elements['token'].value);
            data.append('pass', recovery_form.elements['pass'].value);
            data.append('recover_user', '');

            var myModal = document.getElementById('recoveryModal');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/login_register.php", true);

            xhr.onload = function() {
                if (this.responseText == 'failed') {
                    alert('error', 'Account Reset Failed!');
                } else {
                    alert('success', "Account Reset Successful!");
                    recovery_form.reset();
                }
            }

            xhr.send(data);
        });
    </script>
</body>

</html>