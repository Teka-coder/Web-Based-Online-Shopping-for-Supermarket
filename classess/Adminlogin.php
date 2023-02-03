
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
Session::checkLogin();

include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>



<?php


class Adminlogin
{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function adminlogin($adminUser,$adminPassword){

$adminUser = $this->fm->validation($adminUser);
$adminPassword = $this->fm->validation($adminPassword);

$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
$adminPassword = mysqli_real_escape_string($this->db->link, $adminPassword);

if (empty($adminUser) ||empty($adminPassword) ) {
	
	$loginmsg = "Username or Password must not be empty !";
	return $loginmsg;
		} else{


			$query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser'
			AND adminPassword = '$adminPassword'";

			$result = $this->db->select($query);

			if ($result != false) {
				$value = $result->fetch_assoc();

				Session::set("adminlogin",true);
				Session::set("adminId",$value['adminId']);
				Session::set("adminUser",$value['adminUser']);
				Session::set("adminName",$value['adminName']);

				header("Location:dashboard.php");
			} else{
				$loginmsg = "Username or Password not match !";
				return $loginmsg;
			}


		}

	}

	public function adminUpdate($data,$admId){

$adminname = mysqli_real_escape_string($this->db->link, $data['adminName']);
$adminuser = mysqli_real_escape_string($this->db->link, $data['adminUser']);
$email = mysqli_real_escape_string($this->db->link, $data['adminEmail']);
$password = mysqli_real_escape_string($this->db->link, $data['adminPassword']);
$secretword = mysqli_real_escape_string($this->db->link, $data['secretWord']);
$secretnumber = mysqli_real_escape_string($this->db->link, $data['secretNumber']);



if ($adminname == "" || $adminuser == "" || $email == "" || $password == "" || $secretword == "" || $secretnumber == "" ) {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}else{


  	 $query = "INSERT INTO tbl_admin(adminName,adminUser,adminEmail,adminPassword,secretWord,secretNumber) VALUES('$adminname','$adminuser','$email','$password','$secretword','$secretnumber')";

	$query = "UPDATE tbl_admin

	SET
	adminName = '$adminname',
	adminUser = '$adminuser', 
	adminEmail = '$email', 
	adminPassword = '$password', 
	secretWord = '$secretword', 
	secretNumber = '$secretnumber'
	

	WHERE adminId = '$admId'";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		$msg = "<span class='success'>Customer Data Updated Successfully.</span>";
				return $msg;
	} else{
			$msg = "<span class='error'>Customer Data Not Updated !</span>";
				return $msg;
	}
  }
}
}


?>