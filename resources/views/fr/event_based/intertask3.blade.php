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

                  L’exercice va commencer et vous allez voir plusieurs séries de symboles et de chiffres.<br /><br />
                  Pour rappel : votre tâche consiste à choisir le chiffre qui correspond au symbole du centre, encadré <span style="color:blue">en bleu </span>. Veuillez répondre le plus rapidement possible sans faire de fautes.<br /><br />
                  Cliquez sur « -> » pour commencer l’exercice.<br /><br />

                </p>
                <a href="intertask4" class="button is-primary mt-3"> -> </a>
          	</div>
      </div>
    @endcomponent
  @endcomponent
@endsection
