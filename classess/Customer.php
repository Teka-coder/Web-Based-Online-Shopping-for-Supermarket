
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>


<?php

class Customer{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
	}
public function customerRegistration($data){

$name = mysqli_real_escape_string($this->db->link, $data['name']);
$address = mysqli_real_escape_string($this->db->link, $data['address']);
$city = mysqli_real_escape_string($this->db->link, $data['city']);
$street = mysqli_real_escape_string($this->db->link, $data['street']);
$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
$email = mysqli_real_escape_string($this->db->link, $data['email']);
$pass = mysqli_real_escape_string($this->db->link, ($data['pass']));
$secretQuest = mysqli_real_escape_string($this->db->link, $data['secretQuest']);
$secretAns = mysqli_real_escape_string($this->db->link, ($data['secretAns']));


if ($name == "" || $address == "" || $city == "" || $street == "" || $zip == "" || $phone == "" || $email == "" || $pass == "" || $secretQuest == "" || $secretAns == "") {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}

  $mailquery = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
  $mailchk = $this->db->select($mailquery);
  if ($mailchk != false) {
  	$msg = "<span class='error'>Email already exist !</span>";
	return $msg;
  }else{


  	 $query = "INSERT INTO tbl_customer(name,address,city,street,zip,phone,email,pass,secretQuest,secretAns) VALUES('$name','$address','$city','$street','$zip','$phone','$email','$pass', '$secretq', '$secretans')";

	 $inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				$msg = "<span class='success'>Customer Data inserted Successfully.</span>";
				return $msg;
			} else{
				$msg = "<span class='error'>Customer Data Not inserted.</span>";
				return $msg;
		}
  }
}

public function customerLogin($data){
$email = mysqli_real_escape_string($this->db->link, $data['email']);
$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
if (empty($email) || empty($pass)) {
$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}
$query = "SELECT * FROM tbl_customer WHERE email = '$email' AND pass = '$pass'";
$result = $this->db->select($query);
if ($result != false) {
	$value = $result->fetch_assoc();
	Session::set("cuslogin",true);
	Session::set("cmrId",$value['id']);
	Session::set("cmrName",$value['name']);
	header("Location:cart.php");

}else{
	$msg = "<span class='error'>Email or Password not matched !</span>";
				return $msg;
}
}

public function getCustomerData($id){
	$query = "SELECT * FROM tbl_customer WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
}

public function getAllCustomer()
	{
	$query = "SELECT * FROM tbl_customer ORDER BY id DESC";
	$result = $this->db->select($query);
	return $result;
	}

public function customerUpdate($data,$cmrId){

$name = mysqli_real_escape_string($this->db->link, $data['name']);
$address = mysqli_real_escape_string($this->db->link, $data['address']);
$city = mysqli_real_escape_string($this->db->link, $data['city']);
$street = mysqli_real_escape_string($this->db->link, $data['street']);
$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
$email = mysqli_real_escape_string($this->db->link, $data['email']);
$secretQuest = mysqli_real_escape_string($this->db->link, $data['secretQuest']);
$secretAns = mysqli_real_escape_string($this->db->link, $data['secretAns']);
$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));


if ($name == "" || $address == "" || $city == "" || $street == "" || $zip == "" || $phone == "" || $email == "" || $secretQuest == "" || $secretAns == "") {
	
	$msg = "<span class='error'>Fields must not be empty !</span>";
	return $msg;
}else{


  	 $query = "INSERT INTO tbl_customer(name,address,city,street,zip,phone,email,secretQuest,secretAns,pass) VALUES('$name','$address','$city','$street','$zip','$phone','$email','$secretQuest', '$secretAns','$pass')";

	$query = "UPDATE tbl_customer

	SET
	name = '$name',
	address = '$address', 
	city = '$city', 
	street = '$street', 
	zip = '$zip', 
	phone = '$phone', 
	email = '$email',
	secretQuest='$secretQuest',
	secretAns='$secretAns',
    pass='$pass'

	WHERE id = '$cmrId'";

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


public function delCustoById($id){
 	$query = "DELETE FROM tbl_customer WHERE id = '$id'";
	$deldata = $this->db->delete($query);
	if ($deldata) {
		$msg = "<span class='success'>Customer Deleted Successfully.</span>";
				return $msg;
	}else{
$msg = "<span class='error'>Customer Not Deleted !</span>";
				return $msg;

	}
     }

}


?>