<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
<?php include "modal.php" ?>

<?php
$query = "SELECT * FROM state";
$result = mysqli_query($connection,$query);

?>


<!-- Top Navigation Backgorund Image -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('images/la-gallery/banner3.jpeg');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <!-- <h1 class="text-white font-weight-bold">Work with us</h1> -->

                <div class="custom-breadcrumbs">
                    <a href="index">Home</a> <span class="mx-2 slash">/</span>
                    <!-- <a href="#">Job</a> <span class="mx-2 slash">/</span> -->
                    <span class="text-white"><strong>Franchisee Opportunity</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
@$error_password = $_REQUEST['error'];
$error_msg = base64_decode($error_password);
$error_confirm = "Password does not match with Confirm Password ! Refill Form";
if($error_confirm==$error_msg)
{
    ?>
    <div class="row" align="center">
        <div style="width: 80%;margin-left: 10%;">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Warning !</strong> Password does not match with Confirm Password , Please Refill Form
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php
}

?>

<?php
@$error_password = $_REQUEST['msg'];
$error_msg = base64_decode($error_password);
$error_confirm = "Thank you! Registration Complete!";
if($error_confirm==$error_msg)
{
    ?>
    <div class="row" align="center">
        <div style="width: 80%;margin-left: 10%;">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Thank you!</strong> Registration Complete!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php
}
elseif($error_msg==11)
{
    ?>
    <div class="row" align="center">
        <div style="width: 80%;margin-left: 10%;">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Warning!</strong>  Number not found!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php
}
?>

<!-- Left side Image and Content Start -->
<section class="site-section col-md-12" id="next-section" style="background-image: url(images/la-background/bg1.png); ">
    <div class="container">
        <div class="row">
            <div class="col-md-5 item" id="first">
                <img src="images/la-background/vector1.png" class="img-fluid" alt="" style="width: 55%;">

                <h1 style="margin-top: 8%; font-size: 16px; color: #000000; font-weight: bolder;">WHO</h1>
                <p style="color: #000000;">Labour Contractors, Thekedaars (big/small/local/regional), anyone associated with the Labour Mandi, Labourers (Skilled/Semi-Skilled/Unskilled)</p>

                <h1 style="font-weight: bolder; margin-top: 10%; font-size: 16px; color: #000000;">WHY</h1>
                <p style="color: #000000;">Efficient, gives you access to more consumers,<strong> Digital Process: ensures physical distancing and safety. </strong>Better and defined employment for Labourers under you. Platform to get more contracts and build a 'Contractor' Community.</p>

                <h1 style="font-weight: bolder; margin-top: 10%; font-size: 16px; color: #000000;">HOW</h1>
                <p style="color: #000000;">Fill our E-Form, provide your details to create an account. Pay the registration charges & start getting leads of employment for yourself</p>

                <a href="#" style="color: #000000; font-weight: bolder;">Click here to view in English</a>
            </div>

            <div class="col-lg-7">

                <form class="p-4 p-md-5 border rounded la-p" action="franchisee_user_ereg" method="post" style="background-color: #fff;">
                    <!-- 1st Section Start -->
                    <div class="container">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label for="dealer_mobile">Re-Enter your Mobile Number</label>
                                <input type="text" class="form-control numberonly" id="email" name="franchisee_mobile" minlength="10" maxlength="10" pattern="[6789][0-9]{9}">
                            </div>

                            <div class="form-group col-lg-12">
                                <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Left side Image and Content End -->

<!-- Features Start -->
<section class="site-section pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 ml-auto la-content-about">
                <h2 class="section-title mb-3" style="font-size: 30px">Features</h2>
            </div>
        </div>
    </div>
</section>

<!-- <section class="site-section">
	<div class="container">
		<div class="col-lg-12">
			<img style="width:100%;" src="images/la-background/vectorbg2.png" data-thumb-id="buttons" alt="">
		</div>
	</div>
</section> -->

<section class="site-section" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 item" id="first">
                <a href="images/dealerFeatures/1.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
                    <span class="icon-search2"></span>
                    <img class="img-fluid" src="images/dealerFeatures/1.png" alt="Labour Supply Services">
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <a href="images/dealerFeatures/2.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
                    <span class="icon-search2"></span>
                    <img class="img-fluid" src="images/dealerFeatures/2.png"alt="Labour Supply Services">
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <a href="images/dealerFeatures/3.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
                    <span class="icon-search2"></span>
                    <img class="img-fluid" src="images/dealerFeatures/3.png" alt="Labour Supply Services">
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <a href="images/dealerFeatures/4.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
                    <span class="icon-search2"></span>
                    <img class="img-fluid" src="images/dealerFeatures/4.png" alt="Semi Skilled Manpower Supply Services">
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <a href="images/dealerFeatures/5.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
                    <span class="icon-search2"></span>
                    <img class="img-fluid" src="images/dealerFeatures/5.png" alt="Semi Skilled Manpower Supply Services">
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <a href="images/dealerFeatures/6.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
                    <span class="icon-search2"></span>
                    <img class="img-fluid" src="images/dealerFeatures/6.png" alt="Semi Skilled Manpower Supply Services">
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <a href="images/dealerFeatures/7.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
                    <span class="icon-search2"></span>
                    <img class="img-fluid" src="images/dealerFeatures/7.png" alt="Semi Skilled Manpower Supply Services">
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <a href="images/dealerFeatures/8.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
                    <span class="icon-search2"></span>
                    <img class="img-fluid" src="images/dealerFeatures/8.png" alt="Semi Skilled Manpower Supply Services">
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <a href="images/dealerFeatures/9.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
                    <span class="icon-search2"></span>
                    <img class="img-fluid" src="images/dealerFeatures/9.png" alt="Semi Skilled Manpower Supply Services">
                </a>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <a href="images/dealerFeatures/10.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
                    <span class="icon-search2"></span>
                    <img class="img-fluid" src="images/dealerFeatures/10.png" alt="Skilled Labour Service">
                </a>
            </div>
            <!-- <div class="col-md-6 col-lg-4 item">
                <a href="images/sq_img_12.jpg" class="item-wrap fancybox" data-fancybox="gallery2">
                    <span class="icon-search2"></span>
                    <img class="img-fluid" src="images/sq_img_12.jpg">
                </a>
            </div> -->
        </div>
    </div>
</section>
<!-- Feature End -->



<?php include "includes/footer.php" ?>

