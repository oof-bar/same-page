<? return function ($site, $pages, $page) {
  $products = $page->children()->visible();

  return compact(['products']);
};
