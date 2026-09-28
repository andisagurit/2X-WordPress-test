<?php
global $have_bg;
?>

<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3 <?php echo esc_attr($have_bg); ?>" style="z-index: 1000; background-color: rgba(3, 4, 15, 0.95); backdrop-filter: blur(5px);">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <?php
                if (function_exists('the_custom_logo') && has_custom_logo()) {
                    the_custom_logo();
                } else { ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand me-3" rel="home">
                        <img width="50" height="auto" src="<?php echo esc_url(get_theme_file_uri( 'images/the_iron_claw_syndicate_transparent_logo.png' )); ?>" class="custom-logo" alt="The Ironclaw Syndicate" decoding="async" fetchpriority="high">
                    </a>
                <?php } ?>
            
                <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                    <div class="top_branding me-4">
                        <?php if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title mb-0 fs-3 fw-bold text-uppercase"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-white text-decoration-none" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php else : ?>
                            <p class="site-title mb-0 fs-3 fw-bold text-uppercase"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-white text-decoration-none" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php endif; ?>
                
                        <?php
                            $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) :
                        ?>
                        <p class="site-description mb-0 small italic text-white">
                            <?php echo esc_html($description); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <button id="navbarToggle" class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- The WordPress Primary Menu -->
            <div id="navbarNav" class="collapse navbar-collapse justify-content-end">
                <?php
                if (has_nav_menu('top')):
                    /*uncomment to enable top submenu
                    wp_nav_menu(
                        array(
                            'menu' => 'Top Submenu',
                            'menu_class' => 'navbar-nav mb-md-1 mt-md-0 mb-3 mt-2 ml-auto d-none d-md-flex',
                            'container' => 'ul',
                        )
                    );
                    */
                    wp_nav_menu(
                        array(
                            'theme_location' => 'top',
                            'menu_class' => 'navbar-nav ms-auto align-items-lg-center gap-3',
                            'container' => 'ul',
                            //'container_class' => 'collapse navbar-collapse flex-column',
                            //'container_id' => 'navbarNav',
                            //'items_wrap' => '<ul class="nav your_custom_class">%3$s</ul>',
                            'depth' => 2,
                            'walker' => new Bootstrap_NavWalker(),
                            'fallback_cb' => 'Bootstrap_NavWalker::fallback',
                        )
                    );

                    /* mobile
                    wp_nav_menu(
                        array(
                            'menu' => 'Top Submenu',
                            'menu_class' => 'navbar-nav mb-md-1 mt-md-0 mb-3 mt-2 ml-auto d-flex d-md-none',
                            'container' => 'ul',
                        )
                    );
                    */
                endif;
                ?>
            </div>
        </div>
    </nav>
</header>

<script>
var $=jQuery.noConflict();

$(document).ready(function(){
    $('.navbar-toggler').click(function(){
        $(this).closest('.navbar-dark').toggleClass('bgfilled');
    });

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        //console.log('top: '+scroll);
        if (scroll >= 100) {
            $('.navbar').addClass('mbscrollbg');
        } else {
            $('.navbar').removeClass('mbscrollbg');
        }
    });

    //delay hover dropdown menu
    if ($(window).width() > 767) {
        /*
        $('#menu-top-menu .dropdown').click(function() {
            return false;
        });
        */
        // $('#menu-top-menu .dropdown').hover(function () {
        //     $(this).children('.sub-menu').stop(true, true).delay(500).fadeIn();
        // }, function () {
        //     $(this).children('.sub-menu').stop(true, true).delay(100).fadeOut();
        // });
    }
});
</script>