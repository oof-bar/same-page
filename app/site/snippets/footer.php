    </main>
    <footer>
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
    </footer>
    <?= js(['@auto', 'assets/js/app.js']) ?>
  </body>
</html>
