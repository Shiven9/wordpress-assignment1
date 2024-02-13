<?php 
/*
 * Template Name: Homepage Template
 * Template Post Type: page
 */

get_header(); ?>

<main>
        <div class="masthead">
            <h1><?php echo wp_kses_post(get_field('page_title')); ?></h1>
        </div>
    <section class="home">
        <h2><?php echo wp_kses_post(get_field('home_title')); ?></h2>
        <p><?php echo wp_kses_post(get_field('home_text')); ?></p>
    </section>
    <section class="post-list">
        <div class="container">
            <div class="row">
                <?php
                $the_query = new WP_Query(array(
                    'posts_per_page' => 3,
                    'post_type' => 'post',
                ));
                while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="col-md-4">
                        <div class="card">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                                </a>
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

