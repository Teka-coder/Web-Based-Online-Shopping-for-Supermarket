<?php include('lib/Session.php');
?>
<html>
<head>
<script language="javascript">
function check(){
  if(document.form1.oppassword.value=="")  {
    alert("please enter old password");
	document.form1.oppassword.focus();
	return false;
  }
 if(document.form1.user_name.value=="") {
    alert("Plese Enter your new user name");
	document.form1.user_name.focus();
	return false;
  }
 if(document.form1.newpassword.value=="")
 {
 alert("please enter new  password");
 document.form1.newpassword.focus();
 return false;
 }


                                            // if(document.form1.newpassword.value=="")
                                            // {
                                                // alert("please enter the new password");
                                              // document.form1.newpassword.focus();
                                           // return false;
                                              // }

  if(document.form1.conpassword.value=="")
  {
    alert("Please Enter Confirm Password");
	document.form1.conpassword.focus();
	return false;
  }
  return true;
  }
</script>
</head>
<body>
<h>change  your private info here.<br>
    <form name="form1" action="cp.php" method="post"  onSubmit="return check();">
<table cellspacing="15">
    <tr><td>Old password</td><td><input type="password" name="opassword" id="UserPW" required="required"></td></tr>
 <tr><td>User name</td><td><input type="text" name="user_name" id="user_name" required="required"></td></tr>
    <tr><td>New password</td><td><input type="password" name="newpassword" id="newpassword" required="required"></td></tr>
    <tr><td>Confirm password </td><td><input type="password" name="conpassword" id="conpassword" required="required"></td></tr></table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b><input type="submit" name="Change" value="Change" onclick="return check();"></b>
<?php
   if(isset($_POST['Change'])){
 $old=$_POST['opassword'];
$user=$_POST['user_name'];
 $password1=$_POST['newpassword'];
 $conp=$_POST['conpassword'];
 include("config/config3.php");
$connect=mysqli_connect('localhost','root','');
if(!$connect){
die("error connection to db server".mysqli_error());
}
$db_select=mysqli_select_db($connect,'db_shop');
if(!$db_select){
die("error in selection db".mysqli_error());
}

  $get= @mysqli_query($connect,"SELECT * FROM tbl_customer where  name='$user'")or die("unable to select customer".mysqli_error());
  $num= @mysqli_num_rows($get);
  if(mysqli_num_rows($get)>0)
  {
  for($i=0;$i<$num;$i++){
     $old=@mysqli_result($get,$i,'pass');
  }
    if($old==$password1)
	{
      echo "<script> alert('Old password and New Password same ,Try Another !!');</script>";
     }
	 else{
      $query = mysqli_query($connect,"UPDATE tbl_customer set pass='$password1' where name='$user'");
           echo "<script>alert('your user name and Password is Changed sucessfully !!');</script>";
            header("location: index.php");
         }
	 }
	else {
      echo "<script>alert('Old Password is Wrong !!');</script>";
      header("location:index.php");
    }
	}
?>
    </form></body>
</html>