<?php
require_once("../system/dataControlle.php");
//session_start();
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

$idUser = $fetch_info['idUser'];

$sql = "SELECT * FROM posttable WHERE idUser = '$idUser'";

$rep = mysqli_query($con, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>GuideMe | Profile</title>
    <link rel="stylesheet" href="../css/mainStyle.css">
    <link rel="stylesheet" href="style.css">

    <link rel="shortcut icon" href="../items/favicon.png" type="image/png">

</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo_item">
                <i class="bx bx-menu" id="sidebarOpen"></i>
                <a href="../app/app.php" class="logolink">
                    <h3>Guide<font color="#ff7f50">Me.</font>
                    </h3>
                </a>
            </div>

            <div class="search_bar">
                <input type="text" placeholder="Search" />
            </div>

            <div class="navbar_content">
                <i class='bx bx-bell'></i>
                <a href="../profil/profile.php">
                    <img src="../items/Default_pfp.jpg" alt="" class="profile" />
                </a>
            </div>
        </nav>

        <nav class="sidebar">
            <div class="menu_content">
                <ul class="menu_items">
                    <div class="menu_title menu_dahsboard"></div>
                    <li class="item">
                        <a href="../app/app.php" class="nav_link">
                            <span class="navlink_icon">
                                <i class="bx bx-home-alt"></i>
                            </span>
                            <span class="navlink">Home</span>
                        </a>
                    </li>
                    <li class="item">
                        <div href="#" class="nav_link submenu_item">
                            <span class="navlink_icon">
                                <i class="bx bx-grid-alt"></i>
                            </span>
                            <span class="navlink">Wilayas</span>
                            <i class="bx bx-chevron-right arrow-left"></i>
                        </div>

                        <ul class="menu_items submenu">
                            <a href="../app/app.php?act=Boumerdes" class="nav_link sublink">Boumerdes</a>
                            <a href="../app/app.php?act=Alger" class="nav_link sublink">Alger</a>
                            <a href="../app/app.php?act=Setif" class="nav_link sublink">Setif</a>
                            <a href="../app/app.php?act=Tipaza" class="nav_link sublink">Tipaza</a>
                        </ul>
                    </li>
                </ul>

                <ul class="menu_items">
                    <div class="menu_title menu_editor"></div>
                    <li class="item">
                        <div href="#" class="nav_link submenu_item">
                            <span class="navlink_icon">
                                <i class="bx bx-filter"></i>
                            </span>
                            <span class="navlink">Filter</span>
                            <i class="bx bx-chevron-right arrow-left"></i>
                        </div>

                        <ul class="menu_items submenu">
                            <a href="../app/app.php?cat=Restaurants" class="nav_link sublink">Restaurants</a>
                            <a href="../app/app.php?cat=Cosmetics" class="nav_link sublink">Cosmetics</a>
                            <a href="../app/app.php?cat=Clothing" class="nav_link sublink">Clothing</a>
                            <a href="../app/app.php?cat=Grocery" class="nav_link sublink">Grocery Stores</a>
                            <a href="#" class="nav_link sublink">Sell All Category</a>
                        </ul>
                    </li>
                    <li class="item">
                        <a href="../upload/upload.php" class="nav_link">
                            <span class="navlink_icon">
                                <i class="bx bx-cloud-upload"></i>
                            </span>
                            <span class="navlink">Upload Post</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu_items">
                    <div class="menu_title menu_setting"></div>
                    <li class="item">
                        <a href="#" class="nav_link">
                            <span class="navlink_icon">
                                <i class='bx bxs-bell-ring'></i>
                            </span>
                            <span class="navlink">Notification</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="#" class="nav_link">
                            <span class="navlink_icon">
                                <i class="bx bx-cog"></i>
                            </span>
                            <span class="navlink">Setting</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="#" class="nav_link">
                            <span class="navlink_icon">
                                <i class="bx bx-layer"></i>
                            </span>
                            <span class="navlink">Features</span>
                        </a>
                    </li>
                </ul>

                <div class="bottom_content">
                    <div class="bottom expand_sidebar">
                        <span> Expand</span>
                        <i class='bx bx-log-in'></i>
                    </div>
                    <div class="bottom collapse_sidebar">
                        <span> Collapse</span>
                        <i class='bx bx-log-out'></i>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="content">
            <div class="mainInfo">
                <img src="../items/Default_pfp.jpg" alt="Profile Img" class="profile">
                <div class="personalInfo">
                    <div class="titel">
                        <h1><?php echo $fetch_info['name'] ?></h1>
                        <a href="">
                            <i class="bx bx-cog"></i>
                        </a>
                    </div>
                    <p><?php echo $fetch_info['email'] ?></p>
                    <a href="../system/logout-user.php">
                        <div class="log-out">
                            <button>Log Out<i class='bx bx-log-out-circle'></i></button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <h4><i>My Posts</i></h4>
        <div class="postContent">
            <?php
            while ($don = mysqli_fetch_assoc($rep)) { ?>
                <a href="../post/post.php?idPost=<?php echo $don['idPost'] ?>">
                    <div class="userPost">

                        <div class="postProfil">
                            <img src="../upload/postImages/<?php echo $don['mainPic'] ?>" alt="Post Image">
                        </div>
                        <div class="title">
                            <h4><?php echo $don['title'] ?></h4>
                            <span><?php echo $don['wilaya'] ?></span><br>
                            <a href="sup.php?idPost=<?php echo $don['idPost'] ?>">
                                <i class='bx bx-trash' style='color:#ff0000'></i>
                            </a>
                            <a href="edit.php?idPOst=<?php echo $don['idPost'] ?>">
                                <i class='bx bx-edit-alt' style='color:#41ff20'></i>
                            </a>
                        </div>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>

    <script src="../Js/app.js"></script>
</body>

</html>