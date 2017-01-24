
<div class="row">
  <div class="col-md-12">
    <div class="articles" v-for="article in articles">
      <div class="col-md-4">
        <div class="articles__item">
          <h3 class="articles__item--title"><a class="articles_item--title--link" :href="article.titleLink" target="blank" v-text="article.title"></a></h3>
          <div class="articles__item--link"><a :href="article.productLink" target="_blank"><img class="articles__item--link--image" :src="article.imgURL" alt="Product image"/></a></div>
          <div class="articles__item--details">
            <p class="articles__item--details--text" v-text="article.description"></p>
          </div>
          <div class="articles__item--price">
            @verbatim
            $ {{ article.price }}
            @endverbatim
          </div>
          <div class="articles__item--button"><a :href="article.buttonLink">It's a bargain</a></div>
        </div>
      </div>
    </div>
  </div>
</div>