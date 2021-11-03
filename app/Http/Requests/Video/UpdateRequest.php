<?php

namespace App\Http\Requests\Video;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->id === $this->video->user_id;
        // dd($this);
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
            'file' => 'nullable|mimes:mp4,mov,ogg,qt|max:1000000'
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'Please enter a video title',
            'file.nullable' => 'Please select a video file',
        ];
    }
}
