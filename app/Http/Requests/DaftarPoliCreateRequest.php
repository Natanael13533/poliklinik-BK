<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DaftarPoliCreateRequest extends FormRequest
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
            'keluhan' => 'required',
            'id_jadwal' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'id_jadwal' => 'jadwal',
        ];
    }

    public function messages()
    {
        return [
            'keluhan.required' => 'Keluhan wajib di isi',
            'id_jadwal.required' => 'Jadwal wajib di isi',
        ];
    }
}
