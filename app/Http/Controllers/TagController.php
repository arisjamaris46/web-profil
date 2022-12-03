<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Daftar Tag',
            'tags' => Tag::all()
        ];

        return view('backend.pages.tag.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Tag'
        ];

        return view('backend.pages.tag.add',$data);
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
            'tag' => 'required'
        ]);

        $tag = Tag::create(['tag'=>$validated['tag']]);

        return back()->with('success','Data berhasil disimpan');
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
            'title' =>'Edit Tag',
            'row' => Tag::find($id)
        ];

        return view('backend.pages.tag.edit',$data);
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
            'tag' => 'required'
        ]);

        $row = Tag::find($id);
        $row->tag = $validated['tag'];
        $row->save();

        return back()->with('success','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Tag::find($id);
        $deleted = $row->delete();

        if($deleted){
            return redirect()->route('tag')->with('success','Data berhasil dihapus');
        }else{
            return redirect()->route('tag')->with('error','Data gagal dihapus');
        }
    }
}
