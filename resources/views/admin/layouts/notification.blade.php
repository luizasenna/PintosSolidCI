@if (session('status'))
    <div id="alert_msg" class="alert alert-info">
        <strong>{{ session('status') }}</strong>
    </div>
@endif

