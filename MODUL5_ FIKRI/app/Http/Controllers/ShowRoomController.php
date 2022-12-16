<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Showroom;
use Session;
session_start();
class ShowRoomController extends Controller
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
        $showroom = Showroom::all();
        $jmlData = count($showroom);
        return view('pages/list-car', compact('showroom', 'jmlData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::get('login') != true)
        {
            return redirect()->to('login')->with('error', 'Akses dilarang! Silahkan login terlebih dahulu');   
        }
        $showroom = Showroom::all();
        $jmlData = count($showroom);
        return view('pages/add-car', compact('showroom', 'jmlData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Session::get('login') != true)
        {
            return redirect()->to('login')->with('error', 'Akses dilarang! Silahkan login terlebih dahulu');   
        }
        // dd($request->all());
        //validate form
        $this->validate($request, [
            'name'     => ['required', 'string'],
            'owner'   => ['required', 'string'],
            'brand'     => ['required', 'string'],
            'purchase_date'   => ['required', 'string'],
            'status'     => ['required', 'string'],
            'foto'     => ['required', 'image']
        ]);

        $param = $request->all();

        $user_id = Session::get('user_id');
        $name = $param['name'];
        $owner = $param['owner'];
        $brand = $param['brand'];
        $purchase_date = $param['purchase_date'];
        $description = $param['description'];
        $status = $param['status'];

        // SETUP STORE IMAGE INTO DATABASE
        $image = $request->file('foto');
        $image->store('uploads', ['disk' => 'public_uploads']);

        
        //store data in your database
        $res = Showroom::create([
            'user_id'   => $user_id,
            'name'      => $name,
            'owner'     => $owner,
            'brand'     => $brand,
            'purchase_date' => $purchase_date,
            'description' => $description,
            'status'    => $status,
            'foto'      => $image->hashName()
        ]);

        if($res)
        {
            Session::put('action', 'save');
            return redirect()->to('list-car')->with(['success' => 'Data berhasil disimpan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Session::get('login') != true)
        {
            return redirect()->to('login')->with('error', 'Akses dilarang! Silahkan login terlebih dahulu');   
        }
        $showroom = Showroom::all();
        $jmlData = count($showroom);

        $cek = Showroom::findOrFail($id);

        if($cek)
        {
            $getDetail = Showroom::where('id', $id)->first();
            return view('pages/detail-car', compact('getDetail', 'jmlData'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Session::get('login') != true)
        {
            return redirect()->to('login')->with('error', 'Akses dilarang! Silahkan login terlebih dahulu');   
        }
        $showroom = Showroom::all();
        $jmlData = count($showroom);

        $cek = Showroom::findOrFail($id);

        if($cek)
        {
            $getDetail = Showroom::where('id', $id)->first();
            return view('pages/edit-car', compact('getDetail', 'jmlData'));
        }
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
        $cek = Showroom::findOrFail($id);
        if($cek)
        {
            //validate form
            $this->validate($request, [
                'name'     => ['required', 'string'],
                'owner'   => ['required', 'string'],
                'brand'     => ['required', 'string'],
                'purchase_date'   => ['required', 'string'],
                'status'     => ['required', 'string'],
                ]);

                $param = $request->all();
                // dd($param);

                $user_id = Session::get('user_id');
                $name = $param['name'];
                $owner = $param['owner'];
                $brand = $param['brand'];
                $purchase_date = $param['purchase_date'];
                $description = $param['description'];
                $status = $param['status'];

                if($request->hasFile('foto'))
                {
                    // SETUP STORE IMAGE INTO DATABASE
                    $image = $request->file('foto');
                    $image->store('uploads', ['disk' => 'public_uploads']);

                    //delete old image
                    unlink(public_path('uploads/'.$cek->foto));

                    //store data in your database
                    $res = Showroom::where('id', $id)->update([
                        'user_id'   => $user_id,
                        'name'      => $name,
                        'owner'     => $owner,
                        'brand'     => $brand,
                        'purchase_date' => $purchase_date,
                        'description' => $description,
                        'status'    => $status,
                        'foto'      => $image->hashName(),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                } else {
                    $res = Showroom::where('id', $id)->update([
                        'user_id'   => $user_id,
                        'name'      => $name,
                        'owner'     => $owner,
                        'brand'     => $brand,
                        'purchase_date' => $purchase_date,
                        'description' => $description,
                        'status'    => $status,
                        'foto'      => $request->old,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]); 
                }
                Session::put('action', 'update');
                return redirect()->to('list-car')->with(['success' => 'Data berhasil diupdate']);
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
        if(Session::get('login') != true)
        {
            return redirect()->to('login')->with('error', 'Akses dilarang! Silahkan login terlebih dahulu');   
        }
        $cek = Showroom::findOrFail($id);

        if($cek)
        {
            Session::put('action', 'delete');

            unlink(public_path('uploads/'.$cek->foto));
            Showroom::where('id', $id)->delete();
            return redirect()->to('list-car')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->to('list-car')->with('error', 'Data gagal dihapus.');
        }
    }
}
