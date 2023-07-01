    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <?php

    session_start();
    date_default_timezone_set("Asia/Kolkata");


    // header section is included in index and other pages which are directly present in clg_project folder therefor we didn't need to go back to clg_project directory from include directory (../)
    require('admin/include/db_config.php');
    require('admin/include/essentials.php');

    $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $setting_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
    $settings_r = mysqli_fetch_assoc(select($setting_q, $values, 'i'));
    // print_r($contact_r)

    if ($settings_r['shutdown']) {
        echo <<<alertbar
            <div class='bg-danger text-center p-2 fw-bold'>
                <i class="bi bi-exclamation-triangle-fill"></li>
                Bookings are temporarily closed!
            </div>
        alertbar;
    }
    ?>