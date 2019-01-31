<?php
namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest {
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
