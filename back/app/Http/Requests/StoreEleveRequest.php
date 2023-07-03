<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEleveRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "numero"=>["sometimes","required","unique:eleves"],
            "prenom"=>["required","string"],
            "nom"=>["required","string"],
            "date_naiss"=>["sometimes","required","date"],
            "lieu_naiss"=>["sometimes","required","string"],
            "sexe"=>["required","boolean"],
            "classe"=>["required","numeric"],
            "annee"=>["required","numeric"],
            
        ];
    }
}
