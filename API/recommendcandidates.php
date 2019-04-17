<?php
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

		public function __construct($db){
			$this->conn = $db;
		}

		public function get_recommend_candidate(){
			$query = "SELECT * FROM ".$this->table." WHERE interests = '".$this->interests."'";
			$stmt=mysqli_query($this->conn,$query);
			return $stmt;
		}
	}
?>