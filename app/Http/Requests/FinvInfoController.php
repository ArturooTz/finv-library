<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinvInfoController extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shortname' => 'required|max:75',
            'site_url' => 'required|max:75',
            'description' => 'max:255',
            'image-input' => 'required|mimes:jpeg,jpg,png',
            'files-input' => 'required|mimes:asp,less'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'shortname.required' => 'A site shortname is required.',
            'site_url.required' => 'A site URL is required.',
            'description.max' => 'The max lenght of characters is 255.',
            'image-input.required' => 'A preview image is required.',
            'image-input.mimes' => 'The only type of images allowed are JPG and PNG.',
            'files-input.required' => 'The main.asp and main-home.less are required.',
            'files-input.mimes' => 'The main.asp and main-home.less are required.',
        ];
    }
}
