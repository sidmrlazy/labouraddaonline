<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation-dark.php" ?>
<?php //include "popup_form.php" ?>

<?php
    $query = "SELECT * FROM state";
    $result = mysqli_query($connection,$query);
?>


<!-- Left side Image and Content Start -->
<section class="site-section col-md-12" id="next-section" style="background-image: url(images/la-background/bgwhite.jpeg);">
	<div class="container">
	    
		<div class="row">
			<div class="col-lg-12 item left-content-dealer" id="first">
				<img src="images/la-background/bg3.jpeg" class="img-fluid" alt="background labouradda" >
			</div>
			<div class="container">
			    <?php
@$error_password = $_REQUEST['msg'];
$error_msg = base64_decode($error_password);
$error_confirm = "mobile number not found!";
if($error_confirm==$error_msg)
{
?>
<div class="row" align="center" >
	<div style="width: 80%;margin-left: 10%; margin-bottom:45px;">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Warning !</strong> Mobile number not found ! 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
		</div>
	</div>
</div>
<?php
}
?>
				<div class="row">
					<div class="col-lg-12">
						<!-- PHP Code to insert form data Start -->
						<!-- PHP Code to insert form data End -->
						<form class="p-2 p-md-5 border rounded la-p" action="search-mobile-payment" method="post" style="background: #fdcd01; margin-top: -50px; " >
							<div class="container">
								<div class="row">
								
									<div class="form-group col-lg-6">
										<label for="dealer_mobile" style="font-size: 10px;">Mobile Number</label>
										<input type="text" class="form-control" id="" name="dealer_mobile" minlength="10" maxlength="10" pattern="[6789][0-9]{9}">
									</div>
									<div class="form-group col-lg-6 mt-4">
										<!--<label for="dealer_mobile" style="font-size: 10px;">Mobile Number</label>-->
										<input type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="Submit" style="background: #000; color: #fff;">
									</div>
							
										<span style="font-size: 16px; color: #000;">Clicking here to download the <a href="document/OnlineDealerBrochure.pdf" target="_blank" style="color: #000; font-weight: bold;" class="blinking">E-Brochure</a></span>
										
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Left side Image and Content End -->

<!-- Features Start -->
<section class="site-section feature-section-dealer" id="next-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 item dealer-feature-section" id="first">
				<h1>कौन बन सकता है ऑनलाइन डीलर</h1>
				<p></p>

				<div class="container">
					<div class="row">
						<div class="dealer-box col-lg-12" >
							<img src="images/la-background/feature-image1.png" alt="">
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- Feature End -->

<!-- Features Two Start -->
<section class="site-section " id="next-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 item dealer-feature-section" id="first">
				<h1>क्या है ऑनलाइन डीलर का लाभ?</h1>
				<p></p>

				<div class="container">
					<div class="row">
						<div class="dealer-box col-lg-12" >
							<!-- <img src="images/la-background/new-dealer.gif" alt=""> -->
							<video loop controls autoplay muted controlsList="nodownload">
								<source src="video/online-thekedaar-registration/new-dealer.mp4" type="video/mp4" >
							</video>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- Feature Two End -->

<?php include "includes/footer.php" ?>

<script type="text/javascript">
	var dealer_password = document.getElementById('dealer_password');
	var dealer_confirm_password = document.getElementById('dealer_confirm_password');

	function showhideboxfunction() {
		if( dealer_password.type === 'password') {
			dealer_password.type="text";
			dealer_confirm_password.type="text";
		} else {
			dealer_confirm_password.type="password";
			dealer_password.type="password";
		}
	}

$(document).ready(function() {
$('.mdb-select').materialSelect();
});

$(document).ready(function(){

 $('#state').change(function(){
	  var state_id = $('#state').val();
	  if(state_id != '')
	  {
	   $.ajax({
		url:"fetch3.php",
		method:"POST",
		data:{state_id:state_id},
		success:function(data)
		{
		 $('#city').html(data);
		}
	   });
	  }
	  else
	  {
	   $('#city').html('<option value="">Select City</option>');
	  }
 });

 $('#city').change(function(){
	  var city_id = $('#city').val();
	  if(city_id != '')
	  {
	   $.ajax({
		url:"fetch3.php",
		method:"POST",
		data:{city_id:city_id},
		success:function(data)
		{
		 $('#pincode').html(data);
		}
	   });
	  }
	  else
	  {
	   $('#pincode').html('<option value="">Select Pincode</option>');
	  }
 });

});

var placeSearch, autocomplete;
var componentForm = {
  postal_code: 'short_name'
};

function initAutocomplete() {
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['geocode']});
  autocomplete.setFields(['address_component']);
  //autocomplete.addListener('place_changed', fillInAddress);
}

function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKwyqrGsG1Stuy5UpUBoldcWEtAIeJMOU&libraries=places&callback=initAutocomplete" async defer></script>

