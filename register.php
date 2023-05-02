<?php
session_start();
if (isset($_SESSION['username'])) {
	header('Location: home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> OnlineShop </title>
	<link rel="stylesheet" type="text/css" href="css/general.css">
</head>

<body>
	<?php
	$arr = array();
	require_once("connection.php");
	$db = new config();
	$db->config();

	if (isset($_POST["register"])) {
		$username = $_POST["username"];
		if ($_POST["password"] == "") {
			$password = "";
		} else {
			$password = sha1($_POST["password"]);
		}
		if ($_POST["confirmpassword"] == "") {
			$confirmpassword = "";
		} else {
			$confirmpassword = sha1($_POST["confirmpassword"]);
		}
		if ($password != $confirmpassword) {
			$arr["mess"] = '<p style="color:red; text-align:center">Confirmation password does not match</p>';
		} else {
			$check = $db->checkAccount($username);
			if (mysqli_num_rows($check) > 0) {
				$arr["mess"] = '<p style="color:red; text-align:center">The account has already existed</p>';
			} else {
				$db->register($username, $password);
				$arr["mess"] = '<p style="color:green; text-align:center">You have signed up successfully <br>(Redirecting to login page in 3 seconds...)</p>';
				header("refresh:3;url=login.php");
				echo '<script>setTimeout(function(){window.location.href="login.php";},3000);</script>';
			}
		}
	}
	?>

	<div class="modal-content">
		<div class="title">
			Register
		</div>
		<div class="form-inner">
			<form action="register.php" method="post" class="register">
				<div class="field">
					<input type="text" name="username" placeholder="Email Address" required>
				</div>
				<div class="field">
					<input type="password" name="password" placeholder="Password" required>
				</div>
				<div class="field">
					<input type="password" name="confirmpassword" placeholder="Confirm Password" required>
				</div>

				<div class="field btn">
					<div class="btn-layer"></div>
					<input type="submit" class="btn_submit" name="register" value="Register" />
				</div>
				<div class="signup-link">
					Already have an account? <a href="login.php">Login now</a>
				</div>
					<?php
					if (isset($arr["mess"])) {
						echo $arr["mess"];
					}
					?>
			</form>
		</div>
	</div>
</body>

</html>