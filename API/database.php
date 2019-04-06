<?php
	class Database
	{
		private $host = 'localhost';
		private $username = 'root';
		private $dbname = 'evaluatordb';
		private $password ='';
		private $conn;

		public function connect(){
			$this->conn=null;
			try{
				$this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->dbname);
			}
			catch(PDOException $e){
				echo "Connection Error.";
			}
			return $this->conn; 
		}

	}
?>