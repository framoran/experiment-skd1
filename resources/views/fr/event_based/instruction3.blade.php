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

                  Des comètes <img src="/images/comete.png" width="50px" style="vertical-align: middle;" /> vont apparaître. Ces comètes ne peuvent pas être récoltées ni détruites avec les fusées. Par contre, votre vaisseau peut capter l’énergie des comètes pour faire le plein de carburant. <br /><br /> 
                 

                  Dès que vous voyez une comète apparaître, appuyez sur “Barre Espace”. Si vous remplissez le réservoir quand la comète est présente, cela vous fera gagner {{$fill_fuel}} points. <br /><br />


                  Si vous oubliez de faire le plein de carburant, le réservoir se remplit automatiquement mais vous ne recevez aucun point. <br /><br />


                  Appuyez sur le bouton « commencer » pour vous familiariser avec la recharge en carburant en captant l’énergie d’une comète. <br /><br />
                </p>

                <a href="entrainement3" class="button is-primary mt-5"> Commencer </a>

          	</div>
      </div>
    @endcomponent
  @endcomponent
@endsection
