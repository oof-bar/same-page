    </main>
    <footer>
      <div class="colophon">
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
      </div>
    </footer>
    <?= js(['@auto', 'assets/js/app.js']) ?>
  </body>
</html>
