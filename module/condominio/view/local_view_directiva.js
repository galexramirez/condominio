///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: DIRECTIVA v 3.0 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: CREAR EDITAR BORRAR DIRECTIVA :::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: FECHA: 2023-02-01 09:50 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: VARIABLES GLOBALES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var tabla_directiva, opcion_directiva, fila_directiva, validar_directiva, directiva_id;

///:: JS DOM DIRECTIVA ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    ///:: SE CARGAN LOS NOMBRES DE CONDOMINIO :::::::::::::::::::::::::::::::::::::::::::::///
    $("#dire_condominio_nombre").html(f_select_condominio());

    $("#dire_condominio_nombre").on('change', function () {
        dire_condominio_nombre = $("#dire_condominio_nombre").val();
        $("#dire_edificio_descripcion").html(f_select_edificio(dire_condominio_nombre));
    });

    ///:: BOTONES DE SELECCION DIRECTIVA ::::::::::::::::::::::::::::::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_directiva","btn_seleccion_directiva");
    $("#div_btn_seleccion_directiva").html(div_boton);

    ///:: DATATABLE DIRECTIVA :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_directiva","");
    $("#div_tabla_directiva").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_directiva","");

    Accion='leer_directiva';

    tabla_directiva = $('#tabla_directiva').DataTable({
        language: idioma_espanol,
        responsive: "true",
        dom: 'Blfrtip',
        buttons:[
            {
                extend:     'excelHtml5',
                text:       '<i class="fas fa-file-excel"></i>',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success',
                title:      'Junta Directiva'
            },
        ],
        "ajax":{            
                "url": "ajax.php", 
                "method": 'POST', 
                "data":{MoS:MoS, NombreMoS:NombreMoS, Accion:Accion}, 
                "dataSrc":""
                },
        "columns": columnas_tabla,
        "order": [[0, 'desc']]
    });     

    ///:: BOTONES DE DIRECTIVA ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_directiva", function(){
        $("#form_directiva").trigger("reset");
        opcion_directiva = 1; // CREAR 
        directiva_id = "";
        f_limpia_directiva();
        f_combos_directiva();
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Directiva");
        $('#modal_crud_directiva').modal('show');	    
        f_tabla_miembro(directiva_id);
    });
    ///:: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON EDITAR :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///       
    $(document).on("click", ".btn_editar_directiva", function(){
        $("#form_directiva").trigger("reset");
        opcion_directiva = 2;// EDITAR
        f_limpia_directiva();
        f_combos_directiva();
        fila_directiva = $(this).closest("tr");	        

        directiva_id                = fila_directiva.find('td:eq(0)').text();
        dire_descripcion            = fila_directiva.find('td:eq(1)').text();
        dire_condominio_nombre      = fila_directiva.find('td:eq(2)').text();
        dire_edificio_descripcion   = fila_directiva.find('td:eq(3)').text();
        dire_tipo                   = fila_directiva.find('td:eq(4)').text();
        dire_fecha_inicio           = fila_directiva.find('td:eq(5)').text();
        dire_fecha_fin              = fila_directiva.find('td:eq(6)').text();
        dire_estado                 = fila_directiva.find('td:eq(7)').text();
        
        $("#directiva_id").val(directiva_id);
        $("#dire_descripcion").val(dire_descripcion);
        $("#dire_condominio_nombre").val(dire_condominio_nombre);
        $("#dire_edificio_descripcion").val(dire_edificio_descripcion);
        $("#dire_tipo").val(dire_tipo);
        $("#dire_fecha_inicio").val(dire_fecha_inicio);
        $("#dire_fecha_fin").val(dire_fecha_fin);
        $("#dire_estado").val(dire_estado);
       
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Directiva");		
    
        $('#modal_crud_directiva').modal('show');
        f_tabla_miembro(directiva_id);
    });
    ///:: FIN EVENTO DEL BOTON EDITAR :::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: CREA Y EDITA DIRECTIVA ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    //$('#form_directiva').submit(function(e){
    $(document).on("click", ".btn_guardar_directiva", function(){
        //e.preventDefault(); 
        let array_data = [];
        directiva_id                = $.trim($('#directiva_id').val());       
        dire_descripcion            = $.trim($('#dire_descripcion').val());           
        dire_condominio_nombre      = $.trim($('#dire_condominio_nombre').val());         
        dire_edificio_descripcion   = $.trim($('#dire_edificio_descripcion').val());
        dire_tipo                   = $.trim($('#dire_tipo').val());           
        dire_fecha_inicio           = $.trim($('#dire_fecha_inicio').val());         
        dire_fecha_fin              = $.trim($('#dire_fecha_fin').val());
        dire_estado                 = $.trim($('#dire_estado').val());         
        array_miembro               = tabla_miembro.rows().data().toArray();

        validar_directiva = f_validar_directiva(dire_descripcion, dire_condominio_nombre, dire_edificio_descripcion, dire_tipo, dire_fecha_inicio, dire_fecha_fin, dire_estado, array_miembro);

        if(validar_directiva == "invalido"){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: '*Falta Completar Información!!!',
              showConfirmButton: false,
              timer: 1500
            })
        }else{
            $("#btn_guardar_directiva").prop("disabled",true);
            array_data = JSON.stringify(array_miembro);
            if(opcion_directiva == 1) {
                    Accion = 'crear_directiva';  /// CREAR    
                    $.ajax({
                        url: "ajax.php",
                        type: "POST",
                        datatype:"json",    
                        data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, dire_descripcion:dire_descripcion, dire_condominio_nombre:dire_condominio_nombre, dire_edificio_descripcion:dire_edificio_descripcion, dire_tipo:dire_tipo, dire_fecha_inicio:dire_fecha_inicio, dire_fecha_fin:dire_fecha_fin, dire_estado:dire_estado, array_data:array_data},
                        success: function(data) {
                            tabla_directiva.ajax.reload(null, false);
                        }
                    });
            }else{
                Accion = 'editar_directiva'; /// EDITAR
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, directiva_id:directiva_id, dire_descripcion:dire_descripcion, dire_condominio_nombre:dire_condominio_nombre, dire_edificio_descripcion:dire_edificio_descripcion, dire_tipo:dire_tipo, dire_fecha_inicio:dire_fecha_inicio, dire_fecha_fin:dire_fecha_fin, dire_estado:dire_estado, array_data:array_data},    
                    success: function(data) {
                        tabla_directiva.ajax.reload(null, false);
                    }
                });
            }
            $('#modal_crud_directiva').modal('hide');
            $("#btn_guardar_directiva").prop("disabled",false);    
          }      
    });
    ///:: FIN CREA Y EDITA DIRECTIVA ::::::::::::::::::::::::::::::::::::::::::::::::::::::///
        
    ///:: EVENTO BOTON BORRAR REGISTRO ::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_directiva", function(){
        fila_directiva = $(this);           
        directiva_id = $(this).closest('tr').find('td:eq(0)').text();     

        let rpta_borrar_directiva = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminara el registro "+directiva_id+"!",
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
                rpta_borrar_directiva = 1;
                Accion='borrar_directiva';
    
                if (rpta_borrar_directiva == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS,NombreMoS:NombreMoS,Accion:Accion,directiva_id:directiva_id },   
                        success: function() {
                        tabla_directiva.row(fila_directiva.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///:: FIN BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::///
});
///:: TERMINO JS DOM DIRECTIVA ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCIONES DIRECTIVA :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::::::///
function f_validar_directiva(p_dire_descripcion, p_dire_condominio_nombre, p_dire_edificio_descripcion, p_dire_tipo, p_dire_fecha_inicio, p_dire_fecha_fin, p_dire_estado, p_array_miembro){
    f_limpia_directiva();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    let rpta_validar_directiva="";
    
    if(p_dire_descripcion == ""){
        $("#dire_descripcion").addClass("color-error");
        rpta_validar_directiva = "invalido";
    }
    if(p_dire_condominio_nombre == ""){
        $("#dire_condominio_nombre").addClass("color-error");
        rpta_validar_directiva = "invalido";
    }
    /*if(p_dire_edificio_descripcion == ""){
        $("#dire_edificio_descripcion").addClass("color-error");
        rpta_validar_directiva = "invalido";
    }*/
    if(p_dire_tipo == ""){
        $("#dire_tipo").addClass("color-error");
        rpta_validar_directiva = "invalido";
    }
    if(p_dire_fecha_inicio == ""){
        $("#dire_fecha_inicio").addClass("color-error");
        rpta_validar_directiva = "invalido";
    }
    if(p_dire_fecha_fin == ""){
        $("#dire_fecha_fin").addClass("color-error");
        rpta_validar_directiva = "invalido";
    }
    if(p_dire_fecha_inicio != "" && p_dire_fecha_fin != ""){
        if(p_dire_fecha_inicio > p_dire_fecha_fin){
            $("#dire_fecha_inicio").addClass("color-error");
            rpta_validar_directiva = "invalido";    
        }
    }
    if(p_dire_estado == ""){
        $("#dire_estado").addClass("color-error");
        rpta_validar_directiva = "invalido";
    }
    if (p_array_miembro.length == 0){
        rpta_pedidos="invalido";
    }
    alert("nro. datos array : "+p_array_miembro);    
    return rpta_validar_directiva; 
}
///:: FIN FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO :::::::::::::::::::::::::///

///:: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::::::::::::///
function f_limpia_directiva(){
    $("#dire_descripcion").removeClass("color-error");           
    $("#dire_condominio_nombre").removeClass("color-error");         
    //$("#dire_edificio_descripcion").removeClass("color-error");
    $("#dire_tipo").removeClass("color-error");           
    $("#dire_fecha_inicio").removeClass("color-error");         
    $("#dire_fecha_fin").removeClass("color-error");
    $("#dire_estado").removeClass("color-error");         
}
///:: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO ::::::::::::::::::::::::::::::/// 

///:: ACTUALIZA COMBOS PARA CONDOMINIO :::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_combos_directiva(){
    let select_html_directiva="";
    
    select_html_directiva = f_select_categoria("tc_condominio","DIRECTIVA","ESTADO");
    $("#dire_estado").html(select_html_directiva);

    select_html_directiva = f_select_categoria("tc_condominio","DIRECTIVA","TIPO");
    $("#dire_tipo").html(select_html_directiva);


}
///:: FIN ACTUALIZA COMBOS PARA CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::::::///

///:: TERMINO FUNCIONES ROLES DE USUARIO ::::::::::::::::::::::::::::::::::::::::::::::::::///

