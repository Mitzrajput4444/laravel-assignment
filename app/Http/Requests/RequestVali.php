<?php

namespace App\Http\Requests;

use App\Http\Middleware\TrustHosts;
use Illuminate\Foundation\Http\FormRequest;

class RequestVali extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'pname' => 'required|string',
            'cateId' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2000'
        ];
    }
    public function messages()
    {
        return [
            'pname' => 'Name Must.........',
            'cateId' => 'CagteId Must.........',
        ];
        
    }
}
