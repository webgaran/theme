<?php
// Template Name: Articles
 get_header() ?>
<div class="wrapper">
  <section>
    <div class="container">
      <div class="bg bg-light pt-3 pb-3 pr-3 pl-4">
        <?php
        $args = array(
          'posts_per_page' => 1,
          'post__in' => get_option( 'sticky_posts' ),
          // 'ignore_sticky_posts' => 1,
          // 'orderby'   => array(
          //   'date' =>'DESC',
          //   'menu_order'=>'ASC',
          //   /*Other params*/
          //  ),
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post();?>
        <div class="row">
          <div class="col-md-6">
            <a title="<?php the_title() ?>" href="<?php the_permalink() ?>"><img class="img-fluid img-thumbnail" src="<?php the_post_thumbnail_url('large') ?>" alt="<?php the_title() ?>"></a>
          </div>
          <div class="col-md-6 pt-4">
            <h2><a title="<?php the_title() ?>" href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <p><?php echo wp_trim_words( get_the_content(),100, '...' );  ?></p>
            <div><span><a class="btn btn-outline-info btn-sm" href="<?php the_permalink() ?>">بیشتر بخوانید</a></span></div>
          </div>
        </div>
      <?php endwhile; endif; wp_reset_query(); ?>
    </div>
  </div>
</section>
<section id="posts">
  <div class="container">
    <div class="">
      <?php
      if ( function_exists('yoast_breadcrumb') ) {
        //yoast_breadcrumb( '<i class="fa fa-lg fa-map-marker"></i> ' );
      }
      ?>
    </div>
    <div class="">
      <div class="text-center pt-5"><h2 class="pb-2">مقالات آموزشی</h2></div>
      <div class="divider-draft center mb-3"></div>
    </div>
    <ul class="row">
      <?php
      global $paged;
      $lastBlog = new WP_Query(array(
        'posts_per_page' => 8,
        // 'offset'         => 1,
        'post__not_in' => get_option("sticky_posts"),
      )); ?>
      <?php
      if( $lastBlog->have_posts() ):
        while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
        <li class="col-md-3">
          <div class="box">
            <header>
              <h3><a title="<?php the_title() ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
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
                  <span><i class="fas fa-eye"></i> <?php if ( function_exists( 'get_post_view_count' ) ) {echo get_post_view_count( get_the_ID() );}?></span>
                </li>
                <li>
                  <span><i class="fas fa-comments"></i> <?php comments_number( 'هیچ', ' یک  ', ' % ' );  ?> </span>
                </li>
                <li>
                    <span class="like"><?php echo likeCount($post->ID) ?> <i class="fas fa-heart"></i></span>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <?php
      endwhile;
      wp_reset_postdata();
    endif;?>
  </ul>
<!--  <div class="all-articles text-left">-->
<!--    <a href="--><?//= home_url('blog') ?><!--">-->
<!--      <span> مشاهده همه</span><span class="icon fa fa-arrow-left pr-2"></span>-->
<!--    </a>-->
<!--  </div>-->
  <div class="load-more-wrapper text-center ">
      <a data-page="3" href="#" class="load-more btn btn-outline-info btn-sm">مطالب بیشتر</a>
  </div>
</div>
</section>
<section id="posts">
  <div class="container mb-4">
    <div class="">
      <div class="text-center pt-5"><h2 class="pb-2">دانلودها</h2></div>
      <div class="divider-draft center mb-3"></div>
    </div>
    <ul class="row">
      <?php $lastBlog = new WP_Query('post_type=download&posts_per_page=4');
      if( $lastBlog->have_posts() ):
        while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
        <li class="col-md-3">
          <div class="box">
            <header>
              <h3><a title="<?php the_title() ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
            </header>
            <article>
              <div class="project text-center"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                <div class="project__card">

                  <img  src="<?php the_post_thumbnail_url('posts') ?>" alt="<?php the_title(); ?>">
                </div></a>
              </div>
              <?php //echo wp_trim_words( get_the_content(),26, '...' );  ?>
            </article>
            <div class="text-center pt-4">
              <ul>
                <li>
                  <span><i class="fas fa-eye"></i> <?php if ( function_exists( 'get_post_view_count' ) ) {echo get_post_view_count( get_the_ID() );}?></span>
                </li>
                  <li><?php //echo kk_star_ratings() ?></li>
                <li>
                  <!-- <span><i class="fas fa-comments"></i><?php //comments_number( 'هیچ', ' یک  ', ' % ' );  ?> </span> -->
                </li>
              </ul>
            </div>
          </div>
        </li>
      <?php endwhile;endif;wp_reset_postdata(); ?>
    </ul>
    <div class="all-articles text-left">
      <a href="<?= home_url('download') ?>">
        <span> مشاهده همه</span><span class="icon fa fa-arrow-left pr-2"></span>
      </a>
    </div>
  </div>
</section>
</div>

<?php get_footer() ?>
