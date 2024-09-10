@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <style>
              #body{
                  background-image:#D3D3D3; 
                  text-align:center;
                  margin-top:5%
                  }
              #instruction_1{
                  font: bold 16px Tahoma;
                  margin-top: 100px
                  }
              #instruction_2{
                  font: bold 16px Tahoma;
                  margin-top: 40px
                  }
              #body_consigne{
                  background-image: #D3D3D3; 
                  text-align:center;margin-top: 100px; 
                  width: 30%; 
                  font: bold 16px Tahoma
                  }
              #title_consigne{
                  font: 35px Tahoma;
                  margin-top: 100px; 
                  text-align:center;
                  }

              #p_consigne{
                  margin-top:15px;
                  padding:2%; 
                  font: 20px Tahoma;
                  text-align:center;
                  width:90%;
                  margin-left:auto;
                  margin-right:auto;
              }

              #p_consigne2{
                  padding:2%; 
                  font: bold 16px Tahoma;
                  margin-top: 4%; 
                  text-align:center;
                  width:75%;margin-left:auto;
                  margin-right:auto;
              }

              #p_consigne3{
                  font: 15px Tahoma;
                  margin-top: 4%; 
                  text-align:center;
                  width:75%;margin-left:auto;
                  margin-right:auto;
              }


              #bouton_consigne:hover{
                  box-shadow: 5px 5px 5px grey !important;
                  }    
                  
              #bouton{
                  visibility:hidden;}
                  
              .slidecontainer {
                width: 100%;
              }

              .slider {
                -webkit-appearance: none;
                width: 100%;
                height: 15px;
                border-radius: 5px;
                background: #d3d3d3;
                outline: none;
                opacity: 0.7;
                -webkit-transition: .2s;
                transition: opacity .2s;
                cursor:pointer;
              }

              .slider:hover {
                opacity: 1;
                cursor:pointer;
              }

              .slider::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 25px;
                height: 25px;
                border-radius: 50%;
                background: #4CAF50;
                cursor: pointer;
              }

              .slider::-moz-range-thumb {
                width: 25px;
                height: 25px;
                border-radius: 50%;
                background: #4CAF50;
                cursor: pointer;
              }

              .sliderText1{
                margin-top:-25px;
                margin-left:15%;
              }

              .sliderText2{
                margin-top:-45px;
                margin-left:79%;
              }

              .score1{
                margin-top:25px;
                margin-left:47%;
              }

              .sliderText3{
                margin-left:15%;
                margin-top:-25px;
              }

              .sliderText4{
                margin-left:79%;
                margin-top:-40px;
              }

              .score2{

                margin-left:47%;
              }

              .buttonTime{
                  background:#3CBC3C; 
                  border:none;
                  color:white;
                  padding:5px;
                  padding-left:15px;
                  padding-right:15px; 
                  font-weight:normal;
              }

              .buttonTime2{
                  background:red; 
                  border:none;
                  color:white;
                  padding:5px;
                  padding-left:15px;
                  padding-right:15px; 
                  font-weight:normal;
              }

              </style>

          <div class="content">

            <div class="elements-centered">
              <h1>
                Consigne
              </h1>
            </div>

            <div class="elements-centered">
              Avant de continuer, nous aimerions que vous estimiez votre future performance concernant la tâche de remplissage du réservoir d'essence. <br> </br>
              Ci-dessous, vous voyez un point vert avec un pourcentage. Ce pourcentage indique si vous pensez être plus ou moins fort à cette tâche. <br></br>
              Par exemple, si vous indiquez <strong>100%</strong>, cela signifie que vous pensez vous rappeler de prendre de l’essence <strong>à chaque fois</strong> que la jauge est dans le secteur rouge.<br></br>
              Par contre, si vous indiquez <strong>0%</strong>, cela signifie que vous pensez ne <strong>jamais</strong> vous rappeler de prendre de l’essence.<br></br>
              Veuillez maintenant glisser le point vert en direction de « bonne performance » ou en direction de « mauvaise performance » pour estimer votre performance. <br></br>
            </div>
        
            <form id = "bouton_consigne buttonStyle" action="intertask" method="get">
                  <p id = "p_consigne3">
                  Veuillez estimer votre performance à la tâche de remplissage du réservoir d'essence:</strong> <br> </br>
                </p>
                <div class="slidecontainer">
                      <input type="range" min="1" max="100" value="50" class="slider" id="essenceP" name="essenceP"  style="width:50%; margin-left:25%;">
                
                  <div class="sliderText3">
                    Mauvaise <br> performance
                </div>
                <div class="sliderText4">
                    Bonne <br> performance
                </div>
                
              <p class="score2"> Score : <span id="score2"></span> %</p>
              
              </div>
              <p id = "p_consigne">
                      Veuillez cliquer sur <strong>« continuer »</strong>
                </p>

                <div class="elements-centered">
                  <button class="button is-primary" name="sendingData" type="submit" >Continuer</button>
                </div>

              </form>
              <script>
                  /*var slider = document.getElementById("perfromanceP");
                  var output = document.getElementById("score");
                  output.innerHTML = slider.value;
                  
                  slider.oninput = function() {
                    output.innerHTML = this.value;
                  }*/
                  
                  var slider2 = document.getElementById("essenceP");
                  var output2 = document.getElementById("score2");
                  output2.innerHTML = slider2.value;
                  
                  slider2.oninput = function() {
                    output2.innerHTML = this.value;
                    expires = "Thu, 30 Dec 2030 12:00:00 UTC";
                    document.cookie = 'prediction' + "=" + this.value + ";" + expires;                    
                  }
              </script>
            </div>
    @endcomponent
  @endcomponent
@endsection
