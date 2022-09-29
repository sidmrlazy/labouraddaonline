<?php 

include "includes/db.php";
$dealer_mobile = $_REQUEST['q'];
$payment_id = $_POST['razorpay_payment_id'];
$payment_time = date(time());
$query="UPDATE dealer_web set payment_id = '{$payment_id}',payment_status = '1',payment_time = '{$payment_time}',wallet_amount='299' where dealer_mobile = '{$dealer_mobile}'";
$success = mysqli_query($connection,$query);
if(!$success)
{
	echo "Query Failed".mysqli_error($connection);
}
else
{
	"SELECT * from dealer_web where dealer_mobile= '{$dealer_mobile}' and payment_status='1'";
	$resultset = mysqli_query($connection,"SELECT * from dealer_web where dealer_mobile= '{$dealer_mobile}' and payment_status='1'");
	if($rowset = mysqli_fetch_assoc($resultset))
	{
		$dealer_id = $rowset['dealer_id'];
		$dealer_fullname = $rowset['dealer_fullname'];
		$dealer_fullname = $rowset['dealer_fullname'];
		$dealer_category = $rowset['dealer_category'];
        $dealer_mobile = $rowset['dealer_mobile'];
        $dealer_pincode =  $rowset['dealer_pincode'];
        $dealer_city =  $rowset['dealer_city'];
		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-F-Y');
		$fran ="Select * FROM `franchisee` WHERE franchisee_pincode LIKE '%$dealer_pincode%' AND payment_status='1' ";
		$cityfran ="Select * FROM `users` WHERE users_city='$dealer_city' AND payment_status='1' ";
		$fran1 = mysqli_query($connection,$fran);
		$cityfran1 = mysqli_query($connection,$cityfran);
		$rows = mysqli_fetch_array($fran1,MYSQLI_BOTH);
		$rowss = mysqli_fetch_array($cityfran1,MYSQLI_BOTH);
		if($rows){
	        $franchisee_mobile = $rows['franchisee_mobile'];
	        $msg = "Thank you ".strtoupper($dealer_fullname) .", for your payment of Rs 299, for registering as ". strtoupper($dealer_category) ." with Labouradda on ".$date.". For any queries please contact our helpline number $franchisee_mobile";
	    } elseif($rowss){
	        $users_mobile = $rowss['users_mobile'];
	        $msg = "Thank you ".strtoupper($dealer_fullname) .", for your payment of Rs 299, for registering as ". strtoupper($dealer_category) ." with Labouradda on ".$date.". For any queries please contact our helpline number $users_mobile";
	    } else {
	    	$msg = "Thank you ".strtoupper($dealer_fullname) .", for your payment of Rs 299, for registering as ". strtoupper($dealer_category) ." with Labouradda on ".$date.". For any queries please contact our helpline number 8545002000";
	    }
	    
	    $query1="INSERT INTO `Transaction`(`user_id`, `payment_id`, `payment_time`, `payment_amount`, `transaction_detail`, `payment_status`) VALUES ('D$dealer_id','$payment_id','$payment_time','299','Monthly Membership Fees','1')";
        $transa = mysqli_query($connection,$query1);
	}
	// sms api start to send congratulations
					$curl = curl_init();
              curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?authkey=240434AJDFeUGV5f6883cbP1&mobiles=$dealer_mobile&country=91&message=".$msg."&sender=LABADA&route=4",
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
              $msg_susccess = base64_encode("Conratulations ! You have been registered as an authorized Labouradda Dealer. We will be sending you leads of customer as soon as the lockdown is over.");
	header("Location:index?msg=$msg_susccess");
}

?>