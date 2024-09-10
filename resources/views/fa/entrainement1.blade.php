@php
  session_start();
@endphp

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Geneva Space Cruiser</title>
<link rel="icon" href="{{ url('css/lives.png') }}">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
<script type="text/javascript">
    marginLeft = ( (window.screen.availWidth - 1200)/5 ) / window.screen.availWidth - 1200 </script>

<script>
    // Vaisseau1
	var image_Vaisseau1 = new Image(); // crée un nouvel objet Image
    image_Vaisseau1.src = "{{ asset('/images/vaisseau_base.png') }}"; // définit le chemin vers la source
    image_Vaisseau1.onload = function(){} // instructions appeblant drawImage ici -> permet d'éviter les bugs
    // Vaisseau2
	var image_Vaisseau2 = new Image(); // crée un nouvel objet Image
	image_Vaisseau2.src = "{{ asset('/images/vaisseau_flame1.png') }}"; // définit le chemin vers la source
	image_Vaisseau2.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

	// Vaisseau3
	var image_Vaisseau3 = new Image(); // crée un nouvel objet Image
	image_Vaisseau3.src = "{{ asset('/images/vaisseau_flame2.png') }}"; // définit le chemin vers la source
	image_Vaisseau3.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

	// Vaisseau4
	var image_Vaisseau4 = new Image(); // crée un nouvel objet Image
	image_Vaisseau4.src = "{{ asset('/images/vaisseau_flame3.png') }}"; // définit lce chemin vers la source
	image_Vaisseau4.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

	// Vaisseau5
	var image_Vaisseau5 = new Image(); // crée un nouvel objet Image
	image_Vaisseau5.src = "{{ asset('/images/vaisseau_scores.png') }}"; // définit le chemin vers la source
	image_Vaisseau5.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

	// Missile
	var missile = new Image(); // crée un nouvel objet Image
	missile.src = "{{ asset('/images/missile.png') }}"; // définit le chemin vers la source
	missile.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

	// Missile
	var missile2 = new Image(); // crée un nouvel objet Image
	missile2.src = "{{ asset('/images/missile_explosion.png') }}"; // définit le chemin vers la source
	missile2.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

</script>

<style>
    canvas {
        padding: 0;
        margin: auto;
        display: block;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
      	background-image:url("{{ asset('/images/galaxie.jpg') }}");
      	background-size: cover;
    }
	body {
		direction: rtl !important;
		}    
	<div id="textDiv"></div>

</style>
</head>
<body onload="startGame()" style="background-color:black;">
    <form id = "bouton_consigne" action="entrainement2" method="POST">
      @csrf
	    <input style="visibility:hidden;" id = "bouton" type="submit"/>
    </form>
<script>
///////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ici on définit toutes les fonctions. La fonction startGame sera chargée dans le body de la page HTML
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

var Vaisseau;
var previousText = true;

function startGame() {  // crée une fonction qui fait débuter le jeu et on insère les fonctions que l'on a créées ci-dessous
    n_tpsq = new Date().getTime();
    game.start(); // appelle la fonction "game" -> n.b. start peut également être défini "Object.start = number " si on veut que le jeux commence
	// quand clique sur un boutton par exemple
}


var game = {
    canvas1 : document.createElement("canvas"), // on crée un élément canvas -> rectangle qui est relié à l'objet canvas dans le code HTML
    start : function() { // fonction start
		x_time = new Date().getTime();
		this.redirect = false;
		this.checkUpdate = false;
		this.globalName = true;
		this.canvas1.width = 1000; // taille largeur de la fenêtre du jeu
        this.canvas1.height = 600; // taille hauteur de la fenêtre du jeu
        this.context = this.canvas1.getContext("2d"); // pour pouvoir dessiner sur le Canvas, il faut qu'on récupère la feuille du papier canvas (="context")
        document.body.insertBefore(this.canvas1, document.body.childNodes[0]); // insertBefore == insère le noeud spécifié "this.canvas" juste avant un élément de référence "document.body.childNodes[0]"
		// check le temps -> si plus que 2 minutes alors on affiche écran noir avec instructions
		function time(){
		    if (game.checkUpdate == false){
		        // va appeler la fonction updatGame qui va appeler des fonctions (par ex. comete, Vaisseau) qui vont appeler une fonction draw qui va dessiner l'objet sur le Canvas
		        updateGame();
		    }
		    else {
		        context = game.context;
    		    context.fillStyle="#000000";
            context.fillRect(0,0,2000,2000);
    		    context.font = "25px Verdana";
    		    context.fillStyle = "#FFFFFF";
				var txt = 'عالی ! اکنون شما میتوانید با فشار دادن کلید "F" شلیک موشکها را تمرین کنید.';
    		    context.fillText(txt, 850, 300);
    		    game.redirect = true;
		    }
		}

		// Read cookie
        function readCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0) === ' ') {
                    c = c.substring(1,c.length);
                }
                if (c.indexOf(nameEQ) === 0) {
                    return c.substring(nameEQ.length,c.length);
                }
            }
            return null;
        }

		// check if time is passed and redirect to another page
		function checkTime(){
    		if(game.redirect == false) {
    		    time();
     		}
    		else {
    		    clearInterval(game.Interval);
    		    Start = function(){setTimeout("stop()", 3000);
    		        stop = function(){
    		            $("#bouton").click();
    		        }
    		    }
    		    setTimeout("Start()", 2000);
    		    clearInterval(game.interval);
    		};
		}

	    this.interval = setInterval(checkTime, 1); // intervalle à laquelle la fonction updateGame va être appelée (sorte de taux de refraichissement) -> à partir d'ici que les images sont affichées
	    Controller = {
            keyIsDown: [],

            // Add a new control. up is optional.
            // It avoids key repetitions
            add: function (key, down, up) {
                $(document).keydown(function(e) {
                    if(e.keyCode === key && !Controller.keyIsDown[key]) {
                            down()
                        Controller.keyIsDown[key] = true
                        return false
                    }
                })

                $(document).keyup(function(e) {
                    if(e.keyCode === key) {
                        if(up) up()
                        Controller.keyIsDown[key] = false
                        return false
                    }
                })
            },
        }

        /*********** LEFT ************/
        Controller.add(37,
            function () {
                game.keyCode5 = true;
            },
            // This argument is optional
            function () {
                game.keyCode5 = false;

        })
        /*********** UP ************/
         Controller.add(38,
            function () {
                game.keyCode6 = true;
            },
            // This argument is optional
            function () {
                game.keyCode6 = false;

        })
        /*********** RIGHT ************/
         Controller.add(39,
            function () {
                game.keyCode7 = true;

            },
            // This argument is optional
            function () {
                game.keyCode7 = false;
        })
        /*********** DOWN ************/
        Controller.add(40,
            function () {
                game.keyCode8 = true;

            },
            // This argument is optional
            function () {
                game.keyCode8 = false;

        })

		// création d'objets personnalisés: permet de stocker les infos entrée ci-dessous dans les éléments de gauche -> voir à quoi ça sert dans la fonction updateGame
     	var n_tps = new Date().getTime();
		myGamePiece_Time = new temps(n_tps);
		myGamePiece_Vaisseau = new Vaisseau(20,600);
		myGamePiece_Affichage = new message();
		myGamePiece_Missile = new Missile();
		myGamePiece_Evenements = new Evenement();
	},

	clear : function(){
        this.context.clearRect(0, 0, this.canvas1.width, this.canvas1.height);
    // fonction clear qui efface les éléments à la surface du jeu -> cette fonction sera appelée dans la fonction updateGame qui est
	//elle-même appelée dans cette fonction ici présente -> ce renvoi permet de update le jeux régulièrement

    }
}

	/////////////////////////////////
	// définitions des paramètres
	////////////////////////////////

	// Returns a random integer between min (included) and max (included)
	function getRandomInt(min, max) {
	return Math.floor(Math.random() * (max - min + 1)) + min;
	}

	//////////////////////
	//Paramètres x et y
	///////////////////////

	// On crée les paramètres pour l'affichage des ETOILES pour les positions de x et y
	var starsX = [];
	for (var i = 0; i < 10; i++){
	starsX.push((getRandomInt(1500, 10000)));}

	var starsY = [];
	for (var i = 0; i < 10; i++){
	starsY.push(getRandomInt(25, 570));} // Math.random -> retourne un nombre aléatoire entre 0 et 1

	// On crée les paramètres pour l'affichage des Gros Rochers pour les positions de x et y
	var RockX = [];
	for (var i = 0; i <= 4; i++){
	RockX.push((getRandomInt(1700, 5000)));}

	var RockY = [];
	for (var i = 0; i <= 4; i++){
	RockY.push((getRandomInt(50, 570)));}

	// variable contenant les fois ou les comètes et rochers ont touché le vaisseau
	impact = [];
	star = [];
	essenceRight = [];
	essenceWrong = [];
	checkEssence = [];

// initialisation des variables

	var score = 0;
	var star_x = 0;
	var star_y = 0;
	var temps_essence = 0;

/////////////////////////////////////////////////////
// Fonctions qui gèrent les crash
/////////////////////////////////////////////////////
	// fonction crash qui est appelée lorsque le vaisseau entre en contact avec une comète
	crash = function(myGamePiece_Vaisseau) {
		var refresh = 0;
		myGamePiece_Vaisseau.img = collision; // image remplacées par un vaisseau endommagé puis après 50 ms, la fonction change_image est appelée
		setTimeout("change_image(myGamePiece_Vaisseau)",150);}

	// cette fonction a pour but de remplacer l'image du vaisseau endommagé par un vaisseau neuf
	change_image = function(myGamePiece_Vaisseau){
		myGamePiece_Vaisseau.img = image_Vaisseau1;
	}


//////////////////////////////////////////////////////
// Fonction qui gère l'accélération
//////////////////////////////////////////////////////

	acceleration = function(myGamePiece_Vaisseau){

			myGamePiece_Vaisseau.img = image_Vaisseau3;
			}



	accelerationNulle= function(myGamePiece_Vaisseau){

			myGamePiece_Vaisseau.img = image_Vaisseau1;
	        }

///////////////////////////////////////////////////
// Fonctions qui gèrent l'affichage du message
///////////////////////////////////////////////////
	changeX = function(myGamePiece_Affichage){
		myGamePiece_Affichage.x = 800;
		setTimeout("restoreX(myGamePiece_Affichage)", 2000);
	}
		restoreX = function(myGamePiece_Affichage){
		myGamePiece_Affichage.x = 2000;
	}

//////////////////////////////////////////////////////
// Fonction qui détermine s'il y a un impact avec comète ou rocher ou non
//////////////////////////////////////////////////////
	checkimpact = function(myGamePiece_Vaisseau){
		myGamePiece_Vaisseau.impact = true;
		setTimeout("change_impact(myGamePiece_Vaisseau)",150);};
	change_impact = function(myGamePiece_Vaisseau){
		myGamePiece_Vaisseau.impact = false;}

//////////////////////////////////////////////////////
// Fonction qui détermine s'il y a un impact avec étoile ou non
//////////////////////////////////////////////////////
	checkimpact2 = function(myGamePiece_Vaisseau){
		myGamePiece_Vaisseau.impact2 = true;
		setTimeout("change_impact2(myGamePiece_Vaisseau)",150);};
	change_impact2 = function(myGamePiece_Vaisseau){
		myGamePiece_Vaisseau.impact2 = false;}

///////////////////////////////////////////////////////////////////////////////
// Fonction qui détermine s'il y a la possibilité de tirer un nouveau missile
///////////////////////////////////////////////////////////////////////////////
	nouveau_missile = function(myGamePiece_Missile){
		myGamePiece_Missile.nouveau_tir = true;
		setTimeout("reset_missile(myGamePiece_Missile)",1000);};
	reset_missile = function(myGamePiece_Missile){
		myGamePiece_Missile.nouveau_tir = false;}

///////////////////////////////////////////////////////////////////////////////
// Fonction qui détermine ce qu'il se passe quand missile percute un rocher
///////////////////////////////////////////////////////////////////////////////
    // fonction qui a pour but de faire gagner du temps
	RocherExplosion = function(myGamePiece_GrosRocher, myGamePiece_Missile){
		setTimeout("RocherExplosion2(myGamePiece_GrosRocher, myGamePiece_Missile)",20);
		};

	RocherExplosion2 = function(myGamePiece_GrosRocher, myGamePiece_Missile){
		myGamePiece_Missile.img = missile2;
		setTimeout("RocherExplosion3(myGamePiece_GrosRocher, myGamePiece_Missile)",20);
		myGamePiece_Missile.sizeMx = 175;
		myGamePiece_Missile.sizeMy = 150;
		};

	RocherExplosion3 = function(myGamePiece_GrosRocher, myGamePiece_Missile){
		myGamePiece_Missile.img = missile2;
		setTimeout("RocherExplosion4(myGamePiece_GrosRocher, myGamePiece_Missile)",20);
		myGamePiece_Missile.sizeMx = 200;
		myGamePiece_Missile.sizeMy = 175;
		};

	RocherExplosion4 = function(myGamePiece_GrosRocher, myGamePiece_Missile){
		myGamePiece_Missile.img = missile2;
		setTimeout("RocherExplosion5(myGamePiece_GrosRocher, myGamePiece_Missile)",20);
		myGamePiece_Missile.sizeMx = 225;
		myGamePiece_Missile.sizeMy = 200;
		};


	RocherExplosion5 = function(myGamePiece_GrosRocher, myGamePiece_Missile){
		myGamePiece_Missile.img = missile2;
		myGamePiece_Missile.sizeMx = 250;
		myGamePiece_Missile.sizeMy = 225;
		setTimeout("RocherExplosion6(myGamePiece_GrosRocher, myGamePiece_Missile)",20);
		};


	RocherExplosion6 = function(myGamePiece_GrosRocher, myGamePiece_Missile){
		myGamePiece_Missile.img = missile2;
		myGamePiece_Missile.sizeMx = 275;
		myGamePiece_Missile.sizeMy = 250;
		setTimeout("RocherExplosion7(myGamePiece_GrosRocher, myGamePiece_Missile)",20);
		};


	RocherExplosion7 = function(myGamePiece_GrosRocher, myGamePiece_Missile){
		myGamePiece_Missile.x = 2000;
		myGamePiece_Missile.speed = 10;
		myGamePiece_Missile.sizeMx = 75;
		myGamePiece_Missile.sizeMy = 50;
		myGamePiece_Missile.img = missile;
		};


/////////////
// Objets
////////////
function temps(time) {
// Time pour la gestion de l'affichage de l'essence et des impacts avec le vaisseau
this.time = time;
var timeStart = new Date().getTime();
this.timeStart = timeStart;
}

    // OBJET Missile
	function Missile () {
	this.x = 2500; // position de base du missile en dehors de l'écran
	this.y = 0;
	this.sizeMx = 75;
	this.sizeMy = 50;
	this.img = missile;
	this.check = false;
	this.tir = false;
	this.nouveau_tir = false;
	this.Speed = 0;
	this.draw = function() {
        context = game.context;
        context.drawImage(this.img, this.x, myGamePiece_Missile.y, this.sizeMx, this.sizeMy);
			this.x += this.Speed;
		}
	}

	// OBJET Vaisseau
	function Vaisseau(x, y) {
    //this.gamearea = game;
    this.speedX = 0;
    this.speedY = 0;
    this.x = x;
    this.y = y;
	this.i = 0;
	this.impact = false;
	this.impact2 = false;
	this.img = image_Vaisseau1;
	this.keyjump = 0;
	this.jump = 0;
    this.update = function() {
        context = game.context; // va dans game et cherche this.context
        context.drawImage(this.img, this.x, this.y, 150, 75); // on va dessiner l'image du Vaisseau
        this.x += this.speedX
		this.y += this.speedY}
   }

   function wrapText(context, text, x, y, maxWidth, lineHeight) {
    var words = text.split(' ');
    var line = '';
    var testLine = '';
    var testWidth = 0;
    
    for (var i = 0; i < words.length; i++) {
        testLine = line + words[i] + ' ';
        testWidth = context.measureText(testLine).width;
        if (testWidth > maxWidth && i > 0) {
            context.fillText(line, x, y);
            line = words[i] + ' ';
            y += lineHeight;
        } else {
            line = testLine;
        }
    }
    context.fillText(line, x, y);
	}

	function message() {
		this.text1 = "{{ __('game.text1') }}";
		this.text2 = "{{ __('game.text2') }}";		
		this.text3 = "{{ __('game.text3') }}";
		this.text4 = "{{ __('game.text4') }}";		
		this.textCheck1 = false;
		this.textCheck2 = false;
		this.textCheck3 = false;
		this.textCheck4 = false;
		this.textCheck5 = false;
		this.text = this.text1;
		this.draw = function() {
			var context = game.context;
			var maxWidth = 950;
			var lineHeight = 55;
			var x = 950;
			var y = 250;
			wrapText(context, this.text, x, y, maxWidth, lineHeight);
		}
	}

    // OBJET GrosRocher
	function GrosRocher(){
	this.img = Gros_Rocher;
	this.draw = function draw (){
			context = game.context; // va dans game et cherche this.context
			for (var j = 0; j < 4 ; j++){
				this.x = RockX[j];
				this.y = RockY[j];
				context.drawImage(this.img, this.x, this.y, 150, 75); // on va dessiner l'image
				RockX[j] -= 1;

			// faire réapparaitre rocher si sort de l'écran
			if (RockX[j] < -200){
				RockX[j] = (getRandomInt(2000, 3000));}

			// Check impact vaisseau
			if ((myGamePiece_Vaisseau.x > (RockX[j] - 100)) && (myGamePiece_Vaisseau.x < (RockX[j] + 100)) && (myGamePiece_Vaisseau.y > (RockY[j] - 75)) && (myGamePiece_Vaisseau.y < (RockY[j] + 75))) {
				// on ajoute le temps d'impact à une des variables qui sera envoyée dans le serveur à la fin du jeu
				var timeTemp = new Date();
		        var timeImpact = timeTemp.getTime() - myGamePiece_Time.timeStart;
		        impact.push(timeImpact);
				RockX[j] = (getRandomInt(1600, 2500));
				RockY[j] = (getRandomInt(25, 570));
				if (myGamePiece_Affichage.score1 > 0 && myGamePiece_Affichage.score1 <=10){
				    myGamePiece_Affichage.score1 = 0;
				}
				    else if (myGamePiece_Affichage.score1 > 10){
				         myGamePiece_Affichage.score1 -= 10;
				    }
				crash(myGamePiece_Vaisseau);
				checkimpact(myGamePiece_Vaisseau);
					}

			// check impact missile
			if ((myGamePiece_Missile.x > 0) && (myGamePiece_Missile.x < 1500) && (myGamePiece_Missile.x > (RockX[j] - 1)) && (myGamePiece_Missile.x < (RockX[j] + 40)) && (myGamePiece_Missile.y > (RockY[j] - 40)) && (myGamePiece_Missile.y < (RockY[j] + 40))) {
				// remplace les images par missile et rocher qui ont explosés
    			if (myGamePiece_Affichage.score1 >= 0){
    				    myGamePiece_Affichage.score1 += 10;
    			}
				myGamePiece_Missile.x = RockX[j]+50;
				myGamePiece_Missile.Speed -= 10;
				myGamePiece_Missile.img = missile2;
				myGamePiece_Missile.sizeMx = 150;
				myGamePiece_Missile.sizeMy = 125;
				myGamePiece_Missile.y = RockY[j]-50;
				// fonction qui reset les images du rocher et du missile
				RocherExplosion(myGamePiece_GrosRocher, myGamePiece_Missile)
				// fait disparaitre le rocher et le missile
				RockX[j] = (getRandomInt(2000, 3000));
				RockY[j] = (getRandomInt(25, 570));
				}

			// Check si trop proche d'un autre rocher
			for (var x = 0; x < 10 ; x++) {
    			if ( ( (RockX[j]) > (RockX[x] - 300) ) &&
    			     ( (RockX[j]) < (RockX[x] + 300) ) &&
    			     ( (RockY[j]) > (RockY[x] - 300) ) &&
    			     ( (RockY[j]) < (RockY[x] + 300) ) &&
    			     (x != j) )
    			    {
    				RockX[j] = (getRandomInt(2000, 3000))
    				RockY[j] = (getRandomInt(25, 570))

    			    }
    		    }
			}
		}
	}

   // OBJET Etoiles
	function Etoiles() {
		this.gamearea = game;
		this.img = image_stars;
		this.draw = function () {
			context = game.context;
			for (var j = 0; j < 10 ; j++){
					this.x = starsX[j];
					this.y = starsY[j];
					context.drawImage(this.img, this.x, this.y, 50, 50);
					starsX[j] -= 2;
				if (starsX[j]  < -50){
					starsX[j]  = (getRandomInt(1600, 2500))
					starsY[j] = (getRandomInt(25, 570))
			}
			// Check si contact avec le vaisseau
			if ((myGamePiece_Vaisseau.x > (starsX[j] - 100)) && (myGamePiece_Vaisseau.x < (starsX[j] + 25)) && (myGamePiece_Vaisseau.y > (starsY[j] - 90)) && (myGamePiece_Vaisseau.y < (starsY[j] + 50))) {
				// on ajoute le temps d'impact à une des variables qui sera envoyée dans le serveur à la fin du jeu
		        var timeImpact = new Date().getTime() - myGamePiece_Time.timeStart;
		        star.push(timeImpact);
				getStar(myGamePiece_Vaisseau);
				checkimpact2(myGamePiece_Vaisseau);
				starsX[j] = (getRandomInt(1600, 2500));
				starsY[j] = (getRandomInt(25, 570));
				if (myGamePiece_Affichage.score1 >= 0){
    				    myGamePiece_Affichage.score1 += 1;
    				    }}

			// Check si trop proche d'une autre étoile
			for (var x = 0; x < 10 ; x++) {
    			if ( ( (starsX[j]) > (starsX[x] - 200) ) &&
    			     ( (starsX[j]) < (starsX[x] + 200) ) &&
    			     ( (starsY[j]) > (starsY[x] - 200) ) &&
    			     ( (starsY[j]) < (starsY[x] + 200) ) &&
    			     (x != j) )
    			{
    				starsX[j] = (getRandomInt(1600, 2500))
    				starsY[j] = (getRandomInt(25, 570))
    				}
			    }
			}
		}
	}

	// OBJET Evenement
	function Evenement() {
	    this.update = function(){
	         // GESTION DU CLAVIER ET DES MOVEMENTS DE L'AVION
        	myGamePiece_Vaisseau.speedX = 0;
	        myGamePiece_Vaisseau.speedY = 0;
	        myGamePiece_Vaisseau.Speed = 0;
        	if (game.keyCode5 == true && game.keyCode6 == true) {myGamePiece_Vaisseau.speedX = -3; myGamePiece_Vaisseau.speedY = -3;}
        	else if (game.keyCode5 == true && game.keyCode8 == true) {myGamePiece_Vaisseau.speedX = -3; myGamePiece_Vaisseau.speedY = 3;}
        	else if (game.keyCode7 == true && game.keyCode6 == true) {myGamePiece_Vaisseau.speedX = 3; myGamePiece_Vaisseau.speedY = -3;}
            else if (game.keyCode7 == true && game.keyCode8 == true) {myGamePiece_Vaisseau.speedX = 3; myGamePiece_Vaisseau.speedY = 3;}
            else if (game.keyCode5 == true) {myGamePiece_Vaisseau.speedX = -3;}
            else if (game.keyCode6 == true) {myGamePiece_Vaisseau.speedY = -3;}
            else if (game.keyCode7 == true) {myGamePiece_Vaisseau.speedX = 3;}
            else if (game.keyCode8 == true) {myGamePiece_Vaisseau.speedY = 3;}
        	//ACCELERATION
        	if(game.keyCode7 == true && myGamePiece_Vaisseau.impact == false && myGamePiece_Vaisseau.impact2 == false){acceleration(myGamePiece_Vaisseau);}
        	else if (game.keyCode7 == true && myGamePiece_Vaisseau.impact == true) {crash(myGamePiece_Vaisseau);}
        	else if (game.keyCode7 == true && myGamePiece_Vaisseau.impact2 == true) {getStar(myGamePiece_Vaisseau);}
        	else if (game.keyCode7 == false && myGamePiece_Vaisseau.impact == false && myGamePiece_Vaisseau.impact2 == false){accelerationNulle(myGamePiece_Vaisseau);}
        	/******************************************************************/
        	//DETERMINE LES ENDROIT OU LE VAISSEAU NE PEUT PAS ALLER
        	/******************************************************************/
        	if (myGamePiece_Vaisseau.x < 1) {
        	    myGamePiece_Vaisseau.x = 1;
        	    if (myGamePiece_Affichage.textCheck2 == true){
        	        myGamePiece_Affichage.text = myGamePiece_Affichage.text3;
        	        myGamePiece_Affichage.textCheck3 = true;
        	    }
        	}

        	if (myGamePiece_Vaisseau.x > 800) {
        	    myGamePiece_Vaisseau.x = 800;
        	    myGamePiece_Affichage.text = myGamePiece_Affichage.text2;
        	    myGamePiece_Affichage.textCheck2 = true;
        	}

        	if (myGamePiece_Vaisseau.y > 500) {
        	    myGamePiece_Vaisseau.y = 500;
        	    if (myGamePiece_Affichage.textCheck4 == true){
        	        myGamePiece_Affichage.text = myGamePiece_Affichage.text1;
        	    }
        	    if (myGamePiece_Affichage.textCheck5 == true){
                game.checkUpdate = true;
        	    }
        	}

        	if (myGamePiece_Vaisseau.y < 25) {
        	    myGamePiece_Vaisseau.y = 25;
        	    myGamePiece_Affichage.textCheck2 = false;
        	    if (myGamePiece_Affichage.textCheck3 == true){
        	        myGamePiece_Affichage.text = myGamePiece_Affichage.text4;
        	        myGamePiece_Affichage.textCheck5 = true;
        	    }
        	}

        	if (game.key && game.key == 70 && myGamePiece_Missile.nouveau_tir == false) {
        		myGamePiece_Missile.x = myGamePiece_Vaisseau.x + 50;
        		myGamePiece_Missile.y = myGamePiece_Vaisseau.y;
        		myGamePiece_Missile.Speed = 10;
        		nouveau_missile(myGamePiece_Missile);
	        }
	    }
	}

/////////////////////////////////////////////////////
// mise à jour du jeu
/////////////////////////////////////////////////////

// Use the new draw function
function updateGame() {
    game.clear();  // on efface toutes les touches ou autres éléments qui ont été précédemment affichées

    // Affichage des éléments
    myGamePiece_Missile.draw();
    myGamePiece_Affichage.draw();
    myGamePiece_Evenements.update();

    // Affichage du score
    context.font= "25px Verdana";
    context.fillStyle = "#FFFFFF";

    myGamePiece_Vaisseau.update(); // met à jour les éléments de this.update qui sont dans la fonction "Vaisseau" via "myGamePiece_Vaisseau"
}
</script>
