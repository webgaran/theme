<?php
// Template Name: Articles
get_header() ?>
<div class="wrapper">
<div class="container">
<div class="mt-2">
  <div class="webgaran_breadcrumbs">
    <?php
    if ( function_exists('yoast_breadcrumb') ) {
  	yoast_breadcrumb( '<i class="fa fa-lg fa-map-marker"></i> ' );
    }
    ?>
  </div>
</div>
<div class="row mt-4">
  <div class="col-md-4">
    <ul class="list-group">
      <li class="list-group-item list-group-item-action list-group-item-info">دسته بندی ها</li>
      <?php $categories = get_categories();
    foreach($categories as $category) {
     echo '<li><a class="list-group-item list-group-item-action" title="' . $category->name . '" href="' . get_category_link($category->term_id) . '">' . $category->name . '<span class="badge badge-primary badge-pill pull-left mt-1">' . $category->category_count . '</span></a></li>';
    } ?>
    </ul>
  </div>
  <div class="col-md-8">
    <div id="main-slider" class="carousel slide mx-auto" data-ride="carousel">
      <?php $args = array(
        'posts_per_page' => 4,
        'post__in' => array(1682,1581,1376),
        'post__not_in' => get_option("sticky_posts"),
        // 'tag' => 'slider'
      );
      $slider = new WP_Query($args);
      if($slider->have_posts()):
        $count = $slider->found_posts;
        ?>
        <ol class="carousel-indicators">
          <?php for($i = 0; $i < $count ;  $i++) { ?>
            <li data-target="#main-slider" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0) ? 'active' : ''?>"></li>
          <?php } ?>
        </ol> <!--.carousel-indicators-->
        <div class="carousel-inner" role="listbox">
          <?php $i = 0; while($slider->have_posts()): $slider->the_post(); ?>
            <div class="carousel-item <?php echo ($i == 0) ? 'active' : ''?>">
              <a title="<?php the_title() ?>" href="<?php the_permalink() ?>"><img class="img-fluid img-thumbnail" src="<?php the_post_thumbnail_url('large') ?>" alt="<?php the_title() ?>"></a>
              <div class="carousel-caption">
                <h3><?php the_title() ?></h3>
                <p><?php //echo wp_trim_words( get_the_content(),24, '...' );  ?></p>
              </div>
            </div><!--.carousel-item-->
            <?php $i++; endwhile; ?>
          </div> <!--.carouse-inner-->
          <a href="#main-slider" class="carousel-control-prev" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a href="#main-slider" class="carousel-control-next" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        <?php endif;  wp_reset_postdata(); ?>
      </div>
  </div>
</div>
<div class="text-center pt-3 pb-3"><h1>آخرین مقالات آموزشی</h1></div>
<div class="divider-draft center mb-3"></div>
</div>
<section id="posts">
  <div class="container">
    <ul class="container">
      <div class="row">
        <?php
        global $paged;
        $ourCurrentPage = get_query_var('paged');
        $curpage = $paged ? $paged : 1;
        $lastBlog = new WP_Query(array(
          'posts_per_page' => 16,
          'ignore_sticky_posts' => 1,
          'paged' => $ourCurrentPage
        )); ?>
        <?php
        if( $lastBlog->have_posts() ):
          while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
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
                    <span><i class="fas fa-eye"></i> <?php if ( function_exists( 'get_post_view_count' ) ) {echo get_post_view_count( get_the_ID() );}?></span>
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
          <?php
        endwhile; ?>
        <div class="webgaran_pagination">
          <?php echo paginate_links(); ?>
        </div>
        <?php wp_reset_postdata();
      endif;
      ?>
    </ul>
  </div>
</section>

</div>
<?php get_footer() ?>
