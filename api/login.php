<?php
include 'connection.php';
$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$json = json_decode(file_get_contents('php://input'), true);
if (!empty($json['user_contact'])) {
    $search_user_query = "SELECT * FROM `users` WHERE `user_contact` = '$json[user_contact]'";
    $search_user_result = mysqli_fetch_array(mysqli_query($con, $search_user_query));

    if (!empty($search_user_result)) {
        $verify_user = "SELECT * FROM `users` WHERE `user_contact` = '$json[user_contact]'";
        $result = mysqli_fetch_array(mysqli_query($con, $verify_user));
        if (!empty($result)) {
            //Success Response
            $success_msg = array(
                'error' => 0,
                'status' => 'Success!',
                'msg' => 'Welcome',
                'user_id' => $result['user_id'],
                'user_contact' => $result['user_contact'],
            );
            $json = json_encode($success_msg);
            echo $json;
        }
    } else {
        $user_type = 1;
        $user_status = 1;
        $insert_user = "INSERT INTO `users`(
             `user_contact`,
             `user_type`,
             `user_status`
         )
         VALUES(
             '$json[user_contact]',
             '$user_type',
             '$user_status'
         )";
        $insert_user_r = mysqli_query($connection, $insert_user);
        if (!$insert_user_r) {
            $fail_msg = array(
                'error' => 0,
                'status' => 'Failed!',
                'msg' => 'Unregistered User'
            );
            $json = json_encode($fail_msg);
            echo $json;
        } else {
            $fail_msg = array(
                'error' => 1,
                'status' => 'Success!',
                'msg' => 'Registered'
            );
            $json = json_encode($fail_msg);
            echo $json;
        }

        //Failure Response


    }
}

mysqli_close($con);