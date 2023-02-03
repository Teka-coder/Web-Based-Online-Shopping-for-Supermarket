<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session2.php');
Session2::checkLogin();

include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>
<?php


class Salesmanlogin
{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function salesmanlogin($salesmanUser,$salesmanPassword){

$salesmanUser = $this->fm->validation($salesmanUser);
$salesmanPassword = $this->fm->validation($salesmanPassword);

$salesmanUser = mysqli_real_escape_string($this->db->link, $salesmanUser);
$salesmanPassword = mysqli_real_escape_string($this->db->link, $salesmanPassword);

if (empty($salesmanUser) ||empty($salesmanPassword) ) {
	
	$loginmsg = "Username or Password must not be empty !";
	return $loginmsg;
		} else{


			$query = "SELECT * FROM tbl_salesman WHERE salesmanUser = '$salesmanUser'
			AND salesmanPassword = '$salesmanPassword'";

			$result = $this->db->select($query);

			if ($result != false) {
				$value = $result->fetch_assoc();

				Session2::set("salesmanlogin",true);
				Session2::set("Id",$value['Id']);
				Session2::set("salesmanUser",$value['salesmanUser']);
				Session2::set("salesmanName",$value['salesmanName']);

				header("Location:dashboard2.php");
			} else{
				$loginmsg = "Username or Password not match !";
				return $loginmsg;
			}


		}

	}
}


?>