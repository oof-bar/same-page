<? return function ($site, $pages, $page) {
  return [
    'posts' => $page->children()->visible()->flip()
  ];
};
