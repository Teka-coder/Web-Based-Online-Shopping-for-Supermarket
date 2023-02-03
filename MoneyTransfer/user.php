
<?php include 'config/Database.php' ?>
<?php
	session_start();
	if($_SESSION['type'] == 'salesman'){
		include 'inc/headersalesman.php';
	}
	else if($_SESSION['type'] == 'customer'){
		header("Location: "."inc/headercustomer.php");
	}
	else
		{
		  header("Location: "."index.php");
		}
?>


 <script src="js/javascript.js"></script> 

	<div class="desh-main-content">
	<br>
			<div class="title">
				User Registration
			</div>
			<div>
				<div class="reg-container">

					<form name="user" action="" method="post" enctype="multipart/form-data">
						<div>
							<input type="text" name="name" placeholder="Enter Full Name" required>
						</div>
						<div>
							<input type="number" name="accno" placeholder="Account number" required>
						</div>
						<div>
							<input type="text" name="username" placeholder="Enter User Name" required>
						</div>
						<div>
							<input type="text" name="email" placeholder="Email Adress" required onblur="chkpass();">
						</div>
						<span id="emleror" style="color:red"></span>
						<div>
							<input type="password" name="password" placeholder="Enter Password" required>
						</div>
						<div>
							<input type="password" name="confirmpassword" placeholder="Re-enter Password" required onblur="chkpass();">

						</div>
						<span id="passeror" style="color:red"></span>
						<div>
							  <input type="radio" name="gender" value="male" checked required> Male
							  <input type="radio" name="gender" value="female" required> Female
							  <input type="radio" name="gender" value="other" required> Other
						</div>
						<div>
							Role : 
							  <input type="radio" name="role" value="salesman" checked required> Salesman
							  <input type="radio" name="role" value="customer" required> Customer
						</div>
						<div>
							Image:
							<input type="file" name="image" required>
						</div>
						<input type="submit" name="submit" value="SUBMIT" class="btn-login" onclick="return chkpass();" >
					</form>
				</div>
			</div>
	</div>
	
	<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
       	$file_name = $_FILES['image']['name'];
	    $file_size = $_FILES['image']['size'];
	    $file_temp = $_FILES['image']['tmp_name'];
	    $folder = "uploads/";

	    move_uploaded_file($file_temp, $folder.$file_name);

	    $username = $_POST['username'];
	    $name = $_POST['name'];
	    $accno = $_POST['accno'];
	    $email = $_POST['email'];
	    $password = $_POST['password'];
	    $gender = $_POST['gender'];
	    $type = $_POST['role'];

	    $db = new Database();

    $query = "INSERT INTO users(username,name,acc_no,email,password,gender,type,img) VALUES('$username','$name','$accno',$email','$password','$gender','$type','$file_name')";
   		$inserted_rows = $db->insert($query);
    	if ($inserted_rows) {
     		echo "<div class='success'>Registration Successful.
         		 </div>";
    	}else {
    	 echo "<div class='error'>Registration Not Successful !</div>";
   		}
   	}
	?>

</body>
</html>