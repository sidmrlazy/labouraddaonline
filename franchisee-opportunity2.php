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
					<span class="text-white"><strong>Franchisee Opportunity</strong></span>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Dealer registration form -->
<section class="site-section">
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-12">
				<?php
				if (isset($_POST['submit'])) {
				echo $_POST['submit'];

				$franchisee_category = $_POST['franchisee_category'];
				$franchisee_company_name = $_POST['franchisee_company_name'];
				$franchisee_gstin_status = $_POST['franchisee_gstin_status'];				
				$franchisee_gstin_number = $_POST['franchisee_gstin_number'];				
				$franchisee_full_name = $_POST['franchisee_full_name'];
				$franchisee_mobile = $_POST['franchisee_mobile'];
				$franchisee_state = $_POST['franchisee_state'];
				$franchisee_city = $_POST['franchisee_city'];
				$franchisee_address = $_POST['franchisee_address'];
				$franchisee_pincode = $_POST['franchisee_pincode'];	
				$franchisee_date = date('Y-m-d');		
                $franchisee_password='123456';
                $payment_status='0';
				//$query = "INSERT INTO franchisee(franchisee_category, franchisee_company_name, franchisee_gstin_status, franchisee_gstin_number, franchisee_full_name, franchisee_mobile, franchisee_state, franchisee_city, franchisee_address, franchisee_pincode, franchisee_request_date) ";
				
				//$query .= " VALUE('{$franchisee_category}', '{$franchisee_company_name}', '{$franchisee_gstin_status}', '{$franchisee_gstin_number}', '{$franchisee_full_name}', '{$franchisee_mobile}', '{$franchisee_state}', '{$franchisee_city}, '{$franchisee_address}', '{$franchisee_pincode}', ' now() )  ";
    //             $query_copmlete_payment = "SELECT * from franchisee where franchisee_mobile = '$franchisee_mobile'";
				// $result = mysqli_query($connection,$query_copmlete_payment);
				// if(mysqli_num_rows($result)>0)
				// {
				// $errormsg = base64_encode("User Already Registered!");
				// header("Location:index?msg=$errormsg");
				// }else{
					$query="insert into franchisee(franchisee_category,franchisee_company_name,franchisee_gstin_status,franchisee_gstin_number,franchisee_full_name,franchisee_mobile,franchisee_state,franchisee_city,franchisee_address,franchisee_pincode,franchisee_date,franchisee_password,franchisee_confirm_password,payment_status) values('$franchisee_category','$franchisee_company_name','$franchisee_gstin_status','$franchisee_gstin_number','$franchisee_full_name','$franchisee_mobile','$franchisee_state','$franchisee_city','$franchisee_address','$franchisee_pincode','$franchisee_date','$franchisee_password','$franchisee_password','$payment_status')";
					
					$new_franchisee_request = mysqli_query($connection, $query);
					$msg="Thank you for showing interest, We will contact you shortly. For any queries, please contact 8545002000";
					$curl = curl_init();
					curl_setopt_array($curl, array(
							CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=LABADA&route=4&mobiles=$franchisee_mobile&authkey=&message=$msg&unicode=1&route=4",
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
					$query2="UPDATE `PinCode` SET assign_status='1' WHERE Pincode='$franchisee_pincode' ";
					$res2=mysqli_query($connection,$query2);
					if (!$new_franchisee_request) {
							    die('QUERY FAILED' . mysqli_error($connection));
					  }
				//	}
				}
				?>
				
				<form class="p-4 p-md-5 border rounded la-p" action="pay_screen" method="post">
					<p>Become an Labouradda Franchisee for a Pin Code of your city as we strive to create Smart Connectivity between <br> Labourers/ Mistri and Consumers</p>						

					<div class="form-group">
							<label for="franchisee_category">Firm Type</label>
							<select class="selectpicker border rounded ui fluid dropdown"  id="job-type" data-style="btn-black" data-width="100%" required="" data-live-search="true" title="Select Your Category" name="franchisee_category">
								<option value="">Select Firm Name</option>
								<option value="Individual">Individual</option>
								<option value="Proprietorship Company">Proprietorship Company </option>								
								<option value="Private Limited">Private Limited</option>								
								<option value="Public Limited">Public Limited</option>								
							</select>
						</div>

						<div class="form-group">
							<label for="franchisee_company_name">Company Name</label>
							<input type="text" class="form-control" id="job-title" placeholder="Please Enter the name of your company (if any)" name="franchisee_company_name" >
						</div>

						<div class="form-group">
							<label for="franchisee_gstin_status">GSTIN (Yes/No)</label>
							<select class="form-control"  id="franchisee_gstin_status" required="" name="franchisee_gstin_status">
								<option value="">Select Status</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>															
							</select>
						</div>

						<div class="form-group">
							<label for="franchisee_gstin_number">GSTIN Number (If Applicable)</label>
							<input type="text" class="form-control" id="job-title" placeholder="GSTIN Number" name="franchisee_gstin_number">
						</div>

						<div class="form-group">
							<label for="franchisee_full_name">Full Name</label>
							<input type="text" class="form-control" id="job-title" placeholder="Enter your full name" required="" name="franchisee_full_name">
						</div>
						
						<div class="form-group">
							<label for="franchisee_mobile">Mobile Number</label>
							<input type="number" class="form-control numberonly" id="email" placeholder="Enter your Mobile Number" name="franchisee_mobile" minlength="10" maxlength="10" required="">
						</div>
						
						<div class="form-group">
							<label for="franchisee_state">State</label>
							<select name="franchisee_state" class="form-control" id="state" required="">
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
							<label for="franchisee_city">City</label>
							<select name="franchisee_city" class="form-control" id="city" required="">
                                 <option value="">Select City</option>
                            </select>
							
							<!--<input type="text" class="form-control" placeholder="Enter the name of your city" required="" name="franchisee_city">-->
						</div>
						
						<div class="form-group">
							<label for="franchisee_pincode">Vacant Pin Codes</label>
							<select name="franchisee_pincode" class="form-control" id="pincode" required="">
                                 <option value="">Select Pincode</option>
                            </select>
							<!--<input type="text" class="form-control"  placeholder="Enter your Area Pin code" required="" name="franchisee_pincode">-->
						</div>					
						
						<div class="form-group">
							<label for="franchisee_address">Address</label>
							<input type="text" class="form-control"  placeholder="Enter your Full Address" required="" name="franchisee_address" onFocus="geolocate()" id="autocomplete">
							
						</div>
						
						<div class="col-12">							
							<input type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="submit">
							<!-- <button type="submit" name="submit" class="btn btn-block btn-primary btn-md">Submit</button> -->
						</div>
					</form>
					
					<section class="site-section" id="next-section">
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-lg-4 item" id="first">
									<a href="images/franchisee-images/work1.jpeg" class="item-wrap fancybox" data-fancybox="gallery2">					
										<span class="icon-search2"></span>
										<img class="img-fluid" src="images/franchisee-images/work1.jpeg" alt="Labour Supply Services">					
									</a>
								</div>
								<div class="col-md-6 col-lg-4 item" id="first">
									<a href="images/franchisee-images/work2.jpeg" class="item-wrap fancybox" data-fancybox="gallery2">
										<span class="icon-search2"></span>
										<img class="img-fluid" src="images/franchisee-images/work2.jpeg" alt="Labour Supply Services">
									</a>
								</div>
								<div class="col-md-6 col-lg-4 item">
									<a href="images/franchisee-images/work3.jpeg" class="item-wrap fancybox" data-fancybox="gallery2">
										<span class="icon-search2"></span>
										<img class="img-fluid" src="images/franchisee-images/work3.jpeg"alt="Labour Supply Services">
									</a>
								</div>
								
							</div>
						</div>
					</section>	
				</div>
			</div>
		</div>
	</section>

<!-- <section class="site-section" id="next-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-4 item" id="first">
				<a href="images/laimages/work2.jpeg" class="item-wrap fancybox" data-fancybox="gallery2">					
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/laimages/work2.jpeg" alt="Labour Supply Services">					
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item" id="first">
				<a href="images/laimages/work1.jpeg" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/laimages/work1.jpeg" alt="Labour Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/laimages/work3.jpeg" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/laimages/work3.jpeg"alt="Labour Supply Services">
				</a>
			</div>
			
		</div>
	</div>
</section>	 -->

<?php include "includes/footer.php" ?>

<script>
$(document).ready(function(){
    
 $('#state').change(function(){
	  var state_id = $('#state').val();
	  if(state_id != '')
	  {
	   $.ajax({
		url:"fetch.php",
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
		url:"fetch.php",
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
