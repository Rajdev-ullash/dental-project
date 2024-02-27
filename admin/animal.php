<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=1;
$output1='';
$query = "SELECT * FROM animal ORDER BY id DESC";
$select_result = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($select_result)){

$output1.='<tr>';
  $output1.='<td>'.$i.'</td>';
  $output1.='<td >'.$row["name"].'</td>';

  $output1.='<td><button type="button" onclick="deletem('.$row["id"].')" class="btn btn-danger" style="margin-left:10px;font-size:20px;padding:2px;"><i class="icon-trash"></i></button></td>';
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
                <h3>ANIMAL SETUP</h3>
              </div>
              <div class="col-sm-4">
                <button type="button" class="btn btn-success pull-right mb" id="btnaddnew" data-toggle="modal" data-target="#modal-item">Add new</button>
              </div>
              <div class="col-lg-12 col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive"  style="width:100%">
                  <thead>
                    <tr>
                      <th width="5%">#</th>
                      <th width="10%">Animal</th>
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
             <form method="post" class="form" id="frm_slider_setup" name="frm_slider_setup" enctype="multipart/form-data" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Aminal Setup</h4>
              </div>
              
               <div class="modal-body">
                    
                      <div class="form-group">
                      <label  for="menu_head">Animal Name</label>
                      <input type="text" class="form-control square" id="name" name="name" placeholder="Enter category">
                      </div>
                   
                       
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
      
      <script type="text/javascript">
      // ----------------- my functions ---------------------
      
      function openmodal(){
      $("#modal-item").modal();
      }
      $(document).ready(function() {
      $('#example').DataTable();
      } );

    function addRecord() {
    
    var category = $("#category").val();

    
   
    //var form1 = document.forms.namedItem("frm_slider_setup");
    //var data=new FormData(form1);
    



    if(category == ""){
      alert("category cannot be empty");
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
    var form1 = document.forms.namedItem("frm_slider_setup");   
    var data = new FormData(form1);
   
 
  request.open('POST', 'animal_insert.php', true);
  request.onload = function () {
  if(request.status !== 200){
  return;
  }
  var return_data = request.responseText;
 
  var output1='';
  if(return_data=="1"){
    alertify.success('Animal Inserted');
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




        function deletem(id){
          var data={"id":id}
          $.ajax({
             
             method: "post",
             url: "animal_delete.php",
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