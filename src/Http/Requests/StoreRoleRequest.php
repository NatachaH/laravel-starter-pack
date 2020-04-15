<?php

namespace Nh\StarterPack\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use Nh\StarterPack\Rules\Lowercase;
use Nh\StarterPack\Rules\WithoutSpace;

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
            'name' => ['required', Rule::unique('roles', 'name')->ignore($this->role), new Lowercase, new WithoutSpace]
        ];
    }
}
