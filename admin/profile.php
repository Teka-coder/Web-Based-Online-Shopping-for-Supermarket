<?php include('inc/header.php');?>

<?php 
$login = Session::get("adminlogin");
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
    		$id = Session::get("adminId");
    		$getdata = $adm->getAdminData($id);
    		if ($getdata) {
    			while ($result = $getdata->fetch_assoc()) {
    		

    		 ?>
    		 <table class="tblone">
    		 	<tr>
						<td></td>
						<td></td>
						<td><a href="#">You can change your password below</a></td>
					</tr>
    		 </table>
				<table class="tblone">
					<tr>
						<td colspan="3"><h2>Your Profile Details</h2></td>
					</tr>
					<tr>
						<td width="20%">Admin Name</td>
						<td width="5%">:</td>
						<td><?php echo $result['adminName'];?></td>
					</tr>
					<tr>
						<td>User name</td>
						<td>:</td>
						<td><?php echo $result['adminUser'];?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><?php echo $result['adminEmail'];?></td>
					</tr>
					<tr>
						<td>Secret word</td>
						<td>:</td>
						<td><?php echo $result['secretWord'];?></td>
					</tr>
					<tr>
						<td>Secret number</td>
						<td>:</td>
						<td><?php echo $result['secretNumber'];?></td>
					</tr>
				
				
					<tr>
						<td></td>
						<td></td>
						<td><a href="editprofile.php">Update Details</a></td>
					</tr>
					
				</table>
			<?php }} ?>
 		</div>
 	</div>
	</div>
  <?php include 'inc/footer.php';?>