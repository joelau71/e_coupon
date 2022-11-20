<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register() {
        $validate = request()->validate([
            "first_name" => ["required"],
            "last_name" => ["required"],
            "email" => ["required", "email", "unique:users"],
            "password" => ["required","alpha_dash", "confirmed"],
            "gender" => ["required", Rule::in(['m','f'])],
            "birthday" => ["required", "date"],
            "mobile" => ["required"]
        ]);
        $validate["password"] = bcrypt($validate["password"]);
        $user = User::create($validate);
        $user->score()->create([]);
        return response()->json([
            "message" => "Create User Success",
            "user" => $user,
        ], 200);        return response()->json([
            "message" => "Create User Success",
            "user" => $user,
        ], 200);
    }

    public function login() {
        $validator = Validator::make(request()->all(), [
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'The data is invalid.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = User::where('email', request()->email)->first();
        
        if (!$user || !Hash::check(request()->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid',
                'errors' => [
                    'password' => 'The password does not belong to the user account.',
                ],
            ], 422);
        }

        // Return the access token if the checking is successful
        return response()->json([
            'access_token' => $user->createToken('api-token')->plainTextToken,
            'type' => 'bearer',
        ], 200);
    }

    public function show(User $user) {
        $score = $user->score;
        return response()->json([
            'message' => "Get User Success",
            'user' => $user,
            'score' => $score
        ], 200);
    }

    public function update(User $user) {
        $userData =  auth('sanctum')->user();
        // return $user;


        $validate = request()->validate([
            "first_name" => ["required"],
            "last_name" => ["required"],
            "email" => ["required", "email", Rule::unique('users')->ignore($userData->id)],
            "gender" => ["required", Rule::in(['m','f'])],
            "birthday" => ["required", "date"],
            "mobile" => ["required"]
        ]);

        $user->update($validate);

        // Return the access token if the checking is successful
        return response()->json([
            'message' => "Update User Success",
            'user' => $user,
        ], 200);
    }

    public function changePassword($id) {
        $user = User::findOrFail($id);

        $validate = request()->validate([
            "password" => ["required","alpha_dash", "confirmed"]
        ]);

        $password = bcrypt(request()->password);

        $user->update($password);

        return response()->json([
            "message" => "Update User Success",
            "user" => $user
        ]);
    }

    public function logout() {
        request()->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'You have successfully logged out!',
        ]);
    }

}
