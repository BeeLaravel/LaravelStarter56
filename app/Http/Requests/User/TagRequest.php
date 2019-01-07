<?php
namespace App\Http\Requests\Link;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest {
    public function authorize() {
        return true;
    }
    public function rules() {
        return [
            'slug' => 'required|unique:link_tags',
            'title' => 'required',
            'sort' => 'bail|integer|min:0|max:255',
        ];
    }
    public function messages() {
        return [];
    }
}
