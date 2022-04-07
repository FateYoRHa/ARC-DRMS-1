<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRecordsRequest extends FormRequest
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
            'id_number' => [
                'required',
                Rule::unique('records', 'id_number')->ignore($this->record, 'record_id')
            ],
            'inputFname' => 'required',
            'inputMname' => 'required',
            'inputLname' => 'required',
            'files' => 'nullable',
            'files.*' => 'mimes:pdf'
        ];
    }

    public function messages()
    {
        return [
            'id_number.required' => 'ID Number is required',
            'id_number.unique' => 'ID Number must be unique',
            'inputFname.required' => 'First Name is required',
            'inputMname.required' => 'Middle Name is required',
            'inputLname.required' => 'Last Name is required',
            'files.*.mimes' => 'File must be a PDF'
        ];
    }
}
