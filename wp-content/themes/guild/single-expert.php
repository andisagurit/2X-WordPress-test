<?php
/*
Template Post Type: expert
*/
get_header();
$id = get_the_ID();
$expert = get_expert($id);
// $industry_expertises = maybe_unserialize($expert->industry_expertise);
// echo '<pre>';
$page_slug = 'team';
$teams_page = get_page_by_path( $page_slug, OBJECT, 'page' );
$teams_page_url = $teams_page ? get_permalink( $teams_page->ID ) : home_url('/team/');
?>

<section>
    <div class="container no-pad-gutters">
        <div class="back mb-4 mb-md-5">
            <i class="fa fa-caret-left align-bottom" style="font-size: 22px;" aria-hidden="true"></i> <a
                href="<?php echo $teams_page_url; ?>" class="btn-outline-success text-uppercase px-0 ml-2">Back to team</a>
        </div>
        <!--May implement the expert's profile here -->
        <div class="row">
            <div class="col-md-4 team-left">
                <div class="team-bg-img">
                    <?php 
                    $profile_image = get_field('profile_image', $id);
                    
                    if (!empty($profile_image)) {
                        if (is_array($profile_image)) {
                            echo wp_get_attachment_image(
                                $profile_image['ID'] ? $profile_image['ID'] : $profile_image['id'],
                                'full', 
                                false, 
                                [
                                    "class" => "single-expert-img",
                                    "alt"=> esc_attr($expert->post_title)
                                ] 
                            );
                        } else {
                            echo '<img src="' . esc_url($profile_image) . '" class="single-expert-img" alt="' . esc_attr($expert->post_title) . '">';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-8 team-right">
                <div class="profile-title">
                    <h1 class=""><?= $expert->post_title; ?></h1>
                </div>
                <div class="profile-designation">
                    <h6 class=""><?php 
                        $position = get_field('position', $id) ? get_field('position', $id) : get_field('title', $id);
                        echo esc_html($position); 
                    ?></h6>
                </div>
                <div class="city-title">
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php 
                        $location = get_field('location', $id);
                        if (is_object($location)) {
                            echo esc_html($location->post_title);
                        }
                    ?></p>
                </div>
                <div class="social-icon mb-4">
                    <ul class="experts-socials list-inline p-0 m-0 d-flex justify-content-start align-items-center gap-2">
                        <?php if ($email = get_field('email', $id)) : ?>
                            <li class="list-inline-item">
                                <a href="mailto:<?php echo esc_attr($email); ?>" class="btn rounded-circle d-flex align-items-center justify-content-center p-0" style="width: 36px; height: 36px; background-color: #0f8a5f; border: none;" title="Email">
                                    <i class="fa fa-envelope text-white" style="font-size: 16px;"></i>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ($contact = get_field('contact_no', $id)) : ?>
                            <li class="list-inline-item">
                                <a href="tel:<?php echo esc_attr($contact); ?>" class="btn rounded-circle d-flex align-items-center justify-content-center p-0" style="width: 36px; height: 36px; background-color: #0f8a5f; border: none;" title="Phone">
                                    <i class="fa fa-phone text-white" style="font-size: 16px;"></i>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ($linkedin = get_field('linkedin_url', $id) ? get_field('linkedin_url', $id) : get_field('linkedin', $id)) : ?>
                            <li class="list-inline-item">
                                <a href="<?php echo esc_url($linkedin); ?>" target="_blank" class="btn rounded-circle d-flex align-items-center justify-content-center p-0" style="width: 36px; height: 36px; background-color: #0f8a5f; border: none;" title="LinkedIn">
                                    <i class="fab fa-linkedin-in text-white" style="font-size: 16px;"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="team-profile-con">
                    <?php echo $expert->post_content?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="text-bg-dark py-5 px-5">
    <div class="container no-pad-gutters">
        <h2 class="text-white text-center pb-4 fw-bold">Industry Expertise</h2>
        <div class="row justify-content-center align-items-center g-4">
            <?php 
            $expertises = get_field('expertise', $id) ? get_field('expertise', $id) : get_field('industry_expertise', $id);
            if (!empty($expertises) && (is_array($expertises) || is_object($expertises))) :
                foreach($expertises as $expertise): 
                    $exp_id = is_object($expertise) ? $expertise->ID : $expertise;
                    $exp_post = get_post($exp_id);
                    $expertise_name = $exp_post ? $exp_post->post_title : '';
                    
                    $icon = get_field('industry_icon', $exp_id) ? get_field('industry_icon', $exp_id) : get_field('icon', $exp_id);
            ?>
            <div class="col-md-6 col-lg-5 text-center">
                <div class="industry-card-banner overflow-hidden rounded-4 shadow">
                    <?php
                    if (is_array($icon)) {
                        echo wp_get_attachment_image(
                            $icon['id'],
                            'full',
                            false,
                            [
                                "loading" => "lazy",
                                "alt" => esc_attr($expertise_name),
                                'class' => 'img-fluid w-100 h-auto rounded-4'
                            ]
                        );
                    } elseif (is_numeric($icon)) {
                        echo wp_get_attachment_image(
                            $icon,
                            'full',
                            false,
                            [
                                "loading" => "lazy",
                                "alt" => esc_attr($expertise_name),
                                'class' => 'img-fluid w-100 h-auto rounded-4'
                            ]
                        );
                    } elseif (!empty($icon)) {
                        echo '<img src="' . esc_url($icon) . '" class="img-fluid w-100 h-auto rounded-4" alt="' . esc_attr($expertise_name) . '" loading="lazy">';
                    }
                    ?>
                </div>
            </div>
            <?php 
                endforeach; 
            endif;
            ?>
        </div>
    </div>
</section>
<?php
get_footer();