@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div id="container">
                <!-- Instruction Section -->
                <div id="instructions" class="main">
                    <h1 class="title">Période de Repos</h1>
                    <p class="m1">Pendant les 8 prochaines minutes, votre activité physiologique au repos sera mesurée.</p> <br>
                    <p>Pendant ce temps, vous regarderez un film documentaire.</p> <br>
                    <p>Note Importante : Veuillez essayer de maintenir la même position corporelle pendant toute l'expérience.</p> <br>
                    <p>Maintenant, détendez-vous et essayer de bouger le moins possible pendant la phase de repos.</p> <br>
                    <p>Appuyez sur Enter pour continuer</p> <br>

                    <div class="button is-primary mt-5" id="startButton">Enter</div>
                </div>

                <!-- Video Section -->
                <div id="videoSection" class="main video hidden">
                    <video id="myVideo" width="75%" height="75%" style="margin-left: 5%; margin-top: 5%" controls>
                        <source src="{{ asset('assets/movie1.mp4') }}" type="video/mp4" />
                        Votre navigateur ne supporte pas la balise vidéo.
                    </video>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const instructions = document.getElementById('instructions');
                    const videoSection = document.getElementById('videoSection');
                    const video = document.getElementById('myVideo');
                    const startButton = document.getElementById('startButton');

                    startButton.addEventListener('click', function() {
                        // Change background to black and hide card
                        document.body.style.backgroundColor = 'black';
                        instructions.classList.add('hidden');
                        videoSection.classList.remove('hidden');
                        video.classList.remove('video');
                        video.classList.add('video2');

                        // Play video and handle audio
                        video.play();
                        decreaseSound(1);

                        // Redirect user after 8 minutes
                        setTimeout(() => {
                            const redirectAudio = new Audio('{{ asset('assets/chimes.wav') }}');
                            redirectAudio.play();
                            video.pause();

                            setTimeout(() => {
                                redirectAudio.pause();
                                redirectAudio.currentTime = 0;
                                window.location.href = '';
                            }, 1000);
                        }, 480000); // 8 minutes
                    });

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
                body {
                    margin: 0; /* Remove default body margin */
                    overflow: hidden; /* Prevent scrolling */
                    height: 100vh; /* Ensure body takes up full viewport height */
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
