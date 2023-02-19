<?php

namespace App\Http\Requests;

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
    public function rules()
    {
        if (!request()->is('admin/categories/create')) {
            return [
                'name' => 'required',
                'description' => 'required',
            ];
        }
        else{
            return [
                'name' => 'required',
                'description' => 'required',
                'image' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required', ['attribute' => 'Name']),
            'description.required' => __('validation.required', ['attribute' => 'Description']),
            'image.required' => __('validation.required', ['attribute' => 'Image']),
        ];
    }
}
