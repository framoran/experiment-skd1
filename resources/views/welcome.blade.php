@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <!-- Display success message -->
            @if(session('success'))
                <div class="notification is-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="notification is-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form styled with Bulma -->
            <form id="subjectForm" method="POST" action="{{ route('new_participant') }}" class="mt-5" style="max-width: 500px; margin: auto;">
                @csrf <!-- Add CSRF token for security -->

                <!-- Subject Number -->
                <div class="field">
                    <label class="label" for="subject_nb">Numéro de sujet Joueur 1</label>
                    <div class="control">
                        <input class="input @error('subject_nb') is-danger @enderror" type="text" id="subject_nb" name="subject_nb" value="{{ old('subject_nb') }}" required />
                    </div>
                    @error('subject_nb')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label" for="subject_nb2">Numéro de sujet Joueur 2</label>
                    <div class="control">
                        <input class="input @error('subject_nb2') is-danger @enderror" type="text" id="subject_nb2" name="subject_nb2" value="{{ old('subject_nb2') }}" required />
                    </div>
                    @error('subject_nb2')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gender for Player 1 -->
                <div class="field mt-3">
                    <label class="label" for="gender">Genre Joueur 1</label>
                    <div class="control">
                        <div class="select is-fullwidth @error('gender') is-danger @enderror">
                            <select id="gender" name="gender">
                                <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Homme</option>
                                <option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>Femme</option>
                                <option value="3" {{ old('gender') == 3 ? 'selected' : '' }}>Non-binaire</option>
                                <option value="4" {{ old('gender') == 4 ? 'selected' : '' }}>Préfère ne pas répondre</option>
                            </select>
                        </div>
                    </div>
                    @error('gender')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gender for Player 2 -->
                <div class="field mt-3">
                    <label class="label" for="gender2">Genre Joueur 2</label>
                    <div class="control">
                        <div class="select is-fullwidth @error('gender2') is-danger @enderror">
                            <select id="gender2" name="gender2">
                                <option value="1" {{ old('gender2') == 1 ? 'selected' : '' }}>Homme</option>
                                <option value="2" {{ old('gender2') == 2 ? 'selected' : '' }}>Femme</option>
                                <option value="3" {{ old('gender2') == 3 ? 'selected' : '' }}>Non-binaire</option>
                                <option value="4" {{ old('gender2') == 4 ? 'selected' : '' }}>Préfère ne pas répondre</option>
                            </select>
                        </div>
                    </div>
                    @error('gender2')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Age for Player 1 -->
                <div class="field mt-3">
                    <label class="label" for="age">Âge Joueur 1</label>
                    <div class="control">
                        <div class="select is-fullwidth @error('age') is-danger @enderror">
                            <select id="age" name="age">
                                @for ($i = 1; $i <= 100; $i++)
                                    <option value="{{ $i }}" {{ old('age') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    @error('age')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Age for Player 2 -->
                <div class="field mt-3">
                    <label class="label" for="age2">Âge Joueur 2</label>
                    <div class="control">
                        <div class="select is-fullwidth @error('age2') is-danger @enderror">
                            <select id="age2" name="age2">
                                @for ($i = 1; $i <= 100; $i++)
                                    <option value="{{ $i }}" {{ old('age2') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    @error('age2')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Laterality for Player 1 -->
                <div class="field mt-3">
                    <label class="label" for="laterality">Latéralité manuelle Joueur 1</label>
                    <div class="control">
                        <div class="select is-fullwidth @error('laterality') is-danger @enderror">
                            <select id="laterality" name="laterality">
                                <option value="1" {{ old('laterality') == 1 ? 'selected' : '' }}>Gaucher</option>
                                <option value="2" {{ old('laterality') == 2 ? 'selected' : '' }}>Droitier</option>
                                <option value="3" {{ old('laterality') == 3 ? 'selected' : '' }}>Ambidextre</option>
                            </select>
                        </div>
                    </div>
                    @error('laterality')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Laterality for Player 2 -->
                <div class="field mt-3">
                    <label class="label" for="laterality2">Latéralité manuelle Joueur 2</label>
                    <div class="control">
                        <div class="select is-fullwidth @error('laterality2') is-danger @enderror">
                            <select id="laterality2" name="laterality2">
                                <option value="1" {{ old('laterality2') == 1 ? 'selected' : '' }}>Gaucher</option>
                                <option value="2" {{ old('laterality2') == 2 ? 'selected' : '' }}>Droitier</option>
                                <option value="3" {{ old('laterality2') == 3 ? 'selected' : '' }}>Ambidextre</option>
                            </select>
                        </div>
                    </div>
                    @error('laterality2')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Condition -->
                <div class="field mt-3">
                    <label class="label" for="condition">Condition</label>
                    <div class="control">
                        <div class="select is-fullwidth @error('condition') is-danger @enderror">
                            <select id="condition" name="condition">
                                <option value="1" {{ old('condition') == 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('condition') == 2 ? 'selected' : '' }}>2</option>
                            </select>
                        </div>
                    </div>
                    @error('condition')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
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