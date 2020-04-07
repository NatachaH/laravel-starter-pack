<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => ['required'],
            'email' => ['required','email', Rule::unique('users', 'email')->ignore($this->user)],
            'password' => [($isNew ? 'required' : 'nullable'),'min:6','confirmed'],
            'password_confirmation' => [($isNew ? 'required' : 'nullable')]
        ];
    }
}
