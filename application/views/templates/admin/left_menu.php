

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

<a class="nav-link" href="<?php echo base_url(); ?>admin/vedio">
<div class="sb-nav-link-icon"><i class="fas fa-photo-video"></i></div>
Video Content
</a>

<a class="nav-link" href="<?php echo base_url(); ?>admin/hired_hire">
<div class="sb-nav-link-icon"><i class="fas fa-suitcase"></i></div>
Steps Hired/Hire
</a>

<a class="nav-link" href="<?php echo base_url(); ?>admin/banner_image">
<div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
Banner Image
</a>

<a class="nav-link" href="<?php echo base_url(); ?>admin/recentemp">
<div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
Recent Emp
</a>

<a class="nav-link" href="<?php echo base_url(); ?>admin/faq">
<div class="sb-nav-link-icon"><i class="fas fa-question"></i></div>
FAQ
</a>

<a class="nav-link" href="<?php echo base_url(); ?>admin/usercontent">
<div class="sb-nav-link-icon"><i class="fas fa-file-word"></i></div>
User Content
</a>
<a class="nav-link " href="<?php echo base_url(); ?>admin/testimonials" >
<div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
Testimonials
</a>

<a class="nav-link <?php if(($pagename=='aspprofile')||($pagename=='aspsubcat')){ echo 'active';}?>" href="<?php echo base_url(); ?>admin/aspcat">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
Aspirant Category
</a>

<a class="nav-link" href="<?php echo base_url(); ?>admin/empcat">
<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
Employer Profile
</a>

<a class="nav-link" href="<?php echo base_url(); ?>admin/faqquerries">
<div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
FAQ Query
</a>


<!-- 
<a class="nav-link <?php if(($pagename=='recuiter_list')||($pagename=='jobs_list')||($pagename=='job_details')||($pagename=='view_recruiter')){echo "collapsed active";}else{ echo "";} ?>" href="#" data-toggle="collapse" data-target="#collapseLayouts" <?php if($pagename=='recuiter_list'){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?> aria-controls="collapseLayouts">
<div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
Recruiters
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?php if(($pagename=='recuiter_list')||($pagename=='jobs_list') ||($pagename=='job_details')||($pagename=='view_recruiter')){echo "show";}else{ echo "";} ?>" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link" href="<?php echo base_url(); ?>admin/recuiter_list"><div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div> Recruiters List</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/jobs_list"><div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div> Recruiters Jobs</a>
</nav>
</div>

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
<a class="nav-link" href="<?php echo base_url(); ?>admin/ourwork">
<div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
Our Works
</a>
<a class="nav-link" href="<?php echo base_url(); ?>admin/team">
<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
Team
</a>




<a class="nav-link <?php if(($pagename=='events')||($pagename=='view_events')||($pagename=='detail_events')){echo "collapsed active";}else{ echo "";} ?>" href="#" data-toggle="collapse" data-target="#collapseLayoutstwo" <?php if($pagename=='recuiter_list'){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?> aria-controls="collapseLayouts">
<div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
Events
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?php if(($pagename=='events')||($pagename=='view_events')||($pagename=='add_events') ||($pagename=='detail_events')){echo "show";}else{ echo "";} ?>" id="collapseLayoutstwo" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link " href="<?php echo base_url(); ?>admin/events"><div class="sb-nav-link-icon"><i class="fas fa-calendar-week"></i></div> Events Category</a>
<a class="nav-link " href="<?php echo base_url(); ?>admin/add_events"><div class="sb-nav-link-icon"><i class="fas fa-calendar-week"></i></div>Add Event</a>
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
-->
<a class="nav-link <?php if(($pagename=='terms_conditions')||($pagename=='app_terms_conditions')||($pagename=='rec_terms_conditions')){echo "collapsed active";}else{ echo "";} ?>" href="#" data-toggle="collapse" data-target="#collapseLayoutsfour" <?php if($pagename=='recuiter_list'){echo "aria-expanded='true'";}else{ echo "aria-expanded='false'";} ?> aria-controls="collapseLayouts">
<div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
Terms & Conditions
<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?php if(($pagename=='terms_conditions')||($pagename=='rec_terms_conditions')||($pagename=='app_terms_conditions')|| ($pagename=='ven_terms_conditions')|| ($pagename=='train_terms_conditions') ){echo "show";}else{ echo "";} ?>" id="collapseLayoutsfour" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
<nav class="sb-sidenav-menu-nested nav">
<a class="nav-link " href="<?php echo base_url(); ?>admin/terms_conditions"><div class="sb-nav-link-icon"><i class="fas fa-home"></i></div> Home</a>
<a class="nav-link " href="<?php echo base_url(); ?>admin/app_terms_conditions"><div class="sb-nav-link-icon"><i class="fas fa-user"></i></div> Applicant</a>
<a class="nav-link " href="<?php echo base_url(); ?>admin/rec_terms_conditions"><div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div> Recruiter</a>
<a class="nav-link " href="<?php echo base_url(); ?>admin/ven_terms_conditions"><div class="sb-nav-link-icon"><i class="fas fa-users"></i></div> Vendor</a>
<a class="nav-link " href="<?php echo base_url(); ?>admin/train_terms_conditions"><div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div> Trainer</a>

</nav>
</div>

 

<!-- 
<a class="nav-link" href="<?php echo base_url(); ?>admin/slider">
<div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
Slider
</a> -->

<!-- <a class="nav-link" href="<?php echo base_url();?>admin/applicant_list">
<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
Applicants List
</a>

<a class="nav-link" href="<?php echo base_url();?>admin/contact_us">
<div class="sb-nav-link-icon"><i class="fas fa-phone"></i></div>
Contact Us List
</a>

<a class="nav-link" href="<?php echo base_url();?>admin/super_model">
<div class="sb-nav-link-icon"><i class="fas fa-thumbs-up"></i></div>
Super Model
</a> -->



<a class="nav-link" href="<?php echo base_url(); ?>admin/logout">
<div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
Logout
</a>
</div>
</div>
<div class="sb-sidenav-footer">

</div>
</nav>