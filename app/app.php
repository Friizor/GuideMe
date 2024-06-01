<?php
require "../system/dataControlle.php";



if (isset($_GET['act'])) {
  $actionplace = $_GET['act'];
} else {
  $actionplace = 'all';
}

$sqlPost = "";

if ($actionplace == 'all') {
  $sqlPost = "SELECT * FROM posttable";
} elseif ($actionplace == 'Boumerdes') {
  $sqlPost = "SELECT * FROM posttable WHERE wilaya = '$actionplace'";
} elseif ($actionplace == 'Alger') {
  $sqlPost = "SELECT * FROM posttable WHERE wilaya = '$actionplace'";
} elseif ($actionplace == 'Tipaza') {
  $sqlPost = "SELECT * FROM posttable WHERE wilaya = '$actionplace'";
} elseif ($actionplace == 'Setif') {
  $sqlPost = "SELECT * FROM posttable WHERE wilaya = '$actionplace'";
}

$res = mysqli_query($con, $sqlPost);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>GuideMe | Home</title>
  <link rel="stylesheet" href="../css/mainStyle.css">
  <link rel="stylesheet" href="../css/sideStyle2.css">
  <link rel="shortcut icon" href="../items/favicon.png" type="image/png">
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        <h3>Guide<font color="#ff7f50">Me.</font>
        </h3>
      </div>

      <div class="search_bar">
        <input type="text" placeholder="Search" />
        <div class="searchIcon">
          <img src="search.png" alt="">
        </div>
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
              <a href="app.php?act=Boumerdes" class="nav_link sublink">Boumerdes</a>
              <a href="app.php?act=Alger" class="nav_link sublink">Alger</a>
              <a href="app.php?act=Setif" class="nav_link sublink">Setif</a>
              <a href="app.php?act=Tipaza" class="nav_link sublink">Tipaza</a>
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
    <ul class="category-container">
      <a href="#">
        <li class="category">All</li>
      </a>
      <a href="#">
        <li class="category">Most Visited</li>
      </a>
      <a href="#">
        <li class="category">New </li>
      </a>
      <a href="#">
        <li class="category">Top 10 </li>
      </a>
    </ul>


    <div class="card-list">
    
      <?php
          while($don = mysqli_fetch_assoc($res)){ ?>

    
      <!-- item starting  -->
        <div class="trend">
          <div class="trendImg">
            <img src="../upload/postImages/<?php echo $don['mainPic'] ?>"  >
            <div class="upp"></div>
          </div>
          <div class="trendInfo">
            <h3><?php echo $don['title'] ?></h3>
            <div class="ratingContainer">
              <div class="rating">
                <img src="yellowstar.png" alt="yellowstar" />
                <img src="yellowstar.png" alt="yellowstar" />
                <img src="yellowstar.png" alt="yellowstar" />
                <img src="yellowstar.png" alt="yellowstar" />
                <img src="yellowstar.png" alt="yellowstar" />
              </div>
              <b>4.9</b> <span class="ratingSpan">718 Reviews</span>
            </div>
            <span class="trendWilaya"><?php echo $don['wilaya'] ?></span>
            <div class="closingDiv">
              <span class="open">
                Open
              </span>
              <p>Until 5:30 PM</p>
            </div>
          </div>
        </div>
        <?php
          }
        ?>

    </div>
  </div>

  <script src="../Js/app.js"></script>
</body>

</html>

<!--  Made By Friizor & Islam Puth. 
      Copyright © 2024 Guide Me All rights reserved -->