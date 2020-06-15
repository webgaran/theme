<?php

 get_header() ?>

<div class="wrapper">
  <section class="archive-desc">
    <div class="container">
      <h1 class="text-center mt-4 mb-4">
        <?php if ( is_category() ) {
          single_cat_title();
        } elseif ( is_tag() ) {
          single_tag_title();
        } elseif ( is_author() ) {
          the_post();
          echo 'Author Archives: ' . get_the_author();
          rewind_posts();
        } elseif ( is_day() ) {
          echo 'Daily Archives: ' . get_the_date();
        } elseif ( is_month() ) {
          echo 'Monthly Archives: ' . get_the_date('F Y');
        } elseif ( is_year() ) {
          echo 'Yearly Archives: ' . get_the_date('Y');
        } else {
          echo 'Archives:';
        }
        ?>
      </h1>
      <?php the_archive_description('<div class="taxonomy-description">', '</div>'); ?>
    </div>
  </section>
  <section id="posts">
    <div class="container">
      <div class="webgaran_breadcrumbs mt-3">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<i class="fa fa-lg fa-map-marker"></i> ' );
        }
        ?>
      </div>
      <ul class="row">
        <?php $ourCurrentPage = get_query_var('paged');
        $lastBlog = new WP_Query(array(
          'posts_per_page' => 16,
          'paged' => $ourCurrentPage
        )); ?>
        <?php
        if( have_posts() ):
          while( have_posts() ): the_post(); ?>
          <li class="col-md-3">
            <div class="box">
              <header>
                <h2><a title="<?php the_title() ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
              </header>
              <article>
                <div class="project"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                  <div class="project__card">

                    <img  src="<?php the_post_thumbnail_url('posts') ?>" alt="<?php the_title(); ?>">
                  </div></a>
                </div>
                <?php echo wp_trim_words( get_the_content(),24, '...' );  ?>
              </article>
              <div class="footerbox">
                <ul>
                  <li>
                    <span><i class="fas fa-eye"></i> <?php //echo per_number(getPostViews(get_the_ID())) ?></span>
                  </li>
                  <li>
                    <span><i class="fas fa-comments"></i> <?php comments_number( 'هیچ', ' یک  ', ' % ' );  ?> </span>
                  </li>
                  <li>
                    <span class="like"><?= likeCount($post->ID) ?> <i class="fas fa-heart"></i></span>
                  </li>
                </ul>
              </div>
            </div>
          </li>
        <?php endwhile; ?>
        <div class="webgaran_pagination">
          <?php echo paginate_links(); ?>
        </div>
      <?php  endif;wp_reset_postdata(); ?>
    </ul>
  </div>
</section>
</div>
<?php get_footer() ?>
