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
              	Instructie
              </h1>

              <div>

                In deze taak, zal het doel zijn om zo veel mogelijk punten te verdienen.<br><br>

                Om dit te bereiken zult u een ruimteschip navigeren met het doel om sterren te verzamelen.<br><br>

                Voor elke ster die u verzamelt, verdient u {{$stars_points}} punten.<br><br>

                U kunt het schip navigeren door de toetsen met pijltjes op het toetsenbord te gebruiken (omhoog, omlaag, links, rechts toetsen). <br><br>

                U zult ook obstakels in de vorm van stenen moeten ontwijken. Als u ruimteschip in botsing komt met een van de stenen verliest u {{$collide_rock}} punten. <br><br>

                Probeer daarom de stenen de vermijden door het ruimteschip te navigeren, U kunt de stenen ook vernietigen door raketten vanuit uw ruimteschip af te vuren.<br><br>

                Om raketten af te vuren, druk op de “F” toets. Als u een steen vernietigt zult u {{$fire_rock_success}} punten verdienen.<br><br>

                Klik op "Verder" om verder te gaan met de instructies.<br><br>

              </div>
              <a href="instruction2" class="button is-primary mt-5"> Verder </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
