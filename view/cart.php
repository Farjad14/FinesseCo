
<!DOCTYPE HTML>

<html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="view/style.css">
	
	<script>
	function myCart() {
            var request = $.ajax({
                url: "api/api.php",
                method: "POST",
                data: JSON.stringify({
                    username : $("#usernameDisplay").val(), type: "cart"
                }),
                contentType: "application/json; charset=UTF-8",

            });
            request.done(function(msg) {
		//alert("display the shit bitch!");
                var returned = JSON.parse(msg);
                for (var x = 1; x <= returned.length; x++) {
                    var id = "t" + x;
                    document.getElementById(id).value = returned[x - 1].product + "________" + returned[x - 1].price;
                }

            });
        }
	$(function() {
           myCart();
        });
	</script>

    <head>
       
        <title> Finesse Co. </title>
    </head>
    <body>
   	    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title> Finesse Co. </title>
	<div id = "header" class="header">
            <div class="about">
                <a href="view/about.php">About</a>
                <div class="links">
		<a><input type="text" id="usernameDisplay" value="<?php echo($_SESSION['user']->user); ?>" readonly style="border:none"></a>
		    <a href="?cart=cart" id="cart"><img src="images/cart.png" style="width: 25px" alt="My Cart"></a>
			 <a href="?prof=profi">Profile</a>
			 <a href="?logo=logout">Logout</a>

                </div>
            </div>
            <div class="title">
                <h1>Finesse Co.</h1>
            </div>

	<div id = "categories" class="categories">
               <div class="laptop-dropdown">
                  <button class="droplap">Laptops</button>
                  <div class="laptop-content">
                    <a href="about.php">HP</a>
                    <a href="#">Dell</a>
                    <a href="#">Apple</a>
                    <a href="#">Other</a>

                    <h3><a href="#">View All</a></h3>
                  </div>
              </div>

              <div class="tablet-dropdown">
                  <button class="droplap">Tablets</button>
                  <div class="tablet-content">
                    <a href="?samsungDisplay=samDisplay">Samsung</a>
                    <a href="#">Microsoft</a>
                    <a href="#">Apple</a>
                    <a href="#">Other</a>

                    <h3><a href="#">View All</a></h3>
                  </div>
              </div>

            <div class="phone-dropdown">
              <button class="dropphones">Cell Phones</button>
              <div class="phone-content">
                <a href="#">Samsung</a>
                <a href="#">Apple</a>
                <a href="#">Google</a>
                <a href="#">Other</a>

                <h3><a href="#">View All</a></h3>
            </div>
          </div>

      <div class="acc-dropdown">
        <button class="dropaccessories">Accessories</button>
        <div class="acc-content">
          <a href="#">Computer</a>
          <a href="#">Cell Phone</a>
          <a href="#">TV</a>
          <a href="#">Other</a>

          <h3><a href="#">View All</a></h3>
      </div>
    </div>
            </div>
            
            <hr id="cat">
        </div>

    </head>
    <body>


	
	<!--Cart Display!-->
	<div id="cartDisplay" >
		<center>
			<br>
			<br>
			<br>
			 <table id="hiscores" style="width:100%">
			    <tr>
				<td>
				    <p>My Cart</p>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="t1" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="t2" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="t3" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="t4" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="t5" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="t6" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="t7" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="t8" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="t9" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="t10" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>

			</table>
		</center>
	</div>

	

	


    </body>
</html>



