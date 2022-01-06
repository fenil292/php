<?php
namespace App\Controllers;
use App\Models\User_model;
class User extends BaseController
{
	public function __construct()
	{
		$this->$obj = new User_model();
		$this->session = session();
	}
	public function index()
	{
		if(!session()->get("login_id") && !session()->get("user_id"))
		{
			return redirect()->to(site_url()."/Login");
		}
		$data=array();
		if($this->request->getMethod()=="post")
		{
			$vno=$this->request->getPost('txtvno');
			$type=$this->request->getPost('vtype');
			$fare=$this->request->getPost('r1');
			$amt=$this->request->getPost('txtamt');
			$date=date("Y-m-d h:i:s");
			$ins=['vehicle_no'=>$vno,'vehicle_type'=>$type,'fare'=>$fare,'amount'=>$amt,'date'=>$date];
			//print_r($ins);
			$data['ins_res']=$this->$obj->insert_transaction($ins);
		}
		$data['vtypes']=$this->$obj->fetch_vehicle_types();
		echo view('User/user_home',$data);
	}
	public function get_amount($fare='',$type='')
	{
		//echo $fare.$type;
		//$response=$this->$obj->fetch_amount($fare,$type);
		//$fare = $this->request->getPost('sfare');
		//$type = $this->request->getPost('stype');
		echo json_encode($this->$obj->fetch_amount($fare,$type));
		//return $this->response->setJSON($response);
	}
}
?>