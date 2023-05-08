<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - Contact</title>

    <?php require('include/links.php') ?>

</head>

<body class="bg-light">

    <?php require('include/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto sed temporibus mollitia <br> accusantium necessitatibus culpa voluptatibus repellat fugit minima optio.</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <!-- map and address -->
                    <iframe class="w-100 rounded mb-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117738.34447462665!2d77.66118265817344!3d22.75338153112091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397dcfb9c99dc1ef%3A0x46fc29c3c4b1b05c!2sNarmadapuram%2C%20Madhya%20Pradesh!5e0!3m2!1sen!2sin!4v1683312294088!5m2!1sen!2sin" height="320" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <h5 class="mt-4">Address</h5>
                    <a href="https://goo.gl/maps/TRG23SkVK8dEiCZ77?coh=178573&entry=tt" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i>Island no.4 Albasta Grand Line near Red Line
                    </a>

                    <!-- callus -->

                    <h5 class="mt-4">Call us</h5>
                    <a href="tel: +919630124680" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>+919630124680</a>
                    <br>
                    <a href="tel: +919630124680" class="d-inline-block  text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>+919630124680</a>
                    <!-- email -->
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: prathammanjhi2@gmail.com" class="d-inline-block  text-decoration-none text-dark"><i class="bi bi-envelope-fill"></i> prathammanjhi2@gmail.com</a>


                    <!-- Follow us -->

                    <h5 class="mt-4">Follow us</h5>
                    <a href="#" class="d-inline-block  text-dark fs-5 me-2">
                        <i class="bi bi-twitter  me-1"></i>
                    </a>

                    <a href="#" class="d-inline-block mb-3 ">
                        <i class="bi bi-instagram   text-dark fs-5 me-2"></i>
                    </a>

                    <a href="#" class="d-inline-block mb-3 ">
                        <i class="bi bi-facebook   text-dark fs-5"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form action="">
                        <h5>Send a message</h5>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input type="text" class="form-control shadow-none" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Email</label>
                            <input type="email" class="form-control shadow-none" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Subject</label>
                            <input type="text" class="form-control shadow-none" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea class="form-control shadow-none" rows="5" style="resize:none;"></textarea>

                            <button type="submit" class="btn text-white custom-bg mt-3">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require('include/Footer.php') ?>

</body>

</html>