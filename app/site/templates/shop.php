<? snippet('header') ?>

<section class="shop">
  <div class="wrap">
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
            <div class="product-price price">
              <?= $product->price() ?>
            </div>
          </a>
        </li>
      <? } ?>
    </ul>
  </div>
</section>

<? snippet('footer') ?>
