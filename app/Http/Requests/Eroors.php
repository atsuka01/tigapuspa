<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Eroors extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nama_produk' => 'required',
            'jenis_produk' => 'required',
            'harga_produk' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama_produk.required' => 'Nama Produk Masih Kosong',
            'jenis_produk.required' => 'jenis_produk Produk Masih Kosong',
            'harga_produk.required' => 'harga_produk Produk Masih Kosong',
    ];
    }
}
