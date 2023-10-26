///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: MODULOS DEL SISTEMA v 3.0 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: CREAR EDITAR BORRAR MODULOS DEL SISTEMA :::::::::::::::::::::::::::::::::::::::::::::///
///:: FECHA: 2022-10-27 15:50 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///::::::::::: Declaracion de Variables GLOBALES ::::::::::::::::::::::::::::::::::::::::::///
var tabla_modulo, opcion_modulo, validar_modulo;

///::::::::::::::::::::::::::::::: JS DOM MODULO ::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    ///:::::::::::::::::::: SE CREA LOS BOTONES DE ROLES DE USUARIO :::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_modulo","btn_seleccion_modulo");
    $("#div_btn_seleccion_modulo").html(div_boton);

    ///::::::::::::::::::::::: DATATABLE MODULO ::::::::::::::::::::::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_modulo","");
    $("#div_tabla_modulo").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_modulo","");

    Accion='leer_modulo';
    tabla_modulo = $('#tabla_modulo').DataTable({
        language: idioma_espanol,
        responsive: "true",
        dom: 'Blfrtip',
        buttons:[
            {
                extend:     'excelHtml5',
                text:       '<i class="fas fa-file-excel"></i> ',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success',
                title:      'Modulos del Sistema'
            },
        ],
        "ajax":{            
                "url": "ajax.php", 
                "method": 'POST', 
                "data":{MoS:MoS, NombreMoS:NombreMoS, Accion:Accion},
                "dataSrc":""
                },
        "columns": columnas_tabla
    });     

    ///::::::::::::::::::::::::::::: BOTONES DE MODULO ::::::::::::::::::::::::::::::::::::///
    
    ///:::::::::::::::::::::::::: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_modulo", function(){
        opcion_modulo = "CREAR";
        f_limpia_modulo();          
        $("#form_modulo").trigger("reset");
        
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Modulo");
        $('#modal_crud_modulo').modal('show');	    
    });
    ///:::::::::::::::::::::: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::::::::::::::: BOTON EDITAR :::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_modulo", function(){
        opcion_modulo = "EDITAR"
        f_limpia_modulo();
        fila_modulo = $(this).closest("tr");	        
        modulo_id           = fila_modulo.find('td:eq(0)').text();
        mod_nombre          = fila_modulo.find('td:eq(1)').text();
        mod_nombre_vista    = fila_modulo.find('td:eq(2)').text();
        mod_icono           = fila_modulo.find('td:eq(3)').html();
        mod_tipo            = fila_modulo.find('td:eq(4)').html();
        mod_plegable        = fila_modulo.find('td:eq(5)').html();

        $("#modulo_id").val(modulo_id);
        $("#mod_nombre").val(mod_nombre);
        $("#mod_nombre_vista").val(mod_nombre_vista);
        $("#mod_icono").val(mod_icono);
        $("#mod_tipo").val(mod_tipo);
        $("#mod_plegable").val(mod_plegable);
   
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Modulo");		
    
        $('#modal_crud_modulo').modal('show');		   
    });
    ///::::::::::::::::::::::::::::::: FIN BOTON EDITAR :::::::::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::::::: CREA Y EDITA modulo ::::::::::::::::::::::::::::::::::::///
    $('#form_modulo').submit(function(e){                         
        e.preventDefault();
        let validar_modulo  = "";
        let t_msg           = "";
        let a_data          = [];
        modulo_id           = $.trim($('#modulo_id').val());    
        mod_nombre          = $.trim($('#mod_nombre').val());
        mod_nombre_vista    = $.trim($('#mod_nombre_vista').val());    
        mod_icono           = $.trim($('#mod_icono').val());
        mod_tipo            = $.trim($('#mod_tipo').val());
        mod_plegable        = $.trim($('#mod_plegable').val());
        validar_modulo = f_validar_modulo(modulo_id, mod_nombre, mod_nombre_vista, mod_icono, mod_tipo, mod_plegable);
        
        if(mod_nombre!=""){
            a_data = f_buscar_data_bd("glo_modulo","mod_nombre",mod_nombre);
            if(a_data.length>0 && opcion_modulo=="CREAR"){
                t_msg = "<br>Nombre del Modulo EXISTE!!!";
                validar_modulo = "invalido";
                $("#mod_nombre").addClass("color-error");
            }
            if(a_data.length>0 && opcion_modulo=="EDITAR"){
                $.each(a_data, function(idx, obj){
                    if(modulo_id != obj.modulo_id){
                        t_msg = "<br>Nombre del Modulo EXISTE!!!";
                        validar_modulo = "invalido";
                        $("#mod_nombre").addClass("color-error");        
                    } 
                });
            }
        }
        if(mod_nombre_vista!=""){
            a_data = f_buscar_data_bd("glo_modulo","mod_nombre_vista",mod_nombre_vista);
            if(a_data.length>0 && opcion_modulo==1){
                t_msg += "<br>NombreVista del Modulo EXISTE!!!";
                validar_modulo = "invalido";
                $("#mod_nombre_vista").addClass("color-error");
            }
            if(a_data.length>0 && opcion_modulo==2){
                $.each(a_data, function(idx, obj){
                    if(modulo_id != obj.modulo_id){
                        t_msg += "<br>NombreVista del Modulo EXISTE!!!";
                        validar_modulo = "invalido";
                        $("#mod_nombre_vista").addClass("color-error");        
                    } 
                });
            }
        }
        if(validar_modulo=="invalido"){
            Swal.fire({
                position            : 'center',
                icon                : 'error',
                title               : '*Falta Completar Información!!!'+t_msg,
                showConfirmButton   : false,
                timer               : 1500
            });
        }else{
            $("#btn_guardar_modulo").prop("disabled",true);
            if(opcion_modulo == "CREAR") { Accion='crear_modulo'; }
            if(opcion_modulo == "EDITAR") { Accion='editar_modulo'; }
            $.ajax({
                url: "ajax.php",
                type: "POST",
                datatype:"json",    
                data:  { MoS:MoS,NombreMoS:NombreMoS, Accion:Accion, modulo_id:modulo_id, mod_nombre:mod_nombre, mod_nombre_vista:mod_nombre_vista, mod_icono:mod_icono, mod_tipo:mod_tipo, mod_plegable:mod_plegable },    
                success: function(data) {
                    tabla_modulo.ajax.reload(null, false);
                }
            });
            $('#modal_crud_modulo').modal('hide');
            $("#btn_guardar_modulo").prop("disabled",false);
        } 
    });
    ///::::::::::::::::::::::: FIN CREA Y EDITA MODULO ::::::::::::::::::::::::::::::::::::///
        
    ///::::::::::::::::::::::::: BOTON BORRAR REGISTRO ::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_modulo", function(){
        fila_modulo = $(this);           
        modulo_id = $(this).closest('tr').find('td:eq(0)').text();     
        rpta_borrar_modulo = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminara el registro "+modulo_id+"!",
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
                rpta_borrar_modulo = 1;
                Accion='borrar_modulo';
                if (rpta_borrar_modulo = 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, modulo_id:modulo_id },   
                        success: function() {
                        tabla_modulo.row(fila_modulo.parents('tr')).remove().draw();                  
                        }
                    });
                }
            }
        });
    });
    ///::::::::::::::::::::::::: BOTON BORRAR REGISTRO ::::::::::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::: TERMINO BOTONES DE MODULO ::::::::::::::::::::::::::::::::::///

});    
///:::::::::::::::::::::::::: TERMINO JS DOM MODULO :::::::::::::::::::::::::::::::::::::::///

///:::::::::::::::::::::::::::: FUNCIONES DE MODULO :::::::::::::::::::::::::::::::::::::::///

///:::::::::: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::///
function f_validar_modulo(p_modulo_id, p_mod_nombre, p_mod_nombre_vista, p_mod_icono, p_mod_tipo, p_mod_plegable){
    f_limpia_modulo();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    var rpta_validar_modulo="";    
    if(p_mod_nombre==""){
        $("#mod_nombre").addClass("color-error");
        rpta_validar_roles = "invalido";
    }
    if(p_mod_nombre_vista==""){
        $("#mod_nombre_vista").addClass("color-error");
        rpta_validar_roles = "invalido";
    }
    if(p_mod_icono==""){
        $("#mod_icono").addClass("color-error");
        rpta_validar_roles = "invalido";
    }
    if(p_mod_tipo==""){
        $("#mod_tipo").addClass("color-error");
        respuesta="invalido";
    }
    if(p_mod_tipo=="Modulo"){
        if(p_mod_plegable==""){
            $("#mod_plegable").addClass("color-error");
            respuesta="invalido";
        }
    }
    return rpta_validar_modulo; 
}
///:::::::::: FIN FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::///

///:::::::::::: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::/// 
function f_limpia_modulo(){
    $("#mod_nombre").removeClass("color-error");
    $("#mod_nombre_vista").removeClass("color-error");
    $("#mod_icono").removeClass("color-error");
    $("#mod_tipo").removeClass("color-error");
    $("#mod_plegable").removeClass("color-error");
}
///:::::::::::: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::/// 

///:::::::::::::::::::::: TERMINO FUNCIONES DE MODULO :::::::::::::::::::::::::::::::::::::///