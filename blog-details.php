<?php
require_once('admin/databases.php');
include 'header.php';
$blogs_id = $_GET['id'];
$query = "SELECT * FROM blogs WHERE id=$blogs_id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
?>


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
            <h2>Featured Blogs Details</h2>
        </div>
    </div>
</div>

<section class="services-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="services-details-image">
                    <img src="./admin/<?php echo $row["image"] ?>" alt="image">
                </div>
                <div class="services-details-content">
                    <h3><?php echo $row["name"] ?></h3>
                    <p><?php echo $row["long_desc"] ?></p>
                </div>
                <br>


</section>



<section class="about-area pt-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="about-content">
                    <span class="sub-title">
                        <i class="flaticon-hashtag-symbol"></i>
                        About Dr. Rizwan
                    </span>
                    <h3>Dr. M <span>Rizwanul</span> Haque</h3>
                    <h4>Specialist: Root Canal, Implant &amp; Simple Design</h4>
                    <h6>Chattogram Medical College Hospital</h6>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <ul class="about-list">
                                <li>
                                    <i class="flaticon-check"></i>
                                    BDS
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    BCS (Health)
                                </li>
                                <li>

                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <ul class="about-list">
                                <li>
                                    <i class="flaticon-check"></i>
                                    MS (Endodontics)
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    FICD (USA)
                                </li>
                                <li>

                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="about-info">
                                <i class="flaticon-caduceus"></i>
                                <h4>15 Years</h4>
                                <span>Dental Experienced</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="about-info">
                                <i class="flaticon-chair"></i>
                                <h4>6405+</h4>
                                <span>Dental Services</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="about-image">
                    <img src="dr.jpg" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="core-features-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="section-title-warp">
                    <span class="sub-title">
                        <i class="flaticon-hashtag-symbol"></i>
                        Specialty and Our Features
                    </span>
                    <h2>Features That You Will Love Us</h2>
                </div>
            </div>
            <div class="col-lg-8">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-core-features">
                    <div class="icon">
                        <i class="flaticon-caduceus"></i>
                    </div>
                    <h3>
                        <a href="services-details.html">State-of-the-art technologies</a>
                    </h3>
                    <p>Most advanced and latest tools and technologies in Chattogram</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-core-features">
                    <div class="icon">
                        <i class="flaticon-policy"></i>
                    </div>
                    <h3>
                        <a href="services-details.html">Latest services &amp; procedures</a>
                    </h3>
                    <p>We are available over phone or whatsapp for dental emergencies</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-core-features">
                    <div class="icon">
                        <i class="flaticon-diamond"></i>
                    </div>
                    <h3>
                        <a href="services-details.html">5 star environment &amp; patient care</a>
                    </h3>
                    <p>Highly comfortable, clearn, hygienic atmosphere &amp; patient care</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-core-features">
                    <div class="icon">
                        <i class="flaticon-hospitalisation"></i>
                    </div>
                    <h3>
                        <a href="services-details.html">Online appointment &amp; Support</a>
                    </h3>
                    <p>Online appointment and emergency patient care</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="review-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="section-title-warp">
                    <span class="sub-title">
                        <i class="flaticon-hashtag-symbol"></i>
                        Real reviews from our google page
                    </span>
                    <h2>Patient Reviews</h2>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="section-warp-btn">
                    <a href="testimonials.html" class="default-btn">View All</a>
                </div>
            </div>
        </div>
        <div class="review-slides owl-carousel owl-theme">
            <div class="single-review-item">
                <div class="icon">
                    <i class="flaticon-left-quote"></i>
                </div>
                <p>Best dentist in ctg. He is humble also. My mom & others family member are very satisfied! May Allah
                    keep u healthy &amp; strong for Chittagonians. All the best doctor!! Stay safe.</p>
                <div class="review-info">

                    <h3>Mumtahi Wasu</h3>

                </div>
            </div>
            <div class="single-review-item">
                <div class="icon">
                    <i class="flaticon-left-quote"></i>
                </div>
                <p>Most updated and modern dental clinic in the city, no one even compares. I have visited many times.
                    Excellent treatment facilities,dental microscope, electrosurgery, laser everythings available. Nice
                    waiting area, clean and hygienic. More than 5 star.</p>
                <div class="review-info">
                    <h3>Lucky Ali</h3>

                </div>
            </div>
            <div class="single-review-item">
                <div class="icon">
                    <i class="flaticon-left-quote"></i>
                </div>
                <p>Amazing dental clinic. All new top class dental unit, well behaved doctors.Excellent interior,
                    waiting area. Very clean and hygiene with disposable materials. Good treatment with affordable
                    costs. Highly recommended.</p>
                <div class="review-info">

                    <h3>Mohammed Hossain Bhuiyan</h3>

                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php';?>