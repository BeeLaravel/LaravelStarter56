<?php
namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PostCommentRequest extends FormRequest {
    public function authorize() {
        return true;
    }
    public function rules() {
        return [
            'slug' => 'required|unique:posts',
            'title' => 'required',
            'sort' => 'bail|integer|min:0|max:255',
        ];
    }
}
