<?php
/*
Template Name: Stores
*/
?>

<?php get_header(); ?>

<?php
$loop = new WP_Query( array(
    "post_type" => "Stores",
    "posts_per_page" => -1
  )
);
?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


<section class="about" id="about">
    <div class="about-img">
    <h2 class="title">
        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
    <a class="img-link" href="<?php echo get_permalink(); ?>">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        </a>
        <ul> 
            <li>Opening Hours: </br> <?php the_field("opening_hours") ?> </li>
            <li>Adress: <?php the_field("address") ?> </li>
            <li>Phone: <?php the_field("phone") ?> </li>
        </ul>
    </div>
    <div class="about-text">
        <div class="iframe">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2036.1681068359628!2d18.07441755166119!3d59.313449819247786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465f77fa0779c529%3A0x7285f61b506c9df9!2sStalands%20Furniture%20S%C3%B6dermalm!5e0!3m2!1sen!2sma!4v1632846213708!5m2!1sen!2sma" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
    </iframe>
        </div>
    </div>
</section>

<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>