<?php
session_start();
require '../config/config.php';
if(isset($_POST['submit']))
{
    $user_id = $_POST['email_id'];
    $result = mysqli_query($conn,"SELECT * FROM user_details where user_id='" . $_POST['user_id'] . "'");
    $row = mysqli_fetch_assoc($result);
	$fetch_user_id=$row['user_id'];
	$email_id=$row['email_id'];
	$password=$row['password'];
	if($user_id==$fetch_user_id) {
				$to = $email_id;
                $subject = "Password";
                $txt = "Your password is : $password.";
                $headers = "From: password@studentstutorial.com" . "\r\n" .
                "CC: somebodyelse@example.com";
                mail($to,$subject,$txt,$headers);
			}
				else{
					echo '<script>invalid userid</script>';
                    header ('header.php');
				}
}
?>














<!DOCTYPE HTML>
<html>
<head>
<link rel = "icon" href = 
"../assets/img/password.jpg" 
        type = "image/x-icon">
<img src="../assets/img/password.jpg">
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<body>

<h1>Forgot Password<h1>
    
<form action='' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Email id:</td><td><input type='text' name='email_id'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
</body>
</html>