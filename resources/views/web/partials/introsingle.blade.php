    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"> {{$page->title}}</h1>
              {{-- <span class="color-text-a">News Single.</span> --}}
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ URL(app()->getLocale().'/index') }}">@lang('web.home')</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  {{$page->title}}
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>    
    <!-- End Intro Single-->