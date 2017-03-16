<?php
require_once "model/model.php";
session_save_path("sess");
session_start();
ini_set('display_errors', 'Off');

$_SESSION['db'] = new db();
$errors         = array();
$view           = "";


/* controller code */
if (isset($_REQUEST['logo'])) {
    session_destroy();
    session_unset();
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri/");
    
}

if (isset($_REQUEST['about'])) {
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri/");
    
    if($_SESSION['state'] == 'homeLI'){
	    $_SESSION['state'] = 'aboutLI';
	    $view              = "aboutLI.php";
	}else{
 	    $_SESSION['state'] = 'about';
	    $view              = "about.php";
		}
}


if (isset($_REQUEST['gback'])) {
    session_destroy();
    session_unset();
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri/");
    
}

if (isset($_REQUEST['Aboutgback'])) {
    //session_destroy();
    //session_unset();
    $_SESSION['state'] = 'homeLI';
	    $view              = "homeLI.php";
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri/");
	
    
}

if (isset($_REQUEST['logn'])) {
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri/");
    $_SESSION['state'] = 'login';
    $view              = "login.php";
    
}

if (isset($_REQUEST['reg'])) {
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri/");
    $_SESSION['state'] = 'register';
    $view              = "register.php";
    
}

if (isset($_REQUEST['prof'])) {
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri/");
    $_SESSION['state'] = 'profile';
    $view              = "profile.php";
    
}

if (isset($_REQUEST['product'])) {
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri/");
    $_SESSION['state'] = 'product';
    $view              = "product.php";
    
}

if (isset($_REQUEST['product2'])) {
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri/");
    $_SESSION['state'] = 'product2';
    $view              = "product2.php";
    
}

if (!isset($_SESSION['state'])) {
    $_SESSION['state'] = 'home';
}
switch ($_SESSION['state']) {

    case "product":
	
	$view = "product.php";
	
	break;

    case "product2":
	
	$view = "product2.php";
	
	break;

    case "about":
	
	$view = "about.php";
	
	break;

    case "aboutLI":
	$view = "aboutLI.php";
	break;

    case "home":
	$view = "home.php";

	//Login Stuff	
	// check if submit or not
        
        if (empty($_REQUEST['submit']) || $_REQUEST['submit'] != "login") {
            break;
        }
        
        // validate and set errors
        
        if (empty($_REQUEST['user'])) {
            $errors[] = 'Username is required';
        }
        
        if (empty($_REQUEST['password'])) {
            $errors[] = 'Password is required';
        }
        
        if (!empty($errors))
            break;
        
        $valid     = $_SESSION['db']->validateUser($_REQUEST['user'], $_REQUEST['password']);
        if ($valid) {
		$_SESSION['user'] = new user($_REQUEST['user']);
		//$_SESSION['user']->setReq();
		$_SESSION['state'] = "homeLI";
            	$view= "homeLI.php";
		
		
            
        } else {
            $errors[] = "invalid login";
        }
	
	break;

    case "homeLI":
	$view = "homeLI.php";
	break;

    case "register":
        
        $view = "register.php";
        
        
	$user  = $_REQUEST['user'];
        $pwd   = $_REQUEST['password'];
        $fname = $_REQUEST['firstname'];
        $lname = $_REQUEST['lastname'];
        $email = $_REQUEST['email'];
        $country  = $_REQUEST['country'];
	$c_state = $_REQUEST['c_state'];
	$city = $_REQUEST['city'];
	$street = $_REQUEST['street'];
        
        if (empty($user) || empty($pwd) || empty($fname) || empty($lname) || empty($email) || empty($country) || empty($c_state) || empty($city) || empty($street)) {
            $errors[] = 'Missing required information';
        }else{

			$_SESSION['db']->registerUser($user, $pwd, $email, $fname, $lname, $country, $c_state, $city, $street);

			if (isset($_SESSION['UserExists'])) {
				$errors[] = "Username already exists";
				unset($_SESSION['UserExists']);
			} else {
				
				$_SESSION['state'] = "homeLI";
				$view= "homeLI.php";

			}
        }

        break;
    
    case "login":
        
        // the view we display by default
        
        $view = "login.php";
        if (isset($_POST["register"])) {
            $_SESSION['state'] = "register";
            $view              = "register.php";
        }
        
        // check if submit or not
        
        if (empty($_REQUEST['submit']) || $_REQUEST['submit'] != "login") {
            break;
        }
        
        // validate and set errors
        
        if (empty($_REQUEST['user'])) {
            $errors[] = 'Username is required';
        }
        
        if (empty($_REQUEST['password'])) {
            $errors[] = 'Password is required';
        }
        
        if (!empty($errors))
            break;
        
        $valid     = $_SESSION['db']->validateUser($_REQUEST['user'], $_REQUEST['password']);
        if ($valid) {
		$_SESSION['user'] = new user($_REQUEST['user']);
		//$_SESSION['user']->setReq();
		$_SESSION['state'] = "homeLI";
            	$view= "homeLI.php";
		
            
        } else {
            $errors[] = "invalid login";
        }
        
        break;
    
    /*case "profile":
        
        // the view we display by default
        $view = "profile.php";
        
		$pwd   = $_REQUEST['password'];
        $fname = $_REQUEST['firstname'];
        $lname = $_REQUEST['lastname'];
        $email = $_REQUEST['email'];
	
		if (isset($_REQUEST['proff'])) {  
			if (empty($pwd) || empty($fname) || empty($lname) || empty($email)) {
					$errors[] = 'Please fill out all fields!';
			}else{
				

					$arr = array(
						'password' => $_REQUEST['password'],
						'firstname' => $_REQUEST['firstname'],
						'lastname' => $_REQUEST['lastname'],
						'email' => $_REQUEST['email']
					);
					$_SESSION['db']->setVisited($_SESSION['user']->user);
					$_SESSION['db']->updateProfile($arr);
					$_SESSION['user']->updateUser($arr);
					
					
					if ($_SESSION['db']->getType($_REQUEST['user']) == 'student') {
						$_SESSION['user']->getAllCoursesStdnt();
						$_SESSION['state'] = 'studentjclass';
						$view              = "student_joinclass.php";
					} else {
						$_SESSION['user']->getAllCoursesIns();
						$_SESSION['state'] = 'instructCreateClass';
						$view              = "instructor_createclass.php";
					}
			}
		}
		
        break;*/
    
    
}

require_once "view/view_lib.php";

require_once "view/$view";

// require_once "view/*";

?>
