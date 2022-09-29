<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>					
<?php include "includes/navigation.php" ?>
<?php include "razorpay-php/razorpay.php" ?>
<?php if (isset($_POST['submit'])) {  ?>

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
$dealer_category = implode(' ', $_POST['dealer_category']);
//$dealer_category = mysqli_real_escape_string($connection, $category);
$dealer_fullname = mysqli_real_escape_string($connection, $_POST['dealer_fullname']);
$dealer_mobile = mysqli_real_escape_string($connection, $_POST['dealer_mobile']);
$dealer_state = mysqli_real_escape_string($connection, $_POST['dealer_state']);
$dealer_city = mysqli_real_escape_string($connection, $_POST['dealer_city']);
$dealer_address = mysqli_real_escape_string($connection, $_POST['dealer_address']);
$dealer_pincode = mysqli_real_escape_string($connection, $_POST['dealer_pincode']);
$dealer_password = mysqli_real_escape_string($connection, $_POST['dealer_password']);
$dealer_confirm_password = mysqli_real_escape_string($connection, $_POST['dealer_confirm_password']);		
$dealer_request_date = date(time());
$query_copmlete_payment = "SELECT * from dealer_web JOIN state ON dealer_web.dealer_state=state.state_id JOIN city ON dealer_web.dealer_city=city.city_name where dealer_mobile = '$dealer_mobile' and payment_status='1'";
$result = mysqli_query($connection,$query_copmlete_payment);
if(mysqli_num_rows($result)>0)
{
$errormsg = base64_encode("User already registered. Payment successfully completed");
header("Location:index?msg=$errormsg");
}
// $query_select = "SELECT * from dealer_web where dealer_mobile = '$dealer_mobile' and payment_status='0'";
// $select_confirm = mysqli_query($connection,$query_select);
// if(mysqli_num_rows($select_confirm)>0)
// {
// if($rowset = mysqli_fetch_assoc($select_confirm))
// {
// $dealer_fullname = $rowset['dealer_fullname'];
// $dealer_category = $rowset['dealer_category'];
// $dealer_mobile = $rowset['dealer_mobile'];
// $dealer_address = $rowset['dealer_address'];
// $dealer_city = $rowset['dealer_city'];
// $dealer_state = $rowset['dealer_state'];
// $dealer_pincode = $rowset['dealer_pincode'];


$query_select = "SELECT * FROM dealer_web JOIN state ON dealer_web.dealer_state=state.state_id JOIN city ON dealer_web.dealer_city=city.city_name WHERE dealer_web.dealer_mobile = '$dealer_mobile' and dealer_web.payment_status='0'";
$select_confirm = mysqli_query($connection,$query_select);
if(mysqli_num_rows($select_confirm)>0)
{
if($rowset = mysqli_fetch_assoc($select_confirm))
{
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

						<div class="input-box payment-styles" >
						<label for="">Dealer Category</label>
							<p><?php echo $dealer_category; ?></p>
						</div>

						<div class="input-box payment-styles" >
						<label>Dealer Name</label>
							<p><?php echo $dealer_fullname; ?></p>
						</div>

						<div class="input-box payment-styles" >
						<label for="">Mobile Number</label>
							<p><?php echo $dealer_mobile; ?></p>
						</div>

						<div class="input-box payment-styles" >
							<label for="">State</label>
							<p><?php echo $dealer_state; ?></p>
						</div>

						<div class="input-box payment-styles" >
							<label for="">City</label>
							<p><?php echo $dealer_city; ?></p>
						</div>

						<div class="input-box payment-styles" >
							<label for="">Address</label>
							<p><?php echo $dealer_address; ?></p>
						</div>

						<div class="input-box payment-styles" >
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

	

	<div class="row" align="center">
		<div style="width: 80%;margin-left: 10%;">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>
					<?php echo $dealer_fullname; ?>!</strong> 
					You are already Registered as <b><?php echo $dealer_category; ?></b><br>Please contact 854500200,to complete your payment. If already paid, please ignore this message.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>

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
				<p style="font-size: 20px!important;"><span>Pre-Registration Offer, pay only Rs 299 <del style="font-weight: bold; color: #de2618;">Rs 2999</del> . (Limited Period Offer). Continue to make payment</span></p>
				<form action="payment_success?q=<?php echo $dealer_mobile; ?>" method="POST"> 
					<script
					src="https://checkout.razorpay.com/v1/checkout.js"
			      	data-key="rzp_live_6ThLzl9fuhIqDL"
			      	data-amount="29900" 
			      	data-currency="INR"
			      	data-buttontext="Pay with Razorpay"
			      	data-name="Otaf Overseas Private Limited"
			      	data-description="Digital Value"
			      	data-image="images/laimages/favicon_adam.png"
			      	data-prefill.name="<?php echo $dealer_fullname; ?>"				      
			      	data-prefill.contact="<?php echo $dealer_mobile; ?>"
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
} else {

?>

<section class="site-section pb-0" style="padding: 5%;">
	<div class="container">
		<div class="row ">			
			<div class="col-lg-6 ml-auto la-content-about">
				<h2 class="section-title mb-3" style="text-align: left;">Order Summary</h2>												
				<form action="" style="margin-top: 35px;">
					<div class="input-box payment-styles" >
						<label for="">Dealer Category</label>
						<p><?php echo $dealer_category; ?></p>
					</div>
					<div class="input-box payment-styles" >
						<label>Dealer Name</label>
						<p><?php echo $_POST['dealer_fullname']; ?></p>
					</div>

					<div class="input-box payment-styles" >
						<label for="">Mobile Number</label>
						<p><?php echo $_POST['dealer_mobile']; ?></p>
					</div>

					<div class="input-box payment-styles" >
						<label for="">State</label>
						<p><?php echo $_POST['dealer_state']; ?></p>
					</div>

					<div class="input-box payment-styles" >
						<label for="">City</label>
						<p><?php echo $_POST['dealer_city']; ?></p>
					</div>

					<div class="input-box payment-styles" >
						<label for="">Address</label>
						<p><?php echo $_POST['dealer_address']; ?></p>
					</div>

					<div class="input-box payment-styles" >
						<label for="">Pin Code</label>
						<p><?php echo $_POST['dealer_pincode'] ; ?></p>
					</div>
				</form>
			</div>

			<div class="col-lg-6 ml-auto la-content-about">
				<img src="images/laimages/reg-confirm-side-img.jpeg" alt="">				
			</div>
		</div>
	</div>
	</section>

	<?php
	if($dealer_password!=$dealer_confirm_password) {  

		$msg_password = base64_encode("Password does not match with Confirm Password ! Refill Form");
		header("Location:work-with-us?error=$msg_password");
	} else {

		$query = "INSERT INTO dealer_web(dealer_category, dealer_fullname, dealer_mobile, dealer_state, dealer_city, dealer_address, dealer_pincode, dealer_password, dealer_confirm_password, dealer_request_date,payment_status) ";
		$query .= " VALUE('{$dealer_category}', '{$dealer_fullname}', '{$dealer_mobile}', '{$dealer_state}', '{$dealer_city}', '{$dealer_address}', '{$dealer_pincode}', '{$dealer_password}', '{$dealer_confirm_password}', '{$dealer_request_date}','{0}') ";

		$new_dealer_request = mysqli_query($connection, $query);

		if (!$new_dealer_request) {
			echo "QUERY FAILED" . mysqli_error($connection);
		}
	}
	?>
	
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
				<p style="font-size: 20px!important;"><span>Pre-Registration Offer, pay only Rs 299 <del style="font-weight: bold; color: #de2618;">Rs 2999</del> . (Limited Period Offer). Continue to make payment</span></p>
				<!-- <a href="payment"><button class="btn btn-block btn-primary btn-md" style="color: #000000; font-size: 20px; font-weight: bold">Continue</button></a>
				-->
				<form action="payment_success?q=<?php echo $_POST['dealer_mobile']; ?>" method="POST"> 
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
				      data-theme.color="#F37254" >						      	
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
	?>

<?php include "includes/footer.php" ?>