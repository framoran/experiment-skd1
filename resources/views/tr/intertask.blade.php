@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <h1>
                {{ __('intertask.instructions') }}<br><br>
              </h1>

              <div>
                <p>
                  {{ __('intertask.text1') }}<br><br>
                  {{ __('intertask.text2') }}<br><br>
                  {{ __('intertask.text3') }}<br><br>


                </p>
                <a href="intertask2" class="button is-primary mt-3"> {{ __('intertask.start') }} </a>
          	</div>
      </div>
    @endcomponent
  @endcomponent
@endsection
