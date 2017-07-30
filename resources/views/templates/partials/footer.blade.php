
<div class="row">
  <footer class="footer">
    <div class="col-md-12">
      <div class="col-md-4">
        <div class="footer__text">Follow</div>
        <div class="footer__social"><a class="footer__social--link footer__social--link--fb" href="#"></a><a class="footer__social--link footer__social--link--tw" href="#"></a><a class="footer__social--link footer__social--link--in" href="#"></a><a class="footer__social--link footer__social--link--li" href="#"></a></div>
      </div>
      <div class="col-md-8">
        <div class="footer__nav"><a class="footer__nav--link" href="#">Privacy</a><a class="footer__nav--link" href="#">Terms</a><a class="footer__nav--link" href="#">Disclaimer</a><a class="footer__nav--link" href="#">Site Map</a><a class="footer__nav--link" href="{{ url('/contact') }}">Contac Us</a></div>
        <div class="footer__form">
          <h3 class="footer__form--title">Subscribe</h3>
          <form class="form-inline footer__form--inline" action="{{ url('/') }}" method="post" autocomplete="off" id="subscribeForm" v-on:submit="submitSubscribeEmail"> 
            <div class="form-group">
              <input class="form-control footer__form--email" type="email" name="subscribeEmail" placeholder="Email Address" v-model="email" value="{{ old('email') }}"/>
              <input class="footer__form--btn" type="submit" value="Submit"/>{{ csrf_field() }}
            </div>
            @if (count($errors) > 0)
            	<ul class="footer__form--defaulterror">
            		@foreach ($errors->all() as $error)
            			<li class="text-danger">{{ $error }}</li>
            		@endforeach
            	</ul>
            @endif
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="footer__copy"><span class="footer__copy--info">Designed and developed by <a class="footer__copy--info--link" href="http://www.goranradmanovic.byethost13.com/" target="_blank">Goran Radmanovic.</a></span><span class="footer__copy--info"> &copy; @{{ year }} My Company - All rights reserved</span></div>
    </div>
  </footer><a class="scrollToTop" href="#" title="Scroll To Top" alt="Scroll To Top" role="button"></a>
</div>