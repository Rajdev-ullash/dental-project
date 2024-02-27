<footer class="footer-area pt-100 pb-70">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-6">
<div class="single-footer-widget">
<h2>
<a href="index.html"><img src="logo-light.png"></a>
</h2>
<p>Dr. Rizwan's Iconic Dental Implant & Laser Center is a prominent dental care provider in Chattogram well known for its state-of-the-art technologies, advanced dental services, 5-star environment and unparalleled patient service.</p>

</div>
</div>
<div class="col-lg-3 col-sm-6">
<div class="single-footer-widget">
<h3>Useful Link</h3>
<ul class="quick-links">
  <li>
<a href="appointment.php">Appointment</a>
</li>
<li>
<a href="about-us.php">About Us</a>
</li>
<li>
<a href="services.php">Dental Services</a>
</li>
<li>
<a href="dentists.php">Dentist</a>
</li>
<li>
<a href="tech.php">Technologies</a>
</li>


</ul>
</div>
</div>
<div class="col-lg-3 col-sm-6">
<div class="single-footer-widget">
<h3>Latest Additions</h3>
<div class="footer-widget-blog">
<article class="item">
<a href="blog-details.html" class="thumb">
<span class="fullimage bg1" role="img"></span>
</a>
<div class="info">
<span><a href="blog-right-sidebar.html">Laser Dentistry</a></span>
<h4><a href="blog-details.html">Laser Denstistry with Epic X diode laser</a></h4>
</div>
</article>
<article class="item">
<a href="blog-details.html" class="thumb">
<span class="fullimage bg2" role="img"></span>
</a>
<div class="info">
<span><a href="blog-right-sidebar.html">Advanced Microscope</a></span>
<h4><a href="blog-details.html">Labomed® Magna dental microscope</a></h4>
</div>
</article>

</div>
</div>
</div>
<div class="col-lg-3 col-sm-6">
<div class="single-footer-widget">
<h3>Contact Information</h3>
<ul class="footer-information">
<li>
<i class="flaticon-emergency-call"></i>
Call Today
<span><a href="tel:088123654987">+088 123 654 987</a></span>
</li>
<li>
<i class="flaticon-wall-clock"></i>
 Open Hour
<span>03:00 PM to 9:00 PM</span>
</li>
<li>
<i class="flaticon-red-cross"></i>
Our Location
<span>SF Empire, 80 Chatteshwari Road, Mehedibag, Chattogram.</span>
</li>
</ul>
</div>
</div>
</div>
</div>
</footer>


<div class="copyright-area">
<div class="container">
<div class="copyright-area-content">
<p>
Copyright © 2021. Developed by
<a href="https://websheba.com.bd" target="_blank">
websheba
</a>
</p>
</div>
</div>
</div>


<div class="go-top">
<i class='bx bx-up-arrow-alt'></i>
</div>


<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>

<script src="assets/js/popper.min.js"></script>

<script src="assets/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="assets/js/lightbox.js"></script>

<script src="assets/js/jquery.meanmenu.js"></script>

<script src="assets/js/owl.carousel.min.js"></script>

<script src="assets/js/jquery.appear.js"></script>

<script src="assets/js/odometer.min.js"></script>

<script src="assets/js/nice-select.min.js"></script>

<script src="assets/js/jquery.magnific-popup.min.js"></script>

<script src="assets/js/jquery.ajaxchimp.min.js"></script>

<script src="assets/js/form-validator.min.js"></script>

<script src="assets/js/contact-form-script.js"></script>

<script src="assets/js/wow.min.js"></script>

<script src="assets/js/main.js"></script>
<script type="text/javascript">
function boxopen(){
  alert(1);
  //fsLightbox.open();
}

  function booknow() {
    
    var name = $("#pname").val();
    var mob = $("#mob").val();
    var bdate = $("#bdate").val();
    
    if (!bdate) {
    alert("no date!");
    return;
}else if(name == ""){
      alert("Please enter name");
      return;
    } else if (mob == ""){
      alert("Please input a valid mobile no.");
      return;
    }
  //  alert("validated");
    // get values
    $.ajax({
             
             method: "post",
             url: "booking_insert.php",
             datatype: "html",
             data: $('#frm_book').serialize(),
             success: function(data){
                 if(data == 1){
swal({
  title: "Appointment request received",
  text: "You will be notifiied soon!",
  icon: "success",
  button: "Ok",
});

$('#frm_book').trigger("reset");
                 }

             }
    });
  
}

</script>
</body>

<!-- Mirrored from templates.hibootstrap.com/grin/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 May 2021 08:34:13 GMT -->
</html>