"use strict";
import {$} from "./modules/nQuery.js";

let xhr = new XMLHttpRequest()

xhr.addEventListener("load", function() {

	let count = 1;
	let countFrem = function() {
		if (count === 5) {
			console.log("error");
		} else {
			count = count + 1;
			$(count).setAttribute("class", "active");
			container();
		}
	}

	$("tilbage").addEventListener("click", function() {
		if (count === 1) {
	        console.log("error");
	    } else {
	        $(count).setAttribute("class", "");
	        count = count - 1;
	        container();
	    }
	});
    var height = 300;
	function container() {
	    if (count === 1) {
	        $("container").style.left = "0";
            $("kvittering").style.height = "0";
	    } else if (count === 2) {
	        $("container").style.left = "-100%";
	        $("kvittering").style.height = height + "px";
	    } else if (count === 3) {
	        $("container").style.left = "-200%";
            $("kvittering").style.bottom = "10%";
	    } else if (count === 4) {
	        $("container").style.left = "-300%";
            $("kvittering").style.bottom = "12%";
	    } else if (count === 5) {
	        $("container").style.left = "-400%";
	        $("kvittering").style.bottom = "15%";
	    }
	}

    let obj = JSON.parse(xhr.responseText);

    // sæt json funktioner for siden ind her
    console.log("This is my JSON function ARC");

    let kabiner = $("kabiner");

    for (let i = 0; i < obj.Booths.length; i++) { 

        let list = document.createElement("LI");

        // KABINER NUMMER
        let div = document.createElement("DIV");
        let para = document.createElement("P");
        para.setAttribute("class", "number");
        if (obj.Booths[i].IsInUse === true) {
        	para.setAttribute("style", "background-color:#C85052;");
        } else {
        	para.setAttribute("style", "backround-color:##1DAB3E");
        }
        let number = obj.Booths[i].Number;
        para.innerHTML = number;
        div.appendChild(para);


        // billede af kabiner
        div.setAttribute("class", "image");
        let img = document.createElement("IMG");
        if (obj.Booths[i].IsInUse === true) {
            img.setAttribute("src", "images/optaget.png");
            div.appendChild(img);
        } else {
            img.setAttribute("src", "images/ledig.png");
            div.appendChild(img);
        }
        list.appendChild(div);


        let kabineID = `${obj.Booths[i].ID}`
        console.log(kabineID);
        

        // Tilbehør til kabiner
        let perks = document.createElement("DIV");
        perks.setAttribute("class", "perks");
        let wind = document.createElement("I");
        wind.setAttribute("class", "fas fa-wind");
        let spray = document.createElement("I");
        spray.setAttribute("class", "fas fa-spray-can");
        let music = document.createElement("I");
        music.setAttribute("class", "fas fa-music");
        let tilbehør = document.createElement("P");
        tilbehør.setAttribute("class", "perksP")
        if (obj.Booths[i].InfoText === "Ventilation") {
            tilbehør.appendChild(wind);
            perks.appendChild(tilbehør);
            list.appendChild(perks);
        } else if (obj.Booths[i].InfoText === "VentilationVand") {
            tilbehør.appendChild(wind);
            tilbehør.appendChild(spray);
            perks.appendChild(tilbehør);
            list.appendChild(perks);
        } else if (obj.Booths[i].InfoText === "VentilationVandRør") {
            tilbehør.appendChild(wind);
            tilbehør.appendChild(spray);
            tilbehør.appendChild(music);
            perks.appendChild(tilbehør);
            list.appendChild(perks);
        }

        let button = document.createElement("BUTTON");
        button.setAttribute("class", "vælgKabine");
        button.setAttribute("type", "button");
        button.setAttribute("id", kabineID);

        if (obj.Booths[i].IsInUse === true) {
            console.log(("kabine " + obj.Booths[i].Number + " is in use"));
            button.setAttribute("disabled", true);
            let buttonArrow = document.createElement("I");
            buttonArrow.setAttribute("class", "fas fa-lock");
            buttonArrow.setAttribute("style", "color:#700b01;cursor:inherit;");
            button.appendChild(buttonArrow);
        }
        list.appendChild(button);   
        

        // timer hvis kabinen er aktiv
        if (obj.Booths[i].IsInUse === true) {
        	let div2 = document.createElement("DIV");
            div2.setAttribute("class", "labelTimer");
        	let time = document.createElement("LABEL");
            time.setAttribute("style", "color:red;width:500px;");

        	let timer = obj.Booths[i].RunTime
			var timerX = setInterval(function(){ 
				timer = timer - 1; 
				let timeMin = Math.floor(timer / 60);
        		let timeSec = timer % 60;
        		if (timeSec < 10) {
        			timeSec = "0" + timeSec;
        		}
	        	time.innerHTML = timeMin + " : " + timeSec;
				div2.appendChild(time);
				if (timer === 0) {
                    para.setAttribute("style", "backround-color:##1DAB3E");
					div2.innerHTML = "";
					div2.setAttribute("style", "display:none;");
					img.setAttribute("src", "images/ledig.png");
                    button.removeAttribute("disabled");
                    button.innerHTML = "";
				}
				}, 1000);
			list.appendChild(div2);
        }
        //navnet på kabine på forsiden
        let kabineBes = document.createElement("h3");
        kabineBes.setAttribute("id", "kabineBes");
        kabineBes.setAttribute("style", "position: absolute; font-size: 3em;margin-top: -16%;");
        let kabinePri = document.createElement("P");
        kabinePri.setAttribute("id", "kabinePri");
        kabinePri.setAttribute("style", "position: absolute; margin-top: 15%; font-size: 2em;");

        kabineBes.innerHTML = `${obj.Booths[i].Description}`;
        kabinePri.innerHTML = `${obj.Booths[i].Price}` + " kr. pr./min";

        list.appendChild(kabineBes);
        list.appendChild(kabinePri);



        kabiner.appendChild(list);

        $(kabineID).addEventListener("click", function(e){
               if (kabineID == 5241){
                    const kabine1 = obj.Booths.find(kabine => kabine.ID === 5241);
                    console.log(kabine1);
                    timeSeconds(kabine1); //Tiden på kabine
                    price(kabine1); //pris på kabine
                    kabineNavn(kabine1); // navnet på kabinen
                    prepTime(kabine1); // forberedelses tid inden sol
               } if (kabineID == 5243){
                    const kabine2 = obj.Booths.find(kabine => kabine.ID === 5243);
                    console.log(kabine2);
                    timeSeconds(kabine2); //Tiden på kabine
                    price(kabine2); //pris på kabine
                    kabineNavn(kabine2); // navnet på kabinen
               } if (kabineID == 5245){
                    const kabine3 = obj.Booths.find(kabine => kabine.ID ===  5245);
                    console.log(kabine3);
                    timeSeconds(kabine3); //Tiden på kabine
                    price(kabine3); //pris på kabine
                    kabineNavn(kabine3); // navnet på kabinen
               } if (kabineID == 5247){
                    const kabine4 = obj.Booths.find(kabine => kabine.ID === 5247);
                    console.log(kabine4);
                    timeSeconds(kabine4); //Tiden på kabine
                    price(kabine4); //pris på kabine
                    kabineNavn(kabine4); // navnet på kabinen
               } if (kabineID == 3192){
                    const kabine5 = obj.Booths.find(kabine => kabine.ID === 3192);
                    console.log(kabine5);
                    timeSeconds(kabine5); //Tiden på kabine
                    price(kabine5); //pris på kabine
                    kabineNavn(kabine5); // navnet på kabinen
               } if (kabineID == 3194){
                    const kabine5 = obj.Booths.find(kabine => kabine.ID === 3194);
                    console.log(kabine5);
                    timeSeconds(kabine5); //Tiden på kabine
                    price(kabine5); //pris på kabine
                    kabineNavn(kabine5); // navnet på kabinen
               }
               countFrem();
            });

            //forberedelses tid inden solen starter
            function prepTime(kabine) {
                let prepTime = `${kabine.PrepareTime}`
                $("sunTime").innerHTML = prepTime + " Min";
            }

        	//Tiden på kabinen
            function timeSeconds(kabine){
                let runTime = `${kabine.RunTime}`; 
                let given_seconds = runTime;
                let dateObj = new Date(given_seconds * 1000); 
                let minutes = dateObj.getUTCMinutes(); 
                let seconds = dateObj.getSeconds();
                return minutes + ':' + seconds;     
            };

            function kabineNavn(kabine) {
            	let kabineNavn = `${kabine.Description}`;
            	$("kabine").innerHTML = "Du har valgt: " + kabineNavn;
            }


            function price(kabine){
                let price = `${kabine.Price}`; //finder prisen
                var value = 10;

                var slider = $("myRange"); //slider
                var outputTime = $("time"); //placere tiden
                var priceTag = $("priceTag"); //skriver siden
                var ordreTime = $("ordreTime"); //skriver tiden ned
                var total = $("total"); //skriver den samlede pris

                outputTime.innerHTML = value + " min"; //printer value ud
                slider.setAttribute("min", "1"); //min 1 min
                slider.setAttribute("value", value); //value = 10
                slider.setAttribute("max",  `${kabine.MaxRunTime}`); //max 40 min
                
                    slider.oninput = function() {
                        outputTime.innerHTML = this.value + " Min";//printer value ud
                        var totalPrice = this.value * price; //finder totalprisen
                        priceTag.innerHTML = totalPrice;
                        ordreTime.innerHTML = slider.value  + " Min";
                        total.innerHTML = totalPrice;
                    }
                priceTag.innerHTML = value * price;
                ordreTime.innerHTML = value + " Min";
                total.innerHTML = value * price;
            } //price kabiner slut

            $("confirmTime").addEventListener("click", countFrem);
            $("confirmProduct").addEventListener("click", countFrem);

    } // loop slut

    let productCounter = 0;

    for (var i = 0; i < obj.Shelves.length; i++) {

        let productID = `${obj.Shelves[i].ID}`
        console.log(productID);

        let product = document.createElement("DIV");
        product.setAttribute("class", "products");
        product.setAttribute("id", productID);

        //title of product
        let productTitle = document.createElement("H2");
        productTitle.innerHTML = obj.Shelves[i].Presentation.Name;
        product.appendChild(productTitle);

        //images of product
        let productImage = document.createElement("IMG");
        productImage.setAttribute("src", obj.Shelves[i].Presentation.PictureURL);
        product.appendChild(productImage);

        // info of product
        let productDescription = document.createElement("P");
        productDescription.innerHTML = obj.Shelves[i].Presentation.Description;
        product.appendChild(productDescription);

        //PRICE OF PRODUCT
        let productPrice = document.createElement("p");
        productPrice.innerHTML = obj.Shelves[i].Price + " kr";
        product.appendChild(productPrice);

        //append all
        $("products").appendChild(product);

        $(productID).addEventListener("click", function(e){
               if (productID == 5249) {
                    const product1 = obj.Shelves.find(product => product.ID === 5249);
                    console.log(product1);
                    $("5249").style.opacity = "0.5"; // fades out product
                    chosenProduct(); //styles the confirm button
                    productsName(product1);
                    productsPrice(product1); //Price on product
               } 
               if (productID == 5250) {
                    const product2 = obj.Shelves.find(product => product.ID === 5250);
                    console.log(product2);
                    $("5250").style.opacity = "0.5"; // fades out product
                    chosenProduct(); //styles the confirm button
                    productsName(product2);
                    productsPrice(product2); //Price on product
               } 
               if (productID == 5251) {
                    const product3 = obj.Shelves.find(product => product.ID === 5251);
                    console.log(product3);
                    $("5251").style.opacity = "0.5"; // fades out product
                    chosenProduct(); //styles the confirm button
                    productsName(product3);
                    productsPrice(product3); //Price on product
               } 
               if (productID == 5252) {
                    const product4 = obj.Shelves.find(product => product.ID === 5252);
                    console.log(product4);
                    $("5252").style.opacity = "0.5"; // fades out product
                    chosenProduct(); //styles the confirm button
                    productsName(product4);
                    productsPrice(product4); //Price on product
               } 
               if (productID == 5253) {
                    const product5 = obj.Shelves.find(product => product.ID === 5253);
                    console.log(product5);
                    $("5253").style.opacity = "0.5"; // fades out product
                    chosenProduct(); //styles the confirm button
                    productsName(product5);
                    productsPrice(product5); //Price on product
               } 
               if (productID == 5254) {
                    const product6 = obj.Shelves.find(product => product.ID === 5254);
                    console.log(product6);
                    $("5254").style.opacity = "0.5"; // fades out product
                    chosenProduct(); //styles the confirm button
                    productsName(product6);
                    productsPrice(product6); //Price on product
               } 
               if (productID == 5255) {
                    const product7 = obj.Shelves.find(product => product.ID === 5255);
                    console.log(product7);
                    $("5255").style.opacity = "0.5"; // fades out product
                    chosenProduct(); //styles the confirm button
                    productsName(product7);
                    productsPrice(product7); //Price on product
               } 
               if (productID == 5256) {
                    const product8 = obj.Shelves.find(product => product.ID === 5256);
                    console.log(product8);
                    $("5256").style.opacity = "0.5"; // fades out product
                    chosenProduct(); //styles the confirm button
                    productsName(product8);
                    productsPrice(product8); //Price on product
               }
               if (productID == 5257) {
                    const product9 = obj.Shelves.find(product => product.ID === 5257);
                    console.log(product9);
                    $("5257").style.opacity = "0.5"; // fades out product
                    chosenProduct(); //styles the confirm button
                    productsName(product9);
                    productsPrice(product9); //Price on product
               } 
               if (productID == 5258) {
                    const product10 = obj.Shelves.find(product => product.ID === 5258);
                    console.log(product10);
                    $("5258").style.opacity = "0.5"; // fades out product
                    chosenProduct(); //styles the confirm button
                    productsName(product10);
                    productsPrice(product10); //Price on product
               }
            });
        function chosenProduct() {
            $("confirmProduct").innerHTML = "Bekræft";
            $("confirmProduct").setAttribute("style", "border:5px solid #022B44;")
        }

        function productsName(product) {
            if (productCounter  === 10) {
                alert("Du kan ikke købe flere produkter");
            } else {
                productCounter++;
                console.log(productCounter);
                let produktName = `${product.Presentation.Name}`;
                let bp = document.createElement("DIV");
                bp.setAttribute("class", "produktListeNavn");
                bp.setAttribute("id", "PLN="+`${product.ID}`);

               bp.innerHTML = "&#10006 " + produktName;
                $("produktKøbt").appendChild(bp);

                increase();
                console.log(productCounter);



            }
        }

        
    
        

        function productsPrice(product) {
            if (productCounter === 10) {
                console.log("Du kan ikke købe flere produkter");
            } else {
                productCounter++;
                let produktPris = `${product.Price}`;
                let bp = document.createElement("DIV");
                bp.setAttribute("class", "produktListe");
                bp.setAttribute("id", "PL="+`${product.ID}`);

                bp.innerHTML = produktPris + " kr";
                $("produktKøbt").appendChild(bp)

                var totalPris = $("total").innerHTML;
                let sum = Number(totalPris) + Number(produktPris);
                $("total").innerHTML = sum;

                increase();
                console.log(productCounter);


                //Slet produktet
                $("PLN="+`${product.ID}`).addEventListener("click", function(e){
                    this.style.backgroundColor = "red";
                    var slet = $("PLN="+`${product.ID}`);
                    var slet2 = $("PL="+`${product.ID}`);
                    $("produktKøbt").removeChild(slet);
                    $("produktKøbt").removeChild(slet2);
                    //slet prisen
                    var totalSum = sum - `${product.Price}`;
                    $("total").innerHTML = totalSum;
                    productCounter--;

                });

            }
        }
        console.log(productCounter);


        (function() {
            function scrollHorizontally(e) {
                e = window.event || e;
                var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
                $('products').scrollLeft -= (delta*40); // Multiplied by 40
                e.preventDefault();
            }
            if ($('products').addEventListener) {
                // IE9, Chrome, Safari, Opera
                $('products').addEventListener("mousewheel", scrollHorizontally, false);
                // Firefox
                $('products').addEventListener("DOMMouseScroll", scrollHorizontally, false);
            } else {
                // IE 6/7/8
                $('products').attachEvent("onmousewheel", scrollHorizontally);
            }
        })();

    } // loop slut

    $("kort").addEventListener("click", function() {
        showPayment();
        $("kortBox").style.opacity = "1";
        $("kortBox").style.left = "5%";
        $("kortBox").style.width = "90%";
    });
    $("kontant").addEventListener("click", function() {
        showPayment();
        $("kontantBox").style.opacity = "1";
        $("kontantBox").style.left = "5%";
        $("kontantBox").style.width = "90%";
    });
    $("mobilepay").addEventListener("click", function() {
        showPayment();
        $("mobilepayBox").style.opacity = "1";
        $("mobilepayBox").style.left = "5%";
        $("mobilepayBox").style.width = "90%";
    });
    $("sms").addEventListener("click", function() {
        showPayment();
        $("smsBox").style.opacity = "1";
        $("smsBox").style.left = "5%";
        $("smsBox").style.width = "90%";
    });
    $("solkort").addEventListener("click", function() {
        showPayment();
        $("solkortBox").style.opacity = "1";
        $("solkortBox").style.left = "5%";
        $("solkortBox").style.width = "90%";
    });
    $("solkortKøb").addEventListener("click", function() {
        showPayment();
        $("købSolkortBox").style.opacity = "1";
        $("købSolkortBox").style.left = "0";
        $("købSolkortBox").style.width = "100%";
    });
     $("large").addEventListener("click", function() {
        $("købSolkortBox").style.display = "none";
        $("paymentTypes").style.left = "50%";
        $("paymentTypes").style.width = "0";
        $("solkortKøb").style.display = "none";
        $("solkort").style.display = "none";

        let large = 950;
        let sunAmount = $("total").innerHTML;

        let newTotal = document.createElement("DIV");
        newTotal.setAttribute("style", "display:flex;justify-content:space-between;width:100%;border-bottom:1px solid black;");

        let paraTotal = document.createElement("P");
        paraTotal.innerHTML = sunAmount + " kr";

        let paraTotalText = document.createElement("P")
        paraTotalText.innerHTML = "Samlet";

        newTotal.appendChild(paraTotalText);
        newTotal.appendChild(paraTotal);
        $("produktKøbt").appendChild(newTotal);

        let asd = document.createElement("DIV");
        asd.setAttribute("style", "display:flex;justify-content:space-between;width:100%;border-bottom:1px solid black;");

        let qwe = document.createElement("P");
        qwe.innerHTML = "950 kr";

        let zxc = document.createElement("P")
        zxc.innerHTML = "Solkort Guld";

        asd.appendChild(zxc);
        asd.appendChild(qwe);
        $("produktKøbt").appendChild(asd);

        let suncard = document.createElement("DIV");
        suncard.setAttribute("style", "display:flex;justify-content:space-between;width:100%;margin-bottom:-50px;");

        let paraSol = document.createElement("P");
        paraSol.innerHTML = "Resterende beløb på solkort";
        suncard.appendChild(paraSol);

        let paraLarge = document.createElement("P");

        let result = 950 - Number(sunAmount);
        console.log(result);
        $("total").innerHTML = "750";
        if (result <= -1) {
            $("total").innerHTML = Number(sunAmount) + 750;
        }


        paraLarge.innerHTML = result + " kr";
        suncard.appendChild(paraLarge);
        $("produktKøbt").appendChild(suncard);

        $("kvittering").style.height = "650px";


    });
    $("small").addEventListener("click", function() {
        $("købSolkortBox").style.display = "none";
        $("paymentTypes").style.left = "50%";
        $("paymentTypes").style.width = "0";
        $("solkortKøb").style.display = "none";
        $("solkort").style.display = "none";

        let large = 240;
        let sunAmount = $("total").innerHTML;

        let newTotal = document.createElement("DIV");
        newTotal.setAttribute("style", "display:flex;justify-content:space-between;width:100%;border-bottom:1px solid black;");

        let paraTotal = document.createElement("P");
        paraTotal.innerHTML = sunAmount + " kr";

        let paraTotalText = document.createElement("P")
        paraTotalText.innerHTML = "Samlet";

        newTotal.appendChild(paraTotalText);
        newTotal.appendChild(paraTotal);
        $("produktKøbt").appendChild(newTotal);

        let asd = document.createElement("DIV");
        asd.setAttribute("style", "display:flex;justify-content:space-between;width:100%;border-bottom:1px solid black;");

        let qwe = document.createElement("P");
        qwe.innerHTML = "240 kr";

        let zxc = document.createElement("P")
        zxc.innerHTML = "Solkort Bronze";

        asd.appendChild(zxc);
        asd.appendChild(qwe);
        $("produktKøbt").appendChild(asd);

        let suncard = document.createElement("DIV");
        suncard.setAttribute("style", "display:flex;justify-content:space-between;width:100%;margin-bottom:-50px;");

        let paraSol = document.createElement("P");
        paraSol.innerHTML = "Resterende beløb på solkort";
        suncard.appendChild(paraSol);

        let paraLarge = document.createElement("P");

        let result = 240 - Number(sunAmount);
        console.log(result);
        $("total").innerHTML = "200";
        if (result <= -1) {
            $("total").innerHTML = Number(sunAmount) + 99;
        }


        paraLarge.innerHTML = result + " kr";
        suncard.appendChild(paraLarge);
        $("produktKøbt").appendChild(suncard);

        $("kvittering").style.height = "650px";

    });
    $("medium").addEventListener("click", function() {
        $("købSolkortBox").style.display = "none";
        $("paymentTypes").style.left = "50%";
        $("paymentTypes").style.width = "0";
        $("solkortKøb").style.display = "none";
        $("solkort").style.display = "none";

        let large = 625;
        let sunAmount = $("total").innerHTML;

        let newTotal = document.createElement("DIV");
        newTotal.setAttribute("style", "display:flex;justify-content:space-between;width:100%;border-bottom:1px solid black;");

        let paraTotal = document.createElement("P");
        paraTotal.innerHTML = sunAmount + " kr";

        let paraTotalText = document.createElement("P")
        paraTotalText.innerHTML = "Samlet";

        newTotal.appendChild(paraTotalText);
        newTotal.appendChild(paraTotal);
        $("produktKøbt").appendChild(newTotal);

        let asd = document.createElement("DIV");
        asd.setAttribute("style", "display:flex;justify-content:space-between;width:100%;border-bottom:1px solid black;");

        let qwe = document.createElement("P");
        qwe.innerHTML = "625 kr";

        let zxc = document.createElement("P")
        zxc.innerHTML = "Solkort Sølv";

        asd.appendChild(zxc);
        asd.appendChild(qwe);
        $("produktKøbt").appendChild(asd);

        let suncard = document.createElement("DIV");
        suncard.setAttribute("style", "display:flex;justify-content:space-between;width:100%;margin-bottom:-50px;");

        let paraSol = document.createElement("P");
        paraSol.innerHTML = "Resterende beløb på solkort";
        suncard.appendChild(paraSol);

        let paraLarge = document.createElement("P");

        let result = 625 - Number(sunAmount);
        console.log(result);
        $("total").innerHTML = "500";
        if (result <= -1) {
            $("total").innerHTML = Number(sunAmount) + 199;
        }


        paraLarge.innerHTML = result + " kr";
        suncard.appendChild(paraLarge);
        $("produktKøbt").appendChild(suncard);

        $("kvittering").style.height = "650px";

    });
    $("confirmPayment").addEventListener("click", function() {
        $("solkortBox").style.display = "none";
        $("smsBox").style.display = "none";
        $("mobilepayBox").style.display = "none";
        $("kortBox").style.display = "none";
        $("kontantBox").style.display = "none";
        $("confirmPayment").style.display = "none";
        $("tilbage").style.display = "none";
        $("reset").style.display = "none";
        $("home").style.left = "25px";
        $("kvittering").style.fontSize = "25px";
        $("kvittering").style.height = "900px";
        $("kvittering").style.display = "flex";
        let pt = $("paymentTypes").style;
        pt.top = "50%";
        pt.left = "50%";
        pt.width = "0";
        pt.height = "0";
        countFrem();
    });

    function showPayment() {
        let pt = $("paymentTypes").style;
        pt.top = "0";
        pt.left = "0";
        pt.width = "100%";
        pt.height = "100%";
        let cap = $("cancelPayment").style;
        let cop = $("confirmPayment").style;
        cap.width = "75%";
        cop.width = "75%";
        cap.opacity = "1";
        cop.opacity = "1";
    }
    function increase() {
            height = height + 17;
            $("kvittering").style.height = height + "px";
        }


    //afslutning på json funktioner her

});
xhr.open("GET", "https://consolwebapi.pay4it.dk/api/Devices/Detail?deviceID=559");
xhr.setRequestHeader("Authorization", "Basic cmlra2Vkb21pbm9AZ21haWwuY29tOlJEc2gzbXBCdg==");
xhr.setRequestHeader("Cache-Control", "no-cache");

xhr.send();
