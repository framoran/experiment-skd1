@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <h1>
              {{ __('instruction2.instructions') }}
              </h1>

              <div>
                {{ __('instruction2.text1') }}<br /> <br />

                {{ __('instruction2.text2') }} <br /><br />

                {{ __('instruction2.text3') }}<br /><br />

                {{ __('instruction2.text4') }}<br /><br />

              </div>
              <a href="entrainement1" class="button is-primary mt-5"> {{ __('instruction2.start') }} </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
