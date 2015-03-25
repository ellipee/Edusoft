$(function(){
    $("form#Session").submit(function(){
         
        //if not call by ajax
        //submit to showformAction
        if (is_xmlhttprequest == 0)
            return true;
         
        //if by ajax
        //check by ajax : validatepostajaxAction
        $.post(urlform,
               { 'name' : $('input[name=sessionName]').val() }, function(itemJson){
                 
                var error = false;
                 
                if (itemJson.name != undefined){
                     
                    if ($(".element_sessionName ul").length == 0){
                        //prepare ...
                        $(".element_sessionName").append("<ul></ul>");
                    }
                     
                    for(var i=0;i<itemJson.name.length;i++)
                    {
                       if ($(".element_sessionName ul").html().substr(itemJson.name[i]) == '')
                            $(".element_sessionName ul").append('<li>'+itemJson.name[i]+'</li>');
                    }
                     
                    error = true;
                }
                { 'name' : $('input[name=status]').val() }, function(itemJson){
                 
                var error = false;
                 
                if (itemJson.name != undefined){
                     
                    if ($(".element_status ul").length == 0){
                        //prepare ...
                        $(".element_status").append("<ul></ul>");
                    }
                     
                    for(var i=0;i<itemJson.name.length;i++)
                    {
                       if ($(".element_status ul").html().substr(itemJson.name[i]) == '')
                            $(".element_status ul").append('<li>'+itemJson.name[i]+'</li>');
                    }
                     
                    error = true;
                }
                 
                if (!error){
                    $("#winpopup").dialog('close');
                     
                    if (itemJson.success == 1){
                        alert('Data saved');  
                    }
                }
                 
        }, 'json');
         
        return false;
    });
});    