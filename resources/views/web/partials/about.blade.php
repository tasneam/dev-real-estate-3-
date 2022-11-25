
    <!-- ======= About Section ======= -->
    <section class="section-about">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 position-relative">
              <div class="about-img-box">
                <img src="{{$page->image->getUrl()}}" alt="" class="img-fluid">
              </div>
              <div class="sinse-box">
                <h3 class="sinse-title">
                  {{$page->pageItems[0]->title}}
            
                </h3>
              </div>
            </div>
            <div class="col-md-12 section-t8 position-relative">
              <div class="row">
                <div class="col-md-6 col-lg-5">
                  <img src="{{$page->pageItems[0]->image->getUrl()}}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-2  d-none d-lg-block position-relative">
                  <div class="title-vertical d-flex justify-content-start">
                    {{-- <span>EstateAgency Exclusive Property</span> --}}
                  </div>
                </div>
                <div class="col-md-6 col-lg-5 section-md-t3">
                  <div class="title-box-d">
                    <h3 class="title-d">
                      {!!$page->shortDescription!!}
                      {{-- <span class="color-d">porttitor</span> lectus --}}
                      {{-- <br> nibh. --}}
                    </h3>
                  </div>
                  <p class="color-text-a">
                    {!! $page->description !!}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  