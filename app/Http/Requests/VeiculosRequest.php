<?php

namespace oficina\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculosRequest extends FormRequest
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
            'placa' => 'required|max:8',
            'marca' => 'required|max:30',
            'modelo' => 'required|max:255',
            'cor' => 'required|max:255'
        ];
    }

    public function messages(){
        return [
            'required' => 'O campo :attribute deve ser preenchido!'
        ];
        
    }
}
