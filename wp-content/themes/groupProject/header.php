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
    <link href="<?php bloginfo('template_directory') ?>/../../plugins/woocommerce/assets/css/woocommerce.css" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body class="woocommerce">
    <!-- Navbar -->
    <header>
        <a href="#" class="logo">Swedish <span>Design</span></a>
        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="menu">
            <?php wp_nav_menu(
                array(
                    'menu' => 'primary',
                    'container' => '',
                    'theme_location' => 'primary'
                )

            ); ?>

        </ul>
    </header>