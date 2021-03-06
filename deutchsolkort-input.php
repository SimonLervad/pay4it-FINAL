

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
	#SolkortBox {
		position:fixed;
		top:0%;
		left:0%;
		width:100%;
		height:100%;
		text-align:center;
		transition-delay: 0.5s;
		transition-duration: 0.5s;
		font-size:50px;
		z-index:0;
		-webkit-transform: translateZ(0);
		transform: translateZ(0);
		overflow:inherit;
		padding:100px;
	}
	#paymentTypes {
	position:fixed;
	top:0;
	left:0;
	background-color:white;
	width:100%;
	height:100%;
	overflow:hidden;
	z-index:0;
	transition-duration: 0.5s;
	-webkit-transform: translateZ(0);
	transform: translateZ(0);
}
#paymentTypes p {
	width:auto;
	margin:100px auto;
	display:block;
}
#confirmPayment, #cancelPayment {
	position:relative;
	bottom:auto;
	left:auto;
	right:auto;
	margin:auto;
	z-index:1;
	width:100%;
	opacity:1;
	overflow:inherit;
	transition-duration: 0.5s;
	transition-delay: 0.5s;
	margin:150px 0;
}
#cancelPayment {
	bottom:10%;
	color:#022B44;
	font-size:40px;
	padding:10px 25px;
	text-align:center;
	display:block;
}

#glemtKode {
	font-size: 30px;
	color:#022B44;
}

.confirmButton {
        	background-color:white;
        	border:5px solid #022B44;
        	border-radius:50px;
        	width:75%;
        	color:#022B44;
        	font-size:40px;
        	padding:10px 25px;
        	display:block;
        	cursor:pointer;
        	outline:none;
        	text-decoration: none;
        }
</style>
	<h2>Solkort</h2>
	<div id="paymentTypes">
		<div id="solkortBox">
			<h1>Sonnenkarte</h1>
			<p>
				Sie haben sich für den Kauf einer Sonnenkarte entschieden, Ihre Daten werden nur zum Einloggen verwendet, wir speichern oder sehen Ihre Daten nicht.
			</p>
			<i class="far fa-address-card"></i>
			<form id="solkortForm">
				Telefonnummer <br>
				<input type="tel" name="tel" required="true"><br>
				Code <br>
				<input type="password" name="kode"><br>
				<a style="float:right;" href="" id="glemtKode">Code vergessen?</a>
			</form>
			<a href="deutchkabine.php" class="confirmButton" id="confirmPayment">
		Bestätige den Kauf
	</a>
	<a id="cancelPayment" href="index.php">Kauf abbrechen</a>
	</div>
		</div>
</div>

</body>
</html>
