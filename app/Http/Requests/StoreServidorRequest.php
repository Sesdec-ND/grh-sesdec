<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServidorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cpf' => ['required', 'string', 'max:14', 'unique:servidors,cpf'],
            'nome' => ['required', 'string', 'max:255'],
            'data_nascimento' => ['nullable', 'date'],
            'genero' => ['nullable', 'in:MASCULINO,FEMININO,NAO_INFORMADO'],
            'raca_cor' => ['nullable', 'in:BRANCA,PRETA,PARDA,AMARELA,INDIGENA,NAO_INFORMADO'],
            'tipo_sanguineo' => ['nullable', 'in:A+,A-,B+,B-,AB+,AB-,O+,O-'],
        ];
    }
}
