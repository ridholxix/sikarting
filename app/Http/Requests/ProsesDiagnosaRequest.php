<?php

namespace App\Http\Requests;

use App\Models\Gejala;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ProsesDiagnosaRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_gejala' => [
                'required',
                'array',
                'min:2',
            ],
        ];
    }

    public function messages()
    {
        return [
            'user_gejala.required' => 'User belum memilih gejala yang dialami',
            'user_gejala.array' => 'Nilai Gejala tidak valid, silahkan refresh halaman dan coba lagi',
            'user_gejala.min' => "User harus memilih paling sedikit :min gejala"
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            // Ambil data gejala berdasarkan input yang dikirim
            // Menggunakan $this->input() lebih aman dibanding $this->request->all()
            $gejalas = Gejala::whereIn('id', $this->input('user_gejala', []))
                ->has('stuntings')
                ->get();

            // Cek apakah collection-nya kosong
            if ($gejalas->isEmpty()) {
                $validator->errors()->add(
                    'user_gejala',
                    'Gejala yang dipilih tidak valid atau tidak memiliki keterkaitan dengan data stunting.'
                );
            }
        });
    }
}
