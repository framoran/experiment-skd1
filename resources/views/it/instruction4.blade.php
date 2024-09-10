@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <h1>
                Istruzioni
              </h1>

              <div>

                Molto bene. Ora che hai familiarità con i diversi elementi del gioco, puoi esercitarti con un esempio completo del gioco. <br /> <br />

                <div style="text-align:left; margin-left:20%;">
                  <strong>Riepilogo degli obiettivi: <br /></strong>
                  <ul>
                    <li> Raccogli le stelle: per ognuna guadagnerai {{$stars_points}} punti. </li>
                    <li> Evita le rocce: ogni collisione ti costerà {{$collide_rock}} punti. </li>
                    <li> Distruggi le rocce: per ogni roccia distrutta guadagnerai {{$fire_rock_success}} punti. </li>
                    <li> Rifornisci l'astronave: ogni volta che fai rifornimento in tempo (quando l'indicatore è solo nella sezione rossa), guadagnerai {{$fill_fuel}} punti. </li>
                  </ul>
                </div>
                <br />
                <div style="text-align:left; margin-left:20%;">
                  <strong>Promemoria chiave: <br /></strong>
                  <ul>
                    <li> Frecce - per navigare l'astronave. </li>
                    <li> F – per sparare missili. </li>
                    <li> C – per visualizzare l'indicatore del carburante. </li>
                    <li> Barra spaziatrice - per fare rifornimento. </li>
                  </ul>
                </div>
                <br /><br />
                Ora puoi cominciare una sessione di pratica completa.<br /><br />
                Premi <strong> "Inizia" </strong> per iniziare la sessione di pratica.<br /><br />

          	</div>
            <a href="game" class="button is-primary mt-3"> Inizia </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
