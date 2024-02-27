<?php include 'header.php';?>

<div class="modal fade fade-scale searchmodal" id="searchmodal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-bs-dismiss="modal">
<i class='bx bx-x'></i>
</button>
</div>
<div class="modal-body">
<form class="modal-search-form">
<input type="search" class="search-field" placeholder="Search...">
<button type="submit"><i class='bx bx-search-alt'></i></button>
</form>
</div>
</div>
</div>
</div>


<div class="page-banner-area">
<div class="container">
<div class="page-banner-content">
<h2>Appointment</h2>
</div>
</div>
</div>

<section class="overview-area">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="overview-content">
<span class="sub-title">
<i class="flaticon-hashtag-symbol"></i>
Emergency Care
</span>
<h3>For any king of dental emergency we are ready to support</h3>
<p>Call: &nbsp;&nbsp;<a href="tel:088123654987">01885-889999, 01974-775777</a></p>
</div>
</div>
<div class="col-lg-6">
<div class="overview-image">
<img src="assets/images/overview.png" alt="image">
</div>
</div>
</div>
</div>
</section>



<section class="appointment-overview-area pb-100">
<div class="container">
<div class="row justify-content-center">

<div class="col-lg-8">
<div class="appointment-overview-box">
<div class="row">

<div class="col-lg-12">
<div class="make-appointment-content">
<h4><i class="flaticon-calendar"></i> Make An Appointment</h4>
<form method="post" class="form" id="frm_book" name="frm_book">
<div class="form-group">
<input type="text" class="form-control" placeholder="Name" id="pname" name="pname">
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Mobile no." id="mob" name="mob">
</div>
<div class="form-group">
<input type="date" class="form-control" placeholder="Date" id="bdate" name="bdate">
</div>
<div class="form-group">
<select name="btime" id="btime">
  <option value="3:00pm-3:30pm">3:00pm-3:30pm</option>
  <option value="3:30pm-4:00pm">3:30pm-4:00pm</option>
  <option value="4:00pm-4:30pm">4:00pm-4:30pm</option>
  <option value="4:30pm-5:00pm">4:30pm-5:00pm</option>
  <option value="5:00pm-5:30pm">5:00pm-5:30pm</option>
  <option value="5:30pm-6:00pm">5:30pm-6:00pm</option>
  <option value="6:00pm-6:30pm">6:00pm-6:30pm</option>
  <option value="6:30pm-7:00pm">6:30pm-7:00pm</option>
  <option value="7:00pm-7:30pm">7:00pm-7:30pm</option>
  <option value="7:30pm-8:00pm">7:30pm-8:00pm</option>
  <option value="8:00pm-8:30pm">8:00pm-8:30pm</option>
  <option value="8:30pm-9:00pm">8:30pm-9:00pm</option> 
</select>
</div>
<button type="button" class="default-btn" onclick="booknow();">Book Appointment</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<?php include 'footer.php';?>