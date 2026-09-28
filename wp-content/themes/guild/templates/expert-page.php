<?php
/* Template Name: Expert Page */
get_header();
$id = get_the_ID();
$page = get_post($id);
?>

<section class="bg-dark-blue">
    <div class="container text-white no-pad-gutters">
        <h3 class="text-uppercase mb-4"><?php echo $page->intro_title ?></h3>
        <div class="row">
            <div class="col-md-8 mb-4">
                <?php echo $page->post_content ?>
            </div>
        </div>
        <p class="mb-4">Filter to find the exact asset required for your contract.</p>
        
        <!--May implement the search and filter here-->
        <?php
        $industries = get_industries();
        $locations = get_locations();
        ?>
        <div class="filter-container mb-4">
            <form id="expert-filter-form" class="row g-3 align-items-center">
                <div class="col-md-3">
                    <select name="sector" id="filter-sector" class="form-select bg-dark text-white border-secondary rounded-pill px-3 shadow-sm">
                        <option value="">Sector</option>
                        <?php foreach ($industries as $ind) : ?>
                            <option value="<?php echo esc_attr($ind->ID); ?>"><?php echo esc_html($ind->post_title); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="location" id="filter-location" class="form-select bg-dark text-white border-secondary rounded-pill px-3 shadow-sm">
                        <option value="">Locations</option>
                        <?php foreach ($locations as $loc) : ?>
                            <option value="<?php echo esc_attr($loc->ID); ?>"><?php echo esc_html($loc->post_title); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="input-group shadow-sm">
                        <input type="text" name="custom_input" id="filter-search" class="form-control bg-dark text-white border-secondary rounded-start-pill ps-3" placeholder="Search operative...">
                        <button class="btn btn-success rounded-end-pill px-4" type="submit">
                            <i class="fa fa-search me-1"></i> Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!--May implement the experts profile list here-->
<div class="page-center py-5 bg-white text-dark">

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-5" id="expert-list">
        <?php
        $experts = get_experts();
        if (!empty($experts)) :
            foreach ($experts as $expert) :
                $query_id      = $expert->ID;
                $profile_image = get_field('profile_image', $query_id);
                $position      = get_field('position', $query_id);
                $location      = get_field('location', $query_id);
                $email         = get_field('email', $query_id);
                $contact       = get_field('contact_no', $query_id);
                $linkedin      = get_field('linkedin_url', $query_id);

                $img_src = '';
                if (is_array($profile_image)) {
                    $img_src = $profile_image['url'];
                } elseif (is_string($profile_image)) {
                    $img_src = $profile_image;
                }
        ?>
            <div class="col">
                <div class="team-box-inner text-center">
                    
                    <!-- profile image -->
                    <div class="team-img mb-3 position-relative rounded-circle mx-auto overflow-hidden shadow-sm" style="width: 220px; height: 220px;">
                        <a href="<?php echo esc_url(get_permalink($query_id)); ?>">
                            <?php if (!empty($img_src)) : ?>
                                <img src="<?php echo esc_url($img_src); ?>" class="img-fluid w-100 h-100 object-fit-cover" alt="<?php echo esc_attr($expert->post_title); ?>">
                            <?php endif; ?>
                        </a>
                    </div>

                    <!-- position / location -->
                    <div class="member-name fs-5 fw-bold mb-1">
                        <a href="<?php echo esc_url(get_permalink($query_id)); ?>" class="text-dark text-decoration-underline">
                            <?php echo esc_html($expert->post_title); ?>
                        </a>
                    </div>
                    
                    <div class="member-desigantion text-dark fs-6 mb-1">
                        <?php if (!empty($position)) : ?>
                            <?php echo esc_html($position); ?>
                        <?php endif; ?>
                    </div>
                    
                    <div class="member-address text-dark fst-italic mb-3 fs-6">
                        <?php if (is_object($location)) : ?>
                            <?php echo esc_html($location->post_title); ?>
                        <?php endif; ?>
                    </div>

                    <!-- socials -->
                    <div class="social-icons text-center">
                        <ul class="experts-socials list-inline p-0 m-0 d-flex justify-content-center gap-2">
                            <?php if ($email) : ?>
                                <li class="list-inline-item">
                                    <a href="mailto:<?php echo esc_attr($email); ?>" class="btn btn-success rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background-color: #0f8a5f; border: none;">
                                        <i class="fa fa-envelope text-white"></i>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if ($contact) : ?>
                                <li class="list-inline-item">
                                    <a href="tel:<?php echo esc_attr($contact); ?>" class="btn btn-success rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background-color: #0f8a5f; border: none;">
                                        <i class="fa fa-phone text-white"></i>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if ($linkedin) : ?>
                                <li class="list-inline-item">
                                    <a href="<?php echo esc_url($linkedin); ?>" target="_blank" class="btn btn-success rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background-color: #0f8a5f; border: none;">
                                        <i class="fab fa-linkedin-in text-white"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                </div>
            </div>
        <?php 
            endforeach;
        else :
            echo '<div class="col-12 text-center text-dark"><p>No Expert Found.</p></div>';
        endif;
        ?>
        </div>
    </div>
</div>

<!-- AJAX Script -->
<script>
jQuery(document).ready(function($) {
    function run_expert_filter() {
        var sector = $('#filter-sector').val();
        var location = $('#filter-location').val();
        var custom_input = $('#filter-search').val();

        $.ajax({
            url: ajax_object.ajaxurl,
            type: 'POST',
            data: {
                action: 'expert_filter',
                sector: sector,
                location: location,
                custom_input: custom_input
            },
            beforeSend: function() {
                $('#expert-list').css('opacity', '0.5');
            },
            success: function(response) {
                $('#expert-list').html(response).css('opacity', '1');
            }
        });
    }

    $('#filter-sector, #filter-location').on('change', function() {
        run_expert_filter();
    });

    $('#expert-filter-form').on('submit', function(e) {
        e.preventDefault();
        run_expert_filter();
    });
});
</script>

<?php
get_footer();
?>