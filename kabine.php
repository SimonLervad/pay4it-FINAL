<?php include 'head.php' ?>
<style type="text/css">
	#helpOpen {color:#232323;text-shadow:none;box-shadow:none;border:none;}
</style>
<style>
.fortryd_knap {
	background-color:white;
	border: none;
	border-radius:50px;
	width:75%;
	color:#022B44;
	font-size:30px;
	padding:10px 25px;

	cursor:pointer;
	outline:none;
	text-decoration: none;
}
</style>
<form id="container">

	<!--
		vælg kabine
	-->

	<div id="boxOne">
		<h1>
			Vælg Kabine
		</h1>
		<ul id="kabiner">
		</ul>
	</div>

	<!--
		Vælg varighed
	-->

	<div id="boxTwo">
		<h1>
			Vælg Varighed
		</h1>
		<article class="pickTime"><!--Vælg tid-->
		    <div>
		        <label for="time" id="time">10 min</label> <br>
		        <div class="sliderContainer">
		            <input type="range" class="slider" id="myRange">
		        </div>
		    </div>
		    <!--   -->
		</article>
		<button class="confirmButton" id="confirmTime" type="button">
			Bekræft
		</button>
		<article id="kvittering" class="ordre"> <!--Bestillingskassen-->
			<h3>
				Din Kvittering
			</h3>
			<div id="kabine"></div>
			<div style="display:flex;justify-content: space-between;">
				<div id="ordreTime">
			    </div>
			    <div style="display:flex">
		    		<div id="priceTag"></div>
		    		<div><label style="margin:0;">&nbsp;kr</label></div>
		    	</div>
			</div>
		    <div id="produktKøbt">
		    </div>
		    <div class="ordreBlack">
		    	<div>
		    		Total
		    	</div>
		    	<div style="display:flex;">
		    		<div>
		    			<label id="total">10 </label>
		    		</div>
		    		<div>
		    			<label>&nbsp;kr</label>
		    		</div>
		    	</div>
		    </div>
		</article>
	</div>

	<!--
		Vælg tilbehør
	-->

	<div id="boxThree">
		<div id="products">

		</div>
		<button class="confirmButton" id="confirmProduct" type="button">
			Spring over
		</button>
	</div>
	<div id="boxFour">
		<h1>
			Betalingsform
		</h1>
		<div id="paymentMethod">
			<button type="button" class="payment" id="kort"><p>Kort</p><i class="far fa-credit-card"></i></button>
			<button type="button" class="payment" id="mobilepay"><p>Mobilepay</p><img src="images/mobilepay.png"></button>
			<button type="button" class="payment" id="sms"><p>SMS</p><i class="fas fa-sms"></i></button>
			<button type="button" class="payment" id="kontant"><p>Kontant</p><i class="far fa-money-bill-alt"></i></button>
			<button type="button" class="payment" id="solkort"><p>Betal med Solkort</p><i class="far fa-address-card"></i></button>
			<button type="button" class="payment" id="solkortKøb"><p>Køb Solkort</p><i class="far fa-address-card"></i></button>
		</div>
	</div>
	<div id="boxFive">
		<h1>
			Godkendt
		</h1>
		<div id="sunTimeBox">
			<p>Din soltid start om:</p>
			<p id="sunTime"></p>
		</div>
	</div>
</form>
<div id="paymentTypes">

<!--Nye solkort-->
	<div id="købSolkortBox">
		<h2>Vælg solkort</h2>
		<div class="solkorts">
		<div class="solkort" id="large"><img id="solL" src="./images/GoldCard-01.png" alt="Solkort guld" width="460"></div>
		<div class="solkort" id="medium"><img id="solM" src="./images/SilverCard-01.png" alt="Solkort sølv" width="460"></div>
		<div class="solkort" id="small"><img id="solS" src="./images/BronzeCard-01.png" alt="Solkort bronze" width="460"></div>
		</div>

		<a class="fortryd_knap" type="button" href="index.php">Fortryd</a>
	</div>
	<!--div id="købSolkortBox">
		<h1>Køb solkort</h1>
		<div class="flex">
			<button class="solkortButton" id="small">
				Køb for 99,- og tag sol for 150,-
			</button>
			<button class="solkortButton" id="large">
				køb for 299,- og tag sol for 600,-
			</button>
			<button class="solkortButton" id="medium">
				køb for 199,- og tag sol for 350,-
			</button>
		</div>
		<a href="">Afbryd</a>
	</div-->
	<div id="kontantBox">
		<h1>Kontant</h1>
		<p>
			Du har valgt at betale med kontant
		</p>
		<i class="far fa-money-bill-alt"></i>
		<ul>
			<li>1. Indsæt mønter</li>
			<li>2. Kontroller beløbet</li>
		</ul>
	</div>
	<div id="kortBox">
		<h1>Kort</h1>
		<p>
			Du har valgt at betale med Kort
		</p>
		<i class="far fa-credit-card"></i>
		<ul>
			<li>1. Indsæt kort</li>
			<li>2. Indtast kode</li>
			<li>3. Godkend betaling</li>
		</ul>
	</div>
	<div id="mobilepayBox">
		<h1>Mobilepay</h1>
		<p>
			Du har valgt at betale med Mobilepay
		</p>
		<img src="images/mobilepay.png">
		<ul>
			<li>1. Gå ind på mobilepay</li>
			<li>2. Scan koden her</li>
			<li>3. Godkend betaling</li>
		</ul>
	</div>
	<div id="smsBox">
		<h1>SMS</h1>
		<p>
			Du har valgt at betale med SMS
		</p>
		<i class="fas fa-sms"></i>
		<ul>
			<li>1. Din kode er 1234</li>
			<li>2. Send din kode på sms til "1240"</li>
			<li>3. Afvent godkendelse</li>
		</ul>
	</div>
	<div id="solkortBox">
		<h1>Solkort</h1>
		<p>
			Du har valgt at betale med Solkort
		</p>
		<i class="far fa-address-card"></i>
		<form id="solkortForm">
			Telefonnr. <br>
			<input type="tel" name="tel" required="true"><br>
			Kode <br>
			<input type="password" name="kode"><br>
			<a style="float:right;" href="" id="glemtKode">Glemt kode?</a>
		</form>
	</div>
	<button class="confirmButton" id="confirmPayment">
		Bekræft Køb
	</button>
	<a id="cancelPayment" href="">Anuller køb</a>
</div>

<?php include 'footer.php' ?>
