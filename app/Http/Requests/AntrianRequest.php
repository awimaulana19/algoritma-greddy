<?php

namespace App\Http\Requests;

use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Http\FormRequest;

class AntrianRequest extends FormRequest
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
            'nama' => 'required|max:255',
            'wa' => 'required|numeric',
            'tgl_periksa' => ['required', 'date', 'after:'.Carbon::yesterday()->toDateString()],
            'jam_periksa' => 'required',
            'user_id' => 'required',
            'deskripsi' => 'required'
        ];
    }

    public function messages()
    {
        return[
            Alert::error('Gagal', 'Antrian Gagal Dibuat, Harap Periksa Kembali Inputan Anda')
        ];
    }
}
