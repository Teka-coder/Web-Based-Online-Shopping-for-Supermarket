<?php

include("rheader.php");
include("rdb.php");

?>

<div class="panel panel-default">
	
	<div class = "panel-heading">
		<h2>
			<!--<a class = "btn btn-success" href = "adduser.php">Add Users</a>-->
			<a class = "btn btn-info pull-right" href = "rindex.php">Back</a>

		</h2>
	</div>
	
	<div class="panel-body">
		<table class="table table-stripped">
			<th> Email</th>
			<th> Add Product</th>
			<th> Product and Rating</th>
			<th> Show Recommendation</th>
			
			<?php $result=mysqli_query($con,"select * from tbl_customer");
			while($row=mysqli_fetch_array($result))
			{
			?>
			<tr>
				<td><?php echo $row['email']; ?> </td>

				<td>
				<form action="raddproduct.php">
				<input type="submit" name="addproduct" class="btn btn primary" value="Add Product">
				<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
				</form>
				</td>
				
				<td>
				<form action="rshowproduct.php">
				<input type="submit" name="showproduct" class="btn btn primary" value="Show Products">
				<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
				</form>
				</td>
				
				<td>
				<form action="rrecommendation.php">
				<input type="submit" name="recommendation" class="btn btn primary" value="Show Recommendation">
				<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
				</form>
				</td>
			</tr>
			<?php } ?>
		</table>
	
	</div>
	
	
</div>
