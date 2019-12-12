<!DOCTYPE html>
<html>
<head>
	<head>
	<title>Pay4it</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/9f34627289.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

</head>
<body>

<nav>
	<button onclick="helpOpen()" id="helpOpen">
		<i class="fas fa-question-circle"></i>
	</button>
</nav>
<div id="help">
	<h1 style="padding:40px">Hjælp</h1>
	<h2 style="padding:10px">Hvad betyder ikonerne foran kabinerne?</h2>
				<p style="padding:10px">
					Kabinerne har forskellige funktioner, man kan bl.a. få en kabine med aroma, spray, blæst osv. Det lille ikon foran kabinen viser, hvilke muligheder der inden i dem.
				</p>
				<h2 style="padding:10px">Hvordan vælger jeg tid?</h2>
				<p style="padding:10px">
					For at vælge tid, skal du trække den runde knap frem og tilbage, så du kan ændre tiden. Tiden vil blive ændret, hvilket man kan se ovenover knappen.
				</p style="padding:10px">
				<h2 style="padding:10px">Hvordan betaler jeg?</h2>
				<p style="padding:10px">
					Der bliver tilbudt forskellige betalingsmuligheder. Du kan betale med solkort, mobilepay, kort, sms og kontant.
				</p>
				<h2 style="padding:10px">Hvad er et solkort?</h2>
				<p style="padding:10px">
					Et solkort giver dig muligheden for at indsætte et beløb på et kort, som du kan anvende i solcentrene. Du skal blot oprette dig vha. mobil/e-mail, så du altid kan benytte dit solkort.
					Dine informationer vil kun blive benyttet, så du kan logge ind.
				</p>
				<h2 style="padding:10px">Hvad gør jeg hvis maskinen er i stykker?</h2>
				<p style="padding:10px">
					Hvis en af maskinerne er i stykker, eller du oplever noget andet, som ikke er i orden, kan du kontakte os på +45 00 00 00 00
				</p>
				<h2 style="padding:10px">Hvordan kontakter jeg solcenteret?</h2>
				<p style="padding:10px">
					Har du problemer, kan du kontakte os på dette nummer: +45 00 00 00 00
				</p>
	<button onclick="helpClose()" id="closeHelp">
		<i class="far fa-times-circle"></i>
	</button>
	<button style="padding:50px" onclick="helpClose()" id="closeHelpText">
		Luk
	</button>
	<script type="text/javascript">
		function helpOpen() {
			document.getElementById("help").style.height = "100%";
		}
		function helpClose() {
			document.getElementById("help").style.height = "0";
		}
	</script>
</div>
