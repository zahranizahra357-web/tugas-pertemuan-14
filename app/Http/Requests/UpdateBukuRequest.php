<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBukuRequest extends FormRequest
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
    $bukuId = $this->route('buku');

    return [
        'kode_buku' => [
            'required',
            'string',
            'max:20',
            Rule::unique('buku', 'kode_buku')->ignore($bukuId),
        ],
        'judul' => 'required|string|max:200',
        'kategori' => 'required|in:Programming,Database,Web Design,Networking,Data Science',
        'pengarang' => 'required|string|max:100',
        'penerbit' => 'required|string|max:100',
        'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
        'isbn' => 'nullable|string|max:20',
        'harga' => 'required|numeric|min:0',
        'stok' => 'required|integer|min:0',
        'deskripsi' => 'nullable|string',
        'bahasa' => 'required|string|max:20',
    ];
}
}