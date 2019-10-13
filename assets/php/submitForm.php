<?php
include 'db_connect.php';

$response = array();
$sql = $_POST["query"];

echo '<h2>',$sql,'</h2>';

if (mysqli_query ($conn, $sql)) {

    $response["success"] = 1;
	
}else{
	//Some error while fetching data
	$response["success"] = 0;
	$response["message"] = mysqli_error($con);
}
mysqli_close($conn);
echo json_encode($response);
?>