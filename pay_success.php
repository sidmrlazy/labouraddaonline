<?php

include "includes/db.php";
$franchisee_mobile = $_REQUEST['q'];
$payment_id = $_POST['razorpay_payment_id'];
$payment_time = date(time());
$query="UPDATE franchisee SET payment_id = '{$payment_id}',payment_status = '1',payment_time = '{$payment_time}' where franchisee_mobile = '{$franchisee_mobile}'";
$success = mysqli_query($connection,$query);
if(!$success)
{
    //$resultset = mysqli_query($connection,"SELECT * from franchisee where franchisee_mobile= '{$franchisee_mobile}' and payment_status='1'");
    //$rowset = mysqli_fetch_assoc($resultset);
    //$franchisee_id = $rowset['franchisee_id'];
    //franchisee_pincode=$rowset['franchisee_pincode']
    //$insert = "INSERT INTO Transaction (payment_id,payment_status,payment_amount,payment_time,transaction_detail,user_id) VALUES('{$payment_id}','1','999','{$payment_time}','Purchased Pin Code ($franchisee_pincode)','{F$franchisee_id}')";
    //$inst = mysqli_query($connection,$insert);
    echo "Query Failed".mysqli_error($connection);
}
else
{
    //"SELECT * from franchisee where franchisee_mobile= '{$franchisee_mobile}' and payment_status='1'";
    $resultset = mysqli_query($connection,"SELECT * from franchisee where franchisee_mobile= '{$franchisee_mobile}' and payment_status='1'");
    if($rowset = mysqli_fetch_assoc($resultset))
    {   
        $franchisee_id = $rowset['franchisee_id'];
        $franchisee_pincode = $rowset['franchisee_pincode'];
        $franchisee_full_name = $rowset['franchisee_full_name'];
        $franchisee_category = $rowset['franchisee_category'];
        $franchisee_mobile = $rowset['franchisee_mobile'];
        $franchisee_city=$rowset['franchisee_city'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-F-Y');
//        $msg = "Thank you ".strtoupper($franchisee_full_name) .", for your payment of Rs 999, for registering as ". strtoupper($franchisee_category) ." with Labouradda on ".$date.". We will be starting our services from 1st June 2020. For any queries please contact our helpline number 8545002000";
        $cityfran ="Select * FROM `users` WHERE users_city='$franchisee_city' AND payment_status='1' ";
        $cityfran1 = mysqli_query($connection,$cityfran);

        $rowss = mysqli_fetch_array($cityfran1,MYSQLI_BOTH);
        if($rowss){
            $users_mobile = $rowss['users_mobile'];
            $msg = "Thank you ".strtoupper($franchisee_full_name) .", for your payment of Rs 999, for registering as ". strtoupper($franchisee_category) ." with Labouradda on ".$date.". For any queries please contact our helpline number $users_mobile";
        } else {
            $msg = "Thank you ".strtoupper($franchisee_full_name) .", for your payment of Rs 999, for registering as ". strtoupper($franchisee_category) ." with Labouradda on ".$date.". For any queries please contact our helpline number 8545002000";
        }
        
             $query1="INSERT INTO `Transaction`(`user_id`, `payment_id`, `payment_time`, `payment_amount`, `transaction_detail`, `payment_status`) VALUES ('F$franchisee_id','$payment_id','$payment_time','999','Purchased Pin Code($franchisee_pincode)','1')";
        $transa = mysqli_query($connection,$query1);
    }
    // sms api start to send congratulations
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?authkey=&mobiles=$franchisee_mobile&country=91&message=".$msg."&sender=LABADA&route=4",
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

?> = $_REQUEST['q'];
$payment_id = $_POST['razorpay_payment_id'];
$payment_time = date(time());
$query="UPDATE franchisee set payment_id = '{$payment_id}',payment_status = '1',payment_time = '{$payment_time}' where franchisee_mobile = '{$franchisee_mobile}'";
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
CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?authkey=240434AQu8Nqabnwc45c2cbad5&mobiles=$dealer_mobile&country=91&message=".$msg."&sender=LABADA&route=4",
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