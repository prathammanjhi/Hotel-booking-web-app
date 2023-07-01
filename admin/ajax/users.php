<?php

require('../include/db_config.php');
require('../include/essentials.php');
adminLogin();

if (isset($_POST['get_users'])) {

    $res = selectAll('user_cred');
    $i = 1;
    $path = USERS_IMG_PATH;

    $data = "";

    while ($row = mysqli_fetch_assoc($res)) {

        $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm'>
        <i class='bi bi-trash'></i> 
        </button>";
        $verified = "<span class = 'badge bg-warning'><i class= 'bi bi-x-lg'></i></span>";

        if ($row['is_verified']) {
            $verified = "<span class = 'badge bg-success'><i class= 'bi bi-check-lg'></i></span>";
            $del_btn = "";
        }

        $status = "<button onclick = 'toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>active</button>";

        if (!$row['status']) {
            $status = "<button onclick = 'toggle_status($row[id],1)' class='btn btn-danger btn-sm shadow-none'>Inactive</button>";
        }

        $date = date("d-m-y", strtotime($row['datentime']));

        $data .= "
            <tr>
                <td>$i</td>
                <td></td>
                <td>
                    <img src='$path$row[profile]' width = '55px'>
                    <br>
                    $row[name]
                </td>
                <td></td>
                <td>$row[email]</td>
                <td></td>
                <td>$row[phonenum]</td>
                <td></td>
                <td>$row[address] | $row[pincode]</td>
                <td></td>
                <td>$row[dob]</td> 
                <td></td>
                <td>$verified</td> 
                <td></td>
                <td>$status</td> 
                <td></td>
                <td>$date</td> 
                <td></td>
                <td>$del_btn</td> 
                <td></td>
            </tr>
        ";
        $i++;
    }
    echo $data;
}

if (isset($_POST['toggle_status'])) {
    $frm_data = filteration($_POST);

    $q = "UPDATE `user_cred` SET `status`=? WHERE `id`=?";
    $v = [$frm_data['value'], $frm_data['toggle_status']];

    if (update($q, $v, 'ii')) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['remove_user'])) {
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `room_images` WHERE `room_id`=?", [$frm_data['room_id']], 'i');

    $res = delete("DELETE FROM `user_cred` WHERE `id`=? AND `is_verified`=?", [$frm_data['user_id'], 0], 'ii');

    if ($res) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['search_users'])) {

    $frm_data = filteration($_POST);

    $query = "SELECT * FROM `user_cred` WHERE `name` LIKE ?";

    $res = select($query, ["%$frm_data[name]%"], 's');
    // % lets us search the alphabet even in mid or last or say at any place
    $i = 1;
    $path = USERS_IMG_PATH;

    $data = "";

    while ($row = mysqli_fetch_assoc($res)) {

        $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm'>
        <i class='bi bi-trash'></i> 
        </button>";
        $verified = "<span class = 'badge bg-warning'><i class= 'bi bi-x-lg'></i></span>";

        if ($row['is_verified']) {
            $verified = "<span class = 'badge bg-success'><i class= 'bi bi-check-lg'></i></span>";
            $del_btn = "";
        }

        $status = "<button onclick = 'toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>active</button>";

        if (!$row['status']) {
            $status = "<button onclick = 'toggle_status($row[id],1)' class='btn btn-danger btn-sm shadow-none'>Inactive</button>";
        }

        $date = date("d-m-y", strtotime($row['datentime']));

        $data .= "
            <tr>
                <td>$i</td>
                <td></td>
                <td>
                    <img src='$path$row[profile]' width = '55px'>
                    <br>
                    $row[name]
                </td>
                <td></td>
                <td>$row[email]</td>
                <td></td>
                <td>$row[phonenum]</td>
                <td></td>
                <td>$row[address] | $row[pincode]</td>
                <td></td>
                <td>$row[dob]</td> 
                <td></td>
                <td>$verified</td> 
                <td></td>
                <td>$status</td> 
                <td></td>
                <td>$date</td> 
                <td></td>
                <td>$del_btn</td> 
                <td></td>
            </tr>
        ";
        $i++;
    }
    echo $data;
}
