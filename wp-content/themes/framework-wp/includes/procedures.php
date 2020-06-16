
<section class="procedures">
    <div class="inner">
    <?php if(have_rows('procedures')): ?>
        <?php while(have_rows('procedures')): the_row(); ?>
            <h2><?php the_sub_field('heading'); ?></h2>
            <p><?php the_sub_field('description'); ?></p>
            <?php if(have_rows('procedures_content')): ?>
                <div class="cards">
                <?php while(have_rows('procedures_content')): the_row();
                    $image = get_sub_field('image');
                            
                    $alt = $image['alt'];
                    $size = 'large';
                    $thumb = $image['sizes'][$size];
                ?>
                    <div class="card">
                        <div class="image">
                            <img src="<?php echo esc_url($thumb) ?>" alt="<?php echo esc_attr($alt); ?>" />
                        </div>
                        <h3><?php the_sub_field('heading'); ?></h3>
                        <p><?php the_sub_field('description'); ?></p>
                        <button class="rounded">
                            <a href="<?php $link = get_field('read_more'); esc_url($link['url']); ?>">Read More</a>
                        </button>
                    </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
    </div>
</section>