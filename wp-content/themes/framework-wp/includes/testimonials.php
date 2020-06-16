<?php 
    $args = array(
        'post_type' => 'testimonials',
        'post_status' => 'publish',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'ASC',
    );
?>

<section class="testimonials">
    <div class="inner">
        <div class="flexslider testimonials-wrap">
            <ul class="slides">
                <?php $testimonials = new WP_Query( $args ); ?>
                <?php while($testimonials->have_posts()) : $testimonials->the_post(); ?>
                <?php 
                    $image = get_field('testimonial_image');
                                
                    $alt = $image['alt'];
                    $size = 'thumbnail';
                    $thumb = $image['sizes'][$size];
                ?>
                    <li class="testimonial">
                        <p><?php the_field('testimonial'); ?></p>
                        <div class="image">
                            <img src="<?php echo esc_url($thumb) ?>" alt="<?php echo esc_attr($alt); ?>" />
                        </div>
                        <h4><?php the_field('testimonial_byline'); ?></h4>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</section>