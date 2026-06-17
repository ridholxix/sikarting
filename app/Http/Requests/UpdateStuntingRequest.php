<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStuntingRequest extends FormRequest
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
        $stunting_id = $this->route('stunting')->id;

        return [
            'kode' => 'required|unique:stuntings,kode,'.$stunting_id,
            'nama' => 'required|min:3|max:255',
            'prior' => 'required|between:0,1.000|decimal:0,3',
        ];
    }
}
