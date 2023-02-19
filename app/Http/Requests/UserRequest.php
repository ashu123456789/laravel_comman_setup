<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if (!request()->is('admin/users/create')) {
            return [
                'name' => 'required',
                'email' => 'required|email:rfc,dns',
                // 'password' => 'required|same:confirm-password',
                'roles' => 'required',
            ];
        } else {
            return [
                'name' => 'required',
                'email' => 'required|email:rfc,dns|unique:users,email,' . request()->id,
                'password' => 'same:confirm-password',
                'roles' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required', ['attribute' => 'Name']),
            'email.required' => __('validation.required', ['attribute' => 'email']),
            'email.email' => __('validation.email', ['attribute' => 'email']),
            'password.required' => 'Password is Required',
            'roles.required' => 'Role is Required',
        ];
    }
}
