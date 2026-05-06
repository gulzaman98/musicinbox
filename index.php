<?php
session_start();
if(isset($_SESSION['user'])){
    header("location:home.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>One Music - Modern Music HTML5 Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <!-- Nav brand -->
                        <a href="index.html" class="nav-brand"><img src="images/logo.png" alt="logo"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="index.php">Year</a>
                                        <ul class="dropdown">
                                            <li><a href="index.php">2024</a></li>
                                            <li><a href="index.php">2023</a></li>
                                            <li><a href="index.php">2022</a></li>
                                            <li><a href="index.php">2021</a></li>
                                    
                                                    </li>
                                                   
                                               
                                            </li>
                                        </ul>
                                    
                                    <li><a href="index.php">Albums</a>
                                        <ul class="dropdown">
                                            <li><a href="index.php">Classic</a></li>
                                            <li><a href="index.php">Lollywood</a></li>
                                            <li><a href="index.php">Bollywood</a></li>
                                            <li><a href="index.php">Hollywood</a></li>
                                    
                                                    </li>
                                                   
                                               
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="index.php">Artist</a>
                                        <ul class="dropdown">
                                            <li><a href="index.php">Atif Aslam</a></li>
                                            <li><a href="index.php">Kaifi Khalil</a></li>
                                            <li><a href="index.php">Asim Azhar</a></li>
                                            <li><a href="index.php">Ali Zafar</a></li>
                                            <li><a href="index.php">Rahat Fateh</a></li>
                                            <li><a href="index.php">Talha Anjum</a></li>
                                            <li><a href="index.php">Arjeet Singh</a></li>
                                            <li><a href="index.php">justin Bieber</a></li>
                                    
                                                    </li>
                                                   
                                               
                                            </li>
                                        </ul>
                                    
                                    <li><a href="index.php">News</a></li>
                                    <li><a href="index.php">Contact</a></li>
                                </ul>

                                <!-- Login/Register & Cart Button -->
                                <div class="login-register-cart-button d-flex align-items-center">
                                    <!-- Login/Register -->

                                    <?php
                                    if(isset($_SESSION['user'])){
                                        ?>
                                                                                                        <div class="login-register-btn mr-50">
                                        <a href="logout.php" id="loginBtn">Logout</a>
                                    </div>  
                                        <?php
                                    }else{
                                        ?>
                                        <div class="login-register-btn mr-50">
                                        <a href="login.php#login" id="loginBtn">Login / Register</a>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                  

                                    <!-- Cart Button -->
                                    <div class="cart-btn">
                                        <p><span class="icon-shopping-cart"></span> <span class="quantity">1</span></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->



    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/bg-1.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Beyond Time <span>Beyond Time</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="login.php" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/bg-2.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Colorlib Music <span>Colorlib Music</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <?php

    include "footer.php";
    ?>