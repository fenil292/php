<?php
namespace App\Controllers;
use App\Models\Admin_model;
class Admin extends BaseController
{
	public function __construct()
	{
		$this->$obj = new Admin_model();
		$this->session = session();
		

	}
    public function index($id=0)
    {
    	$data=array();
    	if(!session()->get("login_id") && !session()->get("user_id"))
		{
			return redirect()->to(site_url()."/Login");
		}
		if($id>0)
    	{
    		$res=$this->$obj->fetch_single_fare($id);
    		if($res) $data['up_rec']=$res[0];
    	}
    	if($this->request->getMethod()=="post")
    	{
    		$type=$this->request->getPost('vehicle_type');
    		$single=$this->request->getPost('s_rate');
    		$double=$this->request->getPost('d_rate');
    		if($this->request->getPost('submit')=="Insert" || $id==0)
    		{
    			$ins=['vehicle_type'=>$type,'single_rate'=>$single,'double_rate'=>$double];
    			$data['ins_res']=$this->$obj->insert_rec($ins);
    		}
    		else
    		{
    			$up=['vehicle_type'=>$type,'single_rate'=>$single,'double_rate'=>$double];
    			$data['up_res']=$this->$obj->update_rec($id,$up);	
    		}
    	}
    	$data['fares']=$this->$obj->fetch_fares();
        echo view('Admin/admin_home',$data);
    }
    public function delete($id)
	{
		$data=array();
		$data['del_res']=$this->$obj->delete_rec($id);
		return redirect()->to(site_url()."/Admin");
	}
}
?>