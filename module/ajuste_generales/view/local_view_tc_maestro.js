///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///::::::::::::::FICHAS Y CFATEGORIAS DE MAESTRO v 3.0 ::::::::::::::::::::::::::::::::::::///
///:::::::::::::::::::: CREAR EDITAR BORRAR TC MAESTRO ::::::::::::::::::::::::::::::::::::///
///:::::::::::: FECHA: 2022-10-27 15:50 :::::::::::::::::::::::::::::::::::::::::::::::::::///

///::::::::::::::::::::::::::: DECLARACION DE VARIABLES :::::::::::::::::::::::::::::::::::///
var tc_maestro_id, tc_maestro_categoria1, tc_maestro_categoria2,tc_maestro_categoria3;
var tabla_tc_maestro, opcion_tc_maestro, fila_tc_maestro;

///::::::::::::::::::::::::::::::::::JS DOM TC MAESTRO ::::::::::::::::::::::::::::::::::: ///
$(document).ready(function(){
    ///:::::::::::::::::::: SE CREA LOS BOTONES DE TC MAESTRO :::::::::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_tc_maestro","btn_seleccion_tc_maestro");
    $("#div_btn_seleccion_tc_maestro").html(div_boton);

    ///:::::::::::: SE ACTUALIZA LOS OBJETOS DE ACUERDO AL MODULO SELECCIONADO ::::::::::::///
    div_tabla = f_creacion_tabla("tabla_tc_maestro","");
    $("#div_tabla_tc_maestro").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_tc_maestro","");

    Accion='leer_tc_maestro';
    tabla_tc_maestro = $('#tabla_tc_maestro').DataTable({
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

    ///::::::::::::::::::::::: BOTONES DE TC MAESTRO ::::::::::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_tc_maestro", function(){
        opcion_tc_maestro = 'CREAR';
        f_limpia_tc_maestro();

        $("#form_tc_maestro").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Maestro");
        $('#modal_crud_tc_maestro').modal('show');	    
    });
    ///:::::::::::::::::::: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::::::::::::: BOTON EDITAR :::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_tc_maestro", function(){
        opcion_tc_maestro = 'EDITAR';
        f_limpia_tc_maestro();
        fila_tc_maestro         = $(this).closest("tr");	        
        tc_maestro_id           = fila_tc_maestro.find('td:eq(0)').text();
        tc_maestro_categoria1   = fila_tc_maestro.find('td:eq(1)').text();
        tc_maestro_categoria2   = fila_tc_maestro.find('td:eq(2)').text();
        tc_maestro_categoria3   = fila_tc_maestro.find('td:eq(3)').text();

        $("#tc_maestro_id").val(tc_maestro_id);
        $("#tc_maestro_categoria1").val(tc_maestro_categoria1);
        $("#tc_maestro_categoria2").val(tc_maestro_categoria2);
        $("#tc_maestro_categoria3").val(tc_maestro_categoria3);
        
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Maestro");
    
        $('#modal_crud_tc_maestro').modal('show');		   
    });
    ///::::::::::::::::::::::::::::: FIN BOTON EDITAR :::::::::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::::: CREA Y EDITA USUARIO ::::::::::::::::::::::::::::::::::::///
    $('#form_tc_maestro').submit(function(e){
        let validar_tc_maestro;
        let existe_categoria_maestro="";
        let t_msg = '';
        e.preventDefault();
        tc_maestro_id           = $.trim($('#tc_maestro_id').val());
        tc_maestro_categoria1   = $.trim($('#tc_maestro_categoria1').val());
        tc_maestro_categoria2   = $.trim($('#tc_maestro_categoria2').val());
        tc_maestro_categoria3   = $.trim($('#tc_maestro_categoria3').val());

        validar_tc_maestro = f_validar_tc_maestro(tc_maestro_categoria1,tc_maestro_categoria2,tc_maestro_categoria3);
        existe_categoria_maestro = f_existe_categoria('glo_tc_usuario', 'SISTEMA', tc_usuario_categoria1, tc_usuario_categoria2, tc_usuario_categoria3 );

        if(existe_categoria_maestro == 'SI'){
            t_msg = '<br> Categoria existe !!!';
            validar_tc_maestro = 'invalido';
        }
        
        if(validar_tc_maestro == "invalido"){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: '*Falta Completar Información!!!',
              showConfirmButton: false,
              timer: 1500
            })
        }else{
            $("#btn_guardar_tc_maestro").prop("disabled",true);
            if(opcion_tc_maestro == 'CREAR') { Accion='crear_tc_maestro'; }
            if(opcion_tc_maestro == 'EDITAR') { Accion='editar_tc_maestro'; }
                
            $.ajax({
                url     : "ajax.php",
                type    : "POST",
                datatype:"json",    
                data    : { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_maestro_id:tc_maestro_id, tc_categoria1:tc_maestro_categoria1, tc_categoria2:tc_maestro_categoria2, tc_categoria3:tc_maestro_categoria3},    
                success : function(data) {
                    tabla_tc_maestro.ajax.reload(null, false);
                }
            });
            $('#modal_crud_tc_maestro').modal('hide');
            $("#btn_guardar_tc_maestro").prop("disabled",false);     
        }
    });
    ///:::::::::::::::::::::::::: CREA Y EDITA USUARIO ::::::::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::::: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_tc_maestro", function(){
        fila_tc_maestro = $(this);           
        tc_maestro_id = fila_tc_maestro.closest('tr').find('td:eq(0)').text();     
        let rpta_borrar_tc_maestro = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminará el registro "+tc_maestro_id+"!",
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
                rpta_borrar_tc_maestro = 1;
                Accion='borrar_tc_maestro';
                if (rpta_borrar_tc_maestro == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",
                    async: false,    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_maestro_id:tc_maestro_id },   
                        success: function(data) {
                            tabla_tc_maestro.row(fila_tc_maestro.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///:::::::::::::::::::::::::: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::: TERMINO BOTONES DE TC MAESTRO ::::::::::::::::::::::::::::::///
});
///::::::::::::::::::::::::::::::::::JS DOM TC MAESTRO ::::::::::::::::::::::::::::::::::: ///


///:::::::::::::::::::::::::::::: FUNCIONES TC MAESTRO ::::::::::::::::::::::::::::::::::::///

///:::::::::::: FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO :::::::::::::::::::///
function f_validar_tc_maestro(p_tc_maestro_categoria1,p_tc_maestro_categoria2,p_tc_maestro_categoria3){
    f_limpia_tc_maestro();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    let rpta_validar_tc_maestro="";

    if(p_tc_maestro_categoria1==""){
        $("#tc_maestro_categoria1").addClass("color-error");
        rpta_validar_tc_maestro="invalido";
    }
    if(p_tc_maestro_categoria2==""){
        $("#tc_maestro_categoria2").addClass("color-error");
        rpta_validar_tc_maestro="invalido";
    }
    if(p_tc_maestro_categoria3==""){
        $("#tc_maestro_categoria3").addClass("color-error");
        rpta_validar_tc_maestro="invalido";
    }
    return rpta_validar_tc_maestro;
}
///:::::::::::: FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO :::::::::::::::::::///

///:::::::::::::::: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::/// 
function f_limpia_tc_maestro(){
    $("#tc_maestro_id").removeClass("color-error");
    $("#tc_maestro_categoria1").removeClass("color-error");
    $("#tc_maestro_categoria2").removeClass("color-error");
    $("#tc_maestro_categoria3").removeClass("color-error");
}
///::::::::::::::: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO ::::::::::::::::::/// 

///::::::::::::::::::::: TERMINO FUNCIONES TC MAESTRO :::::::::::::::::::::::::::::::::::::///