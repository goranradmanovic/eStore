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
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>@yield('title')</title>
  </head>
  <body>
    <div class="container-fluid" id="app">
      <div class="row"> 
        <menu class="main__menu">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button><a class="navbar-brand nopadding" href=""><img class="brand-img" src="" alt="Brand image"></a>
              </div>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="#">Moctha</a></li>
                <li><a href="#">Fitness Gear</a></li>
                <li><a href="#">Food Supplements</a></li>
              </ul>
              <form class="navbar-form navbar-left" action="" method="" target="_blanck" autocomplete="off" role="search">
                <div class="form-group">
                  <input class="form-control" type="text" name="" placeholder="Search">
                  <button class="btn btn-default" type="submit">Search</button>
                </div>
              </form>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Sign Up</a></li>
                <li><a href="#">Sign In</a></li>
                <li><a href="#">Sign Out</a></li>
              </ul>
            </div>
          </nav>
        </menu>@yield('content')
      </div>
    </div>
    <script src="js/app.js"></script>
  </body>
</html>