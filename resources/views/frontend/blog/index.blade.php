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
              <li class="active">Blog</li>
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
                  <li><i class="icon-angle-right"></i><a href="#">{{$item->kategori}}</a><span> ({{$item->jml_kategori}})</span></li>
                  @endforeach
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                  @foreach($latest_posts as $item)
                  <li>
                    <img src="{{ asset('storage/'.$item->file_gbr)}}" class="pull-left" alt="image posts" />
                    <h6><a href="#">{{$item->judul}}</a></h6>
                    <p>
                      {{ substr($item->ket,0,120)}}
                    </p>
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                  @foreach($tags as $item)
                  <li><a href="#">{{$item->tag}}</a></li>
                  @endforeach
                </ul>
              </div>
            </aside>
          </div>
          <div class="span8">
            @foreach($blogs as $item)
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{ $item->judul }}</a></h3>
                    </div>
                    <img src="{{ asset('storage/'.$item->file_gbr)}}" alt="image" />
                  </div>
                  <p>
                    {{ substr($item->ket,0,200) }}
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i>{{ date_format($item->created_at,'d-m-Y') }}</li>
                      <li><i class="icon-user"></i>{{ $item->user->username }}</li>
                      <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                    </ul>
                    <a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                  </div>
                </div>
              </div>
            </article>
            @endforeach
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
