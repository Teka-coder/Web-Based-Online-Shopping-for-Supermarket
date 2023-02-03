<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin Password Recovery</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        

        	
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
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
                        <div class="page-title"><h4>Admin Password Recovery</h4></div>

                          <div class="col s12 m6 l8 offset-l2 offset-m3">
                              <div class="card white darken-1">

                                  <div class="card-content ">
                                      <span class="card-title" style="font-size:20px;">Admin details</span>
                                         
                                <div class="row">


                                    <?php
    
if (isset($_POST['change_password'])) 
    {   
    
        $username = ($_POST['username']);   
        //$secretQuest = $_POST['secretQuest'];
        //$secretAns = $_POST['secretAns'];
        //$priv_password = md5($_POST['priv_password']);  
        $new_password = md5($_POST['new_password']);
        //$normal_password = $_POST['new_password'];
include("../config/config3.php");
$connect=mysqli_connect('localhost','root','');
if(!$connect){
die("error connection to db server".mysqli_error());
}
$db_select=mysqli_select_db($connect,'db_shop');
if(!$db_select){
die("error in selection db".mysqli_error());
}

    $resulsasst = mysqli_query($connect, "SELECT * FROM tbl_admin WHERE adminUser = '$username'");
    $counssst=mysqli_num_rows($resulsasst);
        if($counssst == 0){
        echo '<div class="alert alert-dismissable alert-error"><strong>';
            echo "Opration Faild Please Insert Your Information Correctly ! ";
            echo '</strong></div>';
        } else{
        
    if(strlen($new_password) <=5 ) {
     echo '<div class="alert alert-dismissable alert-error">';
        die( '<strong>'."Password Must Be Greater Than Or Equal To 6 Characters !".'</strong>');
        echo '</div>';
    } 

    
        $chack = mysqli_query($connect, "UPDATE tbl_admin SET adminPassword='$new_password' WHERE adminUser = '$username'");
        echo '<div class="alert alert-dismissable alert-success"><strong>';
        echo '<font color="red" size="3">'."Successfully Changed!&nbsp;&nbsp;".'<br>'.'</font>';
        echo "".'<a href="login.php?=">'."Login Here".'</a>';
        echo '</strong></div>';
        }
        
            
    }
        ?>
        

            <?php
    
if (isset($_POST['search'])) 
    {   
    
        $secretWord = $_POST['secretWord'];   
        $secretNumber = $_POST['secretNumber'];
        //$Attedname = $_POST['Attedname'];
         include("../config/config3.php");
$connect=mysqli_connect('localhost','root','');
if(!$connect){
die("error connection to db server".mysqli_error());
}
$db_select=mysqli_select_db($connect,'db_shop');
if(!$db_select){
die("error in selection db".mysqli_error());
}

    $result = mysqli_query($connect, "SELECT * FROM tbl_admin WHERE secretWord = '$secretWord' and secretNumber='$secretNumber'");
    $count=mysqli_num_rows($result);
    if($count == 0){
echo '<div class="alert alert-dismissable alert-error"><strong>';   
echo '<font color="red" size="3">'."User name:&nbsp;Not Found".'</font>';
    echo '</strong></div>';
    }
    else {
    while($row=mysqli_fetch_array($result))
    {
echo '<div class="alert alert-dismissable alert-success"><strong>';
echo '<font color="red" size="3">'."Successfully Found!&nbsp;&nbsp;"."&nbsp;&nbsp;Now you can reset your password".'<br>'.'</font>';                
echo '</strong></div>';
    }
    
    ?>

     <div class="row">
          <span class="card-title" style="font-size:20px;">Reset your password </span>                                     
    <form class="col s12" name="udatepwd" method="post">
  <div class="input-field col s12">
 <input id="password" type="text" name="username" class="validate" autocomplete="off" required>
                                                <label for="password">User name</label>
                                            </div>


<div class="input-field col s12">
<input id="password" type="password" name="new_password" class="validate" autocomplete="off" required>
 <label for="password">New Password</label>
</div>


<div class="input-field col s12">
<button type="submit" name="change_password" class="waves-effect waves-light btn indigo m-b-xs" onclick="return valid();">Change</button>

</div>
</form>
</div>

<?php
    
    }
    

    }           

?>

 <div class="card-content ">
                                      <span class="card-title" style="font-size:20px;">Private info here</span>
                                         
                                <div class="row">
                                  
                        <form class="col s12" name="check" method="post">
                             <div>
                                                   <input type="text" name="secretWord" placeholder="Enter Secret Word"/>
                                               </div>
                                               <div>
                                                   <input type="text" name="secretNumber" placeholder="Enter Secret Number"/>
                                               </div>

                                            
                                               <div class="col s12 right-align m-t-sm">
                                                
                                                   <input type="submit" name="search" value="search" class="waves-effect waves-light btn teal">
                                               </div>
                                           </form>
                                      </div>
                                  </div>


                                   </div>
                          </div>
                    </div>
                </div>

            </main>
            
        
        <div class="left-sidebar-hover"></div>
    
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        
    </body>
</html>