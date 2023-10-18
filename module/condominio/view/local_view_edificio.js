///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: EDIFICIO v 3.0 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: CREAR EDITAR BORRAR EDIFICIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: FECHA: 2023-02-01 09:50 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: VARIABLES GLOBALES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var tabla_edificio, opcion_edificio, fila_edificio, validar_edificio;

///:: JS DOM EDIFICIO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    ///:: SE CARGAN LOS NOMBRES DE CONDOMINIO :::::::::::::::::::::::::::::::::::::::::::::///
    $("#edi_condominio_nombre").html(f_select_condominio());

    ///:: BOTONES DE SELECCION EDIFICIO :::::::::::::::::::::::::::::::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_edificio","btn_seleccion_edificio");
    $("#div_btn_seleccion_edificio").html(div_boton);

    ///:: DATATABLE EDIFICIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_edificio","");
    $("#div_tabla_edificio").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_edificio","");

    Accion='leer_edificio';
    tabla_edificio = $('#tabla_edificio').DataTable({
        language: idioma_espanol,
        responsive: "true",
        dom: 'Blfrtip',
        buttons:[
            {
                extend:     'excelHtml5',
                text:       '<i class="fas fa-file-excel"></i> ',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success',
                title:      'Edificio'
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

    ///:: BOTONES DE EDIFICIO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_edificio", function(){
        $("#form_edificio").trigger("reset");
        opcion_edificio = 1; // CREAR 
        edificio_id = "";
        f_limpia_edificio();
        f_combos_edificio();
        $("#edificio_id").prop("disabled",false);
        $("#edi_condominio_nombre").prop("disabled",false);
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Edificio");
        $('#modal_crud_edificio').modal('show');	    
    });
    ///:: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON EDITAR :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///       
    $(document).on("click", ".btn_editar_edificio", function(){
        $("#form_edificio").trigger("reset");
        opcion_edificio = 2;// EDITAR
        f_limpia_edificio();
        f_combos_edificio();
        fila_edificio = $(this).closest("tr");	        

        $("#edificio_id").prop("disabled",true);
        $("#edi_condominio_nombre").prop("disabled",true);

        edificio_id             = fila_edificio.find('td:eq(0)').text();
        edi_descripcion         = fila_edificio.find('td:eq(1)').text();
        edi_condominio_nombre   = fila_edificio.find('td:eq(2)').text();
        edi_piso                = fila_edificio.find('td:eq(3)').text();
        edi_dpto                = fila_edificio.find('td:eq(4)').text();
        edi_estado              = fila_edificio.find('td:eq(5)').text();
        
        $("#edificio_id").val(edificio_id);
        $("#edi_descripcion").val(edi_descripcion);
        $("#edi_condominio_nombre").val(edi_condominio_nombre);
        $("#edi_piso").val(edi_piso);
        $("#edi_dpto").val(edi_dpto);
        $("#edi_estado").val(edi_estado);
      
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Edificio");		
    
        $('#modal_crud_edificio').modal('show');
    });
    ///:: FIN EVENTO DEL BOTON EDITAR :::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: CREA Y EDITA EDIFICIO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $('#form_edificio').submit(function(e){
        e.preventDefault(); 
        let existe_edificio="";
        edificio_id             = $.trim($('#edificio_id').val());       
        edi_descripcion         = $.trim($('#edi_descripcion').val());           
        edi_condominio_nombre   = $.trim($('#edi_condominio_nombre').val());         
        edi_piso                = $.trim($('#edi_piso').val());       
        edi_dpto                = $.trim($('#edi_dpto').val());           
        edi_estado              = $.trim($('#edi_estado').val());         

        validar_edificio = f_validar_edificio(edificio_id, edi_descripcion, edi_condominio_nombre, edi_piso, edi_dpto, edi_estado);

        if(validar_edificio == "invalido"){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: '*Falta Completar Información!!!',
              showConfirmButton: false,
              timer: 1500
            })
        }else{
                
            if(opcion_edificio == 1) {
                existe_edificio = f_existe_edificio(edificio_id,edi_condominio_nombre);
                if(existe_edificio=="SI"){
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: '*Edificio Existe!!!',
                        showConfirmButton: false,
                        timer: 1500
                      })
                }else{
                    $("#btn_guardar_edificio").prop("disabled",true);
                    Accion = 'crear_edificio';  /// CREAR    
                    $.ajax({
                        url: "ajax.php",
                        type: "POST",
                        datatype:"json",    
                        data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, edificio_id:edificio_id, edi_descripcion:edi_descripcion,edi_condominio_nombre:edi_condominio_nombre, edi_piso:edi_piso, edi_dpto:edi_dpto, edi_estado:edi_estado },
                        success: function(data) {
                            tabla_edificio.ajax.reload(null, false);
                        }
                    });
                }
            }else{
                $("#btn_guardar_edificio").prop("disabled",true);
                Accion = 'editar_edificio'; /// EDITAR
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, edificio_id:edificio_id, edi_descripcion:edi_descripcion,edi_condominio_nombre:edi_condominio_nombre, edi_piso:edi_piso, edi_dpto:edi_dpto, edi_estado:edi_estado },    
                    success: function(data) {
                        tabla_edificio.ajax.reload(null, false);
                    }
                });
            }
            $('#modal_crud_edificio').modal('hide');
            $("#btn_guardar_edificio").prop("disabled",false);    
        }
    });
    ///:: FIN CREA Y EDITA EDIFICIO :::::::::::::::::::::::::::::::::::::::::::::::::::::::///
        
    ///:: EVENTO BOTON BORRAR REGISTRO ::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_edificio", function(){
        fila_edificio = $(this);           
        edificio_id = $(this).closest('tr').find('td:eq(0)').text();     

        let rpta_borrar_edificio = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminara el registro "+edificio_id+"!",
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
                rpta_borrar_edificio = 1;
                Accion='borrar_edificio';
    
                if (rpta_borrar_edificio == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS,NombreMoS:NombreMoS,Accion:Accion,edificio_id:edificio_id },   
                        success: function() {
                        tabla_edificio.row(fila_edificio.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///:: FIN BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::///
});
///:: TERMINO JS DOM EDIFICIO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCIONES EDIFICIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::::::///
function f_validar_edificio(p_edificio_id, p_edi_descripcion, p_edi_condominio_nombre, p_edi_piso, p_edi_dpto, p_edi_estado){
    f_limpia_edificio();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    let rpta_validar_edificio="";
    
    if(p_edificio_id == ""){
        $("#edificio_id").addClass("color-error");
        rpta_validar_edificio = "invalido";
    }
    if(p_edi_descripcion == ""){
        $("#edi_descripcion").addClass("color-error");
        rpta_validar_edificio = "invalido";
    }
    if(p_edi_condominio_nombre == ""){
        $("#edi_condominio_nombre").addClass("color-error");
        rpta_validar_edificio = "invalido";
    }
    if(p_edi_piso == ""){
        $("#edi_piso").addClass("color-error");
        rpta_validar_edificio = "invalido";
    }
    if(p_edi_dpto == ""){
        $("#edi_dpto").addClass("color-error");
        rpta_validar_edificio = "invalido";
    }
    if(p_edi_estado == ""){
        $("#edi_estado").addClass("color-error");
        rpta_validar_edificio = "invalido";
    }
    return rpta_validar_edificio; 
}
///:: FIN FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO :::::::::::::::::::::::::///

///:: FUNCION PARA VALIDAR SI EXISTE EDIFICIO :::::::::::::::::::::::::::::::::::::::::::::///
function f_existe_edificio(p_edificio_id, p_edi_condominio_nombre){
    let rpta_existe_edificio = "";
    Accion='existe_edificio';
    $.ajax({
      url: "ajax.php",
      type: "POST",
      datatype:"json",
      async: false,
      data: {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, edificio_id:p_edificio_id, edi_condominio_nombre:p_edi_condominio_nombre},    
      success: function(data){
        rpta_existe_edificio = data;
      }
    });
    return rpta_existe_edificio;
}

///:: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::::::::::::///
function f_limpia_edificio(){
    $("#edificio_id").removeClass("color-error");           
    $("#edi_descripcion").removeClass("color-error");           
    $("#edi_condominio_nombre").removeClass("color-error");         
    $("#edi_piso").removeClass("color-error");       
    $("#edi_dpto").removeClass("color-error");           
    $("#edi_estado").removeClass("color-error");         
}
///:: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO ::::::::::::::::::::::::::::::/// 

///:: ACTUALIZA COMBOS PARA CONDOMINIO :::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_combos_edificio(){
    let select_html_edificio = "";
    
    select_html_edificio = f_select_categoria("tc_condominio","EDIFICIO","ESTADO");
    $("#edi_estado").html(select_html_edificio);
}
///:: FIN ACTUALIZA COMBOS PARA CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::::::///

///:: TERMINO FUNCIONES EDIFICIO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///