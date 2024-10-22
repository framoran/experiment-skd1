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

            <!-- Include Axios from CDN -->
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

            <script>
                const url = 'http://127.0.0.1:8000/fr/instruction6';

                // Function to get a cookie by name
                function getCookie(name) {
                    let cookieArr = document.cookie.split(";");
                    for (let i = 0; i < cookieArr.length; i++) {
                        let cookiePair = cookieArr[i].split("=");
                        if (name == cookiePair[0].trim()) {
                            return decodeURIComponent(cookiePair[1]);
                        }
                    }
                    return null;
                }

                // Get the data from the cookies
                let flower_practice = getCookie("flower_practice");
                let flower2_practice = getCookie("flower2_practice");
                let missedFlower_practice = getCookie("missedFlower_practice");
                let missedFlower2_practice = getCookie("missedFlower2_practice");
                let draw_practice = getCookie("drawing_practice");

                // Prepare the data to send
                let data = {
                    flower_practice: flower_practice,
                    flower2_practice: flower2_practice,
                    missedFlower_practice: missedFlower_practice,
                    missedFlower2_practice: missedFlower2_practice,
                    draw_practice: draw_practice
                };

                // Send the data via Axios
                axios.post('{{ route('save.practice.data') }}', data)
                  .then(function (response) {
                      console.log(response);
                  })
                  .catch(function (error) {
                      console.log(error);
                  });
                 
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
                  Dans cette étude, vous jouerez le rôle d'abeilles chargées de récolter du pollen pour la ruche.<br><br>

                  Chacune d'entre vous est spécialisée dans un type spécifique de fleurs.<br><br>

                  Abeille violet, tu seras chargée des fleurs violets, et abeille jaunes, tu seras chargée des fleurs violets.<br><br>
                  
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
              @elseif ($condition == 3 || $condition == 5) 
              <div>
                <p>
                  Dans cette étude, vous jouerez le rôle d'abeille chargé de récolter du pollen pour la ruche.<br><br>

                  Chaque abeille est spécialisée dans un type spécifique de fleurs.<br><br>

                  Abeille violet, tu seras chargée des fleurs violet, les fleurs jaunes peuvent être ignorées.<br><br>
                  
                  L'objectif est de remplir un pot de miel.<br><br>
                </p>
              </div>
              <div class="container">
                <div class="box1">
                  <b>Pour passer à la page suivante,<br>
                  appuyez sur le bouton violet.</b>
                </div>
              </div>
              <script src="/js/keydown_handler_1player.js"></script>
              @else
              <p>
                  Dans cette étude, vous jouerez le rôle d'abeille chargé de récolter du pollen pour la ruche.<br><br>

                  Chaque abeille est spécialisée dans un type spécifique de fleurs.<br><br>

                  Abeille violet, tu seras chargée des fleurs violet, les fleurs jaunes peuvent être ignorées.<br><br>
                  
                  L'objectif est de remplir un pot de miel.<br><br>
                </p>

                      <div class="container">
                      <div class="box2"> <b>Pour passer à la page suivante, <br>
                      appuyez sur le bouton jaune.</b></div>
                      </div>
                      </div>

                      <script src="/js/keydown_handler_1player.js">
                      <script/>
              @endif

            </div>
        @endcomponent
    @endcomponent
@endsection