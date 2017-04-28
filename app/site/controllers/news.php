<? return function ($site, $pages, $page) {
  $posts = $page->children()->visible()->sortBy('datetime', 'desc')->paginate(4);
  $pagination = $posts->pagination();

  return compact(['posts', 'pagination']);
};
