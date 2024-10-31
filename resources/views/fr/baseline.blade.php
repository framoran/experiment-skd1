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

            @if($condition == 1 || $condition == 2)
            <div id="container">
                <!-- Instruction Section -->
                <div id="instructions" class="main">
                    <h1 class="title">Période de Repos</h1>
                    <p class="m1">Pendant les 8 prochaines minutes, votre activité physiologique au repos sera mesurée.</p> <br>
                    <p>Pendant ce temps, vous regarderez un film documentaire.</p> <br>
                    <p><b>Note Importante :</b> Veuillez essayer de maintenir la même position corporelle pendant toute l'expérience.</p> <br>
                    <p>Maintenant, détendez-vous et essayez de bouger le moins possible pendant la phase de repos.</p> <br>
                    <div class="container">
                        <div class="box1"> <b>Abeille violet : pour passer à la page suivante, <br>
                      appuyez sur le bouton violet.</b></div>
                        <div class="box2"> <b>Abeille jaune : pour passer à la page suivante, <br>
                        appuyez sur le bouton jaune.</b></div>
                    </div>
                </div>
                
                @elseif ($condition == 3 || $condition == 4)
                <div id="container">
                <!-- Instruction Section -->
                <div id="instructions" class="main">
                    <h1 class="title">Période de Repos</h1>
                    <p class="m1">Pendant les 8 prochaines minutes, votre activité physiologique au repos sera mesurée.</p> <br>
                    <p>Pendant ce temps, vous regarderez un film documentaire.</p> <br>
                    <p><b>Note Importante :</b> Veuillez essayer de maintenir la même position corporelle pendant toute l'expérience.</p> <br>
                    <p>Maintenant, détendez-vous et essayez de bouger le moins possible pendant la phase de repos.</p> <br>
                    <div class="container">
                        <div class="box1"> <b>Pour passer à la page suivante, <br>
                      appuyez sur le bouton violet.</b></div>
                    </div>
                </div>
                
                @else
                <div id="container">
                <!-- Instruction Section -->
                <div id="instructions" class="main">
                    <h1 class="title">Période de Repos</h1>
                    <p class="m1">Pendant les 8 prochaines minutes, votre activité physiologique au repos sera mesurée.</p> <br>
                    <p>Pendant ce temps, vous regarderez un film documentaire.</p> <br>
                    <p><b>Note Importante :</b> Veuillez essayer de maintenir la même position corporelle pendant toute l'expérience.</p> <br>
                    <p>Maintenant, détendez-vous et essayez de bouger le moins possible pendant la phase de repos.</p> <br>
                    <div class="container">
                        <div class="box2"> <b>Pour passer à la page suivante, <br>
                        appuyez sur le bouton jaune.</b></div>
                    </div>
                </div>

                @endif


                <!-- Video Section -->
                <div id="videoSection" class="main video hidden">
                    <video id="myVideo" width="75%" height="75%" style="margin-left: 5%; margin-top: 5%" controls>
                        <source src="{{ asset('assets/movie1.mp4') }}" type="video/mp4" />
                        Votre navigateur ne supporte pas la balise vidéo.
                    </video>
                </div>
            </div>

            <script>
              const url = 'http://127.0.0.1:8000/fr/instruction4';
            </script>

<script>
    // Define condition variable in JavaScript from PHP
    const condition = {{ $condition }};
    const purpleKey = '/';  // For the purple bee
    const yellowKey = '*';  // For the yellow bee
    let purplePressed = false;
    let yellowPressed = false;

    document.addEventListener('DOMContentLoaded', function () {
        const instructions = document.getElementById('instructions');
        const videoSection = document.getElementById('videoSection');
        const video = document.getElementById('myVideo');
        const url = 'http://127.0.0.1:8000/fr/instruction4';

        // Combined Event Listener for Key Presses
        document.addEventListener('keydown', function (event) {
            if (event.key === purpleKey) {
                purplePressed = true;
                console.log('Purple key pressed');
            }
            if (event.key === yellowKey) {
                yellowPressed = true;
                console.log('Yellow key pressed');
            }

            // Check key combination based on condition
            if ((condition === 1 || condition === 2) && purplePressed && yellowPressed) {
                startVideo();
            } else if ((condition === 3 || condition === 4) && purplePressed) {
                startVideo();
            } else if ((condition === 5 || condition === 6) && yellowPressed) {
                startVideo();
            }
        });

        // Start video function
        function startVideo() {
            // Change background to black and hide card
            document.body.style.backgroundColor = 'black';
            instructions.classList.add('hidden');
            videoSection.classList.remove('hidden');
            video.classList.remove('video');
            video.classList.add('video2');

            // Play video and handle audio
            video.play();
            decreaseSound(8);  // Reduce sound over 8 minutes

            // Redirect user after 8 minutes
            setTimeout(() => {
                const redirectAudio = new Audio('{{ asset('assets/chimes.wav') }}');
                redirectAudio.play();
                video.pause();
                window.location.href = url;
            }, 480000); // 8 minutes
        }

        // Gradually reduce sound over a set period
        function decreaseSound(minutes) {
            const duration = 60 * minutes;
            const intervals = [
                0.95, 0.9, 0.85, 0.8, 0.75, 0.7, 0.65, 0.6, 0.55, 0.5,
                0.45, 0.4, 0.35, 0.3, 0.25, 0.2, 0.15, 0.1, 0.05, 0
            ];

            video.addEventListener('timeupdate', () => {
                for (let i = 0; i < intervals.length; i++) {
                    if (video.currentTime >= duration - (5.2 - (i * 0.2))) {
                        video.volume = intervals[i];
                        break;
                    }
                }
            });
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
                    background-color: rgb(255, 102, 255); /* Color for the first box */
                    line-height: 2; /* Adjust the line-height to increase space between lines */
                }

                .box2 {
                    background-color: rgb(255, 255, 51); /* Color for the second box */
                    line-height: 2; /* Adjust the line-height to increase space between lines */
                }

                .main {
                    padding: 20px;
                    text-align: center;
                }

                .hidden {
                    display: none;
                }

                .video {
                    width: 90%;
                    height: 90%;
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    z-index: 1000;
                    background-color: black;
                }

                .video2 {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 90%;
                    height: 90%;
                    position: fixed;
                    top: 0;
                    left: 0;
                    background-color: black;
                }

                .button {
                    cursor: pointer;
                }
            </style>
        @endcomponent
    @endcomponent
@endsection