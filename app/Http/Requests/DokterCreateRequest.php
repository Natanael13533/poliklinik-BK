<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DokterCreateRequest extends FormRequest
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
            'no_hp' => 'required',
            'id_poli' => 'required',
            'user_id' => 'nullable',
            'email' => 'required|email', // Exclude current user if updating
            'password' => 'nullable|min:8'
        ];
    }

    public function attributes()
    {
        return [
            'id_poli' => 'poli',
            'user_id' => 'user'
        ];
    }

    public function messages()
    {
        return [
            'nama.max' => 'Nama maksimal :max karakter',
            'nama.required' => 'Nama wajib di isi',
            'alamat.required' => 'Alamat wajib di isi',
            'no_hp.required' => 'No. HP wajib di isi',
            'id_poli' => 'Poli wajib di isi',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format email tidak valid',
            'password.min' => 'Password minimal :min karakter',
        ];
    }
}
