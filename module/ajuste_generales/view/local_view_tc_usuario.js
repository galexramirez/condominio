///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///::::::::::::::FICHAS Y CATEGORIAS DE USUARIO v 3.0 :::::::::::::::::::::::::::::::::::::///
///:::::::::::::::::::: CREAR EDITAR BORRAR TC USUARIO ::::::::::::::::::::::::::::::::::::///
///:::::::::::: FECHA: 2022-10-27 15:50 :::::::::::::::::::::::::::::::::::::::::::::::::::///

///::::::::::::::::::::::::::: DECLARACION DE VARIABLES :::::::::::::::::::::::::::::::::::///
var tc_usuario_id, tc_usuario_ficha, tc_usuario_categoria1, tc_usuario_categoria2;
var tabla_tc_usuario, opcion_tc_usuario, fila_tc_usuario;

///::::::::::::::::::::::::::::::::::JS DOM TC USUARIO ::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    ///:::::::::::::::::::: SE CREA LOS BOTONES DE TC USUARIO :::::::::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_tc_usuario","btn_seleccion_tc_usuario");
    $("#div_btn_seleccion_tc_usuario").html(div_boton);

    ///:::::::::::::::::::::::: DATATABLE TC USUARIO ::::::::::::::::::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_tc_usuario","");
    $("#div_tabla_tc_usuario").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_tc_usuario","");

    Accion='leer_tc_usuario';
    tabla_tc_usuario = $('#tabla_tc_usuario').DataTable({
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
                "url": "Ajax.php", 
                "method": 'POST', //usamos el metodo POST
                "data":{MoS:MoS, NombreMoS:NombreMoS, Accion:Accion}, //enviamos opcion 4 para que haga un SELECT
                "dataSrc":""
                },
        "columns": columnas_tabla
    });     

    ///::::::::::::::::::::::: BOTONES DE TC USUARIO ::::::::::::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::::: EVENTO DEL BOTON NUEVO :::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_tc_usuario", function(){
        opcion_tc_usuario = 1; // CREAR
        f_limpia_tc_usuario();

        $("#form_tc_usuario").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Usuario");
        $('#modal_crud_tc_usuario').modal('show');	    
    });
    ///::::::::::::::::::::: FIN EVENTO DEL BOTON NUEVO :::::::::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::::::::::::: BOTON EDITAR :::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_tc_usuario", function(){
        opcion_tc_usuario = 2;// EDITAR
        f_limpia_tc_usuario();
        $("#tc_usuario_id").prop('disabled', true);
        fila_tc_usuario         = $(this).closest("tr");	        
        tc_usuario_id           = fila_tc_usuario.find('td:eq(0)').text();
        tc_usuario_ficha        = fila_tc_usuario.find('td:eq(1)').text();
        tc_usuario_categoria1   = fila_tc_usuario.find('td:eq(2)').text();
        tc_usuario_categoria2   = fila_tc_usuario.find('td:eq(3)').text();

        $("#tc_usuario_id").val(tc_usuario_id);
        $("#tc_usuario_ficha").val(tc_usuario_ficha);
        $("#tc_usuario_categoria1").val(tc_usuario_categoria1);
        $("#tc_usuario_categoria2").val(tc_usuario_categoria2);
        
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Usuario");		
    
        $('#modal_crud_tc_usuario').modal('show');		   
    });
    ///::::::::::::::::::::::::::::: FIN BOTON EDITAR :::::::::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::: CREA Y EDITA USUARIO ::::::::::::::::::::::::::::::::::::::::///
    $('#form_tc_usuario').submit(function(e){                         
        let validar_tc_usuario;
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        tc_usuario_id           = $.trim($('#tc_usuario_id').val());
        tc_usuario_ficha        = $.trim($('#tc_usuario_ficha').val());
        tc_usuario_categoria1   = $.trim($('#tc_usuario_categoria1').val());
        tc_usuario_categoria2   = $.trim($('#tc_usuario_categoria2').val());

        validar_tc_usuario = f_validar_tc_usuario(tc_usuario_ficha,tc_usuario_categoria1,tc_usuario_categoria2);
        
        if(validar_tc_usuario == "invalido"){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: '*Falta Completar Información!!!',
              showConfirmButton: false,
              timer: 1500
            })
        }else{
            if(opcion_tc_usuario == 1) {   
                $("#btn_guardar_tc_usuario").prop("disabled",true);
                Accion='crear_tc_usuario'; /// CREAR
                $.ajax({
                    url: "Ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_usuario_id:tc_usuario_id, tc_ficha:tc_usuario_ficha, tc_categoria1:tc_usuario_categoria1, tc_categoria2:tc_usuario_categoria2},    
                    success: function(data) {
                        tabla_tc_usuario.ajax.reload(null, false);
                    }
                });
                $('#modal_crud_tc_usuario').modal('hide');
            } 
            if(opcion_tc_usuario == 2) {   
                $("#btn_guardar_tc_usuario").prop("disabled",true);
                Accion='editar_tc_usuario'; /// EDITAR
                $.ajax({
                    url: "Ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_usuario_id:tc_usuario_id, tc_ficha:tc_usuario_ficha, tc_categoria1:tc_usuario_categoria1, tc_categoria2:tc_usuario_categoria2},    
                    success: function(data) {
                        tabla_tc_usuario.ajax.reload(null, false);
                    }
                });
                $('#modal_crud_tc_usuario').modal('hide');
            } 
        }
        $("#btn_guardar_tc_usuario").prop("disabled",false);
    });
    ///::::::::::::::::::::::FIN CREA Y EDITA USUARIO :::::::::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::::::: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_tc_usuario", function(){
        fila_tc_usuario = $(this);           
        tc_usuario_id = fila_tc_usuario.closest('tr').find('td:eq(0)').text();     
        let rpta_borrar_tc_usuario = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminará el registro "+tc_usuario_id+"!",
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
                rpta_borrar_tc_usuario = 1;
                Accion='borrar_tc_usuario';
                if (rpta_borrar_tc_usuario == 1) {            
                    $.ajax({
                    url: "Ajax.php",
                    type: "POST",
                    datatype:"json",
                    async: false,    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_usuario_id:tc_usuario_id },   
                        success: function(data) {
                            tabla_tc_usuario.row(fila_tc_usuario.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///:::::::::::::::::::::::::::: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::: TERMINO DE BOTONES DE TC USUARIO ::::::::::::::::::::::::::///
});
///::::::::::::::::::::::::::::::: FIN JS DOM TC USUARIO ::::::::::::::::::::::::::::::::::///

///::::::::::::::::::::::::::::::: FUNCIONES TC USUARIO :::::::::::::::::::::::::::::::::::///

///::::::: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO ::::::::::::::::::::::::///
function f_validar_tc_usuario(p_tc_usuario_ficha,p_tc_usuario_categoria1,p_tc_usuario_categoria2){
    f_limpia_tc_usuario();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    let rpta_validar_tc_usuario="";

    if(p_tc_usuario_ficha==""){
        $("#tc_usuario_ficha").addClass("color-error");
        rpta_validar_tc_usuario="invalido";
    }
    if(p_tc_usuario_categoria1==""){
        $("#tc_usuario_categoria1").addClass("color-error");
        rpta_validar_tc_usuario="invalido";
    }
    if(p_tc_usuario_categoria2==""){
        $("#tc_usuario_categoria2").addClass("color-error");
        rpta_validar_tc_usuario="invalido";
    }
    return rpta_validar_tc_usuario;
}

///::::::::::::::::: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO ::::::::::::::::::::/// 
function f_limpia_tc_usuario(){
    $("#tc_usuario_id").removeClass("color-error");
    $("#tc_usuario_ficha").removeClass("color-error");
    $("#tc_usuario_categoria1").removeClass("color-error");
    $("#tc_usuario_categoria2").removeClass("color-error");
}
///::::::::::::: FIN INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO ::::::::::::::::::::/// 

///:::::::::::::::::::::::::: TERMINO FUNCIONES TC USUARIO ::::::::::::::::::::::::::::::::///