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
    <title>Admin Panel - Users</title>
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
                            <input type="text" oninput="search_user(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="type to search">
                        </div>



                        <div class="table-responsive">
                            <table class="table table-hover border text-center" style="min-width: 1300px;">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th></th>
                                        <th scope="col">Name</th>
                                        <th></th>
                                        <th scope="col">email</th>
                                        <th></th>
                                        <th scope="col">Phone no.</th>
                                        <th></th>
                                        <th scope="col">Location</th>
                                        <th></th>
                                        <th scope="col">DOB</th>
                                        <th></th>
                                        <th scope="col">Verified</th>
                                        <th></th>
                                        <th scope="col">Status</th>
                                        <th></th>
                                        <th scope="col">Date</th>
                                        <th></th>
                                        <th scope="col">Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="users-data">
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>




    <?php require('include/script.php') ?>
    <script src="scripts/users.js"></script>
</body>

</html>