@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <h1>
                Instructie
              </h1>

              <div>

                Heel goed. Nu u geoefend heeft met de verschillende elementen van het spel, kunt u oefenen met een volledig voorbeeld van het spel. <br /><br/>

                <div style="text-align:left; margin-left:20%;">
                  <strong>Samenvatting van de doelen: </strong><br />

                  <ul>
                    <li>Verzamel sterren – Voor iedere ster verdient u {{$stars_points}} punten.</li>
                    <li>Vermijd stenen – iedere botsing kost u {{$collide_rock}} punten.</li>
                    <li>Vernietig stenen – voor iedere steen die u vernietigt, verdient u {{$fire_rock_success}} punten.</li>
                    <li>De brandstoftank bijvullen – iedere keer dat u tijdig bijvult (alleen wanneer de brandstofmeter op het rode niveau is), verdient u {{$fill_fuel}} punten.</li>
                  </ul>

                  <ul>
                    <strong>Toetsenbord herinnering:</strong><br />
                    <li>Pijltjes – om het ruimteschip te navigeren.</li>
                    <li>F – om raketten af te voeren.</li>
                    <li>C – om de brandstofmeter weer te geven.</li>
                    <li>Spatiebalk – om de brandstoftank bij te vullen.</li>
                  </ul>
                    <p>U kunt nu de volledige oefensessie volbrengen.</p>
                    <p> <strong>Druk op "Start" om met de oefensessie te beginnen.</strong></p>
                </div>
                <br /><br />
          	</div>
            <a href="game" class="button is-primary mt-3"> Start </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
