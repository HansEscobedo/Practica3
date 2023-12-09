<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'city' => $request->city,
            'country' => $request->country,
            'summary' => $request->summary,
            'email' => $request->email,
        ]);
        $token = JWTAuth::fromUser($user);
        return response()->json(['token' => $token, 'user' => $user]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::find($id);
        if($user){
            $user->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'city' => $request->city,
                'country' => $request->country,
                'summary' => $request->summary,
                'email' => $request->email,
            ]);
            return response()->json(['message' => 'Usuario actualizado correctamente'], 200);
        }else{
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profile(int $id)
    {
        $user = User::find($id);
        $user->userFrameworks;
        $user->userHobbies;

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        return response()->json($user, 200);
    }
}
