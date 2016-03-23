/**
 * Created by user on 21.03.16.
 */
function changerequest(){
    $("#request_dogovor").text(  $("#clientAgreements option:selected").html() );
}

function proverka(input) {
    input.value = input.value.replace(/[^\d,]/g, '');
};

$(document).ready(function(){

    $('.datepicker').pickadate({
        format: 'dd.mm.yyyy',
      //  min: new Date(),
        monthsFull: ['������', '�������', '����', '������', '���', '����', '����', '������', '��������', '�������', '������', '�������'],
        monthsShort: ['���','���','���','���','���','���','���','���','���','���','���','���'],
        weekdaysFull: ['�����������','�����������','�������','�����','�������','�������','�������'],
        weekdaysShort:  ['��','��','��','��','��','��','��'],
        showMonthsShort: undefined,
        showWeekdaysFull: undefined,
        today: '�������',
        clear: '��������'
    });

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

            if( !$("#date_request").val().length ) {
                alert('��� �������� ������ ���������� ������� ����'); return false;
            }
            if( !$("#conditions_agree:checked").length ) {
              alert('��� �������� ������ �� ������ ����������� � ���������'); return false;
            }
        }else{
            if( !$("#date_start").val().length ||  !$("#date_end").val().length) {
                alert('��� �������� ������ ���������� ������� ������ ���������'); return false;
            }
        }
        var obj = $(this);
        editData(obj,'������ ������������',true);
        $.post(url+"/Request/SaveOrder",{request:request,order:$("#clientAgreements option:selected").val(),request2:$("#request2_data").serialize()},function(data){
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
             editData(obj,'��������� ������',false);
        });
    });



});