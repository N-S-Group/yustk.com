/**
 * Created by user on 21.03.16.
 */
function changerequest(){
    $("#request_dogovor").text(  $("#clientAgreements option:selected").html() );
}

$(document).ready(function(){
    $("#clientAgreements").change(function(){
        changerequest();
        showTable();
    });
    changerequest();

    function editData(obj,text,mode)
    {
        obj.val(text);
        obj.attr('disabled',mode);
        if(mode) $("#send_load").show();
        else  $("#send_load").hide();
    }

    function showTable(){

        $.post(url+"/Request/showTable",{d:$("#clientAgreements option:selected").val(),request:request},function(data){
            $("#info_request").html(data);
        });
    }

    function modalTrue(){
        var inst = $.remodal.lookup[$('[data-remodal-id=modal_request]').data('remodal')];
        inst.open();
    }
    showTable();

    function Okrequest(){
        showTable();
        modalTrue();
    }

    $("#request_send").click(function(){
        if(request == 2){
           if( !$("#conditions_agree:checked").length ) {
              alert('Для отправки заявки вы должны согласиться с условиями'); return false;
           }
        }
        var obj = $(this);
        editData(obj,'запрос отправляется',true);
        $.post(url+"/Request/SaveOrder",{request:request,order:$("#clientAgreements option:selected").val()},function(data){
            //location.href = url+"/uploads/orders/"+data+"/Order.pdf";
            switch (parseInt(data)){
                case 0: break;
                case 1:{
                    Okrequest();
                    break;
                }
                default: {
                    Okrequest();
                    break;
                }
            }
             editData(obj,'отправить запрос',false);
        });
    });



});