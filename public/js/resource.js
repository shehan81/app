(function($){
    
    var resource = {
        init : function(){
            var tbl = $('#resource-table');
            
            tbl.delegate(".confirm-delete", "click", function($e){
                if(!confirm("Are you sure to delete?")){
                    $e.preventDefault();
                    return false;
                }
            });
        },
    };
    
    resource.init();
})($);