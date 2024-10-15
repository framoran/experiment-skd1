<div class="card">   

    <div class="card-content">
        {!! $slot !!}
    </div>

    @if(!empty($footer))
    <footer class="card-footer">
        {!! $footer !!}
    </footer>
    @endif
</div>
