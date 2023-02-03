
<?php
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>



<?php


class Salesmanadd
{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function userRegistration($data){

$name = mysqli_real_escape_string($this->db->link, $data['salesmanName']);
$username = mysqli_real_escape_string($this->db->link, $data['salesmanUser']);
$email = mysqli_real_escape_string($this->db->link, $data['salesmanEmail']);
$password = mysqli_real_escape_string($this->db->link, $data['salesmanPassword']);
$level = mysqli_real_escape_string($this->db->link, $data['level']);



if ($name == "" || $username == "" || $email == "" || $password == "" || $level == "") {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}

  $mailquery = "SELECT * FROM tbl_salesman WHERE salesmanEmail = '$email' LIMIT 1";
  $mailchk = $this->db->select($mailquery);
  if ($mailchk != false) {
  	$msg = "<span class='error'>Email already exist !</span>";
	return $msg;
  }else{


  	 $query = "INSERT INTO tbl_salesman(salesmanName,salesmanUser,salesmanEmail,salesmanPassword,level) VALUES('$name','$username','$email','$password','$level')";

	 $inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				$msg = "<span class='success'>User Data inserted Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>User Data Not inserted.</span>";
				return $msg;
		}
  }
}


public function getAllSalesman()
	{
	$query = "SELECT * FROM tbl_salesman ORDER BY Id DESC";
	$result = $this->db->select($query);
	return $result;
	}

	
	public function delSmanById($id){
 	$query = "DELETE FROM tbl_salesman WHERE Id = '$id'";
	$deldata = $this->db->delete($query);
	if ($deldata) {
		$msg = "<span class='success'>User Deleted Successfully.</span>";
				return $msg;
	}else{
$msg = "<span class='error'>User Not Deleted !</span>";
				return $msg;

	}
     }
}


?>