<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaRequest extends FormRequest
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
            'nome' => 'required|max:50|min:3',
            'prezzo' => 'required',
            'ingredienti' => 'required|max:50|min:3',
            'vegetariano' => 'required',
        ];
    }

    private function validateMessages()
    {
        return [
            'nome.required' => 'Il nome è obbligatorio',
            'nome.max' => 'Il nome deve avere al massimo :max caratteri',
            'nome.min' => 'Il nome deve avere minimo :min caratteri',
            'prezzo.required' => 'Il prezzo è obbligatorio',
            'ingredienti.required' => 'Gli ingredienti sono obbligatori',
            'ingredienti.max' => 'Gli ingredienti devono essere massimo di :max caratteri',
            'ingredienti.min' => 'Gli ingredienti devono essere minimo di :min caratteri',
            'vegetariano.required' => 'Campo obbligatorio',
        ];
    }
}
