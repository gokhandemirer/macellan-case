<?php

namespace App\Http\Requests\Gate;

use Illuminate\Foundation\Http\FormRequest;

class OpenGateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'point'     => 'required|string',
            'order_id'  => 'required|string',
            'user_id'   => 'required|string',
            'ref_code'  => 'required|string',
            'hash'      => 'required|string',
        ];
    }
}
