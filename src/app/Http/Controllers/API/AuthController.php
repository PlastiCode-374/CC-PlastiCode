<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request){
        $validator  = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:255'
        ]);

        if ($validator->fails()){
            return response()->json([
                'error' => true,
                'message' => 'There is an error',
                'data' => $validator->errors()
            ]);
        }

        $userExists = User::where('email', $request->email)->exists();
        if ($userExists) {
            return response()->json([
                'error' => true,
                'message' => 'Email has already been taken'
            ]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $succes['token'] = $user->createToken('auth_token')->plainTextToken;
        $succes['name'] = $user->name;

        return response()->json([
            'error' => false,
            'message' => 'User Created',
        ]);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::user();
            $success['token'] = $auth->createToken('auth_token')->plainTextToken;
            $success['id'] = $auth->id;
            $success['name'] = $auth->name;
            $success['email'] = $auth->email;

            return response()->json([
                'error' => false,
                'message' => 'Success',
                'data' => $success
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Check the email and password again'
            ]);
        }
    }
}