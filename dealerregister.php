<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation-dark.php" ?>
<?php
$query = "SELECT * FROM state";
$result = mysqli_query($connection, $query);
?>


<!-- Left side Image and Content Start -->
<section class="site-section col-md-12" id="next-section"
         style="background-image: url(images/la-background/bgwhite.jpeg);">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 item left-content-defaler" id="first">
                <img src="images/la-background/bg3.jpeg" class="img-fluid" alt="background labouradda">
            </div>
            <div class="container">
                <?php
                @$error_password = $_REQUEST['msg'];
                $error_msg = base64_decode($error_password);
                $error_confirm = "User Already Registered!";
                if ($error_confirm == $error_msg) {
                    ?>
                    <div class="row" align="center">
                        <div style="width: 80%;margin-left: 10%; margin-bottom:45px;">
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
                elseif($error_msg=='Thank you! Registration Complete!')
                {
                    ?>
                    <div class="row" align="center">
                        <div style="width: 80%;margin-left: 10%; margin-bottom:45px;">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Warning !</strong> Thank you! Registration Complete!!
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
                @$error_password = $_REQUEST['error'];
                $error_msg = base64_decode($error_password);
                $error_confirm = "Password does not match with Confirm Password ! Refill Form";
                if ($error_confirm == $error_msg) {
                    ?>
                    <div class="row" align="center">
                        <div style="width: 80%;margin-left: 10%; margin-bottom:45px;">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Warning !</strong> Password does not match with Confirm Password , Please Refill
                                Form
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                } elseif ($error_msg == 12) {
                    ?>
                    <div class="row" align="center">
                        <div style="width: 80%;margin-left: 10%; margin-bottom:45px;">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Warning !</strong> User already registered. Payment successfully completed!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php

                } elseif ($error_msg == 10) {
                    ?>
                    <div class="row" align="center">
                        <div style="width: 80%;margin-left: 10%; margin-bottom:45px;">
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

                <div class="row">
                    <div class="col-lg-12 registerfirstform">
                         PHP Code to insert form data Start 


                        <?php


                        if (isset($_POST['submit'])) {
                            $thakadaar = $_REQUEST['register-online-thekedaar'];
                            $dealer_ref_no = base64_decode($thakadaar);

                            if (!empty($dealer_ref_no)) {
//request for
//   echo "<script>alert($dealer_ref_no);window.location='online-thekedaar-registration';</script>";

                                $dealer_category = implode(', ', $_POST['dealer_category']);
                                $dealer_fullname = $_POST['dealer_fullname'];

                                $dealer_mobile = $_POST['dealer_mobile'];
                                $dealer_state = $_POST['dealer_state'];
                                $dealer_city = $_POST['dealer_city'];
                                $dealer_address = $_POST['dealer_address'];
                                $dealer_pincode = $_POST['dealer_pincode'];
                                $dealer_password = $_POST['dealer_password'];
                                $dealer_confirm_password = $_POST['dealer_confirm_password'];
                                $dealer_request_date = time();
                                $date=date('d-M-y');
                                

                                $query = "INSERT INTO dealer_web (dealer_ref_no,dealer_category,dealer_fullname,dealer_mobile,dealer_state,dealer_city,dealer_address,dealer_pincode,dealer_password,dealer_confirm_password,dealer_request_date,payment_status,payment_id,payment_time) VALUES ('$dealer_ref_no','$dealer_category','$dealer_fullname','$dealer_mobile','$dealer_state','$dealer_city','$dealer_address','$dealer_pincode','$dealer_password','$dealer_confirm_password','$dealer_request_date','0','','')";
                                $query_copmlete_check = "SELECT * from dealer_web where dealer_mobile = '$dealer_mobile' and payment_status='0'";
                                $result = mysqli_query($connection, $query_copmlete_check);
                                $query_copmlete_payment = "SELECT * FROM dealer_web JOIN state ON dealer_web.dealer_state=state.state_id JOIN city ON dealer_web.dealer_city=city.city_id JOIN PinCode ON dealer_web.dealer_pincode=PinCode.Pincode WHERE dealer_web.dealer_mobile='$dealer_mobile' and payment_status='1'";
                                $query_complete_success = mysqli_query($connection, $query_copmlete_payment);


                                if (mysqli_num_rows($result) > 0) {
                                    $errormsg = base64_encode("User Already Registered!");
                                    header("Location:online-thekedaar-registration?msg=$errormsg");
// echo "<script>alert('User Already Registered!');window.location='online-thekedaar-registration';</script>";

                                } elseif (mysqli_num_rows($query_complete_success) > 0) {
                                    $msg_password = base64_encode(12);
                                    header("Location:online-thekedaar-registration?error=$msg_password");
//user already registered and payment successfully
//   echo "<script>alert('User already registered. Payment successfully completed');window.location='online-thekedaar-registration';</script>";

                                } elseif ($dealer_password != $dealer_confirm_password) {
                                    $msg_password = base64_encode("Password does not match with Confirm Password ! Refill Form");
                                    header("Location:online-thekedaar-registration?error=$msg_password");
// echo "<script>alert('Password does not match with Confirm Password ! Refill Form');window.location='online-thekedaar-registration';</script>";

                                } 
                                
                                
                                elseif ($query) {
                                    session_start();
                                    $_SESSION['mobile'] = $dealer_mobile;
                                    $new_dealer_request = mysqli_query($connection, $query);
                                    // echo $new_dealer_request;
                                    // ===================transaction start================
                                    if($new_dealer_request)
                                    {
                                    //       $query_copmlete_tran= "SELECT * from dealer_web where dealer_mobile = '$dealer_mobile' and payment_status='1'";
                                    //         $new_dealer_trans = mysqli_query($connection, $query_copmlete_tran);
                                    //      $transaction = $new_dealer_trans->fetch_assoc();
                                    //       $tr_dealer_id=$transaction['dealer_id'];
                                    //       $transaction="insert into Transaction(user_id,payment_id,payment_time,payment_amount,transaction_detail,payment_status) values('D$tr_dealer_id','','$dealer_request_date','0','Free Monthly Membership','1')";
                                    //  $transaction_success= mysqli_query($connection, $transaction);

                                              $app="https://play.google.com/store/apps/details?id=com.labouraddadealer";
                                        // $msg = "Thank you for showing interest, We will contact you shortly. For any queries, please contact 8545002000";
                                        // $msg="You have been registered as a Labouradda Dealer on " .$date. " Download the Labouradda Dealer App " .$app. " and start receiving customer jobs from ". $dealer_pincode;
                                        $msg="???????????? ?????? ???????????? ??????????????????????????? ???????????? ?????? ????????? ????????? ????????????????????? ?????? ???????????? ????????? ?????????  ?????? ?????????????????? ???????????? ????????? 28 ????????? ?????? ????????? ????????????????????? ?????????  ??????????????? ??????????????????????????? ???????????? ???????????? ????????????????????? ???????????? ".$app;

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

                                        $errormsg = base64_encode("Thank you! Registration Complete!");
                                        // header("Location:payment_screen?msg=$errormsg");
                                        header("Location:online-thekedaar-registration?msg=$errormsg");
//                    echo "<script>alert('Thank you! Registration Complete!');window.location='work-with-us-search-user';</script>";
                            
                                   }
                                     else {

                                        die('QUERY FAILED' . mysqli_error($connection));
                                    }
                                    // ===================transaction end================        
                                  
                                }


                            } 
                            
                            else {
//request for
//   echo "<script>alert('id nahi hai yarr');window.location='online-thekedaar-registration';</script>";

                                $dealer_category = implode(', ', $_POST['dealer_category']);
                                $dealer_fullname = $_POST['dealer_fullname'];
                                $dealer_mobile = $_POST['dealer_mobile'];
                                $dealer_state = $_POST['dealer_state'];
                                $dealer_city = $_POST['dealer_city'];
                                $dealer_address = $_POST['dealer_address'];
                                $dealer_pincode = $_POST['dealer_pincode'];
                                $dealer_password = $_POST['dealer_password'];
                                $dealer_confirm_password = $_POST['dealer_confirm_password'];
                                $dealer_referredby = $_POST['dealer_referredby'];
                                $dealer_request_date = time();
                                $date=date('d-M-y');
   
                        
                              if(!empty($dealer_referredby))
                              {
                                   $query = "INSERT INTO dealer_web (dealer_ref_no,dealer_category,dealer_fullname,dealer_mobile,dealer_state,dealer_city,dealer_address,dealer_pincode,dealer_password,dealer_confirm_password,dealer_request_date,payment_status,payment_id,payment_time) VALUES ('$dealer_referredby','$dealer_category','$dealer_fullname','$dealer_mobile','$dealer_state','$dealer_city','$dealer_address','$dealer_pincode','$dealer_password','$dealer_confirm_password','$dealer_request_date','0','','')";
                              }
                              else
                              {
                                   $query = "INSERT INTO dealer_web (dealer_ref_no,dealer_category,dealer_fullname,dealer_mobile,dealer_state,dealer_city,dealer_address,dealer_pincode,dealer_password,dealer_confirm_password,dealer_request_date,payment_status,payment_id,payment_time) VALUES ('Self Generated','$dealer_category','$dealer_fullname','$dealer_mobile','$dealer_state','$dealer_city','$dealer_address','$dealer_pincode','$dealer_password','$dealer_confirm_password','$dealer_request_date','0','','')";
                              }
                               
                                
                                
                                $query_copmlete_check = "SELECT * from dealer_web where dealer_mobile = '$dealer_mobile' and payment_status='0'";
                                $result = mysqli_query($connection, $query_copmlete_check);
                                $query_copmlete_payment = "SELECT * FROM dealer_web JOIN state ON dealer_web.dealer_state=state.state_id JOIN city ON dealer_web.dealer_city=city.city_id JOIN PinCode ON dealer_web.dealer_pincode=PinCode.Pincode WHERE dealer_web.dealer_mobile='$dealer_mobile' and payment_status='1'";
                                $query_complete_success = mysqli_query($connection, $query_copmlete_payment);


                                if (mysqli_num_rows($result) > 0) {
                                    $errormsg = base64_encode("User Already Registered!");
                                    header("Location:online-thekedaar-registration?msg=$errormsg");

                                } elseif (mysqli_num_rows($query_complete_success) > 0) {
                                    $msg_password = base64_encode(12);
                                    header("Location:online-thekedaar-registration?error=$msg_password");

                                } elseif ($dealer_password != $dealer_confirm_password) {
                                    $msg_password = base64_encode("Password does not match with Confirm Password ! Refill Form");
                                    header("Location:online-thekedaar-registration?error=$msg_password");

                                }
                                elseif ($query) {
                                    session_start();
                                    $_SESSION['mobile'] = $dealer_mobile;
                                    $new_dealer_request = mysqli_query($connection, $query);
                                    // echo $new_dealer_request;
                                    // ===================transaction start================
                                    if($new_dealer_request)
                                    {
                                    //       $query_copmlete_tran= "SELECT * from dealer_web where dealer_mobile = '$dealer_mobile' and payment_status='1'";
                                    //         $new_dealer_trans = mysqli_query($connection, $query_copmlete_tran);
                                    //      $transaction = $new_dealer_trans->fetch_assoc();
                                    //       $tr_dealer_id=$transaction['dealer_id'];
                                    //       $transaction="insert into Transaction(user_id,payment_id,payment_time,payment_amount,transaction_detail,payment_status) values('D$tr_dealer_id','Trail','$dealer_request_date','0','Free Monthly Membership','1')";
                                    //  $transaction_success= mysqli_query($connection, $transaction);

                                         
                                         
                                          $app="https://play.google.com/store/apps/details?id=com.labouraddadealer";
                                        // $msg = "Thank you for showing interest, We will contact you shortly. For any queries, please contact 8545002000";
                                        // $msg="You have been registered as a Labouradda Dealer on " .$date. " Download the Labouradda Dealer App " .$app. " and start receiving customer jobs from ". $dealer_pincode;
                                        $msg="???????????? ?????? ???????????? ??????????????????????????? ???????????? ?????? ????????? ????????? ????????????????????? ?????? ???????????? ????????? ?????????  ?????? ?????????????????? ???????????? ????????? 28 ????????? ?????? ????????? ????????????????????? ?????????  ??????????????? ??????????????????????????? ???????????? ???????????? ????????????????????? ???????????? ".$app;
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

                                        $errormsg = base64_encode("Thank you! Registration Complete!");
                                        // header("Location:payment_screen?msg=$errormsg");
                                        header("Location:online-thekedaar-registration?msg=$errormsg");
//                    echo "<script>alert('Thank you! Registration Complete!');window.location='work-with-us-search-user';</script>";
                                
                                        
                                    }
                                    else {

                                        die('QUERY FAILED' . mysqli_error($connection));
                                    }
                                    // ===================transaction end================        
                                  
                                }


                            }


                        }
                        ?>


                         PHP Code to insert form data End 

                        <?php
                        @$marketingleads = base64_decode($_REQUEST['leads']);
                        if ($marketingleads) {
                            $querymarketing = "SELECT * FROM `marketing_leads` WHERE `marketing_lead_contact` LIKE '%$marketingleads%'";
                            $resultmarketing = mysqli_query($connection, $querymarketing);
                            $marketingdata = $resultmarketing->fetch_assoc();
                        }

                        ?>
                        <form class="p-2 p-md-5 border rounded la-p" action="" method="post"
                              style="background: #fdcd01; margin-top: -50px;" id="onlineregistermarketingform">
                            <div class="container">
                                <div class="row">

                                    <div class="form-group col-lg-3">
                                        <label for="dealer_category[]" style="font-size: 10px;">Select Category*</label>
                                        <select class="selectpicker border rounded ui fluid dropdown"
                                                multiple="multiple" id="job-type" data-style="btn-black"
                                                data-width="100%" data-live-search="true" title="Select Your Category"
                                                name="dealer_category[]" required="">
                                            <option value="Labour/Mistri Contractor">Labour/Mistri Contractor</option>
                                            <option value="Tile Mistri Contractor">Tile Mistri Contractor</option>
                                            <option value="Electrician Contractor">Electrician Contractor</option>
                                            <option value="Plumber Contractor">Plumber Contractor</option>
                                            <option value="Carpenter Contractor">Carpenter Contractor</option>
                                            <option value="Painter Contractor">Painter Contractor</option>
                                            <option value="Fabricator">Fabricator</option>
                                            <option value="Loaders & Unloaders Contractor">Loaders & Unloaders Contractor</option>
                                    
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="dealer_fullname" style="font-size: 10px;">Full Name*</label>
                                        <input type="text" class="form-control" id="job-title" name="dealer_fullname"
                                               pattern="[A-Za-z ]{1,32}" required="" value="<?php
                                        if (!empty($marketingdata)) {
                                            echo $marketingdata['marketing_lead_name'];
                                        }
                                        ?>">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="dealer_mobile" style="font-size: 10px;">Mobile Number*</label>
                                        <input type="text" class="form-control" id="email" name="dealer_mobile"
                                               minlength="10" maxlength="10" pattern="[6789][0-9]{9}" required=""
                                                value="<?php
                                        if (!empty($marketingdata)) {
                                            echo $marketingdata['marketing_lead_contact'];
                                        }
                                        ?>">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="dealer_state" style="font-size: 10px;">State*</label>
                                        <select name="dealer_state" class="form-control" id="state" required="">
                                            <option value="">Select State</option>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="' . $row['state_id'] . '">' . $row['state_name'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="">State not available</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="dealer_city" style="font-size: 10px;">City*</label>
                                        <select name="dealer_city" class="form-control" id="city" required="">
                                            <option value="">Select City</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="dealer_pincode" style="font-size: 10px;">Pin Code*</label>
                                        <select name="dealer_pincode" class="form-control" id="pincode" required="">
                                            <option value="">Select Pincode</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="dealer_address" style="font-size: 10px;">Address*</label>
                                        <input type="text" class="form-control" name="dealer_address"
                                               onFocus="geolocate()" id="autocomplete" required=""  value="<?php
                                        if (!empty($marketingdata)) {
                                            echo $marketingdata['marketing_lead_address'];
                                        }
                                        ?>">
                                    </div>
                                      <div class="form-group col-lg-12">
                                        <label for="dealer_address" style="font-size: 10px;">Dealer Referred By</label>
                                        <input type="text" class="form-control" name="dealer_referredby"
                                                id="autocomplete"  placeholder="Enter mobile number">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="dealer_password" style="font-size: 10px;">Password*</label>
                                        <input type="password" class="form-control" placeholder="Min 6 Characters"
                                               name="dealer_password" minlength="6" id="dealer_password" required="">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="dealer_confirm_password" style="font-size: 10px;">Confirm
                                            Password*</label>
                                        <input type="password" class="form-control" name="dealer_confirm_password"
                                               minlength="6" id="dealer_confirm_password" required="">
                                    </div>

                                    <div class="form-group col-lg-12">
                                      <span style="font-size: 12px; color: #000">By clicking on submit you 'Agree' to the <a href="tnc" target="_blank" style="color: #000; font-weight: bold;">Terms & Conditions</a></span>
                                        <input type="submit" name="submit" class="btn btn-block btn-primary btn-md"
                                               value="Submit" style="background: #000; color: #fff;">
                                        <span style="font-size: 16px; color: #000;">Clicking here to download the <a
                                                    href="document/OnlineDealerBrochure.pdf" target="_blank"
                                                    style="color: #000; font-weight: bold;"
                                                    class="blinking">E-Brochure</a></span><br>
                                        <span style="font-size: 16px; color: #000;"> <a href="payment-thekedaar"
                                                                                        target="_blank"
                                                                                        style="color: #000; font-weight: bold;"
                                                                                        class="blinking">Proceed to Payment</a></span><br>

                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 Left side Image and Content End 

 Features Start 
<section class="site-section feature-section-dealer mt-3" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 item dealer-feature-section" id="first">
                <h1>????????? ?????? ???????????? ?????? ?????????????????? ????????????</h1>
                <p></p>

                <div class="container">
                    <div class="row">
                        <div class="dealer-box col-lg-12">
                            <img src="images/la-background/feature-image1.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Feature End -->

<!-- Features Two Start -->
<section class="site-section " id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 item dealer-feature-section" id="first">
                <h1>???????????? ?????? ?????????????????? ???????????? ?????? ??????????</h1>
                <p></p>

                <div class="container">
                    <div class="row">
                        <div class="dealer-box col-lg-12">
                            <img src="images/dealerFeatures/image-explainer.jpeg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Feature Two End -->
<a herf="https://play.google.com/store/apps/details?id=com.labouraddadealer">Download Dealer App</a>
<?php include "includes/footer.php" ?>

<script type="text/javascript">
    var dealer_password = document.getElementById('dealer_password');
    var dealer_confirm_password = document.getElementById('dealer_confirm_password');

    function showhideboxfunction() {
        if (dealer_password.type === 'password') {
            dealer_password.type = "text";
            dealer_confirm_password.type = "text";
        } else {
            dealer_confirm_password.type = "password";
            dealer_password.type = "password";
        }
    }


    $(document).ready(function () {

        $('#state').change(function () {
            var state_id = $('#state').val();
            if (state_id != '') {
                $.ajax({
                    url: "fetch3.php",
                    method: "POST",
                    data: {state_id: state_id},
                    success: function (data) {
                        $('#city').html(data);
                    }
                });
            }
            else {
                $('#city').html('<option value="">Select City</option>');
            }
        });

        $('#city').change(function () {
            var city_id = $('#city').val();
            if (city_id != '') {
                $.ajax({
                    url: "fetch3.php",
                    method: "POST",
                    data: {city_id: city_id},
                    success: function (data) {
                        $('#pincode').html(data);
                    }
                });
            }
            else {
                $('#pincode').html('<option value="">Select Pincode</option>');
            }
        });

    });

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
            navigator.geolocation.getCurrentPosition(function (position) {
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKwyqrGsG1Stuy5UpUBoldcWEtAIeJMOU&libraries=places&callback=initAutocomplete"
        async defer></script>