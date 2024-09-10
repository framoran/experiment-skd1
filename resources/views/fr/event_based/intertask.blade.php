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
                <p>
                  Dans l’exercice suivant, nous allons vous présenter des séries de 9 symboles. Chaque symbole sera accompagné d’un chiffre.  <br /> <br />
                  Au-dessus de ces 9 symboles et chiffres, vous verrez un seul symbole placé au centre de l’écran. Il sera encadré <span style="color:blue">en bleu </span>.  <br /> <br />
                  Votre tâche consistera à choisir le plus rapidement possible le chiffre qui accompagne le symbole du centre. <br /> <br />
                </p>
                <a href="intertask2" class="button is-primary mt-3"> Continuer </a>
          	</div>
      </div>
    @endcomponent
  @endcomponent
@endsection
