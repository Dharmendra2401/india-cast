<!DOCTYPE html>
<html lang="en">
<?php  
include "top_head.php"; 
$title="Add New Blog ";

?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php  include "left_menu.php"; ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><?php echo $title;  ?></h1>
                <ol class="bg-info text-light breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?php echo $title;  ?></li>
                </ol>

                
                <!-- <form class="row ">
                     <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add
                            <?php echo $title;  ?></button><br><br>
                    </div> 

                </form> -->
                   <form role="form" class="form-validation" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/save_blog">
                  <div class="row">
                   <div class="col-md-4 form-group">
                   <div class="row">
                     <label  class="col-md-4"><strong> Title:</strong></label>
                     <input type="text"  placeholder="Enter title" id="title" name="blog_title" class="form-control">
                   </div>
                   </div>
                   <div class="col-md-1 form-group"></div>
                   <div class="col-md-4 form-group">
                   <div class="row">
                    <label  class="col-md-4"><strong> Category :</strong></label>
                    <select class="form-control" name="blog_category_id" id="catg_id" >
                    <?php $blog_category = $this->db->get('blog_category')->result();
                        if ($blog_category) { foreach ($blog_category as $key ) {?>
                            <option value="<?= $key->id?>"><?= $key->name?> </option>
                       <?php }
                        }
                    ?>
                    </select>
                   </div>
                   </div>

                   
                  <div class="col-md-4 form-group">
                    <div class="row">
                      <label class="col-md-12"><strong> Image:</strong> <small style="color:red;">(Image size :1200 X 710)</small></label>
                      <input type="file" class="form-control" name="blog_images"><br>
                    </div>
                  </div>
                  <div class="col-md-1 form-group"></div>
                  <div class="col-md-4 form-group">
                    <div class="row">
                      <label class="col-md-12"><strong> Short Desc:</strong></label>
                      <textarea placeholder="Enter desc" name="short_desc" class="form-control" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="col-md-1 form-group"></div>
                  <div class="col-md-6 form-group">
                    <div class="row">
                      <label class="col-md-12"><strong> Description:</strong><small style="color:red;"> (min 200 words to 350 word max)</small></label>
                      <textarea placeholder="Enter desc" name="description" class="form-control" rows="5"></textarea>
                    </div>
                  </div>
                </div>
                <div class="text-right form-group">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </form>
        </main>

       
    

     
        <span id="pageInfos"></span>
        <?php include "footer.php";  ?>
    </div>
</div>
<?php include "scripts.php";  ?>

<script type='text/javascript'>




function update(idu,ufirst_name){

  $('#idu').val(idu);
  $('#ufirst_name').val(ufirst_name);
  
}



CKEDITOR.replace('editor', {});




</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
                      
<script>

$(document).ready(function() {
                                //$("#gridview").load('load_artist.php');
                                var table =$('#example1').DataTable({searching: true, paging: true, info: false});
                                $('.dataTables_length').css('display', 'inline-block');
                                $('.dataTables_filter').css({
                                    'display': 'inline-block',
                                    'float': 'right'
                                });
                                // $('#example1').on( 'page.dt', function () {
                                // var info = table.page.info();
                                // $('#pageInfos').html( 'Showing page: '+1+info.page+' of '+info.pages );
                                // } );

});

</script>

</body>

</html>