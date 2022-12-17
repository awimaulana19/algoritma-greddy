<?php

namespace App\Http\Requests;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Http\FormRequest;

class JadwalDokterAdminRequest extends FormRequest
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
            'tanggal' => 'required',
            'jam' => 'required',
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'jam.required' => 'Jam tidak boleh kosong',
            'user_id.required' => 'Pilihan dokter tidak boleh kosong',
            Alert::error('Gagal', 'Jadwal Gagal Dibuat')
        ];
    }
}
