<?php get_header(); ?>
<section class="about" id="about">
    <div class="about-img">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        <ul> 
            <li>Adress: <?php echo get_post_meta($post->ID, "Address", true); ?> </li>
            <li>Phone: <?php echo get_post_meta($post->ID, "Phone", true); ?> </li>
        </ul>
    </div>
    <div class="about-text">
        <h2><?php the_title(); ?></h2>
        <p><?php the_content(); ?> </p>
        <a href="#shop" class="btn">Learn More.</a>
    </div>
</section>

<?php get_footer(); ?>