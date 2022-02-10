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
            'id_number' => 'required|unique:records',
            'fName' => 'required',
            'mName' => 'required',
            'lName' => 'required',
        ];
    }
    public function messages()
    {
        return [
            // 'id_number' => [
            //     'required' => 'ID number is required',
            //     'unique' => 'ID numbe must be unique'
            // ],
            'id_number.required' => 'ID Number is Required',
            'id_number.unique' => 'ID Number must be unique',
            'fName.required' => 'First Name is required',
            'mName.required' => 'Middle Name is required',
            'lName.required' => 'Last Name is required',
        ];
    }
}
