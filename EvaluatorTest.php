<?php
	use App\Evaluator_component\database;
	use App\Evaluator_component\getQuiz;
	use App\Evaluator_component\recommendquiz;
	use App\Evaluator_component\recommendcompany;
	use App\Evaluator_component\getcompany;
	use App\Evaluator_component\recommendcandidates;
	use App\Evaluator_component\getSingleCandidate;
	use App\Evaluator_component\AppliedCandidate;
	use App\Evaluator_component\getAppliedCandidate;
	use App\Evaluator_component\recommendationformula;
	use App\Evaluator_component\postformula;

	class EvaluatorTest extends PHPUnit_Framework_TestCase
	{
		//-----------------------------------------------------------------------------------------------------------------------
				// database.php
		public function testCheckConnectionOfDatabase() // for database.php ->use to test connection of database if it Not Null 
		{
			$conn=new Database();
			$this->assertNotNull($conn->connect());
		}
		//-------------------------------------------------------------------------------------------------------------------------
				//recommendQuiz.php
		public function testIfQuizzesAreNotNull() //for recommendQuiz.php -> test get_quizzes if are not null
		{
			$conn=new Database();
			$recommendquizOb=new recommendquiz($conn->connect());
			$this->assertNotNull($recommendquizOb->get_quizzes(""));
			$this->assertNotNull($recommendquizOb->get_quizzes("Vodafone"));
		}
		//--------------------------------------------------------------------------------------------------------------------------
				//getQuiz.php testing
		public function testIFComapnyNameISEqual() //for getQuiz.php->test setCompanyName and getCompanyName functions   
		{
			$ob=new getQuiz();
			$ob->setCompanyName('Vodafone');
			$this->assertEquals('Vodafone',$ob->getCompanyName());
		}
		public function testIfRecommendQuizOjectISNotNull() //for getuiz.php ->test setRecommendQuizObject and getRecommendQuizObject functions
		{															
			$conn=new Database();
			$recommendquizOb=new recommendquiz($conn->connect());
			$ob=new getQuiz();
			$ob->setRecommendQuizObject($recommendquizOb);
			$this->assertNotNull($ob->getRecommendQuizObject());
		}
		public function testIfResultIsNotNull()//for getuiz.php ->test RecommendQuiz , getResult and getResultsNumber functions
 		{
			$conn=new Database();
			$recommendquizOb=new recommendquiz($conn->connect());
			$ob=new getQuiz();
			$ob->setRecommendQuizObject($recommendquizOb);
			$ob->setCompanyName("orange");
			$ob->RecommendQuiz();
			$this->assertNotNull($ob->getResult());
			$this->assertNotEquals(0,$ob->getResultsNumber());
		}
		public function testIfResultIsNull()//for getuiz.php ->test RecommendQuiz , getResult and getResultsNumber functions
 		{
			$conn=new Database();
			$recommendquizOb=new recommendquiz($conn->connect());
			$ob=new getQuiz();
			$ob->setRecommendQuizObject($recommendquizOb);
			$ob->setCompanyName(null);
			$ob->RecommendQuiz();
			$this->assertNotNull($ob->getResult());
			$this->assertEquals(0,$ob->getResultsNumber());
		}
		//----------------------------------------------------------------------------------------------------------------------------------
					//recommendcompany.php
		public function testIfCompaniesAreNotNull() //for recommendcompany.php -> test get_companies  are not null
		{
			$conn=new Database();
			$recommendCompanyOb=new recommendcompany($conn->connect());
			$this->assertNotNull($recommendCompanyOb->read(""));
			$this->assertNotNull($recommendCompanyOb->read("Vodafone"));
		}
		//-----------------------------------------------------------------------------------------------------------------------------------
					//getcompany.php
		public function testIfRecommendCompanyOfjectISNotNull() //for getcompany.php ->test setRecommendCompanyObject and 																			getRecommendCompanyObject functions
		{															
			$conn=new Database();
			$recommendCompanyOb=new recommendcompany($conn->connect());
			$ob=new getCompany();
			$ob->setReccomendCompanyObject($recommendCompanyOb);
			$this->assertNotNull($ob->getReccomendCompanyObject());
		}
		public function testIfResultsOFCompanyIsNotNull()//for getcompany.php ->test RecommendCompany , getResultOfCompany and 																	getResultsNumberOfCompany functions
 		{
			$conn=new Database();
			$recommendCompanyOb=new recommendCompany($conn->connect());
			$ob=new getCompany();
			$ob->setReccomendCompanyObject($recommendCompanyOb);
			$ob->recommendCompanies();
			$this->assertNotNull($ob->getResult());
			$this->assertNotEquals(0,$ob->getResultsNumber());
		}
		//----------------------------------------------------------------------------------------------------------------------------------
					//recommendcandidates.php
		public function testIfGetAndSetSkillsAreSame()
		{
			$conn=new Database();
			$recomm_candid=new recommendcandidates($conn->connect());
			$recomm_candid->setSkills("java");
			$this->assertEquals("java",$recomm_candid->getSkills());	
		}
		public function testIfRecommendedCandidatesIsNotNull() 
		{
			$conn=new Database();
			$recomm_candid=new recommendcandidates($conn->connect());
			$recomm_candid->setSkills("java");
			$this->assertNotNull($recomm_candid->get_recommend_candidate());
			$recomm_candid->setSkills(null);
			$this->assertNotNull($recomm_candid->get_recommend_candidate());
		}
		//----------------------------------------------------------------------------------------------------------------------------------
						//getSingleCandidate.php
		public function testIfRecommendCandidatesOjectISNotNull() 
		{															
			$conn=new Database();
			$recommendCandidatesOb=new recommendcandidates($conn->connect());
			$ob=new getSingleCandidate();
			$ob->setRecommendCandidatesObject($recommendCandidatesOb);
			$this->assertNotNull($ob->getRecommendCandidatesObject());
		}
		public function testIfResultofSingleCandidateIsNotNull()
 		{
			$conn=new Database();
			$recommendCandidatesOb=new recommendcandidates($conn->connect());
			$recommendCandidatesOb->setSkills("java");
			$ob=new getSingleCandidate();
			$ob->setRecommendCandidatesObject($recommendCandidatesOb);
			$ob->RecommendSingeleCandidates();
			$this->assertNotNull($ob->getCandidatesResults());
			$this->assertNotEquals(0,$ob->getCandidatesResultsNumber());
		}
		public function testIfResultofSingleCandidateIsNull()
 		{
			$conn=new Database();
			$recommendCandidatesOb=new recommendcandidates($conn->connect());
			$recommendCandidatesOb->setSkills(null);
			$ob=new getSingleCandidate();
			$ob->setRecommendCandidatesObject($recommendCandidatesOb);
			$ob->RecommendSingeleCandidates();
			$this->assertNotNull($ob->getCandidatesResults());
			$this->assertEquals(0,$ob->getCandidatesResultsNumber());
		}
		//-------------------------------------------------------------------------------------------------------------------------------
					//AppliedCandidate.php
		public function testIfAppliedCandidatesAreNotNull() 
		{
			$conn=new Database();
			$AppliedCandidate_Ob=new AppliedCandidate($conn->connect());
			$this->assertNotNull($AppliedCandidate_Ob->get_applied_candidate());
		}
		//---------------------------------------------------------------------------------------------------------------------------------
					//getAppliedCandidate.php
		public function testIfAppliedCandidatesOjectISNotNull() 
		{															
			$conn=new Database();
			$AppliedCandidate_Ob=new AppliedCandidate($conn->connect());
			$ob=new getAppliedCandidate();
			$ob->setAppliedCandidatesObject($AppliedCandidate_Ob);
			$this->assertNotNull($ob->getAppliedCandidatesObject());
		}
		public function testIfResultofAppliedCandidateIsNotNull()
 		{
			$conn=new Database();
			$AppliedCandidate_Ob=new AppliedCandidate($conn->connect());
			$ob=new getAppliedCandidate();
			$ob->setAppliedCandidatesObject($AppliedCandidate_Ob);
			$ob->RecommendAppliedCandidates();
			$this->assertNotNull($ob->getAppliedCandidatesResults());
			$this->assertNotEquals(0,$ob->getAppliedCandidatesResultsNumber());
		}
		//---------------------------------------------------------------------------------------------------------------------------------
					//postformula.php
		public function testIfRecommendationFormulaOjectISNotNull() 
		{															
			$conn=new Database();
			$RecommendationFormula_ob=new recommendationformula($conn->connect());
			$ob=new postformula();
			$ob->setRecommendationFormulaObject($RecommendationFormula_ob);
			$this->assertNotNull($ob->getRecommendationFormulaObject());
		}
		public function testIfGetDataISNotNull() 
		{															
			$conn=new Database();
			$RecommendationFormula_ob=new recommendationformula($conn->connect());
			$ob=new postformula();
			//$ob->applyPost();
			$this->assertNull($ob->getData());
		}
		//----------------------------------------------------------------------------------------------------------------------------------
	}
?>