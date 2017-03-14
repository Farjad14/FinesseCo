<?php
// So I don't have to deal with unset $_REQUEST['user'] when refilling the form
$_REQUEST['user']=!empty($_REQUEST['user']) ? $_REQUEST['user'] : '';
$_REQUEST['password']=!empty($_REQUEST['password']) ? $_REQUEST['password'] : '';
?>
<!DOCTYPE HTML>
<html>
	<h2>Login</h2>
	<form method="post" action="../index.php">
		<p class="userpass">
			<label for="user">User2: </label>
			<input type="text" id="user"></input>
		</p>
		<p class="userpass">
			<label for="password">Password: </label>
			<input type="password" id="password"></input>
		</p>
		<input type="submit"> Submit2 </input>
        
	</form>
</html>
