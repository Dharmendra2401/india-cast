<?php $this->load->view('/common/header');  ?>
<div class="">
	<div class="container section-padding">

 
    
     
   
        
         
		  <div class="col-md-offset-3 col-md-6 col-sm-6 ">
          <h5 class="heytext">Hey <?php echo $getdetails['aspfirstname'];?>,</h5>
          <span class="text-secondary opacity0-5"><small>Please fill below details</small></span>

			
				<form class=" form popupmodal formregasp" autocomplete="off" method="post" action="<?php echo base_url()?>adduseremp">
                <input type="hidden" name="empfirst" value="<?php echo $getdetails['aspfirstname'];?>" >
                <input type="hidden" name="emplast" value="<?php echo $getdetails['asplastname'];?>">
                <input type="hidden" name="empemail" value="<?php echo $getdetails['aspemail'];?>">
                <?php if($getdetails['aspmobile']!=''){?>
                <input type="hidden" name="aspmobile" value="<?php echo $getdetails['aspmobile'];?>">
                <?php } ?>
                <?php if($getdetails['aspmobile']==''){?>
                
                <div class="row">
                  <div class="col-md-6">
				        <div class="form-group position-relative">
                <label class="form-label heading-title" for="mobile">Mobile number</label>
                <input type="tel" class="form-input form-control" maxlength="15" onKeyPress="return isNumeric(event)"  name="aspmobile" onkeyup="return formregasp();">
					<button type="button" name="verifyasp" onclick="return getotp();" class="verifyasp" id="verifyasp" style="display:none;">verify</button>
                </div>
                <div class="form-group text-center otp-input allotp" style="display:none;">
				    <label class="otp-text">Please enter OTP </label>

					<input type="tel" onKeyPress="return isNumeric(event)" maxlength="1" name="aspotpone" id="aspotpone"  onkeyup="return formregasp();">
					<input type="tel" onKeyPress="return isNumeric(event)" maxlength="1" name="aspotptwo" id="aspotptwo"  onkeyup="return formregasp();">
					<input type="tel" onKeyPress="return isNumeric(event)" maxlength="1" name="aspotpthree" id="aspotpthree"  onkeyup="return formregasp();">
					<input type="tel" onKeyPress="return isNumeric(event)" maxlength="1" name="aspotpfour" id="aspotpfour"  onkeyup="return formregasp();">
                </div>
				<div id="timer" class="settimer"></div>
                </div>
				
                </div>
                
        <?php } ?>


        <div class="form-group">
        <label class="radio-label">Select Profile Type</label>
        <?php $i=1; foreach($getempcat as $allempcat){?>
        <label class="margin-radio">
        <input type="radio" name="empcat" value="<?php echo $allempcat['id'];?>" <?php if($i==1){echo "checked";} ?> />
        <span><?php echo $allempcat['name'];?></span>
        </label>
        <?php $i++;} ?>
        
        </div>



        <div class="form-group">
        <label class="form-label heading-title" for="mobile">Address</label>
        <textarea type="text" class="form-input form-control" rows="4" cols="4" maxlength="150" name="address" onkeyup="return formregasp();"></textarea>
        </div>

        <div class="row">
          <div class="form-group position-relative col-md-6">
          <label class="form-label heading-title" for="mobile">State</label>
          <input type="text" class="form-input form-control" maxlength="20" name="state" onkeyup="return formregasp();">
          </div>

          <div class="form-group position-relative col-md-6">
          <label class="form-label heading-title" for="mobile">City</label>
          <input type="text" class="form-input form-control" maxlength="20" name="city" onkeyup="return formregasp();">
          </div>

        <div class="form-group position-relative col-md-6">
        <label class="form-label heading-title" for="mobile">Refrence Code</label>
        <input type="text" class="form-input form-control" maxlength="20" name="refrencecode">
        </div>
        <input type="hidden" id="profileid12345" name="profileid">
				
        </div>
				<span id="asperror"></span>
        <div class="col-md-offset-3 col-md-6 col-sm-6 ">
				<button type="submit" name="submit" value="submit" id="buttonregasp" class="btn btn-primary d-inline-block d-sm-block btn-modal" disabled>Continue</button>
        </div>
                <br><br>
				</form>
				</div>     
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
      
    </div>
  </div>
  <div class="text-center"><a href="<?php echo base_url();?>registration" class="grey">Back</a></div>
  <br><br>


<?php $this->load->view('/common/footer'); ?>
<script>



let timerOn = true;

function timer(remaining) {
var m = Math.floor(remaining / 60);
var s = remaining % 60;

m = m < 10 ? '0' + m : m;
s = s < 10 ? '0' + s : s;
document.getElementById('timer').innerHTML ='Resend OTP in: '+ m + ':' + s;
remaining -= 1;
if(remaining >= 0 && timerOn) {
setTimeout(function() {
timer(remaining);
}, 1000);
return;
}

if(!timerOn) {

return;
}

// Do timeout stuff here
$('#timer').html('');
$('.verifyasp').text('Resend');
$('input[name=aspmobile]').attr('readonly',true);
$('.verifyasp').attr('disabled',false);
formregasp();
}

function formregasp(){
	var aspmobile=$('input[name=aspmobile]').val();
	var aspotpone=$('input[name=aspotpone]').val();
	var aspotptwo=$('input[name=aspotptwo]').val();
	var aspotpthree=$('input[name=aspotpthree]').val();
	var aspotpfour=$('input[name=aspotpfour]').val();
 
  var address=$('textarea[name=address]').val();
  var city=$('input[name=city]').val();
  var state=$('input[name=state]').val();

  
	var aspotponestoreone=$('input[name=aspotponestoreone]').val();
	var aspotponestoretwo=$('input[name=aspotponestoretwo]').val();
	var aspotponestorethree=$('input[name=aspotponestorethree]').val();
	var aspotponestorefour=$('input[name=aspotponestorefour]').val();
  
  var otpcondition='';
  <?php if($getdetails['aspmobile']==''){?>
	var inputotpp=aspotpone+aspotptwo+aspotpthree+aspotpfour;
	var otpuotpp=aspotponestoreone+aspotponestoretwo+aspotponestorethree+aspotponestorefour;
	if((aspmobile.trim()=='')||(aspmobile.length<='9')||(address=='')|| (inputotpp=='')||(inputotpp!=otpuotpp)||(city=='')||(state=='')){
		$('#buttonregasp').attr('disabled',true);
		<?php } else{?>
  if((aspmobile.trim()=='')||(aspmobile.length<='9')||(address=='')||(city=='')||(state=='')){
  $('#buttonregasp').attr('disabled',true);
      <?php } ?>
		
	}
	else{
		$('#buttonregasp').attr('disabled',false);
		
	}
           
    }


$(document).mouseup(function (e) { 
if ($(e.target).closest(".droping-list").length 
=== 0) { 
$('.droping-list').hide(); 
} 
});


</script>

