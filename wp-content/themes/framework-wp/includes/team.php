
<section class="team">
    <div class="inner">
    <?php if(have_rows('team')): ?>
        <?php while(have_rows('team')): the_row(); ?>
            <h2><?php the_sub_field('heading') ?></h2>
            <p><?php the_sub_field('description'); ?></p>
            <?php if(have_rows('staff_profiles')): ?>
                <div class="staff">
                    <?php while(have_rows('staff_profiles')): the_row();
                        $image = get_sub_field('image');
                                
                        $alt = $image['alt'];
                        $size = 'large';
                        $thumb = $image['sizes'][$size];

                        $icon = get_sub_field('icon');

                        $alt_i = $icon['alt'];
                        $size_i = 'large';
                        $thumb_i = $icon['sizes'][$size]; 
                    ?>
                    <div class="staff-card">
                        <div class="image">
                            <img src="<?php echo esc_url($thumb) ?>" alt="<?php echo esc_attr($alt); ?>" />
                        </div>
                        <div class="namecard">
                            <h3><?php the_sub_field('name'); ?></h3>
                            <p class="role"><?php the_sub_field('treatment'); ?></p>
                            <div class="socials">
                                <a href="/">Follow us on Facebook!</a>
                                <a href="/">Follow us on Twitter!</a>
                                <a href="/">Follow us on Google+!</a>
                                <a href="/">Follow us on Instagram!</a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
    </div>
</section>