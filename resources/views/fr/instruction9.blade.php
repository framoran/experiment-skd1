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
                Le jeu est terminé! Voici le résultat de vos efforts: <br></br>

                 <!-- Add the honey jar image here -->
                 <img src="{{ asset('images/honeypot.png') }}" alt="honeypot" width="200" height="200"><br><br>

                Bien fait! <br></br>

                Veuillez attendre l'experimentatrice SVP. <br></br>
                </p>
          	  </div>
              @else
              <div>
              <p>
                Le jeu est terminé! Voici le résultat de vos efforts: <br></br>

                 <!-- Add the honey jar image here -->
                 <img src="{{ asset('images/honeypot.png') }}" alt="honeypot" width="200" height="200"><br><br>

                Bien fait!<br></br>

                Veuillez attendre l'experimentatrice SVP.<br></br>
                </p>
          	  </div>
            </div>
            @endif
    @endcomponent
  @endcomponent
@endsection
