<?php

function message($msg)
{
	$messagesArray = [
		'user_has_no_categories' 				=> 'You don\'t have any categories, yet. Create some from the <code>Create category</code> button (top-left).',
		'user_has_no_categories_to_choose_from'	=> 'You don\'t have any categories to choose from, yet.',
		'user_has_no_favs' 						=> 'You don\'t have any favs, yet. Add some from the <code>Add fav</code> button (top-left).',
		'instruct_create_category_on_new_fav' 	=> 'You can create new category straight from the field below or from the <code>Create category</code> button in the top left corner.',
		'user_has_no_favs_without_category'		=> 'You don\'t have any favs without category.',
		'user_successfully_created_category'	=> 'You have successfully created a new category.',
		'user_successfully_updated_category'	=> 'You have successfully updated the category.',
		'user_successfully_deleted_category'	=> 'You have successfully deleted the category.',
		'user_successfully_created_fav'			=> 'You have successfully deleted the category.',
		'user_successfully_updated_fav'			=> 'You have successfully updated the fav.',
		'user_successfully_deleted_fav'			=> 'You have successfully deleted the fav.',
		'category_does_not_exist'				=> 'It seems this category doesn\'t exist.',
		'category_has_no_favs'					=> 'There are no favs in this category.',
	];

	if (array_key_exists($msg, $messagesArray))
	{
		return $messagesArray[$msg];
	}
	else
	{
		return null;
	}
}