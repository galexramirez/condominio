///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: producto v 1.0 FECHA: 09-12-2023 ::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: CREAR, EDITAR, ELIMINAR TABLA DE PRODUCTO :::::::::::::::::::::::::::::::::::::::::::///
///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: DECLARACION DE VARIABLES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var producto_id, prod_rubro, prod_tipo, prod_correlativo, prod_codigo, prod_descripcion, prod_estado, prod_log;
var tabla_producto, opcion_producto, fila_producto;

///:: JS DOM producto :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    $("#prod_rubro").on("change", function(){
        prod_codigo = "";
        prod_rubro = $("#prod_rubro").val();
        Accion = 'crear_codigo';
        $.ajax({
            url     : "ajax.php",
            type    : "POST",
            datatype: "json",
            async   : false,
            data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, prod_rubro:prod_rubro},    
            success : function(data){
              prod_codigo = data;
              $("#prod_codigo").val(prod_codigo);
            }
        });
    })

    div_tabla = f_creacion_tabla("tabla_producto","");
    $("#div_tabla_producto").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_producto","");

    Accion = 'leer_producto';
    tabla_producto = $('#tabla_producto').DataTable({
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
                title       : 'PRODUCTOS'
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

    ///:: BOTONES DE PRODUCTO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_producto", function(){
        $("#form_producto").trigger("reset");
        opcion_producto = "CREAR"; 
        f_limpia_producto();
        f_combos_select_producto();
        $("#producto_id").prop('disabled', false);
        
        producto_id      = "";
        prod_rubro       = "";
        prod_tipo        = "";
        prod_codigo      = "";
        prod_descripcion = "";
        prod_estado      = "";
        prod_log         = "";

        $("#producto_id").val(producto_id);
        $("#prod_rubro").val(prod_rubro);
        $("#prod_tipo").val(prod_tipo);
        $("#prod_codigo").val(prod_codigo);
        $("#prod_descripcion").val(prod_descripcion);
        $("#prod_estado").val(prod_estado);
        $("#div_producto_log").html(prod_log);
        
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text( "Crear Producto");
        $('#modal_crud_producto').modal('show');	    
    });
    ///:: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: BOTON EDITAR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_producto", function(){
        let a_data = [];
        opcion_producto = "EDITAR";
        f_limpia_producto();
        f_combos_select_producto();
        $("#producto_id").prop('disabled', true);

        fila_producto    = $(this).closest("tr");	        
        producto_id      = fila_producto.find('td:eq(0)').text();
        prod_rubro       = fila_producto.find('td:eq(1)').text();
        prod_tipo        = fila_producto.find('td:eq(2)').text();
        prod_codigo      = fila_producto.find('td:eq(3)').text();
        prod_descripcion = fila_producto.find('td:eq(4)').text();
        prod_estado      = fila_producto.find('td:eq(5)').text();
        
        a_data = f_buscar_data_bd("producto","producto_id",producto_id);
        $.each(a_data, function(idx, obj){ 
            prod_log = obj.prod_log;
        });

        $("#producto_id").val(producto_id);
        $("#prod_rubro").val(prod_rubro);
        $("#prod_tipo").val(prod_tipo);
        $("#prod_codigo").val(prod_codigo);
        $("#prod_descripcion").val(prod_descripcion);
        $("#prod_estado").val(prod_estado);
        $("#div_producto_log").html(prod_log);
   
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Producto");		
    
        $('#modal_crud_producto').modal('show');		   
    });
    ///:: FIN BOTON EDITAR ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: CREA Y EDITA PRODUCTO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $('#form_producto').submit(function(e){
        e.preventDefault();
        let t_validar_producto = '';
        let existe_producto = '';
        let t_msg = '';
        producto_id      = $.trim($('#producto_id').val());    
        prod_rubro       = $.trim($('#prod_rubro').val());
        prod_tipo        = $.trim($('#prod_tipo').val());
        prod_codigo      = $.trim($('#prod_codigo').val());
        prod_descripcion = $.trim($('#prod_descripcion').val());
        prod_estado      = $.trim($('#prod_estado').val());
    
        t_validar_producto = f_validar_producto(producto_id, prod_rubro, prod_tipo, prod_codigo, prod_descripcion, prod_estado);

        if(opcion_producto == 'CREAR') {
            existe_producto = f_buscar_dato("producto","prod_codigo", "`prod_codigo`='"+prod_codigo+"'");
            if(existe_producto === prod_codigo){
                t_validar_producto = "invalido";
                t_msg = "Código de Producto Existe !!!";
            }
        }

        if(t_validar_producto==="invalido") {
            Swal.fire({
                position            : 'center',
                icon                : 'error',
                title               : '*Falta Completar Información!!!'+t_msg,
                showConfirmButton   : false,
                timer               : 1500
              })
        }else{
            if(opcion_producto == "CREAR") { Accion='crear_producto'; }
            if(opcion_producto == "EDITAR") { Accion='editar_producto'; }
            $("#btn_guardar_producto").prop("disabled",true);
            $.ajax({
                url     : "ajax.php",
                type    : "POST",
                datatype: "json",    
                data    : { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, producto_id:producto_id, prod_rubro:prod_rubro, prod_tipo:prod_tipo, prod_codigo:prod_codigo, prod_descripcion:prod_descripcion, prod_estado:prod_estado, prod_log:prod_log },    
                success : function(data) {
                    tabla_producto.ajax.reload(null, false);
                }
            });
            $("#btn_guardar_producto").prop("disabled",false);
            $('#modal_crud_producto').modal('hide');
        }
    });
    ///:: FIN CREA Y EDITA PRODUCTO :::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: TERMINO BOTONES DE PRODUCTO :::::::::::::::::::::::::::::::::::::::::::::::::::::///
        
});
///:: TERMINO JS DOM PRODUCTO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///


///:: FUNICIONES DE PRODUCTO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::::::///
function f_validar_producto(p_producto_id, p_prod_rubro, p_prod_tipo, p_prod_codigo, p_prod_descripcion, p_prod_estado){
    f_limpia_producto();
    let rpta_producto="";    

    if(p_prod_codigo=="" || p_prod_codigo.length>8){
        $("#prod_codigo").addClass("color-error");
        rpta_producto="invalido";
    }

    if(p_prod_rubro==""){
        $("#prod_rubro").addClass("color-error");
        rpta_producto="invalido";
    }

    if(p_prod_tipo==""){
        $("#prod_tipo").addClass("color-error");
        rpta_producto="invalido";
    }

    if(p_prod_descripcion==""){
        $("#prod_descripcion").addClass("color-error");
        rpta_producto="invalido";
    }

    if(p_prod_estado==""){
        $("#prod_estado").addClass("color-error");
        rpta_producto="invalido";
    }

    return rpta_producto; 
}
///:: FIN FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::///

///:: REESTABLECE EL COLOR DE LOS CAMPOS EN EL FORMULARIO :::::::::::::::::::::::::::::::::/// 
function f_limpia_producto(){
    $("#producto_id").removeClass("color-error");
    $("#prod_rubro").removeClass("color-error");
    $("#prod_tipo").removeClass("color-error");
    $("#prod_codigo").removeClass("color-error");
    $("#prod_descripcion").removeClass("color-error");
    $("#prod_estado").removeClass("color-error");
}
///:: FIN REESTABLECE EL COLOR DE LOS CAMPOS EN EL FORMULARIO :::::::::::::::::::::::::::::///

///:: FUNCION DE COMBOS SELECT PRODUCTO :::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_combos_select_producto(){
    let select_html="";
    select_html = f_select_categoria('tc_cta_pagar','SISTEMA','PRODUCTO','ESTADO');
    $("#prod_estado").html(select_html);

    select_html = f_select_categoria('tc_cta_pagar','SISTEMA','PRODUCTO','RUBRO');
    $("#prod_rubro").html(select_html);

    select_html = f_select_categoria('tc_cta_pagar','SISTEMA','PRODUCTO','TIPO');
    $("#prod_tipo").html(select_html);

}
///:: FIN FUNCION DE COMBOS SELECT PRODUCTO :::::::::::::::::::::::::::::::::::::::::::::::///

///:: TERMINO FUNICIONES DE PRODUCTO ::::::::::::::::::::::::::::::::::::::::::::::::::::::///