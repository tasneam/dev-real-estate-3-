@extends('web.layouts.parent')


@section('style')

@endsection


@section('content')


  <main id="main">

    <!-- ======= Intro Single ======= -->
    {{-- <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"> {{$P_tourism->title}}</h1>
              <span class="color-text-a">{!! $P_tourism->shortDescription !!}</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ URL(app()->getLocale().'/index') }}">@lang('web.home')</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  {{$P_tourism->title}}
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>       --}}
    <!-- End Intro Single-->

    <!-- ======= Blog Single ======= -->
  
    <section class="news-single nav-arrow-b">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="news-img-box" style="margin-bottom:20px ; text-align: center">
              <img src="{{ $tourism->image->getUrl() }}" alt="" class="img-fluid">
            </div>
          </div>
          <div class="col-sm-12">

            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="bi bi-cash">$</span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c">{{$tourism->price}}</h5>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="col-md-7 col-lg-8 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">@lang('web.tourism-description') </h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                    {!! $tourism->description !!}

                  </p>
                  <p class="description color-text-a no-margin">
                    {!! $tourism->notes !!}

                  </p>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">@lang('web.view-details')</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex justify-content-between">
                        <strong>@lang('web.tourism-id'):</strong>
                        <span>{{$tourism->id}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>@lang('web.hotel-name'):</strong>
                        <span>{{$tourism->hotel_name}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>@lang('web.visa'):</strong>
                        <span>{{$tourism->visa}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>@lang('web.airline-tickets'):</strong>
                        <span>{{$tourism->airline_tickets}}</span>
                      </li>
                   
                      <li class="d-flex justify-content-between">
                        <strong>@lang('web.Translator'):</strong>
                        <span>{{$tourism->translator}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>@lang('web.days-num'):</strong>
                        <span>{{$tourism->days_num}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>@lang('web.active'):</strong>
                        <span>{{$tourism->active}}</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="post-footer">
                <div class="post-share">
                  <span>@lang('web.share') </span>
                  <ul class="list-inline socials">
                    <li class="list-inline-item">
                      <a href="#">
                        {{-- <i class="bi bi-{!! $shareComponent !!}" aria-hidden="true"></i> --}}
                      </a>
                    </li>
                    {{-- <li class="list-inline-item">
                      {!! $shareComponent !!}
                    </li> --}}
  
                    {{-- <li class="list-inline-item">
                      <a href="#">
                        <i class="bi bi-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="bi bi-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="bi bi-linkedin" aria-hidden="true"></i>
                      </a>
                    </li> --}}
                  </ul>
                </div>
              </div>
            </div>
          </div>

  

  <!----------------------------------------------------->
         @include('web.form')
         
         
        </div>
      </div>
    </section><!-- End Blog Single-->

{{--       
    @empty
      
    @endforelse --}}
    
  </main><!-- End #main -->


  @endsection

  @section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <script src="{{asset('contactform/contactform.js')}}"></script>
  @endsection