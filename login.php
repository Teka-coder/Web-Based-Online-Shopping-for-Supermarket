<?php include 'inc/header.php';?>
<?php 
$login = Session::get("cuslogin");
if ($login == true) {
	header("Location:order.php");
}
 ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $custLogin = $cmr->customerLogin($_POST);
}

?> 

 <div class="main">
    <div class="content">
    	 <div class="login_panel">

    	 	<?php 

    		if (isset($custLogin)) {
    			echo $custLogin;
    		}
    		 ?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
                	<input name="email" placeholder="Email" type="text"/>
                    <input name="pass" placeholder="Password" type="password"/>
                    <div class="buttons"> <div><button class="grey" name="login">Sign In</button></div></div>
                    <br>
                    <a href="fp2.php">forgot password?</a>
                      </div>
                 </form>
                 
                    
                  


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $customerReg = $cmr->customerRegistration($_POST);
}

?>          
    	<div class="register_account">
    		<?php 

    		if (isset($customerReg)) {
    			echo $customerReg;
    		}
    		 ?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name"/>
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City"/>
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip-Code"/>
							</div>
							<div>
								<input type="text" name="email" placeholder="Email"/>
							</div>
							 <select id="select" name="secretQuest">
                            <option>Select secret question</option>
                            <option value="what is your childhood name?">what is your childhood name?</option>
                            <option value="what is your favorite mobile brand?">what is your favorite mobile brand?</option>
                            <option value="what is your special day?">what is your special day?</option>
                        </select>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address"/>
						</div>
		    		
						<div>
							<input type="text" name="street" placeholder="Street"/>
						</div>
				 	        
	
		           <div>
		          <input type="text" name="phone" placeholder="Phone"/>
		          </div>
				  
				  <div>
					<input type="text" name="pass" autocomplete="off" placeholder="Password"/>
				</div>
              
                      
                       
                        <div>
					<input type="text" name="secretAns" placeholder="Answer"/>
				</div>
                    </td>

		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>