///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: DEPARTAMENTO v 3.0 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: CREAR EDITAR BORRAR DEPARTAMENTO ::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: FECHA: 2023-02-01 09:50 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: VARIABLES GLOBALES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var tabla_departamento, opcion_departamento, fila_departamento, validar_departamento, select_edificio;

///:: JS DOM DEPARTAMENTO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    $("#dpto_condominio_nombre").on('change', function () {
        dpto_condominio_nombre = $("#dpto_condominio_nombre").val();
        select_edificio = f_select_edificio(dpto_condominio_nombre);
        $("#dpto_edificio_descripcion").html(select_edificio);            
    });

    ///:: BOTONES DE SELECCION DEPARTAMENTO :::::::::::::::::::::::::::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_departamento","btn_seleccion_departamento");
    $("#div_btn_seleccion_departamento").html(div_boton);

    ///:: DATATABLE DEPARTAMENTO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_departamento","");
    $("#div_tabla_departamento").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_departamento","");

    Accion='leer_departamento';
    tabla_departamento = $('#tabla_departamento').DataTable({
        language: idioma_espanol,
        responsive: "true",
        dom: 'Blfrtip',
        buttons:[
            {
                extend:     'excelHtml5',
                text:       '<i class="fas fa-file-excel"></i> ',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success',
                title:      'Departamento'
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

    ///:: BOTONES DE DEPARTAMENTO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_dpto", function(){
        $("#form_departamento").trigger("reset");
        opcion_departamento = 1; // CREAR 
        departamento_id = "";
        f_limpia_departamento();
        f_combos_departamento();
        
        $("#departamento_id").prop("disabled",false);
        $("#dpto_condominio_nombre").prop("disabled",false);
        $("#dpto_edificio_descripcion").prop("disabled",false);
        
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Departamento");
        $('#modal_crud_departamento').modal('show');	    
    });
    ///:: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON EDITAR :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///       
    $(document).on("click", ".btn_editar_dpto", function(){
        $("#form_departamento").trigger("reset");
        opcion_departamento = 2;// EDITAR
        f_limpia_departamento();
        f_combos_departamento();
        fila_departamento = $(this).closest("tr");	        

        $("#departamento_id").prop("disabled",true);
        $("#dpto_condominio_nombre").prop("disabled",true);
        $("#dpto_edificio_descripcion").prop("disabled",true);

        departamento_id          = fila_departamento.find('td:eq(0)').text();
        dpto_descripcion         = fila_departamento.find('td:eq(1)').text();
        dpto_condominio_nombre   = fila_departamento.find('td:eq(2)').text();
        dpto_edificio_descripcion= fila_departamento.find('td:eq(3)').text();
        dpto_piso                = fila_departamento.find('td:eq(4)').text();
        dpto_dimensiones         = fila_departamento.find('td:eq(5)').text();
        dpto_estado              = fila_departamento.find('td:eq(6)').text();
        select_edificio = f_select_edificio(dpto_condominio_nombre);
        $("#dpto_edificio_descripcion").html(select_edificio);            

        $("#departamento_id").val(departamento_id);
        $("#dpto_descripcion").val(dpto_descripcion);
        $("#dpto_condominio_nombre").val(dpto_condominio_nombre);
        $("#dpto_edificio_descripcion").val(dpto_edificio_descripcion);
        $("#dpto_piso").val(dpto_piso);
        $("#dpto_dimensiones").val(dpto_dimensiones);
        $("#dpto_estado").val(dpto_estado);
      
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Departamento");		
    
        $('#modal_crud_departamento').modal('show');
    });
    ///:: FIN EVENTO DEL BOTON EDITAR :::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: CREA Y EDITA DEPARTAMENTO :::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $('#form_departamento').submit(function(e){
        e.preventDefault(); 
        let existe_departamento="";
        departamento_id          = $.trim($('#departamento_id').val());       
        dpto_descripcion         = $.trim($('#dpto_descripcion').val());           
        dpto_condominio_nombre   = $.trim($('#dpto_condominio_nombre').val());
        dpto_edificio_descripcion= $.trim($('#dpto_edificio_descripcion').val()); 
        dpto_piso                = $.trim($('#dpto_piso').val());       
        dpto_dimensiones         = $.trim($('#dpto_dimensiones').val());           
        dpto_estado              = $.trim($('#dpto_estado').val());         

        validar_departamento = f_validar_departamento(departamento_id, dpto_descripcion, dpto_condominio_nombre, dpto_edificio_descripcion, dpto_piso, dpto_dimensiones, dpto_estado);

        if(validar_departamento == "invalido"){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: '*Falta Completar Información!!!',
              showConfirmButton: false,
              timer: 1500
            })
        }else{
            if(opcion_departamento == 1) {
                existe_departamento = f_existe_departamento(departamento_id,dpto_condominio_nombre,dpto_edificio_descripcion);
                if(existe_departamento=="SI"){
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: '*Departamento Existe!!!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                }else{
                    $("#btn_guardar_dpto").prop("disabled",true);
                    Accion = 'crear_departamento';  /// CREAR    
                    $.ajax({
                        url: "ajax.php",
                        type: "POST",
                        datatype:"json",    
                        data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, departamento_id:departamento_id, dpto_descripcion:dpto_descripcion,dpto_condominio_nombre:dpto_condominio_nombre, dpto_edificio_descripcion:dpto_edificio_descripcion, dpto_piso:dpto_piso, dpto_dimensiones:dpto_dimensiones, dpto_estado:dpto_estado },
                        success: function(data) {
                            tabla_departamento.ajax.reload(null, false);
                        }
                    });
                }
            }else{
                $("#btn_guardar_dpto").prop("disabled",true);
                Accion = 'editar_departamento'; /// EDITAR
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, departamento_id:departamento_id, dpto_descripcion:dpto_descripcion,dpto_condominio_nombre:dpto_condominio_nombre, dpto_edificio_descripcion:dpto_edificio_descripcion, dpto_piso:dpto_piso, dpto_dimensiones:dpto_dimensiones, dpto_estado:dpto_estado },    
                    success: function(data) {
                        tabla_departamento.ajax.reload(null, false);
                    }
                });
            }
            $('#modal_crud_departamento').modal('hide');
            $("#btn_guardar_dpto").prop("disabled",false);    
        }
    });
    ///:: FIN CREA Y EDITA DEPARTAMENTO :::::::::::::::::::::::::::::::::::::::::::::::::::///
        
    ///:: EVENTO BOTON BORRAR REGISTRO ::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_dpto", function(){
        fila_departamento           = $(this);           
        departamento_id             = $(this).closest('tr').find('td:eq(0)').text();     
        dpto_condominio_nombre      = $(this).closest('tr').find('td:eq(2)').text();     
        dpto_edificio_descripcion   = $(this).closest('tr').find('td:eq(3)').text();     

        let rpta_borrar_dpto = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminara el registro "+departamento_id+"!",
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
                rpta_borrar_dpto = 1;
                Accion='borrar_departamento';
    
                if (rpta_borrar_dpto == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS,NombreMoS:NombreMoS,Accion:Accion,departamento_id:departamento_id, dpto_condominio_nombre:dpto_condominio_nombre, dpto_edificio_descripcion:dpto_edificio_descripcion },   
                        success: function() {
                        tabla_departamento.row(fila_departamento.parents('tr')).remove().draw();
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
function f_validar_departamento(p_departamento_id, p_dpto_descripcion, p_dpto_condominio_nombre, p_dpto_edificio_descripcion, p_dpto_piso, p_dpto_dimensiones, p_dpto_estado){
    f_limpia_departamento();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    let rpta_validar_departamento="";
    
    if(p_departamento_id == ""){
        $("#departamento_id").addClass("color-error");
        rpta_validar_departamento = "invalido";
    }
    if(p_dpto_descripcion == ""){
        $("#dpto_descripcion").addClass("color-error");
        rpta_validar_departamento = "invalido";
    }
    if(p_dpto_condominio_nombre == ""){
        $("#dpto_condominio_nombre").addClass("color-error");
        rpta_validar_departamento = "invalido";
    }
    if(p_dpto_edificio_descripcion == ""){
        $("#dpto_edificio_descripcion").addClass("color-error");
        rpta_validar_departamento = "invalido";
    }
    if(p_dpto_piso == ""){
        $("#dpto_piso").addClass("color-error");
        rpta_validar_departamento = "invalido";
    }
    if(p_dpto_dimensiones == ""){
        $("#dpto_dimensiones").addClass("color-error");
        rpta_validar_departamento = "invalido";
    }
    if(p_dpto_estado == ""){
        $("#dpto_estado").addClass("color-error");
        rpta_validar_departamento = "invalido";
    }
    return rpta_validar_departamento; 
}
///:: FIN FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO :::::::::::::::::::::::::///

///:: FUNCION PARA VALIDAR SI EXISTE EDIFICIO :::::::::::::::::::::::::::::::::::::::::::::///
function f_existe_departamento(p_departamento_id, p_dpto_condominio_nombre, p_dpto_edificio_descripcion){
    let rpta_existe_departamento = "";
    Accion='existe_departamento';
    $.ajax({
      url: "ajax.php",
      type: "POST",
      datatype:"json",
      async: false,
      data: {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, departamento_id:p_departamento_id, dpto_condominio_nombre:p_dpto_condominio_nombre, dpto_edificio_descripcion:p_dpto_edificio_descripcion},    
      success: function(data){
        rpta_existe_departamento = data;
      }
    });
    return rpta_existe_departamento;
}

///:: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::::::::::::///
function f_limpia_departamento(){
    $("#departamento_id").removeClass("color-error");           
    $("#dpto_descripcion").removeClass("color-error");           
    $("#dpto_condominio_nombre").removeClass("color-error");
    $("#dpto_edificio_descripcion").removeClass("color-error");
    $("#dpto_piso").removeClass("color-error");       
    $("#dpto_dimensiones").removeClass("color-error");           
    $("#dpto_estado").removeClass("color-error");         
}
///:: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO ::::::::::::::::::::::::::::::/// 

///:: ACTUALIZA COMBOS PARA CONDOMINIO :::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_combos_departamento(){
    let select_html_departamento="";

    select_html_departamento = f_select_categoria("tc_condominio","DEPARTAMENTO","ESTADO");
    $("#dpto_estado").html(select_html_departamento);

    select_html_departamento = f_select_condominio();
    $("#dpto_condominio_nombre").html(select_html_departamento);

}
///:: FIN ACTUALIZA COMBOS PARA CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::::::///

///:: TERMINO FUNCIONES EDIFICIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

