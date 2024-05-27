<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function storeUser(UserRequest $request) {
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->last_name = $request->last_name;
        $newUser->email = $request->email;
        $newUser->password = $request->password;
        $newUser->number_document = $request->number_document;
        $newUser->role_id = $request->role_id;

        if($request->role_id == null) {
            $newUser->role_id = 3;
        }

        $newUser->save();

        $userToReturn = User::with('role')->find($newUser->id);

        return response()->json([
            'user' => new UserResource($userToReturn),
            'message' => 'User created Successfully',
        ], 201);
    }

    public function getAllUsers() {
        $users = User::with('role')->get();

        if($users->isEmpty()) {
            return response()->json([
                'message' => "Not users created yet"
            ], 200);
        } else {
            return response()->json([
                'message' => "Users get sucessfully",
                'users' => UserResource::collection($users)
            ], 200);
        }
    }
}
