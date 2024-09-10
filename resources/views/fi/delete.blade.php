@extends('layouts.app')

@section('content')
    @component('components.full-page-section')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            @if(Auth::user()->validate == 1)

            @else

              <p>
                Your account is being verified and will be soon validated !
              </p>

            @endif

        @endcomponent
    @endcomponent
@endsection
