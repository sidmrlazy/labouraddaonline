<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
<?php include "modal.php" ?>

<?php
$query = "SELECT * FROM state";
$result = mysqli_query($connection,$query);
?>


<!-- Top Navigation Backgorund Image -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('images/la-gallery/banner3.jpeg');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <!-- <h1 class="text-white font-weight-bold">Work with us</h1> -->

                <div class="custom-breadcrumbs">
                    <a href="index">Home</a> <span class="mx-2 slash">/</span>
                    <!-- <a href="#">Job</a> <span class="mx-2 slash">/</span> -->
                    <span class="text-white"><strong>Super Franchisee</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Left side Image and Content Start -->
<section class="site-section col-md-12" id="next-section" style="background-image: url(images/la-background/bg1.png); ">
    <div class="container">
        <div class="row">
            <div class="col-md-5 item" id="first">
                <img src="images/la-background/vector2.png" class="img-fluid" alt="" style="width: 55%;">

                <h1 style="margin-top: 8%; font-size: 16px; color: #000000; font-weight: bolder;">WHO</h1>
                <p style="color: #000000;">Labour Contractors, Thekedaars (big/small/local/regional), anyone associated with the Labour Mandi, Labourers (Skilled/Semi-Skilled/Unskilled)</p>

                <h1 style="font-weight: bolder; margin-top: 10%; font-size: 16px; color: #000000;">WHY</h1>
                <p style="color: #000000;">Efficient, gives you access to more consumers,<strong> Digital Process: ensures physical distancing and safety. </strong>Better and defined employment for Labourers under you. Platform to get more contracts and build a 'Contractor' Community.</p>

                <h1 style="font-weight: bolder; margin-top: 10%; font-size: 16px; color: #000000;">HOW</h1>
                <p style="color: #000000;">Fill our E-Form, provide your details to create an account. Pay the registration charges & start getting leads of employment for yourself</p>

                <a href="#" style="color: #000000; font-weight: bolder;">Click here to view in English</a>
            </div>

            <div class="col-lg-7">
                <!-- PHP Code to input form data Start -->
                <?php
                if (isset($_POST['submit'])) {
                    $pr_mobile = $_POST['provi_mobile'];
                     $user_type=9;
                    $query = "SELECT users_mobile FROM users WHERE users_mobile='$pr_mobile' and users_type='$user_type'";
                    $result = mysqli_query($connection, $query);
                    $row=mysqli_fetch_assoc($result);
                    $number=$row['users_mobile'];

                    if ($pr_mobile==$number) {
                        $query = "SELECT * FROM users JOIN state ON users.users_state=state.state_id JOIN city ON users.users_city=city.city_id WHERE users.users_mobile='$pr_mobile'";
//                        $query = "SELECT * FROM users WHERE users_mobile='$pr_mobile'";
                        $res = mysqli_query($connection, $query);
                        $row1 = mysqli_fetch_array($res, MYSQLI_BOTH);

                        ?>
                        <!-- PHP Code to input form data End -->

                        <form class="p-4 p-md-5 border rounded la-p" action="payment_screen_super.php" method="post" style="background-color: #fff;">
                            <!-- 1st Section Start -->
                            <div class="container">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="category" style="font-size: 12px">Firm Type</label>
                                        <select class="selectpicker border rounded ui fluid dropdown"  id="job-type" data-style="btn-black" data-width="100%" required="" data-live-search="true" title="Select Your Category" name="category">
                                          <?php
                                          if(!empty($row1['category'])) {
                                              ?>
                                              <option selected value="<?php echo $row1['category'] ?>"><?php echo $row1['category']; ?></option>
                                              <?php
                                          }
                                          else
                                          {
                                          ?>

                                            <option value="">Select Firm Name</option>
                                            <option value="Individual">Individual</option>
                                            <option value="Proprietorship Company">Proprietorship Company </option>
                                            <option value="Private Limited">Private Limited</option>
                                            <option value="Public Limited">Public Limited</option>
                                              <?php
                                              }
                                              ?>

                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6" >
                                        <label for="company_name" style="font-size: 12px">Company Name</label>
                                        <input type="text" class="form-control" id="job-title" placeholder="Please Enter the name of your company (if any)" name="company_name" value="<?php echo $row1['company_name']?>">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="gstin_status" style="font-size: 12px">GSTIN (Yes/No)</label>
                                        <select class="selectpicker border rounded ui fluid dropdown"  id="job-type" data-style="btn-black" data-width="100%" required="" data-live-search="true" title="Select GSTIN Status" name="gstin_status">
                                           
                                                <?php 
                                            if(!empty($row1['gstin_status']))
                                            {
                                                ?>
                                                <option selected value="<?php echo $row1['gstin_status']?>"><?php echo $row1['gstin_status']?></option>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                              <option value="">Select Status</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="gstin_number" style="font-size: 12px">GSTIN Number (If Applicable)</label>
                                        <input type="text" class="form-control" id="job-title" placeholder="GSTIN Number" name="gstin_number" value="<?php echo $row1['gstin_number']?>">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="users_name" style="font-size: 12px">Full Name</label>
                                        <input type="text" class="form-control" id="job-title" placeholder="Enter your full name" required="" name="users_name" value="<?php echo $row1['users_name']?>">
                                    </div>
                                    <!-- 1st Section End -->

                                    <!-- 2nd Section Start -->

                                    <div class="form-group col-lg-6">
                                        <label for="users_mobile" style="font-size: 12px">Mobile Number</label>
                                        <input type="number" class="form-control numberonly" id="users_mobile" placeholder="Enter your Mobile Number" name="users_mobile" maxlength="10" minlength="10" required="" value="<?php echo $row1['users_mobile']?>">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="users_state" style="font-size: 12px">State</label>
                                        <select name="users_state" class="form-control" id="state" required="">
                                            <option selected
                                                    value="<?php echo $row1['users_state'] ?>"><?php echo $row1['state_name']; ?></option>
                                        </select>


                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="users_city" style="font-size: 12px">City</label>
                                        <select name="users_city" class="form-control js-example-basic-single" required="">
                                            <option selected
                                                    value="<?php echo $row1['users_city'] ?>"><?php echo $row1['city_name']; ?></option>
                                        </select>
                                    </div>

<!--                                    <div class="form-group col-lg-6  d-none">-->
<!--                                        <label for="" style="font-size: 12px">Pin Code</label>-->
<!--                                        <select name="users_pincode" class="form-control js-example-basic-multiple" id="pincode" required="" value="--><?php //echo $row1['users_zipcode']?><!--">-->
<!--                                            <option value="">Select Pincode</option>-->
<!--                                        </select>-->
<!--                                    </div>-->

                                    <div class="form-group col-lg-6">
                                        <label for="users_address" style="font-size: 12px">Address</label>
                                        <input type="text" class="form-control"  placeholder="Enter your Full Address" required="" name="users_address" onFocus="geolocate()" id="autocomplete" value="<?php echo $row1['users_address']?>">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="users_password" style="font-size: 12px">Password</label>
                                        <input type="password" class="form-control"  placeholder="Enter your Password" required="" name="users_password" id="users_password" value="<?php echo $row1['users_password']?>">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="users_password" style="font-size: 12px">Confirm Password</label>
                                        <input type="password" class="form-control"  placeholder="Enter your Password" required="" name="confirm_password" value="<?php echo $row1['users_password']?>">
                                    </div>

                                    <!-- 2nd Section End -->

                                    <!-- 3rd Section Start -->

                                    <div class="form-group col-lg-12">
                                        <span style="font-size: 12px;">By clicking on submit you 'Agree' to the <a href="tnc" target="_blank">Terms & Conditions</a></span>
                                        <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="submit" >
                                    </div>

                                    <!-- 3rd Section Ends -->
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                    else{
                        $errormsg =base64_encode(11);
                        header("Location:provincial_search_user?msg=$errormsg");

//                            echo "<script>alert('number not found');window.location='index';</script>";

                    }
                }
                ?>
            </div>

        </div>
    </div>
</section>
<!-- Left side Image and Content End -->

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



<?php include "includes/footer.php" ?>




</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKwyqrGsG1Stuy5UpUBoldcWEtAIeJMOU&libraries=places&callback=initAutocomplete"
        async defer></script>

