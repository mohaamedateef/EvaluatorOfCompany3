<?php
	namespace APP\Evaluator_component;
	/*header('Content-Type: application/json');

	include('database.php');
	include('recommendcandidates.php');
	$database = new database();
	$recom_candid=new recommendcandidates($database->connect());
	$recom_candid->setSkills('Java');
	$ob=new getSingleCandidate();
	$ob->setRecommendCandidatesObject($recom_candid);
	$ob->RecommendSingeleCandidates(); */
	class getSingleCandidate
	{
		private $recommendcandidates_ob;
		private $result;
		private $num;
		public function setRecommendCandidatesObject($ob)
		{
			$this->recommendcandidates_ob=$ob;
		}
		public function getRecommendCandidatesObject()
		{
			return $this->recommendcandidates_ob;
		}
		public function getCandidatesResults()
		{
			return $this->result;
		}
		public function getCandidatesResultsNumber()
		{
			return $this->num;
		}
		public function RecommendSingeleCandidates()
		{
				$this->result = $this->recommendcandidates_ob->get_recommend_candidate();
				$this->num=$this->result->num_rows;
				$arr = array();
				if ($this->num > 0) 
				{
    				while($row = $this->result->fetch_assoc()) 
    				{
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
			}
	}
?>