<?php
// Template Name: Articles
 get_header() ?>

<div class="wrapper">
  <section id="posts">
      <div class="container">
        <div class="">
		
          <?php
          if ( function_exists('yoast_breadcrumb') ) {
            //yoast_breadcrumb( '<i class="fa fa-lg fa-map-marker"></i> ' );
          }
          ?>
        </div>
		<br><div class="text-center"><h2>آخرین مقالات آموزشی</h2></div><br>
            <!--   <h1 class="text-center mt-4 mb-4">آخرین مقالات</h1> -->
              <div class="divider-draft center"></div><br>
              <ul class="row">
			  
     <?php 
global $paged;
	 $ourCurrentPage = get_query_var('paged');
				  
$curpage = $paged ? $paged : 1;
       $lastBlog = new WP_Query(array(
         'posts_per_page' => 8,
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
        for($i=1;$i<=$lastBlog->max_num_pages;$i++)
            echo '<li class="'.($i == $curpage ? 'active ' : '').' page-item" ><a class="page-link" href="'.get_pagenum_link($i).'">'.per_number($i).'</a></li>';
        echo '
        <a class="next page-link" href="'.get_pagenum_link(($curpage+1 <= $lastBlog->max_num_pages ? $curpage+1 : $lastBlog->max_num_pages)).'">&rsaquo;</a>
        <a class="last page-link" href="'.get_pagenum_link($lastBlog->max_num_pages).'">&raquo;</a>
    </ul>
    </div>
    ';
    wp_reset_postdata();
endif;
?>
				  
       </ul>
     </div>
 </section>
</div>

<?php get_footer() ?>
