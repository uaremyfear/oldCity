<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagodaEditRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'name'=>'required',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'founder_id' => 'required|integer',
            'built_in' => 'required|integer|between:0,1900',
            'description' => 'required',
        ];

        if(! is_null(FormRequest::get('image') ) )
        {
            $rules['image'] = 'required|mimes:jpeg,jpg,bmp,png|max:22097152';
        }

        return $rules;
    }

     /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
     public function messages()
     {
        return [
        'lat.required' => 'Lattitude field is required',
        'lng.required' => 'Longitude field is required',
        'founder_id.required' => 'Founder name is required',
        'founder_id.integer' => 'Founder name is invalid',
        'built_in.required'  => 'The Built Year is required',
        'built_in.integer'  => 'The Built Year is wrong format',
        'built_in.between'  => 'The Built Year is invalid',
        ];
    }
}
