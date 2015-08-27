<?php

namespace App\Http\Controllers;

use App\Category;
use App\Fav;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;
use Psy\Exception\ErrorException;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function manage()
    {	
		$data = [
			'categories' => Category::getAllPaginated(),
		];
    	
    	return view('back.manage.index', $data);
    }

    public function create()
    {
        return view('back.create.category');
    }

    public function store(CreateCategoryRequest $request)
    {
        Category::persist($request);

        session()->flash('flash_message', message('user_successfully_created_category'));

        return redirect('/favs');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('back.update.category', ['category' => $category]);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update($request->all());

        session()->flash('flash_message', message('user_successfully_updated_category'));

        return redirect('/categories/manage');
    }

    /**
     * Deletes a category from the database.
     * 
     * @param  int $id
     * @return redirect
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $favsInThisCategory = $category->favs;

        foreach ($favsInThisCategory as $fav) {
            $fav->category_id = null;
            $fav->save();
        }

        $category->delete();

        session()->flash('flash_message', message('user_successfully_deleted_category'));

        return redirect('categories/manage');
    }

}
