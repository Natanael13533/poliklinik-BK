<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoliCreateRequest extends FormRequest
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
            'nama_poli' => 'max:25|required',
            'keterangan' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_poli.max' => 'Nama maksimal :max karakter',
            'nama_poli.required' => 'Nama wajib di isi',
            'keterangan.required' => 'Keterangan wajib di isi',
        ];
    }
}
