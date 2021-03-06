<?php

namespace App\Http\Requests\Api\Speaker;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => 'sometimes|required',
            'email' => [
                'sometimes',
                'required',
                'email',
                Rule::unique('speakers', 'email')->ignore($this->speaker, 'id')
            ],
            'phone_number' => 'sometimes|required',
            'address' => 'sometimes|required'
        ];
    }
}
