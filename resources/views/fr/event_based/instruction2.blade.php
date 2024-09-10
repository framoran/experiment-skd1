@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <h1>
              	Consigne
              </h1>

              <div>
                Dans les pages suivantes, vous allez pouvoir vous familiariser avec le jeu.  <br> </br>

                Vous allez commencer par vous habituer au déplacement du vaisseau en utilisant les flèches haut, bas, droite et gauche.  <br> </br>

                Vous allez également vous entrainer à tirer en appuyant sur la touche "F".  <br> </br>

                Appuyez sur le bouton « commencer » pour vous familiariser avec les commandes du vaisseau.  <br> </br>

              </div>
              <a href="entrainement1" class="button is-primary mt-5"> Commencer </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
