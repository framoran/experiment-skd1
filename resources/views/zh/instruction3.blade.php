@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <div>

                非常棒！接下来，你的飞船还需要燃油。 <br /> <br />

                你可以通过按 “C” 键查看燃油表。 <br /> <br />

                当燃油表显示红色时，你可以按键盘上的空格键给飞船加油。 <br /> <br />

                如果在适当的时间补充燃油，你将获得{{$fill_fuel}}分。 <br /> <br />

                如果你忘记加油，燃油会自动装满，但你不会得到任何分数。<br /> <br />

                点击“开始”来熟悉你的宇宙飞船的燃油水平。<br /> <br />

              </div>
              <a href="entrainement3" class="button is-primary mt-5"> 开始 </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
