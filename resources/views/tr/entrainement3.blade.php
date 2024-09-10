@php
  session_start();
@endphp
<!DOCTYPE html>
<html>
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

  // étoiles
  var image_stars = new Image(); // crée un nouvel objet Image
  image_stars.src = "{{ asset('/images/etoile_magique1.png') }}"; // définit le chemin vers la source
  image_stars.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

  // GrosRocher
	var Gros_Rocher = new Image(); // crée un nouvel objet Image
	Gros_Rocher.src = "{{ asset('/images/gros_rocher.png') }}"; // définit le chemin vers la source
	Gros_Rocher.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

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
        border: 15px solid #000000;
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
    <div id="textDiv"></div>

</style>
</head>
<body onload="startGame()" style="background-color:black;">
  <form id = "bouton_consigne" action="instruction4" method="POST">
    @csrf
    <input style="visibility:hidden;" id = "bouton" type="submit"/>
  </form>
<script>
///////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ici on définit toutes les fonctions. La fonction startGame sera chargée dans le body de la page HTML
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

var Vaisseau;

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
		this.update = 0;
		this.globalName = true;
		this.canvas1.width = 1000; // taille largeur de la fenêtre du jeu
        this.canvas1.height = 600; // taille hauteur de la fenêtre du jeu
        this.context = this.canvas1.getContext("2d"); // pour pouvoir dessiner sur le Canvas, il faut qu'on récupère la feuille du papier canvas (="context")
        document.body.insertBefore(this.canvas1, document.body.childNodes[0]); // insertBefore == insère le noeud spécifié "this.canvas" juste avant un élément de référence "document.body.childNodes[0]"

		// check le temps -> si plus que 2 minutes alors on affiche écran noir avec instructions
		function time(){
		    if (game.update < 2){
		        // va appeler la fonction updatGame qui va appeler des fonctions (par ex. comete, Vaisseau) qui vont appeler une fonction draw qui va dessiner l'objet sur le Canvas
		        updateGame();
		    }
		    else {
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
    		    Start = function(){
    		        setTimeout("stop()", 1);
    		        stop = function(){
    		            $("#bouton").click();
    		        }
    		    }
    		    setTimeout("Start()", 1000);
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


        /*********** F == TIR ************/
        Controller.add(70,
            function () {
                game.keyCode1 = true;
            },
            // This argument is optional
            function () {
                game.keyCode1 = false;

        })

        /*********** C == AFFICHER ESSENCE ************/
        Controller.add(67,
            function () {
                game.keyCode2 = true;
            },
            // This argument is optional
            function () {
                game.keyCode2 = false;

        })

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
		myGamePiece_Etoiles = new Etoiles();
		myGamePiece_Affichage = new message();
		myGamePiece_GrosRocher = new GrosRocher();
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

    // fonction getStar qui est appelée lorsque le vaisseau entre en contact avec une étoile
	getStar = function(myGamePiece_Vaisseau) {
		var refresh = 0;
		myGamePiece_Vaisseau.img = image_Vaisseau5; // image remplacées par un vaisseau endommagé puis après 50 ms, la fonction change_image est appelée
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

  // OBJET message
  function message() {
    this.x = "3500";
	this.y = 50;
	this.count = 0;
	this.longueur = 150;
	this.color = "#01DF01";
	this.text = 'Yakıt göstergesini görüntülemek için klavyenizdeki "C" tuşuna basın.';
	this.tx = 30;
	this.score1 = 0;
	this.affichage_plein = 2000;
	this.keypress = false;
	this.draw = function() {
	    /***********************************************************************
		// POUR PRACTICE ON ENLEVE LA LE MESSAGE*/
		context = game.context;
		context.font = "25px Verdana";
		context.fillStyle = "#FFFFFF";
		context.fillText("Yakıt", this.x, this.y);
		context.fillStyle = this.color;
		context.fillRect(this.x,this.y + 25,this.longueur,20);
		context.font = "25px Verdana";
		context.fillStyle = "#F0FFFF";
		//rectangle blanc
		context.beginPath();
		context.lineWidth="2";
		context.strokeStyle ="#FFFFFF";
		context.rect(this.x, this.y + 25, 150, 20);
		context.stroke();
		context.fillText("You have refueled!", this.affichage_plein, 100);

		//changeLongueur(myGamePiece_Affichage);
		//changeColor(myGamePiece_Affichage);
		if ((game.keyCode2 == true) && (myGamePiece_Affichage.keypress == false)) {
		    var time_checkEssence = new Date().getTime() - myGamePiece_Time.timeStart;
			checkEssence.push(time_checkEssence);
		    //console.log(checkEssence)
			myGamePiece_Affichage.keypress = true;
			changeX(myGamePiece_Affichage);
		    setTimeout("keyRestore()", 1000);
		    keyRestore = function(){
	           myGamePiece_Affichage.keypress = false;
               if (game.update < 1){
                   game.update += 1;
                   myGamePiece_Affichage.text = 'Yakıt göstergesini görüntülemek için klavyenizdeki "C" tuşuna tekrar basın.';
                   myGamePiece_Affichage.tx = 30;
               }
               else if (game.update >= 1 ) {
            		setTimeout("update()", 1000);
    		        update = function(){
    		           game.update += 1;
    		        }
               }
	        };
		}
		// gestion des éléments temporels
		//on a stocké le temps initial dans la variable "myGamePiece_Time.time -> avec la fonction "game"
		if (new Date().getTime() > myGamePiece_Time.time + 1000){
		    temps_essence += 1;
				if (temps_essence > 60) {
    				temps_essence -= 60;
    				this.longueur = 150;
    				this.color = "#01DF01";
    				this.affichage_plein = 2000;
    				this.score2 = 2;
				}
			myGamePiece_Time.time += 1000;
			this.longueur -= 2.5;

			if (temps_essence > 30 && temps_essence < 50){
				this.color = "#FFFF00";
				}
			if (temps_essence > 50 && temps_essence < 60){
				this.color = "#FF0000";
				}
    		};

    	if ((temps_essence > 50 && temps_essence < 60) && (game.keydown && game.key == 69) && (myGamePiece_Affichage.keypress == false)){
				this.score2 = 50;
				this.affichage_plein = 15;
				// on ajoute le temps d'impact à une des variables qui sera envoyée dans le serveur à la fin du jeu
		        var timeImpact = new Date().getTime() - myGamePiece_Time.timeStart;
		        essenceRight.push(timeImpact);
		        myGamePiece_Affichage.keypress = true;
		        setTimeout("keyRestore()", 1000);
		        keyRestore = function(){
		          myGamePiece_Affichage.keypress = false;
		        };

			}

		else if ((temps_essence > 0 && temps_essence < 50) && (game.keydown && game.key == 69) && (myGamePiece_Affichage.keypress == false)){
			    // on ajoute le temps d'impact à une des variables qui sera envoyée dans le serveur à la fin du jeu
		        var timeImpact = new Date().getTime() - myGamePiece_Time.timeStart;
		        essenceWrong.push(timeImpact);
		        myGamePiece_Affichage.keypress = true;
		        setTimeout("keyRestore()", 1000);
		        keyRestore = function(){
		          myGamePiece_Affichage.keypress = false;
		         };
              }
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
        	myGamePiece_Vaisseau.speedX = -1.5;
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
        	//DETERMINE LES ENDROIT OU LE VAISSEAU NE PEUT PAS ALLER
        	if (myGamePiece_Vaisseau.x < 1) {myGamePiece_Vaisseau.x = 1; }
        	if (myGamePiece_Vaisseau.x > 800) {myGamePiece_Vaisseau.x = 800;}
        	if (myGamePiece_Vaisseau.y > 500) {myGamePiece_Vaisseau.y = 500; }
        	if (myGamePiece_Vaisseau.y < 25) {myGamePiece_Vaisseau.y = 25; }
        	//////////////////////////////////////////////////////////////
        	// Détermine s'il un missile a été tiré ou non
        	// Avantage de cette manière de faire -> comme il y a un booléen "myGamePiece_Missile.nouveau_tir" qui doit être faux et qui devient vrai dès que l'on a appuyé sur la touche
        	// -> la position du missile y prend la valeur de la position y du vaisseau quand on appuye sur la touche
        	// mais ne s'ajourne pas avec la position du vaisseau car "myGamePiece_Missile.nouveau_tir" devient vrai et du coup
        	// la position y du vaisseau n'a plus d'impact sur la position du missile
        	if (game.keyCode1 == true && myGamePiece_Missile.nouveau_tir == false) {
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

function updateGame() {
    game.clear();  // on efface toutes les touches ou autres éléments qui ont été précédemment affichées

	//////////////////////////////////////////////
	// Affichage des éléments
	//////////////////////////////////////////////

	// ASSEMBLAGE de deux fonctions
	// 1)on récupère les informations entrées dans la fonction "game" (exemple : myGamePiece_Comete1 = new comete(200, 150)
	// 2)on récupère la fonction drawcomete() de l'objet "comete"
	// 3)on remplit les inconnues avec les éléments que l'on vient de récupérer (dans la fonction "game")
	// 4)on excéute cette fonction drawcomete() -> qui dessine le comete

	myGamePiece_Missile.draw();
    myGamePiece_Affichage.draw();
    myGamePiece_Evenements.update();

    // on stocke le score de l'objet myGamePiece_Affichage dans l'object score
    this.score = myGamePiece_Affichage.score1;
	// afichage du score
	context.font= "25px Verdana";
	context.fillStyle = "#FFFFFF";
	context.fillText(myGamePiece_Affichage.text, myGamePiece_Affichage.tx, 250);

	//myGamePiece_Vaisseau.newPos(); // met à jour les éléments de this.newPos qui sont dans la fonction "Vaisseau" via "myGamePiece_Vaisseau"
    myGamePiece_Vaisseau.update(); // met à jour les éléments de this.update qui sont dans la fonction "Vaisseau" via "myGamePiece_Vaisseau"
	}
</script>
</body>
</html>
