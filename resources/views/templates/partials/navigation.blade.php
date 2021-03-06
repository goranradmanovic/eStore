
<menu class="main__menu">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="{{ url('/') }}"><span class="brand__img"></span></a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li v-for="categorie in categories"><a :href="'/pages/category/' + categorie.id" v-bind:data-id="categorie.id" v-text="categorie.category_name"><span class="sr-only" v-text="categorie.category_name"></span></a></li>
          <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More<span class="caret"></span></a>
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
            <input class="form-control" type="text" placeholder="Search" v-model="query" v-on:keyup="search"/>{{ csrf_field() }}
            <ul class="form__search" v-if="searchProducts &amp;&amp; !searchProducts.error">
              <li class="form__search--list" v-for="searchProduct in searchProducts">
                <div class="form__search--list--results"><a class="form__search--list--results--link" :href="searchProduct.product_link"><img class="form__search--list--results--image" :src="searchProduct.img_url"/></a><a class="form__search--list--results--link" :href="searchProduct.product_link" v-text="searchProduct.title"></a></div>
              </li>
            </ul>
          </div>
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
<div class="flash" v-if="searchProducts.error">
  <div class="flash__message">
    <div class="flash__message--error">@{{ searchProducts.error }}<span class="flash__message--error--box" v-on:click="flashCloseError();">&times;</span></div>
  </div>
</div>