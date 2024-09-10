@extends('layouts.game_fa')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <h1>
              {{ __('intertask3.instructions') }}
              </h1>

              <div>
                <p>
                  {{ __('intertask3.text1') }} <br /><br />
                  {{ __('intertask3.text2') }} <br /><br />
                  {{ __('intertask3.text3') }} <br /><br />
                </p>
                <a href="intertask4" class="button is-primary mt-3"> -> </a>
          	</div>
      </div>
    @endcomponent
  @endcomponent
@endsection
