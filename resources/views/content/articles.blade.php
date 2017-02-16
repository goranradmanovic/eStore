
<div class="row">
  <div class="col-md-12">
    <div class="articles" v-for="product in products">
      <div class="col-md-4">
        <div class="articles__item">
          <h3 class="articles__item--title"><a class="articles_item--title--link" :href="product.product_link" target="blank" v-text="product.title"></a></h3>
          <div class="articles__item--link"><a :href="product.product_link" target="_blank"><img class="articles__item--link--image" :src="product.img_url" alt="Product image"/></a></div>
          <div class="articles__item--details">
            <p class="articles__item--details--text" v-text="product.description"></p>
          </div>
        </div>
        <div class="articles__footer">
          <div class="articles__footer--price">$ @{{ product.price }}</div>
          <div class="articles__footer--cta"><a class="articles__footer--cta--link" :href="product.cta_link" role="button">It's a bargain</a></div>
        </div>
      </div>
    </div>
  </div>
</div>