<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - Rooms</title>

    <?php require('include/links.php') ?>

</head>

<body class="bg-light">

    <?php require('include/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 px-lg-0">
                <nav class="navbar navbar-expand-lg bg-body-tertiary bg-white rounded shadow">
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

            <div class="col-lg-9 col-md-12 px-4">

                <div class="card mb-4 border-0 shadow">
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
                </div>
                <div class="card mb-4 border-0 shadow">
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
                </div>
                <div class="card mb-4 border-0 shadow">
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
                </div>
            </div>
        </div>
    </div>

    <?php require('include/Footer.php') ?>

</body>

</html>