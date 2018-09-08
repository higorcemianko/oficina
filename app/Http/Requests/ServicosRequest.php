<?php

namespace oficina\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicosRequest extends FormRequest
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
            'codigo' => 'required|max:20',
            'descricao' => 'required|max:255'
            //
        ];
    }
}
