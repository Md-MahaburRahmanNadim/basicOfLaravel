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
        // this give the access to user perform the request task
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $roles = [
            'title'=>'required|max:255|unique:posts,title,'.$this->id,
            // it's mean that title is unique but editable
            'excerpt'=>'required',
            'body'=>'required',
            'image'=>['mimes:jpg,png,jpeg','max:5048'],
            'min_to_read'=>'min:0|max:60',
        ];
        if(in_array($this->method(),['post'])){
            $roles['image'] = ['required','mimes:jpg,png,jpeg','max:5048'];
        }
        return $roles;
    }
}
