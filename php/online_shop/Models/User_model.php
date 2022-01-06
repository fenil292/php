<?php
namespace App\Models;
use CodeIgniter\Model;
class User_model extends Model
{
	public function __construct()
	{
		$this->$db = \Config\Database::connect();
	}
	public function fetch_category()
	{
		$query = $this->$db->query("select * from category");
		$result = array();
		$result = $query->getResult();
		return $result;
	}
	public function fetch_items($id=0)
	{
		$builder = $this->$db->table('item');
		$builder->join('category','item.category=category.category_id');
		$builder->select('item.*,category.category_name');
		$builder->where('category.category_id',$id);
		$query=$builder->get();
		return $query->getResult();
	}
	public function cal_bill()
	{
		$result = false;
		if(@$_SESSION['products'])
		{

			$p=$_SESSION['products'];
			$result=array();
			foreach ($p as $id => $v) {
				/*$builder = $this->$db->table('item');
				$builder->select('image');
				$builder->where('id',$id);
				$query=$builder->get();
				$rec=$builder->getRowArray();*/
				$query = $this->$db->query("select image from item where id=".$id);
				$rec=$query->getRowArray();
				array_push($v, $rec['image']);
				$result[$id]=$v;
			}
		}
		return $result;
	}
}
?>