<?php

namespace oficina\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest
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
            'cpfcnpj' => 'required|max:15',
            'nome' => 'required|max:255',
            'email' => 'required|max:30'
        ];
    }

    public function messages(){
        return [
            'required' => 'O campo :attribute deve ser preenchido!'
        ];
        
    }
}
