<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="<?php echo base_url().'images/logo-Cast-India.png'?>" type="<?php echo base_url().'images/logo-Cast-India.png'?>" sizes="16x16">
<title>Castindia</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />

<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/sweetalert.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.min.css"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Magra:700" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Oxygen:300,400,700" rel="stylesheet">
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src='<?php echo base_url(); ?>js/jquery.validate.min.js'></script>  
<script src='<?php echo base_url(); ?>js/sweetalert.min.js'></script>  
<script src='<?php echo base_url(); ?>js/additional-methods.js'></script>  
<script src='<?php echo base_url(); ?>js/jquery.ui.js'></script>
<script src="<?php echo base_url(); ?>js/wow.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDIaVx3nzu2hMV5Aa8bTeSJxx-s3TtSrmc"></script> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/fontawesome5/css/all.min.css">
<script> 
		new WOW().init();  
 </script>  

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108428907-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108428907-1');
</script>
  </head>

  <body >
  <style>
	.error{
		color:red;
	}
   .loading{
	   width:100%;
	   height:100%;
		position:fixed;
		background-color:rgba(255,255,255,0.5);
		z-index:9999999;
		display:none;
	}
	.loading img{
		position:absolute;
		top:42%;
		left:45%;
	}
   
  </style>
	<div class="loading" >
		<img src="<?php echo base_url(); ?>/img/loading.gif" width="200px"/>
	</div>
<script>  
	$("#logindiv").hide();
</script>  
<!-- header -->
<div class="header">
	<div class="container">
		<div class="header-left">
			<ul>
				<li>+91 9890726666</li>
				<li><a href="#">info@castindia.in</a></li>
			</ul>
		</div>
		<div class="header-right">
			<ul style="float:right;">
			
				<li><a href="<?php echo base_url();?>home/login">Login</a></li>
				<li><a href="<?php echo base_url();?>home/register">Register</a></li>
			
				<li><a href="<?php echo base_url();?>home/login">Blogger</a></li>
				<li><a href="<?php echo base_url();?>home/contactus">Contact Us</a></li>
		
				<!-- <li><a href="<?php echo base_url();?>/recruiter/dashboard">Recruiter</a></li>
			
				<li><a href="<?php echo base_url();?>/adminpanel/dashboard">Admin</a></li>
			
				<li><a href="<?php echo base_url();?>/user/dashboard">Manage Profile</a></li>
				<li><a href="<?php echo base_url();?>/user/logout">Logout</a></li> -->
		
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header -->
<!-- logo -->
<div id="home" class="logo">
	<div class="container">
		<h1 style="margin-bottom:25px;"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>/images/logo-Cast-India.png" class="logo_img"></a><h1>
		<p>Launching India’s Finest.</p>
	</div>
</div>
<!-- //logo -->

<!-- navigation -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!--li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">HOME <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">CATEGORIES</a></li>
            <li><a href="#">ABOUT US</a></li>
            <li><a href="#">CATEGORIES </a></li>
            <li><a href="#">CASTING CALLS  </a></li>
            <li><a href="#">EVENTS </a></li>
            <li><a href="#">TIE-UPS </a></li>
            <li><a href="#">BLOGS </a></li>
          </ul>
        </li-->
		<!--li class="dropdown"><a  class="dropdown-toggle" data-toggle="dropdown" href="#"> ABOUT US <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
              <li><a href="#">FEMALE MODELS</a></li>
              <li><a href="#">MALE MODELS</a></li>
              <li><a href="#">MODELS BEGINNERS</a></li>
              <li><a href="#">TEENAGER FEMALE</a></li>
              <li><a href="#">TEENAGER MALE</a></li>
              <li><a href="#">TEENAGER BEGINNERS</a></li>
            </ul>
        </li>
		<li class="dropdown"><a  class="dropdown-toggle" data-toggle="dropdown"  href="#">PHOTOGRAPHERS  <span class="caret"></a>
          <ul class="dropdown-menu" role="menu">
              <li><a href="#">CELEBRITY PHOTOGRAPHERS</a></li>
              <li><a href="#">FASHION PHOTOGRAPHER</a></li>
              <li><a href="#">OTHERS</a></li>
            </ul>
        </li-->
        <!--li><a href="#">ABOUT US</a></li>
        <li><a href="#">CATEGORIES</a></li>
        <li><a href="#">ADVISORY BOARD </a></li>
        <li><a href="#">TESTIMONIALS </a></li>
        <li><a href="#">FAQs </a></li>
        <li><a href="#">CTA  </a></li>
		<li><a href="<?php echo base_url();?>/contactus">CONTACT US</a></li-->
		
		<li><a href="<?php echo base_url().'home/about';?>">ABOUT US</a></li>
        <li><a href="#">CATEGORIES </a></li>
        <li><a href="<?php echo base_url().'home/calls';?>">CASTING CALLS  </a></li>
        <li><a href="<?php echo base_url().'home/event';?>">EVENTS </a></li>
        <li><a href="#">TIE-UPS </a></li>
        <li><a href="<?php echo base_url();?>home/blog">BLOGS </a></li>
        <li><a href="<?php echo base_url();?>home/recuirter_login">HIRE TALENT </a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- //navigation -->
  
  