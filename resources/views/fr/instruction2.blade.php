@php

  $condition = 2;

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
            }

            .box2 {
              background-color: orange; /* Color for the second box */
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
            <div class="box1"> <b>Abeille bleue : pour passer à la page suivante, appuyez sur le bouton bleu.</b></div>
            <div class="box2"> <b>Abeille orange : pour passer à la page suivante, appuyez sur le bouton orange.</b></div>
            </div>
      </div>
      
      <script>
          const url = 'http://127.0.0.1:8000/fr/instruction3';
      </script>

      <script src="/js/keydown_handler.js">
      <script/>

      @else
        Condition 3 ou 4
      @endif
    @endcomponent
  @endcomponent
@endsection
