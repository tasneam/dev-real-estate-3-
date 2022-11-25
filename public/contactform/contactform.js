jQuery(document).ready(function($) {
  "use strict";

  //Contact
  $('form.contactForm').submit(function() {
    var f = $(this).find('.form-group'),
        ferror = false,
        emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

    f.children('input').each(function() { // run all inputs

      var i = $(this); // current input
      var rule = i.attr('data-rule');

      if (rule !== undefined) {
        var ierror = false; // error flag for current input
        var pos = rule.indexOf(':', 0);
        if (pos >= 0) {
          var exp = rule.substr(pos + 1, rule.length);
          rule = rule.substr(0, pos);
        } else {
          rule = rule.substr(pos + 1, rule.length);
        }

        switch (rule) {
          case 'required':
            if (i.val() === '') {
              ferror = ierror = true;
            }
            break;

          case 'minlen':
            if (i.val().length < parseInt(exp)) {
              ferror = ierror = true;
            }
            break;

          case 'email':
            if (!emailExp.test(i.val())) {
              ferror = ierror = true;
            }
            break;

          case 'checked':
            if (!i.attr('checked')) {
              ferror = ierror = true;
            }
            break;

          case 'regexp':
            exp = new RegExp(exp);
            if (!exp.test(i.val())) {
              ferror = ierror = true;
            }
            break;
        }
        i.next('.validation').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });
    f.children('textarea').each(function() { // run all inputs

      var i = $(this); // current input
      var rule = i.attr('data-rule');

      if (rule !== undefined) {
        var ierror = false; // error flag for current input
        var pos = rule.indexOf(':', 0);
        if (pos >= 0) {
          var exp = rule.substr(pos + 1, rule.length);
          rule = rule.substr(0, pos);
        } else {
          rule = rule.substr(pos + 1, rule.length);
        }

        switch (rule) {
          case 'required':
            if (i.val() === '') {
              ferror = ierror = true;
            }
            break;

          case 'minlen':
            if (i.val().length < parseInt(exp)) {
              ferror = ierror = true;
            }
            break;
        }
        i.next('.validation').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
      }
    });
    if (ferror) return false;
    else var str = $(this).serialize();
    var idd = $(this).attr("id");
    $('#'+idd).find('.loading').addClass("show");
    setTimeout(function(){
      $('#'+idd).find('.loading').removeClass("show");
    },2000);
    $.ajax({
      type: "POST",
      url: $(this).attr('action'),
      data: str,
      success: function(data) {
        if (data.msg == 'OK') {
          $('#'+idd).find("#errormessage").removeClass("show");
          setTimeout(function(){
            $('#'+idd).find("#sendmessage").addClass("show");
          },1300);
          $('#'+idd).find("input[name$='email'],input[name$='title'], textarea").val("");
          $('#'+idd).find("input[name$='phone'],input[name$='title'], textarea").val("");
          $('#'+idd).find("input[name$='phone1'],input[name$='title'], textarea").val("");
          $('#'+idd).find("input[name$='phone2'],input[name$='title'], textarea").val("");
          $('#'+idd).find("input[name$='name'],input[name$='title'], textarea").val("");
          $('#'+idd).find("input[name$='subject'],input[name$='title'], textarea").val("");
          $('#'+idd).find("input[name$='shippingcount'],input[name$='title'], textarea").val("");
          $('#'+idd).find("input[name$='address'],input[name$='title'], textarea").val("");
          $('#'+idd).find("input[name$='nationality'],input[name$='title'], textarea").val("");



          $('#'+idd).find("input[name$='mobile'],input[name$='title'], textarea").val("");
          $('#'+idd).find("input[name$='fullname'],input[name$='title'], textarea").val("");
          $('#'+idd).find("input[name$='place_of_sending'],input[name$='title'], textarea").val("");
          $('#'+idd).find("input[name$='reception_place'],input[name$='title'], textarea").val("");
          $('#'+idd).find("input[name$='transport_type'],input[name$='title'], textarea").val("");
          setTimeout(function(){
            $('#'+idd).find("#sendmessage").hide();
          },3000);
        } else {
          $('#'+idd).find("#sendmessage").removeClass("show");
          $('#'+idd).find("#errormessage").addClass("show");
          // $('#errormessage').html(data.msg);
        }

      }
    });
    return false;
  });

});
