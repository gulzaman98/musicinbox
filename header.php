<?php
session_start();
include "connection.php";
if(!isset($_SESSION['user'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>One Music - Modern Music HTML5 Template</title>

    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="style.css">

    <style>
        .header-area {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.8); /* Background color scroll ke waqt nazar aane ke liye */
            transition: all 0.5s ease;
        }

        /* Jab scroll karein to background solid black ho jaye (optional) */
        .is-sticky .header-area {
            background-color: #000000;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Body ko thora niche se start karenge taake content navbar ke piche na chhup jaye */
        body {
            padding-top: 85px; 
        }

        @media only screen and (max-width: 767px) {
            body {
                padding-top: 70px;
            }
        }
    </style>
</head>

<body>
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <header class="header-area">
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <a href="home.php" class="nav-brand"><img src="images/logo3.png" alt="" style="width: 200px; height: auto"></a>

                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <div class="classy-menu">

                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <div class="classynav">
                                <ul>
                                    <li><a href="home.php">Home</a></li>
                                    <li><a href="year.php">Year</a></li>
                                    <li><a href="albums-store.php">Albums</a></li>
                                    <li><a href="artist.php">Artist</a></li>                                    
                                    <li><a href="songs.php">Songs</a></li>
                                    <li><a href="videosongs.php">Video Songs</a></li>
                                </ul>

                                <div class="login-register-cart-button d-flex align-items-center">
                                    <?php if(isset($_SESSION['user'])): ?>
                                        <div class="login-register-btn mr-50">
                                            <a href="logout.php" id="loginBtn">Logout</a>
                                        </div>  
                                    <?php else: ?>
                                        <div class="login-register-btn mr-50">
                                            <a href="login.php" id="loginBtn">Login / Register</a>
                                        </div>
                                    <?php endif; ?>                     
                                </div>
                            </div>
                            </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>