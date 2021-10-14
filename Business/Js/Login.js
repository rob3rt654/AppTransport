$( document ).ready(function() {

   

    $('#iniciar').click(function(){ 
        $.ajax({
            
            url : 'post.php',
            data : { id : 123 },
            type : 'GET',
            dataType : 'json',
            success : function(json) {
                
            }
        });


     }); 
    
});