<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use JWTAuth;

class TokensController extends Controller
{
    public function login(Request $request){
    	$credentials = $request->only('email', 'password');
    	$validator = Validator::make($credentials, [
    		'email' => 'required|email',
    		'password' => 'required'
    	]);
    	if ($validator->fails()) {
    		return response()->json([
    			'success' => false,
    			'message' => 'Error en la validación',
    			'errors' => $validator->errors()
    		]);
    	}

    	$token = JWTAuth::attempt($credentials);
    	if ($token) {
  		 	$role = $request->role;
        $user = auth()->guard()->user();
        $user->syncRoles($role); 
    		if(auth()->user()->hasRole('Administrador')){
            $redirect = route('users.index');
        }else{
          $redirect = route('customers.index');
        }
    		return response()->json([
    			'success' => true,
    			'redirect' => $redirect . '?token=' . $token,
    			'token' => $token
    		]);
    	}else{
    		return response()->json([
    			'success' => false,
    			'message' => 'Error en las credenciales'
    		]);
    	}
    }

    public function logout(){
        $token = JWTAuth::getToken();
        try {
            JWTAuth::invalidate($token);
            return response()->json([
                'success' => true,
                'message' => 'La sesión se cerró exitósamente'
            ]);
        } catch (JWTException $ex) {
                return response()->json([
                'success' => false,
                'message' => 'Fail Logout'
            ]); 
        }
    }
}
