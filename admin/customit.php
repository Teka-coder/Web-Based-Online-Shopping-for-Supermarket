<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Customer.php';?>
<?php
if (!isset($_GET['custid']) || $_GET['custid'] == NULL) {
   
   echo "<script>window.location='customlist.php';</script>";
   
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['custid']);
}

$customer = new Customer();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Email = $_POST['email'];
    $updateCustomer = $customer->customerUpdate($Email,$id);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Customer</h2>
               <div class="block copyblock"> 

<?php
if (isset($updateCustomer)){
echo $updateCustomer;

}

        ?>


     <?php
     $getCustomer = $customer->getCustomerData($id);
     if ($getCustomer) {
        while ($result = $getCustomer->fetch_assoc()) {
    
     ?>   
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="email" name="Email" value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php } } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>