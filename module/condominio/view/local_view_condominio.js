///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: CONDOMINIO v 3.0 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: CREAR EDITAR BORRAR CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: FECHA: 2023-02-01 09:50 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: VARIABLES GLOBALES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var tabla_condominio, opcion_condominio, fila_condominio, validar_condominio;

///:: JS DON ROLES DE CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    ///:: BOTONES DE SELECCION CONDOMINIO :::::::::::::::::::::::::::::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_condominio","btn_seleccion_condominio");
    $("#div_btn_seleccion_condominio").html(div_boton);

    ///:: DATATABLE CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_condominio","");
    $("#div_tabla_condominio").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_condominio","");

    Accion='leer_condominio';
    tabla_condominio = $('#tabla_condominio').DataTable({
        language: idioma_espanol,
        responsive: "true",
        dom: 'Blfrtip',
        buttons:[
            {
                extend:     'excelHtml5',
                text:       '<i class="fas fa-file-excel"></i> ',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success',
                title:      'Condominio'
            },
        ],
        "ajax":{            
                "url": "ajax.php", 
                "method": 'POST', 
                "data":{MoS:MoS,NombreMoS:NombreMoS,Accion:Accion}, 
                "dataSrc":""
                },
        "columns":columnas_tabla,
        "order": [[0, 'desc']]
    });     

    ///:: BOTONES DE CONCOMINIO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_condominio", function(){
        $("#form_condominio").trigger("reset");
        opcion_condominio = 1; // CREAR 
        condominio_id = "";
        f_limpia_condominio();
        f_combos_condominio();
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Condominio");
        $('#modal_crud_condominio').modal('show');	    
        f_tabla_puerta(condominio_id);
    });
    ///:: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON EDITAR :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///       
    $(document).on("click", ".btn_editar_condominio", function(){
        $("#form_condominio").trigger("reset");
        opcion_condominio = 2;// EDITAR
        f_limpia_condominio();
        f_combos_condominio();
        fila_condominio = $(this).closest("tr");	        

        condominio_id           = fila_condominio.find('td:eq(0)').text();
        cond_tipo               = fila_condominio.find('td:eq(1)').text();
        cond_nombre             = fila_condominio.find('td:eq(2)').text();
        cond_edificio           = fila_condominio.find('td:eq(3)').text();
        cond_dpto               = fila_condominio.find('td:eq(4)').text();
        cond_puerta             = fila_condominio.find('td:eq(5)').text();
        cond_estacionamiento    = fila_condominio.find('td:eq(6)').text();
        cond_direccion          = fila_condominio.find('td:eq(7)').text();
        cond_distrito           = fila_condominio.find('td:eq(8)').text();
        cond_estado             = fila_condominio.find('td:eq(9)').text();
        
        $("#condominio_id").val(condominio_id);
        $("#cond_tipo").val(cond_tipo);
        $("#cond_nombre").val(cond_nombre);
        $("#cond_edificio").val(cond_edificio);
        $("#cond_dpto").val(cond_dpto);
        $("#cond_puerta").val(cond_puerta);
        $("#cond_estacionamiento").val(cond_estacionamiento);
        $("#cond_direccion").val(cond_direccion);
        $("#cond_distrito").val(cond_distrito);
        $("#cond_estado").val(cond_estado);
       
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Condominio");		
    
        $('#modal_crud_condominio').modal('show');
        f_tabla_puerta(condominio_id);
    });
    ///:: FIN EVENTO DEL BOTON EDITAR :::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: CREA Y EDITA CONDOMINIO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $('#form_condominio').submit(function(e){
        e.preventDefault(); 
        let array_data = [];
        condominio_id           = $.trim($('#condominio_id').val());       
        cond_tipo               = $.trim($('#cond_tipo').val());           
        cond_nombre             = $.trim($('#cond_nombre').val());         
        cond_edificio           = $.trim($('#cond_edificio').val());       
        cond_dpto               = $.trim($('#cond_dpto').val());           
        cond_puerta             = $.trim($('#cond_puerta').val());         
        cond_estacionamiento    = $.trim($('#cond_estacionamiento').val());
        cond_direccion          = $.trim($('#cond_direccion').val());      
        cond_distrito           = $.trim($('#cond_distrito').val());       
        cond_estado             = $.trim($('#cond_estado').val());         
        array_puerta = tabla_puerta.rows().data().toArray();

        validar_condominio = f_validar_condominio(cond_tipo, cond_nombre, cond_edificio, cond_dpto, cond_puerta, cond_estacionamiento, cond_direccion, cond_distrito, cond_estado, array_puerta);

        if(validar_condominio == "invalido"){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: '*Falta Completar Información!!!',
              showConfirmButton: false,
              timer: 1500
            })
        }else{
            $("#btn_guardar_condominio").prop("disabled",true);
            array_data = JSON.stringify(array_puerta);
            if(opcion_condominio == 1) {
                    Accion = 'crear_condominio';  /// CREAR    
                    $.ajax({
                        url: "ajax.php",
                        type: "POST",
                        datatype:"json",    
                        data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, cond_tipo:cond_tipo, cond_nombre:cond_nombre, cond_edificio:cond_edificio, cond_dpto:cond_dpto, cond_puerta:cond_puerta, cond_estacionamiento:cond_estacionamiento, cond_direccion:cond_direccion, cond_distrito:cond_distrito, cond_estado:cond_estado, array_data:array_data},
                        success: function(data) {
                            tabla_condominio.ajax.reload(null, false);
                        }
                    });
            }else{
                Accion = 'editar_condominio'; /// EDITAR
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, condominio_id:condominio_id, cond_tipo:cond_tipo, cond_nombre:cond_nombre, cond_edificio:cond_edificio, cond_dpto:cond_dpto, cond_puerta:cond_puerta, cond_estacionamiento:cond_estacionamiento, cond_direccion:cond_direccion, cond_distrito:cond_distrito, cond_estado:cond_estado, array_data:array_data},    
                    success: function(data) {
                        tabla_condominio.ajax.reload(null, false);
                    }
                });
            }
            $('#modal_crud_condominio').modal('hide');
            $("#btn_guardar_condominio").prop("disabled",false);    
          }      
    });
    ///:: FIN CREA Y EDITA CONDOMINIO :::::::::::::::::::::::::::::::::::::::::::::::::::::///
        
    ///:: EVENTO BOTON BORRAR REGISTRO ::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_condominio", function(){
        fila_condominio = $(this);           
        condominio_id = $(this).closest('tr').find('td:eq(0)').text();     

        let rpta_borrar_condominio = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminara el registro "+condominio_id+"!",
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
                rpta_borrar_condominio = 1;
                Accion='borrar_condominio';
    
                if (rpta_borrar_condominio == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS,NombreMoS:NombreMoS,Accion:Accion,condominio_id:condominio_id },   
                        success: function() {
                        tabla_condominio.row(fila_condominio.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///:: FIN BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::///
});
///:: TERMINO JS DON ROLES DE CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCIONES ROLES DE USUARIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::::::///
function f_validar_condominio(p_cond_tipo, p_cond_nombre, p_cond_edificio, p_cond_dpto, p_cond_puerta, p_cond_estacionamiento, p_cond_direccion, p_cond_distrito, p_cond_estado, p_array_puerta){
    f_limpia_condominio();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    let rpta_validar_condominio="";
    
    if(p_cond_tipo == ""){
        $("#cond_tipo").addClass("color-error");
        rpta_validar_condominio = "invalido";
    }
    if(p_cond_nombre == ""){
        $("#cond_nombre").addClass("color-error");
        rpta_validar_condominio = "invalido";
    }
    if(p_cond_edificio == ""){
        $("#cond_edificio").addClass("color-error");
        rpta_validar_condominio = "invalido";
    }
    if(p_cond_dpto == ""){
        $("#cond_dpto").addClass("color-error");
        rpta_validar_condominio = "invalido";
    }
    if(p_cond_puerta == ""){
        $("#cond_puerta").addClass("color-error");
        rpta_validar_condominio = "invalido";
    }
    if(p_cond_estacionamiento == ""){
        $("#cond_estacionamiento").addClass("color-error");
        rpta_validar_condominio = "invalido";
    }
    if(p_cond_direccion == ""){
        $("#cond_direccion").addClass("color-error");
        rpta_validar_condominio = "invalido";
    }
    if(p_cond_distrito == ""){
        $("#cond_distrito").addClass("color-error");
        rpta_validar_condominio = "invalido";
    }
    if(p_cond_estado == ""){
        $("#cond_estado").addClass("color-error");
        rpta_validar_condominio = "invalido";
    }
    if (p_array_puerta.length == 0){
        rpta_pedidos="invalido";
    }    
    return rpta_validar_condominio; 
}
///:: FIN FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO :::::::::::::::::::::::::///

///:: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::::::::::::///
function f_limpia_condominio(){
    $("#cond_tipo").removeClass("color-error");           
    $("#cond_nombre").removeClass("color-error");         
    $("#cond_edificio").removeClass("color-error");       
    $("#cond_dpto").removeClass("color-error");           
    $("#cond_puerta").removeClass("color-error");         
    $("#cond_estacionamiento").removeClass("color-error");
    $("#cond_direccion").removeClass("color-error");      
    $("#cond_distrito").removeClass("color-error");       
    $("#cond_estado").removeClass("color-error");         
}
///:: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO ::::::::::::::::::::::::::::::/// 

///:: ACTUALIZA COMBOS PARA CONDOMINIO :::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_combos_condominio(){
    let select_html_condominio="";
    
    select_html_condominio = f_select_categoria("tc_condominio","CONDOMINIO","ESTADO");
    $("#cond_estado").html(select_html_condominio);

    select_html_condominio = f_select_categoria("tc_condominio","CONDOMINIO","TIPO");
    $("#cond_tipo").html(select_html_condominio);

    select_html_condominio = f_select_categoria("tc_condominio","CONDOMINIO","DISTRITO");
    $("#cond_distrito").html(select_html_condominio);

}
///:: FIN ACTUALIZA COMBOS PARA CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::::::///

///:: TERMINO FUNCIONES ROLES DE USUARIO ::::::::::::::::::::::::::::::::::::::::::::::::::///

