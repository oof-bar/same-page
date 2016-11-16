<? snippet('header') ?>

<section class="members">
  <div class="wrap">
    <?= $page->members_info()->kirbytext() ?>
    <ul class="member-list">
      <? foreach ( $page->members()->toStructure() as $member ) { ?>
        <li class="member">
          <div class="profile-photo">
            <figure class="avatar">
              <?= html::img( Help::resize($member->photo()->toFile(), 'large')->url()) ?>
            </figure>
          </div>
          <div class="about">
            <div class="name">
              <h3><?= $member->name() ?></h3>
            </div>
            <div class="bio">
              <?= $member->bio() ?>
            </div>
            <div class="link">
              <a href="<?= $member->link() ?>" class="button" target="_blank">Portfolio</a>
            </div>
          </div>
        </li>
      <? } ?>
    </ul>
  </div>
</section>

<? snippet('footer') ?>
