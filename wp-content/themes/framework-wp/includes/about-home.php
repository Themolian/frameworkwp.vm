<section class="about-home">
    <div class="inner">
        <?php if(have_rows('about_home')): ?>
            <?php while(have_rows('about_home')): the_row(); ?>
                <h3><?php the_sub_field('foretitle'); ?></h3>
                <h2><?php the_sub_field('heading'); ?></h2>
                <p><?php the_sub_field('text'); ?></p>
                <button class="rounded"><a href="<?php $link = get_field('read_more'); esc_url($link['url']); ?>">Read More</a></button>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>