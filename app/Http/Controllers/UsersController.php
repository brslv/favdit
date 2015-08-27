<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$data = [
			'user' => \Auth::user(),
		];

		return view('user.index', $data);
	}

	public function edit()
	{
		// Displays the edit user profile page.
	}

	public function update()
	{
		// Performs the actual user pforile update.
	}

}
