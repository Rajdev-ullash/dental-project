<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=1;
$output1='';
$query = "SELECT * FROM categories ORDER BY srl ASC";
$select_result = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($select_result)){
if ($row["status"] == "1") {
$a='<option value="">---Select Status---</option><option value="1" selected>Active</option><option value="0" >Inactive</option>';
}else if ($row["status"] == "0") {
$a='<option value="">---Select Status---</option><option value="1">Active</option><option value="0" selected>Inactive</option>';
}
$output1.='<tr>';
 $output1.='<td id="sl'.$row["id"].'" contenteditable>'.$row["srl"].'</td>';
  $output1.='<td id="caption'.$row["id"].'" contenteditable>'.$row["name"].'</td>';
  $output1.='<td id="des'.$row["id"].'" contenteditable>'.$row["description"].'</td>';
   $output1.='<td>';
    $output1.='<select  id="status'.$row["id"].'" name="status" style="width:70px;">';
      $output1.=$a;
    $output1.='</select>';
  $output1.='</td>';
  $output1.='<td><a href="edit_category.php?id='.$row["id"].'" class="btn btn-info">Edit</a></td>';
$output1.='</tr>';

}
?>
<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <!-- main menu header-->
    <div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round" />
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
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-success pull-right mb" id="btnaddnew"
                                    data-toggle="modal" data-target="#modal-item">Add new</button>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered dt-responsive"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="10%">Serial#</th>
                                                <th width="30%">Name</th>
                                                <th width="15%">Mobile No.</th>
                                                <th width="15%">Requested date</th>
                                                <th width="15%">Time slot</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                    $query = "SELECT * FROM booking WHERE status='pending' ORDER BY id ASC";
                    $select_result = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_array($select_result)){
                    ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><a
                                                        href="tel:<?php echo $row['mob']; ?>"><?php echo $row['mob']; ?></a>
                                                </td>
                                                <td><?php echo $row['appdate']; ?></td>
                                                <td><?php echo $row['apptime']; ?></td>
                                                <td> <button type="button" class="btn btn-success btn-sm"
                                                        onclick="bookingdone(<?php echo $row['id']; ?>);">Confirmed</button>
                                                </td>
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
                <div id="modal-item" class="modal fade text-xs-left in" role="dialog" tabindex="-1"
                    aria-labelledby="myModalLabel1">
                    <div class="modal-dialog" role="document">
                        <!-- Modal content-->
                        <form method="post" class="form" id="frm_item_setup" name="frm_item_setup">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Category Setup</h4>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group ">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label for="category_name">Dentist Name</label>
                                                <input type="text" class="form-control square" id="category_name"
                                                    name="category_name"
                                                    placeholder="Enter the menu link without extention">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label for="category_name">Description</label>
                                                <input type="text" class="form-control square" id="category_des"
                                                    name="category_des"
                                                    placeholder="Enter the menu link without extention">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label for="category_name">List serial no</label>
                                                <input type="text" class="form-control square" id="sl" name="sl"
                                                    placeholder="Position in list">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label for="item_status">Status</label>
                                                <select class="form-control square" id="status" name="status">

                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--end form group -->



                                <div class="modal-footer">

                                    <button type="button" onclick="addRecord()"
                                        class="btn btn-success btn-lg">Save</button>

                                    <button type="button" class="btn btn-danger btn-lg"
                                        data-dismiss="modal">Cancel</button>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div id="modal-edit" class="modal fade text-xs-left in" role="dialog" tabindex="-1"
                    aria-labelledby="myModalLabel1">
                    <div class="modal-dialog" role="document">
                        <!-- Modal content-->
                        <form method="post" class="form" id="frm_item_setup2" name="frm_item_setup2">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Category Edit</h4>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group ">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label for="category_name">Dentist Name</label>
                                                <input type="text" class="form-control square" id="category_name2"
                                                    name="category_name2"
                                                    placeholder="Enter the menu link without extention">
                                                <input type="hidden" id="cat_id" name="cat_id">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label for="category_name">Description</label>
                                                <input type="text" class="form-control square" id="category_des2"
                                                    name="category_des2"
                                                    placeholder="Enter the menu link without extention">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label for="category_name">Serial no</label>
                                                <input type="text" class="form-control square" id="sl2" name="sl2"
                                                    placeholder="Enter the menu link without extention">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label for="category_name">Category Name</label>
                                                <input type="text" class="form-control square" id="category_name2"
                                                    name="category_name2"
                                                    placeholder="Enter the menu link without extention">
                                                <input type="hidden" id="cat_id" name="cat_id">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label for="item_status">Category Status</label>
                                                <select class="form-control square" id="item_status" name="item_status">
                                                    <option value=" ">---Select Status---</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--end form group -->



                                <div class="modal-footer">

                                    <button type="button" onclick="editRecord()"
                                        class="btn btn-success btn-lg">Save</button>

                                    <button type="button" class="btn btn-danger btn-lg"
                                        data-dismiss="modal">Cancel</button>

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
$(document).ready(function() {
    $('#example').DataTable();
});

function addRecord() {

    var name = $("#category_name").val();
    var des = $("#category_des").val();
    var sl = $("#sl").val();

    alert(sl);
    // var item_status = $("#status").val();
    // var image = $('#image')[0].files[0];
    if (name == "") {
        alert("Please input name");
        console.log('success');
        console.log('failure');
        return false;
    }
    if (des == "") {
        alert("Please input Description");
        console.log('success');
        console.log('failure');
        return false;
    }


    if (window.XMLHttpRequest) { // Code For IE7+, Firefox, Chrome, Opera, Safari
        request = new XMLHttpRequest();
    } else { // Code For IE6, IE5
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var form1 = document.forms.namedItem("frm_item_setup");

    var data = new FormData(form1);

    request.open('POST', 'category_insert.php', true);
    request.onload = function() {
        if (request.status !== 200) {
            // Server does not return HTTP 200 (OK) response.
            // Whatever you wanted to do when server responded with another code than 200 (OK)
            return; // return is important because the code below is NOT executed if the response is other than HTTP 200 (OK)
        }
        // Whatever you wanted to do when server responded with HTTP 200 (OK)
        // I've added a DIV with id of testdiv to show the result there
        // document.getElementById("testdiv").innerHTML = this.responseText;
        var return_data = request.responseText;
        alert(return_data);
        console.log(return_data);

        if (return_data == "1") {
            alertify.success("Item saved");
            setTimeout(function() {
                location.reload()
            }, 100);
        } else if (return_data != "1") {
            alertify.error("Item saved failed");

        }
    };
    request.send(data);

    $('#modal-item').modal('hide');
    return;
}

function editCategory(id) {
    console.log(id);
    if (window.XMLHttpRequest) { // Code For IE7+, Firefox, Chrome, Opera, Safari
        request = new XMLHttpRequest();
    } else { // Code For IE6, IE5
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }


    var url = "category_select.php?id=" + id;

    request.open('GET', url, true);
    request.onload = function() {
        if (request.status !== 200) {
            // Server does not return HTTP 200 (OK) response.
            // Whatever you wanted to do when server responded with another code than 200 (OK)
            return; // return is important because the code below is NOT executed if the response is other than HTTP 200 (OK)
        }
        // Whatever you wanted to do when server responded with HTTP 200 (OK)
        // I've added a DIV with id of testdiv to show the result there
        // document.getElementById("testdiv").innerHTML = this.responseText;
        var return_data = request.responseText;
        alert(return_data);
        var item = JSON.parse(return_data);
        console.log(item);

        if (return_data != "") {
            //$('#modal-item2').modal('show');

            $("#cat_id").val(item.id);
            $("#category_name2").val(item.name);
            $("#category_des2").val(item.description);
            $("#sl").val(item.srl);

            $("#item_status").val(item.status);


        }
        if (return_data == "") {
            alertify.error("Item Not found");

        }




    };

    request.send();
}

function editRecord() {

    var name = $("#category_name2").val();
    var item_status = $("#item_status").val();

    if (name == "") {
        alert("item name cannot be empty");
        console.log('success');
        console.log('failure');
        return false;
    }
    if (item_status == "") {
        alert("item status cannot be empty");
        console.log('success');
        console.log('failure');
        return false;
    }

    if (window.XMLHttpRequest) { // Code For IE7+, Firefox, Chrome, Opera, Safari
        request = new XMLHttpRequest();
    } else { // Code For IE6, IE5
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var form1 = document.forms.namedItem("frm_item_setup2");

    var data = new FormData(form1);

    request.open('POST', 'category_edit.php', true);
    request.onload = function() {
        if (request.status !== 200) {
            // Server does not return HTTP 200 (OK) response.
            // Whatever you wanted to do when server responded with another code than 200 (OK)
            return; // return is important because the code below is NOT executed if the response is other than HTTP 200 (OK)
        }
        // Whatever you wanted to do when server responded with HTTP 200 (OK)
        // I've added a DIV with id of testdiv to show the result there
        // document.getElementById("testdiv").innerHTML = this.responseText;
        var return_data = request.responseText;
        console.log(return_data);

        if (return_data == "1") {
            alertify.success("Item edit");
            setTimeout(function() {
                location.reload()
            }, 100);
        } else if (return_data != "1") {
            alertify.error("Item edit failed");

        }




    };
    request.send(data);

    $('#modal-edit').modal('hide');
    return;
}

function deleteCategory(id) {
    var url = 'category_delete.php?id=' + id;
    $.ajax({
        url: url,
        type: 'GET',
        success: function(item) {
            if (item == "1") {
                alertify.success("Item deleted");
                setTimeout(function() {
                    location.reload()
                }, 100);
            }
        }
    });
}

function bookingdone(x) {
    // alert(x);
    var url = 'booking_done.php?id=' + x;
    $.ajax({
        url: url,
        type: 'GET',
        success: function(item) {
            if (item == "1") {
                alertify.success("Item deleted");
                setTimeout(function() {
                    location.reload()
                }, 100);
            }
        }
    });
}
</script>
</body>

</html>