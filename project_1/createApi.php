<?php
header("Content-Type: application/json; charset=UTF-8");

include_once('connection.php');

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->name) && !empty($data->email) && !empty($data->contact) && !empty($data->address) && !empty($data->country))
{
    $name    =  htmlspecialchars(strip_tags($data->name));
    $email   =  htmlspecialchars(strip_tags($data->email));
    $contact =  htmlspecialchars(strip_tags($data->contact));
    $address =  htmlspecialchars(strip_tags($data->address));
    $country =  htmlspecialchars(strip_tags($data->country));
    
    
    $sql = "INSERT INTO `customers`(`name`, `email`, `contact`, `address`, `country`) VALUES ('$name','$email','$contact','$address','$country')";
    
    $result = mysqli_query($con, $sql);

    if($result)
    {
        $response["status"] = "true";
        $response["message"] = "Data is inserted.";

    }else
    {
        $response["status"] = "false";
        $response["message"] = "NO Data is inserted.";
    }


}else
{
    $response["status"] = "false";
    
}
echo json_encode($response);
exit;

?>
