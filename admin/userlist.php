<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Salesmanadd.php';?>
<?php include_once '../helpers/Formate.php';?>

<?php
$sman = new Salesmanadd();
$fm = new Format();

?>

<?php
if (isset($_GET['delsman'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delsman']);
	$delsman = $sman->delSmanById($id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>User List</h2>
        <div class="block"> 


              <?php 

                	if (isset($delsman)) {
                		echo $delsman;
                	}

                	?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Salesman Name</th>
					<th>Username</th>
					<th>Email</th>
					<th>Level</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody>

				<?php
				$getsman = $sman->getAllSalesman();
				if ($getsman) {
					$i = 0;
					while ($result = $getsman->fetch_assoc()) {
						$i++;

				?>

	<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['salesmanName'];?></td>
							<td><?php echo $result['salesmanUser'];?></td>
							<td><?php echo $result['salesmanEmail'];?></td>
							<td><?php echo $result['level'];?></td>
							
							<td> <a onclick="return confirm('Are you sure to delete!')" href="?delsman=<?php echo $result['Id'];?>">Remove</a></td>
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
