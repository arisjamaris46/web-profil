@extends('frontend.layout')

@section('content')

@if (session('success_message'))
  <div class="toast" style="position: absolute; top: 0; right: 0;background:green; color:white; margin-top:0.25rem;margin-right:0.25rem;margin-bottom:0.25rem" data-autohide="true" data-animation="true" data-delay="500">
    <div class="toast-header" role="alert">
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      {{ session('success_message') }}
    </div>
  </div>
@endif
<section>
      <!-- start slider -->
      <!-- Slider -->
      <div id="nivo-slider">
        <div class="nivo-slider">
          <!-- Slide #1 image -->
          <img src="{{asset('img/slides/nivo/bg-1.jpg')}}" alt="" title="#caption-1" />
          <!-- Slide #2 image -->
          <img src="{{asset('img/slides/nivo/bg-2.jpg')}}" alt="" title="#caption-2" />
          <!-- Slide #3 image -->
          <img src="{{asset('img/slides/nivo/bg-3.jpg')}}" alt="" title="#caption-3" />
        </div>
        <div class="container">
          <div class="row">
            <div class="span12">
              <!-- Slide #1 caption -->
              <div class="nivo-caption" id="caption-1">
                <div>
                  <h2>Awesome <strong>features</strong></h2>
                  <p>
                    Kami menyediakan berbagai macam Produk Herbal Berkualitas dan terjangkau

                  </p>

                </div>
              </div>
              <!-- Slide #2 caption -->
              <div class="nivo-caption" id="caption-2">
                <div>
                  <h2>Fully <strong>responsive</strong></h2>
                  <p>
                    Kami Menyedia Berbagai Solusi untuk masalah anda
                  </p>

                </div>
              </div>
              <!-- Slide #3 caption -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end slider -->

</section>

<!-- section blog -->
<section class="about-us">
    <div class="container">
        <div class="row">
          <div class="span6">
            <h2>Welcome to <strong>Rava Store</strong></h2>
            <p>
              Ei mel semper vocent persequeris, nominavi patrioque vituperata id vim, cu eam gloriatur philosophia deterruisset. Meliore perfecto repudiare ea nam, ne mea duis temporibus. Id quo accusam consequuntur, eum ea debitis urbanitas. Nibh reformidans vim ne.
            </p>
            <p>
              Iudico definiebas eos ea, dicat inermis hendrerit vel ei, legimus copiosae quo at. Per utinam corrumpit prodesset te, liber praesent eos an. An prodesset neglegentur qui, usu ancillae posidonium in, mea ex eros animal scribentur. Et simul fabellas sit.
              Populo inimicus ne est.
            </p>
            <p>
              Alii wisi phaedrum quo te, duo cu alia neglegentur. Quo nonumy detraxit cu, viderer reformidans ut eos, lobortis euripidis posidonium et usu. Sed meis bonorum minimum cu, stet aperiam qualisque eu vim, vide luptatum ei nec. Ei nam wisi labitur mediocrem.
              Nam saepe appetere ut, veritus graecis minimum no vim. Vidisse impedit id per.
            </p>
          </div>
          <div class="span6">
            <!-- start flexslider -->
            <div class="flexslider">
              <ul class="slides">
                <li>
                  <img src="img/works/full/image-01-full.jpg" alt="" />
                </li>
                <li>
                  <img src="img/works/full/image-02-full.jpg" alt="" />
                </li>
                <li>
                  <img src="img/works/full/image-03-full.jpg" alt="" />
                </li>
              </ul>
            </div>
            <!-- end flexslider -->
          </div>
    </div>
<!--   solidline   -->
    <div class="row">
        <div class="span12">
            <div class="solidline"></div>
        </div>
    </div>
<!--   solidline   -->

    </div>
</section>
<!-- endsection blog -->

<!-- section product -->
 <section id="products">
      <div class="container">
        <div class="row">
          <div class="span12">
            <article>
              <div class="top-wrapper">
                <div class="post-heading">
                  <h3><a href="#">Our Product</a></h3>
                </div>

                 <p>
                    The products we offer are guaranteed quality and have many variants. The price is very affordable among the lower middle class. No other, please if you are interested, you can contact us or fill in the order form below.
                </p>

                <!-- start flexslider -->
                <div class="flexslider">
                  <ul class="slides">

                   @foreach($products as $item)
                    <li>
                      <img src="{{ asset('storage/'.$item->gbr_produk)}}" alt="produk rava" />
                    </li>
                    @endforeach
                  </ul>
                </div>
                <!-- end flexslider -->
              </div>

            </article>
          </div>

        </div>

        <!--   solidline   -->
        <div class="row">
            <div class="span12">
                <div class="solidline"></div>
            </div>
        </div>
        <!--   solidline   -->

      </div>
</section>
<!-- endsection product -->

<!-- contact -->
<section id="contacts">

    <div class="container">
      <div class="row">
        <div class="span12">
          <h4>Please fill in your order in <strong>Our Contact Form</strong></h4>

          <form action="{{ route('kirim.pesan') }}" method="GET" role="form" class="contactForm">
            @csrf
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>

            <div class="row">
              <div class="span4 form-group">
                <input type="text" name="name" class="form-control" required id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" autocomplete="off"/>
                <div class="validation"></div>
              </div>
              <div class="span4 form-group">
                <input type="email" class="form-control" required name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" autocomplete="off" />
                <div class="validation"></div>
              </div>
              <div class="span4 form-group">
                <input type="text" class="form-control" required name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" autocomplete="off"/>
                <div class="validation"></div>
              </div>
              <div class="span12 margintop10 form-group">
                <textarea class="form-control" name="message" rows="12" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
                <p class="text-center">
                  <button class="btn btn-large btn-default margintop10" type="submit">Submit message</button>
                </p>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!--   solidline   -->
        <div class="row">
            <div class="span12">
                <div class="solidline"></div>
            </div>
        </div>
    <!--   solidline   -->

    </div>
</section>
<!--  endsection contact -->

<!-- section client -->
<section id="clients">
      <div class="container">
        <div class="row marginbot30">
          <div class="span12">
            <h4 class="heading"><strong>Client</strong> testimonials<span></span></h4>
            <div class="row">

            @foreach($clients as $item)
              <div class="span4">
                <div class="wrapper">
                  <div class="testimonial">
                    <p class="text">
                      <i class="icon-quote-left icon-48"></i>{{ $item->testimoni }}
                    </p>
                    <div class="author">
                      <img src="{{ asset('storage/'.$item->gbr_logo)}}" class="img-circle bordered" alt="" width="48"/>
                      <p class="name">
                      {{ $item->nm_klien }}
                      </p>
                      <span class="info">{{ $item->pekerjaan }}, {{ $item->no_hp}}</span>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </section>
<!-- endsection client -->
@endsection
