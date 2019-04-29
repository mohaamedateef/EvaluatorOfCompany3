<?php
	namespace APP\Evaluator_component;
	//header('Content-Type: application/json');
	//include('database.php');
	//include('recommendquiz.php');
	
	$database=new database();
	$recomQuiz=new recommendquiz($database->connect());
	$ob=new getQuiz();
	$ob->setCompanyName('vodafone');
	$ob->setRecommendQuizObject($recomQuiz);
	$ob->RecommendQuiz();
	class getQuiz
	{
		private $company_name=null;
		private $recommendquiz;
		private $num;
		private $result;
		private $recommendquiz_arr;
		public function setCompanyName($name)
		{
			$this->company_name=$name;
		}
		public function getCompanyName()
		{
			return $this->company_name;
		}
		public function setRecommendQuizObject($ob)
		{
			 $this->recommendquiz=$ob;
		}
		public function getRecommendQuizObject()
		{
			return $this->recommendquiz;
		}
		public function getResultsNumber()
		{
			return $this->num;
		}
		public function getResult()
		{
			return $this->result;
		}
		public function RecommendQuiz()
		{
			$this->result=$this->recommendquiz->get_quizzes($this->company_name);
			$this->num=$this->result->num_rows;
			if($this->num>0)
			{
				$this->recommendquiz_arr = array();
				$this->recommendquiz_arr['data'] = array();
				while ($row=mysqli_fetch_array($this->result)) {
					extract($row);
					$recquiz = array(
		            'id' => $id,
		          	'title' => $title,
		          	'interest' => $interest,
		          	'skills' => $skills,
		          	'gender' => $gender,
		          	'company' => $company);
		          	array_push($this->recommendquiz_arr['data'], $recquiz);
		        }
		        echo json_encode($this->recommendquiz_arr);
		    }
			else
			{
				echo json_encode(
		          array('message' => 'No Recommended quizzes Found.')
		        );
		    }
		}

	}
?>