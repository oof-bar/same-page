<? snippet('header') ?>

<section>
  <div class="wrap">
    <h2><?= $page->title() ?></h2>
    <?= $page->text()->kirbytext() ?>
  </div>
</section>

<? snippet('footer') ?>
