</div> <!-- closes <div class=container"> -->

<!-- Footer -->
<footer id="footer" class="bg-black text-white text-md-left text-left py-5">
    <div class="container">

        <div class="row position-relative align-items-center pb-3">
            <div class="col-md-3 col-12 mb-3 mb-md-0">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/the_iron_claw_syndicate_transparent_logo.png' ); ?>" alt="logo" class="img-fluid" style="max-height: 120px;">
            </div>
            <div class="col-md-9 col-12">
                <p class="wp-block-paragraph"><strong>"Precision. Power. Paws."</strong></p>
                <p class="wp-block-paragraph"><em>Operating in the shadows so you can rule the light.</em></p>
                <?php if (is_active_sidebar('custom-footer-text-widget')): ?>
                    <div id="header-widget-area" class="chw-widget-area widget-area pt-3" role="complementary">
                        <?php dynamic_sidebar('custom-footer-text-widget');?>
                    </div>
                <?php endif;?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="footer-menu row pt-3 pb-3">
                    <?php hm_get_template_part('template-parts/navigation/navigation-footer');?>
                </div>
                <div class="socials">
                    <ul class="pl-0">
                        <li><a class="youtube" href="#" target="_blank" alt="Youtube"> <i class="visually-hidden sr-only">Youtube</i> </a></li>
                        <li><a class="twitter" href="#" target="_blank" alt="Twitter"> <i class="visually-hidden sr-only">Twitter or X</i> </a></li>
                        <li><a class="slideshare" href="#" target="_blank" alt="Slideshare"> <i class="visually-hidden sr-only">Slideshare</i> </a></li>
                        <li><a class="linkedin" href="#" target="_blank" alt="LinkedIn"> <i class="visually-hidden sr-only">Linkedin</i> </a></li>
                    </ul>
                </div>
                <div class="copyright pt3">
                    <?php hm_get_template_part('template-parts/navigation/navigation-below-footer');?>
                </div>
            </div>
        </div>

    </div>
</footer>

<?php wp_footer()?>
</body>

</html>