<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=1;
$output1='';
$a='';
$query = "SELECT * FROM product ORDER BY id DESC";
$select_result = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($select_result)){
if ($row["status"] == "Active") {
$a='Active';
}else if ($row["status"] == "Inactive") {
$a='Inactive';
}
$output1.='<tr>';
  $output1.='<td>'.$i.'</td>';
  $output1.='<td id="title'.$row["id"].'" contenteditable>'.$row["title"].'</td>';
  $output1.='<td id="short_des'.$row["id"].'" contenteditable>'.$row["short_des"].'</td>';
  $output1.='<td>';
  $output1.=$a;
  $output1.='</td>';
  $output1.='<td><button type="button" onclick="info('.$row["id"].')" class="btn btn-info" style="font-size:20px;padding:2px;"><i class="icon-info"></i></button><button type="button" onclick="deletem('.$row["id"].')" class="btn btn-danger" style="margin-left:10px;font-size:20px;padding:2px;"><i class="icon-trash"></i></button></td>';
$output1.='</tr>';
$i++;
}
?>
<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
  <!-- main menu header-->
  <div class="main-menu-header">
    <input type="text" placeholder="Search" class="menu-search form-control round"/>
  </div>
  <!-- / main menu header-->
  <!-- main menu content-->
  <?php
  include('sideber.php');
  ?>
  <!-- /main menu content-->
  <!-- main menu footer-->
  <!-- include includes/menu-footer-->
  <!-- main menu footer-->
</div>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="container">
        
        <div class="card">
          <div class="card-body">
            <div class="row ">
              <div class="col-sm-8">
                <h3>PRODUCT LIST</h3>
              </div>
              <div class="col-sm-4">
                
              </div>
              <div class="col-lg-12 col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive"  style="width:100%">
                  <thead>
                    <tr>
                      <th width="5%">Product Id</th>
                      <th width="10%">Product Title</th>
                      <th width="10%">Short Description</th>
                      <th width="10%">Status</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php echo $output1; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div id="modal-item" class="modal fade text-xs-left in" role="dialog" tabindex="-1" aria-labelledby="myModalLabel1"> 
          <div class="modal-dialog" role="document">
            <!-- Modal content-->
             <form method="post" class="form" id="frm_product_setup" name="frm_product_setup" enctype="multipart/form-data" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Product Setup</h4>
              </div>
              
               <div class="modal-body">
                    
                      <div class="form-group">
                      <label  for="menu_head">Product Title</label>
                      <input type="text" class="form-control square" id="title" name="title" placeholder="Enter Project Title">
                      </div>
                    <!--end form group -->
                    <div class="form-group">
                      <label  for="menu_head">Short Description</label>
                      <input type="text" class="form-control square" id="short_des" name="short_des" placeholder="Enter short description">
                    </div>

                      <div class="form-group">
                      <label  for="menu_head">Details</label>
                      <textarea rows="6" cols="50" class="form-control square" id="art" ></textarea>
                      </div>
                        <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                        <label for="menu_title">Product Image</label>
                        <input type="file" id="img" class="form-control square" name="img">
                        </div>
                        <div class="col-sm-6">
                        <label for="menu_title">Product status</label>
                        <select id="status" class="form-control square" name="status">
                          <option value="">--select status--</option>
                          <option value="Active">Active</option>
                          <option value="Inactive">Inactive</option>
                        </select>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                        <label for="menu_title">Made By</label>
                        <input type="text" id="made" class="form-control square" name="made">
                        </div>
                        <div class="col-sm-6">
                        <label for="menu_title">Product Latest</label>
                        <select id="latest" class="form-control square" name="latest">
                          <option value="">--select Latest--</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                      <div class="row">
                          <div class="col-sm-6">
                      <label  for="menu_head">Product Category</label>
                      <select id="category" class="form-control square" name="category">
                        <?php 
                        $query = "SELECT * FROM product_category ORDER BY id DESC";
                        $select_result = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_array($select_result)){
                         ?>
                         <option value="<?php  echo $row['category'] ?>"><?php  echo $row["category"] ?></option>
                         <?php 
                          }
                          ?>
                      </select>
                       </div>
                        <div class="col-sm-6">
                        <label for="menu_title">Product Featured</label>
                        <select id="featured" class="form-control square" name="featured">
                          <option value="">--select Latest--</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                          </div>
                        </div>

                      </div>
                      <!--end form group -->
                       
                        
                        
                        </div>
                      
                          <!--end form group -->
                          
                       
                        
                        <div class="modal-footer">
                          
                          <button type="button" onclick="addRecord()" class="btn btn-success btn-lg">Save</button>
                          <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Reset</button>
                          <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancel</button>
                        
                        </div>
                        
                    </div>
                    </form>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="overlay"></div>
      <!-- jQuery CDN -->
      <?php
      include('footer.php');
      ?>
      <script>tinymce.init({selector: '#art'});</script>
      <script type="text/javascript">
      // ----------------- my functions ---------------------
      
      function openmodal(){
      $("#modal-item").modal();
      }
      $(document).ready(function() {
      $('#example').DataTable();
      } );

    function addRecord() {
    
    var caption = $("#caption").val();
    var img = $("#img").val();
    var status = $("#status").val();
   var art = tinymce.get("art").getContent();
   var made = $("#made").val();
   var latest = $("#latest").val();
   var featured = $("#featured").val();
    //var form1 = document.forms.namedItem("frm_product_setup");
    //var data=new FormData(form1);
    



    if(caption == ""){
      alert("caption cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   }else if (img ==""){
      alert("imgage cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    } else if (status ==""){
      alert("status cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    } else if (made ==""){
      alert("made cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    } else if (latest ==""){
      alert("latest cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    }else if (featured ==""){
      alert("featured cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    }
    // get values
    function save() {
  if(window.XMLHttpRequest){
  request = new XMLHttpRequest();
  }
  else
  {
  request = new ActiveXObject("Microsoft.XMLHTTP");
  }
    var form1 = document.forms.namedItem("frm_product_setup");   
    var data = new FormData(form1);
    data.append('art',art);
 
  request.open('POST', 'product_insert.php', true);
  request.onload = function () {
  if(request.status !== 200){
  return;
  }
  var return_data = request.responseText;
 
  var output1='';
  if(return_data=="1"){
  alertify.success('Product Added');
    setTimeout(function(){location.reload()},1000);
  }else{
  //document.getElementById('n').style.display="block";
  }
  };
  request.send(data);
  }
    save();
    $('#modal-item').modal('hide');
    return;
    
}

      function info(id){
        window.location.href='product_info.php?product_id='+id;
        }
function deletem(id){
  var data={"id":id}
          $.ajax({
             
             method: "post",
             url: "product_delete.php",
             data: data,
             success: function(data){
                 if(data == "1"){
                  alertify.success('deleted');
                  setTimeout(function(){location.reload()},1000);
                 }

             }
    });
}
      </script>
    </body>
  </html>