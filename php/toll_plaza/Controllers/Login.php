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
			return redirect()->to(site_url().'/Admin');
		}
		else if(session()->get('user_id') > 0)
		{
			return redirect()->to(site_url().'/User');
		}
		$data = array();
		if($this->request->getMethod() == "post")
		{
			//print_r($this->request["post"]);
			$username = $this->request->getPost("txtuname");
			$pwd = $this->request->getPost("txtpwd");
			$data['rec']=$this->$obj->check($username,$pwd);
			print_r($data);
			if($data['rec'])
			{
				
				//echo $this->session->get('login_id');
				if($data['rec'][0]->user_type==1)
				{
					$this->session->set("login_id",$data['rec'][0]->id);
					return redirect()->to(site_url().'/Admin');
				}
				else 
				{
					$this->session->set("user_id",$data['rec'][0]->id);
					return redirect()->to(site_url().'/User');
				}
			}
		}
		echo view("login_view",$data);
	}
	public function logout()
	{
		$this->session->remove('login_id');
		$this->session->remove('user_id');
		return redirect()->to(site_url().'/Login');
	}
}
?>