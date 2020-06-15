<?php $slt_options = get_option('slt_options'); ?>
<footer id="footer">
		<div class="container">
				<div class="row">
					<div class="col-md-4">
						<?php dynamic_sidebar( 'footer-right' ) ?>
						<ul class="socials">
							<li class="telegram"><a data-toggle="tooltip" title="telegram" target="_blank" href="https://telegram.org/webgaran" data-original-title="telegram"><i class="fa fa-paper-plane "></i></a></li>
							<li class="instagram"><a data-toggle="tooltip" title="instagram"  target="_blank" href="<?php echo $slt_options['general']['sl_instagram_page']  ?>" data-original-title="instagram"><i class="fab fa-instagram "></i></a></li>
							<li class="facebook"><a data-toggle="tooltip" title="facebook"  target="_blank" href="<?php echo $slt_options['general']['sl_facebook_page']  ?>" data-original-title="facebook"><i class="fab fa-facebook-f "></i></a></li>
							<li class="twitter"><a data-toggle="tooltip" title="twitter"  target="_blank" href="<?php echo $slt_options['general']['sl_twitter_page']  ?>" data-original-title="twitter"><i class="fab fa-twitter "></i></a></li>
							<li class="feed"><a data-toggle="tooltip" title="feed" target="_blank" href="http://webgaran.ir/feed/" data-original-title="feed"><i class="fa fa-feed "></i></a></li>
						</ul>
					</div>
					<div class="col-md-4">
						<?php //dynamic_sidebar( 'footer-center' ) ?>
						<h4 class="widget-title">خبرنامه</h4>
						<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=webgaran/qXdp', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
      <div class="input-group">
          <p>		برای عضویت در خبرنامه وبگران، نشانی پست الکترونیکی خود را جهت دریافت اخبار روزانه وارد نمایید</p>
        <input type="email" name="email" class="form-control" placeholder="آدرس ایمیل شما">
        <span class="input-group-btn">
          <button class="btn-sm" type="submit">عضویت</button>
        </span>
      </div><!-- /input-group -->
      <input type="hidden" value="mrprogrammer/rss" name="uri">
      <input type="hidden" name="loc" value="en_US">
    </form>
						<?php $lastBlog = new WP_Query(array(
							'posts_per_page' => 20,
						)); ?>
						<h4>آخرین مقالات</h4>
						<ul class="webgaran_scroll scroll_it">
							<?php
									if( $lastBlog->have_posts() ):
									while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
											<li><a title="<?php the_title() ?>" href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
								<?php endwhile;endif;wp_reset_postdata(); ?>
						</ul>
					</div>
					<div class="col-md-4 ">
						<?php //dynamic_sidebar( 'footer-left' ) ?>
						<h4>دسترسی سریع</h4>
						<div class="webgaran_scroll">
							<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container_class' => '' ) ); ?>
						</div>
					</div>
				</div>
		</div>

	</footer>
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-6"><small class="text-right">کليه حقوق محصولات و محتوای اين سایت متعلق به وبگران می باشد</small></div>
				<div class="col-md-6 text-left">
					<small class="">
						<a title="طراحی سایت" target="_blank" href="http://webgaran.ir">طراحی سایت</a> : <a title="وبگران" target="_blank" href="http://webgaran.ir">وبگران</a>
					 </small>
				</div>
			</div>
		</div>
	</div>





	<?php wp_footer(); ?>
    <?php include_once('inc/login.php'); ?>
<!-- <a href="#" id="totop" >بالا</a> -->
<div class="hidden-xs" id="totop"><i class="fa fa-3x fa-angle-up"></i></div>
<!---start GOFTINO code--->
<script type="text/javascript">
  !function(){var a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/ke72mi",l=localStorage.getItem("goftino");g.type="text/javascript",g.async=!0,g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();
</script>
<!---end GOFTINO code--->
</body>
</html>
