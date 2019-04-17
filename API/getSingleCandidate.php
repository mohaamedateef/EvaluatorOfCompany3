<?php
	header('Content-Type: application/json');

	include('database.php');
	include('recommendcandidates.php');

	$database = new database();
	$db = $database->connect();

	$recommendcandidates = new recommendcandidates ($db);
	
	$recommendcandidates->interests = isset($_GET['interests']) ? $_GET['interests'] : die();
	
	$result = $recommendcandidates->get_recommend_candidate();

	$arr = array();
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
    			$recCandidates_arr =  array('full_name' => $row['full_name'],
									'email' => $row['email'],
									'mobile_number' => $row['mobile_number'],
									'age' => $row['age'],
									'gender' =>  $row['gender'],
									'address' =>  $row['address'],
									'skills' =>  $row['skills'],
									'interests_skill_score' => $row['interests_skill_score'],
									'interests' => $row['interests']);
          		array_push($arr, $recCandidates_arr);
    	}
		print_r(json_encode($arr));
	}
	else
	{
		echo json_encode(array('message' => 'No candidates found with interest'));
	}
?>