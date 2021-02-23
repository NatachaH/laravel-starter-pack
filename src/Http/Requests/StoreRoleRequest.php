<?php

namespace Nh\StarterPack\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use Nh\StarterPack\Rules\Slug;

class StoreRoleRequest extends FormRequest
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
            'guard' => ['required', Rule::unique('roles', 'guard')->ignore($this->role), new slug],
            'name' => ['required']
        ];
    }
}
