<?php
namespace App\Http\Requests\Link;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest {
    public function authorize() {
        return true;
    }
    public function rules() {
        return [
            'title' => 'required',
            'sort' => 'bail|integer|min:0|max:255',
        ];
    }
    public function messages() {
        return [];
    }
}
