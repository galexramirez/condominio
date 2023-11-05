///:: DECLARACION DE VARIABLES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var tc_cta_pagar_id_usuario, ctap_cat1_usuario, ctap_cat2_usuario, ctap_cat3_usuario;
var tabla_tc_cta_pagar_usuario, opcion_tc_cta_pagar_usuario, fila_tc_cta_pagar_usuario;

///:: DOM JS TIPO TABLA TC cta_pagar USUARIO :::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    div_tabla = f_creacion_tabla("tabla_tc_cta_pagar_usuario","");
    $("#div_tabla_tc_cta_pagar_usuario").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_tc_cta_pagar_usuario","");

    $('#tabla_tc_cta_pagar_usuario thead tr')
        .clone(true)
        .addClass('filters_tc_cta_pagar_usuario')
        .appendTo('#tabla_tc_cta_pagar_usuario thead');

    Accion='leer_tc_cta_pagar_usuario';
    tabla_tc_cta_pagar_usuario = $('#tabla_tc_cta_pagar_usuario').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
            api.columns().eq(0).each(function (colIdx) {
                var cell = $('.filters_tc_cta_pagar_usuario th').eq($(api.column(colIdx).header()).index());
                var title = $(cell).text();
                $(cell).html('<input type="text" placeholder="' + title + '" />');
                $('input',$('.filters_tc_cta_pagar_usuario th').eq($(api.column(colIdx).header()).index()) )
                .off('keyup change').on('keyup change', function (e) {e.stopPropagation();
                    $(this).attr('title', $(this).val());
                    var regexr = '({search})';
                    var cursorPosition = this.selectionStart;
                    api.column(colIdx).search(this.value != '' ? regexr.replace('{search}', '(((' + this.value + ')))'): '',this.value != '',this.value == '').draw();
                    $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                });
            });
        },
        
        language    : idioma_espanol,
        responsive  : "true",
        dom         : 'Blfrtip',
        buttons : [
            {
                extend:     'excelHtml5',
                text:       '<i class="fas fa-file-excel"></i> ',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success',
                title       : 'VARIABLES DE USUARIO PARA cta_pagar'
            },
        ],
        "ajax":{            
            "url"       : "ajax.php", 
            "method"    : 'POST',
            "data"      : {MoS:MoS,NombreMoS:NombreMoS,Accion:Accion},
            "dataSrc"   : ""
        },
        "columns"       : columnas_tabla
    });     

    ///:: EVENTO DEL BOTON NUEVO TC cta_pagar ::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_tc_cta_pagar_usuario", function(){
        opcion_tc_cta_pagar_usuario = "CREAR";
        f_limpia_tc_cta_pagar_usuario();
        $("#form_tc_cta_pagar_usuario").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta Variables de Usuario");
        $('#modal_crud_tc_cta_pagar_usuario').modal('show');	    
    });

    ///:: BOTON EDITAR TC cta_pagar ::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_tc_cta_pagar_usuario", function(){
        opcion_tc_cta_pagar_usuario = "EDITAR";
        f_limpia_tc_cta_pagar_usuario();
        $("#tc_cta_pagar_id_usuario").prop('disabled', true);
        fila_tc_cta_pagar_usuario = $(this).closest("tr");	        
        tc_cta_pagar_id_usuario = fila_tc_cta_pagar_usuario.find('td:eq(0)').text();
        ctap_cat1_usuario = fila_tc_cta_pagar_usuario.find('td:eq(1)').text();
        ctap_cat2_usuario = fila_tc_cta_pagar_usuario.find('td:eq(2)').text();
        ctap_cat3_usuario = fila_tc_cta_pagar_usuario.find('td:eq(3)').text();

        $("#tc_cta_pagar_id_usuario").val(tc_cta_pagar_id_usuario);
        $("#ctap_cat2_usuario").val(ctap_cat2_usuario);
        $("#ctap_cat1_usuario").val(ctap_cat1_usuario);
        $("#ctap_cat3_usuario").val(ctap_cat3_usuario);
   
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Variables de Usuario");		
    
        $('#modal_crud_tc_cta_pagar_usuario').modal('show');		   
    });


    ///:: CREA Y EDITA TC cta_pagar ::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $('#form_tc_cta_pagar_usuario').submit(function(e){                   
        let validar_tc_cta_pagar_usuario="";      
        e.preventDefault();

        tc_cta_pagar_id_usuario = $.trim($('#tc_cta_pagar_id_usuario').val());    
        ctap_cat1_usuario = $.trim($('#ctap_cat1_usuario').val());    
        ctap_cat2_usuario = $.trim($('#ctap_cat2_usuario').val());
        ctap_cat3_usuario = $.trim($('#ctap_cat3_usuario').val());
    
        validar_tc_cta_pagar_usuario = f_validar_tc_cta_pagar_usuario(tc_cta_pagar_id_usuario, ctap_cat1_usuario, ctap_cat2_usuario, ctap_cat3_usuario);

        if(validar_tc_cta_pagar_usuario=="invalido") {
            Swal.fire({
                position            : 'center',
                icon                : 'error',
                title               : '*Falta Completar Información!!!',
                showConfirmButton   : false,
                timer               : 1500
            })
        }else{
            if(opcion_tc_cta_pagar_usuario == "CREAR") { Accion = 'crear_tc_cta_pagar_usuario'; }
            if(opcion_tc_cta_pagar_usuario == "EDITAR") { Accion = 'editar_tc_cta_pagar_usuario'; }    
            $.ajax({
                url         : "ajax.php",
                type        : "POST",
                datatype    : "json",    
                data        : { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_cta_pagar_id:tc_cta_pagar_id_usuario, tc_categoria1:ctap_cat1_usuario, tc_categoria2:ctap_cat2_usuario,tc_categoria3:ctap_cat3_usuario },    
                success: function(data) {
                    tabla_tc_cta_pagar_usuario.ajax.reload(null, false);
                }
            });
            } 
            $('#modal_crud_tc_cta_pagar_usuario').modal('hide');
    });
        
    ///:: BOTON BORRAR REGISTRO TC cta_pagar :::::::::::::::::::::::::::::::::::::::::::::///  
    $(document).on("click", ".btn_borrar_tc_cta_pagar_usuario", function(){
        fila_tc_cta_pagar_usuario = $(this);           
        tc_cta_pagar_id_usuario = $(this).closest('tr').find('td:eq(0)').text();     
        rpta_tc_cta_pagar = 0;
        Swal.fire({
            title               : '¿Está seguro?',
            text                : "Se eliminará el registro "+tc_cta_pagar_id_usuario+"!",
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
                rpta_tc_cta_pagar = 1;
                Accion='borrar_tc_cta_pagar_usuario';
                if (rpta_tc_cta_pagar == 1) {            
                    $.ajax({
                    url         : "ajax.php",
                    type        : "POST",
                    datatype    : "json",
                    async       : false,    
                    data        : { MoS:MoS,NombreMoS:NombreMoS,Accion:Accion,tc_cta_pagar_id:tc_cta_pagar_id_usuario },   
                        success: function(data) {
                            tabla_tc_cta_pagar_usuario.row(fila_tc_cta_pagar_usuario.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });

});

///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::::::///
function f_validar_tc_cta_pagar_usuario(p_tc_cta_pagar_id_usuario, p_ctap_cat1_usuario, p_ctap_cat2_usuario, p_ctap_cat3_usuario){
    f_limpia_tc_cta_pagar_usuario();
    let rpta_validar_tc_cta_pagar_usuario="";    

    if(p_ctap_cat1_usuario==""){
        $("#ctap_cat1_usuario").addClass("color-error" );
        rpta_validar_tc_cta_pagar_usuario = "invalido";    
    }
    if(p_ctap_cat2_usuario==""){
        $("#ctap_cat2_usuario").addClass("color-error" );
        rpta_validar_tc_cta_pagar_usuario = "invalido";    
    }
    if(p_ctap_cat3_usuario==""){
        $("#ctap_cat3_usuario").addClass("color-error" );
        rpta_validar_tc_cta_pagar_usuario = "invalido";    
    }

    return rpta_validar_tc_cta_pagar_usuario; 
}

///:: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::::::::::::///
function f_limpia_tc_cta_pagar_usuario(){
    $("#tc_cta_pagar_id_usuario").removeClass("color-error" );
    $("#ctap_cat1_usuario").removeClass("color-error" );
    $("#ctap_cat2_usuario").removeClass("color-error" );
    $("#ctap_cat3_usuario").removeClass("color-error" );
}