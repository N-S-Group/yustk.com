function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

$(document).ready(function(){

    function errorAuth(text){
        if($("#showError").length){
            $("#showError").next("br").remove();
            $("#showError").remove();
        }
        if(!$("#showError").length){
            $("#password").next("br").after('<span id="showError"  style="text-align: center; width: 100%; color: red">'+text+'</span><br>');
        }
    }

    $("#submit").click(function(){
        if(!$.trim($("#login").val())){
            errorAuth('Для входа введите имя пользователя');
            return false;
        }
        if(!$.trim($("#password").val())){
            errorAuth('Для входа введите пароль');
            return false;
        }
        $.post(url+"/login/index",{login:$.trim($("#login").val()),password:$.trim($("#password").val())},function(data){
            switch (parseInt(data)){
                case 3: location.href=url+"/cabinet/index.php"; break;
                case 2: errorAuth('Не верный имя пользователя или пароль'); break;
            }
        });
    });

    function closeModal(){
       /* $("#validEmail").css({
            "background-image": "none"
        });*/
        $("#showerrorsEmail").text('');
    }

   $(document).on('open', '.remodal', function () {
        console.log('open');
    });

    $(document).on('opened', '.remodal', function () {
        console.log('opened');
    });

    $(document).on('close', '.remodal', function () {
        console.log('close');
        closeModal();
    });

    $(document).on('closed', '.remodal', function () {
        console.log('closed');
    });

    $(document).on('confirm', '.remodal', function () {
       console.log('confirm');
        closeModal();
    });

    $(document).on('cancel', '.remodal', function () {
        console.log('cancel');
        closeModal();
    });



    $("#email").keyup(function(){

        var email = $("#email").val();

        if(email != 0)
        {
            if(isValidEmailAddress(email))
            {
                $("#validEmail").css({
                    "background-image": "url('images/validYes.png')"
                });
            } else {
                $("#validEmail").css({
                    "background-image": "url('images/validNo.png')"
                });
            }
        } else {
            $("#validEmail").css({
                "background-image": "url('images/validNo.png')"
            });
        }

    });

      $(".confirm").click(function(){
          $("#showerrorsEmail").text('');
          $("#showerrorsEmail").css('color','red');
          var email = $.trim($("#email").val());
          if(email != 0)
          {
              if(isValidEmailAddress(email))
              {
                  $("#validEmail").css({
                      "background-image": "url('images/validYes.png')"
                  });
                  $("#showerrorsEmail").html("<img src='"+url+"/images/loaders/loader27.gif'>");
                  $.post(url+"/login/restore",{email:$.trim($("#email").val())},function(data){
                    switch (parseInt(data)){
                        case 10: $("#showerrorsEmail").text('Пользователь с таким email не зарегистрирован'); break;
                        case 11: $("#showerrorsEmail").css('color','green').text('Письмо для восстановление пароля выслана вам на email'); break;
                    }
                  });

              } else {
                  $("#validEmail").css({
                      "background-image": "url('images/validNo.png')"
                  });
              }
          } else {
              $("#validEmail").css({
                  "background-image": "url('images/validNo.png')"
              });
          }
      });
});