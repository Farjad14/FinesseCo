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

<head>
        <link rel="stylesheet" type="text/css" href="view/style.css">
        <title> Finesse Co. </title>



	 <div class="header">
		
		 <div class="links">
			<input type="text" id="usernameDisplay" value="<?php echo($_SESSION['user']->user); ?>" readonly style="border:none">
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
                    <a href="samsungDisplay?=samDisplay">Samsung</a>
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
<div class="Featured" id="tablet-samsung">
		<h3>Samsung</h3>
		<table>
			<tr>
				<td width="50"><img id = "tabs3" src="images/tablets/samsung/galaxy_tab_s3.jpeg" alt="Samsung Galaxy S3 Tablet">
		<a href="?s3Display=s3"><figcaption>Samsung Galaxy Tab S3 9.7" 32GB Android N Tablet With Qualcomm APQ 8096 Quad-Core Processor - Black
		</figcaption></a></td>

				<td width="50"><img id = "tabA" src="images/tablets/samsung/galaxy_tab_a.jpg" alt="Samsung Galaxy A Tablet">
		<a href="#"><figcaption>Samsung Galaxy Tab A 10.1" 16GB Android 6.0 Tablet - White
		</figcaption></a></td>

			<td width="50"><img id = "tabELite" src="images/tablets/samsung/galaxy_Tab_e.jpg" alt="Samsung Galaxy Tab E Quad">
				<a href="#"><figcaption>Samsung Galaxy Tab 7" E Lite 8GB Android 4.4 Tablet with Spreadtrum T-Shark Quad-Core Processor-White
				</figcaption></a></td>

			<td width="50"><img id = "tabs2" src="images/tablets/samsung/galaxy_tab_s2.jpg" alt="Samsung Glaxy S2 Tablet">
					<a href="#"><figcaption>Samsung Galaxy Tab S2 8.0" 32GB Android 6.0 Marshmallow Tablet w/ Exynos 5433 8-Core - Gold
					</figcaption></a></td>

				<td width="50"><img id = "tabE" src="images/tablets/samsung/rsz_tab_e.jpg" alt="Samsung Galaxy Tablet E">
					<a href="#"><figcaption>Samsung - Galaxy Tab E Lite 7" 8GB - Black
					</figcaption></a></td>

			</tr>
	</table>
</div>
</html>
