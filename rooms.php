<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('include/links.php') ?>
    <title><?php echo $settings_r['site_title'] ?> - Rooms</title>


</head>

<body class="bg-light">

    <?php require('include/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-9 col-md-12 px-4">

                <?php
                $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=?", [1, 0], 'ii');

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

                        $book_btn = "<button  class='btn btn-sm text-white custom-bg shadow-none w-100 mb-2'>Book Now</button>";
                    }

                    //print room card

                    echo <<<data
                    <div class="card mb-4 border-0 shadow bg-dark-subtle">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="$room_thumb" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">$room_data[name]</h5>
                            <div class="features mb-2">
                                <h6 class="mb-1">Features</h6>
                                $features_data
                            </div>
                            <div class="facilities mb-2 ">
                                <h6 class="mb-1">Facilities</h6>
                                $facilities_data
                            </div>
                            <div class="guests ">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge text-bg-light text-wrap lh-base">
                                    $room_data[adult] Adults
                                </span>
                                <span class="badge text-bg-light text-wrap lh-base">
                                    $room_data[children] Children
                                </span>

                            </div>

                        </div>
                        <div class="col-md-2 text-center mt-lg-0 mt-md-0 mt-4">
                            <h6 class="mb-4">₹$room_data[price] per month</h6>
                            $book_btn
                            <a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn-outline-dark w-100 shadow-none">More details</a>
                        </div>
                        </div>
                    </div>
                    data;

                    // echo $features_data;
                }
                ?>

                <!-- <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/rooms/1.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Simple Room Name</h5>
                            <div class="features mb-2">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge text-bg-light text-wrap lh-base">
                                    2 Rooms
                                </span>
                                <span class="badge text-bg-light text-wrap lh-base">
                                    1 Bathroom
                                </span>
                                <span class="badge text-bg-light text-wrap lh-base">
                                    1 Balcony
                                </span>
                                <span class="badge text-bg-light text-wrap lh-base">
                                    3 Sofa
                                </span>
                            </div>
                            <div class="facilities mb-2 ">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge text-bg-light text-wrap lh-base">
                                    Wifi
                                </span>
                                <span class="badge text-bg-light text-wrap lh-base">
                                    Television
                                </span>
                                <span class="badge text-bg-light text-wrap lh-base">
                                    AC
                                </span>
                                <span class="badge text-bg-light text-wrap lh-base">
                                    Room Heater
                                </span>
                            </div>
                            <div class="guests ">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge text-bg-light text-wrap lh-base">
                                    5 Adults
                                </span>
                                <span class="badge text-bg-light text-wrap lh-base">
                                    4 Children
                                </span>

                            </div>

                        </div>
                        <div class="col-md-2 text-center mt-lg-0 mt-md-0 mt-4">
                            <h6 class="mb-4">₹200 per night</h6>
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none w-100 mb-2">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark w-100 shadow-none">More details</a>
                        </div>
                    </div>
                </div> -->

            </div>

            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 ps-4 ">
                <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark-subtle rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch ">
                        <H4 class="mt-4">FILTERS</H4>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon shadow-none"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <!-- check available -->
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                                <label class="form-label p-0 " style="font-weight: 500;">Check-in</label>
                                <input type="date" class="form-control shadow-none mb-3">

                                <label class="form-label p-0 " style="font-weight: 500;">Check-out</label>
                                <input type="date" class="form-control shadow-none">
                            </div>
                            <!-- facilities -->
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                                <div class="mb-2">

                                    <input type="checkbox" id="f1" class="form-check-input shadow-none  me-1">
                                    <label class="form-check-label p-0 " for="f1" style="font-weight: 500;">Facility One</label>
                                </div>
                                <div class="mb-2">

                                    <input type="checkbox" id="f2" class="form-check-input shadow-none  me-1">
                                    <label class="form-check-label p-0 " for="f2" style="font-weight: 500;">Facility two</label>
                                </div>
                                <div class="mb-2">

                                    <input type="checkbox" id="f3" class="form-check-input shadow-none  me-1">
                                    <label class="form-check-label p-0 " for="f3" style="font-weight: 500;">Facility three</label>
                                </div>

                                <label class="form-label p-0 " style="font-weight: 500;">Check-out</label>
                                <input type="date" class="form-control shadow-none">
                            </div>
                            <!-- guests -->
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label">Adults</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                    <div class="">
                                        <label class="form-label">Children</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>

        </div>
    </div>

    <?php require('include/Footer.php') ?>

</body>

</html>