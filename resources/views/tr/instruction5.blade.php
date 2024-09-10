@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <h1>
                {{ __('instruction5.instructions') }}
              </h1>

              <div>
                <p>
                  {{ __('instruction5.text1') }}  <br/> <br/>
                  {{ __('instruction5.text2') }}  <br/> <br/>
                  {{ __('instruction5.text3') }}  <br/> <br/>
                </p>
          	</div>
            <a href="intertask" class="button is-primary mt-3"> {{ __('instruction5.start') }} </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
