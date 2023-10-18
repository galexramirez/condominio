///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:::::::::::::::::::: CONTROL DE ACCESO DE USUARIOS v 3.0 :::::::::::::::::::::::::::::::///
///::::::::::::: CREAR EDITAR BORRAR CONTROL DE ACCESO ::::::::::::::::::::::::::::::::::::///
///:::::::::::: FECHA: 2022-10-27 15:50 :::::::::::::::::::::::::::::::::::::::::::::::::::///

///::::::::::::::::::::::::::: DECLARACION DE VARIABLES :::::::::::::::::::::::::::::::::::///
var control_acceso_id, cacces_perfil, cacces_nombre_modulo, cacces_nombre_objeto, cacces_acceso;
var fila_control_acceso, opcion_control_acceso, validar_control_acceso, tabla_control_acceso;

///:::::::::::::::::::::::::: JS DOM CONTROL ACCESOS ::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    ///:::::::::::::::::::: SE CREA LOS BOTONES DE CONTROL DE ACCESO ::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_control_acceso","btn_seleccion_control_acceso");
    $("#div_btn_seleccion_control_acceso").html(div_boton);

    ///:::::::::::: SE ACTUALIZA LOS OBJETOS DE ACUERDO AL MODULO SELECCIONADO ::::::::::::///
    $("#cacces_nombre_modulo").on('change', function () {
        cacces_nombre_modulo = $("#cacces_nombre_modulo").val();
        Accion='select_objeto'; 
        $.ajax({
          url: "ajax.php",
          type: "POST",
          datatype:"json",    
          async: false,
          data: {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, cacces_nombre_modulo:cacces_nombre_modulo},    
          success: function(data){
            $("#cacces_nombre_objeto").html(data);
          }
        });    
    });
    ///::::::::::::::::::::::: DATATABLE CONTROL ACCESO :::::::::::::::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_control_acceso","");
    $("#div_tabla_control_acceso").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_control_acceso","");

    Accion='leer_control_acceso';
    tabla_control_acceso = $('#tabla_control_acceso').DataTable({
        language: idioma_espanol,
        responsive: "true",
        dom: 'Blfrtip',
        buttons:[
            {
                extend:     'excelHtml5',
                text:       '<i class="fas fa-file-excel"></i> ',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success',
                title:      'Control de Acceso'
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

    ///::::::::::::::::::::::: BOTONES DE CONTROL DE ACCESO :::::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::::::::: EVENTO DEL BOTON NUEVO :::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_control_acceso", function(){
        opcion_control_acceso = 1; // Alta 
        f_limpia_control_acceso();
        f_combos_control_acceso();
        $("#form_control_acceso").trigger("reset");

        control_acceso_id = "";
        cacces_perfil = "";
        cacces_nombre_modulo = "";
        cacces_nombre_objeto = "";
        cacces_acceso = "";

        $("#control_acceso_id").val(control_acceso_id);
        $("#cacces_perfil").val(cacces_perfil);
        $("#cacces_nombre_modulo").val(cacces_nombre_modulo);
        $("#cacces_nombre_objeto").val(cacces_nombre_objeto);
        $("#cacces_acceso").val(cacces_acceso);

        $("#control_acceso_id").prop('disabled', true);
        $("#cacces_perfil").prop('disabled', false);
        $("#cacces_nombre_modulo").prop('disabled', false);
        $("#cacces_nombre_objeto").prop('disabled', false);
        $("#btn_guardar_control_acceso").prop("disabled",false);
        
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Control de Accesos");
        $('#modal_crud_control_acceso').modal('show');	    
    });

    ///:::::::::::::::::::::::::::::: BOTON EDITAR ::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_control_acceso", function(){
        $("#form_control_acceso").trigger("reset");
        opcion_control_acceso = 2;// Editar
        f_limpia_control_acceso();

        $("#control_acceso_id").prop('disabled', true);
        $("#cacces_perfil").prop('disabled', true);
        $("#cacces_nombre_modulo").prop('disabled', true);
        $("#cacces_nombre_objeto").prop('disabled', true);
        $("#btn_guardar_control_acceso").prop("disabled",false);

        fila_control_acceso     = $(this).closest("tr");	        
        control_acceso_id       = fila_control_acceso.find('td:eq(0)').text();
        cacces_perfil           = fila_control_acceso.find('td:eq(1)').text();
        cacces_nombre_modulo    = fila_control_acceso.find('td:eq(2)').text();
        cacces_nombre_objeto    = fila_control_acceso.find('td:eq(3)').text();
        cacces_acceso           = fila_control_acceso.find('td:eq(4)').text();

        f_combos_control_acceso();

        $("#control_acceso_id").val(control_acceso_id);
        $("#cacces_perfil").val(cacces_perfil);
        $("#cacces_nombre_modulo").val(cacces_nombre_modulo);
        $("#cacces_nombre_objeto").val(cacces_nombre_objeto);
        $("#cacces_acceso").val(cacces_acceso);
    
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Control de Acceso");		

        $('#modal_crud_control_acceso').modal('show');		   
    });
    ///::::::::::::::::::::::::::::::FIN BOTON EDITAR :::::::::::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::::::::: CREA Y EDITA USUARIO :::::::::::::::::::::::::::::::::///
    $('#form_control_acceso').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        $("#btn_guardar_control_acceso").prop("disabled",true);
        control_acceso_id       = $.trim($('#control_acceso_id').val());    
        cacces_perfil           = $.trim($('#cacces_perfil').val());
        cacces_nombre_modulo    = $.trim($('#cacces_nombre_modulo').val());    
        cacces_nombre_objeto    = $.trim($('#cacces_nombre_objeto').val());
        cacces_acceso           = $.trim($('#cacces_acceso').val());
        let existe_control_acceso    = "";
        validar_control_acceso  = f_validar_control_acceso(cacces_perfil, cacces_nombre_modulo, cacces_nombre_objeto, cacces_acceso);
        
        if(opcion_control_acceso == 1) {
            Accion='validar_control_acceso';
            $.ajax({
                url: "ajax.php",
                type: "POST",
                datatype:"json",
                async: false,
                data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, cacces_perfil:cacces_perfil, cacces_nombre_modulo:cacces_nombre_modulo, cacces_nombre_objeto:cacces_nombre_objeto},    
                success: function(data) {
                    existe_control_acceso = data;
                }
            });
            if(existe_control_acceso=="SI"){
                Swal.fire(
                    'Registro!',
                    'El registro ya existe ...',
                    'success'
                )
            }else{
                if(validar_control_acceso!="invalido" && existe_control_acceso=="NO") {
                    Accion='crear_control_acceso'; /// CREAR
                    $.ajax({
                        url: "ajax.php",
                        type: "POST",
                        datatype:"json",    
                        data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, control_acceso_id:control_acceso_id, cacces_perfil:cacces_perfil, cacces_nombre_modulo:cacces_nombre_modulo, cacces_nombre_objeto:cacces_nombre_objeto, cacces_acceso:cacces_acceso },    
                        success: function(data) {
                            tabla_control_acceso.ajax.reload(null, false);
                        }
                    });
                    $('#modal_crud_control_acceso').modal('hide');
                }
            }
        }
        if(opcion_control_acceso == 2){
            if(validar_control_acceso!="invalido") {   
                Accion='editar_control_acceso'; /// EDITAR
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, control_acceso_id:control_acceso_id, cacces_perfil:cacces_perfil, cacces_nombre_modulo:cacces_nombre_modulo,cacces_nombre_objeto:cacces_nombre_objeto, cacces_acceso:cacces_acceso },
                    success: function(data) {
                        tabla_control_acceso.ajax.reload(null, false);
                    }
                });
                $('#modal_crud_control_acceso').modal('hide');
            } 
        }
        $("#btn_guardar_control_acceso").prop("disabled",false);
    });
    ///::::::::::::::::::::::::: FIN CREA Y EDITA USUARIO :::::::::::::::::::::::::::::::::///
        
    ///::::::::::::::::::::::::::::::::::::::: BOTON BORRAR REGISTRO ::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_control_acceso", function(){
        fila_control_acceso = $(this);
        control_acceso_id = $(this).closest('tr').find('td:eq(0)').text();     
        let rpta_borrar_control_acceso = 0;

        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminara el registro "+control_acceso_id+"!",
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
                rpta_borrar_control_acceso = 1;
                Accion='borrar_control_acceso';
                if (rpta_borrar_control_acceso == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, control_acceso_id:control_acceso_id },   
                        success: function() {
                        tabla_control_acceso.row(fila_control_acceso.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///::::::::::::::::::::::::::: FIN BOTON BORRAR REGISTRO ::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::FIN BOTONES DE CONTROL DE ACCESO ::::::::::::::::::::::::::::///

});
///::::::::::::::::::::: TERMINO JS DOM CONTROL ACCESOS :::::::::::::::::::::::::::::::::::///

///:::::::::::::::::::::::::: FUNCIONES DE CONTROL DE ACCESO ::::::::::::::::::::::::::::::///

///:::::::::::: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::///
function f_validar_control_acceso(p_cacces_perfil, p_cacces_nombre_modulo, p_cacces_nombre_objeto, p_cacces_acceso){
    f_limpia_control_acceso();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    let rpta_validar_control_acceso="";    

    if(p_cacces_perfil==""){
        $("#cacces_perfil").addClass("color-error");
        rpta_validar_control_acceso = "invalido";
    }
    if(p_cacces_nombre_modulo==""){
        $("#cacces_nombre_modulo").addClass("color-error");
        rpta_validar_control_acceso = "invalido";
    }
    if(p_cacces_nombre_objeto==""){
        $("#cacces_nombre_objeto").addClass("color-error");
        rpta_validar_control_acceso = "invalido";
    }
    if(p_cacces_acceso==""){
        $("#cacces_acceso").addClass("color-error");
        rpta_validar_control_acceso = "invalido";
    }
    return rpta_validar_control_acceso; 
}
///:::::::::: FIN FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO ::::::::::::::::///

///::::::::::::::::::::: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::/// 
function f_limpia_control_acceso(){
    $("#control_acceso_id").removeClass("color-error");
    $("#cacces_perfil").removeClass("color-error");
    $("#cacces_nombre_modulo").removeClass("color-error");
    $("#cacces_nombre_objeto").removeClass("color-error");
    $("#cacces_acceso").removeClass("color-error");
}
///:::::::::::::::::: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::///

///:::::::::::::::::: CARGA LOS COMBOS DE CONTROL DE ACCESOS ::::::::::::::::::::::::::::::///
function f_combos_control_acceso(){
    let select_html="";
    select_html = f_select_categoria("glo_tc_usuario","USUARIO","PERFIL");
    $("#cacces_perfil").html(select_html);

    Accion='select_modulo'; 
    $.ajax({
      url: "ajax.php",
      type: "POST",
      datatype:"json",
      async: false,
      data: {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion},    
      success: function(data){
        $("#cacces_nombre_modulo").html(data);
      }
    });

    Accion='select_objeto'; 
    $.ajax({
      url: "ajax.php",
      type: "POST",
      datatype:"json",    
      async: false,
      data: {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, cacces_nombre_modulo:cacces_nombre_modulo},    
      success: function(data){
        $("#cacces_nombre_objeto").html(data);
      }
    });    
}
///:::::::::::::::::: FIN CARGA LOS COMBOS DE CONTROL DE ACCESOS ::::::::::::::::::::::::::///

///::::::::::::::::::::: TERMINO DE FUCNIONES DE CONTROL DE ACCESO ::::::::::::::::::::::::///