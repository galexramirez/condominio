///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: FICHAS Y CATEGORIAS DE CTA X PAGAR v 3.0 ::::::::::::::::::::::::::::::::::::::::::::///
///:: CREAR EDITAR BORRAR TC CTA X PAGAR ::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: FECHA: 2023-02-17 15:50 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: DECLARACION DE VARIABLES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var tc_cta_pagar_id, tc_cta_pagar_ficha, tc_cta_pagar_categoria1,tc_cta_pagar_categoria2;
var tabla_tc_cta_pagar, opcion_tc_cta_pagar, fila_tc_cta_pagar;

///:: JS DOM TC CTA X PAGAR :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    ///:: SE CREA LOS BOTONES DE TC CTA X PAGAR :::::::::::::::::::::::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_tc_cta_pagar","btn_seleccion_tc_cta_pagar");
    $("#div_btn_seleccion_tc_cta_pagar").html(div_boton);

    ///:: SE ACTUALIZA LOS OBJETOS DE ACUERDO AL MODULO SELECCIONADO ::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_tc_cta_pagar","");
    $("#div_tabla_tc_cta_pagar").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_tc_cta_pagar","");

    Accion='leer_tc_cta_pagar';
    tabla_tc_cta_pagar = $('#tabla_tc_cta_pagar').DataTable({
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

    ///:: BOTONES DE TC CTA X PAGAR :::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_tc_cta_pagar", function(){
        opcion_tc_cta_pagar = "CREAR";
        f_limpia_tc_cta_pagar();

        $("#form_tc_cta_pagar").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Cta. por Pagar");
        $('#modal_crud_tc_cta_pagar').modal('show');	    
    });
    ///:: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: BOTON EDITAR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_tc_cta_pagar", function(){
        opcion_tc_cta_pagar = "EDITAR";
        f_limpia_tc_cta_pagar();
        fila_tc_cta_pagar         = $(this).closest("tr");	        
        tc_cta_pagar_id           = fila_tc_cta_pagar.find('td:eq(0)').text();
        tc_cta_pagar_ficha        = fila_tc_cta_pagar.find('td:eq(1)').text();
        tc_cta_pagar_categoria1   = fila_tc_cta_pagar.find('td:eq(2)').text();
        tc_cta_pagar_categoria2   = fila_tc_cta_pagar.find('td:eq(3)').text();

        $("#tc_cta_pagar_id").val(tc_cta_pagar_id);
        $("#tc_cta_pagar_ficha").val(tc_cta_pagar_ficha);
        $("#tc_cta_pagar_categoria1").val(tc_cta_pagar_categoria1);
        $("#tc_cta_pagar_categoria2").val(tc_cta_pagar_categoria2);
        
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Cta. por Pagar");
    
        $('#modal_crud_tc_cta_pagar').modal('show');		   
    });
    ///:: FIN BOTON EDITAR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: CREA Y EDITA USUARIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $('#form_tc_cta_pagar').submit(function(e){
        let validar_tc_cta_pagar;
        e.preventDefault();
        tc_cta_pagar_id           = $.trim($('#tc_cta_pagar_id').val());
        tc_cta_pagar_ficha        = $.trim($('#tc_cta_pagar_ficha').val());
        tc_cta_pagar_categoria1   = $.trim($('#tc_cta_pagar_categoria1').val());
        tc_cta_pagar_categoria2   = $.trim($('#tc_cta_pagar_categoria2').val());

        validar_tc_cta_pagar = f_validar_tc_cta_pagar(tc_cta_pagar_ficha,tc_cta_pagar_categoria1,tc_cta_pagar_categoria2);
        
        if(validar_tc_cta_pagar == "invalido"){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: '*Falta Completar Información!!!',
              showConfirmButton: false,
              timer: 1500
            })
        }else{
            $("#btn_guardar_tc_cta_pagar").prop("disabled",true);
            if(opcion_tc_cta_pagar == "CREAR") {   
                Accion='crear_tc_cta_pagar';
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_cta_pagar_id:tc_cta_pagar_id, tc_ficha:tc_cta_pagar_ficha, tc_categoria1:tc_cta_pagar_categoria1, tc_categoria2:tc_cta_pagar_categoria2},    
                    success: function(data) {
                        tabla_tc_cta_pagar.ajax.reload(null, false);
                    }
                });
                $('#modal_crud_tc_cta_pagar').modal('hide');
            } 
            
            if(opcion_tc_cta_pagar == "EDITAR") {   
                Accion='editar_tc_cta_pagar';
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_cta_pagar_id:tc_cta_pagar_id, tc_ficha:tc_cta_pagar_ficha, tc_categoria1:tc_cta_pagar_categoria1, tc_categoria2:tc_cta_pagar_categoria2},    
                    success: function(data) {
                        tabla_tc_cta_pagar.ajax.reload(null, false);
                    }
                });
                $('#modal_crud_tc_cta_pagar').modal('hide');
            } 
        }
        $("#btn_guardar_tc_cta_pagar").prop("disabled",false);
    });
    ///:: CREA Y EDITA USUARIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_tc_cta_pagar", function(){
        fila_tc_cta_pagar = $(this);           
        tc_cta_pagar_id = fila_tc_cta_pagar.closest('tr').find('td:eq(0)').text();     
        let rpta_borrar_tc_cta_pagar = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminará el registro "+tc_cta_pagar_id+"!",
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
                rpta_borrar_tc_cta_pagar = 1;
                Accion='borrar_tc_cta_pagar';
                if (rpta_borrar_tc_cta_pagar == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",
                    async: false,    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_cta_pagar_id:tc_cta_pagar_id },   
                        success: function(data) {
                            tabla_tc_cta_pagar.row(fila_tc_cta_pagar.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///:: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: TERMINO BOTONES DE TC CTA X PAGAR :::::::::::::::::::::::::::::::::::::::::::::::///
});
///:: JS DOM TC CTA X PAGAR :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///


///:: FUNCIONES TC CTA X PAGAR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO ::::::;;;;;;;;;;:::::::::::::///
function f_validar_tc_cta_pagar(p_tc_cta_pagar_ficha,p_tc_cta_pagar_categoria1,p_tc_cta_pagar_categoria2){
    f_limpia_tc_cta_pagar();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    let rpta_validar_tc_cta_pagar="";

    if(p_tc_cta_pagar_ficha==""){
        $("#tc_cta_pagar_ficha").addClass("color-error");
        rpta_validar_tc_cta_pagar="invalido";
    }
    if(p_tc_cta_pagar_categoria1==""){
        $("#tc_cta_pagar_categoria1").addClass("color-error");
        rpta_validar_tc_cta_pagar="invalido";
    }
    if(p_tc_cta_pagar_categoria2==""){
        $("#tc_cta_pagar_categoria2").addClass("color-error");
        rpta_validar_tc_cta_pagar="invalido";
    }
    return rpta_validar_tc_cta_pagar;
}
///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::::::///

///:: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::::::::::::/// 
function f_limpia_tc_cta_pagar(){
    $("#tc_cta_pagar_id").removeClass("color-error");
    $("#tc_cta_pagar_ficha").removeClass("color-error");
    $("#tc_cta_pagar_categoria1").removeClass("color-error");
    $("#tc_cta_pagar_categoria2").removeClass("color-error");
}
///:: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::::::::/// 

///:: TERMINO FUNCIONES TC CTA X PAGAR ::::::::::::::::::::::::::::::::::::::::::::::::::::///