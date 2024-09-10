@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            @php

              setcookie('eui',  'none', time() + (86400 * 30), "/"); // 86400 = 1 day

              setcookie('data_recorded',  'none', time() + (86400 * 30), "/"); // 86400 = 1 day

              if (isset($_GET['Experiment_Id'])){

                setcookie('experimentId',  htmlspecialchars($_GET['Experiment_Id']), time() + (86400 * 30), "/"); // 86400 = 1 day

              }else{

                setcookie('experimentId',  'demo', time() + (86400 * 30), "/"); // 86400 = 1 day

              }

              if (isset($_GET['eui'])){

                setcookie('eui',  'S_'.htmlspecialchars($_GET['eui']), time() + (86400 * 30), "/"); // 86400 = 1 day

              }

            @endphp

            <div class="content elements-centered">

              <h1>
              	Istruzioni
              </h1>

              <div>

                In questo compito, il tuo obiettivo sarà quello di guadagnare più punti possibile.<br><br>

                Per farlo, guiderai un'astronave il cui scopo è raccogliere stelle.<br><br>

                Per ogni stella che raccogli, guadagnerai {{$stars_points}} punti.<br><br>

                Puoi guidare l'astronave usando i tasti freccia sulla tastiera (tasti su, giù, sinistra, destra).<br><br>

                Dovrai anche evitare le rocce. Se la tua astronave si scontra con una roccia, perderai {{$collide_rock}} punti.<br><br>

                Quindi, cerca di evitare le rocce manovrando l'astronave. Puoi anche distruggere le rocce sparando missili dalla tua astronave.<br><br>

                Per sparare missili, premi il tasto "F". Se distruggi una roccia, guadagnerai {{$fire_rock_success}} punti.<br><br>

                Clicca su <strong>"Continua" </strong> per procedere con le istruzioni.<br><br>

              </div>
              <a href="instruction2" class="button is-primary mt-5"> Continua </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
