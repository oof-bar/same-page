<? snippet('header') ?>

<section class="single-post">
  <div class="wrap">
    <div class="post">
      <? if ( $cover_photo = $page->cover_photo()->toFile() ) { ?>
        <div class="cover-photo">
          <?= html::img( Help::resize($cover_photo, 'large')->url()) ?>
        </div>
      <? } ?>
      <div class="date">
        <span class="month"><?= $page->date('F', 'datetime') ?></span>
        <span class="day"><?= $page->date('d', 'datetime') ?></span>,
        <span class="year"><?= $page->date('Y', 'datetime') ?></span>
      </div>
      <div class="title">
        <h3><?= $page->title() ?></h3>
      </div>
      <div class="message text-content">
        <?= $page->message()->kirbytext() ?>
      </div>
    </div>

    <div class="pagination">
      <div class="return">
        <a href="<?= page('blog')->url() ?>" class="button">All Posts</a>
      </div>
    </div>
  </div>
</section>


<? snippet('footer') ?>
