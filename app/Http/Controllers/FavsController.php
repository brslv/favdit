<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Request as RequestFacade;

use App\Http\Requests\CreateFavRequest;
use App\Http\Controllers\Controller;
use App\Fav;
use Illuminate\Support\Facades\Auth;

class FavsController extends Controller
{
	
	private $favs;
	
	private $categories;

    public function __construct()
    {
        $this->middleware('auth');
        
        if (Auth::user()) 
        {
	        $this->favs = Fav::getAll();
	        $this->categories = Category::getAll();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('back.home', [
            'favs' => $this->favs['all'],
            'selectedCategory' => 'All',
            'categories' => $this->categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('back.create.fav', [
        	'categories' => $this->categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFavRequest $request
     * @return Response
     */
    public function store(CreateFavRequest $request)
    {
        Fav::persist($request);

        session()->flash('flash_message', message('user_successfully_created_fav'));
        
        return redirect('/favs');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        try 
        {
            $fav = Fav::where('id', '=', $id)
                ->where('status', '=', 1)
                ->firstOrFail();
        }
        catch (\Exception $e)
        {
            return redirect('favs/manage');
        }

        $favCategoryId = $fav->category ? $fav->category->id : null;        

        return view('back.update.favs', [
            'fav' => $fav,
            'categories' => $this->categories,
            'favCategoryId' => $favCategoryId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $fav = Fav::find($id);

        if ($request->category_id == 0) 
        {
            $request['category_id'] = null;
        }

        if ($request->new_category != "") 
        {
            Auth::user()->categories()->create(['title' => $request->new_category, 'description' => null]);
            $request['category_id'] = Category::where('title', '=', $request->new_category)->firstOrFail()->id;
        }

        $fav->update($request->all());

        session()->flash('flash_message', message('user_successfully_updated_category'));

        return redirect('favs/manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $fav = Fav::findOrFail($id);

        $fav->status = 0;

        $fav->save();

        session()->flash('flash_message', message('user_successfully_deleted_fav'));

        return redirect('favs/manage');
    }
    
    /**
     * Renders the dashboard for manageing all user's favs.
     * 
     * @return \Illuminate\View\View
     */
    public function manage()
    {   
        $data = [
            'favs' => $this->favs['all'],
        ];
        
        return view('back.manage.index', $data);
    }

    /**
     * Renders all favs without category.
     * 
     * @return view
     */
    public function withoutCategory()
    {
        $data = [
            'favs' => $this->favs['withoutCategory'],
            'fails' => [],
            'selectedCategory' => 'Without-category',
            'categories' => $this->categories,
        ];
        
        if (count($this->favs['withoutCategory']) < 1)
        {
            array_push($data['fails'], message('user_has_no_favs_without_category'));
        }
        
        return view('back.favs_without_category', $data);
    }

    /**
     * Renders all favs by a given category slug.
     * 
     * @param  string $slug
     * @return [type]
     */
    public function byCategory($slug)
    {
        $favsByCategory = Fav::getByCategorySlug($slug);

        $data = [
            'favs' => $favsByCategory,
            'fails' => [],
            'selectedCategory' => Category::where('slug', '=', $slug)->first()->title,
            'categories' => $this->categories,
        ];

        if ( ! Category::exists($slug))
        {
            array_push($data['fails'], message('category_does_not_exist'));
        }

        if (count($favsByCategory) < 1)
        {
            array_push($data['fails'], message('category_has_no_favs'));
        }

        return view('back.favs_by_category', $data);
    }

}
