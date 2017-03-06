<? class Help {
  public static function body_classes ($extra = '') {
    $classes = [page()->uid(), page()->template(), $extra];
    return implode(' ', array_unique($classes));
  }

  # Aboslute Asset URLs
  public static function asset_url ($type, $filename) {
    return site()->url() . '/assets/' . $type . '/' . $filename;
  }

  # Asset Fetcher
  public static function asset_file ($type, $filename) {
    return new Media(kirby()->roots->assets() . DS . $type . DS . $filename);
  }

  # Asset Inliner
  public static function inline_asset ($type, $filename) {
    return f::read(kirby()->roots->assets() . DS . $type . DS . $filename);
  }

  # Responsive SVGs
  public static function inline_svg ($file, $dimensions) {
    list($x, $y) = $dimensions;
    $ratio = ($y / $x) * 100;
    $spacer = html::tag('div', '', array(
      'style' => "padding-top: {$ratio}%"
    ));

    return html::tag('div', static::inline_content($file) . $spacer, array(
      'class' => 'responsive-svg'
    ));
  }

  # Content Inliner
  public static function inline_content ($file) {
    return f::read($file);
  }

  # Resizer
  public static function resize ($image, $size = false) {
    switch ($size) {
      # Custom Image Size IDs
      case 'normal':
        return thumb($image, [
          'width' => 1280,
          'quality' => 75
        ]);
        break;
      case 'large':
        return thumb($image, [
          'width' => 2560,
          'quality' => 50
        ]);
        break;
      default:
        return $image;
    }
  }
}
