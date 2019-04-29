<?php
	namespace APP\Evaluator_component;
	class recommendcompany
	{
		private $conn;
		private $table = 'recommendcompany';
		public $name;
		public $address;
		public $job;
		public $salary;
		public $timefrom;
		public $timeto;
		public $interests;

		public function __construct($db)
		{
			$this->conn = $db;
		}

		public function read(){
			$query = 'SELECT * FROM '.$this->table.'';
			$stmt=mysqli_query($this->conn,$query);
			return $stmt;
		}
	}
?>