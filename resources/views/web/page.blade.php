@extends('web.layouts.parent')


@section('style')

@endsection


@section('content')

  <main id="main">
    @include('web.partials.introsingle')
    @if ($page->layout == 0 )
    @include('web.partials.realestate-grid')
    @elseif ($page->layout == 1 )
    @include('web.partials.tourism-grid')
    @elseif ($page->layout == 2 )
    @include('web.partials.Student-Services')
    @elseif ($page->layout == 3 )
    @include('web.partials.contact')
    @else    
    @include('web.partials.about')     
    @endif

      
    {{-- @switch($pagetitle)
      @case('about')
      @include('web.partials.about')     
      @break
      @case('contactus')
      @include('web.partials.contactus')      
      @break
      @case('realestategrid')
      @include('web.partials.realestate-grid')       
      @break
      @case('realstategrid')
      @include('web.partials.realstate-single')
      
      @break
      @default
    @endswitch --}}

  </main><!-- End #main -->



@endsection

@section('script')
  
@endsection