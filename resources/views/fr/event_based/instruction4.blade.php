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

                Très bien. Maintenant que vous avez été familiarisé avec les différents éléments du jeu, vous allez pouvoir vous entrainer avec un exemple complet du jeu. <br /><br/>
                <div style="text-align:left; margin-left:20%;">
                  <strong>Résumé des buts : </strong><br />

                  <ul>
                    <li>Récolter les étoiles – chacune vous fera gagner {{$stars_points}} points.</li>
                    <li>Éviter les rochers – chaque collision vous fera perdre {{$collide_rock}} points.</li>
                    <li>Détruire les rochers – chaque rocher détruit vous fera gagner {{$fire_rock_success}} points.</li>
                    <li>Faire le plein de carburant – chaque plein réalisé à temps (uniquement quand vous voyez une comète) vous fera gagner {{$fill_fuel}} points.
                  </ul>
                  
                  <strong>Rappel des touches :</strong><br />

                  <ul>
                    <li>Flèches – piloter le vaisseau.</li>
                    <li>F – tirer des missiles.</li>
                    <li>Barre Espace – faire le plein de carburant.</li>
                  </ul>
                    <p>Vous pouvez à présent effectuer un entraînement.</p>
                    <p> <strong>Appuyez sur le bouton « commencer » pour débuter l'entraînement. </strong></p>
                </div>
                <br /><br />
          	</div>
            <a href="game" class="button is-primary mt-3"> Commencer </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
