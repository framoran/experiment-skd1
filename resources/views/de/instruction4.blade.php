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

                Sehr gut. Da Sie nun mit den verschiedenen Elementen des Spiels vertraut sind, können Sie das komplette Training zur Übung durchspielen. <br /> <br />

                <div style="text-align:left; margin-left:20%;">
                  <strong>Zusammenfassung der Ziele: <br /></strong>
                  <ul>
                    <li> Versuchen Sie Sterne einzusammeln – für jeden Stern erhalten Sie {{$stars_points}} Punkte. </li>
                    <li> Versuchen Sie den Felsen auszuweichen – für jede Kollision verlieren Sie {{$collide_rock}} Punkte. </li>
                    <li> Für jeden zerstörten Felsen erhalten Sie {{$fire_rock_success}} Punkte. </li> 
                    <li> Versuchen Sie Treibstoff aufzutanken – für jedes Mal Tanken (wenn die Treibstoffanzeige im roten Bereich ist) erhalten Sie {{$fill_fuel}} Punkte. </li>
                  </ul>
                </div>
                <br />
                <div style="text-align:left; margin-left:20%;">
                  <strong>Wichtige Erinnerung: <br /></strong>
                  <ul>
                    <li> Pfeiltasten- das Raumschiff navigieren. </li>
                    <li> F - Raketen abfeuern. </li>
                    <li> C - Tankanzeige anzeigen. </li>
                    <li> Leertaste - Treibstoff auftanken. </li>
                  </ul>
                </div>
                <br /><br />
                Nun können Sie das Training durchführen. <br /><br />
                Drücken Sie auf <strong> "Start" </strong>, um das Training zu beginnen.<br /><br />
          	</div>
            <a href="game" class="button is-primary mt-3"> Start </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
