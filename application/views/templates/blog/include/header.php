<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<style type="text/css">
	.site-header .main-header {
	padding: 10px 0 !important;
}
.site-footer:before {
  background-image: url("<?php echo base_url()?>templates/blog/asset/images/placeholder/blogberg-footer-shape.png");
  background-position: center bottom;
  bottom: 0;
  content: "";
  height: 365px;
  left: 0;
  right: 0;
  position: absolute;
  width: 100%;
  z-index: -1;
}
</style>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url().'images/logo-Cast-India.png'?>" type="<?php echo base_url().'images/logo-Cast-India.png'?>" sizes="16x16">
	<title>Castindia Blog</title>
	<link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
	<link rel='dns-prefetch' href='http://s.w.org/' />
	<link rel='stylesheet' id='blogberg-google-fonts-css'  href='http://fonts.googleapis.com/css?family=Hind:300,400,400i,500,600,700,800,900|Playfair+Display:400,400italic,700,900' type='text/css' media='all' />
	<link rel='stylesheet' id='bootstrap-css'  href='<?php echo base_url()?>templates/blog/asset/vendors/bootstrap/css/bootstrap.mina352.css?ver=4.1.3' type='text/css' media='all' />
	<link rel='stylesheet' id='kfi-icons-css'  href='<?php echo base_url()?>templates/blog/asset/vendors/kf-icons/css/style8a54.css?ver=1.0.0' type='text/css' media='all' />
	<link rel='stylesheet' id='owlcarousel-css'  href='<?php echo base_url()?>templates/blog/asset/vendors/OwlCarousel2-2.2.1/assets/owl.carousel.min77e6.css?ver=2.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='owlcarousel-theme-css'  href='<?php echo base_url()?>templates/blog/asset/vendors/OwlCarousel2-2.2.1/assets/owl.theme.default.min77e6.css?ver=2.2.1' type='text/css' media='all' />
	<link rel='stylesheet' id='blogberg-blocks-css'  href='<?php echo base_url()?>templates/blog/asset/css/blocks.min.css' type='text/css' media='all' />
	<link rel='stylesheet' id='blogberg-style-css'  href='<?php echo base_url()?>templates/blog/asset/css/style.css' type='text/css' media='all' />
	<link rel='stylesheet' id='blogora-style-parent-css'  href='<?php echo base_url()?>templates/blog/asset/css/style8d9d.css?ver=4.9.16' type='text/css' media='all' />
	<link rel='stylesheet' id='blogora-style-css'  href='<?php echo base_url()?>templates/blog/asset/css/style8a54.css?ver=1.0.0' type='text/css' media='all' />
	<link rel='stylesheet' id='blogora-google-fonts-css'  href='http://fonts.googleapis.com/css?family=Montserrat%3A300%2C400%2C400i%2C500%2C600%2C700%7CPoppins%3A300%2C400%2C500%2C600%2C700&amp;display=swap&amp;ver=4.9.16' type='text/css' media='all' />
	<script type='text/javascript' src='<?php echo base_url()?>templates/blog/asset/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
	<script type='text/javascript' src='<?php echo base_url()?>templates/blog/asset/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
</head>
	<body class="home blog wp-custom-logo site-layout-full">
		<div id="site-loader">
			<div class="site-loader-inner">
				<img src="<?php echo base_url()?>templates/blog/asset/images/placeholder/loader1.gif" alt="Site Loader">			</div>
			</div>
			<div id="page" class="site">
				<a class="skip-link screen-reader-text" href="#">Skip to content</a>
				<div id="offcanvas-menu">
					<div class="close-offcanvas-menu">
						<span class="kfi kfi-close-alt2"></span>
					</div>
					<div class="header-search-wrap">
						<form role="search" method="post" action="<?php echo base_url(); ?>blog/search_param" id="searchform" class="searchform" action="#">
								<div>
									<label class="screen-reader-text" for="s">Search for:</label>
									<input type="text" name="blog_title" id="s" />
								</div>
								<button type="submit" class="search-button"><span class="kfi kfi-search"></span></button>
							</form>
					</div>
							<div id="primary-nav-offcanvas" class="offcanvas-navigation d-xl-none d-lg-block">
								<ul>
									<li>
										<a href="<?php echo base_url().'home';?>">Home</a>
									</li>
								</ul>
							</div>
							<div id="secondary-nav-offcanvas" class="offcanvas-navigation d-none d-lg-block">
							</div>
							<div class="top-header-right">
								<div class="socialgroup">
								</div>
							</div>
						</div>
						<header id="fixed-header" class="wrapper wrap-fixed-header site-header" role="banner">
							<div class="container">
								<div class="row align-items-center">
									<div class="col-7 col-lg-2">
										<div class="site-branding-outer">
											<div class="site-branding">
												<a href="<?php echo base_url() ;?>home" class="custom-logo-link" rel="home" itemprop="url"><img width="120" height="60" src="<?php echo base_url()?>templates/blog/asset/uploads/2019/11/cropped-logo.png" class="custom-logo" alt="" itemprop="logo" srcset="" sizes="(max-width: 710px) 100vw, 710px" /></a>
												
											</div><!-- .site-branding -->
										</div>
									</div>
									<div class="col-lg-8 d-none d-lg-block">
										<div class="main-navigation-wrap">
											<div class="container">
												<div class="wrap-nav main-navigation">
													<div id="navigation">
														<nav class="nav">
															<ul>
																<li>
																	<a href="<?php echo base_url().'home';?>">Home</a>
																</li>
															</ul>
														</nav>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-2 col-5" id="header-bottom-right-outer">
										<div class="header-icons-wrap text-right">
											<div class="header-search-icon">
												<button aria-expanded="false">
													<span class="kfi kfi-search" aria-hidden="true"></span>
												</button>
											</div>
											<span class="alt-menu-icon ">
												<a class="offcanvas-menu-toggler" href="#">
													<span class="icon-bar"></span>
												</a>
											</span>
										</div>
									</div>
								</div>
							</div>
						</header><!-- fixed header -->		
						<header id="masthead" class="wrapper site-header primary-header" role="banner">
							<div class="main-header">
								<div class="container">
									<div class="site-branding-outer">
										<div class="site-branding">
										    <h1 style="margin-bottom:25px;">
											<a  href="<?php echo base_url() ;?>home" class="custom-logo-link" rel="home" itemprop="url"><img width="107" height="68" src="<?php echo base_url()?>templates/blog/asset/uploads/2019/11/cropped-logo.png" class="custom-logo" alt="" itemprop="logo" srcset="" sizes="(max-width: 710px) 100vw, 710px" /></a>	
											</h1>
											<h1 style="margin-bottom:-20px;">
		                                        <p style="font-size:14px;">Launching India’s Finest.</p>
	                                        </h1>
										</div><!-- .site-branding -->
									</div>
								</div>
							</div>
							<div class="main-navigation-wrap">
								<div class="container">
									<div class="main-navigation-inner">
										<div class="row align-items-center">
											<div class="d-none d-lg-block col-lg-9" id="primary-nav-container">
												<div class="wrap-nav main-navigation">
													<div id="navigation" class="d-xl-block">
														<nav class="nav">
															<ul>
																<li>
																	<a href="<?php echo base_url().'home';?>">Home</a>
																</li>
															</ul>
														</nav>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-3" id="header-bottom-right-outer">
												<div class="header-icons-wrap text-right">
													<div class="socialgroup">
													</div>
													<div class="header-search-icon">
														<button aria-expanded="false">
															<span class="kfi kfi-search" aria-hidden="true"></span>
														</button>
													</div>
													<span class="alt-menu-icon ">
														<a class="offcanvas-menu-toggler" href="#">
															<span class="icon-bar"></span>
														</a>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Search form structure -->
							<div class="header-search-wrap">
								<div id="search-form">
									<form role="search" method="post" action="<?php echo base_url(); ?>blog/search_param" id="searchform" class="searchform" action="#">
								<div>
									<label class="screen-reader-text" for="s">Search for:</label>
									<input type="text" name="blog_title" id="s" />
								</div>
								<button type="submit" class="search-button"><span class="kfi kfi-search"></span></button>
							</form>	
								</div>
							</div>
						</header>	