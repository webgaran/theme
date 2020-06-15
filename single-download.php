<?php get_header(); ?>
<?php
if( have_posts() ):

while( have_posts() ): the_post();
?>
	<section class="wrapper">
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
				<div class="content pr-3 pl-3 pt-4">
					<small class="float-left"><?php edit_post_link(); ?></small>
					<h1 class="pb-2 mt-1 mb-4 border-bottom"><?php the_title() ?></h1>





					<div class="text-center"><img class="pb-3" alt="<?php the_title() ?>" src="<?php the_post_thumbnail_url() ?>"></div>

				 <?php //setPostViews(get_the_ID()); ?>
				<?php the_content(); ?>

				<hr>
				</div>


			</div>
			<div class="col-md-3">
				<div id="sidebar" class="sticky-top">
                    <?php if ( is_user_logged_in() ): ?>
					<div class="webgaran_sidebar">
						<h3>اطلاعات محصول</h3>
						<div class="preview"><a target="_blank" rel="nofollow" href="<?php the_field('preview') ?>">پیش نمایش آنلاین</a></div>
						<div class="download"><a target="_blank" rel="nofollow" href="<?php the_field('download') ?>">دانلود</a></div>
						<table>
								<?php
								if( have_rows('sidebar') ):
								    while ( have_rows('sidebar') ) : the_row(); ?>
											<ul>
												<li><?php the_sub_field('icon'); ?></li>
								        <li class="middle"><?php the_sub_field('label'); ?></li>
												<li class="last"><?php the_sub_field('text'); ?></li>
											</ul>

								    <?php endwhile;endif;?>
						</table>
					</div>
                    <?php else: ?>
                        <div class="webgaran_sidebar">
                            <h3>اطلاعات محصول</h3>
                            <p class="text-center">برای دانلود لطفا <a class="badge badge-info" href="#" data-toggle="modal" data-target="#myModal">وارد</a> سایت شوید</p>
                        </div>
                    <?php endif; ?>
				</div>
			</div>
			</div>
		</div>
	</section>

<?php endwhile;
endif;?>


				</div><br>
<?php get_footer(); ?>
