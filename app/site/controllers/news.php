<? return function ($site, $pages, $page) {
  $posts = $page->children()->visible()->flip()->paginate(4);
  $pagination = $posts->pagination();

  return compact(['posts', 'pagination']);
};
