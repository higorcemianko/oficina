<?php

namespace oficina\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdensRequest extends FormRequest
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
            'id_veiculo' => 'required|max:8',
            'descricao' => 'required|max:250'
            //
        ];
    }

    public function messages(){
        return [
            'required' => 'O campo :attribute deve ser preenchido!'
        ];
        
    }
}
