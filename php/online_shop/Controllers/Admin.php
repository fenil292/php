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
		if(!session()->get("login_id"))
		{
			return redirect()->to("/Login");
		}
		$data=array();
		
		$data['validation']=null;
		$rules = [
			'photo' => 'uploaded[photo]|ext_in[photo,png,jpg,jpeg]'
		];
		if($id>0)
		{
			$data["up_rec"]=$this->$obj->fetch_single_item($id);
		}
		if($this->request->getMethod()=="post")
		{
			$file = $this->request->getFile('photo');
			$name = $this->request->getPost('txtname');
			$price = $this->request->getPost('txtprice');
			$qty = $this->request->getPost('txtqty');
			$cat_id=$this->request->getPost('lstcat');
			//echo $this->request->getPost('submit');
			if($this->request->getPost('submit')=="Insert" || $id == 0) {
				if($this->validate($rules))
				{
					//echo 'hhh';
					$newfile = $file->getRandomName();
					
					if($file->move('product_image/',$newfile))
					{
						$ins = ['name'=>$name,'price'=>$price,'quantity'=>$qty,'category'=>$cat_id,'image'=>$newfile];		
						$data['ins_res']=$this->$obj->insert_rec($ins);
					}
					else
					{
						//echo 'fdf';
						echo $file->getError();
					}
				}
				else
				{
					$data['validation']=$this->validator;
				}
			} else {
				//echo 'update';
				$up = ['name'=>$name,'price'=>$price,'quantity'=>$qty,'category'=>$cat_id];
				$data['up_res']=$this->$obj->update_rec($id,$up);
			}
		}
		//print_r($data);
		$data['rec']=$this->$obj->fetch_category();
		$data['items']=$this->$obj->fetch_items();
		echo view("Admin/home_view",$data);
	}
	/*public function update($id)
	{
		$data=array();
		$data['rec']=$this->$obj->fetch_category();
		$data['items']=$this->$obj->fetch_items();
		if($id>0)
		{
			$data["up_rec"]=$this->$obj->fetch_single_item($id);
		}
		echo view("Admin/home_view",$data);
	}*/
	public function delete($id)
	{
		$data=array();
		$data['del_res']=$this->$obj->delete_rec($id);
		return redirect()->to(site_url()."/Admin");
	}
}
?>