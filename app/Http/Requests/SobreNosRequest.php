<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SobreNosRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->guard('gestor')->check();
    }

    public function rules()
    {
        return [
            'titulo' => 'required|string|max:160',
            'descricao' => 'nullable|string',
            'missao' => 'nullable|string|max:1200',
            'visao' => 'nullable|string|max:1200',
            'valores' => 'nullable|string|max:2000',
            'selo' => 'nullable|string|max:60',
        ];
    }
}
