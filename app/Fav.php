<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateFavRequest;
use Illuminate\Database\Eloquent\Model;
use App\Custom\Defaults;
use App\Factories\FavFactory;

class Fav extends Model
{
    
    protected $fillable = [
        'title',
        'link',
        'description',
        'category_id',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get all favs by the authorized user.
     *
     * @return mixed
     */
    public static function getAll()
    {
        $favs['all'] = Auth::user()->favs()
            ->latest()
            ->where('status', '=', 1)
            ->paginate(Defaults::PAGINATION_PER_PAGE);

        $favs['withoutCategory'] = (Auth::user()->favs()
            ->latest()
            ->where('category_id', '=', null)
            ->where('status', '=', 1)
            ->paginate(Defaults::PAGINATION_PER_PAGE));

        return $favs;
    }

    /**
     * Retrieve a fav from the database by a given slug.
     * 
     * @param  string $slug Fav slug
     * @return [type]       [description]
     */
    public static function getByCategorySlug($slug)
    {
        if ( ! Category::exists($slug))
        {
            return false;
        }

        $categoryId = Auth::user()->categories()
            ->where('slug', '=', $slug)
            ->first()
            ->id;

        $favs = Auth::user()->favs()
            ->latest()
            ->where('category_id', '=', $categoryId)
            ->where('status', '=', 1)
            ->paginate(Defaults::PAGINATION_PER_PAGE);

        return $favs;
    }

    public static function persist(CreateFavRequest $request)
    {
        $request->validate();

        return Auth::user()->favs()->save(
            FavFactory::make($request->all())
        );
    }

    /**
     * Change a fav's category id to null
     * 
     * @param  int $id Id of the fav
     * @return void
     */
    private function changeCategoryToNull()
    {
        $this->category_id = null;
        $this->save();
    }

}
