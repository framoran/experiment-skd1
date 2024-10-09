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

            <script>
                const url = 'http://127.0.0.1:8000/fr/instruction8';
            </script>
            
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
              @if ($condition == 1 || $condition == 2)
              <div>
                <p>
                Parfait !<br></br>

                Maintenant que vous avez eu la possibilité de vous familiariser avec les commandes, vous aurez la possibilité de passer au jeu.<br></br>

                Le jeu va durer environ 5 minutes et nous alons mesurer votre activité cardiovasculaire tout le long, donc essayez de bouger le moins possible.<br></br>
                </p>
                <div class="container">
                <div class="box1"> <b>Abeille bleue : pour passer à la page suivante, <br>
                appuyez sur le bouton bleu.</b></div>
                <div class="box2"> <b>Abeille orange : pour passer à la page suivante, <br>
                appuyez sur le bouton orange.</b></div>
                </div>
                </div>
                <script src="/js/keydown_handler.js">
                <script/>

                @elseif ($condition == 3 || $condition == 4 || $condition == 5 || $condition == 6)
                <div>
                <p>
                Parfait !<br></br>

                Maintenant que vous avez eu la possibilité de vous familiariser avec les commandes, vous aurez la possibilité de passer au jeu.<br></br>

                Le jeu va durer environ 5 minutes et nous alons mesurer votre activité cardiovasculaire tout le long, donc essayez de bouger le moins possible.<br></br>
                </p>
                <div class="container">
                <div class="box1"> 
                <b>Pour passer à la page suivante, <br>
                appuyez sur le bouton bleu.</b></div>
                </div>
                </div>
                <script src="/js/keydown_handler_1player.js">
                <script/>
                </div>>
                </div>
                @endif
    @endcomponent
  @endcomponent
@endsection
