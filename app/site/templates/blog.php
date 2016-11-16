<? snippet('header') ?>

<section class="blog">
  <div class="wrap">
    <?= $page->blog_info()->kirbytext() ?>
    <div class="feed">
      <? foreach ( $posts as $post ) { ?>
        <div class="post">
          <div class="cover-photo">
            <?= $post->cover_photo() ?>
          </div>
          <div class="date">
            <span class="month"><?= $post->date('F', 'datetime') ?></span>
            <span class="day"><?= $post->date('d', 'datetime') ?></span>,
            <span class="year"><?= $post->date('Y', 'datetime') ?></span>
          </div>
          <div class="title">
            <h3><?= $post->title() ?></h3>
          </div>
          <div class="message text-content">
            <?= $post->message() ?>
          </div>
        </div>
      <? } ?>
    </div>
  </div>
</section>

<? snippet('footer') ?>
