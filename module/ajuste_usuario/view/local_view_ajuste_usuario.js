///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///::::::::::::::::::: AJUSTE USUARIO v 1.0 FECHA: 15-11-2022 :::::::::::::::::::::::::::::///
///:::::::::::::::::::::  EDITAR AJUSTE USUARIO :::::::::::::::::::::::::::::::::::::::::::///
///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///::::::::::::::::::::::::::::::: Declaracion de Variables :::::::::::::::::::::::::::::::///
var opcion_ajuste_usuario, foto_editar, foto;
foto = "";
opcion_ajuste_usuario = 2;

///:::::::::::::::::::::::::::: JS DOM AJUSTE USUARIO :::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    div_show = f_mostrar_div("form_ajuste_usuario","btn_ajuste_usuario","editar","");
    $("#div_btn_ajuste_usuario").html(div_show);

    Accion='leer_ajuste_usuario';
    $.ajax({
        url: "ajax.php",
        type: "POST",
        datatype:"json",    
        async: false,
        data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion},    
        success: function(data) {
            data = $.parseJSON(data);
            $.each(data, function(idx, obj){ 
              maestro_id = obj.maestro_id;    
              maes_apellidos_nombres = obj.maes_apellidos_nombres;
              maes_cargo_actual = obj.maes_cargo_actual;    
              maes_estado = obj.maes_estado;    
              maes_fecha_ingreso = obj.maes_fecha_ingreso;
              maes_fecha_cese = obj.maes_fecha_cese;  
              maes_email = obj.maes_email;
              maes_direccion = obj.maes_direccion;
              maes_distrito = obj.maes_distrito;
              maes_perfil_evaluacion = obj.maes_perfil_evaluacion;
              usua_nombre_corto = obj.usua_nombre_corto;
              usua_password = obj.usua_password;
              usua_usuario_web = obj.usua_usuario_web;
              $("#maestro_id").val(maestro_id);
              $("#maes_apellidos_nombres").val(maes_apellidos_nombres);
              $("#maes_cargo_actual").val(maes_cargo_actual);
              $("#maes_fecha_ingreso").val(maes_fecha_ingreso);
              $("#maes_email").val(maes_email);
              $("#maes_direccion").val(maes_direccion);
              $("#maes_distrito").val(maes_distrito);
              $("#maes_perfil_evaluacion").val(maes_perfil_evaluacion);
              $("#usua_nombre_corto").val(usua_nombre_corto);
              $("#usua_usuario_web").val(usua_usuario_web);
              $("#usua_password").val(usua_password);
            });
        }
    });

    foto = f_buscar_fotografia(maestro_id);
    if(foto==""){
        foto_editar='<img src="module/ajuste_usuario/view/img/usuario.png" height="340px" width="340px" alt="" />';        
    }else{
        foto_editar='<img src="' + foto + '" height="340px" width="340px" alt="" />';
    }
    $("#div_fotografia_ajuste_usuario").html(foto_editar);

    ///:::::::::::::::::::::::::::: BOTONES AJUSTE USUARIO ::::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::::::: EDITA AJUSTE USUARIO ::::::::::::::::::::::::::::::::::///
    $('#form_ajuste_usuario').submit(function(e){                         
        e.preventDefault();
        let validacion = "";
        usua_password = $.trim($('#usua_password').val());    
        validacion = f_validar_ajuste_usuario(usua_password);

        if(validacion=="invalido"){
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '*Falta Completar Información!!!',
                showConfirmButton: false,
                timer: 1500
              })
        }else{
            if(opcion_ajuste_usuario = 2) {   // EDITAR
                Accion='editar_ajuste_usuario';
                $("#btn_guardar_ajuste_usuario").prop("disabled",true);
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, usua_password:usua_password},    
                    success: function(data) {
                        f_limpia_ajuste_usuario();
                        $("#usua_password").val(usua_password);
                    }
                });
            } 
            $("#btn_guardar_ajuste_usuario").prop("disabled",false);
            div_show = f_mostrar_div("form_ajuste_usuario","btn_ajuste_usuario","editar","");
            $("#div_btn_ajuste_usuario").html(div_show);
            $("#usua_password").prop("disabled",true);
            $("#show_password").prop("disabled",true);
        }
    });
    
    ///::::::::::::::::::::::::::::: BOTON CANCELAR AJUSTE USUARIO ::::::::::::::::::::::::///
    $(document).on("click", ".btn_cancelar_ajuste_usuario", function(){
        f_limpia_ajuste_usuario();
        $("#usua_password").val(usua_password);
        $("#usua_password").prop("disabled",true);
        $("#show_password").prop("disabled",true);
        div_show = f_mostrar_div("form_ajuste_usuario","btn_ajuste_usuario","editar","");
        $("#div_btn_ajuste_usuario").html(div_show);
    });
    ///::::::::::::::::::::::::: FIN BOTON CANCELAR AJUSTE USUARIO ::::::::::::::::::::::::///

    ///::::::::::::::::::::::::::::: BOTON EDITAR AJUSTE USUARIO ::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_ajuste_usuario", function(){
        f_limpia_ajuste_usuario();
        $("#usua_password").val(usua_password);
        $("#usua_password").prop("disabled",false);
        $("#show_password").prop("disabled",false);
        div_show = f_mostrar_div("form_ajuste_usuario","btn_ajuste_usuario","guardar","");
        $("#div_btn_ajuste_usuario").html(div_show);
    });
    ///::::::::::::::::::::::::FIN BOTON EDITAR AJUSTE USUARIO ::::::::::::::::::::::::::::///

});
///:::::::::::::::::::::::TERMINO JS DOM AJUSTE USUARIO :::::::::::::::::::::::::::::::::::///


///:::::::::::::::::::::::::: FUNCIONES DE AJUSTE USUARIO :::::::::::::::::::::::::::::::::///

///::::::: FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO ::::::::::::::::::::::::///
function f_validar_ajuste_usuario(usua_password){
    f_limpia_ajuste_usuario();
    let rpta_ajuste_usuario="";    

    if(usua_password==""){
        $("#usua_password").addClass("color-error");
        rpta_ajuste_usuario="invalido";
    }
    return rpta_ajuste_usuario; 
}

///::::::::::::::: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::/// 
function f_limpia_ajuste_usuario(){
    var cambio = document.getElementById("usua_password");
    cambio.type = "password";
    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    $('#usua_password').attr('type', $(this).is(':checked') ? 'text' : 'password');

    $("#usua_password").removeClass("color-error");
}
///:::::::::::: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::/// 

///:::::::::::::::::::::::::::::::::::: BUSCAR FOTOGRAFIA :::::::::::::::::::::::::::::::::///
function f_buscar_fotografia(){
    let img = "";
    Accion = 'buscar_fotografia';
    $.ajax({
        url: "ajax.php",
        type: "POST",
        datatype:"json",    
        async: false,   
        data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion },   
        success: function(data) {
            data = $.parseJSON(data);
            $.each(data, function(idx, obj){ 
                if(obj.b64_Foto){
                    img  = 'data:image/jpg;base64,' + obj.b64_Foto;
                }
            });
        }
    });	
    return img;
}
///:::::::::::::::::::::::::::::::: FIN BUSCAR FOTOGRAFIA :::::::::::::::::::::::::::::::::///

///:::::::::::::::::::::::::: MOSTRAR U OCULTAR PASSWORD ::::::::::::::::::::::::::::::::::///
function f_mostrar_password(){
    var cambio = document.getElementById("usua_password");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}
///:::::::::::::::::::::: FIN MOSTRAR U OCULTAR PASSWORD ::::::::::::::::::::::::::::::::::///

///:::::::::::::::::::::: TERMINO FUNCIONES DE AJUSTE USUARIO :::::::::::::::::::::::::::::///