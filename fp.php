<br/>
<div class="navbar-inner">
		<font  class="" id="inde_admin_signup">Forget Password</font>
    </div>	
<div class="navbar-inner">


						<?php
  	
if (isset($_POST['change_password'])) 
  	{	
	
		$username = ($_POST['username']);	
		//$secretQuest = $_POST['secretQuest'];
		//$secretAns = $_POST['secretAns'];
		//$priv_password = md5($_POST['priv_password']);	
		$new_password = ($_POST['new_password']);
		//$normal_password = $_POST['new_password'];
include("config/config3.php");
$connect=mysqli_connect('localhost','root','');
if(!$connect){
die("error connection to db server".mysqli_error());
}
$db_select=mysqli_select_db($connect,'db_shop');
if(!$db_select){
die("error in selection db".mysqli_error());
}

	$resulsasst = mysqli_query($connect, "SELECT * FROM tbl_customer WHERE name = '$username'");
	$counssst=mysqli_num_rows($resulsasst);
		if($counssst == 0){
		echo '<div class="alert alert-dismissable alert-error"><strong>';
			echo "Opration Faild Please Insert Your Information Correctly ! ";
			echo '</strong></div>';
		} else{
		
	if(strlen($new_password) <=5 ) {
	 echo '<div class="alert alert-dismissable alert-error">';
		die( '<strong>'."Password Must Be Greater Than Or Equal To 6 Characters !".'</strong>');
		echo '</div>';
	} 

	
		$chack = mysqli_query($connect, "UPDATE tbl_customer SET pass='$new_password' WHERE name = '$username'");
		echo '<div class="alert alert-dismissable alert-success"><strong>';
		echo '<font color="red" size="3">'."Successfully Changed!&nbsp;&nbsp;".'</font>';
		echo "".'<a href="login.php?=">'."Login Here".'</a>';
		echo '</strong></div>';
		}
		
			
	}
		?>
		

			<?php
  	
if (isset($_POST['search'])) 
  	{	
	
		$secretQuest = $_POST['secretQuest'];	
		$secretAns = $_POST['secretAns'];
		//$Attedname = $_POST['Attedname'];
		 include("config/config3.php");
$connect=mysqli_connect('localhost','root','');
if(!$connect){
die("error connection to db server".mysqli_error());
}
$db_select=mysqli_select_db($connect,'db_shop');
if(!$db_select){
die("error in selection db".mysqli_error());
}

	$result = mysqli_query($connect, "SELECT * FROM tbl_customer WHERE secretQuest = '$secretQuest' and secretAns='$secretAns'");
	$count=mysqli_num_rows($result);
	if($count == 0){
echo '<div class="alert alert-dismissable alert-error"><strong>';	
echo '<font color="red" size="3">'."User name:&nbsp;Not Found".'</font>';
	echo '</strong></div>';
	}
	else {
	while($row=mysqli_fetch_array($result))
	{
echo '<div class="alert alert-dismissable alert-success"><strong>';
echo '<font color="red" size="3">'."Successfully Found!&nbsp;&nbsp;"."&nbsp;&nbsp;Now you can reset your password".'<br>'.'</font>';				
echo '</strong></div>';	
	}
	
	?>
	
	<table border="0" cellpadding="15" cellspacing="0">
	<form method="POST" action="">


	<tr><td>User Name</td><td><input type="text" title="user Name" name="username" id="kl" placeholder="User name" required></td></tr>
	

	<tr><td>New Password</td><td><input type="password" title="New Password" name="new_password" id="kl" placeholder="New password" required></td></tr>
	<tr><td></td><td><input type="submit" name="change_password"  value="Chang Password"  class="btn" id="kl"  ></td></tr>
	</form>
	</table>
	
	
	
	<?php
	
	}
	

	}			

?>

		

<form method="POST" action="">
			 <div class="input-field col s12">

                        <select id="select" name="secretQuest">
                            <option>Select secret question</option>
                            <option value="what is your childhood name?">what is your childhood name?</option>
                            <option value="what is your favorite mobile brand?">what is your favorite mobile brand?</option>
                            <option value="what is your special day?">what is your special day?</option>
                        </select>
                                               </div>
                	 <div>
                                                  <input type="text" name="secretAns" placeholder="Answer"/>
                                               </div>
                	<input type="submit" name="search"  value="Searche" class="btn" id="kl">
               
		</form>

	</center>		


</div>	
	