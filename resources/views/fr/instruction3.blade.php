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
                  Très bien ! Votre vaisseau aura également besoin de carburant. <br /><br />

                  Vous pouvez afficher la jauge du niveau de carburant en appuyant sur la touche "C". <br /><br />
                  Dès que la jauge du niveau de carburant est dans le secteur rouge, vous pouvez faire le plein en appuyant sur "barre espace". Si vous remplissez le réservoir au bon moment, cela vous fera gagner {{$fill_fuel}} points. <br /><br />

                  Si vous oubliez de faire le plein de carburant, le réservoir se remplit automatiquement mais vous ne recevez aucun point. <br /><br />

                  Appuyez sur le bouton « commencer » pour vous familiariser avec le niveau de carburant de votre vaisseau. <br /><br />

                </p>

                <a href="entrainement3" class="button is-primary mt-5"> Commencer </a>

          	</div>
      </div>
    @endcomponent
  @endcomponent
@endsection
