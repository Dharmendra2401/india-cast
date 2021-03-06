<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Profiles of ". $getname['name'];  ?>;
?>

<div id="layoutSidenav">
<div id="layoutSidenav_nav">
<?php  include "left_menu.php"; ?>    
</div>
<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
<h1 class=" mt-4"><?php echo $title;  ?></h1>
<?php include 'bedcrum.php'; ?>
<a class="btn btn-primary btn-sm back-absolute-btn" href="<?php echo base_url();?>admin/aspsubcat?token=<?php echo base64_encode($getname['prof_cat_id']);?>">Back</a>
<div class="row">
<div class="col-md-12 text-right">
<button type="button" class="btn btn-primary" data-toggle="modal" id="addbutton" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br>
                    </div>
                    <div class="col-md-12 ">
                    <?php if($this->session->flashdata('error')!=''){echo $this->session->flashdata('error');}  ?>

                    <div id="gridview">
</div>

</div>
</main>

<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Update Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/aspprofile" enctype='multipart/form-data'>
                    <input type="hidden" name="ucatidd" value="<?php echo $getid; ?>">
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Profile</label><br>
                            <input type="text" name="uname" id="uname" placeholder="Enter profile" class="form-control" maxlength="50">
                        </div>
                      
                        <span id="ujerror"></span>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" value="update" class="btn btn-primary" onclick="return validateone();">Update</button>
                    </div>
                    <input type="hidden" id="uid" name="uid">
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="">Add Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>admin/aspprofile" enctype='multipart/form-data'>
                    <input type="hidden" name="catidd" value="<?php echo $getid; ?>">
                    
                        <div class="form-group">
                            <label><span class="text-danger">*</span> Profile</label><br>
                            <input type="text" name="name" id="name" placeholder="Enter profile" class="form-control" maxlength="50">
                        </div>
                        <span id="jerror"></span>

                    </div>
                    <div class="modal-footer bg-light text-dark">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add" value="add" class="btn btn-primary" onclick="return validate();">Add</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<input type="hidden" name="catid" value="<?php echo $getid; ?>">
<?php include "footer.php";  ?>
</div>
</div>
<?php include "scripts.php";  ?>

<script>
getdata();
$('#addbutton').click(function(){
    $('input[name=catidd').val(<?php echo $getid; ?>);
})
function update(uid,ucat){
    
    $('input[name=ucatidd').val(<?php echo $getid; ?>);
    $('#uid').val(atob(uid));
    $('#uname').val(atob(ucat));
    
}

function validate(){
var categorie=$('input[name=name').val();
if(categorie.trim()==''){
    
   $('input[name=name').focus();
   $('#jerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter profile <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
}
else{
    return true;
}
}

function validateone(){
var categorie=$('input[name=uname').val();
if(categorie.trim()==''){
    
   $('input[name=uname').focus();
   $('#ujerror').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please enter profile <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    return false;
}
else{
    return true;
}

}
function getdata(){
    var catid=$('input[name=catid').val();
    
    $('.loader').show();
    var loadpage="load_aspprofile.php";
    var model="getallprofile";
    $.ajax({
    type: 'POST',
    url: "load_tabletwo",
    data: {"loadpage":loadpage,"model":model,'catid':catid},
    success: function(dataload){
    $("#gridview").html(dataload);
    $('.loader').hide();
    
} 
}); 
}


function btnclickdelete(id,table)
{
    
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this profile!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
      .then((willDelete) => {
      if (willDelete) {
        
      $.ajax({
       type: 'POST',
       url: "delete",
       data: {"id":id,"table":table},
       success: function(data1234){
       if(data1234=='ok')	
       {	
        getdata(); 
        
 
        }
        else {
        swal("Sorry! Please try again");
        }
} 
});	
    
  } 
});
}


function verify(id,status,table){
    swal({
        title: "Are you sure?",
        text: "You want to active this sub profile!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
      .then((willDelete) => {
      if (willDelete) {
        $.ajax({
        type: 'POST',
        url: "update",
        data: {"id":id,"status":status,"table":table},
        success: function(data112){ 
       if(data112=='ok')	
       {	
        getdata(); 
        
        }
        else {
        swal("Sorry! Please try again");

        }
} 
});	
    
  } 
});
	
}	



function unverify(id,status,table){
swal({
    title: "Are you sure?",
    text: "You want to deactive this profile!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
  .then((willDelete) => {
  if (willDelete) {
    
    $.ajax({
    type: 'POST',
    url: "update",
    data: {"id":id,"status":status,"table":table},
    success: function(data13){ 
     
   if(data13=='ok')	
   {	
    getdata();
    }
    else {
    swal("Sorry! Please try again");
    }
} 
});	

} 
});

}

</script>
</body>
</html>
