$(document).ready(function(){
    // Muestra u Oculta el Password
    /*$('#show_password').click(function () {
        $('#user_pass').attr('type', $(this).is(':checked') ? 'text' : 'password');
    });*/
    
});

///:::::::: MOSTRAR U OCULTAR PASSWORD :::::::::::::::::///
function mostrar_password(){
    var cambio = document.getElementById("user_pass");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
} 
    