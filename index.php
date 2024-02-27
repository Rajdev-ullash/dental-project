<?php 
$h="active";$s="";$a="";$d="";$ap="";$c="";$g="";
require_once('admin/databases.php');
?>
<?php include 'header.php';?>
<div class="home-slides owl-carousel owl-theme">
    <div class="main-slides-item">
        <div class="container">
            <div class="main-slides-content">
                <span class="sub-title">
                    <i class="flaticon-hashtag-symbol"></i>
                    Best in Chattogram
                </span>
                <h1><span>5-Star</span> dental care setup</h1>
                <div class="slides-btn">
                    <a href="appointment.html" class="default-btn">Book Appointment</a>

                </div>
            </div>
        </div>
    </div>
    <div class="main-slides-item item-bg2">
        <div class="container">
            <div class="main-slides-content">
                <span class="sub-title">
                    <i class="flaticon-hashtag-symbol"></i>
                    Best in Chattogram
                </span>
                <h1>Latest <span>Technologies &amp; Equipments</span></h1>

                <div class="slides-btn">
                    <a href="appointment.php" class="default-btn">Book Appointment</a>

                </div>
            </div>
        </div>
    </div>
    <div class="main-slides-item item-bg3">
        <div class="container">
            <div class="main-slides-content">
                <span class="sub-title">
                    <i class="flaticon-hashtag-symbol"></i>
                    Best in Chattogram
                </span>
                <h1>Spacial care for <span>Children &amp; Elders</span></h1>

                <div class="slides-btn">
                    <a href="appointment.html" class="default-btn">Book Appointment</a>

                </div>
            </div>
        </div>
    </div>
</div>


<section class="features-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-features">
                    <div class="content">
                        <div class="icon">
                            <i class="flaticon-doctor"></i>
                        </div>
                        <h3>
                            <a href="services-details.html">State of the art Technolgies</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-features bg-f57e57">
                    <div class="content">
                        <div class="icon">
                            <i class="flaticon-chair"></i>
                        </div>
                        <h3>
                            <a href="services-details.html">Best team of specialist dentists</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                <div class="single-features bg-4a6577">
                    <div class="content">
                        <div class="icon">
                            <i class="flaticon-healthcare"></i>
                        </div>
                        <h3>
                            <a href="services-details.html">Clean &amp; safe environment</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features-area-two bg-eef9ff pt-60 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="section-title-warp">
                    <span class="sub-title">
                        <i class="flaticon-hashtag-symbol"></i>
                        Our Services
                    </span>
                    <h2>Our Specialized Dental Services</h2>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="section-warp-btn">
                    <a href="services.php" class="default-btn">View All</a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                            
                $query = "SELECT * FROM services ORDER BY id ASC";
                $select_result = mysqli_query($connection, $query);
                while($row = mysqli_fetch_array($select_result)){
                ?>
            <div class="col-lg-4 col-sm-6">
                <div class="single-features-box">
                    <div class="content">
                        <div class="icon">
                            <img src="./admin/<?php echo $row["icon_img"] ?>" alt="Icon Image">
                        </div>
                        <h3>
                            <a href="service-details.php?id=<?php echo $row["id"] ?>"><?php echo $row["name"] ?></a>
                        </h3>
                        <p><?php echo $row["short_desc"] ?></p>
                    </div>
                </div>
            </div>

            <?php
            }
            ?>

        </div>
    </div>
</section>


<section class="services-area pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="section-title-warp">
                    <span class="sub-title">
                        <i class="flaticon-hashtag-symbol"></i>
                        State of The Art Technologies &amp; Services
                    </span>
                    <h2>Our Featured Services</h2>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="section-warp-btn">

                </div>
            </div>
        </div>
        <div class="row">
            <?php
                            
                $query = "SELECT * FROM features ORDER BY id ASC";
                $select_result = mysqli_query($connection, $query);
                while($row = mysqli_fetch_array($select_result)){
                ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-services">
                    <div class="services-image">
                        <a href="feature-details.php?id=<?php echo $row["id"] ?>"><img
                                src="./admin/<?php echo $row["image"] ?>" alt="image"></a>
                        <div class="icon">
                            <a href="feature-details.php?id=<?php echo $row["id"] ?>"><i class="flaticon-chair"></i></a>
                        </div>
                    </div>
                    <div class="services-content">
                        <h3>
                            <a href="feature-details.php?id=<?php echo $row["id"] ?>"><?php echo $row["name"] ?></a>
                        </h3>
                        <p><?php echo $row["short_desc"] ?>
                        </p>
                        <a href="feature-details.php?id=<?php echo $row["id"] ?>">
                            > More info
                        </a>
                    </div>
                </div>
            </div>


            <?php
            }
            ?>



        </div>
    </div>
</section>


<section class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="section-title-warp">
                    <span class="sub-title">
                        <i class="flaticon-hashtag-symbol"></i>
                        Update News and Blogs
                    </span>
                    <h2>Stay Updated with Our Latest News and Blog</h2>
                </div>
            </div>
            <!-- <div class="col-lg-7">
                <div class="section-warp-btn">
                    <a href="blog.html" class="default-btn">View All</a>
                </div>
            </div> -->
        </div>
        <div class="row">
            <?php
                            
                $query = "SELECT * FROM blogs ORDER BY id ASC";
                $select_result = mysqli_query($connection, $query);
                while($row = mysqli_fetch_array($select_result)){
                ?>

            <div class="col-lg-4 col-md-6">
                <div class="single-blog">
                    <div class="blog-image">
                        <a href="blog-details.php?id=<?php echo $row["id"] ?>"><img
                                src="./admin/<?php echo $row["image"] ?>" alt="image" /></a>
                        <!-- <div class="tag">10 Jun</div> -->
                        <!-- <div class="tag-two"><a href="blog.html">Technology</a></div> -->
                    </div>
                    <div class="blog-content">
                        <h3>
                            <a href="blog-details.php?id=<?php echo $row["id"] ?>"><?php echo $row["name"] ?></a>
                        </h3>
                        <p>
                            <?php echo $row["short_desc"] ?>
                        </p>
                        <a href="blog-details.php?id=<?php echo $row["id"] ?>" class="blog-btn">Read More</a>

                    </div>
                </div>
            </div>


            <?php
            }
            ?>

        </div>
    </div>
</section>

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
                                        <input type="text" class="form-control" placeholder="Name" id="pname"
                                            name="pname">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Mobile no." id="mob"
                                            name="mob">
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control" placeholder="Date" id="bdate"
                                            name="bdate">
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
                                    <button type="button" class="default-btn" onclick="booknow();">Book
                                        Appointment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-area pb-100">
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


<section class="core-features-area pt-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="section-title-warp">
                    <span class="sub-title">
                        <i class="flaticon-hashtag-symbol"></i>
                        Our Specialitis &amp; Features
                    </span>
                    <h2>Features appreciated by our patients</h2>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-core-features">
                    <div class="icon">
                        <i class="flaticon-caduceus"></i>
                    </div>
                    <h3>
                        <a href="services-details.html">Online Appointment</a>
                    </h3>
                    <p>Make appointment from our website or facebook page easily</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-core-features">
                    <div class="icon">
                        <i class="flaticon-policy"></i>
                    </div>
                    <h3>
                        <a href="services-details.html">Emergency Support</a>
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
                        <a href="services-details.html">Flexible Payment Mode</a>
                    </h3>
                    <p>We have flexible payment options for long term treatments</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-core-features">
                    <div class="icon">
                        <i class="flaticon-hospitalisation"></i>
                    </div>
                    <h3>
                        <a href="services-details.html">Special Care for Children</a>
                    </h3>
                    <p>We take special care for children to make it comfortable for them</p>
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