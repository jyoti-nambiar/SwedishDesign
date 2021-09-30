<?php

get_header(); ?>
<main>
    <section>
        <div class="container">
            <div class="row">
                <?php if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part('template-parts/content', 'article');
                    }
                };
                ?>

            </div>
    </section>
</main>

<?php get_footer(); ?>