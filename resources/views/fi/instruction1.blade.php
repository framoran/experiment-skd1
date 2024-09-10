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

                {{ __('instruction1.instructions') }}

              </h1>

              <div>

                {{ __('instruction1.text1') }}<br><br>

                {{ __('instruction1.text2') }}<br><br>

                {{ __('instruction1.text3', ['stars_points' => $stars_points]) }}<br><br>

                {{ __('instruction1.text4') }}<br><br>

                {{ __('instruction1.text5', ['collide_rock' => $collide_rock]) }} <br><br>

                {{ __('instruction1.text6') }}<br><br>

                {{ __('instruction1.text7', ['fire_rock_success' => $fire_rock_success]) }}<br><br>

                {{ __('instruction1.text8') }}<br><br>

              </div>
              <a href="instruction2" class="button is-primary mt-5"> {{ __('instruction1.continue') }} </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
