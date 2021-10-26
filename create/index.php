<?php
require_once('../engine.class.php');

$name    =   $_GET['name'];
$email   =   $_GET['email'];
$password =  $_GET['password'];

if (empty($name) || empty($email) || empty($password)) {
    $inserted = array(
        'status' 	=>	getHttpMsg(400),
        'message'   => 'Check the field name, email or password for empty input'
    );
    echo json_encode($inserted);
}
header('Content-Type:application/json');
$engine = new model();	
date_default_timezone_set("Africa/Lagos");
$dateJoined = date("Y-m-d H:i:s");
$dublicateEmail = $engine->authEmail(sentize($email));

if (!$dublicateEmail) {
$array = array(
    'name'          => $name,
    'email'         => $email, 
    'password'      => $password,
    'dateJoined'    => $dateJoined, 
);
$k = $engine->create('users', $array);
if ($k) {
    $inserted = array(
        'status' 	=>	getHttpMsg(201),
        'message'   => 'New User Added Sucessfully'
    );
    echo json_encode($inserted);
}else{
    $inserted = array(
        'status' 	=>	getHttpMsg(503),
        'message'   => 'Service Error!'
    );
    echo json_encode($inserted);
}
}else{
$inserted = array(
    'status' 	=>	getHttpMsg(300),
    'message'   => 'Dublicate Error!'
);
echo json_encode($inserted);
}


?>