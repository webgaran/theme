<?php get_header(); ?>
<?php query_posts(array(
				'post_type' => 'page',
				'post__in' => array(34),
				'showposts' => 10
			));?>
<?php if (have_posts()) : the_post(); ?>

<section id="hero" class="header_main-bg">
    <div class="header_main container">
<div class="owl-carousel hero">
  <div>
      <h3><?php the_field('title1') ?></h3>
      <p><?php the_field('body1') ?></p>
  </div>
  <div>
      <h3><?php the_field('title2') ?></h3>
      <p><?php the_field('body2') ?></p>
  </div>
  <div>
      <h3><?php the_field('title3') ?></h3>
      <p><?php the_field('body3') ?></p>
  </div>
</div>
    </div>
</section>
<section id="posts">
    <div class="container mb-4">
            <h2 class="text-center mt-4 mb-4">قالب های رایگان</h2>
            <div class="divider-draft center"></div><br>
            <?php the_field('free') ?>
            <ul class="row">
                <?php $lastBlog = new WP_Query('post_type=templates&posts_per_page=4');
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
                                    <?php echo wp_trim_words( get_the_content(),26, '...' );  ?>
                                </article>
                                <div class="footerbox">
                                    <ul>
                                        <li>
                                            <span><i class="fas fa-eye"></i> <?php echo per_number(getPostViews(get_the_ID())) ?></span>
                                        </li>
                                        <li>
                                            <span><i class="fas fa-comments"></i><?php comments_number( 'هیچ', ' یک  ', ' % ' );  ?> </span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </li>
                    <?php endwhile;endif;wp_reset_postdata(); ?>
                </ul>
        </div>
</section>
<section style="position: relative;" id="form">
<canvas id="nokey" width="800" height="800">
    Your Browser Don't Support Canvas, Please Download Chrome ^_^``
</canvas>
    <div class="form">
        <div class="container">
          <h2 class="text-center mt-4 mb-4">سفارش طراحی سایت</h2>

          <div class="divider-draft center"></div><br>
					<?php the_field('form') ?>
            <?= do_shortcode( '[contact-form-7 id="1078" title="سفارش طراحی سایت صفحه اصلی"]' ); ?>
        </div>
    </div>
</section>
<section id="posts">
    <div class="container">
            <h2 class="text-center mt-4 mb-4">آخرین مقالات</h2>
            <div class="divider-draft center"></div><br>
            <ul class="row">
                <?php $ourCurrentPage = get_query_var('paged');
				
					global $paged;
$curpage = $paged ? $paged : 1;
					
                  $lastBlog = new WP_Query(array(
                    'posts_per_page' => 8,
                    'orderby'	=> 'rand',
                    'paged' => $ourCurrentPage
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
                                    <?php echo wp_trim_words( get_the_content(),26, '...' );  ?>
                                </article>
                                <div class="footerbox">
                                    <ul>
                                        <li>
                                            <span><i class="fas fa-eye"></i> <?php echo per_number(getPostViews(get_the_ID())) ?></span>
                                        </li>
                                        <li>
                                            <span><i class="fas fa-comments"></i> <?php comments_number( 'هیچ', ' یک  ', ' % ' );  ?> </span>
                                        </li>
                                        <li>
                                          <span class="like"><?php echo per_number(likeCount($post->ID)) ?> <i class="fas fa-heart"></i></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    
<?php
endwhile;
    echo '
    <div class="mx-auto" dir="ltr">
    <ul class="pagination text-center" id="">
        <a class="first page-link" href="'.get_pagenum_link(1).'">&laquo;</a>
        <a class="previous page-link" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'">&lsaquo;</a>';
        for($i=1;$i<$lastBlog->max_num_pages;$i++)
            echo '<li class="'.($i == $curpage ? 'active ' : '').' page-item" ><a class="page-link" href="'.get_pagenum_link($i).'">'.per_number($i).'</a></li>';
        echo '
        <a class="next page-link" href="'.get_pagenum_link(($curpage+1 <= $lastBlog->max_num_pages ? $curpage+1 : $lastBlog->max_num_pages)).'">&rsaquo;</a>
        <a class="last page-link" href="'.get_pagenum_link($lastBlog->max_num_pages-1).'">&raquo;</a>
    </ul>
    </div>
    ';
    wp_reset_postdata();
endif;
?>
				
				
                </ul>
        </div>
</section>

<?php  endif; ?>
<?php  wp_reset_query();?>

<?php get_footer(); ?>
