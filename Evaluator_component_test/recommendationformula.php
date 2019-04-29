<?php
	namespace APP\Evaluator_component;

	class recommendationformula{
		private $conn;
		private $table = 'recommendationformula';

		public $formula;
		public $companyname;
		public $companyid;

		public function __construct($db)
		{
			$this->conn = $db;
		}

		public function postformula()
		{
			$query = "INSERT INTO ".$this->table." (fromula, companyname, companyid) VALUES ('".$this->formula."','".$this->companyname."','".$this->companyid."')";
			$this->formula = htmlspecialchars(strip_tags($this->formula));
			$this->companyname = htmlspecialchars(strip_tags($this->companyname));
			$this->companyid = htmlspecialchars(strip_tags($this->companyid));
			if (mysqli_query($this->conn,$query))
			{
				return true;
			}
			printf("Error: %s.\n",$stmt->error);
			return false;
		}
	}

?>