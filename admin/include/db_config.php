<?php

$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'project';

$con = mysqli_connect($hname, $uname, $pass, $db);

if (!$con) {
    die("cannot connect to database" . mysqli_connect_error());
}

// filteration

function filteration($data)
{
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
        $data[$key] = stripslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}

//  prepared

function select($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        // $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be prepared - select");
        }
    } else {
        die("Query cannot be executed - select");
    }
}

// update
function update($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be prepared - Update");
        }
    } else {
        die("Query cannot be executed - Update");
    }
}
