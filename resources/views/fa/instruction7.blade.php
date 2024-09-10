@extends('layouts.game_fa')

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
                {{ __('instruction7.instructions') }}
              </h1>

              <div>
                <p>
                  {{ __('instruction7.text1') }}<br /> <br />
                  {{ __('instruction7.text2') }}<br /> <br />
                </p>
          	</div>
      </div>
    @endcomponent
  @endcomponent
@endsection
