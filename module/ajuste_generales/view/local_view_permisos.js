///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: PERMISOS DEL SISTEMA v 3.0 ::::::::::::::::::::::::::::::::::::::::///
///::::::::::::: CREAR EDITAR BORRAR PERMISOS DEL SISTEMA :::::::::::::::::::::::::::::::::///
///:::::::::::: FECHA: 2022-10-27 15:50 :::::::::::::::::::::::::::::::::::::::::::::::::::///

///::::::::::: Declaracion de Variables GLOBALES ::::::::::::::::::::::::::::::::::::::::::///
var tabla_permisos, opcion_permisos, validar_permisos;
var permiso_id;
///::::::::::::::::::::::::::::::: JS DOM PERMISOS ::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){

    $("#per_usuario_id").on('change', function () {
        per_usuario_id   = $("#per_usuario_id").val();
        per_nombre_corto    = "";
        a_data = f_buscar_data_bd('glo_maestro','maestro_id', per_usuario_id);
        $.each(a_data, function(idx, obj){
            per_nombre_corto = obj.maes_nombre_corto;
        });
        $("#per_nombre_corto").val(per_nombre_corto);
    });

    ///:::::::::::::::::::: SE CREA LOS BOTONES DE PERMISOS :::::::::::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_permisos","btn_seleccion_permisos");
    $("#div_btn_seleccion_permisos").html(div_boton);

    ///::::::::::::::::::::::: DATATABLE PERMISOS :::::::::::::::::::::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_permisos","");
    $("#div_tabla_permisos").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_permisos","");

    Accion='leer_permisos';
    tabla_permisos = $('#tabla_permisos').DataTable({
        language    : idioma_espanol,
        responsive  : "true",
        dom         : 'Blfrtip',
        buttons:[
            {
                extend:     'excelHtml5',
                text:       '<i class="fas fa-file-excel"></i> ',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success',
                title:      'Permisos de Usuario'
            },
        ],
        "ajax":{            
                "url"       : "ajax.php", 
                "method"    : 'POST',
                "data"      : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion},
                "dataSrc"   : ""
                },
        "columns": columnas_tabla,
        "columnDefs"      : [
            { 
              "className"   : "text-center",
              "targets"     : [0,1,4]
            },
        ]    
    });     

    ///:::::::::::::::::::::::::::::::: BOTONES DE PERMISOS :::::::::::::::::::::::::::::::///
    
    ///:::::::::::::::::::::::::::::: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_permisos", function(){
        opcion_permisos = "CREAR"; 
        f_limpia_permisos();
        f_combos_permisos();
        $("#form_permisos").trigger("reset");
        $("#per_usuario_id").prop('disabled', false);
        $("#per_modulo_nombre").prop('disabled', false);

        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Permisos");
        $('#modal_crud_permisos').modal('show');	    
    });
    ///:::::::::::::::::::::::::: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::///
    
    ///::::::::::::::::::::::::::::::::BOTON EDITAR :::::::::::::::::::::::::::::::::::::::///       
    $(document).on("click", ".btn_editar_permisos", function(){
        opcion_permisos = "EDITAR";
        f_limpia_permisos();
        f_combos_permisos();
        $("#form_permisos").trigger("reset");
        $("#per_usuario_id").prop('disabled', true);
        $("#per_modulo_nombre").prop('disabled', true);

        fila_permisos       = $(this).closest("tr");	        
        permiso_id          = fila_permisos.find('td:eq(0)').text();
        per_usuario_id      = fila_permisos.find('td:eq(1)').text();
        per_nombre_corto    = fila_permisos.find('td:eq(2)').text();
        per_modulo_nombre   = fila_permisos.find('td:eq(3)').text();
        per_modulo_inicio   = fila_permisos.find('td:eq(4)').text();

        $("#permiso_id").val(permiso_id);
        $("#per_usuario_id").val(per_usuario_id);
        $("#per_nombre_corto").val(per_nombre_corto);
        $("#per_modulo_nombre").val(per_modulo_nombre);
        $("#per_modulo_inicio").val(per_modulo_inicio);
    
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Permisos");		

        $('#modal_crud_permisos').modal('show');		   
    });
    ///::::::::::::::::::::::::::::::: FIN BOTON EDITAR :::::::::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::::::::::: CREA Y EDITA USUARIO :::::::::::::::::::::::::::::::///
    $('#form_permisos').submit(function(e){                         
        e.preventDefault();
        let validar_permisos= "";
        let t_msg           = "";
        let existe_permiso  = "";
        permiso_id          = $.trim($('#permiso_id').val());    
        per_usuario_id      = $.trim($('#per_usuario_id').val());
        per_nombre_corto    = $.trim($('#per_nombre_corto').val());
        per_modulo_nombre   = $.trim($('#per_modulo_nombre').val());    
        per_modulo_inicio   = $.trim($('#per_modulo_inicio').val());
        validar_permisos    = f_validar_permisos(permiso_id, per_usuario_id, per_nombre_corto, per_modulo_nombre, per_modulo_inicio);
        
        if(per_usuario_id!="" && per_modulo_nombre!="" && opcion_permisos=="CREAR"){
            Accion = 'validar_permisos';
            $.ajax({
                url         : "ajax.php",
                type        : "POST",
                datatype    : "json",
                async       : false,
                data        : { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, per_usuario_id:per_usuario_id, per_modulo_nombre:per_modulo_nombre },    
                success     : function(data) {
                    if(data=="SI"){
                        t_msg            = "<br> Permiso Existe!!!";
                        validar_permisos = "invalido";
                        $("#per_usuario_id").addClass("color-error");
                        $("#per_modulo_nombre").addClass("color-error");
                    }
                }
            });
        }

        if(validar_permisos=="invalido"){
            Swal.fire({
                position            : 'center',
                icon                : 'error',
                title               : '*Falta Completar Información!!!'+t_msg,
                showConfirmButton   : false,
                timer               : 1500
            });
        }else{
            $("#btn_guardar_permisos").prop("disabled",true);
            if(opcion_permisos=='CREAR'){ Accion='crear_permisos'; }
            if(opcion_permisos=='EDITAR'){ Accion='editar_permisos'; }
            $.ajax({
                url     : "ajax.php",
                type    : "POST",
                datatype:"json",    
                data    :  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, permiso_id:permiso_id, per_usuario_id:per_usuario_id, per_modulo_nombre:per_modulo_nombre, per_modulo_inicio:per_modulo_inicio },    
                success : function(data) {
                    tabla_permisos.ajax.reload(null, false);
                }
            });
            $('#modal_crud_permisos').modal('hide');
            $("#btn_guardar_permisos").prop("disabled",false);
        }
    });
    ///::::::::::::::::::::::::::: FIN CREA Y EDITA USUARIO :::::::::::::::::::::::::::::::///
        
    ///::::::::::::::::::::::::: BOTON BORRAR REGISTRO ::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_permisos", function(){
        fila_permisos = $(this);           
        permiso_id = $(this).closest('tr').find('td:eq(0)').text();     
        let rpta_borrar_permisos = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminara el registro "+permiso_id+"!",
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
                rpta_borrar_permisos = 1;
                Accion='borrar_permisos';
                if (rpta_borrar_permisos == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, permiso_id:permiso_id },   
                        success: function() {
                        tabla_permisos.row(fila_permisos.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///::::::::::::::::::::: FIN BOTON BORRAR REGISTRO ::::::::::::::::::::::::::::::::::::///

});
///::::::::::::::::::::::::: TERMINO JS DOM PERMISOS ::::::::::::::::::::::::::::::::::::::///

///:::::::::::::::::::::::::::::::: FUNCIONES DE PERMISOS :::::::::::::::::::::::::::::::::///

///:::::::::::: FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO :::::::::::::::::::///
function f_validar_permisos(p_permiso_id, p_per_usuario_id, p_per_nombre_corto, p_per_modulo_nombre, p_per_modulo_inicio){
    f_limpia_permisos();
    let rpta_validar_permisos="";    
    
    if(p_per_usuario_id==""){
        $("#per_usuario_id").addClass("color-error");
        rpta_validar_roles = "invalido";
    }
    if(p_per_nombre_corto==""){
        $("#per_nombre_corto").addClass("color-error");
        rpta_validar_roles = "invalido";
    }
    if(p_per_modulo_nombre==""){
        $("#per_modulo_nombre").addClass("color-error");
        rpta_validar_roles = "invalido";
    }
    if(p_per_modulo_inicio==""){
        $("#per_modulo_inicio").addClass("color-error");
        rpta_validar_roles = "invalido";
    }
    return rpta_validar_permisos; 
}
///::::::::: FIN FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO ::::::::::::::::::///

///:::::::::::::::::: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::/// 
function f_limpia_permisos(){
    $("#permiso_id").removeClass("color-error");
    $("#per_usuario_id").removeClass("color-error");
    $("#per_nombre_corto").removeClass("color-error");
    $("#per_modulo_nombre").removeClass("color-error");
    $("#per_modulo_inicio").removeClass("color-error");
}
///:::::::::::::: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::/// 

///:::::::::::::::::::::::::: SE GENERAN LOS COMBOS DE PERMISOS :::::::::::::::::::::::::::///
function f_combos_permisos(){
    Accion='select_modulo'; 
    $.ajax({
      url       : "ajax.php",
      type      : "POST",
      datatype  : "json",
      async     : false,    
      data      : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion},    
      success   : function(data){
        $("#per_modulo_nombre").html(data);
      }
    });
}
///:::::::::::::::::::::::::: SE GENERAN LOS COMBOS DE PERMISOS :::::::::::::::::::::::::::///

///::::::::::::::::::::::::::: TERMINO DE FUNCIONES DE PERMISOS :::::::::::::::::::::::::::///