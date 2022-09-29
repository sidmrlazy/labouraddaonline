<?php ob_start();

$db['db_host'] = "localhost";
$db['db_user'] = "u976956619_adda";
$db['db_pass'] = "Sid@8888data";
$db['db_name'] = "u976956619_labor";

// $db['db_host'] = "localhost";
// $db['db_user'] = "root";
// $db['db_pass'] = "";
// $db['db_name'] = "u891777119_labor";

foreach($db as $key => $value){

define(strtoupper($key), $value);

}

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

if(!$connection) {

echo "Database connection lost";

}

?>
