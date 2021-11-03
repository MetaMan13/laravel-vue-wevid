<?php

namespace App\Http\Requests\Video;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return $this->user() != null;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'bail|required|min:3|max:100',
            'file' => 'bail|required|mimes:mp4,mov,ogg,qt|max:1000000'
        ];
    }

    public function messages()
    {
        return[
            'file.required' => 'Please select a video file'
        ];
    }
}
