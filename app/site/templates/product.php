<? snippet('header') ?>

<section class="single-product">
  <div class="wrap">
    <div class="product">
      <? if ( $product_photo = $page->product_photo()->toFile() ) { ?>
        <div class="product-photo">
          <?= html::img(Help::resize($product_photo, 'large')->url()) ?>
        </div>
      <? } ?>
      <div class="product-info">
        <div class="product-name">
          <h3><?= $page->title() ?></h3>
        </div>
        <div class="product-price">
          <div class="content">
            <? snippet('product/price', ['product' => $page]) ?>
          </div>
        </div>
        <div class="product-description">
          <?= $page->product_description()->kirbytext() ?>
        </div>

        <? if ( $page->hasOptions() ) { ?>
          <div class="product-variations">
            <h4>Available Options</h4>
            <dl class="variations">
              <? foreach ( $page->options() as $option => $variations ) { ?>
                <dt class="variation-name <?= $option ?>"><?= $variations->first()->attribute() ?></dt>
                <dd>
                  <ul class="options <?= $option ?>-options">
                    <? foreach ( $variations as $variation ) { ?>
                      <li class="option <?= $option ?>-option"><?= $variation->value() ?></li>
                    <? } ?>
                  </ul>
                </dd>
              <? } ?>
            </dl>
          </div>
        <? } ?>

        <fieldset class="add-to-cart">
          <?= $page->buyButton()->append(html::tag('span', 'Add to Cart')) ?>
        </fieldset>
      </div>
    </div>

    <div class="pagination">
      <div class="return">
        <a href="<?= page('shop')->url() ?>" class="button">All Products</a>
      </div>
    </div>
  </div>
</section>

<? snippet('footer') ?>
