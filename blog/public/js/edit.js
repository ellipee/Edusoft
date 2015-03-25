$(function(){
    $("#edit").click(function(){
        $("#winpopup").dialog({
            draggable:true,
            modal: true,
            autoOpen: false,
            height:200,
            width:600,
            resizable: false,
            title:'Edit Session',
            position:'center',
             show: {
                effect: "slide",
                duration: 1000
                },
                hide: {
                effect: "fade",
                duration: 1000
                }
        });
        $("#winpopup").load($(this).attr('href'));
        $("#winpopup").dialog("open");
         
        return false;
    });
});