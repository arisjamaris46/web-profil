<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'=>'Product',
            'products'=>Products::all()
        ];

        return view('backend.pages.product.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title'=>'Tambah Produk',
        ];

        return view('backend.pages.product.add',$data);
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
            'product_name'=>['required'],
            'product_desc'=>['required'],
            'product_price'=>['required','numeric'],
            'product_file'=>['max:6144','image','file']
        ]);
        $path =$request->file('product_file')->store('products');
        if($request->file('product_file')){
            $validated['product_file'] =$path;
        }

        $product = new Products;
        $product->nm_produk = $validated['product_name'];
        $product->ket_produk = $validated['product_desc'];
        $product->hrg_produk = $validated['product_price'];
        $product->gbr_produk = $validated['product_file'];
        $product->save();

        return back()->with('success','Data produk berhasil ditambahkan');
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
        //
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
