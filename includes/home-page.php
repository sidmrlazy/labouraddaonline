<?php

@$error_msg = $_REQUEST['msg'];
$error_msg = base64_decode($error_msg);
$success_msg = "user already registered for a post and payment has been  successfully completed";
$success_payment = "congratulations ! Now you are a dealer of labouradda you will get a sms on your mobile no.";
if ($success_msg == $error_msg) {
?>
	<script type="text/javascript">
		alert('Already Registered');
		window.location.href = "index";
	</script>
<?php
} elseif ($success_payment == $error_msg) {
?>
	<script type="text/javascript">
		alert('Conratulations ! You have been Registered as Labouradda Dealer , Please download the app');
		window.location.href = "index";
	</script>
<?php
}


?>


<section class="home-section section-hero overlay bg-image" style="background-image: url('images/la-gallery/banner4.jpg');" alt="Karlo Labour, Phone pe!" id="home-section">
	<!-- <video loop controls autoplay muted controlsList="nodownload" id="myVideo">
		<source src="video/home-page/homepage-video.mp4" type="video/mp4" >
	</video> -->
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-12">
				<div class="mb-5 text-center span-la">
					<h1 class="text-white font-weight-bold">Karlo Labour,<span> Phone Pe!</span> </h1>
					<p>ABB DOOR NAHI MAZDOOR</p>
				</div>

				<!-- <form method="post" class="search-jobs-form"> -->
				<div class="row mb-5">
					<!-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4 mb-lg-0">
						<a href="https://play.google.com/store/apps/details?id=in.otaf.labouradda&hl=en" target="_blank"><button type="text" class="form-control form-control-lg btn-la" placeholder="Job title, Company..."> Connect to nearest Mandi</button></a>
					</div>

					<div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4 mb-lg-0">
						<a href="https://play.google.com/store/apps/details?id=com.labouraddadealer"><button type="text" class="form-control form-control-lg btn-la">Become an Online Dealer</button></a>
					</div> -->

					<!-- <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
							<button type="text" class="form-control form-control-lg btn-la" placeholder="Job title, Company...">Become a Thekedaar</button>
						</div> -->

					<!-- <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
							<button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
						</div> -->
				</div>

				<!-- <div class="row">
						<div class="col-md-12 popular-keywords">
						<h3>Trending Keywords:</h3>
							<ul class="keywords list-unstyled m-0 p-0">
								<li><a href="#" class="">UI Designer</a></li>
								<li><a href="#" class="">Python</a></li>
								<li><a href="#" class="">Developer</a></li>
							</ul>
						</div>
					</div> -->
				<!-- </form> -->
			</div>
		</div>
	</div>

	<!-- <a href="#next" class="scroll-button smoothscroll">
		<span class=" icon-keyboard_arrow_down"></span>
	</a> -->
</section>