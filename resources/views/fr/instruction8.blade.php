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
                const url = 'http://127.0.0.1:8000/fr/game2';
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
                À la fin du jeu, vous verrez à quel point vos efforts combinés auront permis de remplir le pot de miel.<br></br>

                 <!-- Add the honey jar image here -->
                 <img src="{{ asset('images/honeypot_empty.png') }}" alt="honeypot" width="200" height="200"><br><br>

                <b>Attention :</b> dans la ruche, il n'y a pas de place pour l'égoïsme, donc il ne sera pas montré ce que chaque individu a contribué, mais ce que vous avez réussi à accomplir ensemble !<br></br>

                Bon travail et amusez-vous bien !<br></br>
                </p>
          	  </div>
              <div class="container">
                <div class="box1"> <b>Abeille violet : pour passer à la page suivante, <br>
                appuyez sur le bouton violet.</b></div>
                <div class="box2"> <b>Abeille jaune : pour passer à la page suivante,<br>
                 appuyez sur le bouton jaune.</b></div>
              </div>
              </div>
                <script src="/js/keydown_handler.js">
              <script/>
              @elseif ($condition == 3 || $condition == 5)
              <div>
                <p>
                À la fin du jeu, vous verrez à quel point vos efforts auront permis de remplir le pot de miel.<br></br>

                <!-- Add the honey jar image here -->
                 <img src="{{ asset('images/honeypot_empty.png') }}" alt="honeypot" width="200" height="200"><br><br>

                Bon travail et amusez-vous bien !<br></br>
                </p>
          	  </div>
              <div class="container">
                <div class="box1"> <b>Pour passer à la page suivante, <br>
                appuyez sur le bouton violet.</b></div>
              </div>
              </div>
                <script src="/js/keydown_handler_1player.js">
              <script/>
            </div>
            @else
            <div>
                <p>
                À la fin du jeu, vous verrez à quel point vos efforts auront permis de remplir le pot de miel.<br></br>

                <!-- Add the honey jar image here -->
                 <img src="{{ asset('images/honeypot_empty.png') }}" alt="honeypot" width="200" height="200"><br><br>

                Bon travail et amusez-vous bien !<br></br>
                </p>

                      <div class="container">
                      <div class="box2"> <b>Pour passer à la page suivante, <br>
                      appuyez sur le bouton jaune.</b></div>
                      </div>
                      </div>

                      <script src="/js/keydown_handler_1player.js">
                      <script/>
            @endif
    @endcomponent
  @endcomponent
@endsection
