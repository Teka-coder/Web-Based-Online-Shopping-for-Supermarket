<?php include '../classess/Salesmanlogin.php';?>
<?php
$smanlogin = new Salesmanlogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$salesmanUser = $_POST['salesmanUser'];
	$salesmanPassword = ($_POST['salesmanPassword']);

	$loginchk = $smanlogin->salesmanlogin($salesmanUser,$salesmanPassword);
}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Salesman Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Salesman Login</h1>
<span style="color: red;font-size: 18px;">
	<?php
if (isset($loginchk)) {
	echo $loginchk;
}

	?>

</span>

			<div>
				<input type="text" placeholder="Username"  name="salesmanUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="salesmanPassword"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="sfp.php">Forgot password</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>