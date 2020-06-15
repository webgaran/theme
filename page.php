<?php get_header() ?>

<div class="wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="webgaran_breadcrumbs">
          <?php
          if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<i class="fa fa-lg fa-map-marker"></i> ' );
          }
          ?>
        </div>
        <div class="bg-white pt-3 pb-2 mb-2 shadow-sm rounded">
          <h1 class="text-center"><?php the_title() ?></h1>
        </div>
        <div class="content p-3">
          <?php
          if( have_posts() ):

          			while( have_posts() ): the_post();
           ?>
          <?php the_content(); ?>

          <?php endwhile;
          endif;?>
        </div>
      </div>
      <div class="col-md-3 sidebar ">
        <div class="sticky-top">
          <?php get_sidebar(  ) ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer() ?>
