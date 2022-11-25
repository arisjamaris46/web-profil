<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Klien',
            'clients' => Clients::all()
        ];

        return view('backend.pages.client.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Klien'
        ];

        return view('backend.pages.client.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name'=>['required'],
            'mobile_phone'=>['required','max:15'],
            'job'=>['required'],
            'testimonial'=>['required'],
            'address'=>['required'],
            'img_file'=>['required','max:3072','image','file']
        ]);

        $path = $request->file('img_file')->store('clients');
        if($request->file('img_file')){
            $validated['img_file'] = $path;
        }

        $client = new Clients;
        $client->nm_klien =$validated['client_name'];
        $client->pekerjaan = $validated['job'];
        $client->testimoni = $validated['testimonial'];
        $client->no_hp = $validated['mobile_phone'];
        $client->alamat = $validated['address'];
        $client->gbr_logo = $validated['img_file'];
        $client->save();

        return back()->with('success','Data Klien berhasil ditambahkan');
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
        $data = [
            'title'=>'Edit Klien',
            'client'=> Clients::find($id)
        ];

        return view('backend.pages.client.edit',$data);
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
        $validated = $request->validate([
            'client_name'=>['required'],
            'job'=>['required'],
            'testimonial'=>['required'],
            'mobile_phone'=>['required','max:15'],
            'address'=>['required'],
        ]);

        $client = Clients::find($id);
        if($request->file('img_file')){
            $path = $request->file('img_file')->store('clients');
            $validated['img_file'] = $path;
            $client->nm_klien =$validated['client_name'];
            $client->pekerjaan = $validated['job'];
            $client->testimoni = $validated['testimonial'];
            $client->no_hp = $validated['mobile_phone'];
            $client->alamat = $validated['address'];
            $client->gbr_logo = $validated['img_file'];

            $client->save();
        }else{
            $client->nm_klien =$validated['client_name'];
            $client->pekerjaan = $validated['job'];
            $client->testimoni = $validated['testimonial'];
            $client->no_hp = $validated['mobile_phone'];
            $client->alamat = $validated['address'];
            $client->gbr_logo = $request->old_file;

            $client->save();
        }


        return back()->with('success','Data Klien berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Clients::destroy($id);
        if($deleted) {
            return redirect()->route('klien')->with('success','Data Klien berhasil dihapus');

        }else{
            return redirect()->route('klien')->with('error','Data Klien gagal dihapus');
        }
    }
}
