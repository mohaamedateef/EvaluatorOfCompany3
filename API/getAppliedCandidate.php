<?php
	header('Content-Type: application/json');

	include('database.php');
	include('appliedcandidate.php');

	$database = new database();
	$db = $database->connect();

	$AppliedCandidate = new AppliedCandidate ($db);
	$result = $AppliedCandidate->get_applied_candidate();
	$num = $result->num_rows;

	if($num > 0){
		$AppliedCandidate_arr = array();
		$AppliedCandidate_arr['data'] = array();
		while ($row=mysqli_fetch_array($result)) {
			extract($row);

			$arr = array(
                        'fullName' => $row['fullName'],
                        'email' => $row['email'],
                        'mobileNumber' => $row['mobileNumber'],
                        'age' => $row['age'],
                        'gender' =>  $row['gender'],
                        'address' =>  $row['address'],
                        'skills' =>  $row['skills'],
                        'passedQuizzes' => $row['passedQuizzes'],
                        'interests' => $row['interests'],
                        'vacancy' => $row['vacancy']);
            array_push($AppliedCandidate_arr['data'], $arr);
        }
        echo json_encode($AppliedCandidate_arr);
    }
	else{
		echo json_encode(
          array('message' => 'No Applied Candidates Found.')
        );
    }
?>