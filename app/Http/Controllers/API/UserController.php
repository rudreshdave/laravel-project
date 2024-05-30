<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Response;
use Auth;

class UserController extends BaseController {

    use AuthorizesRequests,
        ValidatesRequests;

    public function login(LoginRequest $request) {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];


        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->token = $user->createToken('auth_token')->plainTextToken;
//            dd($user);
//            $encrypter128 = new Illuminate\Encryption\Encrypter(config('app.key'), 'AES-128-CBC');
            $response = array(
                'status' => 1,
                'message' => "User auythenticated!",
                'data' =>$user
            );
            return response()->json($response, Response::HTTP_OK);
        }
    }
}
