<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LivrosFormRequestUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|max: 100|min: 1',
            'autor' => 'required|max: 100|min: 1',
            'data_lancamento' => 'required|date',
            'editora' => 'required|max: 100|min: 1',
            'sinopse' => 'required|max: 1000|min: 200',
            'genero' => 'required|max: 100|min: 1',
            'avaliacao' => 'max: 1000|min: 1',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages(){

        return[
            'titulo.required' => 'o campo titulo é obrigatório',
            'titulo.max' => 'o campo titulo deve conter, no máximo, 100 caracteres',
            'titulo.min' => 'o campo titulo deve conter, no mínimo, 1 caracteres',

            'autor.required' => 'o campo autor é obrigatório',
            'autor.max' => 'o campo autor deve conter, no máximo, 100 caracteres',
            'autor.min' => 'o campo autor deve conter, no mínimo, 1 caracteres',

            'data_lancamento.required' => 'o campo data_lancamento é obrigatório',
            'data_lancamento.date' => 'o campo data_lancamento deve conter apenas números',

            'editora.required' => 'o campo editora é obrigatório',
            'editora.max' => 'o campo editora deve conter, no máximo, 100 caracteres',
            'editora.min' => 'o campo editora deve conter, no mínimo, 1 caracteres',

            'sinopse.required' => 'o campo sinopse é obrigatório',
            'sinopse.max' => 'o campo sinopse deve conter, no máximo, 1000 caracteres',
            'sinopse.min' => 'o campo sinopse deve conter, no mínimo, 200 caracteres',

            'genero.required' => 'o campo genero é obrigatório',
            'genero.max' => 'o campo genero deve conter, no máximo, 100 caracteres',
            'genero.min' => 'o campo genero deve conter, no mínimo, 1 caracteres',

            'avaliacao.required' => 'o campo avaliacao é obrigatório',
            'avaliacao.max' => 'o campo avaliacao deve conter, no máximo, 100 caracteres',
            'avaliacao.min' => 'o campo avaliacao deve conter, no mínimo, 1 caracteres',
        ];
    }
}
