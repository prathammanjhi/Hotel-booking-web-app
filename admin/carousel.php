<?php
require('include/essentials.php');
adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('include/links.php') ?>
    <title>Admin Panel - Carousel</title>
</head>

<body class="bg-light">

    <?php require('include/header.php') ?>

    <div class="container-fluid bg-dark-subtle" id="main-content">
        <div class="row ">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">CAROUSEL</h3>

                <!-- Carousel Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Images</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#carousel-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>

                        <div class="row" id="carousel-data">
                            <!-- Member Card -->
                            <!-- This card can now be removed because it has been converted to dynamic data so static card is no more needed -->
                            <!-- <div class="col-md-2 mb-3">
                                <div class="card text-bg-dark">
                                    <img src="../images/about/team.jpg" class="card-img">
                                    <div class="card-img-overlay text-end">
                                        <button class="btn btn-danger btn-sm shadow-none" type="button">
                                            <i class="bi bi-trash"></i> DELETE
                                        </button>
                                    </div>
                                    <p class="card-text text-center px-3 py-2"><small>Random Name</small></p>
                                </div>
                            </div> -->

                        </div>

                    </div>
                </div>

                <!-- Carousel Modal -->
                <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">

                        <form id="carousel_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Add Image</h1>

                                </div>
                                <div class="modal-body">


                                    <div class=" mb-3">
                                        <label class="form-label p-0 mb-3 fw-bold">Picture</label>
                                        <input type="file" accept=".jpg, .png, .webp, .jpeg" required name="carousel_picture" id="carousel_picture_inp" class="form-control shadow-none" aria-describedby="emailHelp">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="carousel_picture.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" id="submit" class="btn custom-bg text-white shadow-none" data-bs-dismiss="modal">SUBMIT</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <!-- <?php echo $_SERVER['DOCUMENT_ROOT']; ?> -->

            </div>
        </div>
    </div>


    <?php require('include/script.php') ?>

    <script src="scripts/carousel.js"></script>

</body>

</html>