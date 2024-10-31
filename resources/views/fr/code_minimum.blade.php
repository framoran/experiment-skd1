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








            <!-- Include Axios from CDN -->
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

            <script>
                const url = 'http://127.0.0.1:8000/fr/instruction6';

                // Function to get a cookie by name
                function getCookie(name) {
                    let cookieArr = document.cookie.split(";");
                    for (let i = 0; i < cookieArr.length; i++) {
                        let cookiePair = cookieArr[i].split("=");
                        if (name == cookiePair[0].trim()) {
                            return decodeURIComponent(cookiePair[1]);
                        }
                    }
                    return null;
                }

                // Get the data from the cookies
                let flower_practice = getCookie("flower_practice");
                let flower2_practice = getCookie("flower2_practice");
                let missedFlower_practice = getCookie("missedFlower_practice");
                let missedFlower2_practice = getCookie("missedFlower2_practice");
                let draw_practice = getCookie("drawing_practice");

                // Prepare the data to send
                let data = {
                    flower_practice: flower_practice,
                    flower2_practice: flower2_practice,
                    missedFlower_practice: missedFlower_practice,
                    missedFlower2_practice: missedFlower2_practice,
                    draw_practice: draw_practice
                };

                // Send the data via Axios
                axios.post('{{ route('save.practice.data') }}', data)
                  .then(function (response) {
                      console.log(response);
                  })
                  .catch(function (error) {
                      console.log(error);
                  });
                 
            </script>