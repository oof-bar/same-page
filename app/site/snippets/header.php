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
    <div class="wordmark">
      <h3><a href="<?= page('home')->url() ?>">Same Page</a></h3>
    </div>
    <? snippet('nav') ?>
    <? snippet('sidebar') ?>
  </header>
  <main>
