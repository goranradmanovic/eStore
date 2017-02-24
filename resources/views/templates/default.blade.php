<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-moblie-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Goran Radmanovic">
    <meta name="robots" content="index, follow, all">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" id="token">
    <link rel="icon" href="images/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>@yield('title')</title>
  </head>
  <body>@if (Session::has('massageSuccess') || Session::has('messageWarning') || Session::has('messageError'))
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
    <menu class="main__menu">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="#"><span class="brand__img"></span></a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li v-on:click="active"><a href="#">Matcha Tea<span class="sr-only">(current)</span></a></li>
              <li><a href="#">Food Supplements</a></li>
              <li><a href="#">Fitness Gear</a></li>
              <li><a href="#">Random</a></li>
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider" role="separator"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider" role="separator"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form navbar-left">
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Search">{{ csrf_field() }}
              </div>
              <button class="btn btn-default" type="submit">Search</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider" role="separator"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </menu>
    <div class="container-fluid" id="app">@yield('content')
      <div class="row">
        <footer class="footer">
          <div class="col-md-12">
            <div class="col-md-4">
              <div class="footer__text">Follow</div>
              <div class="footer__social"><a class="footer__social--link footer__social--link--fb" href="#"></a><a class="footer__social--link footer__social--link--tw" href="#"></a><a class="footer__social--link footer__social--link--in" href="#"></a><a class="footer__social--link footer__social--link--li" href="#"></a></div>
            </div>
            <div class="col-md-8">
              <div class="footer__nav"><a class="footer__nav--link" href="#">Privacy</a><a class="footer__nav--link" href="#">Terms</a><a class="footer__nav--link" href="#">Disclaimer</a><a class="footer__nav--link" href="#">Site Map</a><a class="footer__nav--link" href="#">Contac Us</a></div>
              <div class="footer__form">
                <h3 class="footer__form--title">Subscribe</h3>
                <form class="form-inline footer__form--inline" action="{{ url('/') }}" method="post" autocomplete="off" id="subscribeForm" v-on:submit="submitSubscribeEmail"> 
                  <div class="form-group">
                    <input class="form-control footer__form--email" type="email" name="subscribeEmail" placeholder="Email Address" v-model="email" value="{{ old('email') }}">
                    <input class="footer__form--btn" type="submit" value="Submit">{{ csrf_field() }}
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
    </div>
  </body>
  <script src="js/app.js"></script>
</html>