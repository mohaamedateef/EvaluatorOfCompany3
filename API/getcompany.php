<?php
	namespace APP\Evaluator_component;
	//header('Content-Type: application/json');

	/*include('database.php');
	include('recommendcompany.php');*/
	$database = new database();
	$recommendcompany = new recommendcompany ($database->connect());
	$getcompany_ob=new getCompany();
	$getcompany_ob->setReccomendCompanyObject($recommendcompany);
	$getcompany_ob->RecommendCompanies();
	class getCompany
	{
		private $recommendcompany_ob;
		private $result;
		private $num;
		public function setReccomendCompanyObject($ob)
		{
			$this->recommendcompany_ob=$ob;
		}
		public function getReccomendCompanyObject()
		{
			return $this->recommendcompany_ob;
		}
		public function getResultsNumber()
		{
			return $this->num;
		}
		public function getResult()
		{
			return $this->result;
		}
		public function RecommendCompanies()
		{
			$this->result = $this->recommendcompany_ob->read();	
			$this->num = $this->result->num_rows;
			if($this->num > 0)
			{
					$recommendcompany_arr = array();
					$recommendcompany_arr['data'] = array();
					while ($row=mysqli_fetch_array($this->result)) 
					{
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
			else
			{
				echo json_encode(array('message' => 'No Recommended Companies Found.'));
			}
		}
	}
?>