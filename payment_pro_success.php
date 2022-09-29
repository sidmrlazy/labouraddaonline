<?php

include "includes/db.php";
$users_mobile = $_REQUEST['q'];
$payment_id = $_POST['razorpay_payment_id'];
$payment_time = time();
$query="UPDATE users set payment_id = '{$payment_id}',payment_status = '1',payment_time = '{$payment_time}',wallet_amount='1999' where users_mobile = '{$users_mobile}'";

$success = mysqli_query($connection,$query);
if(!$success)
{
    echo "Query Failed".mysqli_error($connection);
}
else
{
    // "SELECT * from users where users_mobile= '{$users_mobile}' and payment_status='1'";
    $resultset = mysqli_query($connection,"SELECT * from users where users_mobile= '{$users_mobile}' and payment_status='1'");
    if($rowset = mysqli_fetch_assoc($resultset))
    {
        $users_id = $rowset['users_id'];
        $users_fullname = $rowset['users_name'];
        $category = $rowset['category'];
        $users_mobile = $rowset['users_mobile'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-F-Y');
        $q=mysqli_query($connection,"insert into Transaction(user_id,payment_id,payment_time,payment_amount,transaction_detail,payment_status) values('CF$users_id','$payment_id','$payment_time','1999','','1')");
        
        $msg = "Thank you ".strtoupper($users_fullname) .", for your payment of Rs 1999, for registering as ". strtoupper($category) ." with Labouradda on ".$date.". For any queries please contact our helpline number 8545002000";
    }
    // sms api start to send congratulations
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?authkey=240434AJDFeUGV5f6883cbP1&mobiles=$users_mobile&country=91&message=".$msg."&sender=LABADA&route=4",
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