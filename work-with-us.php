<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
<?php //include "popup_form.php" ?>

<?php
    $query = "SELECT * FROM state";
    $result = mysqli_query($connection,$query);
?>


<!-- Top Navigation Backgorund Image -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('images/la-gallery/banner3.jpeg');" id="home-section">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<!--<h1 class="text-white font-weight-bold">Work with us</h1>-->

				<div class="custom-breadcrumbs">
					<a href="index">Home</a> <span class="mx-2 slash">/</span>
					<!--<a href="#">Job</a> <span class="mx-2 slash">/</span>-->
					<span class="text-white"><strong>Work with us</strong></span>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
@$error_password = $_REQUEST['error'];
$error_msg = base64_decode($error_password);
$error_confirm = "Password does not match with Confirm Password ! Refill Form";
if($error_confirm==$error_msg)
{
?>
	<div class="row" align="center">
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
                <strong>Warning !</strong> User Already Registered!
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
?>


	<!-- Left side Image and Content Start -->
	


	<!-- Left side Image and Content End -->

	<!-- ==================anupam updated start===========> -->

	<section class="site-section col-md-12" id="next-section" style="background-image: url(images/la-background/bg1.png); ">

		<div class="container">
			<div class="row">
				<div class="col-md-5 item" id="first">
					<img src="images/la-background/vector1.png" class="img-fluid" alt="" style="width: 55%;">

					<h1 style="margin-top: 8%; font-size: 16px; color: #000000; font-weight: bolder;">WHO</h1>
					<p style="color: #000000;">Labour Contractors, Thekedaars (big/small/local/regional), anyone associated with the Labour Mandi, Labourers (Skilled/Semi-Skilled/Unskilled)</p>

					<h1 style="font-weight: bolder; margin-top: 10%; font-size: 16px; color: #000000;">WHY</h1>
					<p style="color: #000000;">Efficient, gives you access to more consumers,<strong> Digital Process: ensures physical distancing and safety. </strong>Better and defined employment for Labourers under you. Platform to get more contracts and build a 'Contractor' Community.</p>

					<h1 style="font-weight: bolder; margin-top: 10%; font-size: 16px; color: #000000;">HOW</h1>
					<p style="color: #000000;">Fill our E-Form, provide your details to create an account. Pay the registration charges & start getting leads of employment for yourself</p>
				</div>

				<div class="col-lg-7">
                    <?php
                  @$msg=$_REQUEST['msg'];
                    if($msg)
                    {
                    ?>
<!--                    <div id="alreadyregister">-->
<!--                        <strong style="color:red; text-align:center; font-weight: bolder;">-->
<!--                            --><?php // $msg=$_REQUEST['msg'];
//                            echo $msg;
//                            ?>
<!--                        </strong>-->
<!--                    </div>-->
                <?php } ?>
				<!-- PHP Code to input form data Start -->
				<?php
			if (isset($_POST['submit'])) {

                $dealer_fullname = $_POST['dealer_fullname'];
                $dealer_mobile = $_POST['dealer_mobile'];
                $dealer_state = $_POST['dealer_state'];
                $dealer_city = $_POST['dealer_city'];
                $dealer_pincode = $_POST['dealer_pincode'];
                date_default_timezone_set("Asia/Kolkata");
                $dd = date("d-m-Y H:i:s");
                $date = strtotime($dd);

                $query = "INSERT INTO dealer_web (dealer_fullname,dealer_mobile,dealer_state,dealer_city,dealer_pincode,dealer_request_date) VALUES('$dealer_fullname','$dealer_mobile','$dealer_state','$dealer_city','$dealer_pincode','$date')";
                $query_copmlete_payment = "SELECT * from dealer_web where dealer_mobile = '$dealer_mobile'";
                $result = mysqli_query($connection,$query_copmlete_payment);
                if(mysqli_num_rows($result)>0)
                {
                    $errormsg =  base64_encode("User Already Registered!");
                    header("Location:work-with-us?msg=$errormsg");
//                    echo "<script>alert('User Already Registered!');window.location='work-with-us';</script>";

                }
                else
                {
                    $new_dealer_request = mysqli_query($connection, $query);
                      if($new_dealer_request)
                        {
                            $msg="Thank you for showing interest, We will contact you shortly. For any queries, please contact 8545002000";

                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=LABADA&route=4&mobiles=$dealer_mobile&authkey=240434AJDFeUGV5f6883cbP1&message=$msg&unicode=1&route=4",
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
                    header("Location:work-with-us-search-user?msg=$errormsg");
//                    echo "<script>alert('Thank you! Registration Complete!');window.location='work-with-us-search-user';</script>";
}
                }
            }
			?>
			<!-- PHP Code to input form data End -->

		<form class="p-4 p-md-5 border rounded la-p" action="" method="post" style=" background-color: #fff;">
			<!-- 1st Section Start -->													
					<div class="container">
						<div class="row">																		
							<div class="form-group col-lg-12" >
								<label for="dealer_fullname" style="font-size: 10px;">Full Name</label>
								<input type="text" class="form-control" id="job-title" required="" name="dealer_fullname">
							</div>
							
							<div class="form-group col-lg-12">
								<label for="dealer_mobile" style="font-size: 10px;">Mobile Number</label>
								<input type="text" class="form-control numberonly" id="email" name="dealer_mobile" minlength="10" maxlength="10" pattern="[6789][0-9]{9}">
							</div>
	                    
	                        <div class="form-group col-lg-6">
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
							
							<div class="form-group col-lg-6">
								<label for="dealer_city" style="font-size: 10px;">City</label>
								<select name="dealer_city" class="form-control" id="city" required="">
	                                 <option value="">Select City</option>
	                            </select>
							</div>
							
	                        <div class="form-group col-lg-12">
								<label for="dealer_pincode" style="font-size: 10px;">Pin Code</label>
								<select name="dealer_pincode" class="form-control" id="pincode" required="">
	                                 <option value="">Select Pincode</option>
	                            </select>
							</div>			                        
								
							<!-- 1st Section End -->
							
							<!-- 3rd Section Start -->									
								<div class="form-group col-lg-12">											
									<span style="font-size: 12px;">By clicking on submit you 'Agree' to the <a href="tnc" target="_blank">Terms & Conditions</a></span>
									<input type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="submit" >		
								</div>									

								<div class="form-group col-lg-12">
									<a href="work-with-us-search-user" style="color: #e30202; font-weight: bolder;">Click here to complete your E-Registration</a>
								</div>
							<!-- 3rd Section Ends -->
						</div>
					</div>
				</form>
					</div>
				</div>
			</div>
		</section>
	<!-- ==================anupam updated end===========> -->

<!-- Features Start -->
<section class="site-section pb-0">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 ml-auto la-content-about">
				<h2 class="section-title mb-3" style="font-size: 30px">Features</h2>
			</div>
		</div>
	</div>
</section>


<section class="site-section" id="next-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-4 item" id="first">
				<a href="images/dealerFeatures/1.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/dealerFeatures/1.png" alt="Labour Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/dealerFeatures/2.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/dealerFeatures/2.png"alt="Labour Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/dealerFeatures/3.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/dealerFeatures/3.png" alt="Labour Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/dealerFeatures/4.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/dealerFeatures/4.png" alt="Semi Skilled Manpower Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/dealerFeatures/5.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/dealerFeatures/5.png" alt="Semi Skilled Manpower Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/dealerFeatures/6.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/dealerFeatures/6.png" alt="Semi Skilled Manpower Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/dealerFeatures/7.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/dealerFeatures/7.png" alt="Semi Skilled Manpower Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/dealerFeatures/8.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/dealerFeatures/8.png" alt="Semi Skilled Manpower Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/dealerFeatures/9.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/dealerFeatures/9.png" alt="Semi Skilled Manpower Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/dealerFeatures/10.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/dealerFeatures/10.png" alt="Skilled Labour Service">
				</a>
			</div>
			<!-- <div class="col-md-6 col-lg-4 item">
				<a href="images/sq_img_12.jpg" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/sq_img_12.jpg">
				</a>
			</div> -->
		</div>
	</div>
</section>
<!-- Feature End -->



<?php include "includes/footer.php";?>



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
</script>

<script>

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
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKwyqrGsG1Stuy5UpUBoldcWEtAIeJMOU&libraries=places&callback=initAutocomplete"></script>
