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
    <link rel="icon" href="images/favicon/favicon.ico" type="image/x-icon">
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
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="#"><span class="brand__img"></span></a>
              </div>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li v-on:click="active"><a href="#">Matcha Tea<span class="sr-only">(current)</span></a></li>
                  <li><a href="#">Fitness Gear</a></li>
                  <li><a href="#">Food Supplements</a></li>
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
                    <input class="form-control" type="text" placeholder="Search">
                  </div>
                  <button class="btn btn-default" type="submit">Search</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#">Link</a></li>
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
        </menu>@yield('content')
        <footer class="footer">
          <div class="col-md-12">
            <div class="col-md-4">
              <div class="footer__social"><span>Follow</span><a class="footer__social--link footer__social--link--fb" href="#"></a><a class="footer__social--link footer__social--link--tw" href="#"></a><a class="footer__social--link footer__social--link--in" href="#">Instagram</a><a class="footer__social--link footer__social--link--li" href="#">Linkedin</a></div>
            </div>
            <div class="col-md-8"></div>
          </div>
        </footer>
      </div>
    </div>
    <script src="js/app.js"></script>
  </body>
</html>