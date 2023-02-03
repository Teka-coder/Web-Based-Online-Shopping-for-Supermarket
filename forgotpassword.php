


<?php
//session_start();
//error_reporting(0);
include('config/config2.php');
// Code for change password 
if(isset($_POST['change']))
    {
$newpassword=md5($_POST['newpassword']);
$dbid=$_SESSION['dbid'];

$con="update tbl_customer set pass=:newpassword where id=:dbid";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':dbid', $dbid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}

?><!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Password Recovery</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        

        	
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
  <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
        
    </head>
    <body>
      
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title"><h4>Customer Password Recovery</h4></div>

                          <div class="col s12 m6 l8 offset-l2 offset-m3">
                              <div class="card white darken-1">

                                  <div class="card-content ">
                                      <span class="card-title" style="font-size:20px;">Customer details</span>
                                         
                                <div class="row">

                                           <form class="col s12" name="check" method="post">
                                               <div class="input-field col s12">

                        <select id="select" name="secretQuest">Select your secret question
                            <option>Select secret question</option>
                            <option value="what is your childhood name?">what is your childhood name?</option>
                            <option value="what is your favorite mobile brand?">what is your favorite mobile brand?</option>
                            <option value="what is your special day?">what is your special day?</option>
                        </select>
                                               </div>
                                               <div>
                                                   <input type="text" name="secretAns" placeholder="Answer"/>
                                               </div>

                                            
                                               <div class="col s12 right-align m-t-sm">
                                                
                                                   <input type="submit" name="submit" value="submit" class="waves-effect waves-light btn teal">
                                               </div>
                                           </form>
                                      </div>
                                  </div>
<?php if(isset($_POST['submit']))
{
$secretQ=$_POST['secretQuest'];
$secretA=$_POST['secretAns'];
$sql ="SELECT id FROM tbl_customer WHERE secretQuest=:secretQ and secretAns=:secretA";
$query= $dbh -> prepare($sql);
$query-> bindParam(':secretQ', $secretQ, PDO::PARAM_STR);
$query-> bindParam(':secretA', $secretA, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach ($results as $result) {
    $_SESSION['dbid']=$result->id;
  } 
    ?>

 <div class="row">
          <span class="card-title" style="font-size:20px;">change your password </span>                                     
    <form class="col s12" name="udatepwd" method="post">
  <div class="input-field col s12">
 <input id="password" type="password" name="newpassword" class="validate" autocomplete="off" required>
                                                <label for="password">New Password</label>
                                            </div>

<div class="input-field col s12">
<input id="password" type="password" name="confirmpassword" class="validate" autocomplete="off" required>
 <label for="password">Confirm Password</label>
</div>


<div class="input-field col s12">
<button type="submit" name="change" class="waves-effect waves-light btn indigo m-b-xs" onclick="return valid();">Change</button>

</div>
</form>
</div>
<?php } else{ ?>
<div class="errorWrap" style="margin-left: 2%; font-size:22px;">
 <strong>ERROR</strong> : <?php echo htmlentities("Invalid details");
}?></div>







                              </div>
                          </div>
                    </div>
                </div>

            </main>
            
        
        <div class="left-sidebar-hover"></div>
        <?php } ?>
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        
    </body>
</html>