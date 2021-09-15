<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CartRequest extends FormRequest
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
            'sup_category_id' => 'required|exists:sup_categories,id',
            // 'desc'=>'required|string',
            'num_workers' => 'required|integer',
            'clean_resources' => 'required|in:yes,no',
        ];
    }
    protected function failedValidation(Validator $validator)
    {

        $errors = collect($validator->errors())->map(function ($error) {
            return $error[0];
        });
        throw new HttpResponseException(response()->json([
            'status' => 'false',
            'errNum' => 422,
            'errors' => array_values($errors->toArray()),
        ], 422));
    }
}
