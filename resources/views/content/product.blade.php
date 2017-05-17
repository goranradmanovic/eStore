
<div class="row">
  <div class="col-md-12">
    <div class="product">
      <div class="col-md-6">
        <div class="product__image"><img class="product__image--picture" :src="products.img_url" alt="Product image.jpg"/></div>
      </div>
      <div class="col-md-6">
        <div class="product__info">
          <h1 class="product__info--title" v-text="products.title"></h1>
          <div class="product__info--description"><span class="product__info--description--text" v-text="products.description"></span></div>
          <div class="product__info--lastprice">Last price: <span class="product__info--lastprice--amount">$ @{{ products.price + 11.78 }}</span></div>
          <div class="product__info--price">Price: <span class="product__info--price--amount">$ @{{ products.price }}</span></div>
          <div class="product__info--cta"><a class="product__info--cta--link" :href="products.cta_link" role="button">It's a bargain	</a></div>
        </div>
      </div>
    </div>
  </div>
</div>