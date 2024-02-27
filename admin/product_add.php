<?php
include_once('header.php');
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
                <h3>PRODUCT ADD</h3>
              </div>
              <div class="col-sm-4">
                
              </div>
              <div class="col-lg-12 col-md-12">
                   <form method="post" class="form-horizontal" id="frm_item_setup" enctype="multipart/form-data" action="product_insert.php">
                <div class="form-group">
                      <label  for="menu_head">Product Title</label>
                      <input type="text" class="form-control square" id="title" name="title" placeholder="Enter Project Title">
                      </div>
                    <!--end form group -->
                    <div class="form-group">
                      <label  for="menu_head">Short Description</label>
                      <input type="text" class="form-control square" id="sdes" name="sdes" placeholder="Enter short description">
                    </div>

                                          <div class="form-group">
                      <div class="row">
                      <div class="col-sm-6">
                      <label  for="menu_head">Product Category</label>
                      <select id="cat" class="form-control square" name="cat" >
                        <?php 
                        $query = "SELECT * FROM categories ORDER BY id DESC";
                        $select_result = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_array($select_result)){
                         ?>
                         <option value="<?php  echo $row['name'] ?>"><?php  echo $row["name"] ?></option>
                         <?php 
                          }
                          ?>
                      </select>
                       </div>
                        <div class="col-sm-6">
                          <label  for="menu_head">Sub Category</label>
                      <input type="text" class="form-control square" id="subcat" name="subcat" placeholder="Sub category">
                          </div>
                        </div>

                      </div>

                      <div class="form-group">
                         <div class="row">
                          <div class="col-sm-12">
                      <label  for="menu_head">Details</label>
                      <textarea rows="30" cols="50" class="form-control square" id="art" name="art"></textarea>
                    </div>

                  </div>
                      </div>


                        <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                        <label for="menu_title">Product Image</label>
                        <input type="file" id="staffimage" class="form-control square" name="staffimage">
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
                   



                      <div class="modal-footer">
                          
                          <button type="button" onclick="addRecord()" class="btn btn-success btn-lg">Save</button>
                          <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Reset</button>
                          <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancel</button>
                        
                        </div>
                      <!--end form group -->
                  </form>
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

    function addRecord() {
document.getElementById("frm_item_setup").submit();
      document.getElementById("frm_item_setup").reset();
    
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