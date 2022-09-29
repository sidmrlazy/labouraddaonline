<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation-dark.php" ?>
<?php //include "popup_form.php" ?>

<?php
    $query = "SELECT * FROM state";
    $result = mysqli_query($connection,$query);
?>

<?php
@$error_password = $_REQUEST['error'];
$error_msg = base64_decode($error_password);
$error_confirm = "Password does not match with the Confirm Password !";
if($error_confirm==$error_msg)
{
?>
<div class="row" align="center" >
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

<!-- Left side Image and Content Start -->
<section class="site-section col-md-12" id="next-section" style="background-image: url(images/la-background/bgwhite.jpeg);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 item left-content-dealer" id="first">
				<img src="images/la-background/bg3.jpeg" class="img-fluid" alt="background labouradda" >
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<!-- PHP Code to insert form data Start -->
						<?php
						if (isset($_POST['submit'])) {
						echo $_POST['submit'];

						$dealer_category = implode(', ', $_POST['dealer_category']);
						$dealer_fullname = $_POST['dealer_fullname'];
						$dealer_mobile = $_POST['dealer_mobile'];
						$dealer_state = $_POST['dealer_state'];
						$dealer_city = $_POST['dealer_city'];
						$dealer_address = $_POST['dealer_address'];
						$dealer_pincode = $_POST['dealer_pincode'];
						$dealer_password = $_POST['dealer_password'];
						$dealer_confirm_password = $_POST['dealer_confirm_password'];
						$dealer_request_date = date('d-m-y');

						$query = "INSERT INTO dealer_web(
						dealer_category,
						dealer_fullname,
						dealer_mobile,
						dealer_state,
						dealer_city,
						dealer_address,
						dealer_pincode,
						dealer_password,
						dealer_confirm_password,
						dealer_request_date) ";
						$query .= " VALUE(
						'{$dealer_category}',
						'{$dealer_fullname}',
						'{$dealer_mobile}',
						'{$dealer_state}',
						'{$dealer_city}',
						'{$dealer_address}',
						'{$dealer_pincode},
						'{$dealer_password}',
						'{$dealer_confirm_password}',
						' now() )  ";
						$new_dealer_request = mysqli_query($connection, $query);

						if (!empty($new_dealer_request)) {die('QUERY FAILED' . mysqli_error($connection));}
						}
						?>
						<!-- PHP Code to insert form data End -->
						<form class="p-2 p-md-5 border rounded la-p"action="payment_screen" method="post" style="background: #fdcd01; margin-top: -50px; " >
							<div class="container">
								<div class="row">
									<div class="form-group col-lg-3">
										<label for="dealer_category[]" style="font-size: 10px;">Select Category</label>
										<select class="selectpicker border rounded ui fluid dropdown" multiple="multiple" id="job-type" data-style="btn-black" data-width="100%" required="" data-live-search="true" title="Select Your Category" name="dealer_category[]">
											<option value="Labour/Mistri Contractor">Labour/Mistri Contractor</option>
											<option value="Tile Mistri Contractor">Tile Mistri Contractor </option>
											<option value="Electrician Contractor">Electrician Contractor</option>
											<option value="Plumber Contractor">Plumber Contractor</option>
											<option value="Carpenter Contractor">Carpenter Contractor</option>
											<option value="Painter Contractor">Painter Contractor</option>
											<option value="Fabricator">Fabricator</option>
										</select>
									</div>

									<div class="form-group col-lg-3" >
										<label for="dealer_fullname" style="font-size: 10px;">Full Name</label>
										<input type="text" class="form-control" id="job-title" required="" name="dealer_fullname">
									</div>

									<div class="form-group col-lg-3">
										<label for="dealer_mobile" style="font-size: 10px;">Mobile Number</label>
										<input type="number" class="form-control" id="email" name="dealer_mobile" minlength="10" maxlength="10">
									</div>

			                        <div class="form-group col-lg-3">
										<label for="dealer_state" style="font-size: 10px;">State</label>
										<select name="dealer_state" class="form-control" id="state" required="">
			                                <option value="">Select State</option>
			                                    <?php
													if($result->num_rows > 0){
														while($row = $result->fetch_assoc()){
															echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';
														}
													}else{
														echo '<option value="">State not available</option>';
													}
												?>
			                            </select>
									</div>

									<div class="form-group col-lg-3">
										<label for="dealer_city" style="font-size: 10px;">City</label>
										<select name="dealer_city" class="form-control" id="city" required="">
			                                 <option value="">Select City</option>
			                            </select>
									</div>

			                        <div class="form-group col-lg-3">
										<label for="dealer_pincode" style="font-size: 10px;">Pin Code</label>
										<select name="dealer_pincode" class="form-control" id="pincode" required="">
			                                 <option value="">Select Pincode</option>
			                            </select>
									</div>

			                        <div class="form-group col-lg-3">
										<label for="dealer_address" style="font-size: 10px;">Address</label>
										<input type="text" class="form-control"  required="" name="dealer_address" onFocus="geolocate()" id="autocomplete">
									</div>

									<div class="form-group col-lg-3">
										<label for="dealer_password" style="font-size: 10px;">Password</label>
										<input type="password" class="form-control"  placeholder="Min 6 Characters" required="" name="dealer_password" minlength="6" id="dealer_password">
									</div>

									<div class="form-group col-lg-3">
										<label for="dealer_confirm_password" style="font-size: 10px;">Confirm Password</label>
										<input type="password" class="form-control"  required="" name="dealer_confirm_password" minlength="6" id="dealer_confirm_password">
									</div>

									<div class="form-group col-lg-12">
										<span style="font-size: 12px; color: #000">By clicking on submit you 'Agree' to the <a href="tnc" target="_blank" style="color: #000; font-weight: bold;">Terms & Conditions</a></span>
										<input type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="Submit" style="background: #000; color: #fff;">
										<span style="font-size: 12px; color: #000;">Clicking here to download the <a href="tnc" target="_blank" style="color: #000; font-weight: bold;">E-Brochure</a></span>
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

