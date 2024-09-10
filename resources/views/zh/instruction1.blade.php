@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            @php

              setcookie('eui',  'none', time() + (86400 * 30), "/"); // 86400 = 1 day

              setcookie('data_recorded',  'none', time() + (86400 * 30), "/"); // 86400 = 1 day

              if (isset($_GET['Experiment_Id'])){

                setcookie('experimentId',  htmlspecialchars($_GET['Experiment_Id']), time() + (86400 * 30), "/"); // 86400 = 1 day

              }else{

                setcookie('experimentId',  'demo', time() + (86400 * 30), "/"); // 86400 = 1 day

              }

              if (isset($_GET['eui'])){

                setcookie('eui',  'S_'.htmlspecialchars($_GET['eui']), time() + (86400 * 30), "/"); // 86400 = 1 day

              }

            @endphp

            <div class="content elements-centered">

              <h1>
                指导语
              </h1>

              <div>

                在这个任务中，你的目标是获得尽可能多的分数。<br><br>

                为了这个目的，你将驾驶一艘宇宙飞船去收集星星。<br><br>

                每收集一颗星星，你将获得{{$stars_points}}分。<br><br> 

                你可以使用键盘上的方向键(上、下、左、右键)驾驶宇宙飞船。<br><br>

                你还需要躲避石头。如果你的飞船撞上其中一块石头，你将失去{{$collide_rock}}分。<br><br>

                因此， 驾驶飞船时尝试避开这些石头。你还可以从你的飞船上发射导弹摧毁这些石头。<br><br>

                发射导弹可以按“F”键。如果你摧毁一块石头，你将获得{{$fire_rock_success}}分。<br><br>

                点击“继续”看接下来的说明。<br><br>

              </div>
              <a href="instruction2" class="button is-primary mt-5"> 继续 </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
