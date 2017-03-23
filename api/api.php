# Your RESTFUL API
<?php
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true);



//$GLOBALS['dbconn'] = pg_connect("host= $LOCATION dbname= $DBNAME user='$UTORID' password='$DBPASSWORD'") or die('Could not connect: ' . pg_last_error());
$GLOBALS['dbconn'] = pg_connect("host= mcsdb.utm.utoronto.ca dbname= shahraj_309 user='shahraj' password='78117'") or die('Could not connect: ' . pg_last_error());
	
$unameE = $pwdE = $nameE = $emailE = "";



if($method == 'POST'){

	//$productName = $input["pname"];
	//$price = $input["price"];
	$username = $input["username"];
	#Checking if Username already exists
	$query  = "SELECT * FROM cart where username =$1;";
	$result = pg_prepare($GLOBALS['dbconn'], "checkUser", $query);
	$result = pg_execute($GLOBALS['dbconn'], "checkUser", array($username));
        $result = pg_fetch_array($result);
	if (empty($result)) {
		$mode = $input["type"];
		if($mode =="cart"){

		$query5  = "select product, price from cart;";
		$result = pg_query($GLOBALS['dbconn'], $query5);
		$result4 = pg_fetch_all($result);
			
		echo json_encode($result4);
		header($_SERVER["SERVER_PROTOCOL"]." 200");
		}
	}

}else if($method == 'PUT'){
	
	$productName = $input["productName"];
	$price = $input["price"];
	
	$username = $input["username"];
	
	

	#Checking if Username already exists
	$query  = "SELECT * FROM cart where username =$1;";
	$result = pg_prepare($GLOBALS['dbconn'], "checkUser", $query);
	$result = pg_execute($GLOBALS['dbconn'], "checkUser", array($username));
        $result = pg_fetch_array($result);

	



        if (empty($result)) {
		
        	$query2="INSERT INTO cart(username, product, price) VALUES ($1,$2, $3);";
		$result2 = pg_prepare($GLOBALS['dbconn'], "my_query", $query2);			
		$result2 = pg_execute($GLOBALS['dbconn'], "my_query", array($username, $productName, $price));
		if($result2){
			//echo json_encode($username);
			header($_SERVER["SERVER_PROTOCOL"]." 200");
		} else {
			echo json_encode("Dope!");
		}
        } else {

	    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        }	
	
	

}else if($method == 'GET'){

	

	
	

}

?>
