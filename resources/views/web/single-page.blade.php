@extends('web.layouts.parent')


@section('style')

@endsection


@section('content')

  <main id="main">
    @include('web.partials.introsingle')
     @if ($desgin == 1 )
       @include('web.partials.singletourism')    
     @elseif ($desgin == 2 )
       @include('web.partials.realestate-single')    

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="{{asset('contactform/contactform.js')}}"></script>
@endsection