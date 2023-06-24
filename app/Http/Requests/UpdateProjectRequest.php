<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', Rule::unique('projects', 'title')->ignore($this->project), 'max:100'],
            'image' => ['required','image', 'max:9999'],
            'description' => ['required', 'max:65535'],
            'link_project' => ['required', 'max:255'],
            'link_website' => ['required', 'max:255'],
            'type_id' => ['exists:types,id'],
            'technologies' => ['exists:technologies,id']
        ];
    }
}
