<?php

class Database {

	public function __construct() {
		$this->dbconn = pg_connect("host=mcsdb.utm.utoronto.ca dbname=shahraj_309 user=shahraj password=78117");
		if(!$this->dbconn){
				echo "Error connecting to database, try again later";
		}
		$this->counter = 1;
	}

	public function validateUser($username, $password) {
		$query = pg_prepare($this->dbconn, "q".$this->counter, "SELECT username, password FROM user WHERE username=$1 and password=$2"); # check result
		$query = pg_execute($this->dbconn, "q".$this->counter, array($username, $password));

		$arrayresult = pg_fetch_array($query);

		$this->counter += 1;

		if(!empty($arrayresult)) {
			return true;
		}
		return false;
	}

	public function registerUser($username, $password, $email, $first, $last, $phone, $city, $pro_state, $country, $street, $postal_zip) {
		if(isset($username)){
			$user = pg_prepare($this->dbconn, "q".$this->counter, "SELECT * FROM users WHERE username=$1"); # check result
			$user = pg_execute($this->dbconn, "q".$this->counter, array($username));
			$arr = pg_fetch_array($user);
			$this->counter += 1;
			if(empty($arr)){
				$userAdd = pg_prepare($this->dbconn, "q".$this->counter, 'INSERT INTO users VALUES($1, $2, $3, $4, $5, $6)'); # check result
				$userAdd = pg_execute($this->dbconn, "q".$this->counter, array($username, $email,  $password, $first, $last, $phone));

				//$_SESSION['state'] = "login";
				$this->counter += 1;
				$addAdd = pg_prepare($this->dbconn, "q".$this->counter, 'INSERT INTO address VALUES($1, $2, $3, $4, $5, $6)'); # check result
				$addAdd = pg_execute($this->dbconn, "q".$this->counter, array($username, $city, $pro_state, $country, $street, $postal_zip));

				$this->counter += 1;
				return true;
		}
		else {
				return false;
		}
	}

	}
?>
