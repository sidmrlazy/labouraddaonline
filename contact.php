<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php"; 
$postData = $statusMsg = ''; 
$sitekey='6Lf7MP8ZAAAAAMQ6GLBkNbyhHhb29MClDnQu8iX4';
$secretkey='6Lf7MP8ZAAAAABPkeKDx8-abEu77XOFppawWMupj';
?>

<section class="section-hero overlay inner-page bg-image" style="background-image: url('images/la-gallery/banner3.jpeg');" id="home-section" >
	<div class="container">
		<div class="row">
 			<div class="col-md-7">
				<h1 class="text-white font-weight-bold">Contact Us</h1>
				<div class="custom-breadcrumbs">
					<a href="index.php">Home</a> <span class="mx-2 slash">/</span>
					<span class="text-white"><strong>Contact Us</strong></span>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
if (isset($_POST['submit'])) {
    
    
      if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
            // Google reCAPTCHA API secret key 
            
             
            // Verify the reCAPTCHA response 
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
             
            // Decode json data 
            $responseData = json_decode($verifyResponse); 
             
            // If reCAPTCHA response is valid 
            if($responseData->success){ 
    
$contact_first_name = $_POST['contact_first_name'];
$contact_last_name = $_POST['contact_last_name'];
$contact_email = $_POST['contact_email'];
$contact_mobile = $_POST['contact_mobile'];		
$contact_subject = $_POST['contact_subject'];
$contact_message = $_POST['contact_message'];
$contact_date = date('d-m-y');


$query = "INSERT INTO contact_web(contact_first_name, contact_last_name, contact_email, contact_mobile, contact_subject, contact_message, contact_date) ";
$query .= " VALUE('{$contact_first_name}', '{$contact_last_name}', '{$contact_email}', '{$contact_mobile}', '{$contact_subject}', '{$contact_message}', now() )";


 if($contact_mobile)
{
       $new_contact_query = mysqli_query($connection, $query); 
    $firstname=ucfirst($contact_first_name);
    $msg="URGENT REVERT REQUIRED: Name-$firstname $contact_last_name Mobile-$contact_mobile Subject- $contact_subject Contacted On the website. Please revert urgent";
    
    $mobilenumber=array('one'=>'7355410185','two'=>'9936700209','three'=>'9727545445','four'=>'8545002000','five'=>'8808808888','six'=>'7390081133','seven'=>'7237062222');
        // $mobilenumber=array('one'=>'9628960183');
        
    foreach($mobilenumber as $all_mobile)
   {
         $curl = curl_init();
         curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=LABADA&route=4&mobiles=$all_mobile&authkey=240434AJDFeUGV5f6883cbP1&message=$msg&unicode=1&route=4",
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

  }
    
    if (!$new_contact_query) {
    die('QUERY FAILED' . mysqli_error($connection));
     }

}


}
else{ 
     $statusMsg = 'Robot verification failed, please try again.'; 
    } 
}
else{ 
    $statusMsg = 'Please check on the reCAPTCHA box.'; 
    }


}
?>

<section class="site-section" id="next-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 mb-5 mb-lg-0">
			    <?php if(!empty($statusMsg)){ ?>
                 <p class="status-msg" style="color:red;"><?php echo $statusMsg; ?></p>
                <?php } ?>

				<form action="" method="post" class="">
					<div class="row form-group">
						<div class="col-md-6 mb-3 mb-md-0">
							<label class="text-black" for="contact_first_name">First Name</label>
							<input type="text"  class="form-control" name="contact_first_name" required>
						</div>
					
					<div class="col-md-6">
						<label class="text-black" for="contact_last_name">Last Name</label>
						<input type="text"  class="form-control" name="contact_last_name">
					</div>
					</div>
					
					<div class="row form-group">
						<div class="col-md-12">
							<label class="text-black" for="contact_email">Email</label>
							<input type="email" id="email" class="form-control" name="contact_email" required>
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12">
							<label class="text-black" for="contact_mobile">Contact Number</label>
							<input type="text" class="form-control" name="contact_mobile" pattern="[6789][0-9]{9}" required > 
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12">
							<label class="text-black" for="contact_subject">Subject</label>
							<input type="subject" id="subject" class="form-control" name="contact_subject" required>
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12">
							<label class="text-black" for="contact_message">Message</label>
							<textarea id="message" cols="30" rows="7" class="form-control" placeholder="Tell us your requirement" name="contact_message" required></textarea>
						</div>
					</div>
					
					<div class="g-recaptcha" data-sitekey="<?php echo $sitekey;?>"></div>

					<div class="row form-group">
						<div class="col-md-12">
							<input type="submit" name="submit" class="btn btn-primary btn-md text-white">
						</div>
					</div>
				</form>
			</div>

			<!-- <div class="col-lg-5 ml-auto">
				<div class="p-4 mb-3 bg-white">
					<p class="mb-0 font-weight-bold">Address</p>
					<p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>
					<p class="mb-0 font-weight-bold">Phone</p>
					<p class="mb-4"><a href="#">+1 232 3235 324</a></p>
					<p class="mb-0 font-weight-bold">Email Address</p>
					<p class="mb-0"><a href="#"><span class="__cf_email__" data-cfemail="b6cfd9c3c4d3dbd7dfdaf6d2d9dbd7dfd898d5d9db">[email&#160;protected]</span></a></p>
				</div>
			</div> -->
		</div>
	</div>
</section>

<!-- <section class="site-section bg-light">
<div class="container">
<div class="row mb-5">
<div class="col-12 text-center" data-aos="fade">
<h2 class="section-title mb-3">Happy Candidates Says</h2>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="block__87154 bg-white rounded">
<blockquote>
<p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
</blockquote>
<div class="block__91147 d-flex align-items-center">
<figure class="mr-4"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
<div>
<h3>Elisabeth Smith</h3>
<span class="position">Creative Director</span>
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="block__87154 bg-white rounded">
<blockquote>
<p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
</blockquote>
<div class="block__91147 d-flex align-items-center">
<figure class="mr-4"><img src="images/person_2.jpg" alt="Image" class="img-fluid"></figure>
<div>
<h3>Chris Peter</h3>
<span class="position">Web Designer</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section> -->

<?php include "includes/footer.php" ?>

