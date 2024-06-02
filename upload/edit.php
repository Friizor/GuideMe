<?php
require_once("../system/dataControlle.php");
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: ../system/reset-code.php');
            }
        } else {
            header('Location: ../system/user-otp.php');
        }
    }
} else {
    header('Location: ../system/login-user.php');
}


$title = $_POST['title'];
$descrip = $_POST['discrip'];
$wilaya = $_POST['Wilayas'];
$category = $_POST['Category'];
$phoneNumber = $_POST['phone'];
$emailAddress = $_POST['email'];
$address = $_POST['address'];

