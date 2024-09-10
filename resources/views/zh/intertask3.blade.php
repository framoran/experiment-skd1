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
                  任务即将开始，你将会看到一系列符号和数字。 <br /><br />
                  提醒：你的任务是选择与屏幕中央蓝色框中的符号相匹配的数字。请尽快且正确地回答。<br /><br />
                  单击 «→ »开始任务。 <br /><br />
                </p>
                <a href="intertask4" class="button is-primary mt-3"> -> </a>
          	</div>
      </div>
    @endcomponent
  @endcomponent
@endsection
