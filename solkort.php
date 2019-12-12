<?php include 'head.php' ?>

<head>
	<meta charset="utf-8">
</head>

<style type="text/css">
	#købSolkortBox {
		position:relative;
		left:0;
		top:0;
		right:0;
		width:100%;
		height:100%;
		background-color:white;
		z-index:100;
		text-align:center;
		font-size:50px;
		opacity: 1;
		transition-duration: 1s;
		transition-delay: 0.5s;
		overflow: hidden;
	}
	.solkortButton {
		display:flex;
		justify-content: space-around;
		flex-direction: column;
	}
	.solkorts {

	}
	.solkort {
		display: block;
		padding: 40px;
	}
</style>

<!-- Nye solkort sat ind -->

<div id="købSolkortBox">
	<h2>Opret solkort</h2>
	<div class="solkorts">
	<a href="solkort-input.php" class="solkort"><img src="./images/GoldCard-01.png" alt="Solkort guld" width="460"></a>
	<a href="solkort-input.php" class="solkort"><img src="./images/SilverCard-01.png" alt="Solkort sølv" width="460"></a>
	<a href="solkort-input.php" class="solkort"><img src="./images/BronzeCard-01.png" alt="Solkort bronze" width="460"></a>
	</div>

	<a href="index.php">Afbryd</a>
</div>

<!--
<div id="købSolkortBox">
	<h2>Opret solkort</h2>
	<div class="flex">
		<a href="solkort-input.php" class="solkortButton" id="small">
		</a>
		<a href="solkort-input.php" class="solkortButton" id="large">
			køb for 299,- og tag sol for 600,-
		</a>
		<a href="solkort-input.php" class="solkortButton" id="medium">
			køb for 199,- og tag sol for 350,-
		</a>
	</div>
	<a href="index.php">Afbryd</a>
</div>
-->


</body>
</html>
