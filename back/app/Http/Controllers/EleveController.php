<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEleveRequest;
use App\Http\Requests\UpdateEleveRequest;
use App\Http\Resources\EleveResource;
use App\Http\Resources\UserRessource;
use App\Models\Eleve;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EleveResource::collection(Eleve::all());
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEleveRequest $request)
    {
        $type=$request->numero ?"interne":"externe";
        ["classe"=>$classe,"annee"=>$annee]=$request->all();
        $ins=["classe"=>$classe,"annee"=>$annee];
        $info_eleve=array_diff_key($request->all(),$ins);

        $eleve=Eleve::create(
            [
                ...$info_eleve,
                "type"=>$type
            ]
        );
        

        return new  EleveResource($eleve);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Eleve $eleve)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEleveRequest $request, Eleve $eleve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eleve $eleve)
    {
        //
    }
}
