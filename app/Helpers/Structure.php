<?php
// ##  Structure
use App\Models\Structure\Category;
use App\Models\Structure\CategoryItem;

function category($category_id, $parent_id=0) {
	$category = Category::find($category_id);

	$data = $category->items
		->where('parent_id', $parent_id)
		->pluck('title', 'id');

	return $data;
}
function cate($category_id) {
	if ( !is_integer($category_id) ) $category_id = Category::where('slug', $category_id)->value('id');

	$data = CategoryItem::where('category_id', $category_id)
		->all();

	return $data;
}