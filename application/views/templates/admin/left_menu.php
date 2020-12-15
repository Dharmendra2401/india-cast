

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
<div class="sb-sidenav-menu">
<div class="nav">
<div class="text-center admin-pic">
<img src="<?php echo base_url(); ?>img/default.png" alt="default.jpg" style="width: 60px;">
<div class="sb-sidenav-menu-heading"><span class="bg-warning bg-admin">Admin</span></div>
</div>

<a class="nav-link" href="<?php echo base_url(); ?>admin">
<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
Dashboard
</a>

<a class="nav-link" href="<?php echo base_url(); ?>admin/slider_content">
<div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
Slider/Content
</a>

<a class="nav-link" href="<?php echo base_url(); ?>admin/industriesone">
<div class="sb-nav-link-icon"><i class="fas fa-industry"></i></div>
Industries 1
</a>

<a class="nav-link" href="<?php echo base_url(); ?>admin/industriestwo">
<div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
Industries 2
</a>

<a class="nav-link" href="<?php echo base_url(); ?>admin/aboutus">
<div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
About Us
</a>

<a class="nav-link <?php if(($pagename=='recuiter_list')||($pagename=='jobs_list')||($pagename=='job_details')){echo "collapsed active";}else{ echo "";} ?>" href="#" data-toggle="collapse" data-target="#collapseLayouts" <?php if($pagename=='recuiter_list'){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?> aria-controls="collapseLayouts">
<div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
Recruiters
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?php if(($pagename=='recuiter_list')||($pagename=='jobs_list') ||($pagename=='job_details')){echo "show";}else{ echo "";} ?>" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link" href="<?php echo base_url(); ?>admin/recuiter_list"><div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div> Recruiters List</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/jobs_list"><div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div> Recruiters Jobs</a>
</nav>
</div>


<a class="nav-link <?php if(($pagename=='events')||($pagename=='view_events')||($pagename=='detail_events')){echo "collapsed active";}else{ echo "";} ?>" href="#" data-toggle="collapse" data-target="#collapseLayoutstwo" <?php if($pagename=='recuiter_list'){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?> aria-controls="collapseLayouts">
<div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
Events
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?php if(($pagename=='events')||($pagename=='view_events') ||($pagename=='detail_events')){echo "show";}else{ echo "";} ?>" id="collapseLayoutstwo" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link " href="<?php echo base_url(); ?>admin/events"><div class="sb-nav-link-icon"><i class="fas fa-calendar-week"></i></div> Events Category</a>
<a class="nav-link <?php if(($pagename=='view_events') ||($pagename=='detail_events')){echo "active";}?>" href="<?php echo base_url(); ?>admin/view_events"><div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div> Events List</a>
</nav>
</div>


<a class="nav-link <?php if(($pagename=='blog_catagories')||($pagename=='blog_list')||($pagename=='details_blogs') ){echo "collapsed active";}else{ echo "";} ?>" href="#" data-toggle="collapse" data-target="#collapseLayoutsthree" <?php if($pagename=='recuiter_list'){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?> aria-controls="collapseLayouts">
<div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
Blogs
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?php if(($pagename=='blog_catagories')||($pagename=='blog_list')||($pagename=='details_blogs')){echo "show";}else{ echo "";} ?>" id="collapseLayoutsthree" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link " href="<?php echo base_url(); ?>admin/blog_catagories"><div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div> Blogs Category</a>
<a class="nav-link <?php if(($pagename=='blog_list')||($pagename=='details_blogs') ){echo "active";}?>" href="<?php echo base_url(); ?>admin/blog_list"><div class="sb-nav-link-icon"><i class="fas fa-list-ol"></i></div> Blogs Lists</a>
</nav>
</div>



<!-- 
<a class="nav-link" href="<?php echo base_url(); ?>admin/slider">
<div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
Slider
</a> -->

<a class="nav-link" href="<?php echo base_url();?>admin/applicant_list">
<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
Applicants List
</a>

<a class="nav-link" href="<?php echo base_url();?>admin/contact_us">
<div class="sb-nav-link-icon"><i class="fas fa-phone"></i></div>
Contact Us List
</a>


<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
Layouts
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link" href="layout-static.html">Static Navigation</a>
<a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
</nav>
</div>
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
Pages
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
Authentication
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link" href="login.html">Login</a>
<a class="nav-link" href="register.html">Register</a>
<a class="nav-link" href="password.html">Forgot Password</a>
</nav>
</div>
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
Error
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link" href="401.html">401 Page</a>
<a class="nav-link" href="404.html">404 Page</a>
<a class="nav-link" href="500.html">500 Page</a>
</nav>
</div>
</nav>
</div>
<div class="sb-sidenav-menu-heading">Addons</div>
<a class="nav-link" href="charts.html">
<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
Charts
</a>
<a class="nav-link" href="tables.html">
<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
Tables
</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/logout">
<div class="sb-nav-link-icon"><i class="fas fa-sigin"></i></div>
Logout
</a>
</div>
</div>
<div class="sb-sidenav-footer">

</div>
</nav>