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
		$result=$query->getResult();
		if(count($result)==1)
		{
			return $result;
		}
		return false;
	}
}
?>