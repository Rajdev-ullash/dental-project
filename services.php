<?php 
$h="";$s="active";$a="";$d="";$ap="";$c="";$g="";
require_once('admin/databases.php');
?>
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


<section class="features-area-two bg-eef9ff pt-100 pb-70">
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
                    <a href="services.php" class="default-btn">View All</a>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="single-services">
                    <div class="services-image">
                        <a href="services-details.html"><img src="featured/1.jpg" alt="image"></a>
                        <div class="icon">
                            <a href="services-details.html"><i class="flaticon-chair"></i></a>
                        </div>
                    </div>
                    <div class="services-content">
                        <h3>
                            <a href="services-details.html">Laser Denstistry with Epic X diode laser</a>
                        </h3>
                        <p>Epic X is the all-in-one everyday diode laser. Epic X features three distinct treatment modes
                            and 30 clinical indications.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-services">
                    <div class="services-image">
                        <a href="services-details.html"><img src="featured/2.jpg" alt="image"></a>
                        <div class="icon">
                            <a href="services-details.html"><i class="flaticon-dental-care"></i></a>
                        </div>
                    </div>
                    <div class="services-content">
                        <h3>
                            <a href="services-details.html">Labomed® Magna dental microscope</a>
                        </h3>
                        <p>The Labomed® Magna dental microscope provides dentists with the power of crystal clear
                            visualization in a compact, ergonomic design.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-services">
                    <div class="services-image">
                        <a href="services-details.html"><img src="featured/3.jpg" alt="image"></a>
                        <div class="icon">
                            <a href="services-details.html"><i class="flaticon-dental-implant"></i></a>
                        </div>
                    </div>
                    <div class="services-content">
                        <h3>
                            <a href="services-details.html">Ozone DTA J-500</a>
                        </h3>
                        <p>The ozone therapy is the latest dental technology by applying ozone to easily eliminate most
                            bacteria and viruses without any side effect.</p>
                    </div>
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
                        Our Clients Review
                    </span>
                    <h2>Real Review From Our Real Customer</h2>
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
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.</p>
                <div class="review-info">
                    <img src="assets/images/review/review-1.jpg" alt="image">
                    <h3>Dr. Sarah Taylor</h3>
                    <span>Nephrologists</span>
                </div>
            </div>
            <div class="single-review-item">
                <div class="icon">
                    <i class="flaticon-left-quote"></i>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.</p>
                <div class="review-info">
                    <img src="assets/images/review/review-2.jpg" alt="image">
                    <h3>Dr. Aiken Ward</h3>
                    <span>Endocrinologists</span>
                </div>
            </div>
            <div class="single-review-item">
                <div class="icon">
                    <i class="flaticon-left-quote"></i>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.</p>
                <div class="review-info">
                    <img src="assets/images/review/review-3.jpg" alt="image">
                    <h3>Dr. Eachann Jhon</h3>
                    <span>Cardiologists</span>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php';?>