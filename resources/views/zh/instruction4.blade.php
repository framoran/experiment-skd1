@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <div>

                非常棒！你已经熟悉了这个游戏的不同元素，接下来可以进行一次完整的游戏练习了。 <br /> <br />

                <div style="text-align:left; margin-left:20%;">
                  <strong>目标总结: <br /></strong>
                  <ul>
                    <li> 收集星星：每收集一颗你将获得{{$stars_points}}分。 </li>
                    <li> 避开石头：每次碰撞将扣除你{{$collide_rock}}分。 </li>
                    <li> 摧毁石头：每摧毁一块石头，你将获得{{$fire_rock_success}}分。 </li>
                    <li> 给飞船加油：每次你按时加油(只有当仪表显示红色时)，你将获得{{$fill_fuel}}分。 </li>
                  </ul>
                </div>
                <br />
                <div style="text-align:left; margin-left:20%;">
                  <strong>按键提示: <br /></strong>
                  <ul>
                    <li> 方向键：驾驶飞船。 </li>
                    <li> F 键：发射导弹。</li>
                    <li> C键：显示燃油表。 </li>
                    <li> 空格键：加油。 </li>
                  </ul>
                </div>
                <br /><br />
                现在你可以做一个完整的练习。 <br /><br />

                点击“开始”进入练习环节。 <br /><br />

          	</div>
            <a href="game" class="button is-primary mt-3"> 开始 </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
