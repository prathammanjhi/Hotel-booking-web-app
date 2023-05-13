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
    <title>Admin Panel - Dashboard</title>
</head>

<body class="bg-light">

    <?php require('include/header.php') ?>

    <div class="container-fluid " id="main-content">
        <div class="row ">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">SETTINGS</h3>

                <!-- General Settings Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>

                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
                        <p class="card-text" id="site_about"></p>

                    </div>
                </div>

                <!-- General Settings Modal -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">

                        <form id="general_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">General Settings</h1>

                                </div>
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Site Title</label>
                                        <input type="text" required name="site_title" id="site_title_inp" class="form-control shadow-none" aria-describedby="emailHelp">
                                    </div>
                                    <div class=" mb-3">
                                        <label class="form-label p-0 mb-3 fw-bold">About Us</label>
                                        <textarea class="form-control shadow-none" name="site_about" id="site_about_inp" rows="6" required></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" id="submit" onclick="" class="btn custom-bg text-white shadow-none" data-bs-dismiss="modal">SUBMIT</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <!-- Shutdowm section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Shutdowm Website</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" role="switch" id="shutdowm-toggle">
                                </form>

                            </div>
                        </div>

                        <p class="card-text ">
                            No customers will be allowed to book hotel room, shutdowm mode is on.
                        </p>

                    </div>
                </div>

                <!-- Contact Details Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Contacts Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text" id="address"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                    <p class="card-text" id="gmap"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="pn1"></span>
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="pn2"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold" id="email">E-mail</h6>
                                    <p class="card-text" id="email"></p>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social links</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-twitter  me-1"></i>
                                        <span id="tw"></span>
                                        <br>
                                        <i class="bi bi-instagram  me-1"></i>
                                        <span id="insta"></span>
                                        <br>
                                        <i class="bi bi-facebook  me-1"></i>
                                        <span id="fb"></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                    <iframe loading="lazy" class="border p-2 w-100" id="iframe"></iframe>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

                <!-- Contact Details Modal -->
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">

                        <form id="contacts_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Contacts Settings</h1>

                                </div>
                                <div class="modal-body">

                                    <div class="container-fluid p-0">
                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Address</label>
                                                    <input type="text" name="address" id="address_inp" class="form-control shadow-none" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Google Map Link</label>
                                                    <input type="text" required name="gmap" id="gmap_inp" class="form-control shadow-none">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Phone Numbers (With country code)</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="text" required name="pn1" id="pn1_inp" class="form-control shadow-none">
                                                        <!-- <input type="text" class="form-controlshadow-none" name="pn1" id="pn1-inp" required> -->
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="text" class="form-controlshadow-none" name="pn2" id="pn2_inp">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Email</label>
                                                    <input type="email" required name="email" id="email_inp" class="form-control shadow-none">
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Social Links</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-twitter"></i></span>
                                                        <input type="text" class="form-controlshadow-none" required name="tw" id="tw_inp">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                        <input type="text" class="form-controlshadow-none" name="insta" id="insta_inp" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                        <input type="text" class="form-controlshadow-none" name="fb" id="fb_inp">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">iFrame Src</label>
                                                    <input type="text" class="form-control shadow-none" name="iframe" id="iframe_inp" required>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- data-bs-dismiss="modal" -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="contacts_inp(contacts_data)" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit" class="btn custom-bg text-white shadow-none" data-bs-dismiss="modal">SUBMIT</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <!-- Management Team Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Management Team</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#team-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>

                        <div class="row" id="team-data">
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

                <!-- Management Team Modal -->
                <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">

                        <form id="team_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Add Team Member</h1>

                                </div>
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="text" required name="member_name" id="member_name_inp" class="form-control shadow-none" aria-describedby="emailHelp">
                                    </div>
                                    <div class=" mb-3">
                                        <label class="form-label p-0 mb-3 fw-bold">Picture</label>
                                        <input type="file" accept=".jpg, .png, .webp, .jpeg" required name="member_picture" id="member_picture_inp" class="form-control shadow-none" aria-describedby="emailHelp">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="member_name.value='',member_picture.value=''" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
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

    <script>
        let general_data, contacts_data;

        let general_s_form = document.getElementById('general_s_form');
        let site_title_inp = document.getElementById('site_title_inp');
        let site_about_inp = document.getElementById('site_about_inp');

        let contacts_s_form = document.getElementById('contacts_s_form');

        let team_s_form = document.getElementById('team_s_form');
        let member_name_inp = document.getElementById('member_name_inp');
        let member_picture_inp = document.getElementById('member_picture_inp');


        function get_general() {
            let site_title = document.getElementById('site_title');
            let site_about = document.getElementById('site_about');



            let shutdown_toggle = document.getElementById('shutdowm-toggle');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                general_data = JSON.parse(this.responseText);

                site_title.innerText = general_data.site_title;
                site_about.innerText = general_data.site_about;

                site_title_inp.value = general_data.site_title;
                site_about_inp.value = general_data.site_about;

                if (general_data.shutdown == 0) {
                    shutdown_toggle.Checked = false;
                    shutdown_toggle.value = 0;
                } else {
                    shutdown_toggle.Checked = true;
                    shutdown_toggle.value = 1;
                }
            }

            xhr.send('get_general');
        }

        general_s_form.addEventListener('submit', function(e) {
            e.preventDefault();
            upd_general(site_title_inp.value, site_about_inp.value);
        })

        function upd_general(site_title_val, site_about_val) {

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {

                //test code ->

                // const myModalEl = document.getElementById('general-s')
                // myModalEl.addEventListener('hidden.bs.modal', event => {

                //     hide.bs.modal.getElementById('submit');

                // })
                // console.log(this.responseText);

                //start ->

                if (this.responseText == 1) {
                    alert('success', 'Changes Saved!');
                    get_general();
                } else {
                    alert('errorr', 'No Changes made!');
                }

            }

            xhr.send('site_title=' + site_title_val + '&site_about=' + site_about_val + '&upd_general');
        }

        function upd_shutdown(val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {

                if (this.responseText == 1 && general_data.shutdown == 0) {
                    alert('success', 'Site has been shutdown!');
                } else {
                    alert('success', 'Shutdown mode off!');
                }
                get_general();
            }

            xhr.send('upd_shutdown=' + val);
        }

        function get_contacts() {

            // inner text id variables
            let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email', 'tw', 'insta', 'fb'];

            // value variables
            let iframe = document.getElementById('iframe');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {

                contacts_data = JSON.parse(this.responseText);
                contacts_data = Object.values(contacts_data);

                for (i = 0; i < contacts_p_id.length; i++) {
                    document.getElementById(contacts_p_id[i]).innerText = contacts_data[i + 1];
                }
                iframe.src = contacts_data[9];
                contacts_inp(contacts_data);

            }

            xhr.send('get_contacts');
        }

        function contacts_inp(contacts_data) {
            let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'tw_inp', 'insta_inp', 'fb_inp', 'iframe_inp'];

            for (i = 0; i < contacts_inp_id.length; i++) {
                document.getElementById(contacts_inp_id[i]).value = contacts_data[i + 1];
            }

        }

        contacts_s_form.addEventListener('submit', function(e) {
            e.preventDefault();
            upd_contacts();
        })

        function upd_contacts() {

            let index = ['address', 'gmap', 'pn1', 'pn2', 'email', 'tw', 'insta', 'fb', 'iframe'];
            let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'tw_inp', 'insta_inp', 'fb_inp', 'iframe_inp'];

            let data_str = "";

            for (i = 0; i < index.length; i++) {
                data_str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + '&';
            }

            data_str += "upd_contacts";

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {

                if (this.responseText == 1) {
                    alert('success', 'Changes saved!');
                    get_contacts();
                } else {
                    alert('error', 'No changes made!');
                }
            }

            xhr.send(data_str)

        }

        team_s_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_member();
        });

        function add_member() {
            let data = new FormData();
            data.append('name', member_name_inp.value);
            data.append('picture', member_picture_inp.files[0]);
            data.append('add_member', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);

            xhr.onload = function() {
                // console.log(this.responseText);

                if (this.responseText == 'inv_img') {
                    alert('error', 'only JPG and PNG images are allowed!');
                    // get_general();
                } else if (this.responseText == 'inv_size') {
                    alert('error', 'Image size must be less than 2 mb!');
                } else if (this.responseText == 'upd_failed') {
                    alert('error', 'Image upload failed. SERVER DOWN!');
                } else {
                    alert('success', 'New member added!');
                    member_name_inp.value = '';
                    member_picture_inp.value = '';
                    get_members();
                }

            }

            xhr.send(data);

        }

        function get_members() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                document.getElementById('team-data').innerHTML = this.responseText;
            }

            xhr.send('get_members');
        }

        function rem_member(val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.responseText == 1) {
                    alert('success', 'Member removed!');
                    get_members();
                } else {
                    alert('error', 'Server down!');
                }
            }

            xhr.send('rem_member=' + val);
        }

        window.onload = function() {
            get_general();
            get_contacts();
            get_members();
        }
    </script>

</body>

</html>