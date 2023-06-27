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

    <div class="container-fluid " id="main-content">
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
                                <input type="text" name="name" required class="form-control shadow-none">
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
    <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <form id="edit_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit Room</h1>

                    </div>

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" required class="form-control shadow-none">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border-bottom border-3 pb-3 mb-3">
                        <form id="add_image_form">
                            <label class="form-label fw-bold">Add Image</label>
                            <input type="file" name="image" accept=".jpg, .png, .jpeg" class="form-control shadow-none mb-3" required>
                            <button type="submit" class="btn custom-bg text-white shadow-none">ADD</button>
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
    <script>
        let add_room_form = document.getElementById('add_room_form');

        add_room_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_room();
        });

        function add_room() {
            let data = new FormData();
            data.append('add_room', '');
            data.append('name', add_room_form.elements['name'].value);
            data.append('area', add_room_form.elements['area'].value);
            data.append('Price', add_room_form.elements['Price'].value);
            // data.append('price', add_room_form.elements['price'].value);
            data.append('quantity', add_room_form.elements['quantity'].value);
            data.append('adult', add_room_form.elements['adult'].value);
            data.append('children', add_room_form.elements['children'].value);
            data.append('desc', add_room_form.elements['desc'].value);

            let features = [];
            // add_room_form.elements['features']
            add_room_form.elements['features'].forEach(el => {
                if (el.checked) {
                    // console.log(el.value);
                    features.push(el.value);
                }
            });

            let facilities = [];
            add_room_form.elements['facilities'].forEach(el => {
                if (el.checked) {
                    facilities.push(el.value);
                }
            });

            data.append('features', JSON.stringify(features));
            data.append('facilities', JSON.stringify(facilities));


            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function() {

                // console.log(this.responseText);

                if (this.responseText == 1) {
                    alert('success', 'New room added!');
                    add_room_form.reset();
                    get_all_rooms();
                } else {
                    alert('error', 'SERVER DOWN!');
                }
            }

            xhr.send(data);
        }

        function get_all_rooms() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {

                // console.log(this.responseText);
                document.getElementById('room-data').innerHTML = this.responseText;
            }

            xhr.send('get_all_rooms');
        }

        let edit_room_form = document.getElementById('edit_room_form');

        function edit_details(id) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {

                console.log(JSON.parse(this.responseText));
                //  to know if the fn is giving output or not
                let data = JSON.parse(this.responseText);
                edit_room_form.elements['name'].value = data.roomdata.name;
                edit_room_form.elements['area'].value = data.roomdata.area;
                edit_room_form.elements['Price'].value = data.roomdata.Price;
                edit_room_form.elements['quantity'].value = data.roomdata.quantity;
                edit_room_form.elements['adult'].value = data.roomdata.adult;
                edit_room_form.elements['children'].value = data.roomdata.children;
                edit_room_form.elements['desc'].value = data.roomdata.description;
                edit_room_form.elements['room_id'].value = data.roomdata.id;

                edit_room_form.elements['facilities'].forEach(el => {
                    if (data.facilities.includes(Number(el.value))) {
                        el.checked = true;
                    }
                });
                edit_room_form.elements['features'].forEach(el => {
                    if (data.features.includes(Number(el.value))) {
                        el.checked = true;
                    }
                });

            }

            xhr.send('get_room=' + id);
        }

        edit_room_form.addEventListener('submit', function(e) {
            e.preventDefault();
            submit_edit_room();
        });

        function submit_edit_room() {
            let data = new FormData();
            data.append('edit_room', '');
            data.append('room_id', edit_room_form.elements['room_id'].value);
            data.append('name', edit_room_form.elements['name'].value);
            data.append('area', edit_room_form.elements['area'].value);
            data.append('Price', edit_room_form.elements['Price'].value);
            // data.append('price', add_room_form.elements['price'].value);
            data.append('quantity', edit_room_form.elements['quantity'].value);
            data.append('adult', edit_room_form.elements['adult'].value);
            data.append('children', edit_room_form.elements['children'].value);
            data.append('desc', edit_room_form.elements['desc'].value);

            let features = [];
            // add_room_form.elements['features']
            edit_room_form.elements['features'].forEach(el => {
                if (el.checked) {
                    // console.log(el.value);
                    features.push(el.value);
                }
            });

            let facilities = [];
            edit_room_form.elements['facilities'].forEach(el => {
                if (el.checked) {
                    facilities.push(el.value);
                }
            });

            data.append('features', JSON.stringify(features));
            data.append('facilities', JSON.stringify(facilities));


            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function() {

                // console.log(this.responseText);

                if (this.responseText == 1) {
                    alert('success', 'Room data Submited!');
                    edit_room_form.reset();
                    get_all_rooms();
                } else {
                    alert('error', 'SERVER DOWN!');
                }
            }

            xhr.send(data);
        }

        function toggle_status(id, val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {

                // console.log(this.responseText);
                if (this.responseText == 1) {
                    alert('success', 'status toggled!');
                    get_all_rooms();
                } else {
                    alert('success', 'server down!');
                }
            }

            xhr.send('toggle_status=' + id + '&value=' + val);
        }

        window.onload = function() {
            get_all_rooms();
        }
    </script>

</body>

</html>