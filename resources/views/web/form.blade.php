<div class="col-md-12">
    <div class="row section-t3">
      <div class="col-sm-12">
        <div class="title-box-d">
          <h3 class="title-d">@lang('web.contact')</h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4">
        <img src="assets/img/agent-4.jpg" alt="" class="img-fluid">
      </div>
     
      <div class="col-md-12 col-lg-8">
        <div class="property-contact">
          <form action="{{URL('web/customerdata')}}" class="form-a contactForm" id="contactForm" method="post">
            @csrf
            <input type="hidden" name="arrived_from" value="0">
            <div class="row">
              <div class="col-sm-6 col-md-6 mb-1">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg form-control-a" name="name" id="inputName" placeholder="@lang('web.name')" required>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 mb-1">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg form-control-a" name="email" id="inputEmail1" placeholder="@lang('web.email')" required>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 mb-1">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg form-control-a" name="first_phone" id="phone1" placeholder="@lang('web.first-phone')" required>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 mb-1">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg form-control-a" name="sec_phone" id="sec_phone" placeholder="@lang('web.sec-phone')" required>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 mb-1">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg form-control-a" name="address" id="address" placeholder="@lang('web.address')" required>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 mb-1">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg form-control-a" name="nationality" id="nationality" placeholder="@lang('web.nationality')" required>
                </div>
              </div>
              <div class="col-md-12 mb-1">
                <div class="form-group">
                  <textarea id="textMessage" class="form-control" placeholder="@lang('web.message-placeholder')" name="notes" cols="45" rows="8" required></textarea>
                </div>
              </div>
              <div class="col-md-12 my-3">
                <div class="mb-3">
                  <div class="errormessage" id="errormessage"></div>
                  <div class="sendmessage" id="sendmessage">@lang('web.success-send')</div>
                </div>
              </div>
              <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-a">@lang('web.send')</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>