@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <h1>
                指导语
              </h1>

              <div>
                在接下来的几页中，你将熟悉这个游戏。<br /> <br />

                你将首先通过上、下、左、右箭头按键熟悉宇宙飞船的驾驶。<br /><br />

                你也将练习通过按 “F” 键来发射导弹。<br /><br />

                点击“开始”来练习游戏操作。<br /><br />

              </div>
              <a href="entrainement1" class="button is-primary mt-5"> 开始 </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
