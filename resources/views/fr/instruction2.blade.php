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
             const url = 'http://127.0.0.1:8000/fr/instruction3';
            </script>
            <style>

              body, html {
                  height: 100%; /* Ensure the body takes up the full viewport height */
                  margin: 0;
                  overflow: hidden; /* Prevent the page from scrolling */
                  background-image: url('/images/background.jpg'); /* Replace with the path to your image */
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
              @if ($condition == 1 || $condition == 2 )
              <div>
              
              Pour commencer, veuillez entrer votre code GML à 7 chiffres. <br><br>

              <b> Attention:</b> l'utilisation de la souris est partagée, donc d'abord, l'abeille <span style="color: #0080FF;">bleue</span> devra répondre, puis l'abeille <span style="color: orange;">orange</span> pourra prendre le contrôle de la souris et entrer son code. <br><br>
            
              <form class="box">
                <div class="field">
                  <label class="label">Code abeille <b>bleue</b> :</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="e.g. XFAHTIA" />
                  </div>
                </div>

                <form class="box">
                <div class="field">
                  <label class="label">Code abeille <b>orange</b>:</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="e.g. XFAHTIA" />
                  </div>
                </div>
              </form>
              </div>
              <div class="container">
                        <div class="box1"> <b>Abeille bleue : pour passer à la page suivante, <br>
                      appuyez sur le bouton bleu.</b></div>
                        <div class="box2"> <b>Abeille orange : pour passer à la page suivante, <br>
                        appuyez sur le bouton orange.</b></div>
              </div>
      </div>

      <script src="/js/keydown_handler_purple.js">
      <script/>

      @else
      <div>
              
              Pour commencer, veuillez entrer votre code GML à 7 chiffres. <br></br>

                <form class="box">
                <div class="field">
                  <label class="label">Code personnel:</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="e.g. XFAHTIA" />
                  </div>
                </div>
              </div>
            <div class="container">
            <div class="box1"> <b>Pour passer à la page suivante, <br>
            appuyez sur le bouton bleu.</b></div>
            </div>
      </div>
      <script src="/js/keydown_handler_1player_yellow.js">
        <script/>
      @endif
    @endcomponent
  @endcomponent
@endsection
