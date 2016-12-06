<? if ( $page->depth() === 1 ) { ?>
  <? $description = $page->description()->kirbytext() ?>
<? } else { ?>
  <? $description = $page->parents()->first()->description()->kirbytext() ?>
<? } ?>

<article class="sidebar">
  <div class="preview">
    <h2><?= $page->title() ?></h2>
    <div class="content">
      <?= $description->kirbytext() ?>
    </div>
  </div>
</article>
