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
        <div class="product-price price">
          <?= $page->price() ?>
        </div>
        <fieldset class="add-to-cart">
          <?= $page->buy_button() ?>
        </fieldset>
        <div class="product-description">
          <?= $page->product_description()->kirbytext() ?>
        </div>
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
