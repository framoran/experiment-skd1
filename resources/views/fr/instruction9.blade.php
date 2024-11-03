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

                    // Calculate accuracies
                    let acc_player1 = flower_task.length / (flower_task.length + missedFlower_task.length);
                    let acc_player2 = flower2_task.length / (flower2_task.length + missedFlower2_task.length);

                    let acc_mean = (acc_player1 + acc_player2) / 2;

                    console.log('catched flower 1:', flower_task.length);
                    console.log('missed flower1:', missedFlower_task.length);

                    console.log('catched flower 2:', flower2_task.length);
                    console.log('missed flower2:', missedFlower2_task.length);

                    console.log('Accuracy:', acc_mean);

                    // Image replacement based on accuracy
                    document.addEventListener("DOMContentLoaded", function() {
                        // Find the image elements by their IDs
                        let flower1 = document.getElementById('flower');
                        let flower2 = document.getElementById('flower2');
                        let flower3 = document.getElementById('flower3');

                        // Logic for flower1 image based on overall accuracy (acc_mean)
                        if (acc_mean >= 0.8) {
                            if (flower1) flower1.src = '{{ asset("images/HP_full_duo.png") }}';
                        } else if (acc_mean >= 0.6) {
                            if (flower1) flower1.src = '{{ asset("images/HP_35_duo.png") }}';
                        } else if (acc_mean >= 0.4) {
                            if (flower1) flower1.src = '{{ asset("images/HP_HalfFull_duo.png") }}';
                        } else {
                            if (flower1) flower1.src = '{{ asset("images/HP_14_duo.png") }}';
                        }

                        // Logic for flower2 image based on player1 accuracy (acc_player1)
                        if (acc_player1 >= 0.8) {
                            if (flower2) flower2.src = '{{ asset("images/HP_full_purple.png") }}';
                        } else if (acc_player1 >= 0.6) {
                            if (flower2) flower2.src = '{{ asset("images/HP_35_purple.png") }}';
                        } else if (acc_player1 >= 0.4) {
                            if (flower2) flower2.src = '{{ asset("images/HP_HalfFull_purple.png") }}';
                        } else {
                            if (flower2) flower2.src = '{{ asset("images/HP_14_purple.png") }}';
                        }

                        // Logic for flower3 image based on player2 accuracy (acc_player2)
                        if (acc_player2 >= 0.8) {
                            if (flower3) flower3.src = '{{ asset("images/HP_full_yellow.png") }}';
                        } else if (acc_player2 >= 0.6) {
                            if (flower3) flower3.src = '{{ asset("images/HP_34_yellow.png") }}';
                        } else if (acc_player2 >= 0.4) {
                            if (flower3) flower3.src = '{{ asset("images/HP_HalfFull_yellow.png") }}';
                        } else {
                            if (flower3) flower3.src = '{{ asset("images/HP_14_yellow.png") }}';
                        }
                    });
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
                    background-color: #rgb(255, 102, 255);
                    line-height: 2;
                }
                .box2 {
                    background-color: rgb(255, 255, 51);
                    line-height: 2;
                }
            </style>

            <div class="content elements-centered">
                <h1>Consignes</h1>
                @if ($condition == 1 || $condition == 2)
                    <div>
                        <p>
                            Le jeu est terminé! Voici le résultat de vos efforts: <br><br>
                            <img id="flower" src="" alt="honeypot" width="600" height="600"><br><br>
                            Bien fait! <br><br>

                            Veuillez attendre l'experimentatrice SVP. <br>
                        </p>
                    </div>
                @elseif ($condition == 3 || $condition == 4)
                    <div>
                        <p>
                            Le jeu est terminé! Voici le résultat de vos efforts: <br><br>
                            <img id="flower2" src="" alt="honeypot" width="600" height="600"><br><br>
                            Bien fait! <br><br>

                            Veuillez attendre l'experimentatrice SVP. <br>
                        </p>
                    </div>

                    @else
                    <div>
                        <p>
                            Le jeu est terminé! Voici le résultat de vos efforts: <br><br>
                            <img id="flower3" src="" alt="honeypot" width="600" height="600"><br><br>
                            Bien fait! <br><br>

                            Veuillez attendre l'experimentatrice SVP. <br>
                        </p>
                    </div>
                @endif
            </div>
        @endcomponent
    @endcomponent
@endsection
