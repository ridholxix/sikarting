<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBobotRequest extends FormRequest
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
        $bobot_id = $this->route('bobot')->id;

        return [
            'kode' => 'required|unique:bobots,kode,'.$bobot_id,
            'gejala_id' => 'required|exists:gejalas,id',
            'stunting_id' => [
                'required',
                'exists:stuntings,id',
                Rule::unique('bobots')->where(fn($query) => $query->where('gejala_id', $this->gejala_id))->ignore($bobot_id)
            ],
            'probabilitas' => 'required|between:0,1.000|decimal:0,3',
        ];
    }

    public function messages() : array
    {
        return [
            'stunting_id.unique' => 'Kombinasi gejala dan stunting sudah ada, silakan pilih yang lain',
        ];
    }
}
