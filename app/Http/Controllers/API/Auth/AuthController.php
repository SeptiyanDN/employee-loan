<?php

namespace App\Http\Controllers\API\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __invoke(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::whereEmail($request->email)->first();
        if( ! $user ){
            throw ValidationException::withMessages([
                "email" => ["Email tidak ditemukan"],
            ]);
        }
        else if (!Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                "password" =>["password salah"]
            ]);
        }

        $token = $user->createToken('mobile-token');
        $data = [
            "username" =>$user->username,
            "name" => $user->name,
            "email" => $user->email,
            "telepon" => $user->telepon,
            "current_tenant_id" => $user->current_tenant_id,
            "telegram_chat_id" => $user->telegram_chat_id,
            "token" => $token->plainTextToken,
        ];

        return ResponseFormatter::success($data,"Selamat Anda Berhasil Login");
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return ResponseFormatter::success(null,'You have successfully logged out and the token was successfully deleted');
    }
}
