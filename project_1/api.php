<?php

header("Content-Type:application/json");
include_once('connection.php');

if(isset($_GET['id']) && $_GET['id'] != "")
{
    $customer_id = $_GET['id'];
    $query = "SELECT * FROM customers WHERE id = $customer_id";
    $result = myslqi_query($con, $query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $customerData['id'] = $row['id'];
    $customerData['name'] = $row['name'];
    $customerData['email'] = $row['email'];
    $customerData['contact'] = $row['contact'];
    $customerData['address'] = $row['address'];
    $customerData['country'] = $row['country'];

    $response["status"] = "true";
    $response["message"] = "Customer Details";
    $response["customer"] = $customerData ;

}else{
    
    $response["status"]= "false";
    $response["message"] = "No customer(s) found!";
} 

echo json_encode($response);
exit;


?>