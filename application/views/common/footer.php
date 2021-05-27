<!-- contact -->
<?php $pagename= end($this->uri->segment_array()); if(($pagename!='aspmobile')&& ($pagename!='empmobile')){?>
<div id="contact" class="contact">
	<div class="container">
		<div class="contact-grids text-center">
			<div class="col-md-4 col-sm-6 col-xs-12 contact-grid">
				<h2><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>/img/footer.png" class="logo_img_footer"></a></h2><p class="text-white launch">Launching India's Finest</p>
				<h2 class="text-white"><span>Contact</span></h2>
				<hr>
				<div class="row address-location">
					<div class="col-md-6">
						<h4 class="text-white"><?php echo $admin['cityone'];?>:</h4>
						<p class="text-white"><?php echo $admin['addressone'];?></p>
						<h5 class="text-white"><i class="fas fa-mobile-alt"></i> <?php echo $admin['mobile'];?></h5>
						
						<h5></h5>
                    </div>
					<div class="col-md-6 ">
						<h4 class="text-white"><?php echo $admin['citytwo'];?>:</h4>
						<p class="text-white"><?php echo $admin['addresstwo'];?></p>
						<h5 class="text-white"><i class="fas fa-envelope"></i> <?php echo $admin['s_email'];?></h5>
						
                    </div>
                </div>
			</div>
			
			<div class="col-md-offset-2 col-md-3 col-sm-3 col-xs-6 contact-grid footers-link text-left">
			<h4 class="text-white">Interact</h4></span>
			<span><a href="<?php echo base_url()?>home/aboutus">The Clique</a></span>
				<span><a href="#">Cover, uncover</a></span>
				<span><a href="#">Talk the Talk</a></span>
				
			</div>
			<div class=" col-md-3 col-sm-3 col-xs-6 contact-grid footers-link text-left">
			<h4 class="text-white">Business Programs</h4>
			<span><a href="#">Ambassador Program</a></span>
				<span><a href="#">Advertise with Us</a></span>
				<span><a href="#">Collaborations and Partnerships</a></span>
				<span><a href="#">Referral Programs</a></span>
			</div>
			<div class="col-md-offset-2 col-md-3 col-sm-3 col-xs-6 contact-grid footers-link text-left">
			<h4 class="text-white">Explore</h4>
			<span><a href="#">Contest page</a></span>
				<span><a href="#">Offers</a></span>
				<span><a href="#">Magazine/News</a></span>
				<span><a href="#">Video diaries</a></span>
			</div>
			<div class=" col-md-3 col-sm-3 col-xs-6 contact-grid footers-link text-left">
			<h4 class="text-white">Support</h4>
			<span><a href="#">Help</a></span>
			<span><a href="#">Careers@CastIndia</a></span>
			<span><a href="#">Affiliates</a></span>
				
			</div>
			<div class="clearfix"></div>
		</div>
		<!-- footer -->
		<div class="col-md-12 footer">
			<hr>
			<p class="text-white float-left">Copyright &#169 <?php echo date('Y'); ?> CastIndia</p>
			<p class="text-white float-right social-icons"> 
				<?php if($admin['facebook']!=''){?><span><a href="<?php echo $admin['facebook'] ;?>"><img src="<?php echo base_url().'img/facebook.png'?>" ></a></span>
				<?php } ?>
				<?php if($admin['instagram']!=''){?>
				<span><a href="<?php echo $admin['instagram'] ;?>"><img src="<?php echo base_url().'img/instagram.png'?>" ></a></span>
				<?php } ?>
				<?php if($admin['linkdin']!=''){?>
				<span><a href="<?php echo $admin['linkdin'] ;?>"><img src="<?php echo base_url().'img/linkedin.png'?>"></a></span>
				<?php } ?>
				<?php if($admin['twitter']!=''){?>
				<span><a href="<?php echo $admin['twitter']; ?>"><img src="<?php echo base_url().'img/twitter.png'?>" ></a></span>
				<?php } ?>
			</p>
        </div>
	</div>
</div>

<?php } ?>





  
  
<input type="hidden" name="empotponestoreone" id="empotponestoreone">
<input type="hidden" name="empotponestoretwo" id="empotponestoretwo">
<input type="hidden" name="empotponestorethree" id="empotponestorethree">
<input type="hidden" name="empotponestorefour" id="empotponestorefour">

<input type="hidden" name="aspotponestoreone" id="aspotponestoreone">
<input type="hidden" name="aspotponestoretwo" id="aspotponestoretwo">
<input type="hidden" name="aspotponestorethree" id="aspotponestorethree">
<input type="hidden" name="aspotponestorefour" id="aspotponestorefour">




<input type="hidden" name="getloginaspotpone" >
<input type="hidden"  name="getloginaspotptwo">
<input type="hidden"  name="getloginaspotpthree" >
<input type="hidden"  name="getloginaspotpfour">
              
</body>
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src='<?php echo base_url(); ?>js/jquery.validate.min.js'></script>  
<script src='<?php echo base_url(); ?>js/sweetalert.min.js'></script>  
<script src='<?php echo base_url(); ?>js/additional-methods.js'></script>  
<script src='<?php echo base_url(); ?>js/jquery.ui.js'></script>
<script src="<?php echo base_url(); ?>js/wow.min.js"></script>
<script src="<?php echo base_url(); ?>js/BsMultiSelect.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.ccpicker.js"></script>
<script src="<?php echo base_url(); ?>css/owlcarousel/owl.carousel.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108428907-1"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://apis.google.com/js/platform.js?onload=init" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>

</html>
<script>

$('.asploginbutton').click(function(){
	$('.loader').fadeIn();
	var loginaspnumber =$('input[name=loginaspnumber ]').val();
	var loginaspotpone=$('input[name=loginaspotpone]').val();
	var loginaspotptwo=$('input[name=loginaspotptwo]').val();
	var loginaspotpthree=$('input[name=loginaspotpthree]').val();
	var loginaspotpfour=$('input[name=loginaspotpfour]').val();

	if((loginaspnumber!='')&&(loginaspotpone!='')&&(loginaspotptwo!='')&&(loginaspotpthree!='')&&(loginaspotpfour!='')){
		$.ajax({
			type:'POST',
			url:'<?php echo base_url();?>home/userlogin',
			data:{'loginaspnumber':loginaspnumber},
			success:function(userlogin){
				if(userlogin=='ok'){
					$('.loader').fadeOut();
					return true;
				}
				if(userlogin=='false'){
					$('.loader').fadeOut();
					return false;
				}
				
				
			}
		})	

	}
	
})

$('.loginaspnumber').keyup(function(){
	var aspmobile=$(this).val();
	console.log(aspmobile);
	if(aspmobile.trim()!=''){
		$.ajax({
			type:'POST',
			url:'<?php echo base_url();?>home/validmobile',
			data:{'aspmobile':aspmobile},
			success:function(formresult){
				if(formresult=='false'){
				
				$('.loginverifyasp').show();
				}
				if(formresult=='ok'){
				
				$('.loginverifyasp').hide();
				}
				

			}
		})
	}
	
})

$('.loginaspform').keyup(function(){
	var loginaspnumber =$('input[name=loginaspnumber ]').val();

	var loginaspotpone=$('input[name=loginaspotpone]').val();
	var loginaspotptwo=$('input[name=loginaspotptwo]').val();
	var loginaspotpthree=$('input[name=loginaspotpthree]').val();
	var loginaspotpfour=$('input[name=loginaspotpfour]').val();

	var getloginaspotpone=$('input[name=getloginaspotpone]').val();
	var getloginaspotptwo=$('input[name=getloginaspotptwo]').val();
	var getloginaspotpthree=$('input[name=getloginaspotpthree]').val();
	var getloginaspotpfour=$('input[name=getloginaspotpfour]').val();

	var loginaspinpotp=loginaspotpone+''+loginaspotptwo+''+loginaspotpthree+''+loginaspotpfour;
	var loginaspoutotp=getloginaspotpone+''+getloginaspotptwo+''+getloginaspotpthree+''+getloginaspotpfour;

	if((loginaspnumber>=9)&&(loginaspoutotp!='')&&(loginaspoutotp==loginaspinpotp) ){
		$('.asploginbutton').attr('disabled',false);
		
	}else{
		$('.asploginbutton').attr('disabled',true);
		$('.loginverifyasp').text('verify');
		$('.loginverifyasp').attr('disabled',false);
		$('input[name=loginaspnumber]').attr('disabled',false);
	}


})


function getotp(){
    var mobilenumber=$('input[name=aspmobile').val();
    var digits = '0123456789'; 
    let OTP = ''; 
    for (let i = 0; i < 4; i++ ) { 
        OTP += digits[Math.floor(Math.random() * 10)]; 
    }  
	var digits = (""+OTP).split("");
	var otpone=$('#aspotponestoreone').val(digits[0]);
	var otptwo=$('#aspotponestoretwo').val(digits[1]);
	var otpthree=$('#aspotponestorethree').val(digits[2]);
	var otpfour=$('#aspotponestorefour').val(digits[3]);
	
	$('.otp-input').show();
	sendotp(digits[0],digits[1],digits[2],digits[3],mobilenumber);
	$('.verifyasp').text('Send');
	$('.verifyasp').attr('disabled',true);
	$('input[name=aspmobile]').attr('readonly',true);
    
}

function getotptwo(){
    var mobilenumber=$('input[name=empmobile]').val();
    var digits = '0123456789'; 
    let OTP = ''; 
    for (let i = 0; i < 4; i++ ) { 
        OTP += digits[Math.floor(Math.random() * 10)]; 
    }  
	var digits = (""+OTP).split("");
	var otpone=$('input[name=empotponestoreone]').val(digits[0]);
	var otptwo=$('input[name=empotponestoretwo]').val(digits[1]);
	var otpthree=$('input[name=empotponestorethree]').val(digits[2]);
	var otpfour=$('input[name=empotponestorefour]').val(digits[3]);
	
	$('.otp-input-emp').show();
	sendotptwo(digits[0],digits[1],digits[2],digits[3],mobilenumber);
	$('.verifyemp').text('Send');
	$('.verifyemp').attr('disabled',true);
	$('input[name=empmobile]').attr('readonly',true);
    
}

function sendotptwo(otpone,otptwo,otpthree,otpfour,mobilenumber){
	$('.loader').fadeIn();
	$.ajax({
			type:'POST',
			url:'<?php echo base_url();?>home/otplogin',
			data:{'otpone':otpone,'otptwo':otptwo,'otpthree':otpthree,'otpfour':otpfour,'mobilenumber':mobilenumber},
			success:function(formresult){
				
				if(formresult=='success'){
					$('.loader').fadeOut();
					timertwo(60);
					return true;
				}
				if(formresult=='failure'){
					$('.loader').fadeOut();
					timertwo(60);
					return false;
				}
				
				
			}
		})
}

let timerOntwo = true;
function timertwo(remaining) {
var m = Math.floor(remaining / 60);
var s = remaining % 60;

m = m < 10 ? '0' + m : m;
s = s < 10 ? '0' + s : s;
document.getElementById('timertwo').innerHTML ='Resend OTP in: '+ m + ':' + s;
remaining -= 1;
if(remaining >= 0 && timerOntwo) {
setTimeout(function() {
	timertwo(remaining);
}, 1000);
return;
}

if(!timerOntwo) {

return;
}

// Do timeout stuff here
$('#timertwo').html('');
$('.verifyemp').text('Resend');
$('input[name=empmobile]').attr('readonly',true);
$('.verifyemp').attr('disabled',false);
}

function sendotp(otpone,otptwo,otpthree,otpfour,mobilenumber){
	$('.loader').fadeIn();
	$.ajax({
			type:'POST',
			url:'<?php echo base_url();?>home/otpreq',
			data:{'otpone':otpone,'otptwo':otptwo,'otpthree':otpthree,'otpfour':otpfour,'mobilenumber':mobilenumber},
			success:function(formresult){
				if(formresult=='success'){
					$('.loader').fadeOut();
					timer(60);
					return true;
				}
				if(formresult=='failure'){
					$('.loader').fadeOut();
					timer(60);
					return false;
				}
				
				
			}
		})
}
$(document).ready(function(){
    $('#buttonregasp').attr('disabled',true);

	$('.modal').on('hidden.bs.modal', function (e) {
		$('.form-group').removeClass('focused');
		$('#buttonregasp').attr('disabled',true);
		$('input[name=aspmobile]').attr('readonly',false);
        $('input[name=empmobile]').attr('readonly',false);
		$('.verifyemp').hide();
        $('.verifyasp').hide();
        $('.otp-input').hide();
        $('.otp-input-emp').hide();
  $(this)
    .find("input,textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();
})

});

$(".otpinputs").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this).next('.otpinputs').focus();
    }
});

$(".otpinputsemp").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this).next('.otpinputsemp').focus();
    }
});
function isString (evt) {
var theEvent = evt || window.event;
var key = theEvent.keyCode || theEvent.which;
key = String.fromCharCode (key);
var regex = /[^a-zA-Z _]/g;
if ( regex.test(key) ) {
theEvent.returnValue = false;
if(theEvent.preventDefault) theEvent.preventDefault();
}
}




$('#aspimage').click(function(){
	$('#login-image').attr('src','<?php echo base_url();?>img/loginimage.png');
	$('#top-image-content').text('You’re off to a greater place, explore more.');
	
})
$('#empimage').click(function(){
	$('#login-image').attr('src','<?php echo base_url();?>img/login2.png');
	$('#top-image-content').text('Welcome to the hassle-free experience of creating a value chain.');

	
})


$('#aspregimage').click(function(){
	$('#reg-image').attr('src','<?php echo base_url();?>img/aspregistration.png');
	$('.content-asp-reg p').html("Say 'YES' to new opportunities.");
	$('.content-asp-reg h6').html("Register to find new opportunities");
	$('.listofasp').html("<li>Jobs</li><li>Legal assistance</li><li>Trainings</li><li>Personal assistance</li><li>Exclusive membership</li><li>Celebrity intractions</li><li>Create portfolio</li><li>Training discounts</li><li>Social intractions</li> <li>Marketplace</li>");
	
})
$('#empregimage').click(function(){
	$('#reg-image').attr('src','<?php echo base_url();?>img/registration1.png');
	$('.content-asp-reg p').html('Find the right talent at the right place.');
	$('.content-asp-reg h6').html("Register now and hire talent");
	$('.listofasp').html("<li>Talent of your choice</li><li>Social intractions</li><li>Exclusive membership</li><li>Virtual management</li><li>Studio and Equipments rentals</li><li>Financial and production support</li>");
})

$('input[name=aspmobile]').change(function(){
	$('.loader').fadeIn();
	
	var aspmobile=$('input[name=aspmobile]').val();
	if(aspmobile.length>='10'){
	$.ajax({
			type:'POST',
			url:'<?php echo base_url();?>home/validmobile',
			data:{'aspmobile':aspmobile},
			success:function(formresult){
				if(formresult=='ok'){
					$('.loader').fadeOut();
					$('.verifyasp').show();
					
					$('#asperror').html('');
					return true;
				}
				if(formresult=='false'){
					$('input[name=aspmobile]').val('');
					$('input[name=aspmobile]').focus('');
					$('.verifyasp').hide();
					$('#asperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Sorry! Mobile number already exist</div>');
					$('.loader').fadeOut();
					$('.otp-input').hide();
					return false;
				}
				if(formresult==''){
					$('.loader').fadeOut();
					$('.verifyasp').hide();
					$('.otp-input').hide();
					
				}
				
				
			}
		})


	}else{
		$('#asperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please enter valid mobile number</div>');
		$('.loader').fadeOut();
		$('.verifyasp').hide();
		$('input[name=aspmobile]').focus('');
		$('input[name=aspmobile]').val('');
		$('.otp-input').hide();

	}
	
});


function verifyemailtwo(aspemail){
	$('.loader').fadeIn();
	
	// var aspemail=$('input[name=aspemail]').val();
	$.ajax({
			type:'POST',
			url:'<?php echo base_url();?>home/validemail',
			data:{'aspemail':aspemail},
			success:function(formresult){
				if(formresult=='ok'){
					$('.loader').fadeOut();
					$('#asperror').html('');
					aspregistration();
					return true;
				}
				if(formresult=='false'){
					$('input[name=aspemail]').val('');
					$('input[name=aspemail]').focus('');
					$('#asperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Sorry! Email already exist</div>');
					$('.loader').fadeOut();
					aspregistration();
					return false;
				}
				if(formresult==''){
					$('.loader').fadeOut();
					
				}
				
				
			}
		})



}

function verifyemail(aspemail){
	$('.loader').fadeIn();
	
	//var aspemail=$('input[name=empemail]').val();
	$.ajax({
			type:'POST',
			url:'<?php echo base_url();?>home/validemail',
			data:{'aspemail':aspemail},
			success:function(formresult){
				if(formresult=='ok'){
					$('.loader').fadeOut();
					$('#emperror').html('');
					regemp();
					return true;
				}
				if(formresult=='false'){
					$('input[name=empemail]').val('');
					$('input[name=empemail]').focus('');
					$('#emperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Sorry! Email already exist</div>');
					$('.loader').fadeOut();
					regemp();
					return false;
				}
				if(formresult==''){
					$('.loader').fadeOut();
				
					
				}
				
				
			}
		})



}



$('input[name=empmobile]').change(function(){
	$('.loader').fadeIn();
	var aspmobile=$('input[name=empmobile]').val();
	if(aspmobile.length>='10'){
	$.ajax({
			type:'POST',
			url:'<?php echo base_url();?>home/validmobile',
			data:{'aspmobile':aspmobile},
			success:function(formresult){
				if(formresult=='ok'){
					$('.loader').fadeOut();
					$('.verifyemp').show();
					$('#emperror').html('');
					regemp();
					return true;
				}
				if(formresult=='false'){
					$('input[name=empmobile]').val('');
					$('input[name=empmobile]').focus('');
					$('.verifyemp').hide();
					$('#emperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Sorry! Mobile number already exist</div>');
					$('.loader').fadeOut();
					$('.otp-input-emp').hide();
					regemp();
					return false;
				}
				if(formresult==''){
					$('.loader').fadeOut();
					$('.verifyemp').hide();
					$('.otp-input-emp').hide();
					regemp();
					
				}
				
				
			}
		})


	}else{
		$('#emperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please enter valid mobile number</div>');
		$('.loader').fadeOut();
		$('.verifyemp').hide();
		$('input[name=empmobile]').focus('');
		$('input[name=empmobile]').val('');
		$('.otp-input-emp').hide();

	}
	
});


$('button[name=buttonregasp]').click(function(){
	
	var aspfirst=$('input[name=aspfirst]').val();
	var asplast=$('input[name=asplast]').val();
	var aspmobile=$('input[name=aspmobile]').val();
	var aspemail=$('input[name=aspemail]').val();
	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	
	if(aspfirst.trim()==''){
		$('input[name=aspfirst]').focus();
		$('#asperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please enter first name</div>');
		return false;
	}
	else if(asplast.trim()==''){
		$('input[name=asplast]').focus();
		$('#asperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please enter  last name</div>');
		return false;
	}
	else if(aspmobile.trim()==''){
		$('input[name=aspmobile]').focus();
		$('#asperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please enter mobile number</div>');
		return false;
	}
	else if(aspmobile.length<='9'){
		$('input[name=aspmobile]').focus();
		$('#asperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please enter valid mobile number</div>');
		return false;
	}
	else if(aspemail.trim()==''){
		$('input[name=aspemail]').focus();
		$('#asperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please enter email</div>');
		return false;
	}
	else if(!testEmail.test(aspemail)){
		$('input[name=aspemail]').focus();
		$('#asperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please enter valid email</div>');
		return false;
	}


	
	else{
		$('.loader').fadeIn();
		$.ajax({
			type:'POST',
			url:'<?php echo base_url();?>home/aspregistration',
			data:{'aspfirst':aspfirst,'asplast':asplast,'aspmobile':aspmobile,'aspemail':aspemail},
			success:function(formresult){
				if(formresult=='ok'){
					$('#registration').modal('toggle');
					bootbox.alert("You are successfully registered as  Aspirant, please verify link send in your email ", function() {
						location.reload();
                     });
					$('.loader').fadeOut();
					return true;
				}
				if(formresult=='false'){
					$('.loader').fadeOut();
					return false;
				}
				
				
			}
		})
	}

	
})

$('button[name=buttonregemp]').click(function(){
	
	var aspfirst=$('input[name=empfirst]').val();
	var asplast=$('input[name=emplast]').val();
	var aspmobile=$('input[name=empmobile]').val();
	var aspemail=$('input[name=empemail]').val();
	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	
	if(aspfirst.trim()==''){
		$('input[name=empfirst]').focus();
		$('#emperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please enter first name</div>');
		return false;
	}
	else if(asplast.trim()==''){
		$('input[name=emplast]').focus();
		$('#emperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please enter  last name</div>');
		return false;
	}
	else if(aspmobile.trim()==''){
		$('input[name=empmobile]').focus();
		$('#emperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please enter mobile number</div>');
		return false;
	}
	else if(aspmobile.length<='9'){
		$('input[name=empmobile]').focus();
		$('#emperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please enter valid mobile number</div>');
		return false;
	}
	else if(aspemail.trim()==''){
		$('input[name=empemail]').focus();
		$('#emperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please enter email</div>');
		return false;
	}
	else if(!testEmail.test(aspemail)){
		$('input[name=empemail]').focus();
		$('#emperror').html('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please enter valid email</div>');
		return false;
	}


	
	else{
		$('.loader').fadeIn();
		$.ajax({
			type:'POST',
			url:'<?php echo base_url();?>home/empregistration',
			data:{'aspfirst':aspfirst,'asplast':asplast,'aspmobile':aspmobile,'aspemail':aspemail},
			success:function(formresult){
				if(formresult=='ok'){
					$('#registration').modal('toggle');
					
					$('.loader').fadeOut();
					bootbox.alert("You are successfully registered as  Employer, please verify link send in your email ", function() {
						location.reload();
                     });
					return true;
				}
				if(formresult=='false'){
					$('.loader').fadeOut();
					return false;
				}
				
				
			}
		})
	}

	
})


$('.otp-input-emp input').keyup(function(){
	var aspotpone=$('input[name=empotpone]').val();
	var aspotptwo=$('input[name=empotptwo]').val();
	var aspotpthree=$('input[name=empotpthree]').val();
	var aspotpfour=$('input[name=empotpfour]').val();

	var aspotponestoreone=$('input[name=empotponestoreone]').val();
	var aspotponestoretwo=$('input[name=empotponestoretwo]').val();
	var aspotponestorethree=$('input[name=empotponestorethree]').val();
	var aspotponestorefour=$('input[name=empotponestorefour]').val();

	var inputall=aspotpone+''+aspotptwo+''+aspotpthree+''+aspotpfour;
	var outputall=aspotponestoreone+''+aspotponestoretwo+''+aspotponestorethree+''+aspotponestorefour;
	if(inputall==outputall){
		$('.verifyemp').html('<span class="text-success">Verified</span>');
		$('.verifyemp').attr('disabled',true);
		$('.otp-input').show();
		return true;
	}else{
		$('.verifyemp').attr('disabled',true);
		
	}
	
})

$('.otp-input input').keyup(function(){
	var aspotpone=$('input[name=aspotpone]').val();
	var aspotptwo=$('input[name=aspotptwo]').val();
	var aspotpthree=$('input[name=aspotpthree]').val();
	var aspotpfour=$('input[name=aspotpfour]').val();

	var aspotponestoreone=$('input[name=aspotponestoreone]').val();
	var aspotponestoretwo=$('input[name=aspotponestoretwo]').val();
	var aspotponestorethree=$('input[name=aspotponestorethree]').val();
	var aspotponestorefour=$('input[name=aspotponestorefour]').val();

	var inputall=aspotpone+''+aspotptwo+''+aspotpthree+''+aspotpfour;
	var outputall=aspotponestoreone+''+aspotponestoretwo+''+aspotponestorethree+''+aspotponestorefour;
	if(inputall==outputall){
		$('.verifyasp').html('<span class="text-success">Verified</span>');
		$('.verifyasp').attr('disabled',true);
	}else{
		$('.verifyasp').attr('disabled',true);
		
	}
	
})


new WOW().init();  

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108428907-1');
</script>
<script>

var section = $('.ulcal li');

function toggleAccordion() {
  section.removeClass('active');
  $(this).addClass('active');
}
section.on('click', toggleAccordion);





function isNumeric (evt) {
var theEvent = evt || window.event;
var key = theEvent.keyCode || theEvent.which;
key = String.fromCharCode (key);
var regex = /[0-9]|\./;
if ( !regex.test(key) ) {
theEvent.returnValue = false;
if(theEvent.preventDefault) theEvent.preventDefault();
}
}
$('input').focus(function(){
  $(this).parents('.form-group').addClass('focused');
});
$('textarea').focus(function(){
  $(this).parents('.form-group').addClass('focused');
});

$('input').blur(function(){
  var inputValue = $(this).val();
  if ( inputValue == "" ) {
    $(this).removeClass('filled');
    $(this).parents('.form-group').removeClass('focused');  
	$('.droping-list').hide();
  } else {
    $(this).addClass('filled');
  }
})  
$('textarea').blur(function(){
  var inputValue = $(this).val();
  if ( inputValue == "" ) {
    $(this).removeClass('filled');
    $(this).parents('.form-group').removeClass('focused');  
	$('.droping-list').hide();
  } else {
    $(this).addClass('filled');
  }
})  

$('select').change(function(){
  var inputValue = $(this).val();
  if ( inputValue == "" ) {
    $(this).removeClass('filled');
    $(this).parents('.form-group').removeClass('focused');  
	$('.droping-list').hide();
  } else {
    $(this).addClass('filled');
    $('.select').addClass('focused');
	
  }
}) 
$(document).ready(function(){
  // Add smooth scrolling to all links
  $(".header-right a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
 
</script>

