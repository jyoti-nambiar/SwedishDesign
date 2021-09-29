<?php get_header(); ?>
<section class="about" id="about">
    <div class="about-img">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        <ul> 
            <li>Opening Hours: </br> <?php the_field("opening_hours") ?> </li>
            <li>Adress: <?php the_field("address") ?> </li>
            <li>Phone: <?php the_field("phone") ?> </li>
        </ul>
    </div>
    <div class="about-text">
        <h2><?php the_title(); ?></h2>
        <p><?php the_content(); ?> </p>
    </div>
</section>

<?php get_footer(); ?>