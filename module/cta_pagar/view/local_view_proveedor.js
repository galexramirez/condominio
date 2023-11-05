///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: PROVEEDOR v 1.0 FECHA: 03-11-2023 :::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: CREAR, EDITAR, ELIMINAR TABLA DE PROVEEDOR ::::::::::::::::::::::::::::::::::::::::::///
///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: DECLARACION DE VARIABLES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var prov_ruc, prov_nombre, prov_contacto, prov_cta_banco_soles, prov_email, prov_nro_telefono, prov_estado, prov_log, prov_direccion, prov_distrito;
var tabla_proveedor, opcion_proveedor, fila_proveedor;

///:: JS DOM PROVEEDOR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    div_tabla = f_creacion_tabla("tabla_proveedor","");
    $("#div_tabla_proveedor").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_proveedor","");

    Accion = 'leer_proveedor';
    tabla_proveedor = $('#tabla_proveedor').DataTable({
        orderCellsTop   : true,
        fixedHeader     : true,
        language        : idioma_espanol,
        responsive      : "true",
        dom             : 'Blfrtip',
        buttons         : [
            {
                extend      : 'excelHtml5',
                text        : '<i class="fas fa-file-excel"></i> ',
                titleAttr   : 'Exportar a Excel',
                className   : 'btn btn-success',
                title       : 'PROVEEDORES'
            },
        ],
        "ajax"          : {
            "url"       : "ajax.php", 
            "method"    : 'POST',
            "data"      : { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion },
            "dataSrc"   : ""
        },
        "columns"       : columnas_tabla
    });     

    ///:: BOTONES DE PROVEEDOR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_proveedor", function(){
        $("#form_proveedor").trigger("reset");
        opcion_proveedor = "CREAR"; 
        f_limpia_proveedor();
        f_combos_select_proveedor();
        $("#prov_ruc").prop('disabled', false);
        
        prov_ruc             = "";
        prov_nombre          = "";
        prov_contacto        = "";
        prov_cta_banco_soles = "";
        prov_email           = "";
        prov_nro_telefono    = "";
        prov_estado          = "";
        prov_direccion       = "";
        prov_distrito        = "";
        prov_log             = "";

        $("#prov_ruc").val(prov_ruc);
        $("#prov_nombre").val(prov_nombre);
        $("#prov_contacto").val(prov_contacto);
        $("#prov_cta_banco_soles").val(prov_cta_banco_soles);
        $("#prov_email").val(prov_email);
        $("#prov_nro_telefono").val(prov_nro_telefono);
        $("#prov_estado").val(prov_estado);
        $("#prov_direccion").val(prov_direccion);
        $("#prov_distrito").val(prov_distrito);
        $("#div_proveedor_log").html(prov_log);

        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text( "Crear Proveedor");
        $('#modal_crud_proveedor').modal('show');	    
    });
    ///:: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: BOTON EDITAR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_proveedor", function(){
        let a_data = [];
        opcion_proveedor = "EDITAR";
        f_limpia_proveedor();
        f_combos_select_proveedor();
        $("#prov_ruc").prop('disabled', true);

        fila_proveedor       = $(this).closest("tr");	        
        prov_ruc             = fila_proveedor.find('td:eq(0)').text();
        prov_nombre          = fila_proveedor.find('td:eq(1)').text();
        prov_contacto        = fila_proveedor.find('td:eq(2)').text();
        prov_cta_banco_soles = fila_proveedor.find('td:eq(3)').text();
        prov_email           = fila_proveedor.find('td:eq(4)').text();
        prov_nro_telefono    = fila_proveedor.find('td:eq(5)').text();
        prov_estado          = fila_proveedor.find('td:eq(6)').text();
        prov_direccion       = fila_proveedor.find('td:eq(7)').text();
        prov_distrito        = fila_proveedor.find('td:eq(8)').text();
        
        a_data = f_buscar_data_bd("proveedor","prov_ruc",prov_ruc);
        $.each(a_data, function(idx, obj){ 
            prov_log = obj.prov_log;
        });

        $("#prov_ruc").val(prov_ruc);
        $("#prov_nombre").val(prov_nombre);
        $("#prov_contacto").val(prov_contacto);
        $("#prov_cta_banco_soles").val(prov_cta_banco_soles);
        $("#prov_email").val(prov_email);
        $("#prov_nro_telefono").val(prov_nro_telefono);
        $("#prov_estado").val(prov_estado);
        $("#prov_direccion").val(prov_direccion);
        $("#prov_distrito").val(prov_distrito);
        $("#div_proveedor_log").html(prov_log);
   
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Proveedor");		
    
        $('#modal_crud_proveedor').modal('show');		   
    });
    ///:: FIN BOTON EDITAR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: CREA Y EDITA PROVEEDOR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $('#form_proveedor').submit(function(e){
        e.preventDefault();
        let t_validar_proveedor = '';
        let existe_proveedor = '';
        let t_msg = '';
        prov_ruc             = $.trim($('#prov_ruc').val());    
        prov_nombre          = $.trim($('#prov_nombre').val());
        prov_contacto        = $.trim($('#prov_contacto').val());
        prov_cta_banco_soles = $.trim($('#prov_cta_banco_soles').val());
        prov_email           = $.trim($('#prov_email').val());
        prov_nro_telefono    = $.trim($('#prov_nro_telefono').val());
        prov_estado          = $.trim($('#prov_estado').val());
        prov_direccion       = $.trim($('#prov_direccion').val());
        prov_distrito        = $.trim($('#prov_distrito').val());
    
        t_validar_proveedor = f_validar_proveedor(prov_ruc, prov_nombre, prov_contacto, prov_cta_banco_soles, prov_email, prov_nro_telefono, prov_estado, prov_direccion, prov_distrito);

        if(opcion_proveedor == 'CREAR') {
            existe_proveedor = f_buscar_dato("proveedor","prov_ruc", "`prov_ruc`='"+prov_ruc+"'");
            if(existe_proveedor == prov_ruc){
                t_validar_proveedor = "invalido";
                t_msg = "RUC de Proveedor Existe !!!";
            }
        }

        if(t_validar_proveedor=="invalido") {
            Swal.fire({
                position            : 'center',
                icon                : 'error',
                title               : '*Falta Completar Información!!!'+t_msg,
                showConfirmButton   : false,
                timer               : 1500
              })
        }else{
            if(opcion_proveedor == "CREAR") { Accion='crear_proveedor'; }
            if(opcion_proveedor == "EDITAR") { Accion='editar_proveedor'; }
            $("#btn_guardar_proveedor").prop("disabled",true);
            $.ajax({
                url     : "ajax.php",
                type    : "POST",
                datatype: "json",    
                data    : { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, prov_ruc:prov_ruc, prov_nombre:prov_nombre, prov_contacto:prov_contacto, prov_cta_banco_soles:prov_cta_banco_soles, prov_email:prov_email, prov_nro_telefono:prov_nro_telefono, prov_estado:prov_estado, prov_direccion:prov_direccion, prov_distrito:prov_distrito, prov_log:prov_log },    
                success : function(data) {
                    tabla_proveedor.ajax.reload(null, false);
                }
            });
            $("#btn_guardar_proveedor").prop("disabled",false);
            $('#modal_crud_proveedor').modal('hide');
        }
    });
    ///:: FIN CREA Y EDITA PROVEEDOR ::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: TERMINO BOTONES DE PROVEEDOR ::::::::::::::::::::::::::::::::::::::::::::::::::::///
        
});
///:: TERMINO JS DOM PROVEEDOR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///


///:: FUNICIONES DE PROVEEDOR :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::::::///
function f_validar_proveedor(p_prov_ruc, p_prov_nombre, p_prov_contacto, p_prov_cta_banco_soles, p_prov_email, p_prov_nro_telefono, p_prov_estado, p_prov_direccion, p_prov_distrito){
    f_limpia_proveedor();
    let rpta_proveedor="";    

    if(p_prov_ruc=="" || p_prov_ruc.length>11){
        $("#prov_ruc").addClass("color-error");
        rpta_proveedor="invalido";
    }

    if(p_prov_nombre==""){
        $("#prov_nombre").addClass("color-error");
        rpta_proveedor="invalido";
    }
    /*
    if(p_prov_contacto==""){
        $("#prov_contacto").addClass("color-error");
        rpta_proveedor="invalido";
    }

    if(p_prov_cta_banco_soles==""){
        $("#prov_cta_banco_soles").addClass("color-error");
        rpta_proveedor="invalido";
    }

    if(p_prov_email==""){
        $("#prov_email").addClass("color-error");
        rpta_proveedor="invalido";
    }

    if(p_prov_nro_telefono==""){
        $("#prov_nro_telefono").addClass("color-error");
        rpta_proveedor="invalido";
    }
    */
    if(p_prov_estado==""){
        $("#prov_estado").addClass("color-error");
        rpta_proveedor="invalido";
    }

    if(p_prov_direccion==""){
        $("#prov_direccion").addClass("color-error");
        rpta_proveedor="invalido";
    }

    if(p_prov_distrito=="" || p_prov_distrito.length>100){
        $("#prov_distrito").addClass("color-error");
        rpta_proveedor="invalido";
    }

    return rpta_proveedor; 
}
///:: FIN FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::///

///:: REESTABLECE EL COLOR DE LOS CAMPOS EN EL FORMULARIO :::::::::::::::::::::::::::::::::/// 
function f_limpia_proveedor(){
    $("#prov_ruc").removeClass("color-error");
    $("#prov_nombre").removeClass("color-error");
    $("#prov_contacto").removeClass("color-error");
    $("#prov_cta_banco_soles").removeClass("color-error");
    $("#prov_email").removeClass("color-error");
    $("#prov_nro_telefono").removeClass("color-error");
    $("#prov_estado").removeClass("color-error");
    $("#prov_direccion").removeClass("color-error");
    $("#prov_distrito").removeClass("color-error");
}
///:: FIN REESTABLECE EL COLOR DE LOS CAMPOS EN EL FORMULARIO :::::::::::::::::::::::::::::///

///:: FUNCION DE COMBOS SELECT PROVEEDOR ::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_combos_select_proveedor(){
    let select_html="";
    select_html = f_select_categoria('tc_cta_pagar','SISTEMA','PROVEEDOR','ESTADO');
    $("#prov_estado").html(select_html);

    select_html = f_select_categoria('tc_cta_pagar','USUARIO','PROVEEDOR','DISTRITO');
    $("#prov_distrito").html(select_html);
}
///:: FIN FUNCION DE COMBOS SELECT PROVEEDOR ::::::::::::::::::::::::::::::::::::::::::::::///

///:: TERMINO FUNICIONES DE PROVEEDOR :::::::::::::::::::::::::::::::::::::::::::::::::::::///