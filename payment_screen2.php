<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>					
<?php include "includes/navigation.php" ?>
<?php include "razorpay-php/razorpay.php" ?>

<section class="section-hero overlay inner-page bg-image" style="background-image: url('images/la-gallery/banner3.jpeg');" id="home-section">
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
$firm_name =  mysqli_real_escape_string($connection,$_POST['franchisee_company_name']);
$firm_type =  mysqli_real_escape_string($connection,$_POST['franchisee_category']);
$gstin_status =  mysqli_real_escape_string($connection,$_POST['franchisee_gstin_status']);
$gstin_number =  mysqli_real_escape_string($connection,$_POST['franchisee_gstin_number']);
$full_name =  mysqli_real_escape_string($connection,$_POST['franchisee_full_name']);
$mobile =  mysqli_real_escape_string($connection,$_POST['franchisee_mobile']);
$state =  mysqli_real_escape_string($connection,$_POST['franchisee_state']);
$city =  mysqli_real_escape_string($connection,$_POST['franchisee_city']);
$pincode =  mysqli_real_escape_string($connection,$_POST['franchisee_pincode']);
$address = mysqli_real_escape_string($connection, $_POST['franchisee_address']);
$password =  mysqli_real_escape_string($connection,$_POST['franchisee_password']);
$franchisee_confirm_password =  mysqli_real_escape_string($connection,$_POST['franchisee_confirm_password']);

$date = date('d-m-Y');

$query_copmlete_payment = "SELECT * FROM franchisee JOIN state ON franchisee.dealer_state=state.state_id JOIN city ON franchisee.franchisee_city=city.city_id JOIN PinCode ON franchisee.franchisee_pincode=PinCode.Pincode WHERE franchisee.franchisee_mobile='$mobile' and payment_status='1'";

$result = mysqli_query($connection, $query_copmlete_payment);
if ($result)
{
    $msg_password = base64_encode(12);
    header("Location:franchisee-opportunity?msg=$msg_password");
}
else {
    if ($password != $franchisee_confirm_password) {
         
        $msg_password = base64_encode("Password does not match with Confirm Password ! Refill Form");
        header("Location:franchisee_search_user?error=$msg_password");

    } else {

        $query = "UPDATE franchisee SET franchisee_category='$firm_type',franchisee_company_name='$firm_name',franchisee_gstin_status='$gstin_status',franchisee_gstin_number='$gstin_number',franchisee_full_name='$full_name',franchisee_mobile='$mobile',franchisee_state='$state',franchisee_city='$city',franchisee_pincode='$pincode',franchisee_address='$address',franchisee_date='$date',franchisee_confirm_password='$franchisee_confirm_password',franchisee_password='$password' where franchisee_mobile = '$mobile'";
        $new_dealer_request = mysqli_query($connection, $query);

        if (!$new_dealer_request) {
            echo "QUERY FAILED" . mysqli_error($connection);
        } else {

            $query_select = "SELECT * FROM franchisee JOIN state ON franchisee.franchisee_state=state.state_id JOIN city ON franchisee.franchisee_city=city.city_id JOIN PinCode ON franchisee.franchisee_pincode=PinCode.Pincode WHERE franchisee.franchisee_mobile='$mobile' and payment_status='0'";
            $select_confirm = mysqli_query($connection,$query_select);
            if(mysqli_num_rows($select_confirm)>0){
                if($rowset = mysqli_fetch_assoc($select_confirm))
                {

                    $franchisee_full_name = $rowset['franchisee_full_name'];
                    $franchisee_category = $rowset['franchisee_category'];
                    $franchisee_mobile = $rowset['franchisee_mobile'];
                    $franchisee_address = $rowset['franchisee_address'];
                    $franchisee_city = $rowset['city_name'];
                    $franchisee_state = $rowset['state_name'];
                    $franchisee_pincode = $rowset['franchisee_pincode'];
                    ?>
                    <section class="site-section pb-0" style="padding: 5%;">
                        <div class="container">
                            <div class="row ">
                                <div class="col-lg-6 ml-auto la-content-about">
                                    <h2 class="section-title mb-3" style="text-align: left;">Order Summary</h2>

                                    <form action="" style="margin-top: 35px;">

                                        <div class="input-box payment-styles" >
                                            <label for="">Franchisee Category</label>
                                            <p><?php echo $franchisee_category; ?></p>
                                        </div>

                                        <div class="input-box payment-styles" >
                                            <label>Franchisee Name</label>
                                            <p><?php echo $franchisee_full_name; ?></p>
                                        </div>

                                        <div class="input-box payment-styles" >
                                            <label for="">Mobile Number</label>
                                            <p><?php echo $franchisee_mobile; ?></p>
                                        </div>

                                        <div class="input-box payment-styles" >
                                            <label for="">State</label>
                                            <p><?php echo $franchisee_state; ?></p>
                                        </div>

                                        <div class="input-box payment-styles" >
                                            <label for="">City</label>
                                            <p><?php echo $franchisee_city; ?></p>
                                        </div>

                                        <div class="input-box payment-styles" >
                                            <label for="">Address</label>
                                            <p><?php echo $franchisee_address; ?></p>
                                        </div>

                                        <div class="input-box payment-styles" >
                                            <label for="">Pin Code</label>
                                            <p><?php echo $franchisee_pincode; ?></p>
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
                                        <h2 class="section-title mb-3" style="text-align: left!important; font-size: 16px;">Terms & Conditions</h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>


                    <section class="site-section pb-0">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-12 ml-auto la-content-about" style="margin-bottom: 100px;">
                                    <p style="font-size: 20px!important;"><span>Pre-Registration Offer, pay only Rs 999. (Limited Period Offer). Continue to make payment</span></p>
                                    <form action="pay_success?q=<?php echo $franchisee_mobile; ?>" method="POST">
                                        <script
                                                src="https://checkout.razorpay.com/v1/checkout.js"
                                                data-key="rzp_live_6ThLzl9fuhIqDL"
                                                data-amount="99900"
                                                data-currency="INR"
                                                data-buttontext="Pay with Razorpay"
                                                data-name="Otaf Overseas Private Limited"
                                                data-description="Digital Value"
                                                data-image="images/laimages/favicon_adam.png"
                                                data-prefill.name="<?php echo $franchisee_full_name; ?>"
                                                data-prefill.contact="<?php echo $franchisee_mobile; ?>"
                                                data-theme.color="#F37254"
                                        ></script>
                                        <input type="hidden" custom="Hidden Element" name="hidden">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                }
            }
        }
    }
}
?>
<?php include "includes/footer.php" ?>