<?php
	namespace APP\Evaluator_component;

//	header('Content-Type: application/json');
 //	header('Access-Control-Allow-Methods: POST');
	//header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');

	/*include('database.php');
	include('recommendationformula.php');
	$database = new database();
	$recommendationformula= new recommendationformula ($database->connect());
	$ob=new postformula();
	$ob->setRecommendationFormulaObject($recommendationformula);
	$ob->setData();
	$ob->applyPost();*/
	class postformula
	{
		private $recommendationformula;
		private $data;
		public function setRecommendationFormulaObject($ob)
		{
			$this->recommendationformula=$ob;
		}
		public function getRecommendationFormulaObject()
		{
			return $this->recommendationformula;
		}
		public function getData()
		{
			return $this->data;
		}
		public function applyPost()
		{

			$this->data =json_decode(file_get_contents("php://input"));
			$this->recommendationformula->formula = $this->data->formula;
			$this->recommendationformula->companyname = $this->data->companyname;
			$this->recommendationformula->companyid = $this->data->companyid;
				if($this->recommendationformula->postformula())
				{
					echo json_encode(array('message' => 'Posted Succesfully'));
				}
				else
				{
					echo json_encode(array('message' => 'Post Failed'));
				}
		}
	}
?>