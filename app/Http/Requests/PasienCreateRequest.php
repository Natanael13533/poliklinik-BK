<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasienCreateRequest extends FormRequest
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
            'nama' => 'max:150|required',
            'alamat' => 'required',
            'no_ktp' => 'required',
            'no_hp' => 'max:10|required',
            'no_rm' => 'max:10|required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama wajib di isi',
            'nama.max' => 'Nama maksimal :max karakter',
            'alamat.required' => 'Alamat wajib di isi',
            'no_hp.required' => 'No. HP wajib di isi',
            'no_ktp.required' => 'No. KTP wajib di isi',
            'no_rm.required' => 'No. Room wajib di isi',
        ];
    }
}
