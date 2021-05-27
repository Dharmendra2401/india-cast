
<?php $pagename= end($this->uri->segment_array()); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="<?php echo base_url().'images/logo-Cast-India.png'?>" type="<?php echo base_url().'images/logo-Cast-India.png'?>" sizes="16x16">
<title>Castindia</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="google-signin-client_id" content="773353308271-he9l4skbvsnjrmc953s4mligp2gtjpog.apps.googleusercontent.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/sweetalert.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.min.css"> 
<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/media.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/owlcarousel/assets/owl.carousel.css" rel='stylesheet' type='text/css' />



<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/fontawesome5/css/all.min.css">

  </head>

  <body >
	<!-- //navigation -->
<div class="loader" style="display: none;">
<i class="fas fa-circle-notch fa-spin"></i>
</div>
 
<!-- header -->
<?php if(($pagename!='aspmobile')&&($pagename!='empmobile')){?>
<div class="header">
	<div class="container">
		<div class="row">
		<div class="header-left col-md-6 col-sm-6 col-xs-12">
			<ul>
				<li><i class="fab fa-whatsapp"></i><a href="https://wa.me/<?php echo $admin['whatsapp'];?>"> +91 <?php echo $admin['whatsapp'];?></a></li>
				<li><i class="fas fa-envelope"></i><a href="mailto:<?php echo $admin['s_email'];?>"> <?php echo $admin['s_email'];?></a></li>
			</ul>
		</div>
		<div class="header-right col-md-6 col-sm-6 col-xs-12">
			<ul>
			
				<li><a href="<?php echo base_url().'login'?>"  >Login</a></li>
				<li><a href="<?php echo base_url().'registration'?>"  >Register</a></li>
				<li><a href="#contact" style="padding-right:0px;" id="#contact">Contact us</a></li>
		
				<!-- <li><a href="<?php echo base_url();?>/recruiter/dashboard">Recruiter</a></li>
			
				<li><a href="<?php echo base_url();?>/adminpanel/dashboard">Admin</a></li>
			
				<li><a href="<?php echo base_url();?>/user/dashboard">Manage Profile</a></li>
				<li><a href="<?php echo base_url();?>/user/logout">Logout</a></li> -->
		
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<?php } ?>
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
<?php if(($pagename!='aspmobile')&& ($pagename!='empmobile')){?>
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
		 <!-- <li><a href="<?php echo base_url().'home/about';?>">ABOUT US</a></li> -->
        <li><a href="#">Casting Calls  </a></li>
        <li><a href="#">Categories  </a></li>
        <li><a href="<?php echo base_url().'blog/index';?>">Blogs </a></li>
        <li><a href="#">Tie-Ups </a></li>
        <li><a href="#">Hire Talent </a></li>
        <!-- <li><a href="<?php echo base_url();?>home/blog">BLOGS </a></li> -->
        
      </ul>
    </div>
  </div>
</nav>
<?php } ?>
  
  