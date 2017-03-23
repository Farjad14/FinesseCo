<?php
// So I don't have to deal with unset $_REQUEST['user'] when refilling the form
$_REQUEST['user']=!empty($_REQUEST['user']) ? $_REQUEST['user'] : '';
$_REQUEST['password']=!empty($_REQUEST['password']) ? $_REQUEST['password'] : '';
$_REQUEST['register']=!empty($_REQUEST['register']) ? $_REQUEST['register'] : '';
?>


<!DOCTYPE HTML>

<html>
<link rel="stylesheet" type="text/css" href="../../view/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    	<script type="text/javascript" src="jquery-3.1.1.min.js"></script>

<script>

$(document).ready(function() {

//var productName = document.getElementById('s3tabname');
//var productPrice = document.getElementById('s3tabprice');

//alert("i got here");
var cart = document.getElementById('cart1');
var tabDisplay = document.getElementById('s3tabdisplay');
var cartDisplay = document.getElementById('cartDisplay');
//var checkout = document.getElementById('checkout');


cart.onclick = function(){
	    
            //cartDisplay.style.display="block";
		alert("Item Added to Cart");
		$("#s3tabdisplay").hide();
		cartDisplay.style.display="block";
		
		
	    var request = $.ajax({
                url: "api/api.php",
                method: "PUT",
                data: JSON.stringify({
                    username : $("#usernameDisplay").val(), productName : $("#s3tabname").val(), price : $("#s3tabprice").val()
                }),
                contentType: "application/json; charset=UTF-8",

            });
            request.done(function(msg) {
		
		
                /*var returned = JSON.parse(msg);
                for (var x = 1; x <= returned.length; x++) {
                    var id = "t" + x;
                    document.getElementById(id).value = returned[x - 1].username + ": " + returned[x - 1].userscore;
                }*/

            });
	    
        } 
var checkout = document.getElementById('checkout');
var BuyNow = document.getElementById('BuyNow');
var orderHistory = document.getElementById('orderHistory');
var purchase = document.getElementById('purchase');
checkout.onclick = function(){
	    
            //cartDisplay.style.display="block";
		alert("Item Checked out!");
		$("#s3tabdisplay").hide();
		cartDisplay.style.display="none";
		BuyNow.style.display="block";
		
	    
	    
        }    
purchase.onclick = function(){
	    
            //cartDisplay.style.display="block";
		alert("Your Item Has Succefully been purchased!");
		$("#s3tabdisplay").hide();
		cartDisplay.style.display="none";
		BuyNow.style.display="none";
		orderHistory.style.display="block";
		
	    
	    
        }   

   
});
</script>


<script>
	function myCart() {
            var request = $.ajax({
                url: "api/api.php",
                method: "POST",
                data: JSON.stringify({
                    type: "cart"
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
		for (var x = 1; x <= returned.length; x++) {
                    var id = "tb" + x;
                    document.getElementById(id).value = returned[x - 1].product + "________" + returned[x - 1].price;
                }

            });
        }
	$(function() {
           myCart();
        });
</script>

<head>
        <link rel="stylesheet" type="text/css" href="view/style.css">
        <title> Finesse Co. </title>



	 <div class="header">
		 <div class="links">
			<a><input type="text" id="usernameDisplay" value="<?php echo($_SESSION['user']->user); ?>" readonly style="border:none"></a>
			<a href="?cart=cart"><img src="images/cart.png" style="width: 25px" alt="My Cart"></a>
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
                    <a href="?samsungDisplay=samDisplay">Samsung</a>
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
				<td><img src="images/tablets/samsung/galaxy_tab_s3.jpeg" alt="Samsung Galaxy S3 Tablet"></td>
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
				<tr><a id="cart1" class="cart">Add to Cart</a>
			</table>

		</center>
	</div>


	<!--Cart Display!-->
	<div id="cartDisplay" style="display:none">
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
				<tr><a id="checkout" class="cart">Checkout</a></tr>
			</table>
		</center>
	</div>


<!--#Change the Image ID-->
	<div class="Featured" id="BuyNow" style="display:none">
		<center>
			<br>
			<br>
			<br>
			 <table>
				<tr>
				<td><img src="images/tablets/samsung/galaxy_tab_s3.jpeg" alt="Samsung Galaxy S3 Tablet"></td>
						</tr>
						<tr> 
				<td><input type="text" name = "Product Name" id="s3tabname" value=" Samsung Galaxy Tab S3 9.7' 32GB Android N Tablet With Qualcomm APQ 8096 Quad-Core Processor - Black" style="border: none"></td>
				</tr>
				<tr>
				<td>Subtotal (without Taxes): <input type="text" name = "Price" id="s3tabprice" value="$799.13" style="border: none"></td>
				</tr>
				<tr>
				<td>HST(13%):<input type="text" name = "Price" id="s3tabprice" value="$103.89" style="border: none"></td>
				</tr>
				<tr>
				<td>Total (with Taxes): <input type="text" name = "Price" id="s3tabprice" value="$903.02" style="border: none"></td>
				</tr>
				<br>
				<br>
				<br>
				<p>------------Pay VIA Credit Card ONLY---------</p>
				<td>Name (as displayed on the Card) <input type="text" name = "Price" id="s3tabprice" value="" required></td>
				<td><input type="text" name = "space" id="s3tabprice" value="" style="border:none" readonly required></td>
				<td>Credit Card Number <input type="text" name = "Price" id="s3tabprice" value="" required></td>
				<td><input type="text" name = "space" id="s3tabprice" value="" style="border:none" readonly required></td>
				<td>SSN # (3 Digit back of your card) <input type="text" name = "Price" id="s3tabprice" value="" required></td>
				<td><input type="text" name = "space" id="s3tabprice" value="" style="border:none" readonly required></td>
				</tr>
				<td>Expiry Date <input type="text" name = "Price" id="s3tabprice" placeholder="mm/yy" value="" required></td>
				<td><input type="text" name = "space" id="s3tabprice" value="" style="border:none" readonly required></td>
				</tr>
				<tr><a id="purchase" class="cart">Purchase!</a>
			</table>

		</center>
	</div>


<div class="Featured" id="orderHistory" style="display:none">
		<center>
			<br>
			<br>
			<br>
			 <table>
				<h3>Order History</h3>
				
			<br>
			<br>
			<br>
			 <table id="hiscores" style="width:100%">
			    <tr>
				<td>
				    <p>Items Purchased</p>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="tb1" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="tb2" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="tb3" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="tb4" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="tb5" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="tb6" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="tb7" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="tb8" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="tb9" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
			    <tr>
				<td><input type="text" id="tb10" value="" size="140" class="hs" style="border:none" readonly></input>
				</td>
			    </tr>
				<tr>
				<td>Amount Paid - Total (with Taxes): <input type="text" name = "Price" id="s3tabprice" value="$903.02" style="border: none"></td>
				</tr>
				<br>
				<br>
			</table>
		
			</table>

		</center>
	</div>
</html>
