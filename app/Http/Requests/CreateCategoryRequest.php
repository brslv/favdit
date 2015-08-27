<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class CreateCategoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $authUserId = Auth::user()->id;

        return [
            'title' => 'unique:categories,title,null,id,user_id,' . $authUserId . '|required|min:3|max:255',
            'description' => 'max:255',
        ];
    }
}
