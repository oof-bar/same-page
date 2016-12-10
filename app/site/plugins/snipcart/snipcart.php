<? class Snipcart {
  private static $version = '2.0';

  public static function javascript_tag ($id = 'snipcart') {
    return html::tag('script', null, [
      'id' => $id,
      'src' => 'https://cdn.snipcart.com/scripts/' . static::$version . '/snipcart.js',
      'data-api-key' => c::get('snipcart.key')
    ]);
  }
}
