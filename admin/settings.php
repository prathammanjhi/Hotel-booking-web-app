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

                <!-- General Settings Action -->
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

                <!-- Modal -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">

                        <form>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">General Settings</h1>

                                </div>
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label class="form-label">Site Title</label>
                                        <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" aria-describedby="emailHelp">
                                    </div>
                                    <div class=" mb-3">
                                        <label class="form-label p-0 mb-3">About Us</label>
                                        <textarea class="form-control shadow-none" name="site_about" id="site_about_inp" rows="6"></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="button" id="submit" onclick="upd_general(site_title.value, site_about.value)" class="btn custom-bg text-white shadow-none" data-bs-dismiss="modal">SUBMIT</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <!-- Shutdowm section -->
                <div class="card border-0 shadow-sm">
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

            </div>
        </div>
    </div>


    <?php require('include/script.php') ?>

    <script>
        let general_data;

        function get_general() {
            let site_title = document.getElementById('site_title');
            let site_about = document.getElementById('site_about');

            let site_title_inp = document.getElementById('site_title_inp');
            let site_about_inp = document.getElementById('site_about_inp');

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

        window.onload = function() {
            get_general();
        }
    </script>

</body>

</html>