$(function(){
    $("#formedit").click(function(){
        $("#edit").dialog({
            draggable:true,
            modal: true,
            autoOpen: false,
            height:300,
            width:400,
            resizable: false,
            title:'Edit Academic Session',
            position:'center'
        });
        $("#edit").load($(this).attr('href'));
        $("#edit").dialog("open");
         
        return false;
    });
});