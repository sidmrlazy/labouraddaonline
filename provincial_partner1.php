<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
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
					<span class="text-white"><strong>Provincial Partner</strong></span>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Provincial Partner registration form -->
<section class="site-section">
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-12">
				<?php
				if (isset($_POST['submit'])) {
				echo $_POST['submit'];

				$category = $_POST['category'];
				$company_name = $_POST['company_name'];
				$gstin_status = $_POST['gstin_status'];				
				$gstin_number = $_POST['gstin_number'];				
				$users_name = $_POST['users_name'];
				$users_mobile = $_POST['users_mobile'];
				$users_state = $_POST['users_state'];
				$users_city = $_POST['users_city'];
				$pincode= implode(', ', $_POST['users_pincode']);
				$users_pincode=$pincode;
				$users_address = $_POST['users_address'];
				$request_date = date("Y-m-d H:i:s");		
				$password = $_POST['password'];
				$users_type = 9;

				$query = "INSERT INTO users(category,company_name,gstin_status,gstin_number,users_name,users_mobile,users_state,users_city,users_password,users_address,users_password,user_created_time,users_type)";
				
				$query .= " VALUE('{$category}', '{$company_name}', '{$gstin_status}', '{$gstin_number}', '{$users_name}', '{$users_mobile}', '{$users_state}', '{$users_city}', '{$users_pincode}', '{$users_address}','{$users_password}','{$users_create_time}','{$users_type}')";
                 $query_copmlete_payment = "SELECT * from users where users_mobile = '$users_mobile' AND users_type='$users_type' ";
				$result = mysqli_query($connection,$query_copmlete_payment);
				if(mysqli_num_rows($result)>0)
				{
    				$errormsg = base64_encode("User Already Registered!");
    				header("Location:index?msg=$errormsg");
				}else{
				
				// // 	$query2 = "SELECT * from users where users_mobile = $mobile AND users_type= 9 ";
				// // 	$result = mysqli_query($connection,$query2);
				// //     if(mysqli_num_rows($result)>0)
				// //     {
				// //         $errormsg = base64_encode("User Already Registered!");
				// //         header("Location:index?msg=$errormsg");
				// // 		//echo "<script>alert('Mobile Number User Already Registered!');window.loaction.href='provincial_partner';</script>";
				// //     } else {
    // 					$query="insert into users(category,company_name,gstin_status,gstin_number,users_name,users_mobile,users_state,users_city,users_password,users_address,users_password,user_created_time,users_type) VALUES('$category', '$company_name', '$gstin_status', '$gstin_number', '$users_name', '$users_mobile', '$users_state', '$users_city', '$users_pincode', '$users_address','$users_password','$users_create_time','9' )";
    // 					$new_partner_request = mysqli_query($connection, $query);
    					$msg="Thank you for showing interest, We will contact you shortly. For any queries, please contact 8545002000";
    					
							$curl = curl_init();
							curl_setopt_array($curl, array(
									CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=LABADA&route=4&mobiles=$mobile&authkey=240434AJDFeUGV5f6883cbP1&message=$msg&unicode=1&route=4",
									CURLOPT_RETURNTRANSFER => true,
									CURLOPT_ENCODING => "",
									CURLOPT_MAXREDIRS => 10,
									CURLOPT_TIMEOUT => 30,
									CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
									CURLOPT_CUSTOMREQUEST => "GET",
									CURLOPT_SSL_VERIFYHOST => 0,
									CURLOPT_SSL_VERIFYPEER => 0,
								));
		
    						$response = curl_exec($curl);
    						$err = curl_error($curl);
    
    						curl_close($curl);
    					if (!$new_partner_request) {
    						die('QUERY FAILED' . mysqli_error($connection));
							//echo "<script>alert('Registration Successfully Complete!');window.loaction.href='provincial_partner';</script>";
    					}
					}
				}
				?>
				
				<form class="p-4 p-md-5 border rounded la-p" action="" method="post">
					<p>Become an Labouradda Provincial Partner for your State as we strive to create Smart Connectivity between <br> Labourers/ Mistri and Consumers</p>						

					<div class="form-group">
							<label for="category">Firm Type</label>
							<select class="selectpicker border rounded ui fluid dropdown"  id="job-type" data-style="btn-black" data-width="100%" required="" data-live-search="true" title="Select Your Category" name="category">
								<option value="">Select Firm Name</option>
								<option value="Individual">Individual</option>
								<option value="Proprietorship Company">Proprietorship Company </option>								
								<option value="Private Limited">Private Limited</option>								
								<option value="Public Limited">Public Limited</option>								
							</select>
						</div>

						<div class="form-group">
							<label for="company_name">Company Name</label>
							<input type="text" class="form-control" id="job-title" placeholder="Please Enter the name of your company (if any)" name="company_name">
						</div>

						<div class="form-group">
							<label for="gstin_status">GSTIN (Yes/No)</label>
							<select class="selectpicker border rounded ui fluid dropdown"  id="job-type" data-style="btn-black" data-width="100%" required="" data-live-search="true" title="Select GSTIN Status" name="gstin_status">
								<option value="">Select Status</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>															
							</select>
						</div>

						<div class="form-group">
							<label for="gstin_number">GSTIN Number (If Applicable)</label>
							<input type="text" class="form-control" id="job-title" placeholder="GSTIN Number" name="gstin_number">
						</div>

						<div class="form-group">
							<label for="users_name">Full Name</label>
							<input type="text" class="form-control" id="job-title" placeholder="Enter your full name" required="" name="users_name">
						</div>
						
						<div class="form-group">
							<label for="users_mobile">Mobile Number</label>
							<input type="number" class="form-control numberonly" id="users_mobile" placeholder="Enter your Mobile Number" name="users_mobile" maxlength="10" minlength="10" required="">
						</div>
						
						<div class="form-group">
							<label for="users_state">State</label>
							<select name="users_state" class="form-control" id="state" required="">
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
							
							<!--<input type="text" class="form-control"  placeholder="Enter the name of your State" required="" name="franchisee_state">-->
						</div>
						
						<div class="form-group">
							<label for="users_city">City</label>
							<select name="users_city" class="form-control js-example-basic-single" id="city" required="">
                                 <option value="">Select City</option>
                            </select>
							
							<!--<input type="text" class="form-control" placeholder="Enter the name of your city" required="" name="franchisee_city">-->
						</div>
						
						<div class="form-group d-none">
							<label for="users_pincode[]">Pin Code</label>
							<select name="users_pincode[]" class="form-control js-example-basic-multiple" id="pincode" required="" multiple>
                                 <option value="">Select Pincode</option>
                            </select>
							<!--<input type="text" class="form-control"  placeholder="Enter your Area Pin code" required="" name="franchisee_pincode">-->
						</div>			
						
						<div class="form-group">
							<label for="users_address">Address</label>
							<input type="text" class="form-control"  placeholder="Enter your Full Address" required="" name="users_address" onFocus="geolocate()" id="autocomplete">
							
						</div>
						
						<div class="form-group">
							<label for="users_password">Password</label>
							<input type="text" class="form-control"  placeholder="Enter your Password" required="" name="users_password" >
							
						</div>
						
						<div class="form-group">
							<input type="checkbox" id="showhidebox" <span id="showhidetext"> I agree to <a href="https://labouradda.net/tnc" target= "_blank">Terms & Conditions </a> </span>
						</div>
						
						<div class="col-12">							
							<input type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="submit">
							<!-- <button type="submit" name="submit" class="btn btn-block btn-primary btn-md">Submit</button> -->
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

<?php include "includes/footer.php" ?>

<script>

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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKwyqrGsG1Stuy5UpUBoldcWEtAIeJMOU&libraries=places&callback=initAutocomplete"
        async defer></script>
<script>
$(document).ready(function(){
    
 $('#state').change(function(){
	  var state_id = $('#state').val();
	  if(state_id != '')
	  {
	   $.ajax({
		url:"fetch2.php",
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
		url:"fetch2.php",
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
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


