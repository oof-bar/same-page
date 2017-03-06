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
      <div class="logo">
        <h3>
          <a href="<?= $site->url() ?>" title="<?= $site->title()->html() ?>">
            <?= Help::inline_svg(Help::asset_file('images', 'wordmark.svg'), [575, 181]) ?>
          </a>
        </h3>
      </div>
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
              'class' => join([
                  $page->isOpen() ? 'active' : 'inactive',
                  $page->intendedTemplate()
                ], ' ')
            ]) ?>
          </li>
        <? } ?>
      </ul>
    </nav>

    <? snippet('sidebar') ?>
  </header>
  <main>
