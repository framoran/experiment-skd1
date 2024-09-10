@extends('layouts.app')

@push('bottom')
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endpush

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content">

              <div>
                @if (Auth::user()->admin == 1)
                  <h1> Users </h1>
                  <table class="table mt-5">
                    <thead>
                      <tr>
                        <th>Name</abbr></th>
                        <th>Email</th>
                        <th>Date of registration</th>
                        <th>Validation state</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($experiment_users as $data)
                        @if ($data->admin != 1)
                          <tr>
                            <th>
                              {{ $data->name }}
                            </th>
                            <th>
                              {{ $data->email }}
                            </th>
                            <th>
                              {{ $data->created_at }}
                            </th>
                            <th>

                              <form action="/validate" method="post">
                                @csrf
                                @if ($data->validate == 1)
                                  <input type="hidden" name="user_id" value="{{$data->id}}">
                                  <button href="/validate" class="button is-danger" type="submit">Unvalidate</button>
                                @else
                                  <input type="hidden" name="user_id" value="{{$data->id}}">
                                  <button href="/validate" class="button is-primary" type="submit">Validate</button>
                                @endif

                              </form>

                            </th>

                          </tr>

                        @endif

                      @endforeach

                    </tbody>
                  </table>

                @elseif(Auth::user()->validate == 1)

                  <div>

                    <p>
                        Welcome to <b>the cruiser</b>
                    </p>

                  </div>


                  <a href="new" class="button is-primary mt-3">

                    <span class="icon-text has-text-info">
                      <span class="icon">
                        <i class="fas fa-plus-square"></i>
                      </span>
                      <span>Experiment</span>
                    </span>


                  </a>

                  <a href="/instruction1" class="button is-link mt-3">
                    Demo
                  </a>

                  <button id="showModal" class="button  mt-3">

                    <span class="icon-text has-text-info">
                      <span class="icon">
                        <i class="fas fa-info-circle"></i>
                      </span>
                      <span>Contact</span>
                    </span>

                  </button>

                  <!-- <button href="lang" class="button mt-3">

                    <span class="icon-text has-text-info">
                      <span class="icon">
                        <i class="fas fa-language"></i>
                      </span>
                      <span>Language</span>
                    </span>

                  </button> -->

                  <table class="table mt-5">
                    <thead>
                      <tr>
                        <th>Experiment Name</abbr></th>
                        <th>Link</th>
                        <th>Language</th>
                        <th>Created at</th>
                        <th>Delete</th>
                        <th>Data</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($experiment_data as $data)
                      <tr>
                        <th>
                          {{ $data->experiment }}
                        </th>
                        <th>
                          <a href="{{ ($data->link) }}" target='blank'>{{ ($data->link) }}</a>
                        </th>
                        <th>
                          {{ $data->lang }}
                        </th>
                        <th>
                          {{ $data->created_at }}
                        </th>

                        <th>
                          <button class="button is-danger link" value="{{ $data->id }}"> Delete </button>
                        </th>

                        <th>

                          <span data-href="/export?experiment={{ $data->id }}" id="export" class="button is-primary" onclick="exportTasks(event.target);">Export</span>

                        </th>

                      </tr>

                      @endforeach

                    </tbody>
                  </table>

                @else

                <p>
                  Your account is being verified and will be soon validated !
                </p>

                @endif

              </div>

            </div>

            <div class="modal">
              <div class="modal-background"></div>
              <div class="modal-card">
                <header class="modal-card-head">
                  <p class="modal-card-title">Contact us</p>
                  <button class="delete" aria-label="close"></button>
                </header>
                <div class="modal-card-body">

                    <h4> <i class="fas fa-user has-text-success"></i> {{ $name }} {{ $lastName }}</h4>

                    <h4> <i class="fas fa-envelope has-text-success"></i> {{ $email }} </h4>

                    <p> <i class="fas fa-map-marker-alt has-text-success"></i> <em>CIGEV <br />
                      Bd du Pont-d'Arve 28, <br />
                      1205 Geneva</em>
                    </p>

                </div>
              </div>
            </div>
        @endcomponent
    @endcomponent
@endsection
