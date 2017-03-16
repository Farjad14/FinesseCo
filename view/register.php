<?php
// So I don't have to deal with unset $_REQUEST['user'] when refilling the form
$_REQUEST['user']=!empty($_REQUEST['user']) ? $_REQUEST['user'] : '';
$_REQUEST['password']=!empty($_REQUEST['password']) ? $_REQUEST['password'] : '';
$_REQUEST['firstname']=!empty($_REQUEST['firstname']) ? $_REQUEST['firstname'] : '';
$_REQUEST['lastname']=!empty($_REQUEST['lastname']) ? $_REQUEST['lastname'] : '';
$_REQUEST['email']=!empty($_REQUEST['email']) ? $_REQUEST['email'] : '';
$_REQUEST['country']=!empty($_REQUEST['country']) ? $_REQUEST['country'] : '';
$_REQUEST['c_state']=!empty($_REQUEST['c_state']) ? $_REQUEST['c_state'] : '';
$_REQUEST['city']=!empty($_REQUEST['city']) ? $_REQUEST['city'] : '';
$_REQUEST['street']=!empty($_REQUEST['street']) ? $_REQUEST['street'] : '';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Finesse Co.</title>
		<link rel="stylesheet" type="text/css" href="view/style.css">

	</head>
	<body>
		<div class="header">
		<div class="about">
			<a href="?gback=goback">Home</a>
		</div>
		<center>
		 <div class="title">
                <h1>Register</h1>
            </div>
            <hr id="cat">
        
		<form method ="post">
				<p><input type="user" name="user" value="<?php echo($_REQUEST['user']); ?>"pattern="[A-Za-z0-9]+" required placeholder="Username"/> </p>
				<p><input type="password" name="password" value="<?php echo($_REQUEST['password']); ?>" required placeholder="Password"/> </p>
				<p><input type="firstname" name="firstname" value="<?php echo($_REQUEST['firstname']); ?>" pattern="[A-Za-z]+" required placeholder="First Name"/> </p>
				<p><input type="lastname" name="lastname" value="<?php echo($_REQUEST['lastname']); ?>" required pattern="[A-Za-z]+" placeholder="Last Name"/> </p>
				<p><input type="email" name="email" value="<?php echo($_REQUEST['email']); ?>"  placeholder="Email"/> </p>
				<p><input type="text" name="country" value="<?php echo($_REQUEST['country']); ?>" required pattern="[A-Za-z]+" placeholder="Country"/> </p>
				<p><input type="text" name="c_state" value="<?php echo($_REQUEST['c_state']); ?>" required pattern="[A-Za-z]+" placeholder="Province/State"/> </p>
				<p><input type="text" name="city" value="<?php echo($_REQUEST['city']); ?>" required pattern="[A-Za-z]+" placeholder="City"/> </p>
				<p><input type="text" name="street" value="<?php echo($_REQUEST['street']); ?>" required pattern="[A-Za-z0-9 ]+" placeholder="Street"/> </p>
				<br>
				<div id="regSubmit">
				<p><input type="submit" name="submit" value="Sign Up" /> </p>
				</div>
				<p><?php echo(view_errors($errors)); ?> </p>

		</form>
		</center>
	</body>
</html>

