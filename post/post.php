<?php
require "../system/dataControlle.php";

$idPost = null;

if (isset($_GET['idPost'])) {
  $idPost =  $_GET['idPost'];
} else {
  header('location: ../app/app.php');
}


$sqlselect = "SELECT * FROM posttable WHERE idPost = '$idPost'";
$rep = mysqli_query($con, $sqlselect);

$don = mysqli_fetch_assoc($rep);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Article</title>

  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />



  <link rel="stylesheet" href="../css/mainStyle.css">
  <link rel="stylesheet" href="style.css">


  <link rel="shortcut icon" href="../items/favicon.png" type="image/png">

</head>

<!-- this page is not responsive yet -->

<>
  <header>
    <nav class="navbar px-3">
      <div class="logo_item">
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
  </header>
  <div class="postContainer">
    <div class="article">
      <div class="leftSide">
        <img src="../upload/postImages/<?php echo $don['mainPic'] ?>" class="mainImg" id="mainpic" alt="Article Picture">
        <div class="sideImg">
          <img src="../upload/postImages/<?php echo $don['sidePic1'] ?>" id="sidePic1" alt="Article Picture">
          <img src="../upload/postImages/<?php echo $don['sidePic2'] ?>" id="sidePic2" alt="Article Picture">
          <img src="../upload/postImages/<?php echo $don['sidePic3'] ?>" id="sidePic3" alt="Article Picture">
        </div>

        <!-- Like reaction -->
        <div class="reactions">
          <div class="likeDiv">
            <img src="like.png" alt="like" />
            <b>0 Likes</b> <!-- Replace 0 with the actual count variable in your JavaScript -->
          </div>

          <!-- Write review -->
          <div class="reviewDiv">
            <img src="yellowstar.png" alt="review" />
            <b>Write a review</b>
          </div>

          <!-- Share -->
          <div class="shareDiv">
            <img src="share.png" alt="share" />
            <b>Share</b>
          </div>

          <!-- Save -->
          <div class="saveDiv">
            <img src="save2.png" alt="save" />
            <b>Save</b>
          </div>
        </div>



      </div>



      <div class="innerInfo">
        <h1 id="title"><?php echo $don['title'] ?></h1>
        <div class="itemRatingContainer">
          <div class="rating">
            <img src="yellowstar.png" alt="yellowstar" />
            <img src="yellowstar.png" alt="yellowstar" />
            <img src="yellowstar.png" alt="yellowstar" />
            <img src="yellowstar.png" alt="yellowstar" />
            <img src="yellowstar.png" alt="yellowstar" />
          </div>
          <b id="reviews">4.7</b>
          <span id="reviewscount" class="itemReviews">(718 Reviews)</span>
        </div>
        <div class="closingDiv">
          <span id="online">Open</span>
          <span class="time">Until 5:30 PM</span>
        </div>
        <p class="innerdescreption">
          Welcome to <?php echo $don['title'] ?> — your destination for quality [products or services]. Explore our curated
          selection of [highlighted product categories], each handpicked to meet your unique needs. Whether you're
          searching for [specific items] or the latest trends, we have something for everyone.
        </p>
        <div class="reserve">
          <h3>Location and contact</h3>
          <div class="location">
            <img src="location.png" alt="location" />
            <p class="itemsWilaya"><?php echo $don['address'] ?></p>
          </div>
          <div class="location">
            <img src="e-mail.png" alt="location" />
            <p class="itemsWilaya"><?php echo $don['emailAddress'] ?></p>
          </div>
          <div class="phone">
            <img src="phone.png" alt="phone" />
            <p class="itemsWilaya"><?php echo $don['phoneNumber'] ?></p>
          </div>
          <b>Price Range</b>
          <span>600 DA - 3900 DA</span>
          <b>Cuisines</b>
          <span>Algerian, Boumerdasian, Japanese</span>
          <button>Call Now</button>
        </div>
      </div>
    </div>
  </div>
  </body>

</html>