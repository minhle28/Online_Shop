<?php
$arr = array();
require_once("connection.php");
$db = new config();
$db->config();

if (isset($_POST["signup"])) {
    $username = $_POST["username"];
    if ($_POST["password"] == "") {
        $password = "";
    } else {
        $password = sha1($_POST["password"]);
    }

    if (($username == "" && $password != "") || ($username != "" && $password == "") || $username == "" || $password == ""
    ) {
        $arr["mess"] = '<p style="color:red">Please enter all required information</p>';
    } else {
        $check = $db->checkAccount($username);
        if (mysqli_num_rows($check) > 0) {
            $arr["mess"] = '<p style="color:red">The account has already existed</p>';
        } else {
            $db->register($username, $password);
            $arr["mess"] = '<p style="color:green">You have signed up successfully</p>';
        }
    }
}
?>

<?php function signup()
{ ?>
    <form action="signup.php" method="post" class="signup">
        <div class="field">
            <input type="text" name='username' placeholder="Email Address" required>
        </div>
        <div class="field">
            <input type="password" name='password' placeholder="Password" required>
        </div>
        <div class="field">
            <input type="password" name='confirmpassword' placeholder="Confirm password" required>
        </div>
        <br>
        <span class='error-msg' id='error-msg-2'></span>
        <div class="field btn">
            <div class="btn-layer"></div>
            <input name='signup' type='submit' value='Signup' class='btn-input'/>;
        </div>
    </form>
<?php } ?>