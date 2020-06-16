<section class="blog">
    <div class="inner">
        <?php if(have_rows('blog_section')): ?>
            <?php while(have_rows('blog_section')): the_row(); ?>
                <h2><?php the_sub_field('heading'); ?></h2>
                <p><?php the_sub_field('description'); ?></p>
            <?php endwhile; ?>
        <?php endif; ?>
        <div class="cards">
            <?php $the_query = new WP_Query('post_type=post&posts_per_page=3'); ?>

            <?php while($the_query -> have_posts()) : $the_query -> the_post(); ?>
                <div class="card">
                <div class="image">
                    <?php the_post_thumbnail(); ?>
                </div>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php the_excerpt( __('(more…)') ) ?></p>
                    <button class="rounded"><a href="<?php the_permalink(); ?>">Read More</a></button>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>