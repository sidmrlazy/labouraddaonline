<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
<?php include "razorpay-php/razorpay.php" ?>
<?php if (isset($_POST['submit'])) { ?>

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
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $company_name = mysqli_real_escape_string($connection, $_POST['company_name']);
    $gstin_status = mysqli_real_escape_string($connection, $_POST['gstin_status']);
    $gstin_number = mysqli_real_escape_string($connection, $_POST['gstin_number']);
    $users_name = mysqli_real_escape_string($connection, $_POST['users_name']);
    $users_mobile = mysqli_real_escape_string($connection, $_POST['users_mobile']);
    $users_state = mysqli_real_escape_string($connection, $_POST['users_state']);
    $users_city = mysqli_real_escape_string($connection, $_POST['users_city']);
    $users_address = mysqli_real_escape_string($connection, $_POST['users_address']);
    $users_password = mysqli_real_escape_string($connection, $_POST['users_password']);
    $confirm_password = mysqli_real_escape_string($connection, $_POST['confirm_password']);

    $date=date(time());
   
    $payment=1;
    $users_type=9;
    $query_copmlete_payment = "SELECT * from users where users_mobile='$users_mobile' and payment_status='$payment' and users_type='$users_type'";
    $result = mysqli_query($connection, $query_copmlete_payment);
    if (mysqli_num_rows($result)>0) {
        $msg_password = base64_encode(12);
        header("Location:provincial_partner?msg=$msg_password");
    }
    else
    {
        if ($users_password!= $confirm_password) {

            $msg_password = base64_encode("Password does not match with Confirm Password ! Refill Form");
            header("Location:provincial_search_user?error=$msg_password");
        }
        else
        {
            $query = "UPDATE users SET category='$category',company_name='$company_name',gstin_status='$gstin_status',gstin_number='$gstin_number', users_name='$users_name',users_mobile='$users_mobile',users_state='$users_state',users_password='$users_password',users_address='$users_address',users_city='$users_city',users_created_time='$date' where users_mobile='$users_mobile' and users_type='$users_type'";
            $new_dealer_request = mysqli_query($connection, $query);

            if (!$new_dealer_request)
            {
                echo "QUERY FAILED" . mysqli_error($connection);
            }
            else {
                $query_select="select * from users JOIN state ON users.users_state=state.state_id JOIN city ON users.users_city=city.city_id WHERE users_mobile='$users_mobile' and payment_status='0'";
                $select_confirm = mysqli_query($connection,$query_select);
                if(mysqli_num_rows($select_confirm)>0){
                    if($rowset = mysqli_fetch_assoc($select_confirm))
                    {
                        $users_fullname = $rowset['users_name'];
                        $users_category = $rowset['category'];
                        $users_mobile = $rowset['users_mobile'];
                        $users_address = $rowset['users_address'];
                        $users_city = $rowset['city_name'];
                        $users_state = $rowset['state_name'];
                        $users_pincode = $rowset['users_zipcode'];
                        ?>
                        <section class="site-section pb-0" style="padding: 5%;">
                            <div class="container">
                                <div class="row ">
                                    <div class="col-lg-6 ml-auto la-content-about">
                                        <h2 class="section-title mb-3" style="text-align: left;">Order Summary</h2>

                                        <form action="" style="margin-top: 35px;">

                                            <div class="input-box payment-styles">
                                                <label for=""> Category</label>
                                                <p><?php echo $users_category; ?></p>
                                            </div>

                                            <div class="input-box payment-styles">
                                                <label>User Name</label>
                                                <p><?php echo $users_fullname; ?></p>
                                            </div>

                                            <div class="input-box payment-styles">
                                                <label for="">Mobile Number</label>
                                                <p><?php echo $users_mobile; ?></p>
                                            </div>

                                            <div class="input-box payment-styles">
                                                <label for="">State</label>
                                                <p><?php echo $users_state; ?></p>
                                            </div>

                                            <div class="input-box payment-styles">
                                                <label for="">City</label>
                                                <p><?php echo $users_city; ?></p>
                                            </div>

                                            <div class="input-box payment-styles">
                                                <label for="">Address</label>
                                                <p><?php echo $users_address; ?></p>
                                            </div>

                                            <div class="input-box payment-styles">
                                                <label for="">Pin Code</label>
                                                <p><?php echo $users_pincode; ?></p>
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
                                        <p style="font-size: 20px!important;"><span>Pre-Registration Offer, pay only Rs 1999 <del
                                                        style="font-weight: bold; color: #de2618;">Rs 2999</del> . (Limited Period Offer). Continue to make payment</span>
                                        </p>
                                        <!-- <a href="payment"><button class="btn btn-block btn-primary btn-md" style="color: #000000; font-size: 20px; font-weight: bold">Continue</button></a>
                                        -->
                                        <form action="payment_pro_success?q=<?php echo $_POST['users_mobile']; ?>"
                                              method="POST">
                                            <script
                                                    src="https://checkout.razorpay.com/v1/checkout.js"
                                                    data-key="rzp_live_6ThLzl9fuhIqDL"
                                                    data-amount="199900"
                                                    data-currency="INR"
                                                    data-buttontext="Pay with Razorpay"
                                                    data-name="Otaf Overseas Private Limited"
                                                    data-description="Digital Value"
                                                    data-image="images/laimages/favicon_adam.png"
                                                    data-prefill.name="<?php echo $_POST['users_name']; ?>"
                                                    data-prefill.contact="<?php echo $_POST['users_mobile']; ?>"
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
                }
                else
                {
                    echo "error";
                }
            }
        }
    }
}
?>

<?php include "includes/footer.php" ?>

