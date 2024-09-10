@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <h1>
              	Anweisungen
              </h1>

              <div>

                Sehr gut! Bedenken Sie, dass Ihr Raumschiff ebenfalls Treibstoff benötigt. <br /> <br />

                Sie können die Tankanzeige durch Drücken der "C"-Taste anzeigen. <br /> <br />

                Sobald sich die Tankanzeige im roten Bereich befindet, können Sie Treibstoff nachtanken indem Sie die Leertaste (Space) drücken. Wenn Sie zur richtigen Zeit tanken, erhalten Sie {{$fill_fuel}} Punkte. <br /> <br />

                Wenn Sie vergessen aufzutanken, wird der Tank zwar automatisch aufgefüllt, aber Sie erhalten keine Punkte. <br /> <br />

                Drücken Sie auf <strong> "Start" </strong> um sich mit der Tankanzeige Ihres Raumschiffes vertraut zu machen. <br /> <br />

              </div>
              <a href="entrainement3" class="button is-primary mt-5"> Start </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
