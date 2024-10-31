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
                const url = 'http://127.0.0.1:8000/fr/instruction6';
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
              @if ($condition == 1 || $condition == 2)
              <div>
                <p>

                  Pour le jeu collaboratif, imaginez d'être une abeille travailleuse chargée de la recolte du pollen et la production de miel.<br><br>

                  Chacune d'entre vous est spécialisée dans un type spécifique de fleurs requis par l'ancienne recepte de la ruche.<br><br>

                  Abeille violet, vous serez chargée des fleurs violets, et abeille jaune, vous serez seras chargée des fleurs jaunes.<br><br>
                  
                  Votre objectif est de remplir un pot de miel.<br><br>
                </p>
              </div>
              <div class="container">
                <div class="box1">
                  <b>Abeille violet : pour passer à la page suivante,<br>
                  appuyez sur le bouton violet.</b>
                </div>
                <div class="box2">
                  <b>Abeille jaune : pour passer à la page suivante,<br>
                  appuyez sur le bouton jaune.</b>
                </div>
              </div>
              <script src="/js/keydown_handler.js"></script>
              @elseif ($condition == 3 || $condition == 4) 
              <div>
                <p>
                  Pour le jeu, imaginez d'être une abeille travailleuse chargée de la recolte du pollen et la production de miel. <br><br>

                  Chaque abeille est spécialisée dans un type spécifique de fleurs requis par l'ancienne recepte de la ruche.<br><br>

                  Dans votre cas, dès que vous êtes une abeille violet, vous serez chargée des fleurs violets, les fleurs jaunes peuvent être ignorées.<br><br>
                  
                  L'objectif est de remplir un pot de miel.<br><br>
                </p>
              </div>
              <div class="container">
                <div class="box1">
                  <b>Pour passer à la page suivante,<br>
                  appuyez sur le bouton violet.</b>
                </div>
              </div>
              <script src="/js/keydown_handler_1player_purple.js"></script>
              @else
              <p>
                Pour le jeu, imaginez d'être une abeille travailleuse chargée de la recolte du pollen et la production de miel. <br><br>

                Chaque abeille est spécialisée dans un type spécifique de fleurs requis par l'ancienne recepte de la ruche.<br><br>

                Dans votre cas, dès que vous êtes une abeille jaune, vous serez chargée des fleurs jaunes, les fleurs violets peuvent être ignorées.<br><br>

                L'objectif est de remplir un pot de miel.<br><br>
                </p>

                      <div class="container">
                      <div class="box2"> <b>Pour passer à la page suivante, <br>
                      appuyez sur le bouton jaune.</b></div>
                      </div>
                      </div>

                      <script src="/js/keydown_handler_1player_yellow.js">
                      <script/>
              @endif

            </div>
        @endcomponent
    @endcomponent
@endsection