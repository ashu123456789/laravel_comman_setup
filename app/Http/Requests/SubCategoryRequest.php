<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
        if (!request()->is('admin/sub_categories/create')) {
            return [
                'name' => 'required',
                'category_id' => 'required',
                'description' => 'required',
            ];
        } else {
            return [
                'name' => 'required',
                'category_id' => 'required',
                'description' => 'required',
                'image' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required', ['attribute' => 'Name']),
            'category_id.required' => __('validation.required', ['attribute' => 'Category']),
            'description.required' => __('validation.required', ['attribute' => 'Description']),
            'image.required' => __('validation.required', ['attribute' => 'Image']),
        ];
    }
}
