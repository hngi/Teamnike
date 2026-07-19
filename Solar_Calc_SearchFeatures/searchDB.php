<?php


$businessName = "";
$product = "";
$state = "";
$address = "";
$phone = "";
$email = "";
$errors = array();
$msg = "";
$msgClass = "";

// connecting to database

$db = mysqli_connect('localhost', 'root', '', 'solar_vendors');

// on clicking the signup button

if (isset($_POST['signup'])) {
    $businessName = mysqli_real_escape_string($db, $_POST['businessName']);
    $product = mysqli_real_escape_string($db, $_POST['product']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);

    // ensuring that all fields are filled and filled correctly
    if(empty($businessName) || empty($product) || empty($state) || empty($address) || empty($phone) || empty($email) || empty($password1) || empty($password2)){
        array_push($errors, "All fields are required");
    }

    if($password1 != $password2) {
        array_push($errors, "Passwords do not match");
    }

    // Submitting to Database if there are no errors

    if(count($errors) == 0) {
        $msg = 'Your business has been successfully registered';
        $msgClass = 'alert-success';
        $password = md5($password1);
        $sql = "INSERT INTO vendors_details (businessName, product, state, address, phone, email, password)  VALUES ('$businessName', '$product', '$state', '$address', '$phone', '$email', '$password')";
        mysqli_query($db, $sql);
        
    
       
    }
 
  
}


?>