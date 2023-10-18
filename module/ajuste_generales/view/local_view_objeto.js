///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:::::::::::::::::::: OBJETOS DEL SISTEMA v 3.0 :::::::::::::::::::::::::::::::::::::::::///
///::::::::::::: CREAR EDITAR BORRAR OBJETOS DEL SISTEMA ::::::::::::::::::::::::::::::::::///
///:::::::::::: FECHA: 2022-10-27 15:50 :::::::::::::::::::::::::::::::::::::::::::::::::::///

///::::::::::::::::::::::::::::: DECLARACION DE VARIABLES :::::::::::::::::::::::::::::::::///
var objeto_id, obj_nombre_modulo, obj_nombre_objeto,obj_descripcion;
var tabla_objeto, opcion_objeto, fila_objeto;

///:::::::::::::::::::::::::::::: JS DOM OBJETOS ::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    ///:::::::::::::::::::: SE CREA LOS BOTONES DE OBJETOS ::::::::::::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_objeto","btn_seleccion_objeto");
    $("#div_btn_seleccion_objeto").html(div_boton);

    ///::::::::::::::::::::::: DATATABLE OBJETO :::::::::::::::::::::::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_objeto","");
    $("#div_tabla_objeto").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_objeto","");

    Accion='leer_objeto';
    tabla_objeto = $('#tabla_objeto').DataTable({
        language: idioma_espanol,
        responsive: "true",
        dom: 'Blfrtip',
        buttons:[
            {
                extend:     'excelHtml5',
                text:       '<i class="fas fa-file-excel"></i> ',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success',
                title:      'Objetos del Sistema'
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
    
    ///::::::::::::::::::::::::::::::: EVENTO DEL BOTON NUEVO :::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_objeto", function(){
        opcion_objeto = 1; // CREAR 
        f_limpia_objeto();
        f_combos_objeto();
        $("#obj_nombre_modulo").prop('disabled', false);
        $("#obj_nombre_objeto").prop('disabled', false);
        $("#form_objeto").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Objetos");
        $('#modal_crud_objeto').modal('show');	    
    });
    ///::::::::::::::::::::::::::: FIN EVENTO DEL BOTON NUEVO :::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::::::::::: BOTON EDITAR :::::::::::::::::::::::::::::::::::::::///       
    $(document).on("click", ".btn_editar_objeto", function(){
        opcion_objeto = 2;// EDITAR
        f_limpia_objeto();
        f_combos_objeto();
        $("#obj_nombre_modulo").prop('disabled', true);
        $("#obj_nombre_objeto").prop('disabled', true);
        fila_objeto         = $(this).closest("tr");	        
        objeto_id           = fila_objeto.find('td:eq(0)').text();
        obj_nombre_modulo   = fila_objeto.find('td:eq(1)').text();
        obj_nombre_objeto   = fila_objeto.find('td:eq(2)').text();
        obj_descripcion     = fila_objeto.find('td:eq(3)').text();

        $("#objeto_id").val(objeto_id);
        $("#obj_nombre_modulo").val(obj_nombre_modulo);
        $("#obj_nombre_objeto").val(obj_nombre_objeto);
        $("#obj_descripcion").val(obj_descripcion);
        
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Objeto");		
    
        $('#modal_crud_objeto').modal('show');		   
    });
    ///::::::::::::::::::::::::::: FIN BOTON EDITAR :::::::::::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::::::: CREA Y EDITA OBJETO :::::::::::::::::::::::::::::::::::///
    $('#form_objeto').submit(function(e){                         
        let validar_objeto;
        let existe_objeto = "";
        e.preventDefault();
        objeto_id           = $.trim($('#objeto_id').val());
        obj_nombre_modulo   = $.trim($('#obj_nombre_modulo').val());
        obj_nombre_objeto   = $.trim($('#obj_nombre_objeto').val());
        obj_descripcion     = $.trim($('#obj_descripcion').val());

        validar_objeto = f_validar_objero(obj_nombre_modulo,obj_nombre_objeto,obj_descripcion);
        
        if(validar_objeto == "invalido"){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: '*Falta Completar Información!!!',
              showConfirmButton: false,
              timer: 1500
            })
        }else{
            if(opcion_objeto == 1) {
                Accion='validar_objeto';
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",
                    async: false,
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, obj_nombre_modulo:obj_nombre_modulo, obj_nombre_objeto:obj_nombre_objeto},    
                    success: function(data) {
                        existe_objeto = data;
                    }
                });
                if(existe_objeto=="SI"){
                    Swal.fire(
                        'Registro!',
                        'El registro ya existe ...',
                        'success'
                    )
                }else{
                    $("#btn_guardar_objeto").prop("disabled",true);
                    Accion='crear_objeto'; /// CREAR
                    $.ajax({
                        url: "ajax.php",
                        type: "POST",
                        datatype:"json",    
                        data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, objeto_id:objeto_id, obj_nombre_modulo:obj_nombre_modulo,obj_nombre_objeto:obj_nombre_objeto,obj_descripcion:obj_descripcion},    
                        success: function(data) {
                            tabla_objeto.ajax.reload(null, false);
                        }
                    });
                    $('#modal_crud_objeto').modal('hide');
                }
            } 
            if(opcion_objeto == 2) {   
                $("#btn_guardar_objeto").prop("disabled",true);
                Accion='editar_objeto'; /// EDITAR
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, objeto_id:objeto_id, obj_nombre_modulo:obj_nombre_modulo, obj_nombre_objeto:obj_nombre_objeto, obj_descripcion:obj_descripcion},    
                    success: function(data) {
                        tabla_objeto.ajax.reload(null, false);
                    }
                });
                $('#modal_crud_objeto').modal('hide');
            } 
        }
        $("#btn_guardar_objeto").prop("disabled",false);
    });
    ///:::::::::::::::::::::::::: FIN CREA Y EDITA OBJETO :::::::::::::::::::::::::::::::::///
    
    ///::::::::::::::::::::::::::: BOTON BORRAR REGISTRO ::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_objeto", function(){
        fila_objeto = $(this);
        objeto_id = fila_objeto.closest('tr').find('td:eq(0)').text();     
        let rpta_borrar_objeto = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminará el registro "+objeto_id+"!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Eliminado!',
                    'El registro se ha sido eliminado.',
                    'success'
                )
                rpta_borrar_objeto = 1;
                Accion='borrar_objeto';
                if (rpta_borrar_objeto == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",
                    async: false,    
                    data:  { MoS:MoS,NombreMoS:NombreMoS, Accion:Accion, objeto_id:objeto_id },   
                        success: function(data) {
                            tabla_objeto.row(fila_objeto.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///::::::::::::::::::::::::::: BOTON BORRAR REGISTRO ::::::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::: TERMINO DE BOTONES DE OBJETO ::::::::::::::::::::::::::::::///
});
///::::::::::::::::::::::::: TERMINO JS DOM OBJETOS :::::::::::::::::::::::::::::::::::::::///

///:::::::::::::::::::::::::::::: FUNCIONES DE OBJETO :::::::::::::::::::::::::::::::::::::///

///:::::::::::: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::///
function f_validar_objero(p_obj_nombre_modulo, p_obj_nombre_objeto, p_obj_descripcion){
    f_limpia_objeto();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    let rpta_validar_objeto="";

    if(p_obj_nombre_modulo==""){
        $("#obj_nombre_modulo").addClass("color-error");
        rpta_validar_objeto = "invalido";
    }
    if(p_obj_nombre_objeto==""){
        $("#obj_nombre_objeto").addClass("color-error");
        rpta_validar_objeto = "invalido";
    }
    if(p_obj_descripcion==""){
        $("#obj_descripcion").addClass("color-error");
        rpta_validar_objeto = "invalido";
    }
    return rpta_validar_objeto;
}
///:::::::::: FIN FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::///

///::::::::: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO ::::::::::::::::::::::::::::/// 
function f_limpia_objeto(){
    $("#objeto_id").removeClass("color-error");
    $("#obj_nombre_modulo").removeClass("color-error");
    $("#obj_nombre_objeto").removeClass("color-error");
    $("#obj_descripcion").removeClass("color-error");
}
///::::::::: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO ::::::::::::::::::::::::/// 

///::::::::::::::::::::: CARGA DE COMBOS PARA OBJETOS :::::::::::::::::::::::::::::::::::::///
function f_combos_objeto(){
    Accion='select_modulo'; 
    $.ajax({
      url: "ajax.php",
      type: "POST",
      datatype:"json",
      async: false,
      data: {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion},    
      success: function(data){
        $("#obj_nombre_modulo").html(data);
      }
    });
}
///::::::::::::::::::::: CARGA DE COMBOS PARA OBJETOS :::::::::::::::::::::::::::::::::::::///

///:::::::::::::::::::::::::: TERMINO FUNCIONES DE OBJETO :::::::::::::::::::::::::::::::::///