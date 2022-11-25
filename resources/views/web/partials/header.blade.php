<!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">Estate<span class="color-b">Agency</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link @if (\Request::url() == URL(app()->getLocale().'/index')) active @endif" href="{{ URL(app()->getLocale().'/index') }}">@lang('web.home')</a>
          </li>

          <li class="nav-item">
            <a class="nav-link @if (\Request::url() == URL(app()->getLocale().'/page/1')) active @endif" href="{{ URL(app()->getLocale().'/page/1')}}">@lang('web.about')</a>
          </li>

          <li class="nav-item">
            <a class="nav-link @if (\Request::url() == URL(app()->getLocale().'/real')) active @endif" href="{{ URL(app()->getLocale().'/real')}}">@lang('web.real-estate')</a>
          </li>

          <li class="nav-item">
            <a class="nav-link @if (\Request::url() == URL(app()->getLocale().'/tourism')) active @endif" href="{{ URL(app()->getLocale().'/tourism')}}">@lang('web.tourism')</a>
          </li>

          <li class="nav-item">
            <a class="nav-link @if (\Request::url() == URL(app()->getLocale().'/studentServices')) active @endif" href="{{ URL(app()->getLocale().'/studentServices')}}">@lang('web.student-services')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if (\Request::url() == URL(app()->getLocale().'/contactus')) active @endif" href="{{ URL(app()->getLocale().'/contactus') }}">@lang('web.contact-us')</a>
          </li>
        </ul>
      </div>

     

      <div class="dropdown ourdropDown">
        {{-- <ul class="nav navbar-nav">
          <li class="dropdown languages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  {{ strtoupper(\App::getLocale()) }}
              </a>
              <ul class="dropdown-menu">
                  <li class="header"></li>
                  <ul class="menu language-menu">
                      @foreach(config('app.languages') as $short => $title)
                          <li class="language-link">
                              <a href="{{ route('{{ url()->current() }}?change_language={{ $short }}', $short) }}">
                                  {{ $title }} ({{ strtoupper($short) }})
                              </a>
                          </li>
                      @endforeach
                  </ul>
                  <li class="footer"></li>
              </ul>
          </li>
      </ul> --}}

      {{-- <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="{{ url()->current() }}">
                {{ strtoupper(app()->getLocale()) }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @foreach(config('panel.available_languages') as $langLocale => $langName)
                    <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                @endforeach
            </div>
        </li>
    </ul> --}}
    {{-- @if(count(config('panel.available_languages', [])) > 1)
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach(app()->setLocale() as $langLocale => $langName)
                            <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        @endif --}}


        {{-- app()->setLocale($language) --}}



        
        <button class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Language
          {{-- <a class="dropdown-item" href="{{ url()->current() }}"></a>  --}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="{{url('ar')}}">@lang('web.arabic')</a>
          <a class="dropdown-item" href="{{url('en')}}">@lang('web.english')</a>
          <a class="dropdown-item" href="{{url('tr')}}">@lang('web.turkish')</a>
        </div>
      </div>

    </div>
  </nav><!-- End Header/Navbar -->















