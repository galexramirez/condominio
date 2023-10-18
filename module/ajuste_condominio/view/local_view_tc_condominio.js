///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: FICHAS Y CATEGORIAS DE CONDOMINIO v 3.0 :::::::::::::::::::::::::::::::::::::::::::::///
///:: CREAR EDITAR BORRAR TC CONDOMINIO :::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: FECHA: 2023-02-17 15:50 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: DECLARACION DE VARIABLES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var tc_condominio_id, tc_condominio_ficha, tc_condominio_categoria1,tc_condominio_categoria2;
var tabla_tc_condominio, opcion_tc_condominio, fila_tc_condominio;

///:: JS DOM TC CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    ///:: SE CREA LOS BOTONES DE TC CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_tc_condominio","btn_seleccion_tc_condominio");
    $("#div_btn_seleccion_tc_condominio").html(div_boton);

    ///:: SE ACTUALIZA LOS OBJETOS DE ACUERDO AL MODULO SELECCIONADO ::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_tc_condominio","");
    $("#div_tabla_tc_condominio").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_tc_condominio","");

    Accion='leer_tc_condominio';
    tabla_tc_condominio = $('#tabla_tc_condominio').DataTable({
        language: idioma_espanol,
        responsive: "true",
        dom: 'Blfrtip',
        buttons:[
            {
                extend:     'excelHtml5',
                text:       '<i class="fas fa-file-excel"></i> ',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success'
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

    ///:: BOTONES DE TC CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_tc_condominio", function(){
        opcion_tc_condominio = "CREAR";
        f_limpia_tc_condominio();

        $("#form_tc_condominio").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Condominio");
        $('#modal_crud_tc_condominio').modal('show');	    
    });
    ///:: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: BOTON EDITAR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_tc_condominio", function(){
        opcion_tc_condominio = "EDITAR";
        f_limpia_tc_condominio();
        fila_tc_condominio         = $(this).closest("tr");	        
        tc_condominio_id           = fila_tc_condominio.find('td:eq(0)').text();
        tc_condominio_ficha        = fila_tc_condominio.find('td:eq(1)').text();
        tc_condominio_categoria1   = fila_tc_condominio.find('td:eq(2)').text();
        tc_condominio_categoria2   = fila_tc_condominio.find('td:eq(3)').text();

        $("#tc_condominio_id").val(tc_condominio_id);
        $("#tc_condominio_ficha").val(tc_condominio_ficha);
        $("#tc_condominio_categoria1").val(tc_condominio_categoria1);
        $("#tc_condominio_categoria2").val(tc_condominio_categoria2);
        
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Condominio");
    
        $('#modal_crud_tc_condominio').modal('show');		   
    });
    ///:: FIN BOTON EDITAR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: CREA Y EDITA USUARIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $('#form_tc_condominio').submit(function(e){
        let validar_tc_condominio;
        e.preventDefault();
        tc_condominio_id           = $.trim($('#tc_condominio_id').val());
        tc_condominio_ficha        = $.trim($('#tc_condominio_ficha').val());
        tc_condominio_categoria1   = $.trim($('#tc_condominio_categoria1').val());
        tc_condominio_categoria2   = $.trim($('#tc_condominio_categoria2').val());

        validar_tc_condominio = f_validar_tc_condominio(tc_condominio_ficha,tc_condominio_categoria1,tc_condominio_categoria2);
        
        if(validar_tc_condominio == "invalido"){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: '*Falta Completar Información!!!',
              showConfirmButton: false,
              timer: 1500
            })
        }else{
            $("#btn_guardar_tc_condominio").prop("disabled",true);
            if(opcion_tc_condominio == "CREAR") {   
                Accion='crear_tc_condominio';
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_condominio_id:tc_condominio_id, tc_ficha:tc_condominio_ficha, tc_categoria1:tc_condominio_categoria1, tc_categoria2:tc_condominio_categoria2},    
                    success: function(data) {
                        tabla_tc_condominio.ajax.reload(null, false);
                    }
                });
                $('#modal_crud_tc_condominio').modal('hide');
            } 
            
            if(opcion_tc_condominio == "EDITAR") {   
                Accion='editar_tc_condominio';
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_condominio_id:tc_condominio_id, tc_ficha:tc_condominio_ficha, tc_categoria1:tc_condominio_categoria1, tc_categoria2:tc_condominio_categoria2},    
                    success: function(data) {
                        tabla_tc_condominio.ajax.reload(null, false);
                    }
                });
                $('#modal_crud_tc_condominio').modal('hide');
            } 
        }
        $("#btn_guardar_tc_condominio").prop("disabled",false);
    });
    ///:: CREA Y EDITA USUARIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_tc_condominio", function(){
        fila_tc_condominio = $(this);           
        tc_condominio_id = fila_tc_condominio.closest('tr').find('td:eq(0)').text();     
        let rpta_borrar_tc_condominio = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminará el registro "+tc_condominio_id+"!",
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
                rpta_borrar_tc_condominio = 1;
                Accion='borrar_tc_condominio';
                if (rpta_borrar_tc_condominio == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",
                    async: false,    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_condominio_id:tc_condominio_id },   
                        success: function(data) {
                            tabla_tc_condominio.row(fila_tc_condominio.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///:: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: TERMINO BOTONES DE TC CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::::::///
});
///:: JS DOM TC CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///


///:: FUNCIONES TC CONDOMINIO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO ::::::;;;;;;;;;;:::::::::::::///
function f_validar_tc_condominio(p_tc_condominio_ficha,p_tc_condominio_categoria1,p_tc_condominio_categoria2){
    f_limpia_tc_condominio();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    let rpta_validar_tc_condominio="";

    if(p_tc_condominio_ficha==""){
        $("#tc_condominio_ficha").addClass("color-error");
        rpta_validar_tc_condominio="invalido";
    }
    if(p_tc_condominio_categoria1==""){
        $("#tc_condominio_categoria1").addClass("color-error");
        rpta_validar_tc_condominio="invalido";
    }
    if(p_tc_condominio_categoria2==""){
        $("#tc_condominio_categoria2").addClass("color-error");
        rpta_validar_tc_condominio="invalido";
    }
    return rpta_validar_tc_condominio;
}
///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::::::///

///:: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::::::::::::/// 
function f_limpia_tc_condominio(){
    $("#tc_condominio_id").removeClass("color-error");
    $("#tc_condominio_ficha").removeClass("color-error");
    $("#tc_condominio_categoria1").removeClass("color-error");
    $("#tc_condominio_categoria2").removeClass("color-error");
}
///:: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::::::::/// 

///:: TERMINO FUNCIONES TC CONDOMINIO :::::::::::::::::::::::::::::::::::::::::::::::::::::///