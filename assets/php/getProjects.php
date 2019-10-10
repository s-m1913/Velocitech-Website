<?php
include 'db_connect.php';

$sql = "SELECT * FROM `projectList`;";
$response = array();
$temp = array();
$result = array();
$stmt = mysqli_query ($conn, $sql);

if (mysqli_num_rows($stmt) > 0) {

	while($row = mysqli_fetch_assoc($stmt)) {

		$temp = ["idProject" => $row["idProject"],
		"projectName" => $row["projectName"],
		"projectIsCurrent " => $row["projectIsCurrent "],
		"projectArchive" => $row["projectArchive"],
		"projectLink" => $row["projectLink"],
		"projectShortDescription" => $row["projectShortDescription"],
		"projectFullDescription" => $row["projectFullDescription"]];

		$result[]=$temp;
	}
	
    $response["success"] = 1;
	$response["data"] = $result;

}else{
	//Some error while fetching data
	$response["success"] = 0;
	$response["message"] = mysqli_error($con);
}
mysqli_close($conn);
echo json_encode($response);
?>
{"success":1,"data":[{"idProject":"1","projectName":"Test Project","projectIsCurrent ":null,"projectArchive":"0","projectLink":"Test Project URL","projectShortDescription":"This is a project header","projectFullDescription":"This is a full project description"}]}