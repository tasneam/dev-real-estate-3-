@extends('web.layouts.parent')


@section('style')

@endsection


@section('content')


  <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel swiper position-relative">

    <div class="swiper-wrapper">
      @forelse($sliders as $slider)
      <div class="swiper-slide carousel-item-@if($loop->first) active @endif" style="background-image: url('{{ $slider->image->getUrl()}}');">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">          
                    <h1 class="intro-title mb-4 ">
                      <span class="color-b">{{$slider->title}} 
                    </h1>
                    <p class="intro-title-top">
                      <br> {!!$slider->description !!}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
       @empty
      <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url({{asset('web/img/slide-1.jpg')}})">
        {{-- {{ $slider1->image->getUrl() }} --}}
        {{-- {{str_limit($about->title,50,'')}} --}}
        {{-- {{asset('uploads/'.$sliders->image)}} --}}
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <h1 class="intro-title mb-4 ">
                      <span class="color-b">title
                    </h1>
                    <p class="intro-title-top">
                      <br> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem tenetur commodi animi recusandae nam odit, officiis fugiat aperiam perferendis nostrum optio aut ipsa quo? Asperiores nulla accusantium distinctio temporibus delectus!
                    </p>   
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
      @endforelse
      {{-- <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url({{ $slider2->image->getUrl() }})">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    
                    <h1 class="intro-title mb-4 ">
                      <span class="color-b">{{$slider2->title}} 
                    </h1>
                    <p class="intro-title-top">
                      <br> {!!$slider2->description !!}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>--}}
    </div>
    <div class="swiper-pagination"></div>

  </div><!-- End Intro Section -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="section-services section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">@lang('web.our-services')</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-cart"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">@lang('web.real-estate')</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  {!! Str::limit($Service1->description ,50,'')!!}
                </p>
              </div>
              <div class="card-footer-c">
                <a href="{{URL(app()->getLocale().'/real')}}" class="link-c link-icon">@lang('web.read-more')
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-calendar4-week"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">@lang('web.tourism')</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  {!! Str::limit($Service2->description ,50,'')!!}

                </p>
              </div>
              <div class="card-footer-c">
                <a href="{{ URL(app()->getLocale().'/tourism')}}" class="link-c link-icon">@lang('web.read-more')
                  <span class="bi bi-calendar4-week"></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-card-checklist"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">@lang('web.student-services')</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  {!! Str::limit($Service3->description ,50,'')!!}

                </p>
              </div>
              <div class="card-footer-c">
                <a href="{{ URL(app()->getLocale().'/studentServices')}}" class="link-c link-icon">@lang('web.read-more')
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">@lang('web.latest-real-estates')</h2>
              </div>
              <div class="title-link">
                <a href="{{ URL(app()->getLocale().'/real')}}">@lang('web.all-real-estate')
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="property-carousel" class="swiper">
          <div class="swiper-wrapper">
            @forelse ($realestates as $realestate)
            <div class="carousel-item-b swiper-slide">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="{{ $realestate->images[0]->getUrl() }}" alt="" class="img-a img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        {{-- {{URL('/'.app()->getLocale().'realsingle/ '.$real->id)}} --}}
                        {{-- {{URL('web/realsingle/ '.$realestate->id)}} --}}
                        {{-- {{ route('/'.app()->getLocale(). '/'.'web.realestate-single'. $realestate->id) }} --}}
                        {{-- {{URL(app()->getLocale().'/realsingle/ '.$realestate->id)}} --}}
                        <a href="{{URL('/'.app()->getLocale().'/realsingle/'.$realestate->id)}}">{{$realestate->title}}
                          <br /> {{$realestate->City->title}}</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a">{{$realestate->status}} | ${{$realestate->price}}</span>
                      </div>
                    
                      <a href="{{URL(app()->getLocale().'/realsingle/'.$realestate->id)}}" class="link-a">Click here to view
                        <span class="bi bi-chevron-right"></span>
                      </a>
                    </div>
                    <div class="card-footer-a">
                      <ul class="card-info d-flex justify-content-around">
                        <li>
                          <h4 class="card-info-title">@lang('web.area')</h4>
                          <span>{{$realestate->area}}@lang('web.m')
                            <sup>2</sup>
                          </span>
                        </li>
                        <li>
                          <h4 class="card-info-title">@lang('web.salon')</h4>
                          <span>{{$realestate->salon_num}}</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">@lang('web.room')</h4>
                          <span>{{$realestate->room_num}}</span>
                        </li>
                        
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->
              
            @empty
            
            <div class="carousel-item-b swiper-slide">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="{{asset('web/img/property-3.jpg')}}" alt="" class="img-a img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="property-single.html">157 West
                          <br /> Central Park</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a">rent | $ 12.000</span>
                      </div>
                      <a href="property-single.html" class="link-a">Click here to view
                        <span class="bi bi-chevron-right"></span>
                      </a>
                    </div>
                    <div class="card-footer-a">
                      <ul class="card-info d-flex justify-content-around">
                        <li>
                          <h4 class="card-info-title">Area</h4>
                          <span>340m
                            <sup>2</sup>
                          </span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Beds</h4>
                          <span>2</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Baths</h4>
                          <span>4</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Garages</h4>
                          <span>1</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->
              
            @endforelse
          </div>
        </div>
        <div class="propery-carousel-pagination carousel-pagination"></div>

      </div>
    </section><!-- End Latest Properties Section -->



    <!-- ======= Latest Tourisms Section ======= -->
    <section class="section-news section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">@lang('web.latest-tourisms')</h2>
              </div>
              <div class="title-link">
                <a href="{{ URL(app()->getLocale().'/tourism')}}">@lang('web.all-tourism')
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="news-carousel" class="swiper">
          <div class="swiper-wrapper">
            @forelse ($latesttravel as $travel)
            <div class="carousel-item-c swiper-slide">
              <div class="card-box-b card-shadow news-box">
                <div class="img-box-b">
                  <img src="{{ $travel->image->getUrl() }}" alt="" class="img-b img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-category-b">
                      <a href="{{URL('/'.app()->getLocale().'/tourismsingle/'.$travel->id)}}" class="category-b">@lang('web.tourism')</a>
                    </div>
                    <div class="card-title-b">
                      <h2 class="title-2">
                        <a href="{{URL('/'.app()->getLocale().'/tourismsingle/'.$travel->id)}}">{{$travel->title}}
                          <br> 
                          @if ($travel->active == 1)
                          @lang('web.active')
                          @else
                          @lang('web.in-active')                        
                          @endif
                        </a>                        
                      </h2>
                    </div>
                    <div class="card-date">
                      <span class="date-b">{{$travel->days_num}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->
              
            @empty
            
            <div class="carousel-item-c swiper-slide">
              <div class="card-box-b card-shadow news-box">
                <div class="img-box-b">
                  <img src="{{asset('web/img/post-5.jpg')}}" alt="" class="img-b img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-category-b">
                      <a href="#" class="category-b">Travel</a>
                    </div>
                    <div class="card-title-b">
                      <h2 class="title-2">
                        <a href="blog-single.html">Travel is comming
                          <br> new</a>
                      </h2>
                    </div>
                    <div class="card-date">
                      <span class="date-b">18 Sep. 2017</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->
            @endforelse
          </div>
        </div>
        <div class="news-carousel-pagination carousel-pagination"></div>
      </div>
    </section><!-- End Latest News Section -->
  </main><!-- End #main -->


@endsection

@section('script')
  
@endsection