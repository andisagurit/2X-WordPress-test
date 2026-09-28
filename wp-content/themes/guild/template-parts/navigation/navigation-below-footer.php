<!-- The WordPress Primary Menu -->
 <div class="d-flex flex-wrap align-items-center text-white mb-2 word-spacing-normal">
    <?php 
    $locations = get_nav_menu_locations();
    if (isset($locations['below_footer'])) {
        $menu_items = wp_get_nav_menu_items($locations['below_footer']);
        if ($menu_items) {
            foreach ($menu_items as $item) {
                echo '<a href="' . esc_url($item->url) . '" class="text-white text-decoration-none me-2">' . esc_html($item->title) . '</a>';
                echo '<span class="text-secondary me-2">|</span>';
            }
        }
    }
    ?>

    <span class="copy_text">Copyright &copy; <?php echo date('Y'); ?> The Ironclaw Syndicate. All rights reserved.</span>
</div>

<p class="fst-italic word-spacing-normal">Unauthorized scraping of this database will result in immediate deployment of a Tier 3 tracking unit. Trespassers will be scratched.</p>