<?php
namespace App\Models;
use CodeIgniter\Model;
class Login_model extends Model
{
	public function __construct()
	{
		$this->$db = \Config\Database::connect();	
	}
	
	public function check($username,$pass)
	{
		$result = "invalid";
		$query = $this->$db->query("select * from login where username='".$username."' and pwd='".$pass."'");
		if($query->getNumRows()==1)
		{
			$result=$query->getRowArray();
		}
		return $result;
	}
}
?>