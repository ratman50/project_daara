<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EleveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $res=[];
        $res=[
            "prenom & nom"=>$this->prenom." ".$this->nom,
            "date_naiss"=>$this->date_naiss,
            "lieu_naiss"=>$this->lieu_naiss,
            "type"=>$this->type,
            "sexe"=>$this->sexe?"masculin":"feminin",
        ];
        if($this->numero)
            $res["numero"]=$this->numero;
        return $res;
    }
}
