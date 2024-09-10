@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <h1>
                {{ __('instruction6.instructions') }}
              </h1>

              <div>
                <p>
                  {{ __('instruction6.text1') }} <br /><br />
                  {{ __('instruction6.text2') }} <br /><br />
                </p>
          	</div>
            <a href="game2" class="button is-primary mt-3"> {{ __('instruction6.start') }} </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
