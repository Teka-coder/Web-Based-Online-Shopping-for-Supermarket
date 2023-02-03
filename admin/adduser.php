<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/Salesmanadd.php';?>


<?php
$slsman = new Salesmanadd();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $userRegistration = $slsman->userRegistration($_POST,$_FILES);
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add Salesman</h2>
        <div class="block"> 

        <?php
        if (isset($insertSalesman)) {
            echo $insertSalesman;
        }

        ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="salesmanName" placeholder="Enter Salesman Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Username</label>
                    </td>
<td>
                        <input type="text" name="salesmanUser" placeholder="Enter username..." class="medium" />
                    </td>
</tr>
  <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="email" name="salesmanEmail" placeholder="Enter Email..." class="medium" />
                    </td>
                </tr>

                  <tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
                        <input type="password" name="salesmanPassword" placeholder="Enter Password..." class="medium" />
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>level</label>
                    </td>
                    <td>
                        <input type="number" name="level" placeholder="level" readonly="0" value="0" class="medium" />
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


