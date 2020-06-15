<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php if(is_front_page()){
    bloginfo('name');
        }else{

            wp_title()?> - <?php bloginfo('name') ?><?php
        } ?>
    </title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126277942-1"></script> -->




</head>
<body <?php body_class();  ?> >
	<header>
		<!-- <section id="topbar">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<ul class="right">
							<li><a href="<?= home_url('about-us') ?>">درباره ما</a></li>
							<li><a href="<?= home_url('contact-us') ?>">تماس با ما</a></li>
						</ul>
					</div>
					<div class="col-md-6">

					</div>
					<div class="col-md-3 text-left">

					</div>
			</div>
		</section> -->
		<section id="mainbar">
			<div class="container">
				<div class="row">
					<div class="col-md-3 logo">
						<a title="<?php bloginfo('name'); ?>" href="<?= home_url() ?>"><img src="<?php echo( get_header_image() ); ?>" alt="<?php bloginfo('name'); ?>" /></a>
						<?php if ( is_front_page() ): ?>
							<h1><a title="<?php bloginfo('name'); ?>" href="<?= home_url() ?>">وبگران</a></h1>
							<h2><?php bloginfo( 'description' ) ?></h2>
						<?php else: ?>
							<h5><a title="<?php bloginfo('name'); ?>" href="<?= home_url() ?>">وبگران</a></h5>
							<h6><?php bloginfo( 'description' ) ?></h6>
						<?php endif; ?>
					</div>
					<div class="col-md-6 search_box">
						<?= do_shortcode( '[wd_asp id=1]' ); ?>
					</div>
					<div class="col-md-3 signs pt-2">
						<?php
						if ( is_user_logged_in() ) { ?>
						   <a href="<?= home_url('panel') ?>">پنل مدیریت</a>
						<?php } else { ?>
							<a data-toggle="modal" data-target="#myModal" href="#">ورود</a><span class="pl-3 pr-3">|</span>
							<a href="<?= home_url('/register') ?>">عضویت</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
		<section id="menubar">
			<div class="container">
				<nav class="navbar navbar-expand-md  navbar-dark">

				  <!-- <a class="navbar-brand" href="#">صفحه نخست</a> -->
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="collapsibleNavbar">
				    <?php wp_nav_menu( array( 'theme_location' => 'header', 'container_class' => '' ) ); ?>
				  </div>
				  <li class="navbar-brand pulse"><a title="طراحی سایت" href="<?= home_url('order-design-website') ?>">طراحی سایت</a></li>
				</nav>
			</div>
		</section>
	</header>
<div id="progress"></div>
