<? $target = $page->depth() === 1 ? $page : $page->parents()->first() ?>

<article class="sidebar">
  <div class="preview">
    <h2><?= $target->title()->html() ?></h2>
    <div class="content">
      <?= $target->description()->kirbytext() ?>
    </div>
  </div>
</article>
