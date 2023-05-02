<?php
session_start();
if (isset($_SESSION['username'])) {
	header('Location: all.php');
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

	if (isset($_POST["login"])) {
		$username = $_POST["username"];
		$password = sha1($_POST["password"]);

		if ($username == "" || $password == "") {
			$arr["mess"] = '<p style="color:red; text-align:center">Please enter your username and password</p>';
		} else {
			$num_rows = $db->login($username, $password);
			if ($num_rows == 0) {
				$arr["mess"] = '<p style="color:red; text-align:center">Username or password is incorrect</p>';
			} else {
				$_SESSION['username'] = $username;
				$user = $username;
				$num = 0;
				header("Location: all.php");
			}
		}
	}
	?>

	<div class="modal-content">
		<div class="title">
			Login
		</div>
		<div class="form-inner">
			<form action="login.php" method="post" class="login">
				<div class="field">
					<input type="text" name="username" placeholder="Email Address" required>
				</div>
				<div class="field">
					<input type="password" name="password" placeholder="Password" required>
				</div>

				<div class="field btn">
					<div class="btn-layer"></div>
					<input type="submit" class="btn_submit" name="login" value="Login">
				</div>
				<div class="signup-link">
					Don't have an account? <a href="register.php">Register now</a>
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