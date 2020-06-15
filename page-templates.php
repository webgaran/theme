<?php
// Template Name: templates
 get_header() ?>

<div class="wrapper">
  <section id="posts">
      <div class="container">
        <div class="webgaran_breadcrumbs">
          <?php
          if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<i class="fa fa-lg fa-map-marker"></i> ' );
          }
          ?>
        </div>
              <h1 class="text-center mt-4 mb-4">آخرین قالب ها</h1>
              <div class="divider-draft center"></div><br>
              <ul class="row">
     <?php $ourCurrentPage = get_query_var('paged');
       $lastBlog = new WP_Query(array(
         'post_type'     =>  'templates',
         'posts_per_page' => 16,
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
                                            <span><i class="fas fa-comments"></i><?php comments_number( 'هیچ', ' یک  ', ' % ' );  ?> </span>
                                        </li>

                                    </ul>
                     </div>
                 </div>
             </li>
         <?php endwhile; ?>
         <div class="webgaran_pagination">
             <?php echo paginate_links(array('total' => $lastBlog->max_num_pages)); ?>
         </div>
       <?php    endif;wp_reset_postdata(); ?>
       </ul>
     </div>
 </section>
</div>
<?php get_footer() ?>
