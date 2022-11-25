 <!-- ======= Footer ======= -->
 
 <footer >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="nav-footer">
          <ul class="list-inline">
            <li class="list-inline-item">
              <a href="{{ URL(app()->getLocale().'/index') }}">@lang('web.home')</a>
            </li>
            <li class="list-inline-item">
              <a href="{{ URL(app()->getLocale().'/about')}}">@lang('web.about')</a>
            </li>
            <li class="list-inline-item">
              <a href="{{ URL(app()->getLocale().'/real')}}">@lang('web.real-estate')</a>
            </li>
            <li class="list-inline-item">
              <a href="{{ URL(app()->getLocale().'/tourism')}}">@lang('web.tourism')</a>
            </li>
            <li class="list-inline-item">
              <a href="{{ URL(app()->getLocale().'/studentServices')}}">@lang('web.student-services')</a>
            </li>
            <li class="list-inline-item">
              <a href="{{ URL(app()->getLocale().'/contactus') }}">@lang('web.contact-us')</a>
            </li>
          </ul>
        </nav>
        <div class="socials-a">
          <ul class="list-inline">
              @forelse ($links as $link)
              @if ($link->title != "whatsapp")
              <li class="list-inline-item">
              <a class="{{$link->title}}" href="{{$link->value}}"><i class="lni-{{$link->title}}-filled"></i></a>                                
              </li>
              @endif
              @empty
              <a class="facebook" href="##"><i class="bi bi-facebook" aria-hidden="true"></i></a>
              <a class="twitter" href="##"><i class="bi bi-twitter" aria-hidden="true"></i></a>
              <a class="instagram" href="##"><i class="bi bi-instagram" aria-hidden="true"></i></a>
              <a class="linkedin" href="##"><i class="bi bi-linkedin" aria-hidden="true"></i></a>
              @endforelse
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
        <div class="copyright-footer">
          <p class="copyright color-text-a">
            {{-- &copy; Copyright --}}
            <span class="color-a">@lang('web.arab-training-group')</span>.
          </p>
        </div>
        <div class="credits">
          
           <a href="https://bootstrapmade.com/"></a>
        </div>
      </div>
    </div>
  </div>
</footer><!-- End  Footer -->





