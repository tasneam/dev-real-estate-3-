@extends('web.layouts.parent')


@section('style')

@endsection


@section('content')

  <main id="main">
    @include('web.partials.introsingle')
    @if ($page->Layout == 0 )
      @if ($pagetitle == 'realestategrid')
      @include('web.partials.realestate-grid')       
      @elseif ($pagetitle == 'tourismgrid')
      @include('web.partials.tourism-grid')    
      @endif
      
    @elseif ($page->Layout == 1 )
    @include('web.partials.tourism-grid')    

      
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