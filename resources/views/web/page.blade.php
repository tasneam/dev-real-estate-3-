@extends('web.layouts.parent')


@section('style')

@endsection


@section('content')

  <main id="main">
    @include('web.partials.introsingle')
    @switch($pagetitle)
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
    @endswitch

  </main><!-- End #main -->



@endsection

@section('script')
  
@endsection