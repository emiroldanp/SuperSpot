<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function register(Request $req){
        return view('auth.register');
    }

    public function doRegister(Request $req){
        $data = $req->all();
        Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|confirmed'
        ])->validate();

        $data['password'] = Hash::make($data['password']);

        User::create($data);
        return redirect()->route('auth.login');
    }

    public function login(Request $req){
        return view('auth.login');
    }

    public function doLogin(Request $req){
        $credentials = $req->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->route('series.index');
        }
        return redirect()->back();
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('series.index');
    }

    public function show(){

        try{
            $user = Auth::user();
            try {
                //code..
                $categories = $user -> categories;
                return view('user.edit', ['user' => $user], ['categories'=>$categories]);
            } catch (\Throwable $th) {
                //throw $th;
                $categories=[];
                return view('user.edit', ['user' => $user], ['categories' => $categories]);
            }
        }catch (\Throwable $t){
            redirect()->route('series.index');
        }

    }
    public function updateUser(Request $request){

        $user = Auth::user();
        $arr = $request->input();
        $user->name = $arr['name'];
        $user->email = $arr['email'];
        Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns',
        ])->validate();

        $user->save();
        return redirect()->route('auth.show');
    }
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $credentials = $request->only('email', 'password');
        $arr = $request->input();
        if(Auth::attempt($credentials)){
            $user->password =  Hash::make($arr['password_new']);
            $user->save();
            return redirect()->route('auth.show');
        }

        return redirect()->route('auth.show');
    }

}
