///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:::::::::::::::::::: usuario v 5.0 FECHA: 02-01-2023 :::::::::::::::::::::::::::::::::::///
//:::::::::::::::::: CREAR, EDITAR, ELIMINAR TABLA DE usuario :::::::::::::::::::::::::::::///
///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///::::::::::::::::::::::::::::::: Declaracion de Variables :::::::::::::::::::::::::::::::///
var tabla_usuario, opcion_usuario, fila_usuario, usuario_id;

///::::::::::::::::::::::::::::::::::: JS DOM USUARIO :::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    div_boton = f_botones_formulario("form_seleccion_usuario","btn_seleccion_usuario");
    $("#div_btn_seleccion_usuario").html(div_boton);

    ///::SI SE ACTUALIZA usuario_id entonces se busca el nombre corto apellidos y nombre ::///
    $("#usuario_id").on('change', function () {
        usuario_id        = $("#usuario_id").val();
        usua_nombres      = "";
        usua_nombre_corto = ""; 
        usua_usuario_web  = "";
        usua_password     = "";
        usua_perfil       = "";
        usua_estado       = "";

        a_data = f_buscar_data_bd('glo_maestro','maestro_id', usuario_id);
        $.each(a_data, function(idx, obj){
            usua_nombres      = obj.maes_apellidos_nombres;
            usua_nombre_corto = obj.maes_nombre_corto;
        });
        $("#usua_nombres").val(usua_nombres);
        $("#usua_nombre_corto").val(usua_nombre_corto);
        $("#usua_usuario_web").val(usua_usuario_web);
        $("#usua_password").val(usua_password);
        $("#usua_perfil").val(usua_perfil);
        $("#usua_estado").val(usua_estado);
    });

    ///::::::::::::::::::: DataTable Usuario ::::::::::::::::::::::::::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_usuario","");
    $("#div_tabla_usuario").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_usuario","");

    Accion='leer_usuario';
    tabla_usuario = $('#tabla_usuario').DataTable({
        language: idioma_espanol, 
        responsive: "true",
        dom: 'Blfrtip', // Con Botones Excel,Pdf,Print
        buttons:[
            {
                extend:     'excelHtml5',
                text:       '<i class="fas fa-file-excel"></i> ',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success',
                title:      'Tabla de Usuarios'
            },
        ],
        "ajax":{            
                "url": "ajax.php", 
                "method": 'POST',
                "data":{MoS:MoS, NombreMoS:NombreMoS, Accion:Accion},
                "dataSrc":""
                },
        "columns": columnas_tabla,
        "order": [[1, 'asc']]
    });     
    ///::::::::::::::::::: FIN DataTable Usuario ::::::::::::::::::::::::::::::::::::::::::///


    ///:::::::::::::::::::::::::::::: BOTONES USUARIO :::::::::::::::::::::::::::::::::::::///
    
    ///::::::::::::::::::::::::::: CREA Y EDITA USUARIO :::::::::::::::::::::::::::::::::::///
    $('#form_usuario').submit(function(e){                         
        let t_validacion = '';
        let t_msg        = '';
        e.preventDefault();
        
        usuario_id          = $.trim($('#usuario_id').val());    
        usua_nombres        = $.trim($('#usua_nombres').val());
        usua_nombre_corto   = $.trim($('#usua_nombre_corto').val());    
        usua_usuario_web    = $.trim($('#usua_usuario_web').val());    
        usua_password       = $.trim($('#usua_password').val());
        usua_perfil         = $.trim($('#usua_perfil').val());  
        usua_estado         = $.trim($('#usua_estado').val());
        
        t_validacion = f_validar_usuario(usuario_id, usua_nombres,usua_nombre_corto,usua_usuario_web,usua_password,usua_perfil,usua_estado);

        if(usuario_id!=''){
            a_data = f_buscar_data_bd('glo_usuario', 'usuario_id', usuario_id)
            if(a_data.length>0 && opcion_usuario=='CREAR'){
                t_msg        = '<br>Usuario Existe!!!';
                t_validacion = 'invalido';
                $("#usuario_id").addClass("color-error");
            }
        }
        if(usua_usuario_web!=''){
            a_data = f_buscar_data_bd('glo_usuario', 'usua_usuario_web', usua_usuario_web)
            if(a_data.length>0 && opcion_usuario=='CREAR'){
                t_msg       += '<br>UsuarioWeb Existe!!!';
                t_validacion = 'invalido';
                $("#usua_usuario_web").addClass("color-error");
            }
            if(a_data.length>0 && opcion_usuario=='EDITAR'){
                $.each(a_data, function(idx, obj){
                    if(usuario_id != obj.usuario_id){
                        t_msg       += "<br>UsuarioWeb Existe!!!";
                        t_validacion = "invalido";
                        $("#usua_usuario_web").addClass("color-error");        
                    } 
                });
            }
        }

        if(t_validacion=="invalido"){
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '*Falta Completar Información!!!'+t_msg,
                showConfirmButton: false,
                timer: 1500
              })
        }else{
            if(opcion_usuario == 'CREAR') { Accion='crear_usuario'; }
            if(opcion_usuario == 'EDITAR') { Accion='editar_usuario'; }
            $("#btn_guardar_usuario").prop("disabled",true);
            $.ajax({
                url     : "ajax.php",
                type    : "POST",
                datatype: "json",    
                data    : { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, usuario_id:usuario_id, usua_nombres:usua_nombres, usua_nombre_corto:usua_nombre_corto, usua_usuario_web:usua_usuario_web, usua_password:usua_password, usua_perfil:usua_perfil, usua_estado:usua_estado },    
                success : function(data) {
                    tabla_usuario.ajax.reload(null, false);
                }
            });
            $('#modal_crud').modal('hide');
            $("#btn_guardar_usuario").prop("disabled",false);
        }
    });
    ///:::::::::::::::::::::::::::: FIN CREA Y EDITA USUARIO ::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::::: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo", function(){
        opcion_usuario = 'CREAR';
        f_limpia_usuario();          
        $("#usuario_id").prop('disabled', false);
        $("#form_usuario").trigger("reset");
        f_combos_usuario();
        usuario_id = "";
        usua_nombres = "";
        usua_nombre_corto = "";
        usua_usuario_web = "";
        usua_password = "";
        usua_perfil= "";
        usua_estado = "";
        
        $("#usuario_id").val(usuario_id);
        $("#usua_nombres").val(usua_nombres);
        $("#usua_nombre_corto").val(usua_nombre_corto);
        $("#usua_usuario_web").val(usua_usuario_web);
        $("#usua_password").val(usua_password);
        $("#usua_perfil").val(usua_perfil);
        $("#usua_estado").val(usua_estado);

        $("#btn_guardar_usuario").prop("disabled",false);
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Usuario");
        $('#modal_crud').modal('show');	    
    });
    ///:::::::::::::::::::::::: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::///
    
    ///::::::::::::::::::::::::::::: EVENTO DEL BOTON EDITAR ::::::::::::::::::::::::::::::///       
    $(document).on("click", ".btn_editar", function(){
        opcion_usuario = 'EDITAR';
        f_limpia_usuario();
        $("#usuario_id").prop('disabled', true);
        $("#form_usuario").trigger("reset");
        $("#btn_guardar_usuario").prop("disabled",false);
        fila_usuario = $(this).closest("tr");	        
        f_combos_usuario();
        usuario_id = fila_usuario.find('td:eq(0)').text();
        usua_nombres = fila_usuario.find('td:eq(1)').text();
        usua_nombre_corto = fila_usuario.find('td:eq(2)').text();
        usua_usuario_web = fila_usuario.find('td:eq(3)').text();
        usua_password = fila_usuario.find('td:eq(4)').text();
        usua_perfil= fila_usuario.find('td:eq(5)').text();
        usua_estado = fila_usuario.find('td:eq(6)').text();
        
        $("#usuario_id").val(usuario_id);
        $("#usua_nombres").val(usua_nombres);
        $("#usua_nombre_corto").val(usua_nombre_corto);
        $("#usua_usuario_web").val(usua_usuario_web);
        $("#usua_password").val(usua_password);
        $("#usua_perfil").val(usua_perfil);
        $("#usua_estado").val(usua_estado);

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Usuario");		
        $('#modal_crud').modal('show');		   
    });
    ///::::::::::::::::::::::::::::: EVENTO DEL BOTON EDITAR ::::::::::::::::::::::::::::::///       

    ///:::::::::::::::::::::::::::::: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar", function(){
        fila_usuario = $(this);           
        usuario_id = $(this).closest('tr').find('td:eq(0)').text();     
        let rpta_borrar_usuario = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminara el registro "+usuario_id+"!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Eliminado!',
                    'El registro ha sido eliminado.',
                    'success'
                )
                rpta_borrar_usuario = 1;
                Accion='borrar_usuario';
                if (rpta_borrar_usuario == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, usuario_id:usuario_id },   
                        success: function() {
                        tabla_usuario.row(fila_usuario.parents('tr')).remove().draw();                  
                        }
                    });
                }
            }
        });
    });
    ///:::::::::::::::::::::::::::::: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::::::: TERMINO BOTONES USUARIO ::::::::::::::::::::::::::::::::///
});    

///::::::::::::::::::::::::::::: TERMINO JS DOM USUARIO :::::::::::::::::::::::::::::::::::///


///::::::::::::::::::::::::::::::::: FUNCIONES DE USUARIO :::::::::::::::::::::::::::::::::///

///::::::::::::::: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO ::::::::::::::::///
function f_validar_usuario(p_usuario_id, p_usua_nombres, p_usua_nombre_corto, p_usua_usuario_web, p_usua_password, p_usua_perfil, p_usua_estado){
    f_limpia_usuario();
    NoLetrasMayuscEspacio=/[^A-Z a-z \Ñ \Ä \Ë \Ö \Ü \Á \É \Í \Ó \Ú]/;
    let rpta_validar_usuario="";    

    if(p_usuario_id=="" || isNaN(p_usuario_id)){
         $("#usuario_id").addClass("color-error");
        rpta_validar_usuario="invalido";
    }
    
    if(p_usua_nombres=="" || NoLetrasMayuscEspacio.test(p_usua_nombres) ){
         $("#usua_nombres").addClass("color-error");
        rpta_validar_usuario="invalido";
    }

    if(p_usua_nombre_corto=="" || NoLetrasMayuscEspacio.test(p_usua_nombre_corto)){
        $("#usua_nombre_corto").addClass("color-error");
        rpta_validar_usuario="invalido";
    }

    if(p_usua_usuario_web==""){
        $("#usua_usuario_web").addClass("color-error");
        rpta_validar_usuario="invalido";
    }

    if(p_usua_password==""){
        $("#usua_password").addClass("color-error");
        rpta_validar_usuario="invalido";
    }

    if(p_usua_perfil==""){
        $("#usua_perfil").addClass("color-error");
        rpta_validar_usuario="invalido";
    }

    if(p_usua_estado==""){
        $("#usua_estado").addClass("color-error");
        rpta_validar_usuario="invalido";
    }
    
    return rpta_validar_usuario; 
}
///::::::::::::: FIN FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO ::::::::::::::///

///::::::::::::::::::::: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO ::::::::::::::::/// 
function f_limpia_usuario(){
    var cambio = document.getElementById("usua_password");
    cambio.type = "password";
    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    $('#usua_password').attr('type', $(this).is(':checked') ? 'text' : 'password');
        
    $("#usuario_id").removeClass("color-error");
    $("#usua_nombres").removeClass("color-error");
    $("#usua_nombre_corto").removeClass("color-error");
    $("#usua_usuario_web").removeClass("color-error");
    $("#usua_password").removeClass("color-error");
    $("#usua_perfil").removeClass("color-error");
    $("#usua_estado").removeClass("color-error");
}
///:::::::::::::::::: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::///

///::::::::::::::::::::::::::::: MOSTRAR U OCULTAR PASSWORD :::::::::::::::::::::::::::::::///
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
///:::::::::::::::::::::::::: FIN MOSTRAR U OCULTAR PASSWORD ::::::::::::::::::::::::::::::///

///:::::::::::::::::::::::: SE CARGAN LOS COMBOS DE USUARIO :::::::::::::::::::::::::::::::///
function f_combos_usuario(){
    let select_html_usuario="";

    select_html_usuario = f_select_categoria("glo_tc_usuario","USUARIO","ESTADO");
    $("#usua_estado").html(select_html_usuario);

    select_html_usuario = f_select_categoria("glo_tc_usuario","USUARIO","PERFIL");
    $("#usua_perfil").html(select_html_usuario);

}
///::::::::::::::::::::: FIN SE CARGAN LOS COMBOS DE USUARIO ::::::::::::::::::::::::::::::///

///:::::::::::::::::::::::: TERMINO FUNCIONES DE USUARIO ::::::::::::::::::::::::::::::::::///