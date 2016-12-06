<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>

  <?= css('assets/css/app.css') ?>
  <?= css('@auto') ?>

</head>
<body class="<?= Help::body_classes() ?>">
  <header>
    <nav class="site">
      <h3><a href="<?= page('home')->url() ?>">Same Page</a></h3>
      <button class="menu burger" title="Menu">
        <div class="piece bun top" aria-hidden="true"></div>
        <div class="piece patty" aria-hidden="true"></div>
        <div class="piece bun bottom" aria-hidden="true"></div>
      </button>
    </nav>

    <nav class="main-menu">
      <ul>
        <? foreach ( $site->pages()->visible() as $page ) { ?>
          <li>
            <?= html::a($page->url(), $page->title(), [
              'class' => $page->isOpen() ? 'active' : 'inactive'
            ]) ?>
          </li>
        <? } ?>
      </ul>
    </nav>

    <? snippet('sidebar') ?>

    <div class="colophon">
      <div class="legal">
        ©<?= date('Y') ?>
      </div>
      <ul class="social">
        <? foreach ( $site->social()->toStructure() as $link ) { ?>
          <li>
            <?= html::a($link->url(), $link->service(), [
              'target' => '_blank',
              'class' => 'link'
            ]) ?>
          </li>
        <? } ?>
      </ul>
    </div>
  </header>
  <main>
