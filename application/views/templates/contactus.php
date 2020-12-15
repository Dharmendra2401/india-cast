<?php $this->load->view('/common/header'); ?>
<div class="contact-page">
	<div class="container">
		<div class="contact-map">
			<h3>GET IN TOUCH</h3>
			<img src="<?php echo base_url();?>images/27.png" alt="">
			<div class="map-image">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.9822603083353!2d73.8354231148993!3d18.529703773731015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf7f153d0e55%3A0x9c2d4e7721b802f7!2sCast%20India!5e0!3m2!1sen!2sin!4v1608015817555!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
			</div>
		</div>
		<div class="contact-blocks">
			<div class="contact-form">
				<h3>CONTACT FORM</h3>
				<?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>

				<img src="<?php echo base_url();?>images/27.png" alt="">
				<form method="post" action="<?php echo base_url();?>home/contactus">
					<input type="text" placeholder="Name" id="name" name="name">
					<input type="email" placeholder="E-Mail" id="email" name="email">
					<input type="text" placeholder="Subject"  id="subject" name="subject">
					<textarea placeholder="Message" id="message" name="message"></textarea>
					<span id="errormessage"></span>
					<button type="submit" name="submit" onclick="return contactus()" value="SEND">SEND</button>
				</form>
			</div>
			<div class="contact-inform">
				<h3>CONTACT INFORMATION</h3>
				<img src="<?php echo base_url();?>images/27.png" alt="">
				<h4>Feel free to contact us</h4>
				<p>For further inquiries, you can send in your queries in the contact form or if you would like to visit us,
find our address below.</p>
				<h4>Address</h4>
				<ul>
					<li>1098/8b, Model Colony, </li>
					<li>Shivaji Nagar, Pune – 16.</li>
					<li>Maharashtra, India</li>
				</ul>
				<p>Phone : +9890726666</p>
				<p>Mail us at : <a href="mail-to:sample@example.com"> info@castindia.in</a></p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php $this->load->view('/common/footer'); ?>
<script>
	function contactus(){
		var name=$('#name').val();
		var email=$('#email').val();
		var subject=$('#subject').val();
		var message=$('#message').val();
		var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		if(name.trim()==''){
                    $('#name').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter name <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
        }
		else if(email.trim()==''){
                    $('#email').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
        }
		else if(!testEmail.test(email)){
                    $('#email').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter valid email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
        }
		else if(subject.trim()==''){
                    $('#subject').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter subject <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
        }
		else if(message.trim()==''){
                    $('#message').focus();
                    $('#errormessage').html('<div class="alert alert-danger alert-dismissible show" role="alert">Please enter message <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
        }
		else{
			return true;
		}
	}
</script>