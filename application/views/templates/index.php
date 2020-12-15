
<?php $this->load->view('/common/header'); ?>
<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<style>
.carousel-control.left {
    background-image: none;
}
.carousel-control.right {
    background-image: none;
}
.videoWrapper {
	position: relative;
	padding-bottom: 56.25%; /* 16:9 */
	padding-top: 25px;
	height: 0;
}
.videoWrapper iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
.carousel-fade .carousel-inner .item {
  opacity: 0;
  transition-property: opacity;
}

.carousel-fade .carousel-inner .active {
  opacity: 1;
}

.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  left: 0;
  opacity: 0;
  z-index: 1;
}

.carousel-fade .carousel-inner .next.left,
.carousel-fade .carousel-inner .prev.right {
  opacity: 1;
}

.carousel-fade .carousel-control {
  z-index: 2;
} 
@media all and (transform-3d), (-webkit-transform-3d) {
    .carousel-fade .carousel-inner > .item.next,
    .carousel-fade .carousel-inner > .item.active.right {
      opacity: 0;
      -webkit-transform: translate3d(0, 0, 0);
              transform: translate3d(0, 0, 0);
    }
    .carousel-fade .carousel-inner > .item.prev,
    .carousel-fade .carousel-inner > .item.active.left {
      opacity: 0;
      -webkit-transform: translate3d(0, 0, 0);
              transform: translate3d(0, 0, 0);
    }
    .carousel-fade .carousel-inner > .item.next.left,
    .carousel-fade .carousel-inner > .item.prev.right,
    .carousel-fade .carousel-inner > .item.active {
      opacity: 1;
      -webkit-transform: translate3d(0, 0, 0);
              transform: translate3d(0, 0, 0);
    }
} 

.popupContent {
    position: absolute;
    top: 121px;
    color: #fff;
    width: 80%;
    text-align: center;
    margin-left: 10%;
}
.popupContent h2{
    font-family: 'Fjalla One', sans-serif;
}
.modal-body {
    padding: 0;
}
button.close {
    position: absolute;
    right: 10px;
	color: #fff;
    opacity: 1;
}
</style>
<div class="clearfix"></div>









<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <img src="<?php echo base_url();;?>/images/ism-pic-copy.jpg" alt="" class="img_res"/>
		  <div class="popupContent">
			<h2>WELCOME TO INDIA SUPER MODEL</h2>
			<p>India Super Model is not just an ordinary MODEL HUNT. It’s a fiesta of fashion & beauty.</p>
			<p>join us !! A place among the stars is waiting for you!</p><br/><br/>
			<a href="<?php echo base_url();;?>/index/super-models" class="btn btn-primary d-inline-block d-sm-block" style="max-width:300px;display: inline-block!important;">REGISTER NOW</a>
		  </div>
        </div>
      </div>
      
    </div>
  </div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>










<section class="fullsize-video-bg">
	<div class="inner container">
		<div>
			<h1 class="bg_heading">A ONE STOP PLATFORM<br/>
FOR CREATIVE PASSION</h1>
      <p class="bg_des">All Creative Passion Under one roof..</p>
		<div class="col-md-6 somi">
				<div class="col-sm-6 col-md-6" style="margin-left:-15px;">
					<a href="#" class="btn btn-secondary d-inline-block d-sm-block">Find Crew &amp; Vendors</a>
					<small class="d-block mt-1 hero-text text-white">I need to hire.</small>
				</div>
				<div class="col-sm-6 col-md-6">
					<a href="#" class="btn btn-primary d-inline-block d-sm-block">Find Work</a>
					<small class="d-block mt-1 hero-text text-white">I want to get hired.</small>
				</div>
			</div>
		</div>
	</div>
	<div id="video-viewport">
		<video width="1920" height="1280" autoplay muted loop>
			<source src="<?php echo base_url();?>/images/CastIndiavideo.mp4" type="video/mp4" />
			
			<!--source src="http://www.coverr.co/s3/mp4/Winter-Grass.webm" type="video/webm" /-->
		</video>
	</div>
</section>

<div class="clearfix"></div>
<!-- banner -->
<!--div class="banner">
	<div class="container">
		<div class="banner-info">
			<h2>A PROFILE THAT PREPARES</h2>
			<p>Lorem ipsum dolor sit amet, consecte<br/>
				adipiscing elit. Fusce at justo eget lorem <br/>
				port titor tincidunt.</p>
		</div>
	</div>
</div-->
<!-- //banner -->
<!-- banner-bottom -->
<div id="apparel" class="banner-bottom">
	<div class="container" style="padding-top:4em;">
	
	
	
<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <div class="col-sm-6">
			<img src="<?php echo base_url();;?>/images/home_b.jpg" alt="" class="img_res"/>
		</div>
		<div class="col-sm-6">	
			<img src="<?php echo base_url();;?>/images/hr.svg" alt=""/>
			<h3 class="heading_font partHdn">Groom Yourself</h3>
			<p>We live in a culture of continuous upgrades, there is always something around the corner that will enthuse you to absorb. Knowing the fact that Mentorship is a key to a satisfying career we present Groom Yourself. </p>
			<ul style="padding-left: 13px;">
				<li>Our Groom yourself feature can help you find the right person through workshops. Here’s how.</li>
				<li>Easily find a range of creative workshops on Cast-India, which suits your passion.</li>
				<li>These workshops will be conducted by the professional mentors of the respective creative field.</li>
				<li>Workshops offer expertise and mentorship, as well as admiration.</li>
				<li>The more you learn the more you evolve. Learning new skills will kick-start your job search</li>
				<li>Cast-India analyses your needs and highlight projects based on your skills, helping you showcase your talent. </li>
				<li>The greater upgrade you get with workshops, the more likely you are to get hired by recruiters of Cast-India.  </li>
			</ul>
			<!--a href="#" class="btn btn-outline-secondary">Learn More</a-->
		</div>
      </div>

      <div class="item">
        <div class="col-sm-6">
			<img src="<?php echo base_url();;?>/images/bann1.jpg" alt="" class="img_res"/>
		</div>
		<div class="col-sm-6">	
			<img src="<?php echo base_url();;?>/images/hr.svg" alt=""/>
			<h3 class="heading_font partHdn">Earn and Learn</h3>
			<p>The main purpose of 'Earn & Learn" is to develop a fresher as a multifaceted personality with excellence. Here cast India will enable you to enhance your creative skill set while giving you an opportunity to hone your existing one. Cast India will provide you with a unique opportunity to learn from a variety of professionals and earn points. These points will later allow you to enhance your profile increasing chances of you getting hired.</p>
			<ul style="padding-left: 13px;">
				<li>Cast-India conducts different types of short-term workshops of various art forms. </li>
				<li>You can join any workshop that suits your potentials. </li>
				<li>These workshops will be conducted by the professional mentors of the creative field.</li>
				<li>These workshops will reward you with a unique points system</li>
				<li>You will be credited with points each time after you enrolled for any workshop.</li>
				<li>You can update and polish your creative skills through these workshops and earn points as well.</li>
				<li>As your points increase, your rank will also be increased.</li>
				<!--li>Higher rank gives you more chances to obtain an opportunity to get hired by our recruiters.</li>
				<li>You can view your job opportunities and submit proposals too.</li-->
			</ul>
			<!--a href="#" class="btn btn-outline-secondary">Learn More</a-->
		</div>
      </div>
    
      <div class="item">
        <div class="col-sm-6">
			<img src="<?php echo base_url();;?>/images/bann2.jpg" alt="" class="img_res"/>
		</div>
		<div class="col-sm-6">	
			<img src="<?php echo base_url();;?>/images/hr.svg" alt=""/>
			<h3 class="heading_font partHdn">Get Connected</h3>
			<p>Finding a job takes persistence, and help from your connections. Here in Cast India you can connect to various professionals who are on the lookout for talent.
			Cast India will enable you to connect to specific professionals from your field of work. </p>
			<ul style="padding-left: 13px;">
				<li>If you are a beginner in this competitive field, and struggling to get an opportunity, Cast-India is a perfect podium which can spot the potential inside you.</li>
				<li>Cast-India have a prestigious pool of potential recruiters.</li>
				<li>You can register with us, build a strong profile, portfolio, and get connected with the recruiters.</li>
				<li>In the job search, every connection counts.</li>
				<li>Finding the right job in your creative field begins with your connections. Get started on Cast India.</li>
			</ul>
			<!--a href="#" class="btn btn-outline-secondary">Learn More</a-->
		</div>
      </div>
	  
      <div class="item">
        <div class="col-sm-6">
			<img src="<?php echo base_url();;?>/images/bann2.jpg" alt="" class="img_res"/>
		</div>
		<div class="col-sm-6">	
			<img src="<?php echo base_url();;?>/images/hr.svg" alt=""/>
			<h3 class="heading_font partHdn">Launch Yourself</h3>
			<p>Remember, your profile is the key to getting hired. To maximize your chances of getting hired one should keep his/her profile up to date. Attending the workshops organised by Cast India and Being fully present and keeping your profile updated can help you be more effective at your field. Here’s how</p>
			<ul style="padding-left: 13px;">
				<li>Enrol to Cast India and get an access to many facilities, workshops and professional recruiters.</li>
				<li>Your profile will let you enter the glamorous world, open to new opportunities.</li>
				<li>Build an eye catchy profile, portfolio and keep updating your profile via workshops which will entice the attention of recruiters. </li>
				<li>You can approach many potential recruiters according to your skills and area of interest.</li>
				<li>Launch yourself in the field of art through Cast-India.</li>
			</ul>
			<!--a href="#" class="btn btn-outline-secondary">Learn More</a-->
		</div>
      </div>
    </div>
	<div class="col-sm-6" id="dynamicTop">
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		  <span class="glyphicon glyphicon-chevron-left"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
		  <span class="glyphicon glyphicon-chevron-right"></span>
		  <span class="sr-only">Next</span>
		</a>
	</div>	
  </div>	
<script>
$(document).ready(function(){
	var divHeight = document.getElementsByClassName('carousel-inner')[0];
	var tempHt = -(divHeight.offsetHeight)/2;
	//alert(tempHt);
	$('#dynamicTop').css('margin-top',tempHt);
})
</script>	
	
	
	
		
		
		
		<div class="clearfix"></div>

<div class="container">
<div class="row" style="padding:6em 0;">
		<div class="col-sm-12" style="text-align:center;padding-bottom:2em;">	
			<img src="<?php echo base_url();;?>/images/hr.svg" alt=""/>
			<h3 class="heading_font">THE INDUSTRY'S BEST KEPT SECRET</h3>
			<p>Go beyond just search and find. Our online platform is full of time-saving tools<br/>and resources to help you get a job done. Or just get a job.</p>
		</div>
		<div class="col-sm-6 somi" style="padding-top:4em;">
			<img src="<?php echo base_url();;?>/images/icon-quote.2fa88ae581e5.svg" alt="" style="width:50px;"/>
			<h3 class="bg_heading" style="color:#555;line-height: 47px;font-size: 34px;">Our freelancer is gold. She’s the full package.</h3>
			<p>Our freelancer is gold. She’s the full package.</p>
			<p>Our freelancer is gold.</p>
		</div>
		<div class="col-sm-6 somi">
			<div class="videoWrapper">
				<iframe id="player" width="854" height="480" src="http://www.youtube.com/embed/l-gQLqv9f4o?enablejsapi=1&autoplay=1" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
			</div>
		</div>
</div>
</div>
<script>
//play when video is visible
var videos = document.getElementsByTagName("iframe"), fraction = 0.8;

function checkScroll() {

  for(var i = 0; i < videos.length; i++) {
    var video = videos[i];

    var x = 0,
        y = 0,
        w = video.width,
        h = video.height,
        r, //right
        b, //bottom 
        visibleX, visibleY, visible,
        parent;

    
    parent = video;
    while (parent && parent !== document.body) {
      x += parent.offsetLeft;
      y += parent.offsetTop;
      parent = parent.offsetParent;
    }

    r = x + parseInt(w);
    b = y + parseInt(h);
   

    visibleX = Math.max(0, Math.min(w, window.pageXOffset + window.innerWidth - x, r - window.pageXOffset));
    visibleY = Math.max(0, Math.min(h, window.pageYOffset + window.innerHeight - y, b - window.pageYOffset));
    

    visible = visibleX * visibleY / (w * h);


    if (visible > fraction) {
      playVideo();
    } else {
      pauseVideo();

    }
  }

};


var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;

function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });
};

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
    window.addEventListener('scroll', checkScroll, false);
    window.addEventListener('resize', checkScroll, false);

    //check at least once so you don't have to wait for scrolling for the    video to start
    window.addEventListener('load', checkScroll, false);
};


function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING) {
      //console.log("event played");
    } else {
      //console.log("event paused");
    }
};

function stopVideo() {
    player.stopVideo();
};

function playVideo() {
  player.playVideo();
};

function pauseVideo() {
  player.pauseVideo();
};


</script>
		
		
		<div class="clearfix"></div>
		
		<div class="col-sm-12" style="text-align:center;padding-top:3em;padding-bottom:2em;">	
			<img src="<?php echo base_url();;?>/images/hr.svg" alt=""/>
			<h3 class="heading_font">THE INDUSTRY'S BEST KEPT SECRET</h3>
		</div>
		<div class="col-sm-12 somi card-deck">
		<div class="col-sm-6">
			<div class="card-body card-home orange-top col-sm-12">
				<h3 class="card-title heading_font">3 WAYS TO <span class="text-primary">HIRE</span></h3>
				<p class="card-text text-muted"><small>A helpful tool for talent seekers.</small></p>
				<div class="header-sm">Post a Job</div>
				<p class="card-text">Post the project with a required qualification and skills of the required applicant to invite qualified, targeted candidates to your full-time or part-time job openings.</p>
				<div class="header-sm">Verify your Profile</div>
				<p class="card-text">Create a profile and verify it by submitting mandatory documents to get an access of 150,000 verified professional profiles. Ensure the applicants profile and get connected.</p>
				<div class="header-sm">Search and Connect</div>
				<p class="card-text">Surf over 150,000 verified professional profiles. Browse through 300+ categories. Ensure the aspirant’s skills, qualifications, location etc. Get connected and hire directly through their profile.</p>
				<br/>
				<a href="#" class="btn btn-outline-secondary">Get Started</a>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="card-body card-home orange-top col-sm-12">
				<h3 class="card-title heading_font">3 WAYS TO <span class="text-primary">GET HIRED</span></h3>
				<p class="card-text text-muted"><small>A helpful tool for job hunting</small></p>
				<div class="header-sm">Showcase Your Profile</div>
				<p class="card-text">Create a strong profile showcasing your skills and expertise to start appearing in targeted online searches by potential clients. Get contacted and hired directly through your profile.</p>
				<div class="header-sm">Get Connected</div>
				<p class="card-text">Gain access to our potential recruiters and clients. Connect and respond to different projects of your desired creative field. </p>
				<div class="header-sm">Get Hired</div>
				<p class="card-text">Stay on top of the latest openings in the industry to view job opportunities. Submit proposals and keep your career goals on track.</p>
				<br/>
				<a href="/find-work" class="btn btn-outline-secondary">Get Started</a>
			</div>
		</div>
		</div>
		
		<div class="clearfix"></div>
		
		<!-- <div class="col-sm-12" style="text-align:center;padding-top:3em;padding-bottom:3em;">	
			<img src="<?php echo base_url();;?>/images/hr.svg" alt=""/>
			<h3 class="heading_font">SIMPLE TOOLS TO SAVE YOU TIME.</h3>
			<p>Go beyond just search and find. Our online platform is full of time-saving tools<br/>and resources to help you get a job done. Or just get a job.</p>
		</div>
		<div class="col-sm-10 col-md-offset-1">
			<img src="<?php echo base_url();;?>/images/platform_diagram.png" alt="" class="img_res"/>
		</div> -->
	
		<!--div class="bottom-header">	
			<h3>How You Benefit?</h3>
			<p>Cast India – a platform that prepares. So, what’s in store for you here?</p>
		</div-->
		<!--div class="bottom-grids">
			<div class="col-md-3 bottom-grid">
				<div class="camera-grid">
					<h3>Groom Yourself </h3>
					<p>A wide range of workshops, which you can pick and choose, and transform yourself. </p>
					<div class="readmore"><a>Read more</a></div>
				</div>
				<div class="cam-img">
					<img src="<?php echo base_url();;?>/images/11.png" alt=""/>
				</div>
			</div>
			<div class="col-md-3 bottom-grid">
				<div class="camera-grid">
					<h3>Get Connected</h3>
					<p>Get in touch with several artists and back-end talents from your field!</p>
					<div class="readmore"><a>Read more</a></div>
				</div>
				<div class="cam-img">
					<img src="<?php echo base_url();;?>/images/122.png" alt=""/>
				</div>
			</div>
			<div class="col-md-3 bottom-grid">
				<div class="camera-grid">
					<h3>Earn and Learn</h3>
					<p>A once-in-a-lifetime opportunity to receive work, and, learn simultaneously!</p>
					<div class="readmore"><a>Read more</a></div>
				</div>
				<div class="cam-img">
					<img src="<?php echo base_url();;?>/images/13.png" alt=""/>
				</div>
			</div>
			<div class="col-md-3 bottom-grid">
				<div class="camera-grid">
					<h3>Launch Yourself </h3>
					<p>And finally, once you’re ready, launch yourself in the glamour world!</p>
					<div class="readmore"><a>Read more</a></div>
				</div>
				<div class="cam-img">
					<img src="<?php echo base_url();;?>/images/14.png" alt=""/>
				</div>
			</div>
			<div class="clearfix"></div>
		</div-->
	</div>
</div>
<!-- //banner-bottom -->
<!-- portfolio -->
<div id="portfolio" class="port-folio">	
		<!-- Portfolio Starts Here -->
		<div class="container">
			<!--div class="portfolio-info">
				<h3>RECENT ARTISTS</h3>
				<p>Cast India’s Finest</p>
			</div-->
			<div style="text-align:center;">
				<img src="<?php echo base_url();;?>/images/hr.svg" alt=""/>
				<h3 class="heading_font">RECENT ARTISTS</h3>
				<p>Cast India’s Finest</p>
			</div>
		</div>
		<div class="slider">
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>					
							<div id="portfoliolist">
								<div class="container">
									<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
										<div class="portfolio-wrapper">		
											<img class="img-responsive" src="<?php echo base_url();;?>/images/Raveen.jpg" />
											<div class="description">
												<h4>Raveen Gaikwad</h4>
												<img src="<?php echo base_url();;?>/images/24.png" alt=""/>
												<p>Zumba Instructor</p>
											</div>
										</div>
									</div>				
									<div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
										<div class="portfolio-wrapper">		
											<img class="img-responsive" src="<?php echo base_url();;?>/images/9.jpg" />
											<div class="description">
												<h4>Sapna Singh</h4>
												<img src="<?php echo base_url();;?>/images/24.png" alt=""/>
												<p>Model and Actress </p>
											</div>
										</div>
									</div>		
									<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
										<div class="portfolio-wrapper">		
											<img class="img-responsive" src="<?php echo base_url();;?>/images/kunal.jpg" />
											<div class="description">
												<h4>Kunal</h4>
												<img src="<?php echo base_url();;?>/images/24.png" alt=""/>
												<p>Director of Photography & Film Maker</p>
											</div>
										</div>
									</div>				
									<div class="portfolio icon mix_all" data-cat="icon" style="display: inline-block; opacity: 1;">
										<div class="portfolio-wrapper">		
											<img class="img-responsive" src="<?php echo base_url();;?>/images/11.jpg" />
											<div class="description">
												<h4>Sonali Chikki</h4>
												<img src="<?php echo base_url();;?>/images/24.png" alt=""/>
												<p>Actress and Model</p>
											</div>
										</div>
									</div>	
									<div class="clearfix"></div>
								</div>
							</div>
						</li>
						<!--li>					
							<div id="portfoliolist">
								<div class="container">
									<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
										<div class="portfolio-wrapper">		
											<img class="img-responsive" src="<?php echo base_url();;?>/images/36.jpg" />
											<div class="description">
												<h4>Neha Kumari</h4>
												<img src="<?php echo base_url();;?>/images/24.png" alt=""/>
												<p>Lorem ipsum dolor sit amet, cocteru adipiscing elit, </p>
											</div>
										</div>
									</div>				
									<div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
										<div class="portfolio-wrapper">		
											<img class="img-responsive" src="<?php echo base_url();;?>/images/34.jpg" />
											<div class="description">
												<h4>Rohan Kadel</h4>
												<img src="<?php echo base_url();;?>/images/24.png" alt=""/>
												<p>Lorem ipsum dolor sit amet, cocteru adipiscing elit, </p>
											</div>
										</div>
									</div>		
									<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
										<div class="portfolio-wrapper">		
											<img class="img-responsive" src="<?php echo base_url();;?>/images/38.jpg" />
											<div class="description">
												<h4>Madhuri Pandey</h4>
												<img src="<?php echo base_url();;?>/images/24.png" alt=""/>
												<p>Lorem ipsum dolor sit amet, cocteru adipiscing elit, </p>
											</div>
										</div>
									</div>				
									<div class="portfolio icon mix_all" data-cat="icon" style="display: inline-block; opacity: 1;">
										<div class="portfolio-wrapper">		
											<img class="img-responsive" src="<?php echo base_url();;?>/images/37.jpg" />
											<div class="description">
												<h4>Chart Analysis</h4>
												<img src="<?php echo base_url();;?>/images/24.png" alt=""/>
												<p>Lorem ipsum dolor sit amet, cocteru adipiscing elit, </p>
											</div>
										</div>
									</div>	
									<div class="clearfix"></div>
								</div>
							</div>
						</li-->
					</ul>
				</div>
		</div>

</div>
<!-- //portfolio -->
<!-- testimonials 
<div id="testimonial" class="testimonials">
	<div class="container">
		<div class="test-grids">
			<div class="test-left">
				<h3 class="heading_font">TESTIMONIALS</h3>
				<img src="<?php echo base_url();;?>/images/27.png" alt=""/>
				
				
-->				
<style>
#myCarouselT .carousel-inner .item{
	min-height:263px;
}	
#myCarouselT .carousel-control.right {
    right: -50px;
}	
#myCarouselT .carousel-control.left {
    left: -50px;
}
#myCarouselT .carousel-control .glyphicon-step-backward, #myCarouselT .carousel-control .glyphicon-step-forward, .carousel-control .icon-next, .carousel-control .icon-prev {
    position: absolute;
    top: 50%;
    z-index: 5;
    display: inline-block;
    margin-top: -10px;
	color: #b1aeae;
    text-shadow: none;
}
</style>				
				
				
				
				<div id="myCarouselT" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarouselT" data-slide-to="0" class="active"></li>
      <li data-target="#myCarouselT" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides 
    <div class="carousel-inner">
      <div class="item active">
        <div class="testimonial-grids a">
					<div class="testimonial-left">
						<img src="<?php echo base_url();;?>/images/12.png" alt=""/>
					</div>
					<div class="testimonial-right">
						<h4><img src="<?php echo base_url();;?>/images/commaLeft.png" style="width:20px;"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.<img src="<?php echo base_url();;?>/images/commaRight.png" style="width:20px;"></h4>
						<p>Amey Pandit</p>
					</div>
					<div class="clearfix"></div>
				</div>
      </div>

      <div class="item">
        <div class="testimonial-grids a">
					<div class="testimonial-left">
						<img src="<?php echo base_url();;?>/images/12.png" alt=""/>
					</div>
					<div class="testimonial-right">
						<h4><img src="<?php echo base_url();;?>/images/commaLeft.png" style="width:20px;"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. but also the leap into electronic typesetting, remaining essentially unchanged.<img src="<?php echo base_url();;?>/images/commaRight.png" style="width:20px;"></h4>
						<p>Rohit Bhagat</p>
					</div>
					<div class="clearfix"></div>
				</div>
      </div>
    
    </div>
	<a class="left carousel-control" href="#myCarouselT" data-slide="prev">
		  <span class="glyphicon glyphicon-step-backward"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarouselT" data-slide="next">
		  <span class="glyphicon glyphicon-step-forward"></span>
		  <span class="sr-only">Next</span>
		</a>	
  </div>
				
				
				
				
				
				
				
				
			</div>
			<div class="test-right">
				<h3 class="heading_font">FREQUENTLY ASKED QUESTIONS</h3>
				<img src="<?php echo base_url();;?>/images/27.png" alt=""/>
				<div class="test-list">
						<div class="tab1 wow bounceIn" data-wow-delay="0.4s">
							<ul>
								<li><span> </span></li>
								<li class="text">What exactly is Cast India?</li>
							</ul>
							<p>A medium between applicants and recruiters. We bridge the gap between enthusiasts who are seeking work and enthusiasts who are willing to give work.</p>
						</div>
						<div class="tab2 wow bounceIn" data-wow-delay="0.4s">
							<ul>
								<li><span> </span></li>
								<li class="text">Who can apply?</li>
							
							</ul>
							<p>Anyone and everyone related to the industry. Right from a cameraman to an actor. </p>
						</div>
						<div class="tab3 wow bounceIn" data-wow-delay="0.4s">
							<ul>
								<li><span> </span></li>
								<li class="text">Why is Cast India helpful?</li>
								
							</ul>
							<p>Simply because you get a chance to get in touch with various other artists who might have the same goals as you. Grow as you collaborate. </p>
						</div>
						<div class="tab4 wow bounceIn" data-wow-delay="0.4s">
							<ul>
								<li><span> </span></li>
								<li class="text"> How authentic is Cast India?</li>
							</ul>
							<p>We are an authentic platform. We are mounted on providing talents the desired platform.</p>
						</div>
						<div class="tab5 wow bounceIn" data-wow-delay="0.4s">
							<ul>
								<li><span> </span></li>
								<li class="text"> Am I sure to get a break if I associate with Cast India?</li>
							</ul>
							<p>We cannot guarantee that, as a lot depends on your own talents.</p>
						</div>
						<!--div class="tab6 wow bounceIn" data-wow-delay="0.4s">
							<ul>
								<li><span> </span></li>
								<li class="text">Can the Theme be translated?</li>
							</ul>
							<p>Lorem ipsum dolor amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, 
								porttitor bibendum facilisi suspendisse, aliquam ipsum ante morbi sed ipsum mollis.</p>
						</div-->
				</div>
					<!-- script for tabs -->
						<script>
							$(document).ready(function(){
								$(".tab1 p").hide();
								$(".tab2 p").hide();
								$(".tab3 p").hide();
								$(".tab4 p").hide();
								$(".tab5 p").hide();
								$(".tab6 p").hide();
								$(".tab1 ul").click(function(){
									$(".tab1 p").slideToggle(300);
									$(".tab2 p").hide();
									$(".tab3 p").hide();
									$(".tab4 p").hide();
									$(".tab5 p").hide();
									$(".tab6 p").hide();
								})
								$(".tab2 ul").click(function(){
									$(".tab2 p").slideToggle(300);
									$(".tab1 p").hide();
									$(".tab3 p").hide();
									$(".tab4 p").hide();
									$(".tab5 p").hide();
									$(".tab6 p").hide();
								})
								$(".tab3 ul").click(function(){
									$(".tab3 p").slideToggle(300);
									$(".tab4 p").hide();
									$(".tab2 p").hide();
									$(".tab1 p").hide();
									$(".tab5 p").hide();
									$(".tab6 p").hide();
								})
								$(".tab4 ul").click(function(){
									$(".tab4 p").slideToggle(300);
									$(".tab3 p").hide();
									$(".tab2 p").hide();
									$(".tab1 p").hide();
									$(".tab5 p").hide();
									$(".tab6 p").hide();									
								})	
								$(".tab5 ul").click(function(){
									$(".tab5 p").slideToggle(300);
									$(".tab3 p").hide();
									$(".tab2 p").hide();
									$(".tab1 p").hide();
									$(".tab4 p").hide();
									$(".tab6 p").hide();									
								})
								$(".tab6 ul").click(function(){
									$(".tab6 p").slideToggle(300);
									$(".tab3 p").hide();
									$(".tab2 p").hide();
									$(".tab1 p").hide();
									$(".tab5 p").hide();
									$(".tab4 p").hide();									
								})
							});
						</script>
					<!-- script for tabs 
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>-->



<script>
var min_w = 300;
var vid_w_orig;
var vid_h_orig;

$(function() {

    vid_w_orig = parseInt($('video').attr('width'));
    vid_h_orig = parseInt($('video').attr('height'));

    $(window).resize(function () { fitVideo(); });
    $(window).trigger('resize');

});

function fitVideo() {

    $('#video-viewport').width($('.fullsize-video-bg').width());
    $('#video-viewport').height($('.fullsize-video-bg').height());

    var scale_h = $('.fullsize-video-bg').width() / vid_w_orig;
    var scale_v = $('.fullsize-video-bg').height() / vid_h_orig;
    var scale = scale_h > scale_v ? scale_h : scale_v;

    if (scale * vid_w_orig < min_w) {scale = min_w / vid_w_orig;};

    $('video').width(scale * vid_w_orig);
    $('video').height(scale * vid_h_orig);

    $('#video-viewport').scrollLeft(($('video').width() - $('.fullsize-video-bg').width()) / 2);
    $('#video-viewport').scrollTop(($('video').height() - $('.fullsize-video-bg').height()) / 2);

};
</script>
<?php $this->load->view('/common/footer'); ?>
