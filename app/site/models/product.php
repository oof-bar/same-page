<? class ProductPage extends Page {
  public function formatted_price () {
    return '$' . preg_replace('/\.00$/', '', number_format($this->float_price(), 2));
  }

  public function float_price () {
    return $this->price()->float();
  }

  public function options () {
    return $this->variations()->toStructure()->groupBy('attribute');
  }

  public function serialize_options () {
    $attrs = [];

    foreach ( $this->options() as $attribute => $options ) {
      $index = array_search($attribute, array_keys($this->options()->toArray())) + 1;
      # Name the group. Keys must be in the format: `data-item-custom4-name` / `data-item-custom4-options`
      $attrs["data-item-custom$index-name"] = $options->first()->attribute()->toString();
      $attrs["data-item-custom$index-options"] = join(array_map(function ($variation) {
          if ( !$variation->adjustment()->empty() ) {
            $adjustment = $variation->adjustment()->float();
            $sign = $adjustment > 0 ? '+' : '';

            return $variation->value() . '[' . $sign . number_format($adjustment, 2) . ']';
          } else {
            return $variation->value();
          }
        }, $options->toArray()), '|');
    }

    return $attrs;
  }

  public function variation_difference ($price) {
    return $this->float_price() + floatval($price);
  }

  public function buy_button () {
    $unit = !$this->base_unit()->empty() ? '/' . $this->base_unit() : '';
    $price = html::tag('div', $this->formatted_price() . $unit, ['class' => 'price']);
    $add = html::tag('div', 'Add to Cart', ['class' => 'add-to-cart']);

    return html::a('#', $price . $add, array_merge([
      'class' => 'buy snipcart-add-item',
      'data-item-id' => $this->uid(),
      'data-item-name' => $this->title(),
      'data-item-price' => number_format($this->float_price(), 2),
      'data-item-weight' => $this->weight(),
      'data-item-url' => page('shop')->url(),
      'data-item-description' => $this->cart_notes()
    ], $this->serialize_options()));
  }

  public function verification_url () {
    return url("json/product/{$this->uid()}");
  }

  public function verification_params () {
    return [
      'id' => $this->uid(),
      'price' => $this->float_price(),
      'url' => $this->verification_url()
    ];
  }
}
