<? snippet('header') ?>

<section class="shop">
  <div class="wrap">
    <div class="products">
      <? foreach ( $products as $product ) { ?>
        <div class="product">
          <? if ( $product_photo = $product->product_photo()->toFile() ) { ?>
            <div class="product-photo">
              <?= html::img( Help::resize($product_photo, 'large')->url()) ?>
            </div>
          <? } ?>
          <div class="product-name">
            <h3><a href="#"><?= $product->title() ?></a></h3>
          </div>
          <div class="product-price">
            <?= $product->price() ?>
          </div>
        </div>
      <? } ?>
    </div>
  </div>
</section>

<? snippet('footer') ?>
