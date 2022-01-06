<?php

	if(@$rec=="invalid") {
	
	echo "<script>alert('Invalid Username and Password...')</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form method="post">
	<table border="2" align="center">
		<caption><h1>Login</h1></caption>
		<tr>
			<th>Username</th>
			<td><input type="text" name="txtuname" required=""></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" name="txtpwd" required=""></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Login"></td>
		</tr>
	</table>
</form>
</body>
</html>