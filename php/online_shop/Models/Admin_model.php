<?php
namespace App\Models;
use CodeIgniter\Model;
class Admin_model extends Model
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
	public function insert_rec($data)
	{
		$builder=$this->$db->table('item');
		
		if($builder->ignore(true)->insert($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function update_rec($id,$data)
	{
		$builder=$this->$db->table('item');
		//$builder->set($data);
		$builder->where('id',$id);
		if($builder->update($data)) return true;
		else return false;
	}
	public function delete_rec($id)
	{
		$builder=$this->$db->table('item');
		if($builder->delete(["id" => $id])) return true;
		else return false;
	}
	public function fetch_items()
	{
		$builder = $this->$db->table('item');
		$builder->join('category','item.category=category.category_id');
		$builder->select('item.*,category.category_name');
		$query=$builder->get();
		return $query->getResult();
	}
	public function fetch_single_item($id)
	{
		$result = false;
		$query = $this->$db->query("select * from item where id=".$id);
		if($query->getNumRows()==1)
		{
			$result=$query->getRowArray();
		}
		return $result;
	}
}
?>