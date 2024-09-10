@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <h1>
                {{ __('instruction3.instructions') }}
              </h1>

              <div>

              {{ __('instruction3.text1') }}<br><br>

              {{ __('instruction3.text2') }}<br><br>

              {{ __('instruction3.text3', ['fill_fuel' => $fill_fuel]) }}<br><br>

              {{ __('instruction3.text4') }}<br><br>

              {{ __('instruction3.text5') }} <br><br>

              </div>
              <a href="entrainement3" class="button is-primary mt-5"> {{ __('instruction3.start') }} </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
