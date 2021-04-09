<?php $this->load->view('/common/header');  ?>
<section class="registration-form">
	<div class="container section-padding">
    
    
      <!-- Modal content-->
     
          <div class="col-md-8 col-sm-8 position-relative" >
		 <br></br><br><br>
		  <p class="popop-image-containe" id="top-image-content">You’re off to a greater place, explore more.</p>
			  <img src="<?php echo base_url();?>img/loginimage.png"  id="login-image"/>
          </div>
		  <div class="col-md-4 col-sm-4 box-left-shadow">
			<h4 class="text-center">Login</h4> 
			<ul class="nav nav-tabs login-contain">
			
				<li  class="<?php if(($tabs=='aspirant')|| ($tabs=='')) { echo "active";}?>"><a data-toggle="tab" href="#loginone" id="aspimage" >Aspirant</a></li>
				<li class="<?php if(($tabs=='employer')) { echo "active";}?>"><a data-toggle="tab" href="#logintwo" id="empimage">Employer</a></li>
			</ul>

			<div class="tab-content">
				<div id="loginone" class="tab-pane fade in active">
				<form class="form popupmodal loginaspform">
				<div class="form-group position-relative">
                <label class="form-label heading-title" for="first">Mobile number</label>
                <input type="text" class="loginaspnumber form-input form-control" maxlength="15" onKeyPress="return isNumeric(event)" name="loginaspnumber">
				<button type="button" name="verifyasp" onclick="return getotptwo();" class="loginverifyasp verifyasp" id="verifyasp" name="loginverifyasp" style="display:none;">verify</button>
                </div>
				<div class="form-group text-center otp-input-login-asp allotp" style="display:none;">
				    <label class="otp-text">Please enter OTP </label>

					<input type="tel" class="otpinputs" onkeypress="return isNumeric(event)" maxlength="1" name="loginaspotpone" id="loginaspotpone">
					<input type="tel" class="otpinputs" onkeypress="return isNumeric(event)" maxlength="1" name="loginaspotptwo" id="loginaspotptwo">
					<input type="tel" class="otpinputs" onkeypress="return isNumeric(event)" maxlength="1" name="loginaspotpthree" id="loginaspotpthree">
					<input type="tel" class="otpinputs" onkeypress="return isNumeric(event)" maxlength="1" name="loginaspotpfour" id="loginaspotpfour">
                </div>
				
				<button type="button" class="asploginbutton btn btn-primary d-inline-block d-sm-block btn-modal" disabled>Continue</button>
                
				</form>
				<div class="terms-cond">
				<p>By continuing, I agree to <a target="_blank" href="<?php echo base_url();?>home/terms_condition?token=<?php echo base64_encode(1);?>"> Terms & Conditions </a>of Cast India</p>
                </div>
				<hr>
				<p class="or"><span>OR</span></p>
				<p class="social-login text-center">
				<a href="#"><i class="fab fa-google"></i> </a> 
				<a href="#"><i class="fab fa-facebook-square"></i></a>
				<a href="#"><i class="fab fa-instagram-square"></i> </a>
				
			    </p><br></br>
				<div class="terms-cond register">
				<p>New to Cast India? <a href="<?php echo base_url().'registration'?>" > Register here </a>.</p>
                </div>
				
				</div>

				<div id="logintwo" class="tab-pane fade">
				<form class="form popupmodal">
				<div class="form-group">
                <label class="form-label heading-title" for="first">Mobile number</label>
                <input type="text" class="form-input form-control" >
                </div>
				
				<a href="#" class="btn btn-primary d-inline-block d-sm-block btn-modal" disabled>Continue</a>
                
				</form>
				<div class="terms-cond">
				<p>By continuing, I agree to <a target="_blank" href="<?php echo base_url();?>home/terms_condition?token=<?php echo base64_encode(2);?>"> Terms & Conditions </a>of Cast India</p>
                </div>
				<hr>
				<p class="or"><span>OR</span></p>
				<p class="social-login text-center">
				<a href="#"><i class="fab fa-google"></i> </a> 
				<a href="#"><i class="fab fa-facebook-square"></i></a>
				<a href="#"><i class="fab fa-instagram-square"></i> </a>
				
			    </p><br></br>
				<div class="terms-cond register">
				<p>New to Cast India? <a href="<?php echo base_url().'registration'?>"> Register here </a>.</p>
                </div>
				
				</div>
				
			    </div>
                
                
        </div>
      
      
   

    </div>
</section>


<?php $this->load->view('/common/footer'); ?>