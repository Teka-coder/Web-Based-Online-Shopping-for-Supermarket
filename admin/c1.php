<?php session_start();?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Change password</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>

	<div class="body">
		<div>
			<div>
				<div>
					<div class="programs">
						<h2>COLLEGE OF BUSINESS AND TECHNOLOGY REGISTRAR OFFICE</h2>
						<div class="first">
							<ul>
						
								<li class="selected">
									<a href="c1.php" title="CHANGE PASSWORD">CHANGE PASSWORD</a>
								</li>
								
							</ul>
						</div>
					<div class="contact">
					
					
						<form action="c1.php" method="post">
							<table>
							
							<?php
	if($_SESSION['adminlogin'] != 'true'){
	 header('location:../dashboard.php');}

 ?>
												<?php  

include ("../config/config2.php");  

if(isset($_POST['chn'])){
$username = $_SESSION['adminUser']; 
$password = $_POST['old']; 
$newpassword = $_POST['new']; 
$confirmnewpassword = $_POST['confirm']; 

$result = mysql_query("SELECT adminPassword FROM tbl_admin WHERE adminUser='$username'");
if($password=="" && $newpassword=="" && $confirmnewpassword==""){
			// echo " <br><font color= 'white' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please enter valid username and password!</font>";
		}
		else
		{
		$records = mysql_num_rows($result);
		$test = mysql_fetch_array($result);
	
	  
if($password!= ($test['adminPassword']))  
{  
echo " <br><font color= 'white' size='3'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your entered incorrect old  password!</font>";
} 
else if($newpassword!= $confirmnewpassword)  
{  
echo " <br><font color= 'white' size='3'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;new password and confirm new password must be the same!</font>";
}  
else if($newpassword==$confirmnewpassword)  
{
    $sql=mysql_query("UPDATE tbl_admin SET adminPassword='$newpassword' where adminUser='$username'");  
   if(!$sql)
{
echo " <br><font color= 'white' size='3'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;new password and confirm new password must be the same!</font>";


}
else
echo " <br><font color= 'white' size='3'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your password changed successfully !</font>";

}

}
}
?>
						
								<tr>
									<td><label for="fname"><span>O</span>ld password:</label></td>
									<td><input type="password" required title="Please Insert your old password here" placeholder="Old Password" maxlength=16 id="name" name="old"></td>
									
                                     <p class="err-msg"></p> 
								</tr>
								<tr>
									<td><label for="mname"><span>N</span>ew password:</label></td>
									<td><input type="password" required title="Please Insert your new password here" placeholder="New Password" maxlength=16 id="name" name="new"></td>
									<p class="err-msg"></p> 
								</tr>
								<tr>
									<td><label for="lname"><span>C</span>onfirm new password:</label></td>
									<td><input type="password"  required title="Please confirm your new password here" placeholder="Confirm New Password" maxlength=16 id="name" name="confirm"></td>
									<p class="err-msg"></p> 
								</tr>
								
								
							</table>
							<input type="submit" value="Change" name="chn" id="submit">
							<input type="reset" value="Clear" name="reset" id="submit">
		
						</form>
		</div>
		</div>
		</div>
		</div>
		</div>
	</div>
	
</body>
</html>
