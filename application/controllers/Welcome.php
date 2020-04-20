<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function validateUser()
	{
		$this->load->model('LoginModel');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result=$this->LoginModel->checkUser($username);
		$session_start_id=rand();

		if($password == $result['password']){
			$device_id=$this->LoginModel->populateDeviceData();
			$location_id=$this->LoginModel->populateLocationData();
			$this->LoginModel->loadSessionData($result['user_id'],$device_id,$location_id,$session_start_id);
			$session_id=$this->LoginModel->fetchLastSessionId($result['user_id']);
			$data['user_info']=$result['user_id'];
			$data['session_id']=$session_id;
			$this->load->view('dashboard',$data);
		}
		else{
			$this->load->view('login');
		}
	}

	public function loadTab()
	{
		$this->load->model('LoginModel');
	}

	public function loadDashboard()
	{
		$this->load->view('dashboard');
	}

	public function storetext()
	{
		$user_id=$this->input->post('userId');
		$data=$this->input->post('exampleFormControlTextarea1');
		$this->load->model('LoginModel');
		$document_id=$this->LoginModel->storeSLA($user_id,$data);
		$company_name=shell_exec('echo "ashoka2601" | sudo python3 /Users/darpitchaudhary/Desktop/Python/textAnalysis.py '.$document_id);
		
		$this->LoginModel->storeCompanyName($document_id,$company_name);

		$output=shell_exec('echo "ashoka2601" | sudo python3 /Users/darpitchaudhary/Desktop/Python/DatabaseConnectivity.py '.$document_id);

		$summary=shell_exec('echo "ashoka2601" | sudo python3 /Users/darpitchaudhary/Desktop/Python/summariseClause.py '.$document_id);

		if(!empty($output)){
			$data=$this->LoginModel->fetchAnalyzedSenetences($document_id);
			$data['analysisData']=$data;
			$sumData=$this->LoginModel->fetchSummary($document_id);
			$score=$this->LoginModel->getScore($document_id);
			$data['summary']=$sumData;
			$data['score']=$score;
			$this->load->view('document',$data);
		}
		
	}

	public function logout()
	{
		$this->load->model('LoginModel');
		$result=$_GET['var'];
		$data=explode(",",$result);
		$user_id=$data[0];
		$session_id=$data[1];
		$this->LoginModel->setLogoutSessionTime($user_id,$session_id);
		$this->load->view('login');
	}

	public function finalResult()
	{
		print_r($_POST);
		echo "Came here";
		die;
	}


}
