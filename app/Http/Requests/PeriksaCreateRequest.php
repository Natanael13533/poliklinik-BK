<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeriksaCreateRequest extends FormRequest
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
            'catatan' => 'required',
            'biaya_periksa' => 'required',
            'id_obat' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'id_obat' => 'obat',
        ];
    }

    public function messages()
    {
        return [
            'catatan.required' => 'Catatan wajib di isi',
            'biaya_periksa.required' => 'Biaya Periksa wajib di isi',
            'id_obat' => 'Poli wajib di isi',
        ];
    }
}
