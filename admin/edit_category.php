<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=$_GET["id"];
  $pquery = "SELECT * FROM categories WHERE id='$i'";
 
  $presult = mysqli_query($connection, $pquery);
 $prow = mysqli_fetch_array($presult);
  
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
                <h3>CATEGORY SETUP</h3>
              </div>
                <div class="col-lg-12 col-md-12">
                   <form method="post" class="form-horizontal" id="frm_item_setup" enctype="multipart/form-data" action="category_edit.php">
               <div class="form-group ">
                  <div class="row ">
                    <div class="col-sm-12">
                      <label  for="category_name">Dentist Name</label>
                      <input  type="text"class="form-control square" id="category_name" name="category_name" value="<?php echo $prow["name"];  ?>">
                       <input  type="hidden"class="form-control square" id="did" name="did" value="<?php echo $prow["id"];  ?>">
                    </div>
                  </div>
                </div>
                 <div class="form-group ">
                  <div class="row ">
                    <div class="col-sm-12">
                      <label  for="category_name">Description</label>
                      <input  type="text"class="form-control square" id="category_des" name="category_des" value="<?php echo $prow["description"];  ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <div class="row ">
                    <div class="col-sm-12">
                      <label  for="category_name">List serial no</label>
                      <input  type="text"class="form-control square" id="sl" name="sl" value="<?php echo $prow["srl"];  ?>">
                    </div>
                  </div>
                </div>
  <?php 
               if($prow["status"]==1)
               {
                ?>
                <div class="form-group ">
                  <div class="row ">
                    <div class="col-sm-12">
                      <label  for="item_status">Status</label>
                      <select class="form-control square" id="status" name="status">
                  
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                    </div>
                    
                  </div>
                </div>
              <?php 
               } else{
                ?>
                 <div class="form-group ">
                  <div class="row ">
                    <div class="col-sm-12">
                      <label  for="item_status">Status</label>
                      <select class="form-control square" id="status" name="status">
                  
                       
                        <option value="0">Inactive</option>
                         <option value="1">Active</option>
                      </select>
                    </div>
                    
                  </div>
                </div>
              <?php 
               } 

                ?>
 <button type="submit" class="btn btn-success btn-md">Save</button>
 <a href="category.php" class="btn btn-warning btn-md">Back</a>

              </div>
            </div>
          </div>
        </div>
      </form>
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
       $(document).ready(function() {
      $('#example').DataTable();
      } );

  function addRecord() {
    
    var name = $("#category_name").val();
    var des = $("#category_des").val();
    var sl = $("#sl").val();

    alert(sl);
    // var item_status = $("#status").val();
    // var image = $('#image')[0].files[0];
    if(name == ""){
      alert("Please input name");
       console.log('success');
       console.log('failure');
       return false;
   }
   if(des == ""){
      alert("Please input Description");
       console.log('success');
       console.log('failure');
       return false;
   }


   if(window.XMLHttpRequest){// Code For IE7+, Firefox, Chrome, Opera, Safari
        request = new XMLHttpRequest();
      }
      else
      {// Code For IE6, IE5
        request = new ActiveXObject("Microsoft.XMLHTTP");
      }
      var form1 = document.forms.namedItem("frm_item_setup");     

      var data = new FormData(form1);

      request.open('POST', 'category_insert.php', true);
      request.onload = function () {
        if(request.status !== 200){
          // Server does not return HTTP 200 (OK) response.
          // Whatever you wanted to do when server responded with another code than 200 (OK)
          return; // return is important because the code below is NOT executed if the response is other than HTTP 200 (OK)
        }
        // Whatever you wanted to do when server responded with HTTP 200 (OK)
        // I've added a DIV with id of testdiv to show the result there
        // document.getElementById("testdiv").innerHTML = this.responseText;
                var return_data = request.responseText;
                 console.log(return_data);
              
                if(return_data == "1"){
                 alertify.success("Item saved");
                  setTimeout(function(){location.reload()},100);
                 }else if(return_data != "1"){
                 alertify.error("Item saved failed");
                  
                 }
           
        

                      
      };
      request.send(data);
    
      $('#modal-item').modal('hide');
      return;
}
function editCategory(id) {
    console.log(id);
   if(window.XMLHttpRequest){// Code For IE7+, Firefox, Chrome, Opera, Safari
        request = new XMLHttpRequest();
      }
      else
      {// Code For IE6, IE5
        request = new ActiveXObject("Microsoft.XMLHTTP");
      }
        

      var url="category_select.php?id="+id;

      request.open('GET', url, true);
      request.onload = function () {
        if(request.status !== 200){
          // Server does not return HTTP 200 (OK) response.
          // Whatever you wanted to do when server responded with another code than 200 (OK)
          return; // return is important because the code below is NOT executed if the response is other than HTTP 200 (OK)
        }
        // Whatever you wanted to do when server responded with HTTP 200 (OK)
        // I've added a DIV with id of testdiv to show the result there
        // document.getElementById("testdiv").innerHTML = this.responseText;
                var return_data = request.responseText;
                alert(return_data);
                var item=JSON.parse(return_data);
                console.log(item);

               if(return_data != ""){
                //$('#modal-item2').modal('show');
                
                 $("#cat_id").val(item.id);
                 $("#category_name2").val(item.name);
                  $("#category_des2").val(item.description);
                   $("#sl").val(item.srl);

                 $("#item_status").val(item.status);
             

                 }if(return_data == ""){
                 alertify.error("Item Not found");
                  
                 }
           
        

                      
      };

      request.send();     
}
function editRecord() {
    
    var name = $("#category_name2").val();
    var item_status = $("#item_status").val();
    
    if(name == ""){
      alert("item name cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   }
   if(item_status == ""){
      alert("item status cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   }

   if(window.XMLHttpRequest){// Code For IE7+, Firefox, Chrome, Opera, Safari
        request = new XMLHttpRequest();
      }
      else
      {// Code For IE6, IE5
        request = new ActiveXObject("Microsoft.XMLHTTP");
      }
      var form1 = document.forms.namedItem("frm_item_setup2");     

      var data = new FormData(form1);

      request.open('POST', 'category_edit.php', true);
      request.onload = function () {
        if(request.status !== 200){
          // Server does not return HTTP 200 (OK) response.
          // Whatever you wanted to do when server responded with another code than 200 (OK)
          return; // return is important because the code below is NOT executed if the response is other than HTTP 200 (OK)
        }
        // Whatever you wanted to do when server responded with HTTP 200 (OK)
        // I've added a DIV with id of testdiv to show the result there
        // document.getElementById("testdiv").innerHTML = this.responseText;
                var return_data = request.responseText;
                 console.log(return_data);
              
                if(return_data == "1"){
                 alertify.success("Item edit");
                  setTimeout(function(){location.reload()},100);
                 }else if(return_data != "1"){
                 alertify.error("Item edit failed");
                  
                 }
           
        

                      
      };
      request.send(data);
    
      $('#modal-edit').modal('hide');
      return;
}
function deleteCategory(id){
    var url='category_delete.php?id='+id;
    $.ajax({
    url: url,
    type: 'GET',
    success: function(item) {
      if(item == "1"){
                 alertify.success("Item deleted");
                  setTimeout(function(){location.reload()},100);
                 }
    }
  });
  }
      </script>
    </body>
  </html>