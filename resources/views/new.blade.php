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

                    <div class="field">
                        <label id="experimentLangLabel" class="label">Language of experiment</label>
                        <div class="control">
                            <div class="select">
                                <select name="experimentLang" id="experimentLang">
                                    <option value="">-- Select --</option>
                                    <option value="fr">French</option>
                                    <option value="de">German</option>
                                    <option value="en">English</option>
                                    <option value="it">Italian</option>
                                    <option value="fi">Finnish</option>
                                    <option value="nl">Dutch</option>
                                    <option value="zh">Chinese</option>
                                    <option value="fa">Persian</option>
                                    <option value="tr">Turkish</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="eventOptions" class="field" style="display: none;">
                        <label id="event" class="label">Type of task</label>
                        <div class="control">
                            <div class="select">
                                <select name="event">
                                    <option value="1">Time-Based</option>
                                    <option value="2">Event-Based Focal</option>
                                    <option value="3">Event-Based Non-Focal</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="languageOptions" style="display: none;">
                        <div class="field">
                            <label class="label">Choose if you want participants to estimate their performance before the game</label>
                            <div class="control">
                                <div class="select">
                                    <select name="prediction">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Choose if you want participants to estimate their future performance after the game</label>
                            <div class="control">
                                <div class="select">
                                    <select name="postdiction">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Type of experiment 
                            <button type="button" class="button is-ghost" style="margin-top: -7.5px;" id="btn1">
                                <i class="fa fa-question"></i>&nbsp; need help
                            </button>
                        </label>
                        <div class="control">
                            <div class="select">
                                <select name="experimentGroup" id="experimentGroupSelect">
                                    <option value="">-- Select --</option>
                                    <option value="1">1 - Experiment only</option>
                                    <option value="2">2 - Experiment at the end of a previous task</option>
                                    <option value="3">3 - Experiment embedded between two tasks</option>
                                    <option value="4">4 - Experiment at the start of second group of tasks</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h2>Details</h2>            

                    <div class="field" id="redirectionLink">
                        <label class="label">Redirection link
                            <button type="button" class="button is-ghost" style="margin-top: -7.5px;" id="btn2">
                                <i class="fa fa-question" style="margin-right: 7.5px;"></i>&nbsp; need help
                            </button>
                        </label>
                        <div class="control">
                            <input class="input" name="redirectionLink" type="text" placeholder="e.g., Experiment_1">
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

                <div class="modal help-1" id="help-1">
                    <div class="modal-background"></div>
                    <div class="modal-card">
                        <header class="modal-card-head">
                            <p class="modal-card-title">Instructions</p>
                            <button class="delete" aria-label="close"></button>
                        </header>
                        <div class="modal-card-body">
                            <p>
                                Under Type of Experiment, you can choose whether you want to use the GSC alone or coupled with other experiments. If you want to pair the GSC with other experiments, you can choose how you want to embed the GSC in other online tasks. If you want participants to start with the GSC and then be directed to another link, you should select "Experiment at the beginning of a second task group". If you want users to start with a group of tasks and then be redirected to the GSC at the end, you should select "Experiment at the end of a previous group of tasks". If you want the GSC to appear between two groups of tasks, you should select "Experiment embedded between two groups of tasks".
                            </p>
                        </div>
                    </div>
                </div>

                <div class="modal help-2" id="help-2">
                    <div class="modal-background"></div>
                    <div class="modal-card">
                        <header class="modal-card-head">
                            <p class="modal-card-title">Instructions</p>
                            <button class="delete" aria-label="close"></button>
                        </header>
                        <div class="modal-card-body">
                            <p>
                                Include a URL that participants will be redirected to when they finish the Geneva Space Cruiser.
                            </p>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#redirectionLink').hide();
                        $('#languageOptions').hide();

                        $("#experimentGroupSelect").change(function() {
                            var selectedOption = $(this).find("option:selected");
                            var optionValue = selectedOption.attr("value");

                            if (optionValue == 3 || optionValue == 4) {
                                $('#redirectionLink').show();
                            } else {
                                $('#redirectionLink').hide();
                            }
                        }).change();

                        $("#experimentLang").change(function() {
                            var selectedLang = $(this).val();
                            console.log('bello')
                            if (selectedLang == 'fr' || selectedLang == 'de' || selectedLang == 'en') {
                                $('#languageOptions').show();
                                $('#eventOptions').show();
                            } else {
                                $('#languageOptions').hide();
                                $('#eventOptions').hide();
                            }
                        }).change();
                    });
                </script>

            @else

                <p>
                    Your account is being verified and will be soon validated!
                </p>

            @endif

        @endcomponent
    @endcomponent
@endsection