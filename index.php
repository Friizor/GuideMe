<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guide Me</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="shortcut icon" href="items/favicon.png" type="image/png">
</head>

<body>
    <header>
        <nav class="navbar">
            <a class="logo" href="#">Guide<span>Me.</span></a>
            <ul class="menu-links">
                <span id="close-menu-btn" class="material-symbols-outlined">close</span>
                <li><a href="app/app.php?act=all">Home</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#footer">Service</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="#footer">Contact us</a></li>
            </ul>
            <span id="hamburger-btn" class="material-symbols-outlined">menu</span>
        </nav>
    </header>

    <section class="hero-section">
        <div class="content">
            <h2>All <font color="#ff7f50">Algeria</font> spots, In one place.</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam natus suscipit commodi adipisci est modi quas laudantium recusandae odio ullam quasi tenetur eos.
            </p>
            <a href="app/app.php?act=all"><button>Get Started</button></a>
        </div>
    </section>
    <div class="allemail" id="about">
        <div class='introduce'>
            <h1>Welcome To GuideMe</h1>
            <p>
                Uncover endless options at our website – your go-to guide for stores, cosmetics, restaurants, and more.
                Experience a curated collection, offering a seamless journey through a world of choices. Welcome to your
                ultimate online destination for all things extraordinary!
            </p>
        </div>
        <div class='shows'>
            <img src='items/guide3.jpg' alt='rest' />
            <div class='showsInfo'>
                <h2>All Stores You Need</h2>
                <p>Explore the best in restaurants,
                    cosmetics, stores, and more – all based on your preferences. <br>
                    <a href="system/login-user.php"><button>Start Now!</button></a>
                </p>
            </div>
        </div>
        <!-- <div class="subdiv">
            <p class="subtext">THE MOST GUIDEME OF THE SEASON IS IN OUR NEWSLETTER!</p>
            <input id="email" class="email" type="email" placeholder="Email address">
            <button class="subbutt">SUBSCRIBE</button>
        </div> -->
    </div>


    <!-- Footer -->

    <footer id="footer">
        <div class="content">
            <div class="left box">
                <div class="upper">
                    <div class="topic">About us</div>
                    <p>Uncover endless options at our website – your go-to guide for stores, cosmetics, restaurants, and more.
                        Experience a curated collection, offering a seamless journey through a world of choices. Welcome to your
                        ultimate online destination for all things extraordinary!</p>
                </div>
                <div class="lower">
                    <div class="topic">Contact us</div>
                    <div class="phone">
                        <a href="#"><i class="fas fa-phone-volume"></i>+213-551-571224</a>
                    </div>
                    <div class="email2">
                        <a href="#"><i class="fas fa-envelope"></i>guideme@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="middle box">
                <div class="topic">Our Services</div>
                <div><a href="#">Shops Address</a></div>
                <div><a href="#">Restaurants Address</a></div>
                <div><a href="#">Real Estate Agency</a></div>
                <div><a href="#">Cars Dealership</a></div>
                <div><a href="#">Tech Shop</a></div>
            </div>
            <div class="right box">
                <div class="topic">Subscribe us</div>
                <form action="#">
                    <input type="text" placeholder="Enter email address">
                    <input type="submit" name="" value="Send">
                    <div class="media-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </form>
            </div>
        </div>
        <div class="bottom">
            <p>Copyright © 2024 <a href="#">GuideMe</a> All rights reserved</p>
        </div>
    </footer>

    <script>
        const header = document.querySelector("header");
        const hamburgerBtn = document.querySelector("#hamburger-btn");
        const closeMenuBtn = document.querySelector("#close-menu-btn");

        // Toggle mobile menu on hamburger button click
        hamburgerBtn.addEventListener("click", () => header.classList.toggle("show-mobile-menu"));

        // Close mobile menu on close button click
        closeMenuBtn.addEventListener("click", () => hamburgerBtn.click());
    </script>

</body>

</html>
<!--  Made By Friizor & Islam Puth. 
      Copyright © 2024 Guide Me All rights reserved -->