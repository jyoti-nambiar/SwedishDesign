<?php get_header(); ?>

<section class="brands" id="brands">
    <h1 class="title"><?php the_excerpt();    ?></h1>
    <article>
        <?php the_post_thumbnail(); ?>

        <ul class="meta">
            <li>
                <i class="fa fa-calendar"></i> <?php the_date();  ?>
            </li>

            <li>
                <i class="fa fa-tag"></i> <a href="<?php the_permalink()  ?>"></a>
            </li>
        </ul>
        <div class="blog-content"> <?php the_content();  ?></div>
    </article>









</section>

<?php get_footer(); ?>