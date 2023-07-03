<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserRessource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserRessource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user=User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "user_name"=>$request->user_name,
            "password"=>$request->password,
            "role_id"=>$request->role
        ]);
        return new UserRessource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserRessource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->only("nomComplet", "email", "password", "role"));
        return new UserRessource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_auth=User::find(Auth::user()->id);
        if($user_auth->isAdministrator())
        {
            $user=User::find($id);
            if($user)
            {
                $user->delete();
                return response(null, Response::HTTP_NO_CONTENT);
            }
            return response(["message"=>"user with id:".$id." doesn't exist"],Response::HTTP_NOT_ACCEPTABLE);
        }
        return response(["message"=>"UNAUTHORIZED"],Response::HTTP_NOT_ACCEPTABLE);
        // if(isset($user->id))

    }
}
