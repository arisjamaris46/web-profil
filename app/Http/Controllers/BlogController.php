<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\BlogTags;

class BlogController extends Controller
{
    public function index(Request $request){
        $keyword = !empty($request->input('keyword')) ? $request->input('keyword') : '';
        $categories = DB::table('categories')
                    ->select('categories.kategori',DB::raw('COUNT(blog.id_kategori) as jml_kategori'))
                    ->join('blog',function($join){
                        $join->on('blog.id_kategori','=','categories.id');
                    })
                    ->groupBy('categories.kategori')
                    ->get();
        $latest_posts = Blog::take(4)->orderByDesc('id')->get();
        $blogs = Blog::leftJoin('blog_tags','blog_tags.id_blog','=','blog.id')
                ->leftJoin('categories','categories.id','=','blog.id_kategori')
                ->leftJoin('tags','tags.id','=','blog_tags.id_tag')
                ->leftJoin('users','users.id','=','blog.id_user')
                ->where('blog.judul','like','%'.$keyword.'%')
                ->orWhere('categories.kategori','like','%'.$keyword.'%')
                ->orWhere('tags.tag','like','%'.$keyword.'%')
                ->groupBy('blog.id')
                ->select('blog.id','blog.judul','blog.slug','blog.ket','blog.file_gbr','blog.created_at','categories.kategori','users.username','users.email')
                ->paginate(2);
        
        $data = [
            'title' => 'Blog',
            'blogs'=> $blogs,
            'latest_posts'=>$latest_posts,
            'categories' => $categories,
            'tags'=>Tag::all()
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
        
        $tags = implode(',',$request->tags);
        $arrTags = explode(',', $tags);
        // dd(json_encode($arrTags));
        $validated = $request->validate([
            'title'=>['required','max:200'],
            'img_file'=>['required','max:3072','image','file'],
            'content'=>['required'],
            'category'=>['required'],
            'tags'=>['required'],
        ]);

        if($request->file('img_file')){
            $validated['img_file'] = $request->file('img_file')->store('blogs');
        }


        /*simpan data blog */ 
        $blog = new Blog;
        $blog->judul = $validated['title'];
        $blog->slug = Str::of($validated['title'])->slug('-');
        $blog->file_gbr = $validated['img_file'];
        $blog->ket = $validated['content'];
        $blog->id_kategori = $validated['category'];
        $blog->id_user = Auth::user()->id;
        $blog->created_at = Date('Y-m-d h:i:s');
        $blog->save();

        /*simpan data blog tags*/
        foreach($arrTags as $val){
            $blogTags = new BlogTags;
            $blogTags->id_blog = $blog->id;
            $blogTags->id_tag = $val;
            $blogTags->save();
        }

        return back()->with('success','Posting blog berhasil disimpan');
    }

    public function edit($id){
        $blog = Blog::find($id);
        $data = [
            'title' => 'Edit Postingan',
            'blog' => $blog,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        
        ];

       

        return view('backend/pages/blog/edit',$data);
    }

    public function update(Request $request, $id){

        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        $blog = Blog::find($id);
        if(!empty($request->file('img_file'))){
            $path_img = $request->file('img_file')->store('blogs');
            $blog->file_gbr = $path_img;
            
        }else{
            $blog->file_gbr = $request->file_gbr;
           
        }
        $blog->judul = $validated['title'];
        $blog->slug = Str::of($validated['title'])->slug('-');
        $blog->ket = $validated['content'];
        $blog->id_kategori = $validated['category'];
        $blog->id_user = Auth::user()->id;
        $blog->updated_at = DATE('Y-m-d h:i:s');
        $blog->save();

        return back()->with('success','Data blog berhasil diedit');
    }

    public function destroy($id){
        $blog = Blog::find($id);
        $deleted = $blog->delete();

        if($deleted){
            
            return redirect()->route('blogs')->with('success','Data blog berhasil dihapus');
        }else{
            return redirect()->route('blogs')->with('error','Data blog gagal dihapus');
        }
    }

    public function detail($slug){
        $blog = Blog::where('slug',$slug)->first();
        $categories = DB::table('categories')
                    ->select('categories.kategori',DB::raw('COUNT(blog.id_kategori) as jml_kategori'))
                    ->join('blog',function($join){
                        $join->on('blog.id_kategori','=','categories.id');
                    })
                    ->groupBy('categories.kategori')
                    ->get();
        $latest_posts = Blog::take(4)->orderByDesc('id')->get();
        $data = [
            'title' => $blog->judul,
            'blog' => $blog,
            'categories'=>$categories,
            'latest_posts'=>$latest_posts,
            'tags'=>Tag::all()
        ];

        return view('frontend.blog.detail',$data);
    }

    public function filterByCategory($kategori){
        $row = Category::where('kategori',$kategori)->first();
        $blogs = Blog::take(6)->where('id_kategori',$row->id)->paginate(2);
        $categories = DB::table('categories')
                    ->select('categories.kategori',DB::raw('COUNT(blog.id_kategori) as jml_kategori'))
                    ->join('blog',function($join){
                        $join->on('blog.id_kategori','=','categories.id');
                    })
                    ->groupBy('categories.kategori')
                    ->get();
        $latest_posts = Blog::take(4)->orderByDesc('id')->get();
        $data = [
            'title'=>'Blog | Kategori',
            'blogs' => $blogs,
            'categories'=>$categories,
            'latest_posts'=>$latest_posts,
            'tags'=>Tag::all()
        ];

        return view('frontend.blog.filterByCategory',$data);
    }

    public function filterByTag($id){
       
        $dataBlog = DB::table('blog')
                    ->join('blog_tags','blog_tags.id_blog','=','blog.id')
                    ->join('categories','categories.id','=','blog.id_kategori')
                    ->join('tags','tags.id','=','blog_tags.id_tag')
                    ->join('users','users.id','=','blog.id_user')
                    ->where('tags.id',$id)
                    ->select('blog.*','categories.kategori','tags.tag as nm_tag','users.username','users.email')
                    ->paginate(2);
        $categories = DB::table('categories')
        ->select('categories.kategori',DB::raw('COUNT(blog.id_kategori) as jml_kategori'))
        ->join('blog',function($join){
            $join->on('blog.id_kategori','=','categories.id');
        })
        ->groupBy('categories.kategori')
        ->get();
        $latest_posts = Blog::take(4)->orderByDesc('id')->get();
        // dd($dataBlog);
        $data = [
            'title' => 'Blog | Tag',
            'blogs' => $dataBlog,
            'categories'=>$categories,
            'latest_posts'=>$latest_posts,
            'tags'=>Tag::all()
        ];

        return view('frontend.blog/filterByTag',$data);
    }
}
