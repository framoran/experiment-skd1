@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <div>
                <p>
                  在接下来的任务中，我们将向你展示一系列 9 个符号。每个符号都伴随一个数字。  <br /><br />

                  在这 9 个符号和数字的上方，你会在屏幕中央看到一个单独的符号。它会在 <span style="color:blue">蓝色的框</span> 里面。<br /><br />

                  你的任务是尽可能快速地选择与中央符号相匹配的数字。<br /><br />

                </p>
                <a href="intertask2" class="button is-primary mt-3"> 开始 </a>
          	</div>
      </div>
    @endcomponent
  @endcomponent
@endsection
