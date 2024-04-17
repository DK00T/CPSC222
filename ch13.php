<?php 

$RealUser = 'dom';
$RealPass = 'dom';

	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$u = preg_replace('/[^a-z]/','',$_POST['Username']);
		$p = preg_replace('/[^a-z]/','',$_POST['Password']);

		if($RealUser == $u && $RealPass == $p)
		{
			$_SESSION['loggedin'] = 1;
			$_SESSION['username'] = $RealUser;
			header('Location: /ch13.php');
		}else
		{
			echo 'Invalid Login';

		}

	}		

?>
<html>
	<body>
<?php
	if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==1)
	{
		echo '<h1> Hello,' .  $_SESSION['username'] . '</h1>';

		echo '<a href="ch13-logout.php">Logout</a>';

	}	
	else {
?>
		<form method="post" action"=ch13.php">
		<table>
			<tr>
				<td>Username:</td>
				<td> <input type="text" name="Username"></td>
			</tr>
			<tr> 	
				<td>Password:</td>
				<td> <input type="password" name="Password"></td>
			</tr>
		</table>
			<input type="submit" value="Login">
		</form>
<?php } ?>

	</body>

</html>

