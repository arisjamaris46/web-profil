@extends('frontend.layout')
@section('content')

 <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>BLOG</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="{{ route('home') }}"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="{{ route('blog') }}">Blog</a><i class="icon-angle-right"></i></li>
              <li class="active">Detail</li>
            </ul>
          </div>
        </div>
      </div>
</section>
<section id="content">
      <div class="container">
        <div class="row">
          <div class="span4">
            <aside class="left-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input placeholder="Type something" type="text" class="input-medium search-query">
                  <button type="submit" class="btn btn-square btn-default">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                  @foreach($categories as $item)
                  <li><i class="icon-angle-right"></i><a href="{{ route('blog.filter.kategori',$item->kategori) }}">{{$item->kategori}}</a><span> ({{$item->jml_kategori}})</span></li>
                  @endforeach
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                  @foreach($latest_posts as $item)
                  <li>
                    <img src="{{ asset('storage/'.$item->file_gbr)}}" class="pull-left" alt="image posts" />
                    <h6><a href="{{ route('blog.detail',$item->slug) }}">{{$item->judul}}</a></h6>
                    <p>
                      <?php echo substr($item->ket,0,120) ?>
                    </p>
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                  @foreach($tags as $item)
                  <li><a href="{{ route('blog.filter.tag',$item->id) }}">{{$item->tag}}</a></li>
                  @endforeach
                </ul>
              </div>
            </aside>
          </div>
          <div class="span8">
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3>{{ $blog->judul }}</h3>
                    </div>
                    <img src="{{ asset('storage/'.$blog->file_gbr)}}" alt="image" />
                  </div>
                  <div id="content-blog">
                    <?php echo $blog->ket ?> 
                  </div>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i>{{ date_format($blog->created_at,'d-m-Y') }}</li>
                      <li><i class="icon-user"></i>{{ $blog->user->username }}</li>
                      <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                    </ul>
                    
                  </div>
                </div>
              </div>
            </article>
            <div id="pagination">
              <span class="all">Page 1 of 3</span>
              <span class="current">1</span>
              <a href="#" class="inactive">2</a>
              <a href="#" class="inactive">3</a>
            </div>
          </div>
        </div>
      </div>
</section>

@endsection
