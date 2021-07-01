<?php 

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use View;

class LoginController extends Controller{

    public function show_login() {
        if (auth()->check()) {
            if(auth()->guard()->user()->hasRole('Administrador')){
                return redirect()->route('users.index');
            }else{
              return redirect()->route('customers.index');
            }
        } 
        return view('auth.login');
    }

    public function login(Request $request) {
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $role = $request->role;
        $user = auth()->guard()->user();
        $user->syncRoles($role); 
        if(auth()->guard()->user()->hasRole('Administrador')){
            return redirect()->route('users.index');
        }else{
          return redirect()->route('customers.index');
        }       
      }
      session()->put('error_login', 'Correo y/o contraseña incorrectos');
      return redirect(url()->previous());
    }

    public function logout() {
        auth()->guard('web')->logout();
        return redirect()->route('admin.login');
    }
}