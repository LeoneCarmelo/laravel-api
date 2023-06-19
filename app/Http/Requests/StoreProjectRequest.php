<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:projects|max:100',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:999|',
            'description' => 'required|max:65535',
            'link_project' => 'required|max:255',
            'link_website' => 'required|max:255',
            'type_id' => 'exists:types,id',
            'technologies' => 'exists:technologies,id'
        ];
    }
}
