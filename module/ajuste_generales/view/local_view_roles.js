///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:::::::::::::::::::: ROLES DE USUARIO v 3.0 ::::::::::::::::::::::::::::::::::::::::::::///
///::::::::::::: CREAR EDITAR BORRAR ROLES DE USUARIO :::::::::::::::::::::::::::::::::::::///
///:::::::::::: FECHA: 2022-10-27 15:50 :::::::::::::::::::::::::::::::::::::::::::::::::::///

///::::::::::: Declaracion de Variables GLOBALES ::::::::::::::::::::::::::::::::::::::::::///
var tabla_roles, opcion_roles, fila_roles, validar_roles;

///::::::::::::::::::::::::::::::::::::: JS DON ROLES DE USUARIO ::::::::::::::::::::::::::///
$(document).ready(function(){
    ///:::::: SI SE ACTUALIZA roles_apellidos_nombres entonces se busca el nombre corto ::::///
    $("#roles_dni").on('change', function () {
        roles_dni               = $("#roles_dni").val();
        roles_apellidos_nombres  = "";
        roles_nombre_corto       = ""; 
        a_data = f_buscar_data_bd('glo_maestro','maestro_id', roles_dni);
        $.each(a_data, function(idx, obj){
            roles_apellidos_nombres  = obj.maes_apellidos_nombres;
            roles_nombre_corto       = obj.maes_nombre_corto;
        });
        $("#roles_apellidos_nombres").val(roles_apellidos_nombres);
        $("#roles_nombre_corto").val(roles_nombre_corto);
    });

    ///:::::::::::::::::::: SE CREA LOS BOTONES DE ROLES DE USUARIO :::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_roles","btn_seleccion_roles");
    $("#div_btn_seleccion_roles").html(div_boton);

    ///::::::::::::::::::::::: DATATABLE ROLES DE USUARIO :::::::::::::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_roles","");
    $("#div_tabla_roles").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_roles","");

    Accion='leer_roles';
    tabla_roles = $('#tabla_roles').DataTable({
        language: idioma_espanol,
        responsive: "true",
        dom: 'Blfrtip', // Con Botones Excel,Pdf,Print
        buttons:[
            {
                extend:     'excelHtml5',
                text:       '<i class="fas fa-file-excel"></i> ',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success',
                title:      'Roles de Usuario'
            },
        ],
        "ajax":{            
                "url": "ajax.php", 
                "method": 'POST', 
                "data":{MoS:MoS,NombreMoS:NombreMoS,Accion:Accion}, 
                "dataSrc":""
                },
        "columns":columnas_tabla
    });     

    ///::::::::::::::::::::::::::::: BOTONES DE ROLES DE USUARIO ::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::::: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_roles", function(){
        opcion_roles = 'CREAR'; 
        f_limpia_roles();
        $("#form_roles").trigger("reset");
        $("#roles_dni").prop('disabled', false);

        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Roles de Usuarios");
        $('#modal_crud_roles').modal('show');	    
    });
    ///:::::::::::::::::::::: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::::::::::::: BOTON EDITAR :::::::::::::::::::::::::::::::::::::///       
    $(document).on("click", ".btn_editar_roles", function(){
        opcion_roles = 'EDITAR';
        f_limpia_roles();
        $("#form_roles").trigger("reset");
        $("#roles_dni").prop('disabled', true);

        fila_roles              = $(this).closest("tr");	        
        roles_id                = fila_roles.find('td:eq(0)').text();
        roles_dni               = fila_roles.find('td:eq(1)').text();
        roles_apellidos_nombres = fila_roles.find('td:eq(2)').text();
        roles_nombre_corto      = fila_roles.find('td:eq(3)').text();
        roles_perfil            = fila_roles.find('td:eq(4)').text();

        $("#roles_id").val(roles_id);
        $("#roles_dni").val(roles_dni);
        $("#roles_apellidos_nombres").val(roles_apellidos_nombres);
        $("#roles_nombre_corto").val(roles_nombre_corto);
        $("#roles_perfil").val(roles_perfil);
       
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Roles de Usuarios");		
    
        $('#modal_crud_roles').modal('show');
    });
    ///::::::::::::::::::::::::::::: FIN BOTON EDITAR :::::::::::::::::::::::::::::::::::::///
    
    ///:::::::::::::::::::::::::::: CREA Y EDITA ROLES ::::::::::::::::::::::::::::::::::::///
    $('#form_roles').submit(function(e){
        e.preventDefault(); 
        roles_id                = $.trim($('#roles_id').val());    
        roles_dni               = $.trim($('#roles_dni').val());
        roles_apellidos_nombres = $.trim($('#roles_apellidos_nombres').val());    
        roles_nombre_corto      = $.trim($('#roles_nombre_corto').val());
        roles_perfil            = $.trim($('#roles_perfil').val());
    
        validar_roles = f_validar_roles(roles_dni,roles_apellidos_nombres,roles_nombre_corto,roles_perfil);
        
        if(validar_roles=="invalido") {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '*Falta Completar Información!!!',
                showConfirmButton: false,
                timer: 1500
              })  
        }else{
            $("#btn_guardar_roles").prop("disabled",true);
            if(opcion_roles == 'CREAR') { Accion = 'crear_roles'; }
            if(opcion_roles == 'EDITAR') { Accion = 'editar_roles'; }   
            $.ajax({
                url     : "ajax.php",
                type    : "POST",
                datatype: "json",    
                data    : { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, roles_id:roles_id, roles_dni:roles_dni, roles_apellidos_nombres:roles_apellidos_nombres, roles_nombre_corto:roles_nombre_corto, roles_perfil:roles_perfil},
                success: function(data) {
                    tabla_roles.ajax.reload(null, false);
                }
            });
            $('#modal_crud_roles').modal('hide');
            $("#btn_guardar_roles").prop("disabled",false);
        } 
    });
    ///:::::::::::::::::::::::::::: FIN CREA Y EDITA ROLES ::::::::::::::::::::::::::::::::///
        
    ///:::::::::::::::::::::::::::::: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_roles", function(){
        fila_roles = $(this);           
        roles_id = $(this).closest('tr').find('td:eq(0)').text();     

        let rpta_borrar_roles = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminara el registro "+roles_id+"!",
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
                rpta_borrar_roles = 1;
                Accion='borrar_roles';
    
                if (rpta_borrar_roles == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS,NombreMoS:NombreMoS,Accion:Accion,roles_id:roles_id },   
                        success: function() {
                        tabla_roles.row(fila_roles.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///::::::::::::::::::::::::::: FIN BOTON BORRAR REGISTRO ::::::::::::::::::::::::::::::///
});

///::::::::::::::::::::::::::::: FUNCIONES ROLES DE USUARIO :::::::::::::::::::::::::::::::///

///:::::::::::: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::///
function f_validar_roles(p_roles_dni,p_roles_apellidos_nombres,p_roles_nombre_corto,p_roles_perfil){
    f_limpia_roles();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    let rpta_validar_roles="";
    
    if(p_roles_dni==""){
        $("#roles_dni").addClass("color-error");
        rpta_validar_roles = "invalido";
    }
    if(p_roles_apellidos_nombres==""){
        $("#roles_apellidos_nombres").addClass("color-error");
        rpta_validar_roles = "invalido";
    }
    if(p_roles_nombre_corto==""){
        $("#roles_nombre_corto").addClass("color-error");
        rpta_validar_roles = "invalido";
    }
    if(p_roles_perfil==""){
        $("#roles_perfil").addClass("color-error");
        rpta_validar_roles = "invalido";
    }

    return rpta_validar_roles; 
}
///:::::::::: FIN FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO :::::::::::::::::///

///:::::::::::: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::/// 
function f_limpia_roles(){
    $("#roles_id").removeClass("color-error");
    $("#roles_apellidos_nombres").removeClass("color-error");
    $("#roles_nombre_corto").removeClass("color-error");
    $("#roles_perfil").removeClass("color-error");
}
///:::::::::::: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO ::::::::::::::::::::/// 

