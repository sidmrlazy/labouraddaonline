<?php 

include "includes/db.php";
include "includes/db.php";
$mobile = $_REQUEST['q'];
$payment_id = $_POST['razorpay_payment_id'];
$payment_amount = $_POST['razorpay_payment_amount'];
$payment_time = date(time());
$query="UPDATE franchisee SET payment_id = '{$payment_id}',payment_status = '1',payment_time = '{$payment_time}',payment_amount = '{$payment_amount}' WHERE franchisee_mobile = '{$franchisee_mobile}'";
$success = mysqli_query($connection,$query);
if(!$success)
{
	echo "Query Failed".mysqli_error($connection);
}
else
{
	"SELECT * from franchisee where franchisee_mobile= '{$franchisee_mobile}' and payment_status='1'";
	$resultset = mysqli_query($connection,"SELECT * from franchisee where franchisee_mobile= '{$franchisee_mobile}' and payment_status='1'");
	if($rowset = mysqli_fetch_assoc($resultset))
	{
		$franchisee_full_name = $rowset['franchisee_full_name'];
		$franchisee_category = $rowset['franchisee_category'];
        $franchisee_mobile = $rowset['franchisee_mobile'];
		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-F-Y');
		$msg = "Thank you ".strtoupper($franchisee_full_name) .", for your payment of Rs 999, for registering as ". strtoupper($franchisee_category) ." with Labouradda on ".$date.". We will be starting our services from 1st June 2020. For any queries please contact our helpline number 8545002000";
	}
	// sms api start to send congratulations
			  $curl = curl_init();
              curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?authkey=240434AJDFeUGV5f6883cbP1&mobiles=$mobile&country=91&message=".$msg."&sender=LABADA&route=4",
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
              if ($err) {
                echo "cURL Error #:" . $err;
              }  

	// sms api end
              $msg_susccess = base64_encode("Conratulations ! You have been registered as an authorized Labouradda Franchisee. We will be sending you leads of customer as soon as the lockdown is over.");
	header("Location:index?msg=$msg_susccess");
}

?> 