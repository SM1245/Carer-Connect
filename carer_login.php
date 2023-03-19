<?php

// Include the database connection
require_once 'setup.php';

// Get the JSON request body
$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

// Store user details
$username = $data['carer_username'];
$password = $data['carer_password'];

// Validate user details
$result = $mysqli->query("SELECT carer_password FROM carer_logins WHERE carer_username = $username");
if($result != $password) {
    header("location: carerlogin.html");
    exit();
} else {
    header("location: main.html");
    exit();
}