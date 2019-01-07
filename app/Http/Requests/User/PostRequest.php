<?php
namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest {
    public function authorize() {
        return true;
    }
    public function rules() {
        $id = request('id');
        return [
            'slug' => 'required|unique:posts,slug,'.$id,
            'title' => 'required',
            'sort' => 'bail|integer|min:0|max:255',
        ];
    }
}
