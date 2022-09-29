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
$franchisee_category =$_POST['franchisee_category'];
$franchisee_company_name = mysqli_real_escape_string($connection, $_POST['franchisee_company_name']);
$franchisee_gstin_status = mysqli_real_escape_string($connection, $_POST['franchisee_gstin_status']);				
$franchisee_gstin_number = mysqli_real_escape_string($connection, $_POST['franchisee_gstin_number']);				
$franchisee_full_name = mysqli_real_escape_string($connection, $_POST['franchisee_full_name']);
$franchisee_mobile = mysqli_real_escape_string($connection, $_POST['franchisee_mobile']);
$franchisee_state = mysqli_real_escape_string($connection, $_POST['franchisee_state']);
$franchisee_city = mysqli_real_escape_string($connection, $_POST['franchisee_city']);
$franchisee_address = mysqli_real_escape_string($connection, $_POST['franchisee_address']);
$franchisee_pincode = mysqli_real_escape_string($connection, $_POST['franchisee_pincode']);	
$franchisee_date = date(time());
$query_payment = "SELECT * from franchisee where franchisee_mobile = '$franchisee_mobile' and payment_status='1'";
$result = mysqli_query($connection,$query_payment);
if(mysqli_num_rows($result)>0)
{
$errormsg = base64_encode("User already registered. Payment successfully completed");
header("Location:index?msg=$errormsg");
}
$query_select = "SELECT * from franchisee where franchisee_mobile = '$franchisee_mobile' and payment_status='0'";
$select_confirm = mysqli_query($connection,$query_select);
if(mysqli_num_rows($select_confirm)>0)
{
if($rowset = mysqli_fetch_assoc($select_confirm))
{
$franchisee_full_name = $rowset['franchisee_full_name'];
$franchisee_category = $rowset['franchisee_category'];
$franchisee_mobile = $rowset['franchisee_mobile'];
$franchisee_address = $rowset['franchisee_address'];
$franchisee_city = $rowset['franchisee_city'];
$franchisee_state = $rowset['franchisee_state'];
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

	

	<div class="row" align="center">
		<div style="width: 80%;margin-left: 10%;">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>
					<?php echo $franchisee_full_name; ?>!</strong> 
					You are already Registered as <b><?php echo $franchisee_category; ?></b><br>Please contact 854500200,to complete your payment. If already paid, please ignore this message.
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
} else {

?>

<section class="site-section pb-0" style="padding: 5%;">
	<div class="container">
		<div class="row ">			
			<div class="col-lg-6 ml-auto la-content-about">
				<h2 class="section-title mb-3" style="text-align: left;">Order Summary</h2>												
				<form action="" style="margin-top: 35px;">
					<div class="input-box payment-styles" >
						<label for="">Franchisee Category</label>
						<p><?php echo $_POST['franchisee_category']; ?></p>
					</div>
					<div class="input-box payment-styles" >
						<label>Franchisee Name</label>
						<p><?php echo $_POST['franchisee_full_name']; ?></p>
					</div>

					<div class="input-box payment-styles" >
						<label for="">Mobile Number</label>
						<p><?php echo $_POST['franchisee_mobile']; ?></p>
					</div>

					<div class="input-box payment-styles" >
						<label for="">State</label>
						<p><?php echo $_POST['franchisee_state']; ?></p>
					</div>

					<div class="input-box payment-styles" >
						<label for="">City</label>
						<p><?php echo $_POST['franchisee_city']; ?></p>
					</div>

					<div class="input-box payment-styles" >
						<label for="">Address</label>
						<p><?php echo $_POST['franchisee_address']; ?></p>
					</div>

					<div class="input-box payment-styles" >
						<label for="">Pin Code</label>
						<p><?php echo $_POST['franchisee_pincode'] ; ?></p>
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
	
		$query = "INSERT INTO franchisee(franchisee_category, franchisee_full_name, franchisee_mobile, franchisee_state, franchisee_city, franchisee_address, franchisee_pincode,franchisee_date,payment_status) ";
		$query .= " VALUE('{$franchisee_category}', '{$franchisee_full_name}', '{$franchisee_mobile}', '{$franchisee_state}', '{$franchisee_city}', '{$franchisee_address}', '{$franchisee_pincode}', '{$franchisee_date}','{0}') ";

		$new_request = mysqli_query($connection, $query);

		if (!$new_request) {
			echo "QUERY FAILED" . mysqli_error($connection);
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
				<p style="font-size: 20px!important;"><span>Pre-Registration Offer, pay only Rs 999. (Limited Period Offer). Continue to make payment</span></p>
				<!-- <a href="payment"><button class="btn btn-block btn-primary btn-md" style="color: #000000; font-size: 20px; font-weight: bold">Continue</button></a>
				-->
				<form action="pay_success?q=<?php echo $_POST['franchisee_mobile']; ?>" method="POST"> 
					<script
				      src="https://checkout.razorpay.com/v1/checkout.js"
				      data-key="rzp_live_6ThLzl9fuhIqDL"
				      data-amount="99900" 
				      data-currency="INR"
				      data-buttontext="Pay with Razorpay"
				      data-name="Otaf Overseas Private Limited"
				      data-description="Digital Value"
				      data-image="images/laimages/favicon_adam.png"
				      data-prefill.name="<?php echo $_POST['franchisee_full_name']; ?>"				      
				      data-prefill.contact="<?php echo $_POST['franchisee_mobile']; ?>"
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