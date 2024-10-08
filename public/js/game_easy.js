document.body.addEventListener('keydown', event => {
    if (event.ctrlKey && 'dfcvxspwuaz'.indexOf(event.key) !== -1) {
    event.preventDefault()
    }
})

const flowers_points = 30; // default
const flowers2_points = 30; // default
const collide_rock = 30; // default
const fire_rock_success = 30; // default
const fill_fuel = 300; // default
const speed_g = 1; // default (min should be 1 and max 4 incrementing with 0.5)
const time_to_refuel = 60000; // default (min 10 seconds and max 60)
const task_length = 310000;

var Vaisseau;

function startGame() {
    n_tpsq = new Date().getTime();
    game.start()
}
var game = {
    canvas1: document.createElement("canvas"),
    start: function() {
        x_time = new Date().getTime();
        this.redirect = false;
        this.globalName = true;
        this.canvas1.width = 1400;
        this.canvas1.height = 800;
        this.context = this.canvas1.getContext("2d");
        document.body.insertBefore(this.canvas1, document.body.childNodes[0]);

        function d() {
            if (new Date().getTime() < +x_time + task_length) {
                updateGame()
            } else {
                context = game.context;
                context.fillStyle = "#000000";
                context.fillRect(0, 0, 2000, 2000);
                context.font = "25px Verdana";
                context.fillStyle = "#FFFFFF";

                var canvasWidth = 1250;
                var canvasHeight = 850;
                var text = 'La tâche de concentration est terminée';
                var textWidth = context.measureText(text).width;
                var xPosition = (canvasWidth - textWidth) / 2;
                var yPosition = (canvasHeight / 2) + 12.5; // Adding half of the font size to vertically center

                context.fillText(text, xPosition, yPosition);
                game.redirect = true;
            }
        }

        function c(f) {
            var h = f + "=";
            var e = document.cookie.split(";");
            for (var g = 0; g < e.length; g++) {
                var j = e[g];
                while (j.charAt(0) === " ") {
                    j = j.substring(1, j.length)
                }
                if (j.indexOf(h) === 0) {
                    return j.substring(h.length, j.length)
                }
            }
            return null
        }

        function a() {
            if (game.redirect == false) {
                d()
            } else {
                clearInterval(game.Interval);
                Start = function() {
                    cnameFlower = "flower_task";
                    cnameFlower2 = "flower2_task";
                    cname_missedFlower = "missedFlower_task";
                    cname_missedFlower2 = "missedFlower2_task";   
                    cname_drawing = "draw_task";    
                    expires = "Thu, 30 Dec 2030 12:00:00 UTC";
                    document.cookie = cnameFlower + "= ;" + expires;
                    document.cookie = cnameFlower2 + "= ;" + expires;
                    document.cookie = cname_missedFlower + "= ;" + expires;
                    document.cookie = cname_missedFlower2 + "= ;" + expires;
                    document.cookie = cname_drawing + "= ;" + expires;                    
                    
                    document.cookie = cnameFlower + "=" + flower + ";" + expires;
                    document.cookie = cnameFlower2 + "=" + flower2 + ";" + expires;
                    document.cookie = cname_missedFlower + "=" + missed_flower + ";" + expires;
                    document.cookie = cname_missedFlower2 + "=" + missed_flower2 + ";" + expires;
                    document.cookie = cname_drawing + "=" + drawing + ";" + expires;

                    var f = c("flower_task");
                    var e = c("flower2_task");
                    var n = c("missedFlower_task");
                    var m = c("missedFlower2_task");
                    var k = c("drawing");
           
                    console.log("flower=" + f);
                    console.log("flower2=" + e);
                    console.log("missedFlower=" + n);
                    console.log("missedFlower2=" + m);
                    
                    setTimeout("stop()", 5000);

                    stop = function() {
                        $("#bouton").click()
                    }
                };
                setTimeout("Start()", 1000);
                clearInterval(game.interval)
            }
        }
        this.interval = setInterval(a, 1);
        Controller = {
            keyIsDown: [],
            add: function(f, g, e) {
                $(document).keydown(function(h) {
                    if (h.keyCode === f && !Controller.keyIsDown[f]) {
                        g();
                        Controller.keyIsDown[f] = true;
                        return false
                    }
                });
                $(document).keyup(function(h) {
                    if (h.keyCode === f) {
                        if (e) {
                            e()
                        }
                        Controller.keyIsDown[f] = false;
                        return false
                    }
                })
            },
        };
                
        /************************** KEYCODE VAISSEAU 2 **************************/

        Controller.add(104, function() { // Key '8' (numpad up) to move up
            myGamePiece_Vaisseau2.speedY = -3;
        }, function() {
            myGamePiece_Vaisseau2.speedY = 0;
        });
        
        Controller.add(100, function() { // Key '4' (numpad left) to move left
            myGamePiece_Vaisseau2.speedX = -3;
        }, function() {
            myGamePiece_Vaisseau2.speedX = 0;
        });
        
        Controller.add(102, function() { // Key '6' (numpad right) to move right
            myGamePiece_Vaisseau2.speedX = 3;
        }, function() {
            myGamePiece_Vaisseau2.speedX = 0;
        });
        
        Controller.add(101, function() { // Key '5' (numpad down) to move down
            myGamePiece_Vaisseau2.speedY = 3;
        }, function() {
            myGamePiece_Vaisseau2.speedY = 0;
        });

        /************************** KEYCODE VAISSEAU 1 **************************/
        Controller.add(38, function() { // Key 'up' (numpad up) to move up
            myGamePiece_Vaisseau.speedY = -3;
        }, function() {
            myGamePiece_Vaisseau.speedY = 0;
        });
        
        Controller.add(37, function() { // Key 'down' (numpad left) to move left
            myGamePiece_Vaisseau.speedX = -3;
        }, function() {
            myGamePiece_Vaisseau.speedX = 0;
        });
        
        Controller.add(39, function() { // Key 'right' (numpad right) to move right
            myGamePiece_Vaisseau.speedX = 3;
        }, function() {
            myGamePiece_Vaisseau.speedX = 0;
        });
        
        Controller.add(40, function() { // Key 'down' (numpad down) to move down
            myGamePiece_Vaisseau.speedY = 3;
        }, function() {
            myGamePiece_Vaisseau.speedY = 0;
        });

        Controller.add(70, function() {
            game.keyCode1 = true
        }, function() {
            game.keyCode1 = false
        });
        Controller.add(67, function() {
            game.keyCode2 = true
        }, function() {
            game.keyCode2 = false
        });
        Controller.add(32, function() {
            game.keyCode3 = true
        }, function() {
            game.keyCode3 = false
        });
        Controller.add(37, function() {
            game.keyCode5 = true
        }, function() {
            game.keyCode5 = false
        });
        Controller.add(38, function() {
            game.keyCode6 = true
        }, function() {
            game.keyCode6 = false
        });
        Controller.add(39, function() {
            game.keyCode7 = true
        }, function() {
            game.keyCode7 = false
        });
        Controller.add(40, function() {
            game.keyCode8 = true
        }, function() {
            game.keyCode8 = false
        });
        var b = new Date().getTime();
        myGamePiece_Time = new temps(b);
        myGamePiece_Vaisseau = new Vaisseau(20, 100);
        myGamePiece_Vaisseau2 = new Vaisseau(20, 700);
        myGamePiece_Vaisseau2.img = image_Vaisseau2;
        myGamePiece_Fleurs = new Fleurs();
        myGamePiece_Fleurs2 = new Fleurs2();
        myGamePiece_Fleurs2.img = image_flowers2;
        myGamePiece_Affichage = new message();
        myGamePiece_GrosRocher = new GrosRocher();
        myGamePiece_Missile = new Missile();
        myGamePiece_Evenements = new Evenement();
        myGamePiece_Drawing = new Drawing()
    },
    clear: function() {
        this.context.clearRect(0, 0, this.canvas1.width, this.canvas1.height)
    }
};

function getRandomInt(b, a) {
    return Math.floor(Math.random() * (a - b + 1)) + b
}
var flowersX = [];
var flowersY = [];
for (var i = 0; i < 7; i++) {
    flowersX.push((getRandomInt(1500, 10000)));
    flowersY.push(getRandomInt(25, 700))
}

var flowers2X = [];
var flowers2Y = [];
for (var i = 0; i < 7; i++) {
    flowers2X.push((getRandomInt(1500, 10000)));
    flowers2Y.push(getRandomInt(25, 700))
}

var RockX = [];
var RockY = [];

impact = [];
flower = [];
flower2 = [];
missed_flower = [];
missed_flower2 = [];
checkEssence = [];
var score = 0;
var star_x = 0;
var star_y = 0;
var temps_essence = 0;
var drawing = 0;
var tirMissile = 0;
var impactMissile = 0;
var interval_to_refuel = 10;

change_image = function(a) {
    a.img = image_Vaisseau1
};
acceleration = function(a) {
    a.img = image_Vaisseau3
};
accelerationNulle = function(a) {
    a.img = image_Vaisseau1
};
changeX = function(a) {
    a.x = 800;
    setTimeout("restoreX(myGamePiece_Affichage)", 2000)
};
restoreX = function(a) {
    a.x = 2000
};

change_impact = function(a) {
    a.impact = false
};

change_impact2 = function(a) {
    a.impact2 = false
};

reset_missile = function(a) {
    a.nouveau_tir = false
};

RocherExplosion2 = function(a, b) {
    b.img = missile2;
    b.sizeMx = 175;
    b.sizeMy = 150
};
RocherExplosion3 = function(a, b) {
    b.img = missile2;
    b.sizeMx = 200;
    b.sizeMy = 175
};
RocherExplosion4 = function(a, b) {
    b.img = missile2;
    b.sizeMx = 225;
    b.sizeMy = 200
};
RocherExplosion5 = function(a, b) {
    b.img = missile2;
    b.sizeMx = 250;
    b.sizeMy = 225;
};

RocherExplosion6 = function(a, b) {
    b.img = missile2;
    b.sizeMx = 275;
    b.sizeMy = 250;
};

RocherExplosion7 = function(a, b) {
    b.x = 2000;
    b.sizeMx = 75;
    b.sizeMy = 50;
    b.img = missile
};

function temps(b) {
    this.time = b;
    var a = new Date().getTime();
    this.timeStart = a
}

function Drawing() {
    this.x = 0;
    this.y = -200;
    this.Speed = 1;
    this.sizeMx = 75;
    this.sizeMy = 50;
    this.img = missile;
    this.draw = function() {
        context = game.context;
        context.drawImage(this.img, this.x, myGamePiece_Drawing.y, this.sizeMx, this.sizeMy);
        this.x += 1
    }
}

function Missile() {
    this.x = 2500;
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
        this.x += this.Speed
    }
}

function Vaisseau(a, b) {
    this.speedX = 0;
    this.speedY = 0;
    this.x = a;
    this.y = b;
    this.i = 0;
    this.impact = false;
    this.impact2 = false;
    this.img = image_Vaisseau1;
    this.keyjump = 0;
    this.jump = 0;
    this.update = function() {
        context = game.context;
        context.drawImage(this.img, this.x, this.y, 150, 75);
        this.x += this.speedX;
        this.y += this.speedY
    }
}

function message() {
    this.x = "3500";
    this.y = 50;
    this.count = 0;
    this.longueur = 150;
    this.color = "#01DF01";
    this.score1 = 0;
    this.affichage_plein = 2000;
    this.countPress = 0;
    this.countPressPlein = 0;
    this.keypress = false;
    this.AffichageTouche_C = 2500;
    this.AffichageTouche_E = 2500;
    this.draw = function() {
        context = game.context;
        context.font = "30px Verdana";
        context.fillStyle = "#FFFFFF";
        context.fillText(text_fuel, this.x, this.y);
        context.fillStyle = this.color;
        context.fillRect(this.x, this.y + 25, this.longueur, 20);
        context.font = "30px Verdana";
        context.fillStyle = "#F0FFFF";
        context.beginPath();
        context.lineWidth = "2";
        context.strokeStyle = "#FFFFFF";
        context.rect(this.x, this.y + 25, 150, 20);
        context.stroke();
        context.fillStyle = "#3CBC3C";
        context.fillText(text_refueled, this.affichage_plein, 100);
        context.fillStyle = "#FFFFFF";
        
        // Concatenate the texts
        let fullText = text_press_fuel_display_1 + " " + text_press_fuel_display_2;

        // Set the maximum width before breaking into two lines
        const maxWidth = 800;

        // Measure the width of the full text
        let textWidth = context.measureText(fullText).width;

        if (textWidth > maxWidth) {
            // Split the text into two lines
            let words = fullText.split(" ");
            let line1 = "";
            let line2 = "";

            // Distribute words between the two lines
            for (let i = 0; i < words.length; i++) {
                let testLine = line1 + words[i] + " ";
                if (context.measureText(testLine).width > maxWidth) {
                    line2 = words.slice(i).join(" ");
                    break;
                }
                line1 = testLine;
            }

            // Calculate the positions to center each line
            let line1Width = context.measureText(line1).width;
            let line2Width = context.measureText(line2).width;

            let line1X = (1000 - line1Width) / 2 + this.AffichageTouche_C;
            let line2X = (1000 - line2Width) / 2 + this.AffichageTouche_C;

            // Draw the two lines of text
            context.fillText(line1, line1X, 250);
            context.fillText(line2, line2X, 300);
        } else {
            // Center the single line of text
            let centerX = (1000 - textWidth) / 2 + this.AffichageTouche_C;

            // Draw the single line of text
            context.fillText(fullText, centerX, 250);
        }

        // Concatenate the texts
        let fullText2 = text_press_fuel_touch_1 + " " + text_press_fuel_touch_2;

        // Measure the width of the full text
        let textWidth2 = context.measureText(fullText2).width;

        if (textWidth2 > maxWidth) {
            // Split the text into two lines
            let words = fullText2.split(" ");
            let line1 = "";
            let line2 = "";

            // Distribute words between the two lines
            for (let i = 0; i < words.length; i++) {
                let testLine = line1 + words[i] + " ";
                if (context.measureText(testLine).width > maxWidth) {
                    line2 = words.slice(i).join(" ");
                    break;
                }
                line1 = testLine;
            }

            // Calculate the positions to center each line
            let line1Width = context.measureText(line1).width;
            let line2Width = context.measureText(line2).width;

            let line1X = (1000 - line1Width) / 2 + this.AffichageTouche_E;
            let line2X = (1000 - line2Width) / 2 + this.AffichageTouche_E;

            // Draw the two lines of text
            context.fillText(line1, line1X, 250);
            context.fillText(line2, line2X, 300);
        } else {
            // Center the single line of text
            let centerX = (1000 - textWidth) / 2 + this.AffichageTouche_E;

            // Draw the single line of text
            context.fillText(fullText2, centerX, 250);
        }
        
    }
}

function GrosRocher() {
    this.img = Gros_Rocher;
    this.draw = function a() {
        context = game.context;
        for (var c = 0; c < 4; c++) {
            this.x = RockX[c];
            this.y = RockY[c];
            context.drawImage(this.img, this.x, this.y, 150, 75);
            RockX[c] -= speed_g/2;
            if (RockX[c] < -200) {
                RockX[c] = (getRandomInt(2000, 3000))
            }
            if ((myGamePiece_Vaisseau.x > (RockX[c] - 100)) && (myGamePiece_Vaisseau.x < (RockX[c] + 100)) && (myGamePiece_Vaisseau.y > (RockY[c] - 75)) && (myGamePiece_Vaisseau.y < (RockY[c] + 75))) {
                var d = new Date();
                var e = d.getTime() - myGamePiece_Time.timeStart;
                impact.push(e);
                RockX[c] = (getRandomInt(1600, 2500));
                RockY[c] = (getRandomInt(25, 700));
                if (myGamePiece_Affichage.score1 > 0 && myGamePiece_Affichage.score1 <= 100) {
                    myGamePiece_Affichage.score1 = 0
                } else {
                    if (myGamePiece_Affichage.score1 > collide_rock) {
                        myGamePiece_Affichage.score1 -= collide_rock
                    }
                }
            }           
            /*for (var b = 0; b < 10; b++) {
                if (((RockX[c]) > (RockX[b] - 300)) && ((RockX[c]) < (RockX[b] + 300)) && ((RockY[c]) > (RockY[b] - 300)) && ((RockY[c]) < (RockY[b] + 300)) && (b != c)) {
                    RockX[c] = (getRandomInt(2000, 3000));
                    RockY[c] = (getRandomInt(25, 700))
                }
            }*/
        }
    }
}

function Fleurs() {
    this.gamearea = game;
    this.img = image_flowers;
    this.draw = function() {
        context = game.context;
        for (var b = 0; b < 7; b++) {
            this.x = flowersX[b];
            this.y = flowersY[b];

            context.drawImage(this.img, this.x, this.y, 50, 50);
            flowersX[b] -= speed_g;
            if (flowersX[b] < -50) {
                flowersX[b] = (getRandomInt(1600, 2500));
                flowersY[b] = (getRandomInt(25, 700));
                var a = new Date().getTime() - myGamePiece_Time.timeStart;
                missed_flower.push(a);
                console.log('missed green: ' + missed_flower);
            }
            if ((myGamePiece_Vaisseau.x > (flowersX[b] - 100)) && (myGamePiece_Vaisseau.x < (flowersX[b] + 25)) && (myGamePiece_Vaisseau.y > (flowersY[b] - 90)) && (myGamePiece_Vaisseau.y < (flowersY[b] + 50))) {
                var a = new Date().getTime() - myGamePiece_Time.timeStart;
                flower.push(a);
                console.log('catched green flower: ' + flower);
                flowersX[b] = (getRandomInt(1600, 2500));
                flowersY[b] = (getRandomInt(25, 700));
                if (myGamePiece_Affichage.score1 >= 0) {
                    myGamePiece_Affichage.score1 += flowers_points
                }
            }           
        }
    }
}

function Fleurs2() {
    this.gamearea = game;
    this.img = image_flowers2;
    this.draw = function() {
        context = game.context;
        for (var b = 0; b < 7; b++) {
            this.x = flowers2X[b];
            this.y = flowers2Y[b];

            context.drawImage(this.img, this.x, this.y, 50, 50);
            flowers2X[b] -= speed_g;
            if (flowers2X[b] < -50) {
                flowers2X[b] = (getRandomInt(1600, 2500));
                flowers2Y[b] = (getRandomInt(25, 700))
                var a = new Date().getTime() - myGamePiece_Time.timeStart;
                missed_flower2.push(a);
                console.log('missed red: ' + missed_flower2);
            }
            if ((myGamePiece_Vaisseau2.x > (flowers2X[b] - 100)) && (myGamePiece_Vaisseau2.x < (flowers2X[b] + 25)) && (myGamePiece_Vaisseau2.y > (flowers2Y[b] - 90)) && (myGamePiece_Vaisseau2.y < (flowers2Y[b] + 50))) {
                var a = new Date().getTime() - myGamePiece_Time.timeStart;
                flower2.push(a);
                console.log('catched red flower: ' + flower2);
                flowers2X[b] = (getRandomInt(1600, 2500));
                flowers2Y[b] = (getRandomInt(25, 700));
                if (myGamePiece_Affichage.score1 >= 0) {
                    myGamePiece_Affichage.score1 += flowers2_points
                }
            }           
        }
    }
}

function Evenement() {
    this.update = function() {            
        
        if (myGamePiece_Vaisseau.x < 1) {
            myGamePiece_Vaisseau.x = 1
        }
        if (myGamePiece_Vaisseau.x > 1200) {
            myGamePiece_Vaisseau.x = 1200
        }
        if (myGamePiece_Vaisseau.y > 725) {
            myGamePiece_Vaisseau.y = 725
        }
        if (myGamePiece_Vaisseau.y < 0) {
            myGamePiece_Vaisseau.y = 0
        }

        if (myGamePiece_Vaisseau2.x < 1) {
            myGamePiece_Vaisseau2.x = 1
        }
        if (myGamePiece_Vaisseau2.x > 1200) {
            myGamePiece_Vaisseau2.x = 1200
        }
        if (myGamePiece_Vaisseau2.y > 725) {
            myGamePiece_Vaisseau2.y = 725
        }
        if (myGamePiece_Vaisseau2.y < 0) {
            myGamePiece_Vaisseau2.y = 0
        }      
        if (myGamePiece_Drawing.x >= 800) {
            myGamePiece_Drawing.x = 0;
            drawing += 1
        }
    }
}

function updateVaisseau2() {
    // Update its image and check for collisions or boundaries
    myGamePiece_Vaisseau2.update();
}

function updateGame() {
    game.clear();
    myGamePiece_Missile.draw();
    myGamePiece_Fleurs.draw();    
    myGamePiece_GrosRocher.draw();
    myGamePiece_Affichage.draw();
    myGamePiece_Drawing.draw();
    if (!multiplayer && controle1){
        myGamePiece_Fleurs2.draw();
        updateVaisseau2(); // Update the new Vaisseau
    }
    myGamePiece_Evenements.update();    
    this.score = myGamePiece_Affichage.score1;
    context.font = "30px Verdana";
    context.fillStyle = "#FFFFFF";
    if (!multiplayer && !controle1){
        myGamePiece_Vaisseau.update()
    }
};