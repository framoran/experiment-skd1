@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            @if($redirection_link != null || $redirection_link != "")
                <script>
                  var url ="<?php echo $redirection_link . '?user_id=' . $user_id ?>";
                  window.location.replace(url);
              </script>
            @endif
            <div class="content elements-centered">
              <div>
                <p>
                  感谢你抽时间参与本项研究。<br /> <br />
                  你的回答已被记录。<br /> <br />
                </p>
          	</div>
      </div>
    @endcomponent
  @endcomponent
@endsection
