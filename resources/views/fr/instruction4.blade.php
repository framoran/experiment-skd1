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

            <style>

            body, html {
                height: 100%; /* Make sure the body takes up the full viewport height */
                margin: 0;
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
              background-color: #0080FF; /* Color for the first box */
            }

            .box2 {
              background-color: orange; /* Color for the second box */
            }
          </style>

            <div class="content elements-centered">

              <h1>
              	Consignes
              </h1>
              @if ($condition ==1 || $condition == 2)
              <div>

                Pendant les 8 minutes suivantes, vous visionnerez un extrait d'un film. Il est important que vous vous détendiez afin que nous puissions obtenir les mesures de votre activité cardiovasculaire au repos. <br /><br />

                Le contenu du film n'est absolument pas pertinent pour la suite de l'expérience, alors détendez-vous et profitez du film.<br /><br />
                
                <div class="container">
                  <div class="box1"> <b>Abeille bleue : pour passer à la page suivante, appuyez sur le bouton bleu.</b></div>
                  <div class="box2"> <b>Abeille orange : pour passer à la page suivante, appuyez sur le bouton orange.</b></div>
                </div>
              	</div>
                <script>
          const url = 'http://127.0.0.1:8000/fr/instruction5';
          </script>
            <script src="/js/keydown_handler.js">
          <script/>
              condizione 3 e 4
              @endif
      </div>
    @endcomponent
  @endcomponent
@endsection
