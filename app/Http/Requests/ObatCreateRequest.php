<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObatCreateRequest extends FormRequest
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
            'nama_obat' => 'max:50|required',
            'kemasan' => 'required',
            'harga' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_obat.max' => 'Nama Obat maksimal :max karakter',
            'nama_obat.required' => 'Nama wajib di isi',
            'kemasan.required' => 'Kemasan wajib di isi',
            'harga.required' => 'Harga wajib di isi',
        ];
    }
}
