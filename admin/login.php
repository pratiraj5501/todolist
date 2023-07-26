<?php
session_start();
session_destroy();
require_once '../db_scripts/connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit" name="submit">Login</button>
     </form>
</body>
</html>


<?php
	if (isset($_POST['submit'])) {
		session_start();
		$uname = $_POST['uname'];
		$pass = $_POST['password'];

		$query = "SELECT * from `admin_login` where user='$uname' and password='$pass'";
		$result = $connn->query($query);
		$resultarr = mysqli_fetch_array($result);
		if ($resultarr) {
			$_SESSION['username'] = $uname; // stroing the username for checking for session in the admin panel
			Redirect('admin.php',true);
		}
		else {
			echo "<h1>Wrong Creditionals</h1>";
			session_destroy(); // end the session if the login failed
			die();
		}
	}
?>