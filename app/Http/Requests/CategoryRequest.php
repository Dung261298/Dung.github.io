<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
   public function rules(Request $request)
    {
        if ($this->method()=='PUT') {
            return [
                'name'=>'required|max:255|unique:categories,name,'.$request->get('id'),
                'description' => 'required|max:500'
            ];
        }else{
            return [
                'name' => 'required|max:255',
                'name'=>'required|unique:categories,name,'.$this->id,
                'description' => 'required|max:500'
            ]; 
        }
    }
    public function messages()
    {
        return [
            'name.required'=>'Please enter a category name.',
            'name.unique' => 'Category name already exists.',
            'name.max'=>'Maximum length is 100 characters.',
            'description.required'=>'Please enter a description.',
            'description.max'=>'Maximum length is 500 characters.'
        ];
    }
}