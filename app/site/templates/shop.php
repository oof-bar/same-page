<? snippet('header') ?>

<section class="shop">
  <div class="wrap">
    <? if ( $products->count() ) { ?>
      <ul class="products">
        <? foreach ( $products as $product ) { ?>
          <li class="product">
            <a href="<?= $product->url() ?>">
              <? if ( $product_photo = $product->product_photo()->toFile() ) { ?>
                <div class="product-photo">
                  <?= html::img( Help::resize($product_photo, 'large')->url()) ?>
                </div>
              <? } ?>
              <div class="product-name">
                <h3><?= $product->title() ?></h3>
              </div>
              <div class="product-price">
                <div class="sticker">
                  <div class="content">
                    <? snippet('product/price', ['product' => $product]) ?>
                  </div>
                </div>
              </div>
            </a>
          </li>
        <? } ?>
      </ul>
    <? } else { ?>
      <div class="products empty">
        <? snippet('util/message', [
          'message' => "Sorry, we don’t have anything for sale, right now. Check back soon!"
        ]) ?>
      </div>
    <? } ?>
  </div>
</section>

<? snippet('footer') ?>
