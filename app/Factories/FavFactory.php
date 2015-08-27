<?php

namespace App\Factories;

use Illuminate\Support\Facades\Auth;
use App\Fav;
use App\Category;
use App\Custom\Defaults;

/**
* Fav Factory class.
*/
class FavFactory implements EntityFactoryInterface
{
	
	public static function make($information)
	{
		return new Fav([
			'title'         => $information['title'],
            'link'          => $information['link'],
            'description'   => $information['description'],
            'status'        => Defaults::FAV_STATUS,
            'category_id'   => self::getCategoryId($information),
		]);
	}

	private static function getCategoryId($information)
	{
		if (self::userWantsToCreateNewCategory($information))
        {
            return Category::persistRaw($information)->id;
        }
        elseif ( ! isset($information['category_id']) || $information['category_id'] == 0)
        {
            return null;
        }
        else
        {
            return $information['category_id'];
        }
	}

	private static function userWantsToCreateNewCategory($input)
    {
        return trim($input['new_category']) != '';
    }

}