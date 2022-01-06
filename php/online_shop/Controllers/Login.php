<?php
namespace App\Controllers;
use App\Models\Login_model;
class Login extends BaseController
{
	//$obj=''; 
	public $session;
	public function __construct() {
		//helper("form");
		$this->$obj = new Login_model();
		$this->session = session();
	}
	public function index()
	{
		/*echo '<pre>';
		print_r($this->request);*/
		if(session()->get('login_id') > 0)
		{
			//echo 'go';
			return redirect()->to(site_url().'/Admin');
		}
		$data = array();
		if($this->request->getMethod() == "post")
		{
			//print_r($this->request["post"]);
			$username = $this->request->getPost("txtuname");
			$pwd = $this->request->getPost("txtpwd");
			$data['rec']=$this->$obj->check($username,$pwd);
			if($data['rec']!="invalid")
			{
				$this->session->set("login_id",$data['rec']['id']);
				//echo $this->session->get('login_id');
				if($data['rec']['user_type']==0)
					return redirect()->to('/Admin');
				else return redirect()->to('/User');
			}
		}
		echo view("login_view",$data);
	}
	public function logout()
	{
		$this->session->remove('login_id');
		unset($_SESSION['products']);
		return redirect()->to('/Login');
	}
}
?>