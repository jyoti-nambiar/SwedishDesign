<?php


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Furniture Website</title>
    <!-- LInk To CSS -->

    <?php wp_head(); ?>
</head>

<body>
    <!-- Navbar -->
    <header>
        <a href="#" class="logo">Swedish <span>Design</span></a>
        <div class="bx bx-menu" id="menu-icon"></div>

<<<<<<< HEAD
        <ul class="navbar">
            <li><a href="#home">Home</a></li>
            <li><a href="#shop">Shop</a></li>
            <li><a href="#new">Our Stores</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#brands">Our Partners</a></li>
            <li><a href="#contact">Contact</a></li>
=======
        <ul class="menu">
            <?php wp_nav_menu(
                array(
                    'menu' => 'primary',
                    'container' => '',
                    'theme_location' => 'primary'
                )

            ); ?>

>>>>>>> 7aa7a40b4b7de02e2d4f0079155fee175683e313
        </ul>
    </header>