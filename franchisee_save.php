<?php
  include "includes/db.php";
  
  $firm_type = $_POST['franchisee_category'];
  $firm_name = $_POST['franchisee_company_name'];
  $gstin_status = $_POST['franchisee_gstin_status'];
  $gstin_number = $_POST['franchisee_gstin_number'];
  $full_name = $_POST['franchisee_full_name'];
  $mobile = $_POST['franchisee_mobile'];
  $state = $_POST['franchisee_state'];
  $city = $_POST['franchisee_city'];
  $pincode = $_POST['franchisee_pincode'];
  $address = $_POST['franchisee_address'];
  $password = $_POST['franchisee_password'];
  $date = date('d-m-Y');
  
  $search="SELECT * FROM franchisee WHERE franchisee_mobile='".$mobile."' ";
  $confirm=mysqli_query($connection,$search);
  if(mysqli_num_rows($confirm)>0){
	  echo "<script>alert('Mobile Number Already Exist!');window.location.href='franchisee-opportunity.php';</script>";
  } else {
	  $insert="INSERT INTO franchisee (franchisee_category,franchisee_company_name,franchisee_gstin_status,	franchisee_gstin_number,franchisee_full_name,franchisee_mobile,	franchisee_state,franchisee_city,	franchisee_pincode,franchisee_address,franchisee_date,franchisee_password,franchisee_confirm_password) VALUES('$firm_type','$firm_name','$gstin_status','$gstin_number','$full_name','$mobile','$state','$city','$pincode','$address','$date','$password','$password')";
	  if($connection->query($insert)==TRUE){
		  session_start();
		  $_SESSION['mobile']=$mobile;
		  $update="UPDATE `PinCode` SET assign_status='1' WHERE Pincode='$pincode' ";
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
		  if($connection->query($update)==TRUE){
		  echo "<script>alert('Registration Successful!');window.location.href='payment_screen2.php';</script>";
		  }
	  } else {
		echo "<script>alert('Registration Failed!');window.location.href='franchisee-opportunity.php';</script>";  
	  }
  }
?>