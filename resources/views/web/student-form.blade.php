@extends('web.layouts.parent')


@section('style')

@endsection


@section('content')



  <main id="main">
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Book Cover Deisgn</h1>
              <span class="color-text-a">News Single.</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ URL('web/index') }}">@lang('web.home')</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  @yield('description') Cover Deisgn
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
    {{-- @include('web.introsingle') --}}

    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row">   
          @include('web.form') 
          {{-- <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Contact Agent</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="property-contact">
                  <form class="form-a">
                    <div class="row">
                      <div class="col-sm-6 col-md-6 mb-1">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-6 mb-1">
                        <div class="form-group">
                          <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-6 mb-1">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg form-control-a" id="phone1" placeholder="phone 1 *" required>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-6 mb-1">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg form-control-a" id="phone2" placeholder="phone 2 *" required>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-6 mb-1">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg form-control-a" id="address" placeholder="Your address *" required>
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-6 mb-1">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg form-control-a" id="Nationality" placeholder="Your Nationality *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-a">Send Message</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </section><!-- End Property Single-->

  </main><!-- End #main -->

  
@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="{{asset('contactform/contactform.js')}}"></script>
@endsection
