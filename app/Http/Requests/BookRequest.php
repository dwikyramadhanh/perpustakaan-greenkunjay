<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'author_id' => ['required'],
            'title' => ['required'],
            'description' => ['required', 'min:50'],
            'cover' => ['image', 'file', 'max:1024'],
            'qty' => ['required', 'numeric'],
        ];
    }
    public function messages()
    {
        return [
            'author_id.required' => 'Author harus dipilih',
            'title.required' => 'Judul buku harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'description.min' => 'Deskripsi minimal 50 karakter',
            'cover.image' => 'File yang diinput harus berupa gambar',
            'cover.file' => 'File harus berupa file',
            'cover.max' => 'Ukuran file gambar harus kurang dari 1MB',
            'qty.required' => 'Jumlah buku tidak boleh kosong',
            'qty.numeric' => 'Jumlah buku harus berupa angka',
        ];
    }
}