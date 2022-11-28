    <!-- ======= Contact Single ======= -->
    <section class="contact Student-Services">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="title">
              @lang('web.find-your-specialty')
            </h2>
          </div>
          <div class="col-sm-12 section-t8 your-specialty">
            <div class="row">
              <div class="col-md-12">
                <form action="{{URL('web/PostSearch')}}" method="post" role="form" class="">
                  @csrf
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">@lang('web.university-ranking')</label>
                        <select name="university_ranking" class="form-control form-select form-control-a" id="University-Ranking">
                          <option  value="">@lang('web.all')</option>

                          @foreach(App\Models\University::UNIVERSITY_RANKING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('university_ranking', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                          @endforeach
                          
                        </select>
                      </div>
                    </div>
                    {{-- <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">University Name</label>
                        <select class="form-control form-select form-control-a" id="University-Name">
                          @forelse ($universities as $university)
                          <option value="{{$university->id}}">{{$university->name}}</option>                          
                          @empty
                          <option>All</option>
                          @endforelse
                          
                        </select>
                      </div>
                    </div> --}}
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">@lang('web.educational-level')</label>
                        <select name="educational_level" class="form-control form-select form-control-a" id="Educational-level">
                          <option  value="">@lang('web.all')</option>
                          @foreach(App\Models\University::EDUCATIONAL_LEVEL_SELECT as $key => $label)
                          <option value="{{ $key }}" {{ old('educational_level', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">@lang('web.departments')</label>
                        <select name="departments" class="form-control form-select form-control-a" id="specialization">
                          <option  value="">@lang('web.all')</option>

                          @forelse ($departments as $department)
                          <option value="{{$department->id}}">{{$department->name}}</option>                          
                          @empty
                          <option>@lang('web.all')</option>

                          @endforelse
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">@lang('web.language-of-instruction')</label>
                        <select name="languages" class="form-control form-select form-control-a" id="language-instruction">
                          <option  value="">@lang('web.all')</option>
                          @forelse ($languages as $language)
                          <option value="{{$language->id}}">{{$language->name}}</option>                          
                          @empty
                          <option>All</option>
                          @endforelse
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">@lang('web.the-City')</label>
                        <select name="city_id" class="form-control form-select form-control-a" id="the-City">
                          <option  value="">@lang('web.all')</option>
                          @forelse ($cities as $city)
                          <option value="{{$city->id}}">{{$city->title}}</option>                          
                          @empty
                          <option>All</option>
                          @endforelse
                        </select>  
                      </div>
                    </div>

                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-a">@lang('web.search')</button>
                    </div>
                  </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Single-->
