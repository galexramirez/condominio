///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: PERIODO v 1.0 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: CREAR, EDITAR, BORRAR TABLA PERIODO :::::::::::::::::::::::::::::::::::::::::::::::::///
///:: FECHA: 2023-10-23 09:50 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///::DECLARACION DE VARIABLES :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var periodo_id, periodo_anio, peri_mes, peri_proceso, peri_descripcion, peri_fecha_inicio, peri_fecha_termino;
var opcion_periodo, tabla_periodo, fila_periodo;
opcion_periodo = 0; // Variabla para ver tipo de grabacion crear: 1, editar: 2

///:: DOM JS CALENDARIO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    div_boton = f_botones_formulario("form_nuevo_periodo","btn_nuevo_periodo");
    $("#div_btn_nuevo_periodo").html(div_boton);

    $("#peri_anio, #peri_mes").on('change', function () {
        peri_descripcion = '';
        peri_anio = $("#peri_anio").val();
        peri_mes = $("#peri_mes").val();
        peri_descripcion = peri_anio+"-"+peri_mes;
        $("#peri_descripcion").val(peri_descripcion);
    });

    div_tabla = f_creacion_tabla("tabla_periodo","");
    $("#div_tabla_periodo").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_periodo","");

    Accion = 'leer_periodo';
    tabla_periodo = $('#tabla_periodo').DataTable({
        language        : idioma_espanol,
        responsive      : "true",
        dom             : 'Blfrtip',
        buttons:[
            {
                extend      : 'excelHtml5',
                text        : '<i class="fas fa-file-excel"></i> ',
                titleAttr   : 'Exportar a Excel',
                className   : 'btn btn-success',
                title       : 'PERIODOS'
            }
        ],
        "ajax"          :{
            "url"       : "ajax.php", 
            "method"    : 'POST',
            "data"      :{ MoS:MoS, NombreMoS:NombreMoS, Accion:Accion},
            "dataSrc"   : ""
        },
        "columns"       : columnas_tabla,
        "order"         : [[0, 'desc']]
    });     

    ///:: INICIO BOTONES CALENDARIO :::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///::: EVENTO DEL BOTON NUEVO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_periodo", function(){
        $("#form_periodo").trigger("reset");    
        opcion_periodo = "CREAR"; 
        f_limpia_periodo();

        $("#peri_anio").prop('disabled', false);
        $("#peri_mes").prop('disabled', false);
        $("#peri_proceso").prop('disabled', false);
        $("#peri_fecha_inicio").prop('disabled', false);
        $("#peri_fecha_termino").prop('disabled', false);

        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Periodos");
        $('#modal_crud_periodo').modal('show');	    
    });
    ///:: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON EDITAR :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_periodo", function(){
        opcion_periodo = "EDITAR";// Editar
        f_limpia_periodo();
        $("#peri_anio").prop('disabled', true);
        $("#peri_mes").prop('disabled', true);
        $("#peri_proceso").prop('disabled', true);

        fila_periodo        = $(this).closest("tr");	        
        periodo_id          = fila_periodo.find('td:eq(0)').text();
        peri_anio           = fila_periodo.find('td:eq(1)').text();
        peri_mes            = fila_periodo.find('td:eq(2)').text();
        peri_proceso        = fila_periodo.find('td:eq(3)').text();
        peri_descripcion    = fila_periodo.find('td:eq(4)').text();
        peri_fecha_inicio   = fila_periodo.find('td:eq(5)').text();
        peri_fecha_termino  = fila_periodo.find('td:eq(6)').text();

        $("#periodo_id").val(periodo_id);
        $("#peri_anio").val(peri_anio);
        $("#peri_mes").val(peri_mes);
        $("#peri_proceso").val(peri_proceso);
        $("#peri_descripcion").val(peri_descripcion);
        $("#peri_fecha_inicio").val(peri_fecha_inicio);
        $("#peri_fecha_termino").val(peri_fecha_termino);

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Periodos");		
        $('#modal_crud_periodo').modal('show');		   
    });
    ///:: FIN EVENTO DEL BOTON EDITAR :::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_periodo", function(){
        fila_periodo  = $(this);           
        periodo_id   = fila_periodo.closest("tr").find('td:eq(0)').text();     
        let rpta_borrar_periodo = 0;
        Swal.fire({
            title               : '¿Está seguro?',
            text                : "Se eliminara el registro "+periodo_id+"!",
            icon                : 'warning',
            showCancelButton    : true,
            confirmButtonColor  : '#3085d6',
            cancelButtonColor   : '#d33',
            confirmButtonText   : 'Si, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Eliminado!',
                    'El registro se ha sido eliminado.',
                    'success'
                )
                rpta_borrar_periodo = 1;
                Accion = 'borrar_periodo';
                if (rpta_borrar_periodo == 1) {            
                    $.ajax({
                    url     : "ajax.php",
                    type    : "POST",
                    datatype: "json",    
                    data    :  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, periodo_id:periodo_id },   
                        success : function() {
                            tabla_periodo.row(fila_periodo.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///:: FIN BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: CREAR Y EDITAR CALENDARIO :::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $('#form_periodo').submit(function(e){                         
        let validacion;
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        periodo_id          = $.trim($('#periodo_id').val());    
        peri_anio           = $.trim($('#peri_anio').val());
        peri_mes            = $.trim($('#peri_mes').val());    
        peri_proceso        = $.trim($('#peri_proceso').val());
        peri_descripcion    = $.trim($('#peri_descripcion').val());
        peri_fecha_inicio   = $.trim($('#peri_fecha_inicio').val());
        peri_fecha_termino  = $.trim($('#peri_fecha_termino').val());
        
        validacion          = f_validar_periodo(periodo_id, periodo_anio, peri_mes, peri_proceso, peri_descripcion, peri_fecha_inicio, peri_fecha_termino);

        if(validacion=="invalido") {
            Swal.fire({
                icon    : 'error',
                title   : 'INFORMACION...',
                text    : '*La información no es correcta!!!'
            })
        }else{
            $("#btn_guardar_periodo").prop("disabled",true);
            if(opcion_periodo == "CREAR") { Accion = 'crear_periodo'; }
            if(opcion_periodo == "EDITAR") { Accion = 'editar_periodo'; }
                $.ajax({
                    url     : "ajax.php",
                    type    : "POST",
                    datatype: "json",    
                    data:   { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, periodo_id:periodo_id, peri_anio:peri_anio, peri_mes:peri_mes, peri_proceso:peri_proceso, peri_descripcion:peri_descripcion, peri_fecha_inicio:peri_fecha_inicio, peri_fecha_termino:peri_fecha_termino },    
                    success: function(data) {
                        tabla_periodo.ajax.reload(null, false);
                    }
                });
            $('#modal_crud_periodo').modal('hide');
            $("#btn_guardar_periodo").prop("disabled",false);
        }
    });

    ///:: TERMINO BOTONES CALENDARIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::///
});
///:: TERMINO DOM JS CALENDARIO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCIONES CALENDARIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::::::///
function f_validar_periodo(p_periodo_id, p_periodo_anio, p_peri_mes, p_peri_descripcion, p_peri_fecha_inicio, p_peri_fecha_termino){
    f_limpia_periodo();
    let rpta_valida_periodo="";    

    if(p_periodo_anio=="") {
        $("#periodo_id").addClass("color-error");
        rpta_valida_periodo="invalido";
    }
    if(p_peri_mes=="" ||  peri_mes.length>10){
         $("#peri_mes").addClass("color-error");
        rpta_valida_periodo="invalido";
    }
    if(p_peri_descripcion==""){
        $("#peri_descripcion").addClass("color-error");
        rpta_valida_periodo="invalido";
    }
    return rpta_valida_periodo; 
}
///:: FIN FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::///

///:: LIMPIA LOS CAMPOS CON ERROR DEL FORMULARIO ::::::::::::::::::::::::::::::::::::::::::///
function f_limpia_periodo(){
    $("#periodo_id").removeClass("color-error");
    $("#periodo_anio").removeClass("color-error");
    $("#peri_mes").removeClass("color-error");
    $("#peri_descripcion").removeClass("color-error");
}
///:: FIN LIMPIA LOS CAMPOS CON ERROR DEL FORMULARIO ::::::::::::::::::::::::::::::::::::::///

///:: TERMINO FUNCIONES CALENDARIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::///