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
                let flower_task = getCookie("flower_task");
                let flower2_task = getCookie("flower2_task");
                let missedFlower_task = getCookie("missedFlower_task");
                let missedFlower2_task = getCookie("missedFlower2_task");
                let draw_task = getCookie("draw_task");

                // Prepare the data to send
                let data = {
                    flower_task: flower_task,
                    flower2_task: flower2_task,
                    missedFlower_task: missedFlower_task,
                    missedFlower2_task: missedFlower2_task,
                    draw_task: draw_task
                };

                // Send the data via Axios
                axios.post('{{ route('save.task.data') }}', data)
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
              
              <div>

                <p>
                  L'expérience est terminée. Merci pour votre participation!                  
                </p>
                
              </div>              

            </div>
        @endcomponent
    @endcomponent
@endsection