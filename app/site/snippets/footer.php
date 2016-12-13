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

    <aside class="cart-control">
      <a href="#" class="snipcart-checkout">Cart</a>
    </aside>

    <?= js([
      '@auto',
      'https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js',
      'assets/js/app.js'
    ]) ?>

    <?= Snipcart::javascript_tag() ?>
  </body>
</html>
