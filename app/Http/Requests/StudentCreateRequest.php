<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
            'nis'=> 'unique:students|required',
            'name'=> 'required|max:10'
        ];
    }
    public function attributes()
    {
        return [
            'name'=> 'Nama'
        ];
    }
    public function messages()
    {
        return
        [
            'nis.required' => 'NIS harus diisi',
            'nis.unique' => 'NIS tidak boleh sama'
        ];
    }
}