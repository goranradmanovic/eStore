@if (Session::has('massageSuccess') || Session::has('messageWarning') || Session::has('messageError'))
<div class="row">
  <div class="col-md-12">
    <div class="flash">@if (Session::has('massageSuccess'))
      <div class="flash__message--success">{{ session('massageSuccess') }}</div>
      @endif
      @if (Session::has('messageWarning'))
      <div class="flash__message--warning">{{ session('messageWarning') }}</div>
      @endif
      @if (Session::has('messageError'))
      <div class="flash__message--error">{{ session('messageError') }}
        <button class="flash__message--error--link">&times;</button>
      </div>@endif
    </div>
  </div>
</div>@endif