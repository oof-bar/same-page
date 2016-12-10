<? snippet('header') ?>

<section class="members">
  <div class="wrap">
    <ul class="member-list">
      <? foreach ( $page->members()->toStructure() as $member ) { ?>
        <li class="member">
          <div class="profile-photo">
            <figure class="avatar" data-background-image="<?= Help::resize($member->photo()->toFile(), 'large')->url() ?>">
              
            </figure>
          </div>
          <div class="about">
            <div class="name">
              <h3><?= $member->name() ?></h3>
            </div>
            <div class="bio">
              <?= $member->bio()->kirbytext() ?>
            </div>
            <div class="link">
              <a href="<?= $member->link() ?>" class="button" target="_blank">Website</a>
            </div>
          </div>
        </li>
      <? } ?>
    </ul>
  </div>
</section>

<? snippet('footer') ?>
