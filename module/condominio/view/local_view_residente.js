///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: RESIDENTE v 3.0 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: CREAR EDITAR BORRAR RESIDENTE :::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: FECHA: 2023-02-01 09:50 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: VARIABLES GLOBALES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var tabla_residente, opcion_residente, fila_residente, validar_residente;

///:: JS DOM RESIDENTE ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    $("#resi_condominio_nombre").on('change', function () {
        resi_condominio_nombre = $("#resi_condominio_nombre").val();
        select_edificio = f_select_edificio(resi_condominio_nombre);
        $("#resi_edificio_descripcion").html(select_edificio);
    });

    $("#resi_edificio_descripcion").on('change', function () {
        select_departamento = "";
        resi_condominio_nombre = $("#resi_condominio_nombre").val();
        resi_edificio_descripcion = $("#resi_edificio_descripcion").val();
        select_departamento = f_select_departamento(resi_condominio_nombre, resi_edificio_descripcion);
        $("#resi_departamento_id").html(select_departamento);
    });

    ///:: BOTONES DE SELECCION RESIDENTE ::::::::::::::::::::::::::::::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_residente","btn_seleccion_residente");
    $("#div_btn_seleccion_residente").html(div_boton);

    ///:: DATATABLE RESIDENTE :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_residente","");
    $("#div_tabla_residente").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_residente","");

    Accion='leer_residente';
    tabla_residente = $('#tabla_residente').DataTable({
        language: idioma_espanol,
        responsive: "true",
        dom: 'Blfrtip',
        buttons:[
            {
                extend:     'excelHtml5',
                text:       '<i class="fas fa-file-excel"></i> ',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success',
                title:      'Residente'
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

    ///:: BOTONES DE RESIDENTE ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_residente", function(){
        $("#form_residente").trigger("reset");
        opcion_residente = 1; // CREAR 
        residente_id = "";
        f_limpia_residente();
        f_combos_residente();
        
        $("#residente_id").prop("disabled",false);
        $("#resi_nombre").prop("disabled",false);
        $("#resi_condominio_nombre").prop("disabled",false);
        $("#resi_edificio_descripcion").prop("disabled",false);
        $("#resi_departamento_id").prop("disabled",false);
        
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Residente");
        $('#modal_crud_residente').modal('show');	    
    });
    ///:: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON EDITAR :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///       
    $(document).on("click", ".btn_editar_residente", function(){
        $("#form_residente").trigger("reset");
        opcion_residente = 2;// EDITAR
        f_limpia_residente();
        f_combos_residente();
        fila_residente = $(this).closest("tr");	        

        $("#residente_id").prop("disabled",true);
        $("#resi_nombre").prop("disabled",true);
        $("#resi_condominio_nombre").prop("disabled",true);
        $("#resi_edificio_descripcion").prop("disabled",true);
        $("#resi_departamento_id").prop("disabled",true);

        residente_id                    = fila_residente.find('td:eq(0)').text();
        resi_nombre                     = fila_residente.find('td:eq(1)').text();
        resi_condominio_nombre          = fila_residente.find('td:eq(2)').text();
        resi_edificio_descripcion       = fila_residente.find('td:eq(3)').text();
        resi_departamento_id            = fila_residente.find('td:eq(4)').text();
        resi_tipo                       = fila_residente.find('td:eq(5)').text();
        resi_fecha_inicio               = fila_residente.find('td:eq(6)').text();
        resi_fecha_fin                  = fila_residente.find('td:eq(7)').text();
        resi_estado                     = fila_residente.find('td:eq(8)').text();
        select_edificio = f_select_edificio(resi_condominio_nombre);
        $("#resi_edificio_descripcion").html(select_edificio);
        select_departamento = f_select_departamento(resi_condominio_nombre, resi_edificio_descripcion);
        $("#resi_departamento_id").html(select_departamento);

        $("#residente_id").val(residente_id);
        $("#resi_nombre").val(resi_nombre);
        $("#resi_condominio_nombre").val(resi_condominio_nombre);
        $("#resi_edificio_descripcion").val(resi_edificio_descripcion);
        $("#resi_departamento_id").val(resi_departamento_id);
        $("#resi_tipo").val(resi_tipo);
        $("#resi_fecha_inicio").val(resi_fecha_inicio);
        $("#resi_fecha_fin").val(resi_fecha_fin);
        $("#resi_estado").val(resi_estado);
      
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Residente");		
    
        $('#modal_crud_residente').modal('show');
    });
    ///:: FIN EVENTO DEL BOTON EDITAR :::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: CREA Y EDITA DEPARTAMENTO :::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $('#form_residente').submit(function(e){
        e.preventDefault(); 
        let existe_residente = "";
        residente_id                    = $.trim($('#residente_id').val());       
        resi_nombre                     = $.trim($('#resi_nombre').val());           
        resi_condominio_nombre          = $.trim($('#resi_condominio_nombre').val());
        resi_edificio_descripcion       = $.trim($('#resi_edificio_descripcion').val()); 
        resi_departamento_id            = $.trim($('#resi_departamento_id').val()); 
        resi_tipo                       = $.trim($('#resi_tipo').val());       
        resi_fecha_inicio               = $.trim($('#resi_fecha_inicio').val());
        resi_fecha_fin                  = $.trim($('#resi_fecha_fin').val());           
        resi_estado                     = $.trim($('#resi_estado').val());         

        validar_residente = f_validar_residente(resi_nombre, resi_condominio_nombre, resi_edificio_descripcion, resi_departamento_id, resi_tipo, resi_fecha_inicio, resi_fecha_fin, resi_estado);

        if(validar_residente == "invalido"){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: '*Falta Completar Información!!!',
              showConfirmButton: false,
              timer: 1500
            })
        }else{
            if(opcion_residente == 1) {
                existe_residente = f_existe_residente(residente_id, resi_condominio_nombre, resi_edificio_descripcion, resi_departamento_id);
                if(existe_residente=="SI"){
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: '*Residente Existe!!!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                }else{
                    $("#btn_guardar_residente").prop("disabled",true);
                    Accion = 'crear_residente';  /// CREAR    
                    $.ajax({
                        url: "ajax.php",
                        type: "POST",
                        datatype:"json",    
                        data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, resi_nombre:resi_nombre, resi_condominio_nombre:resi_condominio_nombre, resi_edificio_descripcion:resi_edificio_descripcion, resi_departamento_id:resi_departamento_id, resi_tipo:resi_tipo, resi_fecha_inicio:resi_fecha_inicio, resi_fecha_fin:resi_fecha_fin, resi_estado:resi_estado },
                        success: function(data) {
                            tabla_residente.ajax.reload(null, false);
                        }
                    });
                }
            }else{
                $("#btn_guardar_residente").prop("disabled",true);
                Accion = 'editar_residente'; /// EDITAR
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, residente_id:residente_id, resi_nombre:resi_nombre, resi_condominio_nombre:resi_condominio_nombre, resi_edificio_descripcion:resi_edificio_descripcion, resi_departamento_id:resi_departamento_id, resi_tipo:resi_tipo, resi_fecha_inicio:resi_fecha_inicio, resi_fecha_fin:resi_fecha_fin, resi_estado:resi_estado },    
                    success: function(data) {
                        tabla_residente.ajax.reload(null, false);
                    }
                });
            }
            $('#modal_crud_residente').modal('hide');
            $("#btn_guardar_residente").prop("disabled",false);    
        }
    });
    ///:: FIN CREA Y EDITA DEPARTAMENTO :::::::::::::::::::::::::::::::::::::::::::::::::::///
        
    ///:: EVENTO BOTON BORRAR REGISTRO ::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_residente", function(){
        fila_residente                  = $(this);           
        residente_id                    = $(this).closest('tr').find('td:eq(0)').text();     

        let rpta_borrar_residente = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminara el registro "+residente_id+"!",
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
                rpta_borrar_residente = 1;
                Accion='borrar_residente';
    
                if (rpta_borrar_residente == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, residente_id:residente_id },   
                        success: function() {
                        tabla_residente.row(fila_residente.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///:: FIN BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::///
});
///:: TERMINO JS DOM DEPARTAMENTO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCIONES DEPARTAMENTO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::::::///
function f_validar_residente(p_resi_nombre, p_resi_condominio_nombre, p_resi_edificio_descripcion, p_resi_departamento_id, p_resi_tipo, p_resi_fecha_inicio, p_resi_fecha_fin, p_resi_estado){
    f_limpia_residente();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    let rpta_validar_residente="";
    
    if(p_resi_nombre == ""){
        $("#resi_nombre").addClass("color-error");
        rpta_validar_residente = "invalido";
    }
    if(p_resi_condominio_nombre == ""){
        $("#resi_condominio_nombre").addClass("color-error");
        rpta_validar_residente = "invalido";
    }
    if(p_resi_edificio_descripcion == ""){
        $("#resi_edificio_descripcion").addClass("color-error");
        rpta_validar_residente = "invalido";
    }
    if(p_resi_departamento_id == ""){
        $("#resi_departamento_id").addClass("color-error");
        rpta_validar_residente = "invalido";
    }
    if(p_resi_tipo == ""){
        $("#resi_tipo").addClass("color-error");
        rpta_validar_residente = "invalido";
    }
    if(p_resi_fecha_inicio == ""){
        $("#resi_fecha_inicio").addClass("color-error");
        rpta_validar_residente = "invalido";
    }
    /*if(p_resi_fecha_fin == ""){
        $("#resi_fecha_fin").addClass("color-error");
        rpta_validar_residente = "invalido";
    }*/
    if(p_resi_estado == ""){
        $("#resi_estado").addClass("color-error");
        rpta_validar_residente = "invalido";
    }
    return rpta_validar_residente; 
}
///:: FIN FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO :::::::::::::::::::::::::///

///:: FUNCION PARA VALIDAR SI EXISTE EDIFICIO :::::::::::::::::::::::::::::::::::::::::::::///
function f_existe_residente(p_residente_id, p_resi_condominio_nombre, p_resi_edificio_descripcion){
    let rpta_existe_residente = "";
    Accion='existe_residente';
    $.ajax({
      url: "ajax.php",
      type: "POST",
      datatype:"json",
      async: false,
      data: {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, residente_id:p_residente_id, resi_condominio_nombre:p_resi_condominio_nombre, resi_edificio_descripcion:p_resi_edificio_descripcion},    
      success: function(data){
        rpta_existe_residente = data;
      }
    });
    return rpta_existe_residente;
}

///:: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::::::::::::///
function f_limpia_residente(){
    $("#resi_nombre").removeClass("color-error");           
    $("#resi_condominio_nombre").removeClass("color-error");
    $("#resi_edificio_descripcion").removeClass("color-error");
    $("#resi_departamento_id").removeClass("color-error");
    $("#resi_tipo").removeClass("color-error");       
    $("#resi_fecha_inicio").removeClass("color-error");
    //$("#resi_fecha_fin").removeClass("color-error");
    $("#resi_estado").removeClass("color-error");         
}
///:: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO ::::::::::::::::::::::::::::::/// 

///:: ACTUALIZA COMBOS PARA CONDOMINIO :::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_combos_residente(){
    let select_html_residente="";

    select_html_residente = f_select_categoria("tc_condominio","RESIDENTE","ESTADO");
    $("#resi_estado").html(select_html_residente);

    select_html_residente = f_select_categoria("tc_condominio","RESIDENTE","TIPO");
    $("#resi_tipo").html(select_html_residente);

    select_html_residente = f_select_condominio();
    $("#resi_condominio_nombre").html(select_html_residente);

    select_html_residente = f_select_nombre_corto("");
    $("#resi_nombre").html(select_html_residente);

}
///:: FIN ACTUALIZA COMBOS PARA CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::::::///

///:: TERMINO FUNCIONES EDIFICIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

