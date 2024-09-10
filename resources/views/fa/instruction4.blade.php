@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <h1>

                {{ __('instruction4.instructions') }}

              </h1>

              <div>

                {{ __('instruction4.text1') }} <br/><br/>

                <div style="text-align:left; margin-left:20%;">
                  <strong> {{ __('instruction4.text2') }} <br /></strong>
                  <ul>
                    <li> {{ __('instruction4.text3', ['stars_points' => $stars_points]) }} </li>
                    <li> {{ __('instruction4.text4', ['collide_rock' => $collide_rock]) }} </li>
                    <li> {{ __('instruction4.text5', ['fire_rock_success' => $fire_rock_success]) }} </li>
                    <li> {{ __('instruction4.text6', ['fill_fuel' => $fill_fuel]) }} </li>
                  </ul>
                </div>
                <br />
                <div style="text-align:left; margin-left:20%;">
                  <strong>{{ __('instruction4.text7') }} <br /></strong>
                  <ul>
                    <li> {{ __('instruction4.text8') }} </li>
                    <li> {{ __('instruction4.text9') }} </li>
                    <li> {{ __('instruction4.text10') }} </li>
                    <li> {{ __('instruction4.text11') }} </li>
                  </ul>
                </div>
                <br /><br />
                {{ __('instruction4.text12') }}<br /><br />

                {{ __('instruction4.text13') }}<br /><br />

          	</div>
            <a href="game" class="button is-primary mt-3"> {{ __('instruction4.start') }} </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
