<?php
	header('Content-Type: application/json');
 	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');

	include('database.php');
	include('recommendationformula.php');

	$database = new database();
	$db = $database->connect();

	$recommendationformula= new recommendationformula ($db);

	$data = json_decode(file_get_contents("php://input"));
	$recommendationformula->formula = $data->formula;
	$recommendationformula->companyname = $data->companyname;
	$recommendationformula->companyid = $data->companyid;

	// Create post formula
	if($recommendationformula->postformula())
	{
		echo json_encode(array('message' => 'Posted Succesfully'));
	}
	else
	{
		echo json_encode(array('message' => 'Post Failed'));
	}
?>