<?php
/* Template Name: Itinerary Page*/
get_header();
?>

    <section class="service-hero-section"
             style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/service-single-main-banner.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="service-inner-content color-white text-center">
                        <h3 class="f-w-400 m-b-20">Discover Your Perfect Journey</h3>
                        <h1 class="color-white"><?php echo the_title() ?></h1>
                        <div class="duration-price-container p-t-40">
                            <p><?php the_field('tour_days'); ?> Days / <?php the_field('tour_nights'); ?> Nights</p>
                            <p>From US $<?php the_field('tour_price'); ?> PP</p>
                        </div>
                        <a href="#" class="primary-btn m-t-40">Book This Tour</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tour-summary-section p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tour-summary-container">
                        <h3 class="h1 m-b-30">Tour Summary</h3>
                        <div class="multi-para">
                            <?php the_field('tour_summary'); ?>
                        </div>
                        <div class="tour-summary-carousel-container p-t-40">
                            <div class="owl-carousel tour-summary-carousel">
                                <?php
                                if (have_rows('tour_summary_carousel')):
                                    while (have_rows('tour_summary_carousel')): the_row();
                                        ?>
                                        <div class="item">
                                            <div class="tour-summary-item">
                                                <?php
                                                $it_image = get_sub_field('image');
                                                if ($it_image):
                                                    $url = $it_image['url'];
                                                    $alt = $it_image['alt'];

                                                    $size = 'itinerary-day-gallery';
                                                    $thumb = $it_image['sizes'][$size];
                                                    ?>
                                                    <img src="<?php echo esc_url($thumb); ?>"
                                                         alt="<?php echo esc_attr($alt); ?>" title=""/>
                                                <?php endif; ?>
                                                <div class="tour-summary-inner">
                                                    <div class="tour-summary-inner-text color-white">
                                                        <p class="tour-summary-day">
                                                            Day <?php the_sub_field('day_number'); ?></p>
                                                        <p class="tour-summary-location"><?php the_sub_field('location'); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endwhile;
                                else:
                                    ?>
                                    <?php /*?>-- else block --<?php */
                                    ?>
                                    <?php
                                    if (have_rows('days_details_list')):
                                        while (have_rows('days_details_list')): the_row();
                                            ?>
                                            <div class="item">
                                                <div class="tour-summary-item">
                                                    <?php
                                                    $images = get_sub_field('images');
                                                    $size = 'itinerary-day-gallery';
                                                    if ($images && count($images) > 0):
                                                        // Get the first image
                                                        $first_image = $images[0];
                                                        $image_id = $first_image['ID'];
                                                        ?>
                                                        <?php echo wp_get_attachment_image($image_id, $size); ?>
                                                    <?php endif; ?>
                                                    <div class="tour-summary-inner">
                                                        <div class="tour-summary-inner-text color-white">
                                                            <p class="tour-summary-day">
                                                                Day <?php the_sub_field('day_number'); ?></p>
                                                            <p class="tour-summary-location"><?php the_sub_field('city'); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        endwhile;
                                    endif;
                                    ?>
                                    <?php /*?>-- end else block --<?php */
                                    ?>
                                <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="day-list-section p-t-50 p-b-100">
        <div class="container">
            <div class="day-list-title">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="h1 m-b-50">Tour Itinerary</h3>
                    </div>
                </div>
            </div>
            <div class="day-details-list">
                <?php
                if (have_rows('days_details_list')):
                    while (have_rows('days_details_list')): the_row();
                        ?>
                        <div class="days-details-item">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="days-details-left">
                                        <p class="day-number f-w-500">Day <?php the_sub_field('day_number'); ?></p>
                                        <h3 class="m-b-20 color-grey"><?php the_sub_field('title'); ?></h3>
                                        <div class="days-details-left-content m-b-40">
                                            <div class="multi-para">
                                                <?php the_sub_field('description'); ?>
                                            </div>
                                        </div>
                                        <?php if (!get_sub_field('departure')): ?>
                                            <div class="day-images">
                                                <?php
                                                $images = get_sub_field('images');
                                                $size = 'itinerary-day-gallery';
                                                if ($images): ?>
                                                    <div class="row">
                                                        <?php foreach ($images as $image):
                                                            // Get the image ID from the array
                                                            $image_id = $image['ID'];
                                                            ?>
                                                            <div class="col-sm-6">
                                                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="days-details-right">
                                        <?php if (!empty(get_sub_field('activities'))): ?>
                                            <h5 class="m-b-30">Day <?php the_sub_field('day_number'); ?> Activities</h5>
                                            <div class="list-with-check-icon">
                                                <?php the_sub_field('activities'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </section>

    <section class="price-includes-section bg-blue-2 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="price-includes-left">
                        <div class="includes-box p-b-50">
                            <h3 class="color-white m-b-30">Price Includes</h3>
                            <div class="dot-list">
                                <?php
                                $price_includes_list = get_field('price_includes_list');

                                if (!empty($price_includes_list)) {
                                    echo $price_includes_list;
                                } else {
                                    ?>
                                    <ul>
                                        <li>Airport pick-up, drop-off, and seamless assistance.</li>
                                        <li>Private luxury vehicle with air conditioning.</li>
                                        <li>Professional English-speaking driver your journey.</li>
                                        <li>Entry fees for all listed attractions and sites.</li>
                                        <li>Guided tours by experienced local guides</li>
                                        <li>Complimentary water bottles during travel.</li>
                                        <li>Taxes, service charges, and government fees.</li>
                                    </ul>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="includes-box">
                            <h3 class="color-white m-b-30">Price Excludes</h3>
                            <div class="dot-list">
                                <?php
                                $price_includes_list = get_field('price_excludes_list');

                                if (!empty($price_includes_list)) {
                                    echo $price_includes_list;
                                } else {
                                    ?>
                                    <ul>
                                        <li>Airport pick-up, drop-off, and seamless assistance.</li>
                                        <li>Private luxury vehicle with air conditioning.</li>
                                        <li>Professional English-speaking driver your journey.</li>
                                        <li>Entry fees for all listed attractions and sites.</li>
                                        <li>Guided tours by experienced local guides</li>
                                        <li>Complimentary water bottles during travel.</li>
                                    </ul>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="price-includes-right">
                        <h3 class="color-white m-b-30">Journey Highlights <br/>at a Glance</h3>
                        <div class="map-box">
                            <?php
                            $it_image = get_field('map_image');
                            if ($it_image):
                                $url = $it_image['url'];
                                $alt = $it_image['alt'];

                                $size = 'itinerary-map';
                                $thumb = $it_image['sizes'][$size];
                                ?>
                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>"/>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="book-now-section bg-blue-2 p-t-50 p-b-100">
        <div class="container">
            <div class="bg-light-green">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="book-now-left">
                            <h3 class="color-white m-b-20">Book or Customize Now</h3>
                            <div class="large-text color-white f-w-500">
                                <p>Tailor your perfect trip with us. </p>
                                <p>Book now or create a personalized itinerary that’s just for you.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="book-now-right">
                            <h3 class="book-now-package-title color-grey-2"><?php echo get_the_title() ?></h3>
                            <div class="book-now-package-detail color-grey-2">
                                <p class="m-b-10">Duration: <?php the_field('tour_days'); ?> Days
                                    / <?php the_field('tour_nights'); ?> Nights</p>
                                <p>Price: From US $<?php the_field('tour_price'); ?> Per Person</p>
                            </div>
                            <a href="#" class="primary-btn m-t-30">Plan your Trip Today!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>