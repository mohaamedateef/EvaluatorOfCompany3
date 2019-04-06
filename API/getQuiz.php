<?php
	$company_name="vodafone";
	header('Content-Type: application/json');

include('database.php');
	include('recommendquiz.php');

	$database = new database();
	$db = $database->connect();

	$recommendquiz=new recommendquiz($db);
	$result=$recommendquiz->get_quizzes($company_name);
	$num=$result->num_rows;

	if($num>0){
		$recommendquiz_arr = array();
		$recommendquiz_arr['data'] = array();
		while ($row=mysqli_fetch_array($result)) {
			extract($row);
			$recquiz = array(
            'id' => $id,
          	'title' => $title,
          	'interest' => $interest,
          	'skills' => $skills,
          	'gender' => $gender,
          	'company' => $company);
          	array_push($recommendquiz_arr['data'], $recquiz);
        }
        echo json_encode($recommendquiz_arr);
    }
	else{
		echo json_encode(
          array('message' => 'No Recommended quizzes Found.')
        );
    }
?>