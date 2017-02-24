@if (Session::has('massageSuccess') || Session::has('messageWarning') || Session::has('messageError'))
<div class="flash">
  <div class="flash__message">@if (Session::has('massageSuccess'))
    <div class="flash__message--success">{{ session('massageSuccess') }}</div>
    @endif
    @if (Session::has('messageWarning'))
    <div class="flash__message--warning">{{ session('messageWarning') }}</div>
    @endif
    @if (Session::has('messageError'))
    <div class="flash__message--error">{{ session('messageError') }}<span class="flash__message--error--box">&times;</span></div>@endif
  </div>
</div>@endif