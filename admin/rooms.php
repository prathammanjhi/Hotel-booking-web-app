<?php
require('include/essentials.php');
require('include/db_config.php');
adminLogin();

// if (isset($_GET['seen'])) {
//     $frm_data = filteration($_GET);

//     if ($frm_data['seen'] == 'all') {

//         $q = "UPDATE `user_queries` SET `seen`=?";
//         $values = [1];
//         if (update($q, $values, 'i')) {
//             alert('success', 'Marked all as Read!');
//         } else {
//             alert('error', 'Operation Falied!');
//         }
//     } else {

//         $q = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
//         $values = [1, $frm_data['seen']];
//         if (update($q, $values, 'ii')) {
//             alert('success', 'Marked as Read!');
//         } else {
//             alert('error', 'Operation Falied!');
//         }
//     }
// }

// if (isset($_GET['del'])) {
//     $frm_data = filteration($_GET);

//     if ($frm_data['del'] == 'all') {

//         $q = "DELETE FROM `user_queries`";
//         if (mysqli_query($con, $q)) {
//             alert('success', 'All messages Deleted!');
//         } else {
//             alert('error', 'Operation Falied!');
//         }
//     } else {

//         $q = "DELETE FROM `user_queries` WHERE `sr_no`=?";
//         $values = [$frm_data['del']];
//         if (delete($q, $values, 'i')) {
//             alert('success', 'Message Deleted!');
//         } else {
//             alert('error', 'Operation Falied!');
//         }
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('include/links.php') ?>
    <title>Admin Panel - Rooms</title>
</head>

<body class="bg-light">

    <?php require('include/header.php') ?>

    <div class="container-fluid bg-dark-subtle" id="main-content">
        <div class="row ">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">ROOMS</h3>

                <!-- Rooms -->

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <!-- room settings -->
                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>



                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th></th>
                                        <th scope="col">Name</th>
                                        <th></th>
                                        <th scope="col">Area</th>
                                        <th></th>
                                        <th scope="col">Guests</th>
                                        <th></th>
                                        <th scope="col">Price</th>
                                        <th></th>
                                        <th scope="col">Quantity</th>
                                        <th></th>
                                        <th scope="col">Status</th>
                                        <th></th>
                                        <th scope="col">Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="room-data">
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Add room modal -->
    <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <form id="add_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add Room</h1>

                    </div>

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" required class="form-control shadow-none" autocomplete="name">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Area</label>
                                <input type="number" required class="form-control shadow-none" name="area" min="1">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" required class="form-control shadow-none" name="Price" min="1">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" required class="form-control shadow-none" name="quantity" min="1">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Adult(Max)</label>
                                <input type="number" required class="form-control shadow-none" name="adult" min="1">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Children (Max)</label>
                                <input type="number" required class="form-control shadow-none" name="children" min="1">
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Features</label>
                                <div class="row">
                                    <?php
                                    $res = selectAll('features');
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Facilities</label>
                                <div class="row">
                                    <?php
                                    $res = selectAll('facilities');
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                            </div>

                            <input type="hidden" name="room_id">

                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" id="submit" class="btn custom-bg text-white shadow-none" data-bs-dismiss="modal">SUBMIT</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Edit room modal -->
    <div class="modal fade" id="edit_room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <!-- form -->
            <form id="edit_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit Room</h1>

                    </div>

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" required class="form-control shadow-none" autocomplete="name">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Area</label>
                                <input type="number" required class="form-control shadow-none" name="area" min="1">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" required class="form-control shadow-none" name="Price" min="1">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" required class="form-control shadow-none" name="quantity" min="1">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Adult(Max)</label>
                                <input type="number" required class="form-control shadow-none" name="adult" min="1">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Children (Max)</label>
                                <input type="number" required class="form-control shadow-none" name="children" min="1">
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Features</label>
                                <div class="row">
                                    <?php
                                    $res = selectAll('features');
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Facilities</label>
                                <div class="row">
                                    <?php
                                    $res = selectAll('facilities');
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                            <div class='col-md-3 mb-1'>
                                                <label>
                                                    <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                                    $opt[name]
                                                </label>
                                            </div>
                                        ";
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                            </div>

                            <input type="hidden" name="room_id">

                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" id="submit" class="btn custom-bg text-white shadow-none" data-bs-dismiss="modal">SUBMIT</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Imiages Modal -->
    <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Room Name</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="image-alert"></div>
                    <div class="border-bottom border-3 pb-3 mb-3">
                        <form id="add_image_form">
                            <label class="form-label fw-bold">Add Image</label>
                            <input type="file" name="image" accept=".jpg, .png, .jpeg, .webp" class="form-control shadow-none mb-3" required>
                            <button class="btn custom-bg text-white shadow-none">ADD</button>
                            <input type="hidden" name="room_id">
                        </form>
                    </div>
                    <div class="table-responsive-lg" style="height: 350px; overflow-y: scroll;">
                        <table class="table table-hover border text-center">
                            <thead>
                                <tr class="bg-dark text-light sticky-top">
                                    <th scope="col" width="60%">Image</th>
                                    <th></th>
                                    <th scope="col">Thumb</th>
                                    <th></th>
                                    <th scope="col">Delete</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="room-image-data">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require('include/script.php') ?>
    <script src="scripts/rooms.js"></script>
</body>

</html>