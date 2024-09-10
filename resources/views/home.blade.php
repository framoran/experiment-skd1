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
              <div class="table-wrapper">
                @if (Auth::user()->admin == 1)
                  <div style="margin:auto; text-align:center;">
                    <a href="home?q=admin" class="button is-info mt-3">Manage Users</a>
                    <a href="home?q=experiments" class="button is-primary mt-3">Your Experiments</a>
                  </div>
                  @if (isset($_GET['q']) && $_GET['q']=='admin')

                    <h1> Existing users </h1>
                    <a href="new_users" class="button is-primary mt-3">

                      <span class="icon-text has-text-info">
                        <span class="icon">
                          <i class="fas fa-plus-square"></i>
                        </span>
                        <span>Create new user</span>
                      </span>
                    </a>
                    <table class="table mt-5">
                      <thead>
                        <tr>
                          <th>Name</abbr></th>
                          <th>Email</th>
                          <th>Institution</th>
                          <th>Date of registration</th>
                          <th>Role</th>
                          <th>Validation state</th>
                          @if ( Auth::user()->superadmin == 1)
                            <th>Action Role</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($experiment_users as $data)
                          <tr>
                            <th>
                              {{ $data->name }}
                            </th>
                            <th>
                              {{ $data->email }}
                            </th>
                            <th>
                              {{ $data->institution }}
                            </th>
                            <th>
                              {{ $data->created_at }}
                            </th>
                            <th>
                              @if($data->admin)
                                Admin
                              @else
                                Normal user
                              @endif
                            </th>
                            <th>
                              <form action="/validate" method="post">
                                @csrf
                                @if ($data->validate == 1)
                                  <input type="hidden" name="user_id" value="{{$data->id}}">
                                  <button href="/validate" class="button is-danger" type="submit">Invalidate</button>
                                @else
                                  <input type="hidden" name="user_id" value="{{$data->id}}">
                                  <button href="/validate" class="button is-primary" type="submit">Validate</button>
                                @endif

                              </form>
                            </th>
                            <th>
                              @if (Auth::user()->superadmin)
                                <form action="/validate_admin" method="post">
                                  @csrf
                                  @if ($data->admin == 1)
                                    <input type="hidden" name="user_id" value="{{$data->id}}">
                                    <button href="/validate_admin" class="button is-danger" type="submit">Reverse Admin</button>
                                  @else
                                    <input type="hidden" name="user_id" value="{{$data->id}}">
                                    <button href="/validate_admin" class="button is-primary" type="submit">Render Admin</button>
                                  @endif

                                </form>
                              @endif
                            </th>

                          </tr>

                        @endforeach

                      </tbody>
                    </table>
                    @endif
                @endif
                @if(Auth::user()->validate == 1)
                 <!-- either user is admin and has selected the experiments button or user is non-admin !-->
                  @if ( (Auth::user()->admin == true && (isset($_GET['q']) && $_GET['q']=='experiments')) || Auth::user()->admin == false )
                    <div class="mt-5">
                      <h1>
                          Your Experiments
                      </h2>

                    </div>

                    <a href="new" class="button is-primary mt-3">

                      <span class="icon-text has-text-info">
                        <span class="icon">
                          <i class="fas fa-plus-square"></i>
                        </span>
                        <span>Experiment</span>
                      </span>
                    </a>

                    <button id="lang" class="button is-link mt-3">
                      Demo
                    </button>

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
                          <th>Type of Experiment</th>
                          <th>Redirection link</th>
                          <th>Settings</th>
                          <th>Created at</th>
                          <th>Edit link</th>
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
                            <a href="{{ ($data->link) }}" target='blank'>https://cruiser.lives-nccr.ch/{{ ($data->link) }}</a>
                          </th>
                          <th>
                            {{ $data->lang }}
                          </th>

                          <th>
                            @if($data->experimentGroup == 1)
                                  1 - Experiment only
                            @elseif($data->experimentGroup == 2)
                                  2 - Experiment at the end of a previous task
                            @elseif($data->experimentGroup == 1)
                                  3 - Experiment embedded between two tasks
                            @else
                                  4 - Experiment at the start of second group of tasks
                            @endif
                          </th>

                          <th>
                            <span contenteditable="true" id="redirectionLink{{ $data->id }}">{{ $data->first_link }}</span>
                          </th>

                          <th>
                            <a href="/settings/edit/{{$data->id}}" class="button is-warning">Modify settings</button>
                          </th>

                          <th>
                            {{ $data->created_at }}
                          </th>

                          <th>
                            <button class="button is-success" onclick="saveChanges({{$data->id}})"> Save changes </button>
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
                  @endif

                @else

                <p>
                  Your account is being verified and will be soon validated !
                </p>

                @endif

              </div>

            </div>

            <div class="modal" id="modal">
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

            <div class="modal modal-lang" id="modal-lang">
              <div class="modal-background"></div>
              <div class="modal-card">
                <header class="modal-card-head">
                  <p class="modal-card-title">Choose the language</p>
                  <button class="delete" aria-label="close"></button>
                </header>
                <div class="modal-card-body">

                    <a href="instruction1" class="button is-primary mt-1" target="blank"> French </a>

                    <a href="/de/instruction1" class="button is-primary mt-1" target="blank"> German </a>

                    <a href="/en/instruction1" class="button is-primary mt-1" target="blank"> English </a>

                    <a href="/it/instruction1" class="button is-primary mt-1" target="blank"> Italian </a>

                    <a href="/nl/instruction1" class="button is-primary mt-1" target="blank"> Dutch </a>

                    <a href="/fi/instruction1" class="button is-primary mt-1" target="blank"> Finnish </a>

                    <a href="/zh/instruction1" class="button is-primary mt-1" target="blank"> Chinese </a>

                    <a href="/fa/instruction1" class="button is-primary mt-1" target="blank"> Persian </a>

                    <a href="/tr/instruction1" class="button is-primary mt-1" target="blank"> Turkish </a>

                </div>
              </div>
            </div>
        @endcomponent
    @endcomponent
@endsection
