<?php
namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest {
    public function authorize() {
        return true;
    }
    public function rules() {
        return [
            'content' => 'required',
        ];
    }
    public function messages() {
        return [];
    }
}
