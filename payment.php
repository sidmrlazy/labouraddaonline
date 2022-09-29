<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>

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

<form action="localhost/labouradda" method="POST"> 
  <script
      src="https://checkout.razorpay.com/v1/checkout.js"
      data-key="rzp_live_6ThLzl9fuhIqDL"
      data-amount="59999" 
      data-currency="INR"
      
      data-buttontext="Pay with Razorpay"
      data-name="Otaf Overseas Private Limited"
      data-description="Digital Value"
      data-image="https://example.com/your_logo.jpg"
      data-prefill.name="Gaurav Kumar"
      data-prefill.email="gaurav.kumar@example.com"
      data-prefill.contact="9999999999"
      data-theme.color="#F37254"
  ></script>
  <input type="hidden" custom="Hidden Element" name="hidden">
</form>




<?php include "includes/footer.php" ?>