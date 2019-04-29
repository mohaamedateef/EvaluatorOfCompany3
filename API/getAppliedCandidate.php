<?php
namespace APP\Evaluator_component;

/*	header('Content-Type: application/json');

	include('database.php');
	include('appliedcandidate.php');
    $database = new database();
    $AppliedCandidate = new AppliedCandidate($database->connect());
    $ob=new getAppliedCandidate();
    $ob->setAppliedCandidatesObject($AppliedCandidate);
    $ob->RecommendAppliedCandidates();*/
    class getAppliedCandidate
    {
        private $result;
        private $num;
        private $AppliedCandidate_ob;
        public function setAppliedCandidatesObject($ob)
        {
            $this->AppliedCandidate_ob=$ob;
        }
        public function getAppliedCandidatesObject()
        {
            return $this->AppliedCandidate_ob;
        }
        public function getAppliedCandidatesResults()
        {
            return $this->result;
        }
        public function getAppliedCandidatesResultsNumber()
        {
            return $this->num;
        }
        public function RecommendAppliedCandidates()
        {
            $this->result = $this->AppliedCandidate_ob->get_applied_candidate();
            $this->num = $this->result->num_rows;
            if($this->num > 0)
            {
                    $AppliedCandidate_arr = array();
                    $AppliedCandidate_arr['data'] = array();
                    while ($row=mysqli_fetch_array($this->result)) 
                    {
                        extract($row);
                        $arr = array(
                        'fullName' => $row['fullName'],
                        'email' => $row['email'],
                        'mobileNumber' => $row['mobileNumber'],
                        'age' => $row['age'],
                        'gender' =>  $row['gender'],
                        'address' =>  $row['address'],
                        'skills' =>  $row['skills'],
                        'passedQuizzes' => $row['passedQuizzes'],
                        'interests' => $row['interests'],
                        'vacancy' => $row['vacancy']);
                        array_push($AppliedCandidate_arr['data'], $arr);
                    }
                    echo json_encode($AppliedCandidate_arr);
            }
            else
            {
                    echo json_encode(array('message' => 'No Applied Candidates Found.'));
            }
        }
    }
?>