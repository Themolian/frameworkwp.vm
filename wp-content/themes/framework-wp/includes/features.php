<section class="features">
    <?php if( have_rows('features') ): ?>
        <div class="features-list">
        <?php while( have_rows('features') ): the_row(); ?>
                <?php if( have_rows('features_content') ): ?>
                    <?php while( have_rows('features_content') ): the_row();
                        $image = get_sub_field('image');
                        
                        $alt = $image['alt'];
                        $size = 'large';
                        $thumb = $image['sizes'][$size];

                        $icon = get_sub_field('icon');

                        $alt_i = $icon['alt'];
                        $size_i = 'large';
                        $thumb_i = $icon['sizes'][$size];
                    ?>
                    <div class="feature">
                        <img src="<?php echo esc_url($thumb) ?>" alt="<?php echo esc_attr($alt); ?>" />
                        <div class="feature-overlay">
                            <img src="<?php echo esc_url($thumb_i) ?>" alt="<?php echo esc_attr($alt_i); ?>" />
                            <h3><a href="/"><?php the_sub_field('title'); ?></a></h3>
                        </div>
                    </div>

                    <?php endwhile; ?>
                <?php endif;?>

        <?php endwhile;?>
        </div>
    <?php endif;?>
</section>