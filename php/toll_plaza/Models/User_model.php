<?php
namespace App\Models;
use CodeIgniter\Model;
class User_model extends Model
{
	public function __construct()
	{
		$this->$db = \Config\Database::connect();
	}
	public function fetch_vehicle_types()
	{
		$query = $this->$db->query("select vehicle_type from fares");
		$result = array();
		$result = $query->getResult();
		return $result;
	}
	public function fetch_amount($fare="",$type="")
	{
		$q='';
		if($fare=='Single') $q="select single_rate as rate from fares where vehicle_type='".$type."'";
		else if($fare=='Double') $q="select double_rate as rate from fares where vehicle_type='".$type."'";
		if($q!='')
		{
			$query = $this->$db->query($q);
			$result = array();
			$result = $query->getResult();
			return $result;	
		}
		return $q;
	}
	public function insert_transaction($data)
	{
		//print_r($data);
		$builder=$this->$db->table('transaction');
    	if($builder->insert($data))
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
	}
	
}
?>