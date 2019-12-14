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
			Kabine wählen
		</h1>
		<ul id="kabiner">
		</ul>
	</div>

	<!--
		Vælg varighed
	-->

	<div id="boxTwo">
		<h1>
			Dauer wählen
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
			Bestätigen
		</button>
		<article id="kvittering" class="ordre"> <!--Bestillingskassen-->
			<h3>
				Ihre Quittung
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
			Überspringen
		</button>
	</div>
	<div id="boxFour">
		<h1>
			Zahlungsart
		</h1>
		<div id="paymentMethod">
			<button type="button" class="payment" id="kort"><p>Kreditkarte</p><i class="far fa-credit-card"></i></button>
			<button type="button" class="payment" id="mobilepay"><p>Mobilepay</p><img src="images/mobilepay.png"></button>
			<button type="button" class="payment" id="sms"><p>SMS</p><i class="fas fa-sms"></i></button>
			<button type="button" class="payment" id="kontant"><p>Geld</p><i class="far fa-money-bill-alt"></i></button>
			<button type="button" class="payment" id="solkort"><p>Mit Sonnenkarte bezahlen</p><i class="far fa-address-card"></i></button>
			<button type="button" class="payment" id="solkortKøb"><p>Sonnenkarte hier kaufen</p><i class="far fa-address-card"></i></button>
		</div>
	</div>
	<div id="boxFive">
		<h1>
			Genehmigt
		</h1>
		<div id="sunTimeBox">
			<p>Ihre Suncabin startet in:</p>
			<p id="sunTime"></p>
		</div>
	</div>
</form>
<div id="paymentTypes">

<!--Nye solkort-->
	<div id="købSolkortBox">
		<h2>Sonnenkarte wählen</h2>
		<div class="solkorts">
		<div class="solkort" id="large"><img id="solL" src="./images/GoldCard-01.png" alt="Solkort guld" width="460"></div>
		<div class="solkort" id="medium"><img id="solM" src="./images/SilverCard-01.png" alt="Solkort sølv" width="460"></div>
		<div class="solkort" id="small"><img id="solS" src="./images/BronzeCard-01.png" alt="Solkort bronze" width="460"></div>
		</div>

		<a class="fortryd_knap" type="button" href="index.php">Stornieren</a>
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
		<h1>Geld</h1>
		<p>
			Sie haben sich entschieden, in bar zu bezahlen
		</p>
		<i class="far fa-money-bill-alt"></i>
		<ul>
			<li>1. Münzen einwerfen</li>
			<li>2. Überprüfen Sie die Menge</li>
		</ul>
	</div>
	<div id="kortBox">
		<h1>Karte</h1>
		<p>
			Sie zahlen mit Karte
		</p>
		<i class="far fa-credit-card"></i>
		<ul>
			<li>1. Karte einführen</li>
			<li>2. Gib 'den Code ein</li>
			<li>3. Zahlung genehmigen</li>
		</ul>
	</div>
	<div id="mobilepayBox">
		<h1>Mobilepay</h1>
		<p>
			Sie zahlen mit Mobilepay
		</p>
		<img src="images/mobilepay.png">
		<ul>
			<li>1. Gehe zu Mobilepay</li>
			<li>2. Code hier scannen</li>
			<li>3. Zahlung genehmigen</li>
		</ul>
	</div>
	<div id="smsBox">
		<h1>SMS</h1>
		<p>
			Sie zahlen mit SMS
		</p>
		<i class="fas fa-sms"></i>
		<ul>
			<li>1. Ihr Code ist 1234</li>
			<li>2. Textcode zu SMS "1240"</li>
			<li>3. Zahlung genehmigen</li>
		</ul>
	</div>
	<div id="solkortBox">
		<h1>Sonnekarte</h1>
		<p>
			Sie zahlen mit Sonnekarte
		</p>
		<i class="far fa-address-card"></i>
		<form id="solkortForm">
			Telefonnummer <br>
			<input type="tel" name="tel" required="true"><br>
			Code <br>
			<input type="password" name="kode"><br>
			<a style="float:right;" href="" id="glemtKode">Code vergessen?</a>
		</form>
	</div>
	<button class="confirmButton" id="confirmPayment">
		Bestätige Zahlung
	</button>
	<a id="cancelPayment" href="">Kauf abbrechen</a>
</div>

<?php include 'footer.php' ?>
