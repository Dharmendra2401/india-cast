<div id="content" class="site-main">	
	<section class="block-slider block-slider-one">
		<div class="container">
			<div class="controls"></div>
			<div class="owl-pager" id="slide-pager"></div>
			<div class="home-slider owl-carousel">
				<?php 
                    if($blogs_sliders){
                        foreach ($blogs_sliders as $blogs_slider ) {?>
							<div class="slide-item" style="background-image: url('<?php echo base_url('images/blog/'.$blogs_slider['blog_images'])?>');">
								<div class="banner-overlay">
									<div class="slide-inner text-center">
										<article class="post">
											<div class="post-content">
												<span class="entry-meta-cat">
													<a href="<?php echo base_url('blog/blog_details/'.$blogs_slider['id'])?>">
													<?php echo $blogs_slider['blog_title']?>							
													</a>
												</span>
												<header class="post-title">
													<h2>
														<a href="<?php echo base_url('blog/blog_details/'.$blogs_slider['id'])?>">
														<?php echo $blogs_slider['blog_title']?>							
														</a>
													</h2>
												</header>
												<div class="meta-tag">
													<div class="meta-time">
														<a href="#" >
															<?php echo $blogs_slider['date_created']?>									
														</a>
													</div>
													<div class="meta-author">
														<a href="#">
														Admin								
														</a>
													</div>
													<div class="meta-comment">
														<a href="#">
														0								
														</a>
													</div>
												</div>
												<div class="button-container">
													<a href="<?php echo base_url('blog/blog_details/'.$blogs_slider['id'])?>" class="button-outline">
													Learn More					
													</a>
												</div>
											</div>
										</article>
									</div>
								</div>
							</div>
				<?php } }?>	
			</div>
			<div id="after-slider"></div>
		</div>
	</section>
	<section class="block-grid" id="main-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8" id="main-wrap">
					<div class="post-section">
						<div class="content-wrap">
							<div class="row"></div>
							<div class="row list-post ">
								<?php 
				                    if($blogs){
				                        foreach ($blogs as $blog ) {?>
											<div class="col-12">
												<article id="post-36" class="post post-36 type-post status-publish format-standard has-post-thumbnail hentry category-effective-research category-uncategorized">
												<div class="row">
													<div class="col-lg-6">
														<figure class="featured-image">
														<a href="<?php echo base_url('blog/blog_details/'.$blog['id'])?>">
															<img width="1200" height="710" src="<?php echo base_url('images/blog/'.$blog['blog_images'])?>" class="attachment-blogberg-1200-710 size-blogberg-1200-710 wp-post-image" alt="" /></a>
														</figure>
													</div> <!-- end col-lg-6 -->
														<div class="col-lg-6">
															<div class="post-content">
																<header class="entry-header">
																	<div class="entry-meta-cat">
																		<a href="<?php echo base_url('blog/blog_details/'.$blog['id'])?>"><?php  echo $this->db->get_where('blog_category', array('id'=>$blog['blog_category_id']))->row()->name;  ?></a>
																	</div>
																	<h3 class="entry-title">
																		<a href="<?php echo base_url('blog/blog_details/'.$blog['id'])?>"><?php echo $blog['blog_title']?></a>
																	</h3>
																	<div class="meta-tag">
																		<div class="meta-time">
																			<a href="#l" >
																			<?php echo $blog['date_created']?>						</a>
																		</div>
																		<div class="meta-author">
																			<a href="#">
																			Admin								</a>
																		</div>
																		<div class="meta-comment">
																			<a href="#">
																			0								</a>
																		</div>
																	</div>
																</header>
																<div class="post-text">
																	<p>&#8230;

																	</p>
																</div>
															</div>
														</div> <!-- end col-lg-6 -->
													</div> <!-- end row -->
												</article>
											</div>	
								<?php } }?>					
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<sidebar class="sidebar clearfix" id="primary-sidebar">
						<div id="search-2" class="widget widget_search">
							<form role="search" method="post" action="<?php echo base_url(); ?>blog/search_param" id="searchform" class="searchform" action="#">
								<div>
									<label class="screen-reader-text" for="s">Search for:</label>
									<input type="text" value="" name="title" id="s" />
								</div>
								<button type="submit" class="search-button"><span class="kfi kfi-search"></span></button>
							</form>
						</div>		
						<div id="recent-posts-2" class="widget widget_recent_entries">		
							<h2 class="widget-title">Recent Posts</h2>		
							<ul>
								<?php 
				                    if($blogs_limits){
				                        foreach ($blogs_limits as $blogs_limit ) {?>
								<li>
									<a href="<?php echo base_url('blog/blog_details/'.$blogs_limit['id'])?>"><?php echo $blogs_limit['blog_title']?></a>
								</li>
								<?php } }?>	
							</ul>
						</div>
						<div id="recent-comments-2" class="widget widget_recent_comments"><h2 class="widget-title">Recent Comments</h2><ul id="recentcomments"></ul>
						</div>
						<div id="archives-2" class="widget widget_archive"><h2 class="widget-title">Archives</h2>	 <ul>
							<li><a href='#'>April 2021</a></li>
						</ul>
						</div>	
					</sidebar>
				</div>			
			</div>						
		</div>
	</section>
</div> <!-- site main end -->
<div class="instagram-wrapper">
	<div class="container"></div>
</div>
						