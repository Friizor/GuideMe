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


function generateUniqueId()
{
    $timestamp = round(microtime(true) * 1000);

    $randomNumber = rand(1000, 9999);

    $uniqueId = $timestamp . $randomNumber;

    if (strlen($uniqueId) > 16) {
        $uniqueId = substr($uniqueId, 0, 16);
    }

    if (strlen($uniqueId) < 16) {
        $uniqueId = str_pad($uniqueId, 16, "0", STR_PAD_LEFT);
    }

    return $uniqueId;
}

$idPost = generateUniqueId();
$idUser = $fetch_info['idUser'];
$title = $_POST['title'];
$descrip = $_POST['discrip'];
$wilaya = $_POST['Wilayas'];
$category = $_POST['Category'];
$phoneNumber = $_POST['phone'];
$emailAddress = $_POST['email'];
$address = $_POST['address'];

//echo $idPost . " " . $idUser . " " . $title . " " . $descrip . " " . $wilaya . " " . $category . " " . $phoneNumber . " " . $emailAddress . " " . $address;


//mainImg
$file_name = $_FILES['mainImg']['name'];
$tempname = $_FILES['mainImg']['tmp_name'];

//sideImg1

$file_name1 = $_FILES['sidebar']['name'];
$tempname1 = $_FILES['sidebar']['tmp_name'];

//sideImg2

$file_name2 = $_FILES['sidebar2']['name'];
$tempname2 = $_FILES['sidebar2']['tmp_name'];

//sideImg3

$file_name3 = $_FILES['sidebar3']['name'];
$tempname3 = $_FILES['sidebar3']['tmp_name'];


//echo $file_name . '<br>' . $tempname . '<br>' . $file_name1 . '<br>' . $tempname1 . '<br>'  . $file_name2 . '<br>' . $tempname2 . '<br>' . $file_name3 . '<br>' . $tempname3 ;

$folder = 'postImages/' . $file_name;
$folder1 = 'postImages/' . $file_name1;
$folder2 = 'postImages/' . $file_name2;
$folder3 = 'postImages/' . $file_name3;

move_uploaded_file($tempname, $folder);
move_uploaded_file($tempname1, $folder1);
move_uploaded_file($tempname2, $folder2);
move_uploaded_file($tempname3, $folder3);


$insert_data = 
                "INSERT INTO `posttable`(`idUser`, `idPost`, `title`, `description`, `wilaya`, `category`, `phoneNumber`, `emailAddress`, `address`, `mainPic`, `sidePic1`, `sidePic2`, `sidePic3`) 
                VALUES ('$idUser','$idPost','$title','$descrip','$wilaya','$category','$phoneNumber','$emailAddress','$address','$file_name','$file_name1','$file_name2','$file_name3')";
$data_check = mysqli_query($con, $insert_data);

header('location: ../app/app.php');

