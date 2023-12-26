<?php

namespace App\Http\Requests\API\Freind;

use App\SOLID\Traits\JsonTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AcceptFreindRequest extends FormRequest
{
    use JsonTrait;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => [
                'required',
            ],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $err = $validator->errors()->first();
        throw new HttpResponseException($this->whenError($err));
    }
}
