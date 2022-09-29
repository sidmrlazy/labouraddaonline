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
				<div class="custom-breadcrumbs">
					<a href="index">Home</a> <span class="mx-2 slash">/</span>
					<span class="text-white"><strong>Franchisee Opportunity</strong></span>
				</div>
			</div>
		</div>
	</div>
</section>
<!--------------- Form Franchisee -------------------->
<section class="site-section col-md-12" style="background-image: url(images/la-background/bg1.png); ">
	<div class="container">
		<div class="row" >

			<!-- Left Side Image and Content Start -->
			<div class="col-md-6 item" id="first">								
				<img src="images/la-background/vector2.png" class="img-fluid" alt="" style="width: 55%;">

				<h1 style="margin-top: 8%; font-size: 16px; color: #000000; font-weight: bolder;">कौन</h1>
				<p style="color: #000000;">लघु/ छोटा उद्योग या मध्यम व्यवसाय या बिल्डर या ठेकेदार या उद्यमी वाला व्यक्ति </p>

				<h1 style="font-weight: bolder; margin-top: 10%; font-size: 16px; color: #000000;">क्यूं?</h1>
				<p style="color: #000000;">डिजिटल प्रक्रिया: अपने क्षेत्र से उपभोक्ता प्राप्त करना शुरू करें और असंगठित क्षेत्र के समाज को रोजगार देना शुरू करें</p>

				<h1 style="font-weight: bolder; margin-top: 10%; font-size: 16px; color: #000000;">लाभ</h1>
				
				    <ul style="color: #000000; ">
				        <li>नज़दीजी ग्राहक को फ़ोन के माध्यम से घर बैठे नज़दीकी ठेकेदारों से संपर्क करवाए</li>
				        <li>ठेकेदारों और लेबर को काम दे और उनके मासिक शुल्क जमा करने पे पाए आकर्षक प्रतिशत (नियम व शर्ते लागू )संपर्क करवाए</li>
				        <li>अपने सारे एरिया का अधिकृत काम करें</li>
				        <li>अपने एरिया की डिमांड और सप्लाई का काम देखे</li>
				    </ul>
				
			</div>
			<!-- Left Side Image and Content End -->

			<!-- Form Start -->
			<div class="col-md-6">
			   <form action="franchisee_save.php" method="post" class="p-4 p-md-5 border rounded la-p" style="background-color: #fff;">
			   	<div class="container">
			   		<div class="row">
			   			<div class="form-group col-lg-6">
							<label for="franchisee_category" style="font-size: 12px">Firm Type</label>
							<select class="form-control" data-width="100%" required="" data-live-search="true" title="Select Your Category" name="franchisee_category" id="franchisee_category">
								<option value="" >Select Firm Type</option>
								<option value="Individual">Individual</option>
								<option value="Proprietorship Company">Proprietorship Company </option>								
								<option value="Private Limited">Private Limited</option>								
								<option value="Public Limited">Public Limited</option>								
							</select>
						</div>
						<div class="form-group col-lg-6">
						    <label for="job-title" style="font-size: 12px">Firm Name</label>
							<input type="text" class="form-control" id="job-title" placeholder="Please Enter the name of your company (if any)" name="franchisee_company_name" >
						</div>
						<div class="form-group col-lg-6">
						    <label for="gstin-status" style="font-size: 12px">GST Status(Yes/No)</label>
							<select class="form-control"  id="gstin-status" required="" name="franchisee_gstin_status">
								<option value=""  >Select Status</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>															
							</select>
						</div>
						<div class="form-group col-lg-6">
						    <label for="gstin-number" style="font-size: 10px">GSTIN Number (If Applicable)</label>
							<input type="text" class="form-control" id="gstin-number"  name="franchisee_gstin_number" placeholder="Enter GSTIN Number "/>
						</div>
						<div class="form-group col-lg-6" >
						    <label for="name" style="font-size: 12px">Full Name</label>
							<input type="text" class="form-control" id="name" required="" name="franchisee_full_name" placeholder="Enter Your Full Name"/>
						</div>
						<div class="form-group col-lg-6">
						    <label for="mobile" style="font-size: 12px">Mobile Number</label>
							<input type="text" class="form-control numberonly" id="mobile" required="" name="franchisee_mobile" placeholder="Enter Your Mobile Number" maxlength="10" minlength="10" />
						</div>
						<div class="form-group col-lg-6">
						    <label for="franchisee_state" style="font-size: 12px">State</label>
							<select name="franchisee_state" class="form-control" id="state" required="">
		                        <option value="" >Select State</option>
		                         <?php 
								if($result->num_rows > 0){ 
				  				    while($row = $result->fetch_assoc()){  
										echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>'; 
									} } else { 
										echo '<option value="">State not available</option>'; 
									} ?>
		                    </select>
						</div>
						<div class="form-group col-lg-6">
							<label for="city" style="font-size: 12px">City</label>
							<select name="franchisee_city" class="form-control" id="city" required="">
		                        <option value="">Select City</option>
		                    </select>
						</div>
						<div class="form-group col-lg-6">
							<label for="pincode" style="font-size: 12px">Pincode</label>
							<select name="franchisee_pincode" class="form-control" id="pincode" required="">
		                        <option value="" >Select Pincode</option>
		                    </select>
						</div>
						<div class="form-group col-lg-6">
							<label for="franchisee_address" style="font-size: 12px">Address</label>
							<input type="text" class="form-control"  placeholder="Enter your Full Address" required="" name="franchisee_address" onFocus="geolocate()" id="autocomplete">		
						</div>
						<div class="form-group d-none col-lg-6">
						   <label for="password" style="font-size: 12px">Password</label>
						   <input type="text" class="form-control" required="" value="123456" name="franchisee_password"/>
						</div>
								
						<div class="col-12 mt-2">
							<span style="font-size: 12px;">By clicking on submit you 'Agree' to the <a href="tnc" target="_blank">Terms & Conditions</a></span>
						    <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="submit">
						</div>
					</div>
				</div>
			</form>
		</div>
		<!-- Form End -->
	</div>
</div>
</section>

<!--------------- TOP SECTION END ------------------->


<!--------------- FEATURES START ------------------->
<!-- Features Start -->
<section class="site-section pb-0" style="margin-bottom: -50px;">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 ml-auto la-content-about">
				<h2 class="section-title mb-3" style="font-size: 30px">विशेषताएं</h2>
			</div>
		</div>
	</div>
</section>

<!-- <section class="site-section">
	<div class="container">		
		<div class="col-lg-12">
			<img style="width:100%;" src="images/la-background/vectorbg2.png" data-thumb-id="buttons" alt="">
		</div>		
	</div>
</section> -->

<!--<section class="site-section" id="next-section">
	<div class="container">
		<div class="row">						
			<div class="col-md-6 col-lg-4 item" id="first">
				<a href="images/franchiseeFeatures/1.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/franchiseeFeatures/1.png" alt="Labour Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/franchiseeFeatures/2.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/franchiseeFeatures/2.png"alt="Labour Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/franchiseeFeatures/3.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/franchiseeFeatures/3.png" alt="Labour Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/franchiseeFeatures/4.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/franchiseeFeatures/4.png" alt="Semi Skilled Manpower Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/franchiseeFeatures/5.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/franchiseeFeatures/5.png" alt="Semi Skilled Manpower Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/franchiseeFeatures/6.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/franchiseeFeatures/6.png" alt="Semi Skilled Manpower Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/franchiseeFeatures/7.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/franchiseeFeatures/7.png" alt="Semi Skilled Manpower Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/franchiseeFeatures/8.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/franchiseeFeatures/8.png" alt="Semi Skilled Manpower Supply Services">
				</a>
			</div>
			<div class="col-md-6 col-lg-4 item">
				<a href="images/franchiseeFeatures/9.5.png" class="item-wrap fancybox" data-fancybox="gallery2">
					<span class="icon-search2"></span>
					<img class="img-fluid" src="images/franchiseeFeatures/9.png" alt="Semi Skilled Manpower Supply Services">
				</a>
			</div>			
		</div>
	</div>
</section>-->

<section class="site-section" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul style="color: #000000;">
                    <li>अपने पिनकोड के लिए लीड प्राप्त करने के लिए आवेदन करें</li>
                    <li>पंजीकरण प्रक्रिया पूरी तरह से डिजिटल है जिससे आपको बाहर जाने या लाइनों में खड़े होने की आवश्यकता नहीं है।</li>
                    <li>आपके सफल पंजीकरण पर आपको ऐप अलर्ट / एसएमएस / कॉल के माध्यम से नौकरी मिलनी शुरू हो जाएगी।</li>
                    <li>लेबरअड्डा आपको एक अवसर प्रदान करता है, अपनी पहुंच का विस्तार अपने स्वयं के लिए करें, मंडियों के आसपास चलने के बिना अधिक व्यापारिक सौदे प्राप्त करें।</li>
                    <li> नियमित मासिक न्यूनतम रिचार्ज का भुगतान करते रहें और बिना किसी रुकावट के नियमित लीड अपने पंजीकृत ठेकेदार को देते रहें।</li>
                    <li>न्यूनतम भुगतान न होने पे आपकी आई डी बंद हो जाएगी अथवा आपको लीड देने की सुविधा रोक दी जाएगी ।</li>
                    <li> न्यूनतम रिचार्ज पे कोई भी टैक्स या धनराशि की कोई भी वापसी नहीं होगी </li>
                    <li>लोगो से दूरी बनाये और घर बैठे काम पाए #physicaldistancing  व्यापार के अवसर प्राप्त करने में आपकी मदद करने के लिए उपयुक्त है</li>
                    <li>अपने पंजीकृत खाते को सक्रिय करने के लिए आपके पास आपके द्वारा पंजीकृत प्रत्येक श्रेणी के लिए ठेकदार एवं लेबर्स होने चाहिए।</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Feature End -->
<!--------------- FEATURES END ------------------->

<!--------------- Footer ------------------->
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
