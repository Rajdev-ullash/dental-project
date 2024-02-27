<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=1;
$output1='';
$id=$_GET['product_id'];
$b[]='';
$k=1;
$j=1;
$query = "SELECT * FROM product WHERE id='$id'";
$select_result = mysqli_query($connection, $query);

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
            <div class="row">
              <div class="col-xs-12">
              <ul class="nav nav-tabs">
            <li id="li_new" class="active"><a href="javascript:void(0)" onclick="anew()">Product Edit</a></li>
            <li id="li_onprocess"><a href="javascript:void(0)" onclick="aonpross()">Composition Add</a></li>
            <li id="li_ani"><a href="javascript:void(0)" onclick="ani()">Animal</a></li>
          </ul>
          <br>
        </div>
            </div>
            <div class="row " id="edit" style="display: block;">
              <div class="col-sm-8">
                <h3>PRODUCT SETUP</h3>
              </div>
              <div class="col-sm-4">
              </div>
              <div class="col-lg-12 col-md-12">
                <form method="post" class="form" id="frm_product_setup" name="frm_product_setup" >
                <?php
                while($row = mysqli_fetch_array($select_result,MYSQLI_ASSOC)){
                  //var_dump($row);
                  ?>
                  <div class="form-group">
                      <label  for="menu_head">Product Title</label>
                      <input type="text" class="form-control square" id="title" name="title" placeholder="Enter Project Title" value="<?php echo $row["title"]?>">
                      <input type="hidden" class="form-control square" id="pro_id1" name="pro_id1" value="<?php echo $row["id"]?>">
                      </div>
                    <!--end form group -->
                    <div class="form-group">
                      <label  for="menu_head">Short Description</label>
                      <input type="text" class="form-control square" id="short_des" name="short_des" placeholder="Enter short description" value="<?php echo $row["short_des"]?>">
                    </div>

                      <div class="form-group">
                         <div class="row">
                          <div class="col-sm-6">
                      <label  for="menu_head">Details</label>
                      <textarea rows="6" cols="50" class="form-control square" id="art" ><?php echo $row["description"]?></textarea>
                    </div>
                    <div class="col-sm-6">
                      <label  for="menu_head">Indication</label>
                      <textarea rows="6" cols="50" class="form-control square" id="indi_art2" ><?php echo $row["indi"]?></textarea>
                    </div>
                  </div>
                      </div>
                      <div class="form-group">
                         <div class="row">
                          <div class="col-sm-4">
                      <label  for="menu_head">Sub Category</label>
                      <input type="text" class="form-control square" id="sub_cat" name="sub_cat" placeholder="Enter short description" value="<?php echo $row["sub_cat"]?>">
                    </div>
                    <div class="col-sm-4">
                      <label  for="menu_head">Type</label>
                      <input type="text" class="form-control square" id="type" name="type" placeholder="Enter short description" value="<?php echo $row["type"]?>">
                    </div>
                    <div class="col-sm-4">
                      <label  for="menu_head">Api</label>
                      <input type="text" class="form-control square" id="api" name="api" placeholder="Enter short description" value="<?php echo $row["type"]?>">
                    </div>
                  </div>
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
                          <option value="Active" <?php echo (($row['status'])=='Active')? 'selected':''; ?>>Active</option>
                          <option value="Inactive" <?php echo (($row['status'])=='Inactive')? 'selected':''; ?>>Inactive</option>
                        </select>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                        <label for="menu_title">Contra Indication</label>
                        <textarea rows="6" cols="50" class="form-control square" id="cont_art2" > <?php echo $row["contra"]?></textarea>
                        </div>
                        <div class="col-sm-6">
                        <label for="menu_title">Side Effect</label>
                        <textarea rows="6" cols="50" class="form-control square" id="side_art2" ><?php echo $row["side_effect"]?></textarea>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                      <div class="row">
                      <div class="col-sm-6">
                      <label  for="menu_head">Product Category</label>
                      <select id="category" class="form-control square" name="category" >
                        <?php 
                        $query = "SELECT * FROM categories ORDER BY id DESC";
                        $select_result = mysqli_query($connection, $query);
                        while($row1 = mysqli_fetch_array($select_result)){
                         ?>
                         <option value="<?php  echo $row1['id'] ?>" <?php echo (($row['category'])==$row1['id'])? 'selected':''; ?>><?php  echo $row1["name"] ?></option>
                         <?php 
                          }
                          ?>
                      </select>
                       </div>
                        <div class="col-sm-6">
                        <label for="menu_title">Dosage</label>
                        <textarea rows="6" cols="50" class="form-control square" id="dos_art2" ><?php echo $row["dosage"]?></textarea>
                          </div>
                        </div>

                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                        <label for="menu_title">Withdrawal Time</label>
                        <textarea rows="6" cols="50" class="form-control square" id="with_art2" ><?php echo $row["withdrawal"]?></textarea>
                        </div>
                        <div class="col-sm-6">
                        <label for="menu_title">Package</label>
                        <textarea rows="6" cols="50" class="form-control square" id="pack_art2" ><?php echo $row["package"]?></textarea>
                        </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                          
                          <button type="button" onclick="addRecord()" class="btn btn-success btn-lg">Save</button>
                          <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Reset</button>
                          <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancel</button>
                        
                        </div>
                        <?php 
                          }
                        ?>
                      </form>
              </div>
            
            </div>
          
            
              <div class="row" id="psi" style="display: none;">
                <div class="col-sm-8">
                
              </div>
              <div class="col-sm-4">
              </div>
            
              <br>
              <div class="col-sm-12">
                <form method="post" class="form" id="frm_img" name="frm_img" >
                   <div class="col-sm-4">
                      <label for="menu_title">Product Composition</label>
                      <input type="text" id="composition" class="form-control square" name="composition">
                      <input type="hidden" id="pro_id" class="form-control square" name="pro_id" value="<?php echo $id;?>">
                   </div>
                   <div class="col-sm-4">
                      <label for="uom">Uom</label>
                      <input type="text" id="uom" class="form-control square" name="uom">
                    </div>
                   <div class="col-sm-4">
                    <br>
                     <button type="button" onclick="addimg()" class="btn btn-success btn-lg" style="margin-top: 5px;">Save</button>
                   </div>
                  </form>
              </div>
            </div>

              <br><br>
              <div class="row" id="psl" style="display: none;">
                <div class="col-sm-8">
                <h3>COMPOSITION LIST</h3>
              </div>
              <div class="col-sm-4">
              </div>
              <div class="col-lg-12 col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive"  style="width:100%">
                <thead>
                  <tr>
                    <th style="width:50%;">Title</th>
                    <th style="width:25%;">Uom</th>
                    <th style="width:25%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $query1="SELECT * FROM composition where product_id='$id'";
                $select_result1=mysqli_query($connection, $query1);
                while($row1 = mysqli_fetch_array($select_result1)){
                  ?>
                  <tr>
                    <td><?php echo $row1['title']; ?></td>
                    <td><?php echo $row1['uom']; ?></td>
                    <td><button type="button" onclick="deletesm(<?php echo $row1['id'];?>)" class="btn btn-danger" style="margin-left:10px;font-size:20px;padding:2px;"><i class="icon-trash"></i></button></td>                         
                </tr>
                <?php
                  }
                  ?>
                </tbody>
              </table>
              </div>
            </div>
            <div class="row" id="pa" style="display: none;">
                <div class="col-sm-8">
                
              </div>
              <div class="col-sm-4">
              </div>
            
              <br>
              <div class="col-sm-12">
                <form method="post" class="form" id="frm_img1" name="frm_img1" >
                   <div class="col-sm-4">
                      <label for="menu_title">Product Animal</label>
                      <select type="text" id="animal" class="form-control square" name="animal">
                        <option value="">Select a Product</option>
                        <?php 
                        $query = "SELECT * FROM animal ORDER BY id DESC";
                        $select_result = mysqli_query($connection, $query);
                        while($row2 = mysqli_fetch_array($select_result)){
                         ?>
                         <option value="<?php  echo $row2['name'] ?>" ><?php  echo $row2["name"] ?></option>
                         <?php 
                          }
                          ?>
                      </select>
                      <input type="hidden" id="pro_id" class="form-control square" name="pro_id" value="<?php echo $id;?>">
                   </div>
                   
                   <div class="col-sm-4">
                    <br>
                     <button type="button" onclick="addani()" class="btn btn-success btn-lg" style="margin-top: 5px;">Save</button>
                   </div>
                  </form>
              </div>
              </div>
              <br><br>
              <div class="row" id="pal" style="display: none;">
                <div class="col-sm-8">
                <h3>COMPOSITION LIST</h3>
              </div>
              <div class="col-sm-4">
              </div>
              <div class="col-lg-12 col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive"  style="width:100%">
                <thead>
                  <tr>
                    <th style="width:50%;">Animal</th>
                    <th style="width:25%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $query1="SELECT * FROM product_animals where product_id='$id'";
                $select_result1=mysqli_query($connection, $query1);

                while($row3 = mysqli_fetch_array($select_result1)){
                  ?>
                  <tr>
                    <td><?php echo $row3['animal_name']; ?></td>
                    <td><button type="button" onclick="deleteam(<?php echo $row3['id'];?>)" class="btn btn-danger" style="margin-left:10px;font-size:20px;padding:2px;"><i class="icon-trash"></i></button></td>                         
                </tr>
                <?php
                  }
                  ?>
                </tbody>
              </table>
              </div>
            </div>
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
      <script>tinymce.init({selector: '#art,#indi_art2,#cont_art2,#side_art2,#dos_art2,#with_art2,#pack_art2'});</script>
      <script type="text/javascript">
      // ----------------- my functions ---------------------
      
      function openmodal(){
      $("#modal-item").modal();
      }
      $(document).ready(function() {
      $('#example').DataTable();
      } );


   function anew(){
      document.getElementById("li_new").classList.add('active');
      document.getElementById("li_onprocess").classList.remove('active');
      document.getElementById("li_ani").classList.remove('active');
      document.getElementById("edit").style.display="block";
      document.getElementById("psi").style.display="none";
      document.getElementById("psl").style.display="none";
      document.getElementById("pa").style.display="none";
      document.getElementById("pal").style.display="none";
    }
    function aonpross(){
     document.getElementById("li_new").classList.remove('active');
      document.getElementById("li_onprocess").classList.add('active');
      document.getElementById("li_ani").classList.remove('active');
      document.getElementById("edit").style.display="none";
      document.getElementById("psi").style.display="block";
      document.getElementById("psl").style.display="block";
      document.getElementById("pa").style.display="none";
      document.getElementById("pal").style.display="none";
    }
    function ani(){
     document.getElementById("li_new").classList.remove('active');
      document.getElementById("li_onprocess").classList.remove('active');
      document.getElementById("li_ani").classList.add('active');
      document.getElementById("edit").style.display="none";
      document.getElementById("psi").style.display="none";
      document.getElementById("psl").style.display="none";
      document.getElementById("pa").style.display="block";
      document.getElementById("pal").style.display="block";
    }

    function addRecord() {
    
    var caption = $("#caption").val();
    var category = $("#category").val();
    var img = $("#img").val();
    var status = $("#status").val();
    var type = $("#type").val();
    var api = $("#api").val();
   var art = tinymce.get("art").getContent();
   var indi_art = tinymce.get("indi_art2").getContent();
   var cont_art = tinymce.get("cont_art2").getContent();
   var side_art = tinymce.get("side_art2").getContent();
   var dos_art = tinymce.get("dos_art2").getContent();
   var with_art = tinymce.get("with_art2").getContent();
   var pack_art = tinymce.get("pack_art2").getContent();
    //var form1 = document.forms.namedItem("frm_product_setup");
    //var data=new FormData(form1);
    



    if(caption == ""){
      alert("caption cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   } else if (status ==""){
      alert("status cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    }
    // get values
    function save1() {
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
    data.append('indi_art',indi_art);
    data.append('cont_art',cont_art);
    data.append('side_art',side_art);
    data.append('dos_art',dos_art);
    data.append('with_art',with_art);
    data.append('pack_art',pack_art);
 
  request.open('POST', 'product_edit.php', true);
  request.onload = function () {
  if(request.status !== 200){
  return;
  }
  var return_data = request.responseText;
 
  var output1='';
  if(return_data=="1"){
  alertify.success('Product Updated');
    setTimeout(function(){window.location.href="product.php"},1000);
  }else{
  //document.getElementById('n').style.display="block";
  }
  };
  request.send(data);
  }
    save1();
  
    
}

      function editItem(id){
        window.location.href='product_info.php?product_id='+id;
        }
        function addimg() {
    
    var subimg = $("#subimg").val();
    




    if(subimg == ""){
      alert("subimg cannot be empty");
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
    var form1 = document.forms.namedItem("frm_img");   
    var data = new FormData(form1);
    
 
  request.open('POST', 'product_com_insert.php', true);
  request.onload = function () {
  if(request.status !== 200){
  return;
  }
  var return_data = request.responseText;
 
  var output1='';
  if(return_data=="1"){
  alertify.success('Picture Added');
    setTimeout(function(){location.reload()},1000);
  }else{
  //document.getElementById('n').style.display="block";
  }
  };
  request.send(data);
  }
    save();
  
    
}
function deletesm(id){
  var data={"id":id}
          $.ajax({
             
             method: "post",
             url: "product_com_delete.php",
             data: data,
             success: function(data){
                 if(data == "1"){
                  alertify.success('deleted');
                  setTimeout(function(){location.reload()},1000);
                 }

             }
    });
}
        function addani() {
    
    var subimg = $("#subimg").val();
    




    if(subimg == ""){
      alert("subimg cannot be empty");
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
    var form1 = document.forms.namedItem("frm_img1");   
    var data = new FormData(form1);
    
 
  request.open('POST', 'product_ani_insert.php', true);
  request.onload = function () {
  if(request.status !== 200){
  return;
  }
  var return_data = request.responseText;
 
  var output1='';
  if(return_data=="1"){
  alertify.success('Picture Added');
    setTimeout(function(){location.reload()},1000);
  }else{
  //document.getElementById('n').style.display="block";
  }
  };
  request.send(data);
  }
    save();
  
    
}
function deleteam(id){
  var data={"id":id}
          $.ajax({
             
             method: "post",
             url: "product_ani_delete.php",
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