<?php
// So I don't have to deal with unset $_REQUEST['user'] when refilling the form
$_REQUEST['user']=!empty($_REQUEST['user']) ? $_REQUEST['user'] : '';
$_REQUEST['password']=!empty($_REQUEST['password']) ? $_REQUEST['password'] : '';
$_REQUEST['register']=!empty($_REQUEST['register']) ? $_REQUEST['register'] : '';
?>


<!DOCTYPE HTML>

<html>
<link rel="stylesheet" type="text/css" href="../../view/style.css">

<script>

$(document).ready(function() {

var productName = document.getElementById('s3tabname');
var productPrice = document.getElementById('s3tabprice');


var cart = document.getElementById('cart2');

cart.onclick = function(){
	    
           //homeContent.style.display = "block";
	    //iphone7Display.style.display="none";
	    //cartDisplay.style.display="block";

	    var request = $.ajax({
                url: "/../api/api.php",
                method: "PUT",
                data: JSON.stringify({
                    username : $("usernameDisplay").val(), productName : $("#s3tabname").val(), price : $("#Iphone7price").val()
                }),
                contentType: "application/json; charset=UTF-8",

            });
            request.done(function(msg) {
		alert("Item Added to Cart");
                /*var returned = JSON.parse(msg);
                for (var x = 1; x <= returned.length; x++) {
                    var id = "t" + x;
                    document.getElementById(id).value = returned[x - 1].username + ": " + returned[x - 1].userscore;
                }*/

            });
	    
        }
});
</script>

<head>
        <link rel="stylesheet" type="text/css" href="view/style.css">
        <title> Finesse Co. </title>



	 <div class="header">
		 <div class="links">
			<a><input type="text" id="usernameDisplay" value="<?php echo($_SESSION['user']->user); ?>" readonly style="border:none"></a>
			 <a href="?prof=profi">Profile</a>
			 <a href="?logo=logout">Logout</a>
           	 </div>
            <div class="about">
                <a href="view/about.php">About</a>
               
            </div>
            <div class="title">
                <h1>Finesse Co.</h1>
            </div>
	<div class="categories">
               <div class="laptop-dropdown">
                  <button class="droplap">Laptops</button>
                  <div class="laptop-content">
                    <a href="Laptops/HP/HPLaptops.html">HP</a>
                    <a href="Laptops/Dell/DellLaptops.html">Dell</a>
                    <a href="Laptops/Apple/AppleLaptops.html">Apple</a>
                    <a href="Laptops/Other/OtherLaptops.html">Other</a>


                  </div>
              </div>

              <div class="tablet-dropdown">
                  <button class="droplap">Tablets</button>
                  <div class="tablet-content">
                    <a href="tablets/Samsung/tabletsSam.html">Samsung</a>
                    <a href="tablets/Microsoft/tabletMicrosoft.html">Microsoft</a>
                    <a href="tablets/Apple/tabletApple.html">Apple</a>
                    <a href="tablets/Other/tabletOther.html">Other</a>

                  </div>
              </div>

            <div class="phone-dropdown">
              <button class="dropphones">Cell Phones</button>
              <div class="phone-content">
                <a href="cellphones/samsung/phoneSamsung.html">Samsung</a>
                <a href="cellphones/apple/phoneApple.html">Apple</a>
                <a href="cellphones/Google/phoneGoogle.html">Google</a>
               	<a href="cellphones/other/phoneOther.html">Other</a>

            </div>
          </div>

      <div class="acc-dropdown">
        <button class="dropaccessories">Accessories</button>
        <div class="acc-content">
          <a href="accessories/computer/computer.html">Computer</a>
          <a href="accessories/cell/cell.html">Cell Phone</a>
          <a href="accessories/tv/tv.html">TV</a>
          <a href="accessories/other/other.html">Other</a>


      </div>
    </div>
            </div>
            
            <hr id="cat">
        </div>


    </head>




<!--#Change the Image ID-->
	<div class="Featured" id="s3tabdisplay">
		<center>
			<br>
			<br>
			<br>
			 <table>
				<tr>
				<td><img src="../images/tablets/samsung/galaxy_tab_s3.jpeg" alt="Samsung Galaxy S3 Tablet"></td>
						</tr>
						<tr> 
				<td><input type="text" name = "Product Name" id="s3tabname" value=" Samsung Galaxy Tab S3 9.7' 32GB Android N Tablet With Qualcomm APQ 8096 Quad-Core Processor - Black" style="border: none"></td>
				</tr>
				<tr>
				<td><input type="text" name = "Price" id="s3tabprice" value="$799.13" style="border: none"></td>
				</tr>
				<tr>
				<td>With a sleek premium design, quad speakers, and a Super AMOLED display with HDR compatibility, the Galaxy Tab S3 looks amazing, and sounds incredible. And with a Qualcomm APQ 8096 quad-core processor, 4GB RAM, and Android N, it performs in a class of its own. It includes the advanced S Pen with a wealth of tools and precision performance.</td>
						</tr>
				<tr><a id="cart2" class="cart">Add to Cart</a>
			</table>

		</center>
	</div>
</html>
