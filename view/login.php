<?php
// So I don't have to deal with unset $_REQUEST['user'] when refilling the form
$_REQUEST['user']=!empty($_REQUEST['user']) ? $_REQUEST['user'] : '';
$_REQUEST['password']=!empty($_REQUEST['password']) ? $_REQUEST['password'] : '';
$_REQUEST['register']=!empty($_REQUEST['register']) ? $_REQUEST['register'] : '';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Finesse Co.</title>
	</head>
	<body>
		<center>
		<header><h1>Finesse Co.</h1></header>
		
		<main>
			
			<form method="post">
				<fieldset>
					<legend>Login</legend>
					<p> <label for="user">User</label>    
					<input type="text" name="user" value="<?php echo($_REQUEST['user']); ?>" autofocus></input> </p>
					<p> <label for="password">Password</label>
					<input type="password" name="password" ></input></p>
					<p> <input type="submit" name="submit" value="login" /></p>
					<p> <a href="?gback=Goback">Go Back</a></p>
					<?php echo(view_errors($errors)); ?>
					<br>
					<p>Not a member?</p> 
					<input type="submit" name="rzegister" value="Register" />
					
				</fieldset>
			</form>
		</main>
		<footer>
		</footer>
		</center>
	</body>
</html>

