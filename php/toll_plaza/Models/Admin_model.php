<?php
namespace App\Models;
use CodeIgniter\Model;
class Admin_model extends Model
{
    public function __construct()
    {
    	$this->$db = \Config\Database::connect();
    	
    }
    public function insert_rec($data)
    {
    	$builder=$this->$db->table('fares');
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
		$builder=$this->$db->table('fares');
		//$builder->set($data);
		$builder->where('id',$id);
		if($builder->update($data)) return true;
		else return false;
	}
	public function delete_rec($id)
	{
		$builder=$this->$db->table('fares');
		if($builder->delete(["id" => $id])) return true;
		else return false;
	}
    public function fetch_fares()
    {
    	$query = $this->$db->query("select * from fares");
		$result = array();
		$result = $query->getResult();
		return $result;
    }
    public function fetch_single_fare($id)
	{
		$result = false;
		$query = $this->$db->query("select * from fares where id=".$id);
		if($query->resultID->num_rows==1)
		{
			$result=$query->getResult();
		}
		return $result;
	}
}
?>