@php

  $condition = 1;

@endphp

@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            @php

              setcookie('eui',  'none', time() + (86400 * 30), "/"); // 86400 = 1 day

              setcookie('data_recorded',  'none', time() + (86400 * 30), "/"); // 86400 = 1 day

              if (isset($_GET['Experiment_Id'])){

                setcookie('experimentId',  htmlspecialchars($_GET['Experiment_Id']), time() + (86400 * 30), "/"); // 86400 = 1 day

              }else{

                setcookie('experimentId',  'demo', time() + (86400 * 30), "/"); // 86400 = 1 day

              }

              if (isset($_GET['eui'])){

                setcookie('eui',  'S_'.htmlspecialchars($_GET['eui']), time() + (86400 * 30), "/"); // 86400 = 1 day

              }

              setcookie('condition',  '1', time() + (86400 * 30), "/"); // 86400 = 1 day

            @endphp
              
            <script>
              const url = 'http://127.0.0.1:8000/fr/instruction2';
            </script>

            <style>

            body, html {
                  height: 100%; /* Ensure the body takes up the full viewport height */
                  margin: 0;
                  overflow: hidden; /* Prevent the page from scrolling */
              }

              .content {
                  display: flex;
                  justify-content: center; /* Horizontally center */
                  align-items: center;     /* Vertically center */
                  text-align: center;      /* Center the text */
                  flex-direction: column;  /* Stack elements vertically */
                  padding: 20px;
                  box-sizing: border-box;  /* Ensure padding is included in width/height */
                  background-color: white; /* Set background color */
              }
              
            .container {
              display: flex;
              gap: 20px; /* Adds space between the boxes */
              justify-content: center; /* Horizontally center */
            }

            .box1, .box2 {
              padding: 20px;
              border: 1px solid black;
              border-radius: 15px; /* Rounds the corners */
            }

            .box1 {
              background-color: #0080FF; /* Color for the first box */
              line-height: 2; /* Adjust the line-height to increase space between lines */
            }

            .box2 {
              background-color: orange; /* Color for the second box */
              line-height: 2; /* Adjust the line-height to increase space between lines */
            }
          </style>
            
          <div class="content elements-centered">
                  <h1>
                    Consignes
                  </h1>
                  
                  @if($condition == 1 || $condition == 2)
                  <div>

                      Bienvenue à cette étude et merci de votre participation. <br><br>

                      Il s'agit d'une étude <b>collaborative</b> dans laquelle vous devrez jouer ensemble en prenant le rôle d'abeilles travailleuses. <br><br>

                      <b> Important : pour passer d'une page à l'autre, il est nécessaire que tous·tes les participant·e·s aient appuyé sur le bouton demandé.</b><br><br>

                      Vérifiez sur votre bureau : vous trouverez une abeille de couleur <span style="color: #0080FF;"><b>bleu</b></span> ou <span style="color: orange;"><b>orange</b></span>.<br><br>

                      Dans les diapositives suivantes, vous trouverez davantage d'instructions.<br><br>

                      <div class="container">
                        <div class="box1"> <b>Abeille bleue : pour passer à la page suivante, <br>
                      appuyez sur le bouton bleu.</b></div>
                        <div class="box2"> <b>Abeille orange : pour passer à la page suivante, <br>
                        appuyez sur le bouton orange.</b></div>
                      </div>
                  
                  </div>
              </div>

              <script>
                  const url = 'http://127.0.0.1:8000/fr/instruction2';
              </script>

              <script src="/js/keydown_handler.js">
              <script/>
                    @else
                    <div>

                      Bienvenue à cette étude et merci de votre participation. <br><br>


                      Dans les diapositives suivantes, vous trouverez davantage d'instructions.<br><br>

                      <div class="container">
                      <div class="box1"> <b>Pour passer à la page suivante, <br>
                      appuyez sur le bouton bleu.</b></div>
                      </div>
                      </div>
                    
                    <script src="/js/keydown_handler_1player.js">
                    <script/>
            </div>
      
      @endif
    @endcomponent
  @endcomponent
@endsection
