<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Customer.php';?>
<?php include_once '../helpers/Formate.php';?>

<?php
$cust = new Customer();
$fm = new Format();

?>

<?php
if (isset($_GET['delcusto'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcusto']);
	$delcusto = $cust->delCustoById($id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Customer List</h2>
        <div class="block"> 


              <?php 

                	if (isset($delcusto)) {
                		echo $delcusto;
                	}

                	?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Customer Name</th>
					<th>Address</th>
					<th>City</th>
					<th>Street</th>
					<th>Zip</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<?php
				$getcust = $cust->getAllCustomer();
				if ($getcust) {
					$i = 0;
					while ($result = $getcust->fetch_assoc()) {
						$i++;

				?>

	<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><?php echo $result['address'];?></td>
							<td><?php echo $result['city'];?></td>
							<td><?php echo $result['street'];?></td>
							<td><?php echo $result['zip'];?></td>
							<td><?php echo $result['phone'];?></td>
							<td><?php echo $result['email'];?></td>
							<td> <a onclick="return confirm('Are you sure to delete!')" href="?delcusto=<?php echo $result['id'];?>">Remove</a></td>
						</tr>
			<?php } } ?>
				
			</tbody>
		</table>

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
