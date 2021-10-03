<?php /* Template Name: blogg */

get_header();

?>

<section class="blog-container" id="home">
    <div class="blog-container-text">
        <h1>Swedish<Span>Design</Span> Blog </h1>
        <p>The magazine for creative, dreamy people and foodie that is always constantly evolving. Serve yourself: dose of inspiration for unique and environmental friendly designs.</p>

        <ul class="inspiration-tags-header">
            <?php wp_nav_menu(
                array(
                    'menu' => 'Blog-category',
                    'container' => '',
                    'theme_location' => 'Blog Tertiary menu'
                )

            ); ?>

        </ul>
    </div>
</section>


<div class="most-recent">
    <h2>Our Latest trends in <Span>Comfort</Span> and <Span>Design</Span></h2>
    <?php
    $args = array(
        'post_type' => 'post'
    );

    $post_query = new WP_Query($args);

    if ($post_query->have_posts()) {
        while ($post_query->have_posts()) {
            $post_query->the_post();
    ?>

            <article class="post-1"><a href="<?php the_permalink();   ?>">
                    <div class="post-image"><?php the_post_thumbnail(); ?></div>
                    <div class="post-content">
                        <p class="post-category">
                            <?php the_excerpt();  ?>
                        </p><span class="post-category">

                            <?php the_category();  ?>

                        </span>
                    </div>
                </a></article>
    <?php
        }
    }
    ?>



</div>




<?php get_footer(); ?>