 <?php include 'inc/header.php';?>

<?php include_once 'helpers/Formate.php';?>

<?php
$pd = new Product();
$fm = new Format();

?>
 <?php
	
	

include("rheader.php");
include("rdb.php");
//session_start();
	if(isset($_GET['id']))
	{
		$_SESSION['id']=$_GET['id'];
	}
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
<table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
				</tr>
			</thead>
			<tbody>

				<?php
				$getPd = $pd->getAllProduct();
				if ($getPd) {
					$i = 0;
					while ($result = $getPd->fetch_assoc()) {
						$i++;

				?>
				<tr class="odd gradeX">
					<td><?php echo $result['productName'] ;?></td>
					<td><?php echo $result['catName'] ;?></td>
					<td><?php echo $result['brandName'] ;?></td>
					<td>ETB.<?php echo $result['price'] ;?></td>
					<td><img src="<?php echo $result['image'] ;?>" height="40px" width="60px" ></td>
					<td>
						<?php 
						if ($result['type'] == 0) {
							echo "Featured";
						}else
						echo "General";

						?>
							

						</td>

						</tr>

			<?php } } ?>
				
			</tbody>
		</table>

       <br><br><br><br>
<div class ="panel panel-default">
	<div class = "panel-heading">
		<h2>
			<a class = "btn btn-success" href = "raddproduct.php">Add product</a>
			<a class = "btn btn-info pull-right" href = "index.php">Back</a>

		</h2>
	</div>
	
	
	<?php if($flag){?>
	
	<div class="alert alert-success">Product successfully rated</div>
	
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

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>

