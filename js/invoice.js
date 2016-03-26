$(document).ready(function(){
    function showTable(){
        $.post(url+"/Request/showInvoices",{d:$("#clientAgreements option:selected").val()},function(data){
            $("#inv_table").html(data);
        });
    }
    showTable();

    $("#clientAgreements").change(function(){
        showTable();
    });
});