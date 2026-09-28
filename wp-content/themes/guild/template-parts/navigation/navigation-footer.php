<?php if (is_active_sidebar('custom-footer1-widget')): ?>
    <div id="footer-widget-area_1" class="col-12 col-md-4 widget-area pt-3" role="complementary">
        <?php dynamic_sidebar('custom-footer1-widget');?>
    </div>
<?php else: ?>
    <div class="col-12 col-md-4 pt-3">
        <h5 class="text-uppercase fw-bold text-white mb-3">SECURE NAVIGATION</h5>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'footer',
            'menu_class'     => 'list-unstyled footer-links',
            'container'      => false,
            'fallback_cb'    => false,
        ));
        ?>
    </div>
<?php endif;?>

<?php if (is_active_sidebar('custom-footer2-widget')): ?>
    <div id="footer-widget-area_2" class="col-12 col-md-4 widget-area pt-3" role="complementary">
        <?php dynamic_sidebar('custom-footer2-widget');?>
    </div>
<?php else: ?>
    <div class="col-12 col-md-4 pt-3">
        <h5 class="text-uppercase fw-bold text-white mb-3">CLIENT RESOURCES & PROTOCOLS</h5>
        <p class="wp-block-paragraph"><strong>Collateral Damage Waivers:</strong> Legal absolutions regarding localized explosions, shredded furniture, and missing magical artifacts.</p>
        <p class="wp-block-paragraph"><strong>Client Anonymity Protocol (Privacy Policy):</strong> We do not track you. We do not name you. If anyone asks, we were never here.</p>
    </div>
<?php endif;?>

<?php if (is_active_sidebar('custom-footer3-widget')): ?>
    <div id="footer-widget-area_3" class="col-12 col-md-4 widget-area pt-3" role="complementary">
        <?php dynamic_sidebar('custom-footer3-widget');?>
    </div>
<?php else: ?>
    <div class="col-12 col-md-4 pt-3 text-white">
        <h5 class="text-uppercase fw-bold text-white">ENCRYPTED COMMS</h5>
        <p class="wp-block-paragraph"><strong class="text-white">Standard Dispatch:</strong> +1-800-IRON-CLAW</p>
        <p class="wp-block-paragraph"><strong class="text-white">Dark Web Relay:</strong> <span class="text-danger fw-semibold">ironclaw.mercenary.onion</span></p>
        
        <div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
            <div class="wp-block-button wp-states-4915bf1f mt-3">
                <a class="wp-block-button__link wp-element-button" href="#">
                    INITIATE OMEGA -LEVEL PING
                </a>
            </div>
        </div>

        <p class="wp-block-paragraph mt-3">
            <em>(Warning: Premium surcharge applies for active combat extractions.)</em>
        </p>
    </div>
<?php endif;?>