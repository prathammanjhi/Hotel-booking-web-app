<?php

require('../admin/include/db_config.php');
require('../admin/include/essentials.php');
require("../include/sendgrid/sendgrid-php.php");

function send_mail($uemail, $name, $token)
{
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("futuready02@gmail.com", "Hotel");
    $email->setSubject("Account Verification Link");

    $email->addTo($uemail, $name);

    $email->addContent(
        "text/html",
        "
        Click the link to confirm your email: <br>
        <a href='" . SITE_URL . "email_confirm.php?email_confirmation&email=$uemail&token=$token" . "'>
            CLICK ME
        </a>
        "
    );

    $sendgrid = new \SendGrid(SENDGRID_API_KEY);

    // try {
    //     $sendgrid->send($email);
    //     return 1;
    // } catch (Exception $e) {
    //     return 0;
    // }

    try {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: ' . $e->getMessage() . "\n";
        return 0;
    }
}

if (isset($_POST['register'])) {
    $data = filteration($_POST);

    // match password and confirm password
    if ($data['pass'] != $data['cpass']) {
        echo 'pass_missmatch';
        exit;
    }

    // check if user exists or not
    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1", [$data['email'], $data['phonenum']], "ss");

    if (mysqli_num_rows($u_exist) != 0) {
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
        exit;
    }

    // upload user image to server
    $img = uploadUserImage($_FILES['profile']);

    if ($img == 'inv_img') {
        echo 'inv_img';
        exit;
    } elseif ($img == 'upd_failed') {
        echo 'upd_failed';
        exit;
    }

    // send confirmation link to user's email

    $token = bin2hex(random_bytes(16));



    $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

    // from here

    $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`, `token`) VALUES (?,?,?,?,?,?,?,?,?)";

    $values = [$data['name'], $data['email'], $data['address'], $data['phonenum'], $data['pincode'], $data['dob'], $img, $enc_pass, $token];

    if (insert($query, $values, 'sssssssss')) {
        echo 1;
    } else {
        echo 'ins_failed';
    }

    // moved it here from the place above and it is working good
    if (!send_mail($data['email'], $data['name'], $token)) {
        echo 'mail_failed';
        exit;
    }
}
