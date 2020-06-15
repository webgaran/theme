<?php get_header(); ?>

	<section class="wrapper">
		<div class="container">
			<div class="row">
                <div class="col-md-1">
                    <div class="sticky-top">
                        <div class="webgaran_share">
                            <ul class="">
                                <li class="twitter"><a data-toggle="tooltip" data-placement="bottom" title="twitter" href="http://twitter.com/intent/tweet?text=<?php the_title(); ?><?php the_permalink(); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li class="telegram"><a data-toggle="tooltip" data-placement="bottom" title="telegram" href="https://telegram.me/share/url?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-paper-plane"></i></a></li>
                                <li class="linkdin"><a data-toggle="tooltip" data-placement="bottom" title="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                <li class="facebook"><a data-toggle="tooltip" data-placement="bottom" title="facebook" href="http://www.facebook.com/share.php?v=4&src=bm&u=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="whatsapp"><a data-toggle="tooltip" data-placement="bottom" title="whatsapp" href="https://wa.me/?text=<?php the_permalink(); ?>" data-action="share/whatsapp/share" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a class="like" rel="<?php echo $post->ID; ?>"><i class="fas fa-heart"></i>  <?php echo likeCount($post->ID) ?> </a></li>
                                <li><i class="fa fa-lg fa-comment"></i><?php comments_number( '0', ' 1  ', ' % ' );  ?></li>

                            </ul>
                        </div>
                    </div>
                </div>
				<div class="col-md-8">
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
				<div id="wbg-post-<?php the_id() ?>" class="content pr-2 pl-2">
                    <div class="details text-center">
                        <div class="info">
                            <ul>
<!--                                --><?php //$posted_on = human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
                                <!-- <?php //echo get_avatar(get_the_author_meta('ID'), 32) ?><a title="<?php //echo get_the_author_meta( 'first_name' ); ?>&nbsp;<?php //echo get_the_author_meta( 'last_name' ); ?>" href="<?php //echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php //echo get_the_author_meta( 'first_name' ); ?>&nbsp;<?php //echo get_the_author_meta( 'last_name' ); ?></a> -->
                                <li><i class="fas fa-user"></i><?php echo get_the_author_meta( 'first_name' ); ?></li>
                                <li><i class="fa fa-calendar"></i><?php the_time('j F, Y'); ?></li>
                                <li><i class="fa fa-lg fa-eye"></i> <?php if ( function_exists( 'get_post_view_count' ) ) {echo get_post_view_count( get_the_ID() );}?> <span>بازدید</span></li>
<!--                                <li><i class="fa fa-lg fa-thumb-tack"></i>--><?php ////$categories = get_the_category();$separator = ", ";$output = '';if ($categories) {foreach ($categories as $category) {$output .= '<a title="' . $category->cat_name . '"href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'  . $separator;}echo trim($output, $separator);}?><!--</li>-->
                            </ul>
                        </div>
                    </div>
					<div class="text-center pb-3"><img class="img-thumbnail" alt="<?php the_title() ?>" src="<?php the_post_thumbnail_url() ?>"></div>
					<?php
				if( have_posts() ):

				while( have_posts() ): the_post();
				 ?>
				 <?php //setPostViews(get_the_ID()); ?>
				<?php the_content(); ?>

				<?php endwhile;
				endif;?>

<hr>

				</div><br>
				<div class="box">
					<i class="fa fa-lg fa-tags"></i> <?php the_tags(''); ?>
				</div><br>
					<div class="content newsletter">
    <h4 class="box-title"><i class="fas fa-envelope"></i> خبرنامه</h4>
    <hr>
		<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=webgaran/qXdp', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
      <div class="input-group">
          <p>		برای عضویت در خبرنامه وبگران، نشانی پست الکترونیکی خود را جهت دریافت اخبار روزانه وارد نمایید</p>
        <input type="email" name="email" class="form-control" placeholder="آدرس ایمیل شما">
        <span class="input-group-btn">
          <button class="btn btn-success btn-sm" type="submit">عضویت</button>
        </span>
      </div><!-- /input-group -->
      <input type="hidden" value="mrprogrammer/rss" name="uri">
      <input type="hidden" name="loc" value="en_US">
    </form>
  </div><br>
				<div class="">
					<?php comments_template(); ?>
				</div>
			</div>
			<div class="col-md-3 sidebar">
				<div id="webgaran_sidebar" class="sticky-top">
					<?php get_sidebar(  ) ?>
				</div>
			</div>
			</div>
		</div>
	</section>
<!-- <script type="text/javascript">
jQuery(document).ready(function($){
	var $sidebar   = $(".sidebar"),
	        $window    = $(window),
	        offset     = $sidebar.offset(),
	        topPadding = 120;

	    $window.scroll(function() {
	        if ($window.scrollTop() > offset.top) {
	            $sidebar.stop().animate({
	                marginTop: $window.scrollTop() - offset.top + topPadding
	            });
	        } else {
	            $sidebar.stop().animate({
	                marginTop: 0
	            });
	        }
	    });
});
</script> -->
<script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "Article",
"mainEntityOfPage": {
  "@type": "WebPage",
  "@id": "<?php echo home_url('blog') ?>"
},
"headline": "<?php the_title() ?>",
"image": [
  "<?php the_post_thumbnail_url('thumbnail'); ?>",
  "<?php the_post_thumbnail_url('medium'); ?>",
  "<?php the_post_thumbnail_url(); ?>"
 ],
"datePublished": "<?= get_the_date('Y-m-d'); ?>",
"dateModified": "<?= get_the_date('Y-m-d'); ?>",
"author": {
  "@type": "Person",
  "name": "<?php echo the_author_meta( 'display_name' , $author_id ); ?>"
},
 "publisher": {
  "@type": "Organization",
  "name": "Webgaran",
  "logo": {
    "@type": "ImageObject",
    "url": "<?php echo get_template_directory_uri() ?>/assets/img/logo.png"
  }
},
"description": "<?php the_title(); ?>"
}
</script>
<?php get_footer(); ?>
