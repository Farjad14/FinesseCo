<?php
// So I don't have to deal with unset $_REQUEST['user'] when refilling the form
$_REQUEST['user']=!empty($_REQUEST['user']) ? $_REQUEST['user'] : '';
$_REQUEST['password']=!empty($_REQUEST['password']) ? $_REQUEST['password'] : '';
$_REQUEST['register']=!empty($_REQUEST['register']) ? $_REQUEST['register'] : '';
?>

<!DOCTYPE HTML>

<html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
    <script>
    $(document).ready(function() {
        var popup = document.getElementById('popup');
        var login = document.getElementById('login');
        var x = document.getElementsByClassName('close')[0];
        login.onclick = function(){
            popup.style.display="block";
        }
        window.onclick = function(event){
            if(event.target == popup){
                popup.style.display="none";
            }
        }
        x.onclick = function(){
            popup.style.display="none";
        }
    });
    </script>

    <head>
        <link rel="stylesheet" type="text/css" href="view/style.css">
        <title> Finesse Co. </title>
    </head>
    <body>
   	
        <div class="header">
            <div class="about">
                <a href="?about=about">About</a>
                <div class="links">
                    <a id="login">LOGIN</a>

                    <a href="?reg=regist">REGISTER</a>
                </div>
            </div>
            <div class="title">
                <h1>Finesse Co.</h1>
            </div>
	<div class="categories">
              <div class="laptop-dropdown">
                  <button class="droplap">Laptops</button>
                  <div class="laptop-content">
                    <a href="#">HP</a>
                    <a href="#">Dell</a>
                    <a href="#">Apple</a>
                    <a href="#">Lenovo</a>
                    <a href="#">Asus</a>
                    <a href="#">Other</a>

                    <h3><a href="#">View All</a></h3>
                  </div>
              </div>

              <div class="tablet-dropdown">
                  <button class="droplap">Tablets</button>
                  <div class="tablet-content">
                    <a href="#">Samsung</a>
                    <a href="#">Microsoft</a>
                    <a href="#">Apple</a>
                    <a href="#">Lenovo</a>
                    <a href="#">Other</a>

                    <h3><a href="#">View All</a></h3>
                  </div>
              </div>

            <div class="phone-dropdown">
              <button class="dropphones">Cell Phones</button>
              <div class="phone-content">
                <a href="#">Samsung</a>
                <a href="#">HTC</a>
                <a href="#">Apple</a>
                <a href="#">Google</a>
                <a href="#">LG</a>
                <a href="#">Other</a>

                <h3><a href="#">View All</a></h3>
            </div>
          </div>

          <div class="tv-dropdown">
            <button class="droptv">TVs</button>
            <div class="tv-content">
              <a href="#">Samsung</a>
              <a href="#">Sony</a>
              <a href="#">LG</a>
              <a href="#">Vizio</a>
              <a href="#">Other</a>

              <h3><a href="#">View All</a></h3>
          </div>
        </div>

        <div class="mp3-dropdown">
          <button class="dropmp3">MP3s</button>
          <div class="mp3-content">
            <a href="#">Apple</a>
            <a href="#">Sony</a>
            <a href="#">Samsung</a>
            <a href="#">Bondage</a>
            <a href="#">Other</a>

            <h3><a href="#">View All</a></h3>
        </div>
      </div>

      <div class="acc-dropdown">
        <button class="dropaccessories">Accessories</button>
        <div class="acc-content">
          <a href="#">Computer</a>
          <a href="#">Cell Phone</a>
          <a href="#">Camera</a>
          <a href="#">TV</a>
          <a href="#">Other</a>

          <h3><a href="#">View All</a></h3>
      </div>
    </div>
            </div>
            
            <hr id="cat">
        </div>

        <div id="popup">
	<form method="post">
            <div id=logger>
                <span class="close">&times;</span>
		
                <input type="text" id="user" name="user" value="<?php echo($_REQUEST['user']); ?>" autofocus placeholder="Username">
                </br>
                <input type="password" id="password" name="password" value="<?php echo($_REQUEST['passowrd']); ?>" placeholder="Password">
                </br>
                <div class="submitHolder">
               		<input type="submit" name="submit" value="login" />
			<?php echo(view_errors($errors)); ?>
                </div>
            </div>
	</form>
        </div>
	<div class="Featured">
          <h3>Featured</h3>
          <table>
            <table>
              <tr>
                <td><a href="?product2=product"><img src="images/iphone.jpg" alt="Iphone 7"></a>

                  <a href="#"><figcaption>Iphone 7 32GB Unlocked</figcaption>
                </a></td>

                <td><img src="images/laptop.jpg" alt="Lenovo Laptop">

                  <a href="#"><figcaption>HP ProBook BNIB</figcaption>
                </a></td>

                <td><img src="images/walkman.jpg" alt="Sony walkman">

                  <a href="#"><figcaption>Sony Walkman</figcaption>
                </a></td>

                <td><img src="images/s7case.jpg" alt="Samsung cases">

                  <a href="#"><figcaption>Galaxy s7 cases</figcaption>
                </a></td>
              </tr>
          </table>
        </div>
    </body>
</html>



