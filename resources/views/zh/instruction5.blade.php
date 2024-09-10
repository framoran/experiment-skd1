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
                  非常棒！你已经完成了练习。  <br/> <br/>
                  下次玩这个游戏时，目标将与本次练习的目标相同。 <br/> <br/>
                  点击 “继续” 。<br/> <br/>
                </p>
          	</div>
            <a href="intertask" class="button is-primary mt-3"> 继续 </a>
      </div>
    @endcomponent
  @endcomponent
@endsection
