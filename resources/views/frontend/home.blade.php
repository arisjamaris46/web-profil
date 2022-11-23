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
<section id="about-us">
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

      <div class="row">
        <div class="span12">
          Rava Store, ipsum dolor sit amet consectetur adipisicing elit. Sint, cumque. Perferendis itaque explicabo sed qui, maxime possimus error ullam rem nam quisquam inventore excepturi temporibus distinctio iusto omnis molestiae voluptates?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque, dolor soluta. Excepturi ea ut quam quae perferendis quidem sapiente temporibus aperiam aliquid, corrupti totam assumenda explicabo.
        </div>
      </div>
</section>

<section id="products">
      <div class="container">
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->
        <!-- Portfolio Projects -->
        <div class="row">
          <div class="span12">
            <h4 class="heading"> <strong>Our Product</strong></h4>
            <div class="row">
              <section id="projects">
                <ul id="thumbs" class="portfolio">
                    @foreach ($products as $item)
                        <!-- Item Project and Filter Name -->
                        <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="{{ $item->nm_produk }} - Rp.{{$item->hrg_produk}}" href="{{ asset('storage/'.$item->gbr_produk)}}">
                            <span class="overlay-img"></span>
                            <span class="overlay-img-thumb font-icon-plus"></span>
                            </a>
                        <!-- Thumb Image and Description -->
                        <div>
                          <img src="{{ asset('storage/'.$item->gbr_produk)}}" alt="{{ $item->ket_produk }}">
                          
                        </div>
                        </li>
                        <!-- End Item Project -->

                    @endforeach

                </ul>
              </section>
            </div>
          </div>
        </div>
        <!-- End Portfolio Projects -->
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline">
            </div>
          </div>
        </div>
        <!-- end divider -->

        <div class="row" id="clients">
          <div class="span12">
            <h4><strong>Our Client</strong></h4>
            <ul id="mycarousel" class="jcarousel-skin-tango recent-jcarousel clients">
              @foreach ($clients as $item)
                  <li>
                    <a href="#">
                      <img src="{{asset('storage/'.$item->gbr_logo)}}" class="client-logo" alt="Klien Rava Store" />
                    </a>
                  </li>
                  
              @endforeach
            </ul>
          </div>
        </div>
      </div>
</section>
<!-- contact -->
<section id="contacts">

    <div class="container">
      <div class="row">
        <div class="span12">
          <h4>Get in touch with us by filling <strong>contact form below</strong></h4>

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
                  <button class="btn btn-large btn-primary margintop10" type="submit">Submit message</button>
                </p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</section>
@endsection
