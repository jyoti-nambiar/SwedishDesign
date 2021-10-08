<?php
/* Template Name: Kontakt */
get_header();
?>
<!-- div class = "main-kontakt" style = "background-image: url(< ?php echo get_home_url(); ?>/wp-content/uploads/2021/09/carlos-muza-hpjSkU2UYSU-unsplash.jpg);"> -->


<div class = "main-kontakt">
    <div class = "welcome-message">
        <h1>Welcome to contact us</h1>
    </div>

      
        <div class = "title">
                <h2>Vi tar hand om dina skadade möbelprodukter, sen levers och andra frågor du kanske har.</h2>
        </div>

    <div class = "contact-form">
            <?php echo do_shortcode('[contact-form-7 id="9" title="Contact form 1"]'); ?>
    </div>

    <div class = "carousell">
        <div class = "div1">
            <img src = "<?php echo get_home_url(); ?>/wp-content/uploads/2021/10/Telephone-lur.png" style = "width: 40px; height: 40px;"></img>
            <a class = "cta-button" href = "tel:0720412325">Call us</a>
        </div>
        <div class = "div2">
            <img src = "<?php echo get_home_url(); ?>/wp-content/uploads/2021/10/facebook-logo-icon-file-facebook-icon-svg-wikimedia-commons-4.png" style = "width: 40px; height: 40px;"></img>
            <a class = "cta-button" href = "tel:0720412325">Facebook</a>
        </div>
        <div class = "div3">
            <img src = "<?php echo get_home_url(); ?>/wp-content/uploads/2021/10/Gmail.png" style = "width: 40px; height: 40px;"></img>
            <a class = "cta-button" href = "tel:0720412325">Mail us</a>
        </div>
    </div>

    <div class = "map">
    <h3>Besök oss på andresen: Drottninggatan 20</h3>
    <h3> Ring oss på: 07311122233</h3>
 
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2034.8621288142497!2d18.057571715468608!3d59.33525561759025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465f9d6716950965%3A0xc11128d6686af2a0!2sDrottninggatan%2067%2C%20111%2036%20Stockholm!5e0!3m2!1sen!2sse!4v1632832159002!5m2!1sen!2sse" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
<?php



get_footer();