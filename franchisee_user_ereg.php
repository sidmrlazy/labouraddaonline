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

                <div class="custom-breadcrumbs">
                    <a href="index">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Franchisee Opportunity</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
@$error_password = $_REQUEST['error'];
$error_msg = base64_decode($error_password);
$error_confirm = "Password does not match with Confirm Password ! Refill Form";
if($error_confirm==$error_msg)
{
    ?>
    <div class="row" align="center">
        <div style="width: 80%;margin-left: 10%;">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Warning !</strong> Password does not match with Confirm Password , Please Refill Form
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php
}
?>


<!-- Left side Image and Content Start -->
<section class="site-section col-md-12" id="next-section" style="background-image: url(images/la-background/bg1.png); ">
    <div class="container">
        <div class="row">
            <div class="col-md-5 item" id="first">
                <img src="images/la-background/vector1.png" class="img-fluid" alt="" style="width: 55%;">

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
                    $fr_mobile = $_POST['franchisee_mobile'];
                    $query = "SELECT franchisee_mobile FROM franchisee WHERE franchisee_mobile='$fr_mobile'";
                    $result = mysqli_query($connection, $query);
                    $row=mysqli_fetch_assoc($result);
                    $number=$row['franchisee_mobile'];
                    if ($fr_mobile==$number) {
                        $query = "SELECT * FROM franchisee JOIN state ON franchisee.franchisee_state=state.state_id JOIN city ON franchisee.franchisee_city=city.city_id JOIN PinCode ON franchisee.franchisee_pincode=PinCode.Pincode WHERE franchisee.franchisee_mobile='$fr_mobile'";
                        $res = mysqli_query($connection, $query);
                        $row1 = mysqli_fetch_array($res, MYSQLI_BOTH);
                        ?>
                        <!-- PHP Code to input form data End -->

                        <form action="payment_screen2.php" method="post" class="p-4 p-md-5 border rounded la-p" style="background-color: #fff;">
                            <div class="container">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="franchisee_category" style="font-size: 12px">Firm Type</label>
                                        <select class="form-control" data-width="100%" required="" data-live-search="true" title="Select Your Category" name="franchisee_category" id="franchisee_category">
                                            <?php
                                            if(!empty($row1['franchisee_category']))
                                            {
                                                ?>
                                                <option selected value="<?php echo $row1['franchisee_category']; ?>"><?php echo $row1['franchisee_category'];?></option>
                                                <?php

                                            }
                                            else
                                            {
                                            ?>
                                            <option value="" >Select Firm Type</option>
                                            <option value="Individual">Individual</option>
                                            <option value="Proprietorship Company">Proprietorship Company </option>
                                            <option value="Private Limited">Private Limited</option>
                                            <option value="Public Limited">Public Limited</option>
                                                <?php
                                                }
                                                ?>

                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="job-title" style="font-size: 12px">Firm Name</label>
                                        <input type="text" class="form-control" id="job-title" placeholder="Please Enter the name of your company (if any)" name="franchisee_company_name" value="<?php echo $row1['franchisee_company_name'];?>">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="gstin-status" style="font-size: 12px">GST Status(Yes/No)</label>
                                        <select class="form-control"  id="gstin-status" required="" name="franchisee_gstin_status">
                                            <?php 
                                            if(!empty($row1['franchisee_gstin_status']))
                                            {
                                                ?>
                                                <option selected value="<?php echo $row1['franchisee_gstin_status']?>"><?php echo $row1['franchisee_gstin_status']?></option>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <option value=""  >Select Status</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                                <?php
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="gstin-number" style="font-size: 10px">GSTIN Number (If Applicable)</label>
                                        <input type="text" class="form-control" id="gstin-number"  name="franchisee_gstin_number" placeholder="Enter GSTIN Number " value="<?php echo $row1['franchisee_gstin_number']?>"/>
                                    </div>
                                    <div class="form-group col-lg-6" >
                                        <label for="name" style="font-size: 12px">Full Name</label>
                                        <input type="text" class="form-control" id="name" required="" name="franchisee_full_name" placeholder="Enter Your Full Name" value="<?php echo $row1['franchisee_full_name'];?>"/>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="mobile" style="font-size: 12px">Mobile Number</label>
                                        <input type="text" class="form-control numberonly" id="mobile" required="" name="franchisee_mobile" placeholder="Enter Your Mobile Number" maxlength="10" minlength="10" value="<?php echo $row1['franchisee_mobile'];?>"/>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="franchisee_state" style="font-size: 12px">State</label>
                                        <select name="franchisee_state" class="form-control" id="state" required="">
                                            <option value="" >Select State</option>
                                            <option selected
                                                    value="<?php echo $row1['franchisee_state'] ?>"><?php echo $row1['state_name']; ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="city" style="font-size: 12px">City</label>
                                        <select name="franchisee_city" class="form-control" id="city" required="">
                                            <option selected
                                                    value="<?php echo $row1['franchisee_city']; ?>"><?php echo $row1['city_name']; ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="pincode" style="font-size: 12px">Pincode</label>
                                        <select name="franchisee_pincode" class="form-control" id="pincode" >
                                            <option>Select Pincode</option>
                                            <option selected value="<?php echo $row1['franchisee_pincode'];?>"><?php echo $row1['franchisee_pincode']?></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="franchisee_address" style="font-size: 12px">Address</label>
                                        <input type="text" class="form-control"  placeholder="Enter your Full Address" required="" name="franchisee_address" onFocus="geolocate()" id="autocomplete" value="<?php echo $row1['franchisee_address']?>">
                                    </div>
                                    <div class="form-group  col-lg-6">
                                        <label for="password" style="font-size: 12px">Password</label>
                                        <input type="password" class="form-control" required="" value="<?php echo $row1['franchisee_password']?>" name="franchisee_password"/>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="password" style="font-size: 12px">Confirm Password</label>
                                        <input type="password" class="form-control" required="" name="franchisee_confirm_password" value="<?php echo $row1['franchisee_confirm_password']?>"/>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <span style="font-size: 12px;">By clicking on submit you 'Agree' to the <a href="tnc" target="_blank">Terms & Conditions</a></span>
                                        <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="submit" >
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                    } else {
                        $errormsg =base64_encode(11);
                         header("Location:franchisee_search_user?msg=$errormsg");
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



<script type="text/javascript">
    var dealer_password = document.getElementById('dealer_password');
    var dealer_confirm_password = document.getElementById('dealer_confirm_password');

    function showhideboxfunction() {

        if( dealer_password.type === 'password') {

            dealer_password.type="text";
            dealer_confirm_password.type="text";

        } else {

            dealer_confirm_password.type="password";
            dealer_password.type="password";
        }
    }
</script>

<script>

    $(document).ready(function(){

        $('#state').change(function(){
            var state_id = $('#state').val();
            if(state_id != '')
            {
                $.ajax({
                    url:"fetch3.php",
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
                    url:"fetch3.php",
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


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

