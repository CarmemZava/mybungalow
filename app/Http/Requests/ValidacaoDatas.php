<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacaoDatas extends FormRequest
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

        //A variável $today guarda o dia de "hoje" e vai ser usada vai validar as data escolhidas pelo usuário
        $today=date('Y-m-d');

        return [
            'data_inicio' => ['required', 'date', "after_or_equal:$today"],
            'data_fim' => ['required', 'date', "after:data_inicio"],
            'hospedes' => ['required', 'integer', 'min:1', 'max:10'],
        ];
    }

    public function messages()
    {
        return [
            'data_inicio.required' => 'Please provide a check-in date.',
            'data_inicio.after_or_equal' => 'Check-in date must be today or later.',
            'data_fim.required' => 'Please provide a check-out date.',
            'data_fim.after_or_equal' => 'Check-out date must be after check-in date.',
            'hospedes.required' => 'Please select the number of guests.',
        ];
    }
}
