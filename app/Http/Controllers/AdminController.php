<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Products;
use App\Models\Clients;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = DB::table('blog')
        ->join("categories","categories.id","=","blog.id_kategori")
        ->select(DB::raw("COUNT(blog.id_kategori) as count"),"categories.kategori")
        ->groupBy('blog.id_kategori')
        ->get();
       
        $amount_product = Products::all()->count();
        $amount_client = Clients::all()->count();
        $amount_blog = Blog::all()->count();

        $labels = array();
        $counts = array();
        foreach($blogs as $blog){
            array_push($counts,$blog->count);
            array_push($labels,$blog->kategori);
        }
        // dd($labels);
        $data = [
            'title'=>'Dashboard',
            'amount_product'=>$amount_product,
            'amount_client' =>$amount_client,
            'amount_blog'=>$amount_blog,
            'counts' => $counts,
            'labels'=> $labels
        ];

        return view('backend.pages.main',$data);
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
