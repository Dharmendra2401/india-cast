<?php $this->load->view('/common/header');  ?>
<div class="">
	<div class="container section-padding">

 
    
     
   
        
         
		  <div class="col-md-offset-4 col-md-4 col-sm-4 ">
          <h5 class="heytext">Hey <?php echo $getdetails['aspfirstname'];?>,</h5>
          <span class="text-secondary opacity0-5"><small>Please fill below details</small></span>

			
			
				<form class=" form popupmodal formregasp" autocomplete="off" method="post" action="<?php echo base_url()?>adduserasp">
                <input type="hidden" name="aspfirst" value="<?php echo $getdetails['aspfirstname'];?>" >
                <input type="hidden" name="asplast" value="<?php echo $getdetails['asplastname'];?>">
                <input type="hidden" name="aspemail" value="<?php echo $getdetails['aspemail'];?>">
                <?php if($getdetails['aspmobile']!=''){?>
                <input type="hidden" name="aspmobile" value="<?php echo $getdetails['aspmobile'];?>">
                <?php } ?>
                <?php if($getdetails['aspmobile']==''){?>
				        <div class="form-group position-relative">
                <label class="form-label heading-title" for="mobile">Mobile number</label>
                <input type="tel" class="form-input form-control" maxlength="15" onKeyPress="return isNumeric(event)"  name="aspmobile" onkeyup="return formregasp();">
				<button type="button" name="verifyasp" onclick="return getotp();" class="verifyasp" id="verifyasp" style="display:none;">verify</button>
                </div>
                <div class="form-group text-center otp-input allotp" style="display:none;">
				    <label class="otp-text">Please enter OTP </label>

              <input type="tel" onKeyPress="return isNumeric(event)" class="otpinputs" maxlength="1" name="aspotpone" id="aspotpone" onkeyup="return formregasp();">
              <input type="tel" onKeyPress="return isNumeric(event)" class="otpinputs" maxlength="1" name="aspotptwo" id="aspotptwo" onkeyup="return formregasp();">
              <input type="tel" onKeyPress="return isNumeric(event)" class="otpinputs" maxlength="1" name="aspotpthree" id="aspotpthree" onkeyup="return formregasp();">
              <input type="tel" onKeyPress="return isNumeric(event)" class="otpinputs" maxlength="1" name="aspotpfour" id="aspotpfour" onkeyup="return formregasp();">
            </div>
				<div id="timer" class="settimer"></div>
        <?php } ?>
        <div class="form-group">
        <label class="form-label heading-title" for="mobile">I want to be a</label>
        <input type="text" class="form-input form-control formregasp"  name="iwanttobe" id="iwanttobe" ><span id="profilein"></span>
        <div class="droping-list">
        <span id="getprofile"></span>
        </div>
        </div>

        <div class="form-group select seniority" style="display:none">
        <label class="form-label heading-title" for="mobile">Seniority</label>
        
        <select class=" form-input form-control" maxlength="50" name="seniorityyy" id="seniorityyy" onchange="return formregasp();">
          <option value="" style="display:none"></option>
        <?php foreach ($getsen as $getsenall){?>
          <option value="<?php echo $getsenall['id'];?>"><?php echo $getsenall['name'];?></option>
        <?php } ?>
        </select>
        </div>

        <div class="form-group">
        <label class="form-label heading-title" for="mobile">Display Name</label>
        <input type="text" class="form-input form-control" maxlength="50" name="displayname" onkeyup="return formregasp();">
        </div>

        <div class="form-group">
        <label class="form-label heading-title" for="mobile">Refrence Code</label>
        <input type="text" class="form-input form-control" maxlength="20" name="refrencecode">
        </div>
        <input type="hidden" id="profileid12345" name="profileid">
				
				<span id="asperror"></span>
				<button type="submit" name="submit" value="submit" id="buttonregasp" class="btn btn-primary d-inline-block d-sm-block btn-modal" disabled>Continue</button>
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

$('#iwanttobe').keyup(function(){
  
  $('.droping-list').show();
  $('#profilein').html('');
  $('#profileid12345').val('');
  $('.seniority').hide();
  formregasp();
  $('#getprofile').html('<p class="text-center"><i class="fas fa-spinner fa-spin"></i></p>');
  var iwanttobe=$('#iwanttobe').val();
  if(iwanttobe.trim()!=''){
    $.ajax({
			type:'POST',
			url:'<?php echo base_url();?>getprofiles',
			data:{'iwanttobe':iwanttobe},
			success:function(formresult){
        $('#getprofile').html(formresult);
        
				
			}
		})

  }else{
        $('.droping-list').hide();
      }
})

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
  var iwanttobe=$('#profileid12345').val();
  var displayname=$('input[name=displayname]').val();
	var aspotponestoreone=$('input[name=aspotponestoreone]').val();
	var aspotponestoretwo=$('input[name=aspotponestoretwo]').val();
	var aspotponestorethree=$('input[name=aspotponestorethree]').val();
	var aspotponestorefour=$('input[name=aspotponestorefour]').val();
  var seniority=$('select[name=seniorityyy]').val();
  var otpcondition='';
  <?php if($getdetails['aspmobile']==''){?>
	var inputotpp=aspotpone+aspotptwo+aspotpthree+aspotpfour;
	var otpuotpp=aspotponestoreone+aspotponestoretwo+aspotponestorethree+aspotponestorefour;
	if((aspmobile.trim()=='')||(aspmobile.length<='9')||(iwanttobe=='') ||(seniority=='') ||(displayname=='')|| (inputotpp=='')||(inputotpp!=otpuotpp)){
		$('#buttonregasp').attr('disabled',true);
		<?php } else{?>
  if((aspmobile.trim()=='')||(aspmobile.length<='9')||(iwanttobe=='') ||(seniority=='') ||(displayname=='')){
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

