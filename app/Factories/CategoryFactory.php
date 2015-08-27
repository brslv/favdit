<?php

namespace App\Factories;

use App\Category;

/**
* CategoryFactory class
*/
class CategoryFactory implements EntityFactoryInterface
{

	public static function make($information)
	{
		return new Category([
            'title' => self::userWantsToCreateNewCategory($information) ? $information['new_category'] : $information['title'],
            'description' => $information['description']
        ]);
	}

	private static function userWantsToCreateNewCategory($information)
	{
		return isset($information['new_category']);
	}

}