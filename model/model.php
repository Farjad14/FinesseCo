<?php

class db {
    public function __construct() {
        $GLOBALS['dbconn'] = pg_connect("host= mcsdb.utm.utoronto.ca dbname= shahraj_309 user='shahraj' password='78117'") or die('Could not connect: ' . pg_last_error());

		$query="INSERT INTO usersinfo(username, password, email, firstname, lastname, country, state, city, street) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9);";
		$result = pg_prepare($GLOBALS['dbconn'], "my_query", $query);

		$query  = "SELECT * FROM usersinfo where username =$1 and password =$2;";
		$result = pg_prepare($GLOBALS['dbconn'], "validateUser", $query);

		$query  = "SELECT * FROM usersinfo where username =$1;";
		$result = pg_prepare($GLOBALS['dbconn'], "checkUser", $query);

		$query  = "UPDATE usersinfo SET password = $1, firstname = $2, lastname = $3, email = $4 WHERE id = $5";
        	$result = pg_prepare($GLOBALS['dbconn'], "updateUser", $query);
    }
    
    public function registerUser($user, $pwd, $email, $fname, $lname, $country, $c_state, $city, $street) {
        $user  = strtolower($user);
        $check = $this->checkUser($user);
        if (!empty($check)) {
            $_SESSION['UserExists'] = "user exists";
        } else {
			$result = pg_execute($GLOBALS['dbconn'], "my_query", array($user, $pwd, $email, $fname, $lname, $country, $c_state, $city, $street));
			if($result){
		$rows_affected=pg_affected_rows($result);
       		//echo("rows_affected=$rows_affected");
	} else {
		echo("Could not execute query");
	}
        }
    }
    
    
    public function updateProfile($arr) {
        $query = "SELECT id FROM usersinfo WHERE username = $1";
        
        $result = pg_prepare($GLOBALS['dbconn'], "getUser", $query);
        $result = pg_execute($GLOBALS['dbconn'], "getUser", array(
            $_SESSION['user']->user
        ));
        $id     = pg_fetch_result($result, 0, 0);
        array_push($arr, $id);
        $result = pg_execute($GLOBALS['dbconn'], "updateUser", $arr);
    }
    

    
    public function validateUser($user, $pwd) {
        $user   = strtolower($user);
		$result = pg_execute($GLOBALS['dbconn'], "validateUser", array($user, $pwd));
        $result = pg_fetch_array($result);
        if (!empty($result)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function checkUser($user) {
        $user   = strtolower($user);
		$result = pg_execute($GLOBALS['dbconn'], "checkUser", array($user));
        $result = pg_fetch_array($result);
        if (!empty($result)) {
            return true;
        } else {
            return false;
        }
    }
}

class user {
    
    public function __construct($user) {
        $this->user  = $user;
        $query       = "SELECT * FROM usersinfo WHERE username = '$user';";
		$result=pg_query($GLOBALS['dbconn'], $query);
		$row = pg_fetch_array($result);
		$this->id  = $row[0];
		$this->pass  = $row[2];
		$this->email = $row[3];
		$this->fname = $row[4];
		$this->lname = $row[5];
       		$this->name  = $this->fname . " " . $this->lname;
    }
    
    public function updateUser($arr) {
        $this->pass  = $arr['password'];
        $this->fname = $arr['firstname'];
        $this->lname = $arr['lastname'];
        $this->email = $arr['email'];
    }
    
    
}

?>
