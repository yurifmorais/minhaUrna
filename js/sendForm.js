$(document).ready(function() {
    $("#frmResul4").submit(function(){
        var dados = jQuery(this).serialize(); 

        $.ajax({
            url: '../model/incluirVoto.php',
            cache: false,
            data: dados,
            type: "POST",

            success: function(msg){
                alert(msg)}

        });
    
        return false;

    });

});