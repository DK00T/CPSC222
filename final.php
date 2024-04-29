<?php //final.php

session_start();

//function hash da password
function hashPassword($Password) 
{
	return hash('sha256', $Password);
}


function authenticate($Username, $Password)
{
	$auth = 'auth.db';
	$Users = file($auth, FILE_IGNORE_NEW_LINES);
	foreach($Users as $User)
	{
		list($UserN, $hashedPassword) = explode(":", $User);
			if($UserN == $Username && hashPassword($Password)== $hashedPassword)
			{
				return true;
			}
		
	
	}
	
	return false;

}
//$RealUser = 'dom';
//$RealPass = 'dom';

  if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];


	if(authenticate($Username,$Password))
	{
		 $_SESSION['Username'] = $Username;
		 $_SESSION['loggedin'] = 1;
	}
	else echo "Invalid Username or Password";

//	if($RealUser == $Username && $RealPass == $Password)
//	{
//		$Login = 1;
//	}
//	else echo "Invalid Username or Password";

  
  
  }

  
?>
<html>
	<body> 
		<h1> CPSC222 Final Exam </h1>
<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==1)
 {

/*	 ?> <h3> <?php  echo  'Welcome, ' . $_SESSION['Username'] . '! (<a href="final_logout.php">Log Out</a>)'; ?> </h3>
	Dashboard: 
	<ul>
		<li> <a href="?page=1"> User list</a> </li>
		<li> <a href="?page=2">Group list</a> </li> 
		<li> <a href="?page=3">Syslog</a> </li>
	</ul>
	
<?php
 */
   if(isset($_GET['page']))
        {
                $page = intval($_GET['page']);

		if($page==1)
		{
?>			
<h3> <?php  echo  'Welcome, ' . $_SESSION['Username']. '! (<a href="final_logout.php">Log Out</a>)'; ?> </h3>


 <a href="final.php">Back to Dashboard</a>

<br>
<br>

<h3> User List </h3>

<table border='1'>
        <tr>
                <th>Username</th>
                <th>Password</th>
                <th>UID</th>
                <th>GID</th>
                <th>Display Name</th>
                <th>Home Directory</th>
                <th>Default Shell</th>
	<?php $passwdContent = file_get_contents('/etc/passwd');
		$users = explode("\n", $passwdContent);
		foreach ($users as $user) 
		{
			$fields = explode(":", $user);
			echo "<tr>";
			foreach ($fields as $field) 
			{
				echo "<td>$field</td>";
			}
	

		}
	?>

	</tr>
</table>
	
<?php 		}
		elseif($page==2)
		{
?>
<h3> <?php  echo  'Welcome, ' . $_SESSION['Username']. '! (<a href="final_logout.php">Log Out</a>)'; ?> </h3>

  <a href="final.php">Back to Dashboard</a>

<br>
<br>

<h3> Group List </h3>

	<table border = 1>
		<tr>
			<th>Group Name</th>
			<th>Password</th>
			<th>GID</th>
			<th>Members</th>
	
<?php

		$groupfile = file_get_contents('/etc/group');
		$groups = explode("\n", $groupfile);
		foreach ($groups as $group)
		{
			$fields = explode(":", $group);
			echo "<tr>";
			foreach ($fields as $field)
			{
				echo "<td>$field</td>";
			}
		}
?>
		</tr>
	</table>

<?php
		}
			 elseif($page==3)
		 {
?>
<h3> <?php  echo  'Welcome, ' . $_SESSION['Username']. '! (<a href="final_logout.php">Log Out</a>)'; ?> </h3>

  <a href="final.php">Back to Dashboard</a>
	
	<br>
	<br>

<h3>Syslog</h3>
		<table border = 1>
			<tr>
				<th>Date</th>
				<th>Hostname</th>
				<th>Application[PID]</th>
				<th>Message</th>
<?php
				$syslogfile = file('/var/log/syslog');
				foreach ($syslogfile as $line)
				{
					preg_match('/^(\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}\.\d{6}\+\d{2}:\d{2}) (\S+) (\S+): (.+)$/', $line, $matches);
			
					if (count($matches) == 5) {
                        $timestamp = $matches[1];
                        $hostname = $matches[2];
                        $program = $matches[3];
			$message = $matches[4];
			
                        // Display syslog line in table row
                        echo "<tr><td>$timestamp</td><td>$hostname</td><td>$program</td><td>$message</td></tr>";
                    }
                }
?>
			</tr>
		</table>

<?php
			 }
			 elseif($page==9000)
			 {

				 ?><h3>About the Author </h3><?php	
?>
				<img src="dom.jpg" alt="Dom Picture" width="200" height="250">

				<h4>Dom's Interests</h4>
				<ul style="list-style-type:circle;">
					<li> Computers/CyberSecurity (Obviously)</li>
					<li>Philly Sports (specifically Eagles, Sixers, and Phillies) </li>
					<li>Video Games</li>	
				</ul>
				<p> When Dom graduates, he hopes to eventaully find a job as a Penetration Tester/Ethical Hacker. </p>


				<a href="final.php">Back to Dashboard</a>
<?php
			
			
			
			 }
			 elseif($page!=1||2||3||9000)
			{
?>
<h3> <?php  echo  'Welcome, ' . $_SESSION['Username']. '! (<a href="final_logout.php">Log Out</a>)'; ?> </h3>

  <a href="final.php">Back to Dashboard</a>
	<br>
	<br>
<?php
				echo 'Invalid page';
			}
   }
   else 
   {
	    ?> <h3> <?php  echo  'Welcome, ' . $_SESSION['Username'] . '! (<a href="final_logout.php">Log Out</a>)'; ?> </h3>
        Dashboard:
        <ul>
                <li> <a href="?page=1"> User list</a> </li>
                <li> <a href="?page=2">Group list</a> </li>
                <li> <a href="?page=3">Syslog</a> </li>
        </ul>
<?php
   }
  }
  else { 
?>
	<form method="post" action"=final.php">
<table>
	<tr>
		<td>Username:</td>
		<td> <input type="text" name="Username"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" name="Password"></td>
	</tr>
</table>
		<input type="submit" value="Login">
		</form>
<?php } ?>
		<hr>	
	
<?php
	echo date("Y-m-d h:i:s A");
?>
	</body>
	
</html>


