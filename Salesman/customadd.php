<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Customer.php';?>


<?php
$pd = new Customer();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $customerRegistration = $pd->customerRegistration($_POST,$_FILES);
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Customer</h2>
        <div class="block"> 

        <?php
        if (isset($insertCustomer)) {
            echo $insertCustomer;
        }

        ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Enter Customer Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Address</label>
                    </td>
<td>
                        <input type="text" name="address" placeholder="Enter Address..." class="medium" />
                    </td>
</tr>
  <tr>
                    <td>
                        <label>City</label>
                    </td>
                    <td>
                        <input type="text" name="city" placeholder="Enter city..." class="medium" />
                    </td>
                </tr>

                  <tr>
                    <td>
                        <label>Country</label>
                    </td>
                    <td>
                        <input type="text" name="country" placeholder="Enter Country Name..." class="medium" />
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>Zip</label>
                    </td>
                    <td>
                        <input type="text" name="zip" placeholder="Enter Zip..." class="medium" />
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input type="text" name="phone" placeholder="Phone..." class="medium" />
                    </td>
                </tr>

  <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="email" placeholder="Email" class="medium" />
                    </td>
                </tr>
  <tr>
                    <td>
                        <label>Pass</label>
                    </td>
                    <td>
                        <input type="text" name="pass" placeholder="Password..." class="medium" />
                    </td>
                </tr>

                    

                 <tr>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


