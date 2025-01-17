<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JadwalPeriksaRequest extends FormRequest
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
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            // 'hari_jam' => [
            //     Rule::unique('jadwal_periksas')
            //         ->where('hari', $this->hari)
            //         ->where('jam_mulai', $this->jam_mulai)
            //         ->where('jam_selesai', $this->jam_selesai),
            // ],
        ];
    }

    public function messages()
    {
        return [
            'hari.required' => 'Hari wajib di isi',
            'hari.in' => 'Tolong pilih hari yang sesuai',
            'jam_mulai.required' => 'Jam Mulai wajib di isi',
            'jam_selesai.required' => 'Jam Selesai wajib di isi',
            // 'hari_jam.unique' => 'Tolong pilih Hari dan Jam yang tidak bertabrakan',
        ];
    }
}
