<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validasiRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'lama' => 'required|numeric|min:1'
        ];
    }

    public function messages()
    {
     return[
        'lama.required' => 'Lama kerja tidak boleh kosong',
        'lama.numeric' => 'Lama kerja harus di isi dengan angka',
        'lama.min' => 'Lama kerja harus minimal 1'
     ];
    }
}
