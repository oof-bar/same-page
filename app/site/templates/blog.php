<? snippet('header') ?>

<section class="blog">
  <div class="wrap">
    <?= $page->blog_info()->kirbytext() ?>
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

<? if ( $pagination->hasPages() ) { ?>
<section class="pagination">
  <div class="wrap">
    <div class="next">
      <? if ( $pagination->hasNextPage() ) { ?>
        <?= html::a($pagination->nextPageURL(), 'Older Posts', ['class' => 'button']) ?>
      <? } ?>
    </div>
    <div class="previous">
      <? if ( $pagination->hasPrevPage() ) { ?>
        <?= html::a($pagination->prevPageURL(), 'Newer Posts', ['class' => 'button']) ?>
      <? } ?>
    </div>
  </div>
</section>
<? } ?>

<? snippet('footer') ?>
