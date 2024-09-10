@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <!-- Form styled with Bulma -->
            <form id="subjectForm" method="POST" action="{{ route('new_participant') }}" class="mt-5" style="max-width: 500px; margin: auto;">
                @csrf <!-- Add CSRF token for security -->

                <!-- Subject Number -->
                <div class="field">
                    <label class="label" for="subject_nb">Numéro de sujet Joueur 1</label>
                    <div class="control">
                        <input class="input" type="text" id="subject_nb" name="subject_nb" required />
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="subject_nb">Numéro de sujet Joueur12</label>
                    <div class="control">
                        <input class="input" type="text" id="subject_nb2" name="subject_nb" required />
                    </div>
                </div>

                <!-- Gender -->
                <div class="field mt-3">
                    <label class="label" for="gender">Genre Joueur 1</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select id="gender" name="gender">
                                <option value="1">Homme</option>
                                <option value="2">Femme</option>
                                <option value="3">Non-binaire</option>
                                <option value="4">Préfère ne pas répondre</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Gender -->
                <div class="field mt-3">
                    <label class="label" for="gender">Genre Joueur 2</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select id="gender2" name="gender">
                                <option value="1">Homme</option>
                                <option value="2">Femme</option>
                                <option value="3">Non-binaire</option>
                                <option value="4">Préfère ne pas répondre</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Age -->
                <div class="field mt-3">
                    <label class="label" for="age">Âge Joueur 1</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select id="age" name="age">
                                @for ($i = 1; $i <= 100; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Age -->
                <div class="field mt-3">
                    <label class="label" for="age">Âge Joueur 2</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select id="age2" name="age">
                                @for ($i = 1; $i <= 100; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Laterality -->
                <div class="field mt-3">
                    <label class="label" for="laterality">Latéralité manuelle Joueur 1</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select id="laterality" name="laterality">
                                <option value="1">Gaucher</option>
                                <option value="2">Droitier</option>
                                <option value="3">Ambidextre</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Laterality -->
                <div class="field mt-3">
                    <label class="label" for="laterality">Latéralité manuelle Joueur 2</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select id="laterality2" name="laterality">
                                <option value="1">Gaucher</option>
                                <option value="2">Droitier</option>
                                <option value="3">Ambidextre</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Condition -->
                <div class="field mt-3">
                    <label class="label" for="condition">Condition</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select id="condition" name="condition">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="field mt-3">
                    <div class="control">
                        <button type="submit" class="button is-dark is-fullwidth" id="submitBtn">
                            <span id="loadingSpinner" class="loader" style="display: none;"></span>
                            <span id="submitText">Commencer</span>
                        </button>
                    </div>
                </div>
            </form>

            <!-- JavaScript for form handling -->
            <script>
                document.getElementById('subjectForm').addEventListener('submit', function (event) {
                    var submitButton = document.getElementById('submitBtn');
                    var loadingSpinner = document.getElementById('loadingSpinner');
                    var submitText = document.getElementById('submitText');

                    // Disable the button to prevent multiple submissions
                    submitButton.disabled = true;

                    // Show the loading spinner
                    loadingSpinner.style.display = 'inline-block';
                    submitText.style.display = 'none';
                });
            </script>
        @endcomponent
    @endcomponent
@endsection
