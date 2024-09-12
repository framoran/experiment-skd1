@php
  session_start();
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!-- le nom qu'aura l'onglet de notre site -->
    <meta name=viewport content="width=device-width, initial-scale=1.0" />
    <meta http-equiv=content-type content="text/html; charset=utf-8">
    <title>Geneva Space Cruiser</title>
    <link rel="icon" href="{{ url('css/lives.png') }}">
    <script src=https://code.jquery.com/jquery-1.11.3.min.js></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
    <script type=text/javascript>
        marginLeft = ((window.screen.availWidth - 1200) / 5) / window.screen.availWidth - 1200;
    </script>
    <script>
      // Vaisseau1
      var image_Vaisseau1 = new Image(); // crée un nouvel objet Image
      image_Vaisseau1.src = "{{ asset('/images/bee_2.png') }}"; // définit le chemin vers la source
      image_Vaisseau1.onload = function(){} // instructions appeblant drawImage ici -> permet d'éviter les bugs      
      
      // Vaisseau2
      var image_Vaisseau2 = new Image(); // crée un nouvel objet Image
      image_Vaisseau2.src = "{{ asset('/images/bee_3.png') }}"; // définit le chemin vers la source
      image_Vaisseau2.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

      // Collision
      var collision = new Image(); // crée un nouvel objet Image
      collision.src = "{{ asset('/images/bee_2.png') }}"; // définit le chemin vers la source
      collision.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

      // fleurs
      var image_flowers = new Image(); // crée un nouvel objet Image
      image_flowers.src = "{{ asset('/images/flower_2.png') }}"; // définit le chemin vers la source
      image_flowers.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

      // fleurs
      var image_flowers2 = new Image(); // crée un nouvel objet Image
      image_flowers2.src = "{{ asset('/images/flower_3.png') }}"; // définit le chemin vers la source
      image_flowers2.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

      // GrosRocher
      var Gros_Rocher = new Image(); // crée un nouvel objet Image
      Gros_Rocher.src = "{{ asset('/images/gros_rocher.png') }}"; // définit le chemin vers la source
      Gros_Rocher.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

      // Missile
      var missile = new Image(); // crée un nouvel objet Image
      missile.src = "{{ asset('/images/missile.png') }}"; // définit le chemin vers la source
      missile.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

      // Missile
      var missile2 = new Image(); // crée un nouvel objet Image
      missile2.src = "{{ asset('/images/missile_explosion.png') }}"; // définit le chemin vers la source
      missile2.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs

      // Comet
      var cometImage = new Image(); // crée un nouvel objet Image
      cometImage.src = "{{ asset('/images/comete.png') }}"; // définit le chemin vers la source
      cometImage.onload = function(){} // instructions appelant drawImage ici -> permet d'éviter les bugs
      
    </script>
    <style>
        canvas {
            padding: 0;
            margin: auto;
            display: block;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-image:url("{{ asset('/images/background.jpg') }}");
            background-size: cover
        }

        <div id="textDiv"></div>
    </style>
</head>

<body onload=startGame() style=background-color:black>
    @if (isset($postdiction) && $postdiction)
        <form id=bouton_consigne action="postdiction" method=POST>
            @csrf
            <input style=visibility:hidden name="sendingData" id=bouton type=submit value=Commencer />
        </form>
    @else
        <form id=bouton_consigne action="instruction7" method=POST>
            @csrf
            <input style=visibility:hidden name="sendingData" id=bouton type=submit value=Commencer />
        </form>
    @endif   
    
    <script>

        stars_points = {{$stars_points}}; // default
        collide_rock = {{$collide_rock}}; // default
        fire_rock_success = {{$fire_rock_success}}; // default
        fill_fuel = {{$fill_fuel}}; // default
        speed_g = {{$speed_g}}; // default (min should be 1 and max 4 incrementing with 0.5)
        time_to_refuel = {{$time_to_refuel}}; // default (min 10 seconds and max 60)
        practice_length = {{$practice_length}};
        task_length = {{$task_length}};
        
        text_score = '{{ __('game.text_score') }}';
        text_fuel = '{{ __('game.text_fuel') }}';
        text_refueled = '{{ __('game.text_refueled') }}';
        text_end = '{{ __('game.text_end') }}';
        text_press_fuel_display_1 = "{!! __('game.text_press_fuel_display_1') !!}";
        text_press_fuel_display_2 = "{!! __('game.text_press_fuel_display_2') !!}";
        text_press_fuel_touch_1 = "{!! __('game.text_press_fuel_touch_1') !!}";
        text_press_fuel_touch_2 = "{!! __('game.text_press_fuel_touch_2') !!}";

    </script>

    <script src="/js/game_unclear.js">

    </script>
</body>

</html>
