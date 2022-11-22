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
            'title'=>'Produk',
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
            'product_file'=>['required','max:6144','image','file']
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
        $product = Products::find($id);
        $data = [
            'title' => 'Edit Produk',
            'product'=> $product
        ];   
        // dd($product);
        return view('backend.pages.product.edit',$data);
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
            'product_name'=>['required'],
            'product_desc'=>['required'],
            'product_price'=>['required','numeric'],
        ]);

        $product = Products::find($id);
        if(!empty($request->file('product_file'))){
            $path =$request->file('product_file')->store('products');
            $validated['product_file'] = $path;

            $product->nm_produk = $validated['product_name'];
            $product->ket_produk = $validated['product_desc'];
            $product->hrg_produk = $validated['product_price'];
            $product->gbr_produk = $validated['product_file'];

            $product->save();
        }else{
            $product->nm_produk = $validated['product_name'];
            $product->ket_produk = $validated['product_desc'];
            $product->hrg_produk = $validated['product_price'];
            $product->gbr_produk = $request->gbr_produk;
            
            $product->save();
        }

        return back()->with('success','Data Produk berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Products::destroy($id);
        if($deleted) {
            return redirect()->route('product')->with('success','Data Produk berhasil dihapus');

        }else{
            return redirect()->route('product')->with('error','Data Produk gagal dihapus');
        }
    }
}
