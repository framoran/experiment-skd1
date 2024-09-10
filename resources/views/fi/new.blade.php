@extends('layouts.app')

@section('content')
    @component('components.full-page-section')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            @if(Auth::user()->validate == 1)

            @if ($errors->any())
                <div class="has-text-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif

            <form action="create" method="post">
              @csrf
              <div class="field">
                <label id="experimentName" class="label">Name of Experiment</label>
                <div class="control">
                  <input class="input" name="experimentName" type="text" placeholder="e.g., Experiment_1">
                </div>
              </div>

              <!-- <div class="field">
                <label id="experimentType" class="label">Type of experiment</label>
                <div class="control">
                  <div class="select">
                    <select name="experimentType">
                      <option>Basic</option>
                      <option>Laboratory</option>
                    </select>
                  </div>
                </div>
              </div> -->

              <!-- <div class="field">
                <label id="experimentCogTask" class="label">Type of task</label>
                <div class="control">
                  <div class="select">
                    <select name="experimentCogTask">
                      <option>Matrice</option>
                      <option>Other</option>
                    </select>
                  </div>
                </div>
              </div> -->

              <div class="field">
                <label id="experimentLang" class="label">Language of experiment</label>
                <div class="control">
                  <div class="select">
                    <select name="experimentLang">
                      <option>-- Select --</option>
                      <option>French</option>
                      <option>English</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="field is-grouped">
                <div class="control">
                  <button class="button is-link">Submit</button>
                </div>
                <div class="control">
                  <a href="home" class="button is-link is-light">Cancel</a>
                </div>
              </div>
            </form>

            @else

              <p>
                Your account is being verified and will be soon validated !
              </p>

            @endif

        @endcomponent
    @endcomponent
@endsection
