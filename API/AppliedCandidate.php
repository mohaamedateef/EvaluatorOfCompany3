<?php
namespace APP\Evaluator_component;

	class AppliedCandidate
	{
		private $conn;
		private $table = 'appliedcandidate';

		public $fullName;
		public $email;
		public $mobileNumber;
		public $age;
		public $gender;
		public $address;
		public $skills;
		public $passedQuizzes;
		public $interests;
		public $vacancy;

		public function __construct($db)
		{
			$this->conn = $db;
		}
		public function get_applied_candidate()
		{
			$query = "SELECT * FROM ".$this->table." WHERE 1 ORDER BY vacancy";
			$stmt=mysqli_query($this->conn,$query);
			return $stmt;
		}
	}
?>