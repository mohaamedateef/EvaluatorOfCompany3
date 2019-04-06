<?php
	header('Content-Type: application/json');

	include('database.php');
	include('recommendcompany.php');

	$database = new database();
	$db = $database->connect();

	$recommendcompany = new recommendcompany ($db);
	$result = $recommendcompany->read();
	$num = $result->num_rows;

	if($num > 0){
		$recommendcompany_arr = array();
		$recommendcompany_arr['data'] = array();
		while ($row=mysqli_fetch_array($result)) {
			extract($row);

			$recCompany = array(
            'id' => $id,
          	'name' => $name,
          	'address' => $address,
          	'job' => $job,
          	'salary' => $salary,
          	'timefrom' => $timefrom,
          	'timeto' => $timeto,
          	'interests' => $interests);
            array_push($recommendcompany_arr['data'], $recCompany);
        }
        echo json_encode($recommendcompany_arr);
    }
	else{
		echo json_encode(
          array('message' => 'No Recommended Companies Found.')
        );
    }
?>