<?php include 'inc/header.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>
<style>
	
.tblone{width: 550px;margin: 0 auto;border: 2px solid #ddd;margin-bottom: 10px;}
.tblone tr td{text-align: justify;}	
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php 
    		$id = Session::get("cmrId");
    		$getdata = $cmr->getCustomerData($id);
    		if ($getdata) {
    			while ($result = $getdata->fetch_assoc()) {
    		

    		 ?>

<?php
include("rheader.php");
include("rdb.php");

	$flag=0;
	
	if (isset($_POST['submit']))
	{
		$result2=mysqli_query($con,"insert into recom_user(username)values('$_POST[username]')");
		if($result2)
		{
			$flag=1;
		}
	}

?>
<div class ="panel panel-default">
	
	
	
	<?php if($flag){?>
	
	<div class="alert alert-success">User successfully registered</div>
	
	<?php }?>
	
	
	
	<div class = "panel-body">
		<form action = "radduser.php" method = "post">
		<div class = "form-group">
			<label for = "username"> User Name</label>
			<input type = "text" name = "username" id = "username" class="form-control" value="<?php echo $result['name'];?>" readonly>
		</div>
		
		<div class = "form-group">
			<input type = "submit" name = "submit" value = "submit" class = "btn btn-primary" required>
		</div>
		
	</div>
	<div class = "panel-heading">
		<h2>
			<a class = "btn btn-success" href = "raddproduct.php">Add product</a>
			<a class = "btn btn-info pull-right" href = "index.php">Back</a>

		</h2>
	</div>
<?php }}?>

