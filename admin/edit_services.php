<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=$_GET["id"];
  $pquery = "SELECT * FROM services WHERE id='$i'";
 
  $presult = mysqli_query($connection, $pquery);
 $prow = mysqli_fetch_array($presult);
  
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
                                <h3>Services SETUP</h3>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <form method="post" class="form-horizontal" id="frm_item_setup"
                                    enctype="multipart/form-data" action="services_edit.php">
                                    <div class="form-group ">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <label for="service_icon">Icon</label>
                                                <!-- Display the current icon if it exists -->
                                                <?php if (!empty($prow["icon_img"])) : ?>
                                                <img src="<?php echo $prow["icon_img"]; ?>" alt="Current Icon"
                                                    width="50" height="50">
                                                <?php endif; ?>
                                                <input type="file" class="form-control square" id="service_icon"
                                                    name="service_icon">
                                                <input type="hidden" class="form-control square" id="did" name="did"
                                                    value="<?php echo $prow["id"]; ?>">
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="service_name">Name</label>
                                                <input type="text" class="form-control square" id="service_name"
                                                    name="service_name" value="<?php echo $prow["name"];  ?>">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="service_short_des">Short Description</label>
                                                <input type="text" class="form-control square" id="service_short_des"
                                                    name="service_short_des"
                                                    value="<?php echo $prow["short_desc"];  ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="service_long_des">Long Description</label>
                                                <input type="text" class="form-control square" id="service_long_des"
                                                    name="service_long_des" value="<?php echo $prow["long_desc"];  ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="service_images">Images</label>
                                        <!-- Display the current images if they exist -->
                                        <?php if (!empty($prow["images"])) : ?>
                                        <?php $imgpath = json_decode($prow["images"], true); ?>
                                        <?php foreach ($imgpath as $image) : ?>
                                        <img src="<?php echo $image; ?>" alt="Current Image" width="50" height="50">
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        <input type="file" class="form-control square" id="service_images[]"
                                            name="service_images[]" multiple>

                                        <button type="submit" class="btn btn-success btn-md">Save</button>
                                        <a href="services.php" class="btn btn-warning btn-md">Back</a>

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
    });

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
    </script>
    </body>

    </html>