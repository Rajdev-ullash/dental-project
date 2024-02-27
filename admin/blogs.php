<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=1;
$output1='';
$query = "SELECT * FROM blogs";
$select_result = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($select_result)){
// if ($row["status"] == "1") {
// $a='<option value="">---Select Status---</option><option value="1" selected>Active</option><option value="0" >Inactive</option>';
// }else if ($row["status"] == "0") {
// $a='<option value="">---Select Status---</option><option value="1">Active</option><option value="0" selected>Inactive</option>';
// }
// Convert JSON-encoded string to associative array

$output1 .= '<tr>';
$output1 .= '<td id="id'.$row["id"].'">'.$i++.'</td>';
$output1 .= '<td>';
$output1 .= '<img src="' . $row["image"] . '" alt="feature Image"  width="30" height="30" />';
$output1 .= '</td>';
$output1 .= '<td id="name'.$row["id"].'">'.$row["name"].'</td>';
$output1 .= '<td id="short_desc'.$row["id"].'">'.$row["short_desc"].'</td>';
$output1 .= '<td id="long_desc'.$row["id"].'">'.$row["long_desc"].'</td>';
$output1 .= '<td><a href="edit_blogs.php?id='.$row["id"].'" class="btn btn-info">Edit</a><a onClick=(deleteBlogs('.$row["id"].')) class="btn btn-info">Delete</a></td>';
$output1 .= '</tr>';

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
                                <h3>BLOGS SETUP</h3>
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
                                                <th width="5%">Serial#</th>
                                                <th width="15%">Image</th>
                                                <th width="15%">Name</th>
                                                <th width="15%">Short Description</th>
                                                <th width="25%">Long Description</th>
                                                <th width="25%">Action</th>
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
                </div>
                <div id="modal-item" class="modal fade text-xs-left in" role="dialog" tabindex="-1"
                    aria-labelledby="myModalLabel1">
                    <div class="modal-dialog" role="document">
                        <!-- Modal content-->
                        <form method="post" class="form" id="frm_item_setup" name="frm_item_setup">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Blogs Setup</h4>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group ">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label for="blog_icon">Image</label>
                                                <input type="file" class="form-control square" id="blog_icon"
                                                    name="blog_icon">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label for="blog_name">Name</label>
                                                <input type="text" class="form-control square" id="blog_name"
                                                    name="blog_name" placeholder="Enter the blog name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label for="blog_short_des">Short Description</label>
                                                <input type="text" class="form-control square" id="blog_short_des"
                                                    name="blog_short_des"
                                                    placeholder="Enter the blog short description">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label for="blog_long_des">Long Description</label>
                                                <input type="text" class="form-control square" id="blog_long_des"
                                                    name="blog_long_des" placeholder="Enter the blog long description">
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

    var blog_icon = $("#blog_icon").val();
    var blog_name = $("#blog_name").val();
    var blog_short_des = $("#blog_short_des").val();
    var blog_long_des = $("#blog_long_des").val();
    var formData = new FormData();
    formData.append("blog_icon", blog_icon)
    formData.append("blog_name", blog_name)
    formData.append("blog_short_des", blog_short_des)
    formData.append("blog_long_des", blog_long_des)


    // var item_status = $("#status").val();
    // var image = $('#image')[0].files[0];
    if (blog_icon == "") {
        alert("Please input blog icon");
        console.log('success');
        console.log('failure');
        return false;
    }
    if (blog_name == "") {
        alert("Please input blog name");
        console.log('success');
        console.log('failure');
        return false;
    }
    if (blog_short_des == "") {
        alert("Please input blog short des");
        console.log('success');
        console.log('failure');
        return false;
    }
    if (blog_long_des == "") {
        alert("Please input blog long des");
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

    request.open('POST', 'blogs_insert.php', true);
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

function deleteBlogs(id) {
    var url = 'blogs_delete.php?id=' + id;
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