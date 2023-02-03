 <?php
	
	session_start();
	if(isset($_GET['id']))
	{
		$_SESSION['id']=$_GET['id'];
	}

include("rheader.php");
include("rdb.php");

	$flag=0;
	
	if (isset($_POST['submit']))
	{
		$result=mysqli_query($con,"insert into user_products(user_id,product_name,product_rating )values('$_SESSION[id]','$_POST[productname]','$_POST[productrating]')");
		if($result)
		{
			$flag=1;
		}
	}

?>
<div class ="panel panel-default">
	<div class = "panel-heading">
		<h2>
			<a class = "btn btn-success" href = "raddproduct.php">Add product</a>
			<a class = "btn btn-info pull-right" href = "rindex.php">Back</a>

		</h2>
	</div>
	
	
	<?php if($flag){?>
	
	<div class="alert alert-success">Product successfully inserted in database</div>
	
	<?php }?>
	
	
	
	<div class = "panel-body">
		<form action = "raddproduct.php" method = "post">
		<div class = "form-group">
			<label for = "username"> Product Name</label>
			<input type = "text" name = "productname" id = "productname" class="form-control" required>
		</div>
		
		<div class = "form-group">
			<label for = "username"> Rating</label>
			<input type = "number" name = "productrating" id = "productrating" class="form-control" required>
		</div>
		
		<div class = "form-group">
			<input type = "submit" name = "submit" value = "submit" class = "btn btn-primary" required>
		</div>
		
	</div>

</div> 