<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Person;
use Illuminate\Validation\ValidationException;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index() {
        // if(Auth::check()){
        //     return redirect('/dashboard');
        // }
        return view('index');
    }

    // public function loginAuth(LoginRequest $request){
    //     $credentials = $request->getCredentials();
    //     if(Auth::attempt($credentials)){
    //         if(Auth::User()->is_active == 1){
    //             $request->user()->last_login = now();
    //             $request->user()->save();
    //             $data = Person::select('Person.names', 'Person.gender', 'Person.is_region', 'Person.is_province', 'Person.is_district',
    //                     'Users.province_name', 'Users.district_name') ->leftjoin('Users', 'Person.dni', '=', 'Users.username')
    //                     ->where('Person.dni', $request->username) ->get();

    //             $request->session()->regenerate();
    //             $request->session()->put(['dataPerson' => $data]);
    //             return redirect()->intended('/dashboard');
    //             // return view('/dashboard',['data' => $data]);
    //         }

    //         throw ValidationException::withMessages([
    //             'active' => 'Usuario Inválido'
    //         ]);
    //     }

    //     // return redirect('/');
    //     throw ValidationException::withMessages([
    //         'username' => 'Usuario o Contraseña no validos'
    //     ]);
    // }

    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect('/');
    // }
}
