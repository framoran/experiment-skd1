<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="@stack('html-class')">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Geneva Space Cruiser</title>

    {{-- Scripts --}}
    @stack('head-scripts')

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    {{-- Styles --}}
    <link rel="icon" href="{{ url('css/lives.png') }}">
    <link href="/css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="/css/notiflix.css" />

    <script src="/js/notiflix.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    @stack('head-after')
</head>
<body>

<div id="app">
  <nav class="navbar is-black">
     <div class="container">
         <div class="navbar-brand">
             <a href="{{ url('/') }}" class="navbar-item">Geneva Space Cruiser</a>

             <div class="navbar-burger burger" id="navbar-burger-id">
                 <span></span>
                 <span></span>
                 <span></span>
             </div>
         </div>

         <div class="navbar-menu" id="navbar-menu-id">
             <div class="navbar-start"></div>

             <div class="navbar-end">
                 @if (Auth::guest())
                     <a class="navbar-item " href="{{ route('login') }}">Login</a>
                     <a class="navbar-item " href="{{ route('register') }}">Register</a>
                 @else
                     <div class="navbar-item has-dropdown is-hoverable">
                         <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>

                         <div class="navbar-dropdown">
                             <a class="navbar-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                 Logout
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                   style="display: none;">
                                 {{ csrf_field() }}
                             </form>
                         </div>
                     </div>
                 @endif
             </div>
         </div>
     </div>
 </nav>
 <div class="container-outer">
   @yield('content')
 </div>

</div>

@stack('bottom')
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

  /* Calculate the size of the table displayed on home
  $(document).ready(function() {
     var container_width = 500 * $(".container-inner a").length;
     $(".container-inner").css("width", container_width);
  });*/

  function saveChanges(experiment_id){
      var redirection_link = "url:"+$("#redirectionLink"+experiment_id).text();
      console.log(redirection_link)
      // Ajax here
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: 'update_redirectionLink',
            data: {
              redirection_link: redirection_link,
              experiment_id: experiment_id,
            },
            success: function (res) {
              Notiflix.Notify.Success('The redirection link has been updated');
            }
        });
    }

  // Close mobile & tablet menu on item click
  $('#navbar-button').each(function(e) {
    $(this).click(function(){
      if($('#navbar-burger-id').hasClass('is-active')){
        $('#navbar-burger-id').removeClass('is-active');
        $('#navbar-menu-id').removeClass('is-active');
      }
    });
  });

  // Open or Close mobile & tablet menu
  $('#navbar-burger-id').click(function () {
    if($('#navbar-burger-id').hasClass('is-active')){
      $('#navbar-burger-id').removeClass('is-active');
      $('#navbar-menu-id').removeClass('is-active');
    }else {
      $('#navbar-burger-id').addClass('is-active');
      $('#navbar-menu-id').addClass('is-active');
    }
  });

  // Open or Close mobile & tablet menu



  $("#showModal").click(function() {
    $("#modal").addClass("is-active");
  });

  $(".delete").click(function() {
     $(".modal").removeClass("is-active");
  });

  $("#lang").click(function() {
    $("#modal-lang").addClass("is-active");
  });

  $(".delete-lang").click(function() {
     $(".modal").removeClass("is-active");
  });

  $("#btn1").click(function() {
    $("#help-1").addClass("is-active");
  });

  $("#btn2").click(function() {
    $("#help-2").addClass("is-active");
  });

  $(".link").on('click', function(event){
      if (confirm('Are you sur you want to delete this experiment ?')) {
        // Save it!
        var fired_button = $(this).val();
        window.location.replace('delete?Experiment_Id='+fired_button);

      } else {
        // Do nothing!
        window.location.replace("home?q=experiments");
      }
  });

  if (window.location.href.includes('resultDel=success')){
    Notiflix.Notify.Success('The experiment has been deleted');
  }else if (window.location.href.includes('resultCreate=success')){
    Notiflix.Notify.Success('The experiment has been created');
  }else if (window.location.href.includes('result=user_created')){
    Notiflix.Notify.Success('User created');
  }else if (window.location.href.includes('result=user_exist')){
    Notiflix.Notify.Failure('User exist');
  }else if (window.location.href.includes('result=error')){
    Notiflix.Notify.Failure('Unkown error');
  }else if (window.location.href.includes('settingsUpdate=success')){
    Notiflix.Notify.Success('Settings have been updated!');
  }



  function exportTasks(_this) {
    let _url = $(_this).data('href');
    window.location.href = _url;
  }

</script>
</body>
</html>
