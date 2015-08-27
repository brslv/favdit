<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Custom\Defaults;
use App\Http\Requests\CreateCategoryRequest;
use App\Factories\CategoryFactory;

class Category extends Model implements SluggableInterface
{

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to' => 'slug',
    ];

    protected $fillable = [
        'title',
        'description',
    ];

    public function favs()
    {
        return $this->hasMany('App\Fav');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Persists a category to the database.
     * Uses CreateCategoryRequest request type.
     * 
     * @param  CreateCategoryRequest $request [description]
     * @return [type]                         [description]
     */
    public static function persist(CreateCategoryRequest $request)
    {
        $request->validate();

        $category = CategoryFactory::make($request->all());

        return Auth::user()->categories()->save($category);
    }

    /**
     * Persists a category to the database.
     * Uses raw information, passed as an array.
     * 
     * @param  array $information Information about the new category
     * @return App\Category             The new category
     */
    public static function persistRaw($information)
    {
        $category = CategoryFactory::make($information);

        return Auth::user()->categories()->save($category);   
    }

    /**
     * Get all categories for a specific user.
     *
     * @return mixed
     */
    public static function getAll()
    {
        return Auth::user()->categories()->latest()->get();
    }
    
    /**
     * Get all categories with pagination
     * 
     * 
     */
    public static function getAllPaginated()
    {
        return Auth::user()->categories()->latest()->paginate(Defaults::PAGINATION_PER_PAGE);
    }

    /**
     * Checks if a category exists
     */
    public static function exists($slug)
    {
        return Auth::user()->categories()->where('slug', '=', $slug)->first();
    }

}
