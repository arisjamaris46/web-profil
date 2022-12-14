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
              <li class="active">Tags</li>
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
                  <input placeholder="Type something" type="text" class="input-medium search-query" action="{{ route('blog') }}" action="GET">
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
                    <?php echo substr($item->ket,0,120) ?>
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
            @foreach($blogs as $row)
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="{{route('blog.detail',$row->slug)}}">{{ $row->judul }}</a></h3>
                    </div>
                    <img src="{{ asset('storage/'.$row->file_gbr)}}" alt="image" />
                  </div>
                  <p>
                    <?php echo substr($row->ket,0,200) ?>
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i>{{ $row->created_at }}</li>
                      <li><i class="icon-user"></i>{{ $row->username }}</li>
                      <!--<li><i class="icon-comments"></i><a href="#">4 Comments</a></li> -->
                    </ul>
                    <a href="{{ route('blog.detail',$row->slug) }}" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                  </div>
                </div>
              </div>
            </article>
            @endforeach
            <div id="pagination">
              {{ $blogs->links() }}
            </div>
          </div>
        </div>
      </div>
</section>


@endsection
