@php
    // Retrieve the 'condition' cookie
    $condition = request()->cookie('condition', 1); // Default to 1 if the cookie is not set
@endphp

@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot
            <script>
              const url = 'http://127.0.0.1:8000/fr/baseline';
            </script>
            <style>

              body, html {
                  height: 100%; /* Ensure the body takes up the full viewport height */
                  margin: 0;
                  overflow: hidden; /* Prevent the page from scrolling */
                  background-image: url('/images/craiyon_231414_honeycomb.png'); /* Replace with the path to your image */
                  background-size: cover; /* Ensure the image covers the entire viewport */
                  background-position: center; /* Center the background image */
                  background-repeat: no-repeat; /* Prevent the background from repeating */
              }


              .content {
                display: flex;
                justify-content: center; /* Horizontally center */
                align-items: center;     /* Vertically center */
                text-align: center;      /* Center the text */
                flex-direction: column;  /* Stack elements vertically */
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
              background-color: rgb(255, 102, 255); /* Color for the first box */
              line-height: 2; /* Adjust the line-height to increase space between lines */
            }

            .box2 {
              background-color: rgb(255, 255, 51); /* Color for the second box */
              line-height: 2; /* Adjust the line-height to increase space between lines */
            }
          </style>

            <div class="content elements-centered">

              <h1>
              	Consignes
              </h1>
                  @if($condition == 1 || $condition == 2)

                    <div>
                    Dans cette étude, nous nous intéressons à votre activité cardiovasculaire à deux phases spécifiques : la phase de repos et la phase de jeu.<br /><br />

                    Nous mesurerons votre activité cardiovasculaire grâce aux quatre électrodes qui vous ont été appliquées par l’expérimentatrice et au brassard pour la pression artérielle. <br /><br />

                    Veuillez trouver une position confortable que vous puissiez maintenir pendant toute l'expérience et de bouger le moins possible.<br /><br />
                    
                    <div class="container">
                        <div class="box1"> <b>Abeille violet : pour passer à la page suivante, <br>
                      appuyez sur le bouton violet.</b></div>
                        <div class="box2"> <b>Abeille jaune : pour passer à la page suivante, <br>
                        appuyez sur le bouton jaune.</b></div>
                    </div>
                  </div>

                    <script src="/js/keydown_handler.js">
                    <script/>

                  @elseif ($condition == 3 || $condition == 4) 

                    <div>
                      Dans cette étude, nous nous intéressons à votre activité cardiovasculaire à deux phases spécifiques : la phase de repos et la phase de jeu.<br /><br />

                      Nous mesurerons votre activité cardiovasculaire grâce aux quatre électrodes qui vous ont été appliquées par l’expérimentatrice et au brassard pour la pression artérielle. <br /><br />

                      Veuillez trouver une position confortable que vous puissiez maintenir pendant toute l'expérience et de bouger le moins possible.<br /><br />
                      <p>

                      <div class="container">
                        <div class="box1"> <b>Pour passer à la page suivante,<br> 
                        appuyez sur le bouton violet.</b></div>
                      </div>
                    </div>

                    <script src="/js/keydown_handler_1player_purple.js">
                    <script/>
                    @else
                    <div>
                      Dans cette étude, nous nous intéressons à votre activité cardiovasculaire à deux phases spécifiques : la phase de repos et la phase de jeu.<br /><br />

                      Nous mesurerons votre activité cardiovasculaire grâce aux quatre électrodes qui vous ont été appliquées par l’expérimentatrice et au brassard pour la pression artérielle. <br /><br />

                      Veuillez trouver une position confortable que vous puissiez maintenir pendant toute l'expérience et vous déplacer le moins possible.<br /><br />
                      <p>

                      <div class="container">
                      <div class="box2"> <b>Pour passer à la page suivante, <br>
                      appuyez sur le bouton jaune.</b></div>
                      </div>
                      </div>

                      <script src="/js/keydown_handler_1player_yellow.js">
                      <script/>
                  @endif 
          	</div>
      </div>
    @endcomponent
  @endcomponent
@endsection
