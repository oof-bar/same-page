<div class="post">
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
