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
              	Consigne
              </h1>

              <div>
                Dans cette expérience, il vous sera demandé de récolter le plus de points possible. <br><br>

                Vous serez aux commandes d’un vaisseau qui a pour but de récolter des étoiles. <br><br>

                Chaque étoile récoltée vous fera gagner {{$stars_points}} points. <br><br>

                Pour vous déplacer avec le vaisseau, vous pouvez utiliser les flèches du clavier (haut, bas, gauche, droite). <br><br>

                Il vous faudra également éviter les rochers. Si votre vaisseau touche un des rochers, cela vous fera perdre {{$collide_rock}} points. <br><br>

                Essayez donc d’éviter les rochers en naviguant avec le vaisseau. Vous pouvez également détruire ces rochers avec les missiles de votre vaisseau. <br><br>

                Pour tirer un missile, appuyez sur la touche "F". Si vous détruisez un rocher, cela vous fera gagner {{$fire_rock_success}} points. <br><br>

                Cliquez sur « continuer » pour lire la suite des instructions. <br><br>

              </div>
              <a href="instruction2" class="button is-primary mt-5"> Continuer </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
