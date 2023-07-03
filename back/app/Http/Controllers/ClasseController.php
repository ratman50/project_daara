<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClasseResource;
use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index(){
        return ClasseResource::collection(Classe::all());
    }
    public function show(Classe $classe){
        return new ClasseResource($classe);
    }
    public function store(Request $request){
        $request->validate([
            "classe"=>["required","string","unique:classes,libelle"],
            "niveau"=>["required","numeric","exists:App\Models\Niveau,id"]
        ]);

        $classe=Classe::create([
            "libelle"=>strtoupper($request->classe),
            "niveau_id"=>$request->niveau
        ]);

        return new ClasseResource($classe);
    }
}
