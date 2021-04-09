<!-- about -->
<?php $page='About Us'; $banner=$admin['banner_about'] ;?>
<?php $this->load->view('/common/header'); ?>
<?php include 'bedcrumb.php';  ?>
<div class="about">
	<div class="container">
		<div class="about-grids">
			<div class="about-left">
				<h3>WHO WE ARE</h3>
				<img src="<?php echo base_url();?>/images/27.png" alt="">
				<div><?php echo $about['content'];?></div>
				<!--a href="#">MORE</a-->
			</div>
			<div class="about-right">
				<img src="<?php echo base_url();?>uploads/about/<?php echo $about['image'];?>" alt="" style="margin-top:3em;"/>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //about -->
<!-- works -->
<div class="works">
	<div class="container">
		<h3>OUR WORKS</h3>
		<img src="<?php echo base_url();?>/images/27.png" alt="">
		<div class="our-grids">
			<?php $ii=1;foreach($works as $work) {?>
			<div class="col-md-3 our-grid">
				<div class="our-left">
					<p><?php echo $ii; ?></p>
				</div>
				<div class="our-right">
					<h4> <?php echo $work['title'] ;?></h4>
					<p><?php echo $work['content'] ;?></p>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php $ii++;} if($works[0]==''){?>
				<div class="alert alert-danger">No records found</div>
				<?php } ?>
				
			
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //works -->
<div class="work-team">
	<div class="container">
		<h3>OUR WORK TEAM</h3>
		<div class="team-img text-center">
			<img src="<?php echo base_url();?>/images/28.png" alt="">
		</div>
		<?php  foreach($team as $allmem){?>
		<div class="team-grids">
			<div class="team-grid">
			<img src="<?php echo base_url();?>uploads/team/<?php echo $allmem['image'];?>" alt=""/>
				<p><?php echo $allmem['name'];?><span><?php echo $allmem['position'];?></span></p>
				<div class="desc-cap">
					<img src="<?php echo base_url();?>/images/44.png" alt="#"/>
				</div>
		</div>
		</div>
		<?php } if($team[0]==''){?>
<div class="alert alert-danger">No records found</div>
			<?php }?>
		</div>

			
			
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<?php $this->load->view('/common/footer'); ?>
