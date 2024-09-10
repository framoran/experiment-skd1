@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <h1>
                Istruzioni
              </h1>

              <div>

                Molto bene! Durante il gioco, la tua astronave avrà anche bisogno di carburante.  <br /> <br />

                È possibile visualizzare l'indicatore del carburante premendo il tasto "C".  <br /> <br />

                Non appena l'indicatore del carburante si trova nella sezione rossa, puoi rifornire la tua astronave premendo la barra spaziatrice sulla tastiera. Se lo rifornisci al momento giusto, guadagnerai {{$fill_fuel}} punti.  <br /> <br />

                Se dimentichi di rifornirlo, l'indicatore del carburante si riempirà automaticamente, ma non riceverai alcun punto.  <br /> <br />

                Premi <strong> "Inizia" </strong> per familiarizzare con il livello di carburante della tua astronave.  <br /> <br />

              </div>
              <a href="entrainement3" class="button is-primary mt-5"> Inizia </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
