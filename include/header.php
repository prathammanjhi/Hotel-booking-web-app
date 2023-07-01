<!-- navigation -->
<nav id="nav-bar" class="navbar navbar-expand-lg bg-body-tertiary bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="#"><?php echo $settings_r['site_title'] ?></a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="contact.php">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
            <div class="d-flex">

                <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                    $path = USERS_IMG_PATH;

                    echo <<<data
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-dark shadow-none dropdown-toggle rounded-pill" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            <img src="$path$_SESSION[uPic]" style="width: 30px; height: 30px; border-radius: 50%;" class = "me-1">  
                            $_SESSION[uName]
                        </button>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                      <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                      <li><a class="dropdown-item" href="bookings.php">Bookings</a></li>
                      <li><a class="dropdown-item" href="logout.php">Logout</a></li> 
                    </ul>
                    </div>
                    data;
                } else {
                    echo <<<data
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login
                    </button>
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#registerModal">
                    Registar
                    </button>
                    data;
                }
                ?>


            </div>
        </div>
    </div>
</nav>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="login-form">
                <!-- MODAL HEAD -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5 d-flex align-items-center"><i class="bi bi-person-circle fs-3 me-2"></i>User Login</h1>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- MODAL BODY -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email/Mobile</label>
                        <input type="text" name="email_mob" class="form-control shadow-none" required>

                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="pass" required class="form-control shadow-none">
                        <div class="form-text">Login to explore more !..</div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-outline-secondary shadow-none">LOGIN</button>
                        <button type="button" class="btn text-secondary text-decoration-none shadow-none me-lg-3 me-2 p-0" data-bs-toggle="modal" data-bs-target="#forgotModal" data-bs-dismiss="modal">
                            Forgot Password?
                        </button>
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

<!-- Register Modal -->
<div class="modal fade modal-lg" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="register-form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 d-flex align-items-center">
                        <i class="bi bi-person-plus-fill fs-3 me-2"></i>User Registration
                    </h1>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="badge text-bg-light mb-3 text-wrap lh-base">Note: Your details must match with your ID (Aadhar card, passport, Driving license, etc.)
                        Thar will be required while check-in.
                    </span>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 ">
                                <label class="form-label">Name</label>
                                <input name="name" type="text" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label p-0 ">Email</label>
                                <input name="email" type="email" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0">
                                <label class="form-label">Phone Number</label>
                                <input type="number" name="phonenum" required class="form-control shadow-none">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label p-0 ">Picture</label>
                                <input type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required name="profile">
                            </div>
                            <div class="col-md-12 p-0 mb-3">
                                <label class="form-label p-0 mb-3">Address</label>
                                <textarea class="form-control shadow-none" required name="address" rows="1"></textarea>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Pincode</label>
                                <input type="number" required name="pincode" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label p-0 ">Date of birth</label>
                                <input type="date" name="dob" required class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="pass" required class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label p-0 ">Confirm Password</label>
                                <input type="password" name="cpass" required class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="text-center my-1">
                            <button type="submit" class="btn btn-dark shadow-none">Register</button>
                        </div>
                    </div>
                    <!-- <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control shadow-none" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none">
                            <div class="form-text">Login to explore more !..</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" class="btn btn-outline-secondary shadow-none">LOGIN</button>
                            <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
                        </div> -->
                </div>
                <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div> -->
            </form>
        </div>
    </div>
</div>

<!-- Forgot Modal -->
<div class="modal fade" id="forgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="forgot-form">
                <!-- MODAL HEAD -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5 d-flex align-items-center"><i class="bi bi-person-circle fs-3 me-2"></i>Forgot Password</h1>
                </div>
                <!-- MODAL BODY -->
                <div class="modal-body">
                    <div class="mb-4">
                        <span class="badge text-bg-light mb-3 text-wrap lh-base">Note: A Link Will be sent to your email to reset your Password.
                        </span>
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control shadow-none" required>

                    </div>
                    <div class=" mb-2 text-end">
                        <button type="button" class="btn shadow-none p-0 me-2" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-outline-secondary shadow-none">Send Link</button>
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