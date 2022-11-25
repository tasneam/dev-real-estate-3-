@extends('web.layouts.parent')


@section('style')

  <style>
    * {
      box-sizing: border-box;
    }
    html{
      overflow-x: hidden;
    }
    
    #myInput {
      background-image: url('/css/searchicon.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    }
    
    #myTable {
      border-collapse: collapse;
      width: 100%;
      border: 1px solid #ddd;
      font-size: 1rem;
      text-align: center;
     
    }
   
    
    #myTable th, #myTable td {
      text-align: left;
      padding: 12px;
      text-align: center;
    }
    
    #myTable tr {
      border-bottom: 1px solid #ddd;
      
    }
    
    #myTable tr.header, #myTable tr:hover {
      background-color: #f1f1f1;
    }
    @media (min-width: 300px) and (max-width: 766.5px){
      body{
        overflow-x: hidden;
      }
    
    }

  </style>

@endsection


@section('content')

  <main id="main">

    <!-- ======= Intro Single ======= -->
    @include('web.introsingle')
    <!-- End Intro Single-->

    <!-- ======= Contact Single ======= -->
    <section class="contact Student-Services">
      <div class="container">
        <div class="row">
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
          <table id="myTable" class="table table-striped table-bordered table-hover table-responsive" >
            <tr class="header">
              <th>@lang('web.univeristy-name') </th>
              <th>@lang('web.univeristy-ranking')</th>
              <th>@lang('web.city')</th>
              <th>@lang('web.specialization')</th>
              <th>@lang('web.educational-level')</th>
              <th>@lang('web.language-of-instruction')</th>
              <th></th>
              
            </tr>
            @forelse ($students as $university)
            <tr>
 
              <td> {{$university->name}}</td>
              <td>
                {{ App\Models\University::UNIVERSITY_RANKING_SELECT[$university->university_ranking] ?? '' }}
              </td>
              <td>{{$university->city->title}}</td>
              <td>
                @foreach($university->departments as $key => $item)
                {{ $item->name }}
                @endforeach
              </td>

              <td> 
                 {{ App\Models\University::EDUCATIONAL_LEVEL_SELECT[$university->educational_level] ?? '' }}
                </td>
              <td>
                @foreach($university->languages as $key => $item)
                {{ $item->name }}
                @endforeach
              </td>
              <td>
                <form action="{{URL('web/Reservation')}}" method="post" role="form" class="">
                  @csrf
                  <input type="hidden" name="unvircity_id" value="{{$university->id}}">
                  <div class="col-md-8 text-center">
                    <button type="submit" class="btn btn-a">@lang('web.register')</button>
                  </div>
                </form>
              </td>
            </tr>
              
            @empty
              <tr>
                <th> لا يوجد</th>
              </tr>
              
            @endforelse
           
          </table>
          
        </div>
      </div>
    </section><!-- End Contact Single-->

  </main><!-- End #main -->


  @endsection

  @section('script')
    
  <script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
  </script>

@endsection
