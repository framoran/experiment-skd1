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
                let flower_task = getCookie("flower_task");
                let flower2_task = getCookie("flower2_task");
                let missedFlower_task = getCookie("missedFlower_task");
                let missedFlower2_task = getCookie("missedFlower2_task");
                let draw_task = getCookie("draw_task");

                // Prepare the data to send
                let data = {
                    flower_practice: flower_practice,
                    flower2_practice: flower2_practice,
                    missedFlower_practice: missedFlower_practice,
                    missedFlower2_practice: missedFlower2_practice,
                    draw_practice: draw_practice,
                    flower_task: flower_task,
                    flower2_task: flower2_task,
                    missedFlower_task: missedFlower_task,
                    missedFlower2_task: missedFlower2_task,
                    draw_task: draw_task
                };

                // Send the data via Axios
                axios.post('/{{ app()->getLocale() }}/save', data)
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                // Count the number of elements in each array
                  let flower_task_count = flower_task.length;
                  let flower_task2_count = flower2_task.length;
                  let missedFlower_task_count = missedFlower_task.length;
                  let missedFlower_task2_count = missedFlower2_task.length;

                  // Calculate accuracy: (flower_task_count + flower_task2_count) / (missedFlower_task_count + missedFlower_task2_count)
                  let total_flower_count = flower_task_count + flower_task2_count;
                  let total_missed_count = missedFlower_task_count + missedFlower_task2_count;

                  // Ensure no division by zero in case there are no missed flowers
                  let accuracy = (total_missed_count > 0) 
                      ? (total_flower_count / total_missed_count) 
                      : 0;

                  console.log('Accuracy:', accuracy);
                  
                  // Image replacement based on accuracy
                  document.addEventListener("DOMContentLoaded", function() {
                      // Find the image elements by their IDs
                      let flower1 = document.getElementById('flower');
                      let flower2 = document.getElementById('flower2');

                      // Determine the appropriate image based on accuracy
                      if (accuracy > 0.5) {
                          if (flower1) {
                              flower1.src = '{{ asset("images/honeypot2.png") }}';
                          }
                          if (flower2) {
                              flower2.src = '{{ asset("images/honeypot2.png") }}';
                          }
                      } else {
                          if (flower1) {
                              flower1.src = '{{ asset("images/honeypot3.png") }}';
                          }
                          if (flower2) {
                              flower2.src = '{{ asset("images/honeypot3.png") }}';
                          }
                      }
                  });
                    
            </script>

            <style>
                body, html {
                    height: 100%;
                    margin: 0;
                }
                .content {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    text-align: center;
                    flex-direction: column;
                }
                .container {
                    display: flex;
                    gap: 20px;
                    justify-content: center;
                }
                .box1, .box2 {
                    padding: 20px;
                    border: 1px solid black;
                    border-radius: 15px;
                }
                .box1 {
                    background-color: #0080FF;
                    line-height: 2;
                }
                .box2 {
                    background-color: orange;
                    line-height: 2;
                }
            </style>

            <div class="content elements-centered">
                <h1>Consignes</h1>
                @if ($condition == 1 || $condition == 2)
                    <div>
                        <p>
                            Le jeu est terminé! Voici le résultat de vos efforts: <br><br>
                            <img id="flower" src="" alt="honeypot" width="200" height="200"><br><br>
                            Bien fait! <br><br>
                            Veuillez attendre l'experimentatrice SVP. <br>
                        </p>
                    </div>
                @else
                    <div>
                        <p>
                            Le jeu est terminé! Voici le résultat de vos efforts: <br><br>
                            <img id="flower2" src="" alt="honeypot" width="200" height="200"><br><br>
                            Bien fait! <br><br>
                            Veuillez attendre l'experimentatrice SVP. <br>
                        </p>
                    </div>
                @endif
            </div>
        @endcomponent
    @endcomponent
@endsection
