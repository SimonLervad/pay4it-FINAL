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
			Choose Suncabin
		</h1>
		<ul id="kabiner">
		</ul>
	</div>

	<!--
		Vælg varighed
	-->

	<div id="boxTwo">
		<h1>
			Choose Duration
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
			Confirm
		</button>
		<article id="kvittering" class="ordre"> <!--Bestillingskassen-->
			<h3>
				Your Reciept
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
			Skip this
		</button>
	</div>
	<div id="boxFour">
		<h1>
			Payment type
		</h1>
		<div id="paymentMethod">
			<button type="button" class="payment" id="kort"><p>Card</p><i class="far fa-credit-card"></i></button>
			<button type="button" class="payment" id="mobilepay"><p>Mobilepay</p><img src="images/mobilepay.png"></button>
			<button type="button" class="payment" id="sms"><p>SMS</p><i class="fas fa-sms"></i></button>
			<button type="button" class="payment" id="kontant"><p>Cash</p><i class="far fa-money-bill-alt"></i></button>
			<button type="button" class="payment" id="solkort"><p>Pay with Suncard</p><i class="far fa-address-card"></i></button>
			<button type="button" class="payment" id="solkortKøb"><p>Buy Suncard</p><i class="far fa-address-card"></i></button>
		</div>
	</div>
	<div id="boxFive">
		<h1>
			Approved
		</h1>
		<div id="sunTimeBox">
			<p>Your Suncabin will start in:</p>
			<p id="sunTime"></p>
		</div>
	</div>
</form>
<div id="paymentTypes">

<!--Nye solkort-->
	<div id="købSolkortBox">
		<h2>Choose Suncard</h2>
		<div class="solkorts">
		<div class="solkort" id="large"><img id="solL" src="./images/GoldCard-01.png" alt="Solkort guld" width="460"></div>
		<div class="solkort" id="medium"><img id="solM" src="./images/SilverCard-01.png" alt="Solkort sølv" width="460"></div>
		<div class="solkort" id="small"><img id="solS" src="./images/BronzeCard-01.png" alt="Solkort bronze" width="460"></div>
		</div>

		<a class="fortryd_knap" type="button" href="index.php">Cancel</a>
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
		<h1>Cash</h1>
		<p>
			You choose to pay in cash
		</p>
		<i class="far fa-money-bill-alt"></i>
		<ul>
			<li>1. Insert coins</li>
			<li>2. Check the amount</li>
		</ul>
	</div>
	<div id="kortBox">
		<h1>Card</h1>
		<p>
			You choose to pay with card
		</p>
		<i class="far fa-credit-card"></i>
		<ul>
			<li>1. Insert card</li>
			<li>2. Type code</li>
			<li>3. Approve payment</li>
		</ul>
	</div>
	<div id="mobilepayBox">
		<h1>Mobilepay</h1>
		<p>
			You choose to pay with Mobilepay
		</p>
		<img src="images/mobilepay.png">
		<ul>
			<li>1. Go to Mobilepay</li>
			<li>2. Scan code here</li>
			<li>3. Approve payment</li>
		</ul>
	</div>
	<div id="smsBox">
		<h1>SMS</h1>
		<p>
			You choose to pay with SMS
		</p>
		<i class="fas fa-sms"></i>
		<ul>
			<li>1. Your code is 1234</li>
			<li>2. Text code to sms "1240"</li>
			<li>3. Approve payment</li>
		</ul>
	</div>
	<div id="solkortBox">
		<h1>Suncard</h1>
		<p>
			You choose to pay with Suncard
		</p>
		<i class="far fa-address-card"></i>
		<form id="solkortForm">
			Phonenumber. <br>
			<input type="tel" name="tel" required="true"><br>
			Code <br>
			<input type="password" name="kode"><br>
			<a style="float:right;" href="" id="glemtKode">Forgot code?</a>
		</form>
	</div>
	<button class="confirmButton" id="confirmPayment">
		Confirm payment
	</button>
	<a id="cancelPayment" href="">Cancel purchase</a>
</div>

<?php include 'footer.php' ?>
