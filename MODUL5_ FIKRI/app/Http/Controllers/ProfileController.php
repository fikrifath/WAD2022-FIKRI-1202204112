<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Showroom;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

use Session;
session_start();

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get('login') != true)
        {
            return redirect()->to('login')->with('error', 'Akses dilarang! Silahkan login terlebih dahulu');   
        }

        $getProfile = User::where('id', Session::get('user_id'))->first();

        $showroom = Showroom::all();
        $jmlData = count($showroom);
        return view('pages/profile', compact('getProfile', 'jmlData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Session::get('login') != true)
        {
            return redirect()->to('login')->with('error', 'Akses dilarang! Silahkan login terlebih dahulu');   
        }
        
        $cek = User::findOrFail($id);
        $param = $request->all();
        // dd($param);
        $this->validate($request, [
            'name'  => ['required', 'string', 'max:255'],
            'no_hp'  => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if($cek)
        {
            $name = $param['name'];
            $no_hp = $param['no_hp'];
            $password = $param['password'];
            $confirm = $param['confirm'];
            $warna = $param['warna'];

            if($confirm != $password)
            {
                return redirect()->to('profile')->with('error', 'Password tidak sama!');
            }

            Cookie::queue('warna_navbar', $warna, 120);
            $res = User::where('id', $id)->update([
                'name' => $name,
                'no_hp' => $no_hp,
                'password' => Hash::make($password),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if($res)
            {
                return redirect()->to('profile')->with('success', 'Data berhasil diupdate');
            } else {
                return redirect()->to('profile')->with('error', 'Data gagal diupdate');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
