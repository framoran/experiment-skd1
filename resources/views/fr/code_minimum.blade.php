@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <style>
                .border{
                    border: 1px solid rgb(0,255,255);
                    padding: 10px;
                    border-radius: 5px;
                }

                /*.is-primary{
                    background-color: rgb(0,255,255) !important;
                }*/
            </style>

            <h1 class="title is-1">Title 1</h1>
            <h2 class="title is-2">Title 2</h2>
            <h3 class="title is-3">Title 3</h3>
            <h4 class="title is-4">Title 4</h4>
            <h5 class="title is-5">Title 5</h5>
            <h6 class="title is-6">Title 6</h6>
            <p>Text</p>

            <!-- Text en gras -->
            <p class="mt-5"><b>Text</b></p>

            <!-- Text en italique -->
            <p><i>Text</i></p>

            <!-- Marges -->
            <!--class="" mt = marge top mb = marge bottom ml = marge left and mr = marge right ; ca va de 1 - 6
            Exemple -->
            <div class="mt-6"><p>Text</p></div>

            <!-- Border -->
            <!--class="" mt = marge top mb = marge bottom ml = marge left and mr = marge right ; ca va de 1 - 6
            Exemple -->
            <div class="border"><p>Text</p></div>

            <!-- Retour à la ligne <br/> 
             Exemple -->
             <div class="pt-2">
                <p>Ceci est mon texte <br/> je à la ligne </p>
            </div>

            <div style="display: block">
                <!-- Image -->
                <img src="/images/flower_2.png" width="100px" style="display: block; margin-bottom: 10px;" />
                <!-- Button -->
                <a href="instruction2" class="button is-primary mt-5">Continuer</a>
            </div>

            <hr>

    @endcomponent
  @endcomponent
@endsection
