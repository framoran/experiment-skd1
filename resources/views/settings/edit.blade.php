@extends('layouts.app')

@section('content')
    @component('components.full-page-section')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            @if(Auth::user()->validate == 1)

            @if ($errors->any())
                <div class="notification is-danger">
                    <button class="delete"></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif

            <form action="{{ route('settings.create', ['id' => $experiment->id]) }}" method="post">
              @csrf
              
              <h2 class="title is-4">Details for experiment: {{$experiment->experiment}}</h2>

              <div class="field">
                <label class="label">Choose the speed of the game</label>
                <div class="control">
                  <div class="select">
                    <select name="vitesse">
                      <option value="1" {{ $experiment->vitesse == 1 ? 'selected' : '' }}>Slow</option>
                      <option value="2" {{ $experiment->vitesse == 2 ? 'selected' : '' }}>Middle</option>
                      <option value="3" {{ $experiment->vitesse == 3 ? 'selected' : '' }}>Fast</option>
                      <option value="4" {{ $experiment->vitesse == 4 ? 'selected' : '' }}>Very Fast</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="field">
                <label class="label">Choose the points when users will collect stars</label>
                <div class="control">
                  <input class="input" type="number" name="stars_points" min="0" max="500" value="{{$experiment->stars_points}}" placeholder="default: 30" required>
                </div>
              </div>

              @if ($experiment->lang == 'French' || $experiment->lang == 'English' or $experiment->lang == 'German')

              <div class="field">
                <label class="label">Choose if the task will be time-based or event based</label>
                <div class="control">
                  <div class="select">
                    <select name="event">
                      <option value="1" {{ $experiment->event == 1 ? 'selected' : '' }}>Time-Based</option>
                      <option value="2" {{ $experiment->event == 2 ? 'selected' : '' }}>Event-Based Focal</option>
                      <option value="3" {{ $experiment->event == 3 ? 'selected' : '' }}>Event-Based Non-Focal</option>
                    </select>
                  </div>
              </div>

              @endif

              <div class="field">
                <label class="label">Choose the points participants will lose in case of collision with rocks</label>
                <div class="control">
                  <input class="input" type="number" name="collision_rocks_points" min="0" max="500" value="{{$experiment->collision_rocks_points}}" placeholder="default: 100" required>
                </div>
              </div>

              <div class="field">
                <label class="label">Choose the points participants will get when they successfully fired at rocks</label>
                <div class="control">
                  <input class="input" type="number" name="fired_rocks_points" min="0" max="500" value="{{$experiment->fired_rocks_points}}" placeholder="default: 30" required>
                </div>
              </div>

              <div class="field">
                <label class="label">Choose the points participants will get when they successfully refueled</label>
                <div class="control">
                  <input class="input" type="number" name="refuel_points" min="0" max="2000" value="{{$experiment->refuel_points}}" placeholder="default: 300" required>
                </div>
              </div>

              <div class="field">
                <label class="label">Choose the time (in ms) between each event of the prospective memory (e.g., each time they need to refuel)</label>
                <div class="control">
                  <input class="input" type="number" name="event_time" min="30000" max="120000" value="{{$experiment->event_time}}" placeholder="default: 60000 (1 minute)" required>
                </div>
              </div>

              @if ($experiment->lang == 'French' || $experiment->lang == 'English' or $experiment->lang == 'German')
              
                <div class="field">
                  <label class="label">Choose if you want participants to estimate their performance before the game</label>
                  <div class="control">
                    <div class="select">
                      <select name="prediction">
                        <option value="0" {{ $experiment->prediction == 0 ? 'selected' : '' }}>No</option>
                        <option value="1" {{ $experiment->prediction == 1 ? 'selected' : '' }}>Yes</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="field">
                <label class="label">Choose if you want participants to estimate their future performance after the game</label>
                <div class="control">
                    <div class="select">
                      <select name="postdiction">
                        <option value="0" {{ $experiment->postdiction == 0 ? 'selected' : '' }}>No</option>
                        <option value="1" {{ $experiment->postdiction == 1 ? 'selected' : '' }}>Yes</option>
                      </select>
                    </div>
                  </div>
                </div>

              @endif

              @if ($experiment->experimentGroup == 3 || $experiment->experimentGroup == 4)

              <div class="field" id="redirectionLink">
                  <label class="label">Redirection link
                      <button type="button" class="button is-ghost" style="margin-top: -7.5px;" id="btn2">
                          <i class="fa fa-question" style="margin-right: 7.5px;"></i>&nbsp; need help
                      </button>
                  </label>
                  <div class="control">
                      <input class="input" name="first_link" type="text" value="{{$experiment->first_link}}">
                  </div>
              </div>

              @endif

              <div class="field is-grouped">
                <div class="control">
                  <button class="button is-success" type="submit">Submit</button>
                </div>
              </div>
            </form>

            <div class="field is-grouped mt-5">
              <div class="control">
                <a href="/home?q=experiments" class="button is-dark" type="submit">Back to home</a>
              </div>
            </div>

            @else

              <p class="notification is-warning">
                Your account is being verified and will be soon validated!
              </p>

            @endif

        @endcomponent
    @endcomponent
@endsection
