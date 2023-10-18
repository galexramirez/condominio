///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: FICHAS Y CATEGORIAS DE CTA X COBRAR v 3.0 :::::::::::::::::::::::::::::::::::::::::::///
///:: CREAR EDITAR BORRAR TC CTA X COBRAR :::::::::::::::::::::::::::::::::::::::::::::::::///
///:: FECHA: 2023-02-17 15:50 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: DECLARACION DE VARIABLES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var tc_cta_cobrar_id, tc_cta_cobrar_ficha, tc_cta_cobrar_categoria1,tc_cta_cobrar_categoria2;
var tabla_tc_cta_cobrar, opcion_tc_cta_cobrar, fila_tc_cta_cobrar;

///:: JS DOM TC CTA X COBRAR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    ///:: SE CREA LOS BOTONES DE TC CTA X COBRAR ::::::::::::::::::::::::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_tc_cta_cobrar","btn_seleccion_tc_cta_cobrar");
    $("#div_btn_seleccion_tc_cta_cobrar").html(div_boton);

    ///:: SE ACTUALIZA LOS OBJETOS DE ACUERDO AL MODULO SELECCIONADO ::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_tc_cta_cobrar","");
    $("#div_tabla_tc_cta_cobrar").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_tc_cta_cobrar","");

    Accion='leer_tc_cta_cobrar';
    tabla_tc_cta_cobrar = $('#tabla_tc_cta_cobrar').DataTable({
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

    ///:: BOTONES DE TC CTA X COBRAR ::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_tc_cta_cobrar", function(){
        opcion_tc_cta_cobrar = "CREAR";
        f_limpia_tc_cta_cobrar();

        $("#form_tc_cta_cobrar").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Cta. por Cobrar");
        $('#modal_crud_tc_cta_cobrar').modal('show');	    
    });
    ///:: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: BOTON EDITAR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_tc_cta_cobrar", function(){
        opcion_tc_cta_cobrar = "EDITAR";
        f_limpia_tc_cta_cobrar();
        fila_tc_cta_cobrar         = $(this).closest("tr");	        
        tc_cta_cobrar_id           = fila_tc_cta_cobrar.find('td:eq(0)').text();
        tc_cta_cobrar_ficha        = fila_tc_cta_cobrar.find('td:eq(1)').text();
        tc_cta_cobrar_categoria1   = fila_tc_cta_cobrar.find('td:eq(2)').text();
        tc_cta_cobrar_categoria2   = fila_tc_cta_cobrar.find('td:eq(3)').text();

        $("#tc_cta_cobrar_id").val(tc_cta_cobrar_id);
        $("#tc_cta_cobrar_ficha").val(tc_cta_cobrar_ficha);
        $("#tc_cta_cobrar_categoria1").val(tc_cta_cobrar_categoria1);
        $("#tc_cta_cobrar_categoria2").val(tc_cta_cobrar_categoria2);
        
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Cta. por Cobrar");
    
        $('#modal_crud_tc_cta_cobrar').modal('show');		   
    });
    ///:: FIN BOTON EDITAR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: CREA Y EDITA USUARIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $('#form_tc_cta_cobrar').submit(function(e){
        let validar_tc_cta_cobrar;
        e.preventDefault();
        tc_cta_cobrar_id           = $.trim($('#tc_cta_cobrar_id').val());
        tc_cta_cobrar_ficha        = $.trim($('#tc_cta_cobrar_ficha').val());
        tc_cta_cobrar_categoria1   = $.trim($('#tc_cta_cobrar_categoria1').val());
        tc_cta_cobrar_categoria2   = $.trim($('#tc_cta_cobrar_categoria2').val());

        validar_tc_cta_cobrar = f_validar_tc_cta_cobrar(tc_cta_cobrar_ficha,tc_cta_cobrar_categoria1,tc_cta_cobrar_categoria2);
        
        if(validar_tc_cta_cobrar == "invalido"){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: '*Falta Completar Información!!!',
              showConfirmButton: false,
              timer: 1500
            })
        }else{
            $("#btn_guardar_tc_cta_cobrar").prop("disabled",true);
            if(opcion_tc_cta_cobrar == "CREAR") {   
                Accion='crear_tc_cta_cobrar';
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_cta_cobrar_id:tc_cta_cobrar_id, tc_ficha:tc_cta_cobrar_ficha, tc_categoria1:tc_cta_cobrar_categoria1, tc_categoria2:tc_cta_cobrar_categoria2},    
                    success: function(data) {
                        tabla_tc_cta_cobrar.ajax.reload(null, false);
                    }
                });
                $('#modal_crud_tc_cta_cobrar').modal('hide');
            } 
            
            if(opcion_tc_cta_cobrar == "EDITAR") {   
                Accion='editar_tc_cta_cobrar';
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_cta_cobrar_id:tc_cta_cobrar_id, tc_ficha:tc_cta_cobrar_ficha, tc_categoria1:tc_cta_cobrar_categoria1, tc_categoria2:tc_cta_cobrar_categoria2},    
                    success: function(data) {
                        tabla_tc_cta_cobrar.ajax.reload(null, false);
                    }
                });
                $('#modal_crud_tc_cta_cobrar').modal('hide');
            } 
        }
        $("#btn_guardar_tc_cta_cobrar").prop("disabled",false);
    });
    ///:: CREA Y EDITA USUARIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_tc_cta_cobrar", function(){
        fila_tc_cta_cobrar = $(this);           
        tc_cta_cobrar_id = fila_tc_cta_cobrar.closest('tr').find('td:eq(0)').text();     
        let rpta_borrar_tc_cta_cobrar = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminará el registro "+tc_cta_cobrar_id+"!",
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
                rpta_borrar_tc_cta_cobrar = 1;
                Accion='borrar_tc_cta_cobrar';
                if (rpta_borrar_tc_cta_cobrar == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",
                    async: false,    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_cta_cobrar_id:tc_cta_cobrar_id },   
                        success: function(data) {
                            tabla_tc_cta_cobrar.row(fila_tc_cta_cobrar.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///:: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: TERMINO BOTONES DE TC CTA X COBRAR ::::::::::::::::::::::::::::::::::::::::::::::///
});
///:: JS DOM TC CTA X COBRAR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///


///:: FUNCIONES TC CTA X COBRAR :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO ::::::;;;;;;;;;;:::::::::::::///
function f_validar_tc_cta_cobrar(p_tc_cta_cobrar_ficha,p_tc_cta_cobrar_categoria1,p_tc_cta_cobrar_categoria2){
    f_limpia_tc_cta_cobrar();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    let rpta_validar_tc_cta_cobrar="";

    if(p_tc_cta_cobrar_ficha==""){
        $("#tc_cta_cobrar_ficha").addClass("color-error");
        rpta_validar_tc_cta_cobrar="invalido";
    }
    if(p_tc_cta_cobrar_categoria1==""){
        $("#tc_cta_cobrar_categoria1").addClass("color-error");
        rpta_validar_tc_cta_cobrar="invalido";
    }
    if(p_tc_cta_cobrar_categoria2==""){
        $("#tc_cta_cobrar_categoria2").addClass("color-error");
        rpta_validar_tc_cta_cobrar="invalido";
    }
    return rpta_validar_tc_cta_cobrar;
}
///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::::::///

///:: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::::::::::::/// 
function f_limpia_tc_cta_cobrar(){
    $("#tc_cta_cobrar_id").removeClass("color-error");
    $("#tc_cta_cobrar_ficha").removeClass("color-error");
    $("#tc_cta_cobrar_categoria1").removeClass("color-error");
    $("#tc_cta_cobrar_categoria2").removeClass("color-error");
}
///:: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::::::::/// 

///:: TERMINO FUNCIONES TC CTA X COBRAR :::::::::::::::::::::::::::::::::::::::::::::::::::///