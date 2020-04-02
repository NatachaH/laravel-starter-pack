<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        $isNew = $this->getMethod() == 'POST';

        return [
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => ($isNew ? 'required' : 'nullable').'|min:6|confirmed',
            'password_confirmation' => ($isNew ? 'required' : 'nullable')
        ];
    }
}
