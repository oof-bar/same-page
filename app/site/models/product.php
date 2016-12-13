<? class ProductPage extends Page {
  public function formattedPrice () {
    return preg_replace('/\.00$/', '', number_format($this->floatPrice(), 2));
  }

  public function floatPrice () {
    return $this->price()->float();
  }

  public function hasOptions () {
    return $this->variations()->toStructure()->count();
  }

  public function options () {
    return $this->variations()->toStructure()->groupBy('attribute');
  }

  public function serializeOptions () {
    $attrs = [];

    foreach ( $this->options() as $attribute => $options ) {
      $index = array_search($attribute, array_keys($this->options()->toArray())) + 1;
      # Name the group. Keys must be in the format: `data-item-custom4-name` / `data-item-custom4-options`
      # ->first() is acceptable here, as we just need the common metadata for the group
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

  public function variationDifference ($price) {
    return $this->floatPrice() + floatval($price);
  }

  public function buyButton () {
    $unit = !$this->base_unit()->empty() ? '/' . $this->base_unit() : '';

    return new Brick('button', array_merge([
      'class' => 'button buy snipcart-add-item',
      'data-item-id' => $this->uid(),
      'data-item-name' => $this->title(),
      'data-item-price' => number_format($this->floatPrice(), 2),
      'data-item-weight' => $this->weight(),
      'data-item-url' => page('shop')->url(),
      'data-item-description' => $this->cart_notes()
    ], $this->serializeOptions()));
  }

  public function verificationUrl () {
    return url("json/product/{$this->uid()}");
  }

  public function verificationParams () {
    return [
      'id' => $this->uid(),
      'price' => $this->floatPrice(),
      'url' => $this->verificationUrl()
    ];
  }
}
