<?php
require('include/essentials.php');
require('include/db_config.php');
adminLogin();

if (isset($_GET['seen'])) {
    $frm_data = filteration($_GET);

    if ($frm_data['seen'] == 'all') {

        $q = "UPDATE `user_queries` SET `seen`=?";
        $values = [1];
        if (update($q, $values, 'i')) {
            alert('success', 'Marked all as Read!');
        } else {
            alert('error', 'Operation Falied!');
        }
    } else {

        $q = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
        $values = [1, $frm_data['seen']];
        if (update($q, $values, 'ii')) {
            alert('success', 'Marked as Read!');
        } else {
            alert('error', 'Operation Falied!');
        }
    }
}

if (isset($_GET['del'])) {
    $frm_data = filteration($_GET);

    if ($frm_data['del'] == 'all') {

        $q = "DELETE FROM `user_queries`";
        if (mysqli_query($con, $q)) {
            alert('success', 'All messages Deleted!');
        } else {
            alert('error', 'Operation Falied!');
        }
    } else {

        $q = "DELETE FROM `user_queries` WHERE `sr_no`=?";
        $values = [$frm_data['del']];
        if (delete($q, $values, 'i')) {
            alert('success', 'Message Deleted!');
        } else {
            alert('error', 'Operation Falied!');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('include/links.php') ?>
    <title>Admin Panel - Features and Facilities</title>
</head>

<body class="bg-light">

    <?php require('include/header.php') ?>

    <div class="container-fluid " id="main-content">
        <div class="row ">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">FEATURES & FACILITIES</h3>

                <!-- Card 1 (Features) -->

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <!-- Features settings -->
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Features</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>



                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="features-data">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <!-- Card 1 end -->
                <!-- Card 2 (Facilities) -->

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <!-- Features settings -->
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Facilities</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>



                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" width="40%">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="facilities-data">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <!-- Card end -->

                <!-- <?php echo $_SERVER['DOCUMENT_ROOT']; ?> -->

            </div>
        </div>
    </div>

    <!-- features modal -->
    <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form id="feature_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add Feature</h1>

                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" required id="feature_name" class="form-control shadow-none" aria-describedby="emailHelp">
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

    <!-- facilities modal -->
    <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form id="facility_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add faculity</h1>

                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" required name="facility_name" class="form-control shadow-none">
                        </div>
                        <div class=" mb-3">
                            <label class="form-label p-0 mb-3 fw-bold">Icon</label>
                            <input type="file" accept=".svg" required name="facility_icon" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label p-0 mb-3">Description</label>
                            <textarea name="facility_desc" class="form-control shadow-none" rows="3"></textarea>
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


    <?php require('include/script.php') ?>

    <script>
        let feature_s_form = document.getElementById('feature_s_form');
        let facility_s_form = document.getElementById('facility_s_form');

        // feature section
        feature_s_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_feature();
        });

        function add_feature() {
            let data = new FormData();
            data.append('name', feature_s_form.elements['feature_name'].value);
            data.append('add_feature', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/features_facilities.php", true);

            xhr.onload = function() {
                // console.log(this.responseText);


                if (this.responseText == 1) {
                    alert('success', 'New feature added!');
                    // member_name_inp.value = '';
                    // member_picture_inp.value = '';
                    feature_s_form.elements['feature_name'].value = '';
                    get_features();
                } else {
                    alert('error', 'feature upload failed. SERVER DOWN!');
                }
            }

            xhr.send(data);
        }

        function get_features() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/features_facilities.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                document.getElementById('features-data').innerHTML = this.responseText;
            }

            xhr.send('get_features');
        }

        function rem_feature(val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/features_facilities.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.responseText == 1) {
                    alert('success', 'Feature removed!');
                    get_features();
                } else if (this.responseText == 'room_added') {
                    alert('error', 'Feature is added in room!')
                } else {
                    alert('error', 'Server down!');
                }
            }

            xhr.send('rem_feature=' + val);
        }

        // facility section
        facility_s_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_facility();
        });

        function add_facility() {
            let data = new FormData();
            data.append('name', facility_s_form.elements['facility_name'].value);
            data.append('icon', facility_s_form.elements['facility_icon'].files[0]);
            data.append('desc', facility_s_form.elements['facility_desc'].value);
            data.append('add_facility', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/features_facilities.php", true);

            xhr.onload = function() {
                console.log(this.responseText);

                if (this.responseText == 'inv_img') {
                    alert('error', 'only SVG images are allowed!');
                    // get_general();
                } else if (this.responseText == 'inv_size') {
                    alert('error', 'Image size must be less than 1mb!');
                } else if (this.responseText == 'upd_failed') {
                    alert('error', 'Image upload failed. SERVER DOWN!');
                } else {
                    alert('success', 'New facility added!');
                    facility_s_form.reset();
                    // get_members();
                }
            }

            xhr.send(data);
        }

        function get_facilities() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/features_facilities.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                document.getElementById('facilities-data').innerHTML = this.responseText;
            }

            xhr.send('get_facilities');
        }

        function rem_facility(val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/features_facilities.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.responseText == 1) {
                    alert('success', 'Faility removed!');
                    get_features();
                } else if (this.responseText == 'room_added') {
                    alert('error', 'Facility is added in room!')
                } else {
                    alert('error', 'Server down!');
                }
            }

            xhr.send('rem_facility=' + val);
        }


        window.onload = function() {
            get_features();
            get_facilities();
        }
    </script>

</body>

</html>