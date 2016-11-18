<? if ( $page->depth() === 1 ) { ?>
  <? $description = $page->description()->kirbytext() ?>
<? } else { ?>
  <? $description = $page->parents()->first()->description()->kirbytext() ?>
<? } ?>

<section class="sidebar">
  <div class="wrap">
    <div class="preview">
      <div class="content">
        <h2><?= $page->title() ?></h2>
        <?= $description->kirbytext() ?>
      </div>
    </div>
  </div>
</section>
