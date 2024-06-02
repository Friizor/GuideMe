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

$action = '';

if (isset($_GET['idPost'])) {
    $action = 'edit';
    $idPost = $_GET['idPost'];
    $sql = "SELECT * FROM posttable WHERE idPost = '$idPost'";
    $rep = mysqli_query($con, $sql);
    $don = mysqli_fetch_assoc($rep);
} else {
    $action = 'add';
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
        <div class="postUpload">
            <h2>Add Article</h2>
            <form action="<?php echo $action == 'edit' ? 'edit.php' : 'articleAdd.php' ;?>" method="post" enctype="multipart/form-data">
                <div class="postForm">
                    <div class="postInfo">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" placeholder="Article title..." value="<?php echo isset($don['title']) ? $don['title'] : ''; ?>" required>
                        <label for="discrip">Description</label>
                        <input type="text" name="discrip" id="discrip" placeholder="Descripe your article..." value="<?php echo isset($don['description']) ? $don['description'] : ''; ?>" required>
                        <div class="option">
                            <label for="Wil">Wilayas</label>
                            <select name="Wilayas" id="Wil" class="postSelect">
                                <option value="<?php echo isset($don['wilaya']) ? $don['wilaya'] : 'undefined' ?>">
                                    <?php echo isset($don['wilaya']) ? $don['wilaya'] : 'set wilaya' ?>
                                </option>
                                <option value="Boumerdes">Boumerdes</option>
                                <option value="Alger">Alger</option>
                                <option value="Setif">Setif</option>
                                <option value="Tipaza">Tipaza</option>
                            </select>
                            <label for="cat">Category</label>
                            <select name="Category" id="cat" class="postSelect">
                                <option value="<?php echo isset($don['category']) ? $don['category'] : 'undefined' ?>">
                                    <?php echo isset($don['category']) ? $don['category'] : 'set category' ?>
                                </option>
                                <option value="Restaurants">Restaurants</option>
                                <option value="Cosmetics">Cosmetics</option>
                                <option value="Clothing">Clothing</option>
                                <option value="Grocery">Grocery Stores</option>
                            </select>
                        </div>
                    </div>
                    <div class="contact">
                        <label for="phone">Phone Number</label>
                        <input type="number" name="phone" id="phone" placeholder="contact number" value="<?php echo isset($don['phoneNumber']) ? $don['phoneNumber'] : ''; ?>" required>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="contact email..." value="<?php echo isset($don['emailAddress']) ? $don['emailAddress'] : ''; ?>" required>
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" placeholder="Please enter a google map link..." value="<?php echo isset($don['address']) ? $don['address'] : ''; ?>" required>
                    </div>
                </div>
                <div class="postimg">
                    <div class="sideImgDiv">
                        <label for="mainImg">Main Picture</label>
                        <input type="file" name="mainImg" id="mainImg" required>
                        <label for="sidePic">Side Picture</label>
                        <input type="file" name="sidebar" id="sidebar" required>
                    </div>
                    <div>
                        <label for="sidePic2">Side Picture</label>
                        <input type="file" name="sidebar2" id="sidebar2" required>
                        <label for="sidePic3">Side Picture</label>
                        <input type="file" name="sidebar3" id="sidebar3" required>
                    </div>
                </div>

                <input type="submit" name="submit" id="submit" value="Add">
            </form>
        </div>
    </div>

    <script src="../Js/app.js"></script>
    <script>
        const inputField = document.getElementById("phone"); 

        inputField.addEventListener("input", function() {
            if (this.value.length > 10) {
                this.value = this.value.slice(0, 10);
            }

            this.value = this.value.replace(/[^0-9-]/g, "");
        });
    </script>
</body>

</html>