<?php

namespace oficina\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutivosRequest extends FormRequest
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
            'cpf' => 'required|max:11',
            'nome' => 'required|max:255',
            'funcao' => 'required|max:20'
        ];
    }

    public function messages(){
        return [
            'required' => 'O campo :attribute deve ser preenchido!'
        ];
        
    }


}
