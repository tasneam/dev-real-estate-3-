@extends('web.layouts.parent')


@section('style')

@endsection


@section('content')

  <main id="main">

    <!-- ======= Intro Single ======= -->
    @include('web.introsingle')
    <!-- End Intro Single-->

    <!-- =======  Blog Grid ======= -->
    <section class="news-grid grid">
      <div class="container">
        <div class="row">
          @forelse ($tourisms as $tourism)
          <div class="col-md-4">
            <div class="card-box-b card-shadow news-box">
              <div class="img-box-b" >
                <img src="{{ $tourism->image->getUrl() }}" alt="" class="img-b img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-header-b">
                  <div class="card-category-b">
                    {{-- {{ URL(app()->getLocale().'/index') }} --}}
                    <a href="{{URL(app()->getLocale().'tourismsingle/'.$tourism->id)}}" class="category-b">@lang('web.tourism')</a>
                  </div>
                  <div class="card-title-b">
                    <h2 class="title-2">
                      <a href="{{URL(app()->getLocale().'tourismsingle/'.$tourism->id)}}">{{$tourism->title}}</a>
                    </h2>
                  </div>
                  <div class="card-date">
                    <span class="date-b">{{$tourism->days_num}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
            
          @empty
          <div class="col-md-4">
            <div class="card-box-b card-shadow news-box">
              <div class="img-box-b">
                <img src="assets/img/post-2.jpg" alt="" class="img-b img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-header-b">
                  <div class="card-category-b">
                    <a href="blog-single.html" class="category-b">Travel</a>
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
          </div>
          
          @endforelse
         
    
        </div>
        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <span class="bi bi-chevron-left"></span>
                  </a>
                </li>
                {{$tourisms->links()}}
                {{-- <li class="page-item">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li> --}}
                <li class="page-item next">
                  <a class="page-link" href="#">
                    <span class="bi bi-chevron-right"></span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Blog Grid-->

  </main><!-- End #main -->


@endsection

@section('script')
      
@endsection