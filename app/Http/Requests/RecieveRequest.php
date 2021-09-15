<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RecieveRequest extends FormRequest
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
        return [
            // 'employee_id'=>'required|integer|',
            'address' => 'required|string',
            'time_start' => 'required|string',
            // 'desc'=>'required|string',
        ];
    }

    protected function failedValidation(Validator $validator)
    {

        // $errors = collect($validator->errors())->map(function ($error) {
        //     return $error[0];
        // });
        throw new HttpResponseException(response()->json([
            'status' => 'false',
            'errNum' => 422,
            'errors' => implode(',',$validator->messages()->all()),
        ], 422));
    }
}
