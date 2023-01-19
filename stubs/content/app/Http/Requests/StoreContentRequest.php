<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Nh\StarterPack\Rules\Slug;

class Store{{ UCNAME }}Request extends FormRequest
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
        //$isNew = $this->getMethod() == 'POST';

        return [
            'slug'  => ['required', new Slug, Rule::unique('{{ PNAME }}', 'slug')->ignore($this->{{ NAME }})],
            'title' => ['required'],
            'media_to_add.*.file' => ['file', 'mimes:jpeg,png'],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'media_to_add.*.file' => Str::lower(__('sp::field.file')),
        ];
    }
}
