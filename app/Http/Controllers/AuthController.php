<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('backend.pages.login');
    }

    public function register(){
        return view('backend.pages.register');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'username'=>['required','min:5'],
            'email' => ['required','email'],
            'password'=>['required','min:6']
        ]);


        $checkUsername = User::where('username',$validated['username'])->first();
        $checkEmail = User::where('email','=',$validated['email'])->first();
        if($checkUsername||$checkEmail){
            return back()->with('error','Data pengguna sudah ada');
        }else{

            $hashPassword = Hash::make($validated['password']);
            $user = new User;
            $user->username = $validated['username'];
            $user->email = $validated['email'];
            $user->password = $hashPassword;
            $user->save();
            // jika berhasil tampilkan pesan sukses
            return back()->with('success','Akun pengguna berhasil disimpan');


        }
        // jika gagal tampilkan pesan error
        return back()->with('error','Akun pengguna gagal disimpan');
    }

    public function login(Request $request){
        $credential = $request->validate([
            'username'=>['required','min:5'],
            'password'=>['required','min:6']
        ]);
        if(Auth::attempt($credential)){
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->with('error','Maaf username atau password salah');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
