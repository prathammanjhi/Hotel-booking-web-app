<?php

require('../admin/include/db_config.php');
require('../admin/include/essentials.php');
require("../include/sendgrid/sendgrid-php.php");
date_default_timezone_set("Asia/Kolkata");


function send_mail($uemail, $token, $type)
{

    if ($type == "email_confirmation") {
        $page = 'email_confirm.php';
        $subject = "Account Verification Link";
        $content = "Confirm your email";
    } else {
        $page = 'index.php';
        $subject = "Account reset Link";
        $content = "reset your account";
    }

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom(SENDGRID_EMAIL, SENDGRID_NAME);
    $email->setSubject("$subject");

    $email->addTo($uemail);

    $email->addContent(
        "text/html",
        "
        Click the link to $content: <br>
        <a href='" . SITE_URL . "$page?$type&email=$uemail&token=$token" . "'>
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

// register
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
    if (!send_mail($data['email'], $token, "email_confirmation")) {
        echo 'mail_failed';
        exit;
    }
}

// login
if (isset($_POST['login'])) {
    $data = filteration($_POST);

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1", [$data['email_mob'], $data['email_mob']], "ss");

    if (mysqli_num_rows($u_exist) == 0) {
        echo 'inv_email_mob';
        // exit;
    } else {
        $u_fetch = mysqli_fetch_assoc($u_exist);
        if ($u_fetch['is_verified'] == 0) {
            echo 'not_verified';
        } else if ($u_fetch['status'] == 0) {
            echo 'inactive';
        } else {
            if (!password_verify($data['pass'], $u_fetch['password'])) {
                echo 'invalid_pass';
            } else {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['uId'] = $u_fetch['id'];
                $_SESSION['uName'] = $u_fetch['name'];
                $_SESSION['uPic'] = $u_fetch['profile'];
                $_SESSION['uPhone'] = $u_fetch['phonenum'];
                echo 1;
            }
        }
    }
}

// forgot password
if (isset($_POST['forgot_pass'])) {
    $data = filteration($_POST);

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? LIMIT 1", [$data['email']], "s");


    if (mysqli_num_rows($u_exist) == 0) {
        echo 'inv_email';
        exit;
    } else {
        $u_fetch = mysqli_fetch_assoc($u_exist);
        if ($u_fetch['is_verified'] == 0) {
            echo 'not_verified';
        } else if ($u_fetch['status'] == 0) {
            echo 'inactive';
        } else {
            // send reset link to email
            $token = bin2hex(random_bytes(16));

            $date = date("y-m-d");
            $query = mysqli_query($con, "UPDATE `user_cred` SET `token`='$token',`t_expire`='$date' WHERE `id`='$u_fetch[id]'");

            if ($query) {
                echo 1;
            } else {
                echo 'upd_failed';
            }

            if (!send_mail($data['email'], $token, 'account_recovery')) {
                echo 'mail_failed';
            }
        }
    }
}

// reset password
if (isset($_POST['recover_user'])) {
    $data = filteration($_POST);

    $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

    $query = "UPDATE `user_cred` SET `password`=?, `token`=?,`t_expire`=? WHERE `email`=? AND `token`=?";

    $values = [$enc_pass, null, null, $data['email'], $data['token']];

    if (update($query, $values, 'sssss')) {
        echo 1;
    } else {
        echo 'failed';
    }
}
