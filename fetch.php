<?php 
include "includes/db.php";
 
if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){ 
    $query = "SELECT * FROM city WHERE city_state_id =".$_POST["state_id"]." ORDER BY city_name ASC"; 
    $result = mysqli_query($connection,$query); 
     
    if($result->num_rows > 0){ 
        echo '<option value="">Select City</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">City not available</option>'; 
    } 
}elseif(isset($_POST["city_id"]) && !empty($_POST["city_id"])){  
    $query = "SELECT DISTINCT Pincode FROM `PinCode` WHERE city_id = ".$_POST['city_id']." AND assign_status!='1' ORDER BY Pincode ASC"; 
    $result = mysqli_query($connection,$query); 
    if($result->num_rows > 0){ 
        //echo '<option value="">Select Pincode</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['Pincode'].'">'.$row['Pincode'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Pincode not available</option>'; 
    } 
} 
?>