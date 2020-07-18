<?php 
    $options = array(
        'post_type' => 'site_options',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'ASC',
    );
?>
<section class="contact-home">
    <div class="inner">
        <h2>Get In Touch</h2>
        <p>To doesn't his appear replenish together called he of mad place won't wherein blessed second ever wherein were meat kind wherein and martcin</p>
        <div class="contact-container">
            <?php $options = new WP_Query( $options ); ?>
                <?php if($options->have_posts()) : ?>
                    <div class="deets">
                        <?php while($options->have_posts()) : $options->the_post(); ?>
                                <div class="location">
                                    <p><?php the_field('contact_address'); ?></p>
                                </div>
                                <div class="email-address">
                                    <p><a href="mailto:<?php the_field('contact_email'); ?>"><?php the_field('contact_email'); ?></a></p>
                                    <p><a href="mailto:<?php the_field('contact_email'); ?>"><?php the_field('contact_email'); ?></a></p>
                                </div>
                                <div class="phone-number">
                                    <p><a href="tel:<?php the_field('primary_phone_number'); ?>"><?php the_field('primary_phone_number'); ?></a></p>
                                    <p><a href="tel:<?php the_field('secondary_phone_number'); ?>"><?php the_field('secondary_phone_number'); ?></a></p>
                                </div>
                        <?php endwhile; ?>
                    </div>
                <?php wp_reset_postdata(); endif; ?>
            <div class="contact-form">
                <?php echo do_shortcode("[ninja_form id=1]"); ?>
            </div>
        </div>
    </div>
</section>