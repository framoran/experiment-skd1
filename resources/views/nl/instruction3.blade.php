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
                <p>

                  Heel goed! Vervolgens zal uw ruimteschip ook brandstof nodig hebben. <br /><br />

                  U kunt de brandstofmeter weergeven door op de “C” toets te drukken.<br /><br />

                  Zodra de brandstofmeter in het rood staat, kunt u de tank van uw ruimteschip vullen door de spatiebalk op uw toetsenbord in te drukken. Als u de tank of het juiste moment bijvult, verdient u {{$fill_fuel}} punten. <br /><br />

                  Als u vergeet om de brandstoftank bij te vullen, zal deze zichzelf automatisch bijvullen, u zult dan echter geen punten verdienen.<br /><br />

                  Druk op "Start" om te oefenen met het brandstofniveau van uw ruimteschip. <br /><br />

                </p>

                <a href="entrainement3" class="button is-primary mt-5"> Start </a>

          	</div>
      </div>
    @endcomponent
  @endcomponent
@endsection
