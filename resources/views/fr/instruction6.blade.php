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
                  Maintenant, vous allez devoir piloter le vaisseau comme vous l'avez fait lors de l'entrainement.<br /><br />
                  Appuyez sur "commencer" pour démarrer.<br /><br />
                </p>
          	</div>
            <a href="game2" class="button is-primary mt-3"> Commencer </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
