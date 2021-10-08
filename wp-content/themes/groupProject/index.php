<?php

//silence

get_header();
?>



<!-- Home -->
<section class="home" id="home">

    <div class="container">
        <div class="row">
            <?php
            $arg = array(
                'post_type'         => 'slider',
                'posts_per_page'    => 4,
            );
            $slider = new WP_Query($arg);
            $j = 0;
            $post_count = wp_count_posts('slider')->publish;
            ?>
            <!-- Carousel -->

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->

                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < $post_count; $i++) : ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="active"></li>
                    <?php endfor; ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php while ($slider->have_posts()) : $slider->the_post(); ?>
                        <div class="carousel-item <?php echo $key == 0  ? "active" : "" ?>">
                            <?php if (has_post_thumbnail()) : the_post_thumbnail('slider');
                            endif; ?>

                            <!-- Static Header -->
                            <div class="header-text hidden-xs">
                                <div class="col-md-12 text-center">
                                    <h2>
                                        <span><strong><?php the_title() ?></strong></span>
                                    </h2>
                                    <br>
                                    <h3>
                                        <a href="<?php echo get_post_meta(get_the_ID(), '_slider_link_value_key', true); ?>"><?php the_excerpt(); ?></span></a>
                                    </h3>
                                </div>
                            </div><!-- /header-text -->
                        </div>
                    <?php $j++;
                    endwhile;
                    wp_reset_query(); ?>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div><!-- /carousel -->
        </div>
    </div>
</section>

<!-- Shop -->
<section class="shop" id="shop">

    <ul class="products">
        <div class="heading">
            <span>Featured products</span>
            <h2>Shop Now</h2>
        </div>
        <div class="shop-container">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 3,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                    ),
                ),
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) {
                while ($loop->have_posts()) : $loop->the_post();
            ?>
                    <div class="box">
                        <div class="box-img">
                            <?php global $product; ?>
                            <img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" />
                        </div>
                        <div class="title-price">
                            <h3><?php echo $product->post->post_title; ?></h3>
                            <span><?php echo $product->price; ?></span>

                        </div>
                    </div>

            <?php
                endwhile;
            } else {
                echo __('No products found');
            }
            wp_reset_postdata();
            ?>
    </ul>

    <!-- New Arrival -->

    <ul class="products">
        <div class="heading">
            <span>Our sofas</span>
            <h2>Shop Now</h2>
        </div>
        <div class="shop-container">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 3,
                'product_cat' => 'sofas'
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) {
                while ($loop->have_posts()) : $loop->the_post();
            ?>
                    <div class="box">
                        <div class="box-img">
                            <?php global $product; ?>
                            <img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" />
                        </div>
                        <div class="title-price">
                            <h3><?php echo $product->post->post_title; ?></h3>
                            <span><?php echo $product->price; ?></span>

                        </div>
                    </div>

            <?php
                endwhile;
            } else {
                echo __('No products found');
            }
            wp_reset_postdata();
            ?>
    </ul>

    <ul class="products">
        <div class="heading">
            <span>Our Blog</span>
            <h2>Get inspired</h2>
        </div>
        <div class="shop-container">
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
    );
    $loop = new WP_Query($args);
    if ($loop-> have_posts() ) {
	while ($loop-> have_posts() ) {
        $loop -> the_post(); 
        ?>
        <div class="box">
                        <div class="box-img">
                            <img src="<?php echo the_post_thumbnail_url() ?>" />
                        </div>
                        <div class="title-price">
                            <span><?php the_title(); ?></span>

                        </div>
                    </div>
        <?php
	} // end while
} // end if
?>
</div>
</ul>
    
    
    
</section>
<!-- About -->
<section class="about" id="about">
    <div class="about-img">
        <!--   <img src="<?php echo get_template_directory_uri() . 'img/about.jpg' ?>" alt=""> -->
    </div>
    <div class="about-text">
        <span>About Us</span>
        <h2>Furniture is important part <br>for comfort</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet, placeat praesentium. Quas quis, omnis repellendus reiciendis eius fuga quidem eum illum veniam explicabo excepturi fugit distinctio sequi quisquam quaerat dignissimos! Beatae delectus numquam perspiciatis.</p>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi ex aut repellat ipsum possimus delectus cum quaerat rerum?</p>
        <a href="#shop" class="btn">Learn More.</a>
    </div>
</section>
<!-- Brands -->
<section class="brands" id="brands">
    <div class="heading">
        <span>Brands</span>
        <h2>Our featured Items</h2>
    </div>
    <div class="brands-container">

        <!--    <img src="img/Google.png" alt="">
        <img src="img/amazon.png" alt="">
        <img src="img/netflix.png" alt="">
        <img src="img/tesla.png" alt="">
        <img src="img/starbucks.png" alt="">
        <img src="img/zoom.png" alt=""> -->
    </div>
</section>
<section class="newsletter" id="contact">
    <h2>Subscribe To Newsletter</h2>
    <div class="news-box">
        <input type="text" placeholder="Enter Your Email...">
        <a href="#" class="btn">Subscribe</a>
    </div>
</section>
<!-- Footer -->

<?php get_footer();  ?>