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

                <div class="field">
                    <label class="label" for="subject_code1">Code Joueur 1</label>
                    <div class="control">
                        <input class="input @error('subject_code1') is-danger @enderror" type="text" id="subject_code1" name="subject_code1" value="{{ old('subject_code1') }}" required />
                    </div>
                    @error('subject_code1')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label" for="subject_code2">Code Joueur 2</label>
                    <div class="control">
                        <input class="input @error('subject_code2') is-danger @enderror" type="text" id="subject_code2" name="subject_code2" value="{{ old('subject_code2') }}" required />
                    </div>
                    @error('subject_code')
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