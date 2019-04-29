<?php
	namespace APP\Evaluator_component;
	class recommendcandidates{
		private $conn;
		private $table = 'recommendcandidates';

		public $fullName;
		public $email;
		public $mobileNumber;
		public $age;
		public $gender;
		public $address;
		public $skills;
		public $interestsSkillScore;
		public $interests;

		public function __construct($db)
		{
			$this->conn = $db;
		}
		public function setSkills($temp)
		{
			$this->skills=$temp;
		}
		public function getSkills()
		{
			return $this->skills;
		}
		public function get_recommend_candidate()
		{
			$query = "SELECT * FROM ".$this->table." WHERE skills = '".$this->skills."'";
			$stmt=mysqli_query($this->conn,$query);
			return $stmt;
		}
	}
?>