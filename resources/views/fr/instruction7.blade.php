@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            @if($redirection_link != null || $redirection_link != "")

                <script>
                    var url ="<?php echo $redirection_link . '?user_id=' . $user_id ?>";
                    window.location.replace(url);
                 </script>

            @endif

            <div class="content elements-centered">

              <h1>
              	Consigne
              </h1>

              <div>
                <p>
                  Merci d’avoir pris le temps de participer à cette enquête. <br /> <br />
                  Vos réponses ont été enregistrées.
                </p>
          	</div>
      </div>
    @endcomponent
  @endcomponent
@endsection
