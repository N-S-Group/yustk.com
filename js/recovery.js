$(document).ready(function(){
    function logIn(){
        $.post(url+"/login/index",{login:lo,password:$.trim($("#passwordr").val()),s:1},function(data){
            switch (parseInt(data)){
                case 3: location.href=url+"/cabinet/index.php"; break;
                case 2: alert('�� ������ ������, �������� ��������� �������������� ������'); break;
            }
        });
    }

    $("#recovery").click(function(){
        $(".error").text("");
        if($.trim($("#passwordr").val()).length < 4){
            $(".error").text("������ ������ ���� �� ����� 4 ��������");
            return false;
        }
        $.post(url+"/login/savenewpassword",{user:us,password:$.trim($("#passwordr").val())},function(data){
              switch (parseInt(data)){
                case 1: logIn(); break;
                case 2: $("#error").text("������� ������������ �� ����������, ���������� �������� ��������� �������������� ������"); break;
                case 0: $("#error").text("��� ��������� ������ ���-�� ����� �� ���, ���������� �������� ��������� �������������� ������"); break;
            }
        });
    });



});