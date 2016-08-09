$(document).ready(function() {
    
    
    //Click sur checkbos is_principale
    $('#is_active-check').click(function(){
        
        isCheck = 0 ;
        if($(this).prop("checked")){
            isCheck = 1 ;
        }
        $('#is_active-check-value').val(isCheck) ;
        $(this).val(isCheck) ;
        
    }) ;
        
}) ;