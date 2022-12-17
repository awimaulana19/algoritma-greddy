<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'nama' => 'required',
            'spesialis' => 'required',
            'nomor_hp' => 'required',
            'username' => 'required | unique:users',
            'gambar' => 'required',
            'password' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return[
            'nama.required' => 'Nama tidak boleh kosong',
            'spesialis.required' => 'Spesialis tidak boleh kosong',
            'nomor_hp.required' => 'Nomor HP tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah terpakai',
            'gambar.required' => 'Gambar tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password tidak boleh kurang dari 3 karakter'
        ];
    }
}
