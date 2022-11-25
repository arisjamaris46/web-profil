<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\models\Blog;
use App\Models\Category;
use App\Models\Tag;

class BlogController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Blog',
            'blogs'=> Blog::take(6)->get()
        ];

        return view('frontend.blog.index',$data);
    }

    public function list(){
        $data = [
            'title'=>'Daftar Blog yang sudah diposting',
            'blogs'=>Blog::all()
        ];

        return view('backend.pages.blog.list',$data);
    }

    public function create(){
        $data = [
            'title'=>'Tambah Blog Baru',
            'categories'=>Category::all(),
            'tags'=>Tag::all()
        ];

        return view('backend.pages.blog.add',$data);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title'=>['required','max:200'],
            'img_file'=>['required','max:3072','image','file'],
            'content'=>['required'],
            'category'=>['required'],
            'tags'=>['required'],
            'author'=>['author']
        ]);

        if($request->file('img_file')){
            $validated['img_file'] = $request->file('img_file')->store('blogs');
        }

        $blog = new Blog;
        $blog->judul = $validated['title'];
        $blog->slug = Str::of($validated['title'])->slug('-');
        $blog->file_gbr = $validated['img_file'];
        $blog->ket = $validated['content'];
        $blog->id_kategori = $validated['category'];
        $blog->tags = $validated['tags'];
        $blog->id_user = Auth::user()->id;
        $blog->created_at = Date('Y-m-d h:i:s');

        $blog->save();

        return back()->with('success','Posting blog berhasil disimpan');
    }
}
