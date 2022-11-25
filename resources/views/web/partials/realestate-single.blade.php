
    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8"> 
            <div id="property-single-carousel" class="swiper" >
              <div class="swiper-wrapper">
                @forelse ($real->images as $image )
                  <div class="carousel-item-b swiper-slide">
                    <img src="{{ $image->getUrl() }}" alt=""   >
                  </div>
                @empty
                <div class="carousel-item-b swiper-slide">
                  <img src="" alt="">
                </div>
                @endforelse
                
                
              </div>
            </div>
            <div class="property-single-carousel-pagination carousel-pagination"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">

            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="bi bi-cash">$</span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c">{{$real->price}}</h5>
                    </div>
                  </div>
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
                        <strong>@lang('web.realestate-id'):</strong>
                        <span>{{$real->id}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>@lang('web.location'):</strong>
                        <span>{{$real->location}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>@lang('web.realestate-type'):</strong>
                        <span>{{$real->property_type}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>@lang('web.status'):</strong>
                        <span>{{$real->status}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>@lang('web.area'):</strong>
                        <span>{{$real->area}}m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>@lang('web.room'):</strong>
                        <span>{{$real->room_num}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>@lang('web.salon'):</strong>
                        <span>{{$real->salon_num}}</span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>@lang('web.active'):</strong>
                        <span>{{$real->active}}</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">@lang('web.realestate-description')</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                    {!! $real->description !!}
                  </p>
                 
                </div>

                @if (isset($real->notes))
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">@lang('web.notes')</h3>
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">
                  <ul class="list-a no-margin">
                    {!! $real->notes !!}
                  </ul>
                </div>
                @endif

              </div>
            </div>
          </div>

          @if (isset($real->video) or isset($real->video_url))
          <div class="col-md-10 offset-md-1">
            <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-video-tab" data-bs-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">@lang('web.video')</a>
              </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                  @if (isset($real->video))
                  <iframe width="100%" height="460" src="{{ $real->video->getUrl()}}" title="{{ $real->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  @elseif(isset($real->video_url))
                  <iframe width="100%" height="460" src="{{ $real->video_url}}" title="{{ $real->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  @endif
              </div>
           
            </div>
          </div>
            
        @endif

          
         @include('web.form')
        </div>
      </div>
    </section><!-- End Property Single-->


@section('script')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="{{asset('contactform/contactform.js')}}"></script>


    
@endsection