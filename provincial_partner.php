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
					<span class="text-white"><strong>Super Franchisee</strong></span>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Provincial Partner registration form -->


<?php
@$error_password = $_REQUEST['msg'];
$error_msg = base64_decode($error_password);
$error_confirm = "User Already Registered!";
if($error_confirm==$error_msg)
{
    ?>
    <div class="row" align="center">
        <div style="width: 80%;margin-left: 10%;">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Warning !</strong> Mobile Number Already Exist!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php
}
elseif($error_msg==12)
{
    ?>
    <div class="row" align="center">
        <div style="width: 80%;margin-left: 10%;">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Warning !</strong>  User already registered. Payment successfully completed!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php

}
elseif($error_msg==10)
{
    ?>
    <div class="row" align="center">
        <div style="width: 80%;margin-left: 10%;">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Warning !</strong> Registration Failed<!doctype html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport"
                          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <title>Document</title>
                </head>
                <body>

                </body>
                </html>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php
}
?>


	<!-- ===================anupam verma start======================= -->
	<section class="site-section col-md-12" style="background-image: url(images/la-background/bg1.png); ">
		<!-- <div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<p>Become an Labouradda Provincial Partner for your State as we strive to create Smart Connectivity between <br> Labourers/ Mistri and Consumers</p>
				</div>
				<div class="col-md-2"></div>

			</div> -->
		<div class="container">
			
			<div class="row">
				<div class="col-md-5 item" id="first">
					<img src="images/la-background/vector2.png" class="img-fluid" alt="" style="width: 55%;">

					<h1 style="margin-top: 8%; font-size: 16px; color: #000000; font-weight: bolder;">WHO</h1>
					<p style="color: #000000;">Labour Contractors, Thekedaars (big/small/local/regional), anyone associated with the Labour Mandi, Labourers (Skilled/Semi-Skilled/Unskilled)</p>

					<h1 style="font-weight: bolder; margin-top: 10%; font-size: 16px; color: #000000;">WHY</h1>
					<p style="color: #000000;">Efficient, gives you access to more consumers,<strong> Digital Process: ensures physical distancing and safety. </strong>Better and defined employment for Labourers under you. Platform to get more contracts and build a 'Contractor' Community.</p>

					<h1 style="font-weight: bolder; margin-top: 10%; font-size: 16px; color: #000000;">HOW</h1>
					<p style="color: #000000;">Fill our E-Form, provide your details to create an account. Pay the registration charges & start getting leads of employment for yourself</p>
				</div>

				<div class="col-lg-7">
				<!-- PHP Code to input form data Start -->
			<?php
				if (isset($_POST['submit'])) {

                    //	$category = $_POST['category'];
                    //	$company_name = $_POST['company_name'];
                    //	$gstin_status = $_POST['gstin_status'];
                    //	$gstin_number = $_POST['gstin_number'];
                    $users_name = $_POST['users_name'];
                    $users_mobile = $_POST['users_mobile'];
                    $users_state = $_POST['users_state'];
                    $users_city = $_POST['users_city'];
                    $pincode= implode(', ', $_POST['users_pincode']);
                    $users_pincode=$pincode;
                    //	$users_address = $_POST['users_address'];
                    $request_date = date("Y-m-d H:i:s");
                    //	$password = $_POST['password'];
                    $users_type = 9;

                    //$query = "INSERT INTO users(category,company_name,gstin_status,gstin_number,users_name,users_mobile,users_state,users_city,users_password,users_address,users_password,user_created_time,users_type)";
                    //$query = "INSERT INTO users(users_name,users_mobile,users_state,users_city,users_zipcode,user_created_time,users_type)";

                    //		$query .= " VALUE('{$category}', '{$company_name}', '{$gstin_status}', '{$gstin_number}', '{$users_name}', '{$users_mobile}', '{$users_state}', '{$users_city}', '{$users_pincode}', '{$users_address}','{$users_password}','{$users_create_time}','{$users_type}')";
                    //	$query .= " VALUE('{$users_name}', '{$users_mobile}', '{$users_state}', '{$users_city}', '{$users_pincode}','{$users_create_time}','{$users_type}')";
                    $query_copmlete_payment = "SELECT * from users where users_mobile = '$users_mobile' AND users_type='$users_type' ";
                    $result = mysqli_query($connection,$query_copmlete_payment);
                    if(mysqli_num_rows($result)>0)
                    {
                        $errormsg = base64_encode("User Already Registered!");
                        header("Location:provincial_partner?msg=$errormsg");
                    }else{
                        $query1="insert into users(users_name,users_mobile,users_state,users_city,users_zipcode,users_created_time,users_type) values('$users_name','$users_mobile','$users_state','$users_city','$users_pincode','$request_date','$users_type')";
                        $q=mysqli_query($connection,$query1);
                        if($q)
                        {
                            $update = "UPDATE city SET assign_status='1' WHERE city_id='$users_city' ";
                            $sss = mysqli_query($connection,$update);
                            
                            $msg="Thank you for showing interest, We will contact you shortly. For any queries, please contact 8545002000";

                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=LABADA&route=4&mobiles=$users_mobile&authkey=240434AJDFeUGV5f6883cbP1&message=$msg&unicode=1&route=4",
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
                            $errormsg =  base64_encode("Thank you! Registration Complete!");
                            header("Location:provincial_search_user?msg=$errormsg");
//                            echo "<script>alert('Registration Successfully Complete!');window.loaction.href='provincial_search_user';</script>";

                        }

                        else {
                            die('QUERY FAILED' . mysqli_error($connection));
                            //echo "<script>alert('Registration Successfully Complete!');window.loaction.href='provincial_partner';</script>";
                        }

                    }
				}
				?>


				<!-- PHP Code to input form data End -->

				<form class="p-4 p-md-5 border rounded la-p" action="" method="post" style="background-color: #fff;">
					<!-- 1st Section Start -->
<!--							<div class="container">-->
								<div class="row">

									<div class="form-group col-lg-12">
										<label for="users_name" style="font-size: 12px">Full Name</label>
							<input type="text" class="form-control" id="job-title" placeholder="Enter your full name" required="" name="users_name">
									</div>
									<!-- 1st Section End -->

									<!-- 2nd Section Start -->

				                        <div class="form-group col-lg-12">
											<label for="users_mobile" style="font-size: 12px">Mobile Number</label>
							<input type="text" pattern="[6789][0-9]{9}" size="10" class="form-control numberonly" id="users_mobile" placeholder="Enter your Mobile Number" name="users_mobile" maxlength="10" minlength="10" required="">
										</div>

				                        <div class="form-group col-lg-6">
											<label for="users_state" style="font-size: 12px">State</label>
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


										</div>

										<div class="form-group col-lg-6">
											<label for="users_city" style="font-size: 12px">City</label>
							<select name="users_city" class="form-control js-example-basic-single" id="city" required="">
                                 <option value="">Select City</option>
                            </select>
										</div>

										<div class="form-group col-lg-6  d-none">
											<label for="users_pincode[]" style="font-size: 12px">Pin Code</label>
							<select name="users_pincode[]" class="form-control js-example-basic-multiple" id="pincode" required="" multiple>
                                 <option value="">Select Pincode</option>
                            </select>
										</div>



                                    <div class="form-group col-lg-12">
                                        <span style="font-size: 12px;">By clicking on submit you 'Agree' to the <a href="tnc" target="_blank">Terms & Conditions</a></span>
                                        <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="submit" >
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <a href="provincial_search_user" style="color: #e30202; font-weight: bolder;">Click here to complete your E-Registration</a>
                                    </div>

									<!-- 3rd Section Ends -->
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	<!-- ===================anupam verma stop======================= -->


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


