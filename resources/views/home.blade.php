@extends('templates.default')

@section('title', 'Home')

@section('content')
	<div class="col-md-12">
	  <div class="articles">
	    <div class="articles__item" v-for="article in articles">
	      <h3 class="articles__item--title"><a class="articles_item--link" :href="article.titleLink" target="blank" v-text="article.title"></a></h3>
	      <div class="articles__item--image"><a :href="article.productLink" target="_blank"><img :src="article.imgURL" alt="Product image"/></a></div>
	      <div class="articles__item--details">
	        <p class="article__item--details--text" v-text="article.description"></p>
	      </div>
	      <div class="articles__item--price">
	        @verbatim
	        $ {{ article.price }}
	        @endverbatim
	      </div>
	      <div class="articles__item--button"><a :href="article.buttonLink">Click this</a></div>
	    </div>
	  </div>
	</div>
@endsection