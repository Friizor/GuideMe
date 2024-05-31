<?php 
require_once ("../system/dataControlle.php"); 
//session_start();
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: ../system/reset-code.php');
            }
        }else{
            header('Location: ../system/user-otp.php');
        }
    }
}else{
    header('Location: ../system/login-user.php');
}
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
                            <a href="#" class="nav_link sublink">Boumerdes</a>
                            <a href="#" class="nav_link sublink">Alger</a>
                            <a href="#" class="nav_link sublink">Setif</a>
                            <a href="#" class="nav_link sublink">Tipaza</a>
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
                            <a href="#" class="nav_link sublink">Restaurants</a>
                            <a href="#" class="nav_link sublink">Cosmetics</a>
                            <a href="#" class="nav_link sublink">Clothing</a>
                            <a href="#" class="nav_link sublink">Grocery Stores</a>
                            <a href="#" class="nav_link sublink">Sell All Category</a>
                        </ul>
                    </li>
                    <li class="item">
                        <a href="../upload/upload.html" class="nav_link">
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
        <h1 style="font-weight: 200;">Upload New Post</h1>

        <form action="#" method="post" class="postForm">
            <label for="title">Article Title</label><br>
            <input type="text" name="title" id="title" placeholder="pleace set the article title"><br>

            <label for="discription">Discription</label><br>
            <textarea name="discri" id="discription" placeholder="Descripe the article in few line "></textarea>
            <div class="wil">
                <label for="wilaya">Wilaya :</label>
                <select name="wilaya" id="wilaya" class="select">
                    <option value="Alger">Alger</option>
                    <option value="Boumerdes">Boumerdes</option>
                    <option value="Setif">Setif</option>
                    <option value="Tipaza">Tipaza</option>
                </select>
            </div>

            <div class="cat">
                <label for="cat">Category :</label>
                <select name="cat" id="cat" class="select">
                    <option value="Restaurants">Restaurants</option>
                    <option value="Cosmetics">Cosmetics</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Grocery">Grocery</option>
                    <option value="Mall">Mall</option>
                    <option value="Park">Park</option>
                </select><br>
            </div>

            <div class="imagInput">
                <label for="pic1">Article Main Image :
                <input type="file" name="pic1" id="pic1"></label>
                <label for="pic2">First side Image :
                <input type="file" name="pic2" id="pic2"></label>
                <label for="pic3">Seconde side Image :
                <input type="file" name="pic3" id="pic3"></label>
                <label for="pic4">Third side Image :
                <input type="file" name="pic4" id="pic4"></label>
            </div>
            <input type="submit" value="Add">

        </form>
    </div>

    <script src="../Js/app.js"></script>
</body>

</html>