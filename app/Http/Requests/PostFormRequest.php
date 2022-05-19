<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
            // 'user_id' => 
            'title' => 'required',
            'description' => 'required',
            'image_path' => 'required|mimes:jpg,png,jpeg|max:5048',
            'category' => 'required',
            'status' => 'unconfirmed',
            'pined' => 'unpined',
            'no_of_comment'=> 0,
            
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => strip_tags($this->user_id),
            'title' => strip_tags($this->title),
            'description' => strip_tags($this->description),
            'image_path' => strip_tags($this->image_path),
            'category' => strip_tags($this->category),
            'status' => strip_tags($this->status),
            'pined' => strip_tags($this->pined),
            'no_of_comment' => strip_tags($this->no_of_comment),

        ]);
    }
}
