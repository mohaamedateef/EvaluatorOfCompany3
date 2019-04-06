<?php
 class recommendquiz
 {
 	private $conn;
 	private $table='recommendquiz';
 	public $title;
 	public $id;
 	public $interest;
 	public $skills;
 	public $gender;
 	public $company;
 	public function __construct($db)
 	{
 		$this->conn=$db;
 	}
 	public function get_quizzes($name)
 	{
 		$query=" SELECT * FROM $this->table WHERE company='$name' ";
 		$rows=mysqli_query($this->conn,$query);
 		return $rows;
 	}
 }
?>