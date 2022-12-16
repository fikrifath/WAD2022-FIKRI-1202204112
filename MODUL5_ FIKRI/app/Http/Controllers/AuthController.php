<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

use Session;

session_start();

class AuthController extends Controller
{
    

    public function showRegister()
    {
        return view('pages/register');
    }

    public function doRegister(Request $request)
    {
        $param = $request->all();

        $this->validate($request, [
            'name'  => ['required', 'string', 'max:255'],
            'no_hp'  => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
            'konfirmasi_password' => ['required', 'string']
        ]);

        if($param['konfirmasi_password'] == $param['password'])
        {
            $register = User::create([
                'name' => $param['name'],
                'no_hp' => $param['no_hp'],
                'email' => $param['email'],
                'password' => Hash::make($param['password']),
                'created_at' => date('Y-m-d H:i:s')          
            ]);
    
            if($register)
            {
                return redirect()->to('register')->with('success', 'Registrasi akun berhasil');
            } else {
                return redirect()->to('register')->with('error', 'Registrasi akun gagal');
            }
        } else {
            return redirect()->to('register')->with('error', 'Registrasi akun gagal! Password tidak sama');
        }
    }

    public function showLogin()
    {
        return view('pages/login');
    }

    public function doLogin(Request $request)
    {
        // Validate form
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        $param = $request->only(['email', 'password']);
        // select credentials to login
        $result = User::where('email', $param['email'])->first();

        if($result)
        {                   
            if(Hash::check($param['password'], $result['password']))
            {
                $user = Auth::user();
                // SET SESSION
                Session::put('login', true);
                Session::put('user_id', $result['id']);
                Session::put('nama', $result['name']);
                Session::put('psw', $param['password']);
                Session::put('no_hp', $result['no_hp']);
                // END OF SESSION

                if(isset($request->remember))
                {
                    // SET COOKIE
                    Cookie::queue('remember', 'remembered', 120);
                    Cookie::queue('user_id', $result['id'], 120);
                    Cookie::queue('email', $result['email'], 120);
                    Cookie::queue('password', $param['password'], 120);
                }

                // Redirect pages
                return Redirect::to('/');
            }
        } else {
            return redirect()->to('login')->with('error', 'Email/Password salah!');
        }
    }

    public function doLogout()
    {
        Session::flush();
        if(Cookie::has('remember') == true)
        {
            Cookie::queue(Cookie::forget('remember'));
            Cookie::queue(Cookie::forget('user_id'));
            Cookie::queue(Cookie::forget('email'));
            Cookie::queue(Cookie::forget('password'));
            Cookie::queue(Cookie::forget('warna_navbar'));
        }
        Cookie::queue(Cookie::forget('warna_navbar'));

        return Redirect::to('/login');
    }

}
