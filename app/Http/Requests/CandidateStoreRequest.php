<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // untuk mengecek apakah data sudah diinputkan atau belum, jika belum akan ada muncul peringatan
        return [
            'name' => 'required|string|max:255',
            'image' => 'required|image',
            'namaKetua' => 'required|string|max:255',
            'namaWakilKetua' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'sort_order' => 'required|integer|min:0|unique:candidates,sort_order',
        ];
    }
}
