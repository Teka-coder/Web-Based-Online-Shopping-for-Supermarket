<?php include 'inc/header.php';?>

<?php 
$login = Session::get("adminlogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>

<?php
$adminId = Session::get("adminId");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateAdm = $adm->adminUpdate($_POST,$adminId);
}

?> 

<style>
	
.tblone{width: 550px;margin: 0 auto;border: 2px solid #ddd;margin-bottom: 10px;}
.tblone tr td{text-align: justify;}	
.tblone input[type="text"]{width: 400px;padding: 5px;font-size: 15px;}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php 
    		$id = Session::get("adminId");
    		$getdata = $adm->getAdminData($id);
    		if ($getdata) {
    			while ($result = $getdata->fetch_assoc()) {
    		

    		 ?>
    		 <form action="" method="post">
				<table class="tblone">
					<?php 
					if (isset($updateAdm)) {
					
					echo "<tr><td colspan='2'>".$updateAdm."</td></tr>";
					}
					 ?>
					<tr>
						<td colspan="2"><h2>Update Profile Details</h2></td>
					</tr>
					<tr>
						<td width="20%">Admin name</td>
						<td><input type="text" name="adminname" value="<?php echo $result['adminName'];?>"></td>
						
					</tr>
					<tr>
						<td>Username</td>
						<td><input type="text" name="adminuser" value="<?php echo $result['adminUser'];?>"></td>
						
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="email" value="<?php echo $result['adminEmail'];?>"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" value="<?php echo $result['adminPassword'];?>"></td>
					</tr>
					<tr>
						<td>Secret Word</td>
						<td><input type="text" name="secretword" value="<?php echo $result['secretWord'];?>"></td>
					</tr>
					<tr>
						<td>Secret number</td>
						<td><input type="number" name="secretnumber" value="<?php echo $result['secretNumber'];?>"></td>
					</tr>
					
					
					<tr>
						<td></td>
						<td><input type="submit" name="submit" value="Save"></td>
					</tr>

				</table>
				</form>
			<?php }} ?>
 		</div>
 	</div>
	</div>
  <?php include 'inc/footer.php';?>