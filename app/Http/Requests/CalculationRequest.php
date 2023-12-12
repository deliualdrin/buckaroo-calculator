<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculationRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->id == $this->route('user');
    }

    public function rules()
    {
        return [
            'operator' => 'required|in:add,subtract,multiply,divide',
            'operand1' => 'required|numeric',
            'operand2' => 'required|numeric',
        ];
    }
}
