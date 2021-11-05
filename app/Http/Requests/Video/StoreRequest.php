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
            'description' => 'bail|nullable|min:5|max:200',
            'file' => 'bail|required|file|mimes:mp4,ogg,qt|max:102400'
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'Please enter a video title!',
            'title.min' => 'Video title must be atleast 3 characters long',
            'title.max' => 'Video title must be less than 100 characters',
            'description.min' => 'Video description must be atleast 5 characters long',
            'description.max' => 'Video description must be less than 100 characters',
            'file.required' => 'Please select a video file',
            'file.mimes' => 'Please select one of the following file types: mp4, mov, ogg, qt',
            'file.max' => 'Please select a file that is less than 100mb'
        ];
    }
}
