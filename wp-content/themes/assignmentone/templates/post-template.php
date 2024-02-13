<?php
/**
 * Template Name: Post Template
 * Template Post Type: post
 */
get_header();
?>
<section class="post-masthead">
  <div>
    <h1><?php the_title(); ?></h1>
  </div>
</section>
<section class="row">
  <div class="col-sm-12 col-md-8 col-lg-8">
    <?php echo get_the_content(); ?>
    <p>By: <?php the_author(); ?></p>
    <p>Date: <?php echo get_the_date(); ?></p>
    <p><?php the_tags(); ?></p>
    <p><?php echo the_category(',', '', get_the_ID()) ?></p>
  </div>
  <div class="post-list col-sm-12 col-md-4 col-lg-4">
    <?php
      $the_query = new WP_Query( 'posts_per_page=5' );
      while ($the_query -> have_posts()) : $the_query -> the_post();
    ?>
    <article>
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
      <?php the_excerpt(__('(more…)')); ?>
    </article>
      <?php
        endwhile;
        wp_reset_postdata();
      ?>
  </div>
</section>
<?php get_footer(); ?>
