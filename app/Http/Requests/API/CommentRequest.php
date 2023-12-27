<?php

namespace App\Http\Requests\API;

use App\SOLID\Traits\JsonTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CommentRequest extends FormRequest
{
    use JsonTrait;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'post_id' => [
                'required',
                'numeric',
                'exists:posts,id',
            ]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $err = $validator->errors()->first();
        throw new HttpResponseException($this->whenError($err));
    }
}
