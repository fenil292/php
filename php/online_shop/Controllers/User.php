<?php
namespace App\Controllers;
use App\Models\User_model;
class User extends BaseController
{
	public function __construct()
	{
		$this->$obj = new User_model();
		$this->session = session();
		if(!session()->get("login_id"))
		{
			return redirect()->to("/Login");
		}
	}
    public function index()
    {
    	if(@$_SESSION['products'])
    	{
    		$p=$_SESSION['products'];
    		//print_r($p);
    	}
    	$data=array();
    	/*echo '<pre>';
    	print_r($this->request);*/
    	$data['category']=$this->$obj->fetch_category();
    	if($this->request->getMethod()=="post")
    	{
    		$id=$this->request->getPost("lstcat");
    		$data['cat']=$id;
    	} else $id = $data['category'][0]->category_id;
    	$data['items']=$this->$obj->fetch_items($id);
        echo view('User/display_item',$data);
    }
    public function add_to_cart($id=0,$name="",$price=0)
    {
    	$products=array();
    	if(@$_SESSION['products']) {
    		//echo 'g';
    		$products = $_SESSION['products'];
    		if(array_key_exists($id, $products)) $products[$id]['qty']+=1;
    		else $products[$id]=["name" => $name,"price" => $price,"qty" => 1];
    		//array_push($products,[$id => ["name" => $name,"price" => $price,"qty" => 1]]);
    		$_SESSION['products']=$products;
    	}
    	else
    	{
    		$products[$id]=["name" => $name,"price" => $price,"qty" => 1];
    		$_SESSION['products']=$products;
   			$p=$_SESSION['products'];
   			
    	}
    	//print_r($p);
    	return redirect()->to("/User");
    	/*array_push($products,["id" => $id,"name" => $name,"price" => $price]);
    	print_r($products);
    	//$_SESSION['pro']=$products;
    	$this->session->set_userdata("prod",$product);
    	if(!session()->get('prod')) echo 'fh';
    	$p=session()->get('prod');
    	//$p=$_SESSION['pro'];
    	print_r($p);*/
    }
    public function view_cart($act="",$id="")
    {
 		$data = array();
 		if(@$_SESSION['products'])
 		{
 			$data['products'] = $_SESSION['products'];
 			if(array_key_exists($id, $data['products'])) {
 				$data['products'][$id]['qty']=($act=="add") ? $data['products'][$id]['qty']+1 : (($data['products'][$id]['qty']>1 && $act=="sub") ? $data['products'][$id]['qty']-1 : $data['products'][$id]['qty']);
 				if($act=="remove") unset($data['products'][$id]);
 				$_SESSION['products']=$data['products'];
 			}
 		} 
    	echo view('User/view_cart',$data);
    }
    public function buy()
    {
    	$data=array();
    	$data['products']=$this->$obj->cal_bill();
    	//print_r($data);
    	echo view('User/buy_view',$data);
    }
}
?>