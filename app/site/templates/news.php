<? snippet('header') ?>

<section class="blog">
  <div class="wrap">
    <div class="feed">
      <? foreach ( $posts as $post ) { ?>
        <div class="post">
          <? if ( $cover_photo = $post->cover_photo()->toFile() ) { ?>
            <div class="cover-photo">
              <?= html::img( Help::resize($cover_photo, 'large')->url()) ?>
            </div>
          <? } ?>
          <div class="date">
            <span class="month"><?= $post->date('F', 'datetime') ?></span>
            <span class="day"><?= $post->date('d', 'datetime') ?></span>,
            <span class="year"><?= $post->date('Y', 'datetime') ?></span>
          </div>
          <div class="title">
            <h3><a href="<?= $post->url() ?>"><?= $post->title() ?></a></h3>
          </div>
          <div class="text-content">
            <?= $post->message()->kirbytext() ?>
          </div>
        </div>
      <? } ?>
    </div>

    <? if ( $pagination->hasPages() ) { ?>
      <div class="pagination">
        <? if ( $pagination->hasNextPage() ) { ?>
          <div class="next">
            <?= html::a($pagination->nextPageURL(), 'Older Posts', ['class' => 'button']) ?>
          </div>
        <? } ?>
        <? if ( $pagination->hasPrevPage() ) { ?>
          <div class="previous">
            <?= html::a($pagination->prevPageURL(), 'Newer Posts', ['class' => 'button']) ?>
          </div>
        <? } ?>
      </div>
    <? } ?>
  </div>
</section>

<? snippet('footer') ?>
