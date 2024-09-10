@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            @php

              setcookie('eui',  'none', time() + (86400 * 30), "/"); // 86400 = 1 day

              setcookie('data_recorded',  'none', time() + (86400 * 30), "/"); // 86400 = 1 day

              if (isset($_GET['Experiment_Id'])){

                setcookie('experimentId',  htmlspecialchars($_GET['Experiment_Id']), time() + (86400 * 30), "/"); // 86400 = 1 day

              }else{

                setcookie('experimentId',  'demo', time() + (86400 * 30), "/"); // 86400 = 1 day

              }

              if (isset($_GET['eui'])){

                setcookie('eui',  'S_'.htmlspecialchars($_GET['eui']), time() + (86400 * 30), "/"); // 86400 = 1 day

              }

            @endphp

            <div class="content elements-centered">

              <h1>
              	Anweisungen
              </h1>

              <div>

                Bei dieser Aufgabe ist es Ihr Ziel, so viele Punkte wie möglich zu sammeln.<br><br>

                Sie werden ein Raumschiff steuern, dessen Ziel es ist Sterne einzusammeln.<br><br>

                Für jeden eingesammelten Stern erhalten Sie {{$stars_points}}  Punkte.<br><br> 

                Um das Raumschiff zu steuern, können Sie die Pfeiltasten auf der Tastatur benutzen (oben, unten, links, rechts).<br><br>

                Vermeiden Sie Kollisionen mit Felsen. Wenn Ihr Schiff einen der Felsen berührt, verlieren Sie {{$collide_rock}} Punkte.<br><br>

                Versuchen Sie also den Felsen auszuweichen, indem Sie das Raumschiff darum herum steuern. Sie können die Felsen ebenfalls mit Raketen Ihres Raumschiffs zerstören.<br><br>

                Um Raketen abzufeuern, müssen Sie die Taste "F" drücken. Wenn Sie einen Felsen zerstören, erhalten Sie {{$fire_rock_success}} Punkte.<br><br>

                Bitte klicken Sie auf <strong>"Weiter"</strong> um mit der Anleitung fortzufahren.<br><br>

              </div>
              <a href="instruction2" class="button is-primary mt-5"> Weiter </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
