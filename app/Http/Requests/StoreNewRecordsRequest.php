<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\map;

class StoreNewRecordsRequest extends FormRequest
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
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_number' => 'required|unique:records|min:4|max:10',
            'inputFname' => 'required',
            // 'inputMname' => 'required',
            // 'inputLname' => 'required',
            'files' => 'nullable',
            'files.*' => 'mimes:pdf'
        ];
    }
    public function messages()
    {
        return [
            'id_number.required' => 'Id number is required',
            'id_number.unique' => 'Id number is already taken',
            'id_number.min' => 'Id number must not be lesser than 4 digits',
            'id_number.max' => 'Id number must not be greater than 10 digits',
            'inputFname.required' => 'First Name is required',
            // 'inputMname.required' => 'Middle Name is required',
            // 'inputLname.required' => 'Last Name is required',
            'files.*.mimes' => 'File must be a PDF'
        ];
    }
}
