<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
<?php include "razorpay-php/razorpay.php" ?>


    <section class="section-hero overlay inner-page bg-image"
             style="background-image: url('images/la-gallery/banner3.jpeg');" id="home-section">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-7">
                    <div class="custom-breadcrumbs">
                        <a href="index.php">Home</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Work with us</strong></span>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
   
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
                    <strong>Thank You!</strong> Registration Complete!
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

    session_start();
                 $dealer_mobile=$_SESSION['mobile'];
    if($dealer_mobile) {
        $query_select = "SELECT * FROM dealer_web JOIN state ON dealer_web.dealer_state=state.state_id JOIN city ON dealer_web.dealer_city=city.city_id JOIN PinCode ON dealer_web.dealer_pincode=PinCode.Pincode WHERE dealer_web.dealer_mobile='$dealer_mobile' and payment_status='0'";

        $select_confirm = mysqli_query($connection, $query_select);
        if ($select_confirm) {

            if ($rowset = mysqli_fetch_array($select_confirm, MYSQLI_BOTH)) {
                $dealer_fullname = $rowset['dealer_fullname'];
                $dealer_category = $rowset['dealer_category'];
                $dealer_mobile = $rowset['dealer_mobile'];
                $dealer_address = $rowset['dealer_address'];
                $dealer_city = $rowset['city_name'];
                $dealer_state = $rowset['state_name'];
                $dealer_pincode = $rowset['dealer_pincode'];
                ?>
                <section class="site-section pb-0" style="padding: 5%;">
                    <div class="container">
                        <div class="row ">
                            <div class="col-lg-6 ml-auto la-content-about">
                                <h2 class="section-title mb-3" style="text-align: left;">Order Summary</h2>
                                <form action="" style="margin-top: 35px;">

                                    <div class="input-box payment-styles">
                                        <label for="">Dealer Category</label>
                                        <p><?php echo $dealer_category; ?></p>
                                    </div>

                                    <div class="input-box payment-styles">
                                        <label>Dealer Name</label>
                                        <p><?php echo $dealer_fullname; ?></p>
                                    </div>

                                    <div class="input-box payment-styles">
                                        <label for="">Mobile Number</label>
                                        <p><?php echo $dealer_mobile; ?></p>
                                    </div>

                                    <div class="input-box payment-styles">
                                        <label for="">State</label>
                                        <p><?php echo $dealer_state; ?></p>
                                    </div>

                                    <div class="input-box payment-styles">
                                        <label for="">City</label>
                                        <p><?php echo $dealer_city; ?></p>
                                    </div>

                                    <div class="input-box payment-styles">
                                        <label for="">Address</label>
                                        <p><?php echo $dealer_address; ?></p>
                                    </div>

                                    <div class="input-box payment-styles">
                                        <label for="">Pin Code</label>
                                        <p><?php echo $dealer_pincode; ?></p>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-6 ml-auto la-content-about">
                                <img src="images/laimages/reg-confirm-side-img.jpeg" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                <section class="site-section pb-0" style="margin-bottom: -80px;">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-12 ml-auto la-content-about">
                                <a href="tnc">
                                    <h2 class="section-title mb-3"
                                        style="text-align: left!important; font-size: 16px;">Terms &
                                        Conditions</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="site-section pb-0">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-12 ml-auto la-content-about" style="margin-bottom: 100px;">
                                <p style="font-size: 20px!important;"><span>Pre-Registration Offer, pay only Rs 299 <del
                                            style="font-weight: bold; color: #de2618;">Rs 2999</del> . (Limited Period Offer). Continue to make payment</span>
                                </p>
                                <!-- <a href="payment"><button class="btn btn-block btn-primary btn-md" style="color: #000000; font-size: 20px; font-weight: bold">Continue</button></a>
                                -->
                                <form action="payment_success?q=<?php echo $_POST['dealer_mobile']; ?>"
                                      method="POST">
                                    <script
                                        src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="rzp_live_6ThLzl9fuhIqDL"
                                        data-amount="29900"
                                        data-currency="INR"
                                        data-buttontext="Pay with Razorpay"
                                        data-name="Otaf Overseas Private Limited"
                                        data-description="Digital Value"
                                        data-image="images/laimages/favicon_adam.png"
                                        data-prefill.name="<?php echo $_POST['dealer_fullname']; ?>"
                                        data-prefill.contact="<?php echo $_POST['dealer_mobile']; ?>"
                                        data-theme.color="#F37254">
                                    </script>

                                    <input type="hidden" custom="Hidden Element" name="hidden">
                                </form>

                            </div>
                        </div>
                    </div>
                </section>
                <?php
            }
        } else {
            echo "error";
        }
    }
    else
    {
        echo "data not found";

}

?>


<?php include "includes/footer.php" ?>