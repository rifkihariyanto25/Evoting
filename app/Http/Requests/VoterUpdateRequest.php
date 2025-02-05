<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoterUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            // jadi jika passwordnya sama tidak apapa
            'email' => 'required|email|unique:users,email,' . $this->route('voter'),
            'password' => 'nullable|string|min:8',
            // 'nim' => 'required|string|max:10',
        ];
    }
}
