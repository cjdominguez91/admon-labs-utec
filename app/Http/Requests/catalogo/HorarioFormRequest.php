<?php

namespace App\Http\Requests\catalogo;

use Illuminate\Foundation\Http\FormRequest;

class HorarioFormRequest extends FormRequest
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

    
    
}
