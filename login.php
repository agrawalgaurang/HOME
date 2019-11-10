<div id="webform">
<h2>Login Page</h2>
<form action="" method="post">
<label>Username: </label>
<input type="text" name="username" required placeholder="Please Enter Username"/>
<br><br>
<label>Password: </label>
<input type="Password" name="password" required/><br><br>
<input type="submit" value=" Submit Details " name="submit"/><br />
</form>
</div>
<?php
if(isset($_POST["submit"])){
include 'dbconfig.php';
$sql = "INSERT INTO therapist (username, password)
VALUES ('".$_POST["username"]."','".$_POST["password"]."')";
if ($conn->query($sql) === TRUE)
$conn->close();
}
?>