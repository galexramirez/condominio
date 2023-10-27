///:: DECLARACION DE VARIABLES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var tc_condominio_id_usuario, cond_cat1_usuario, cond_cat2_usuario, cond_cat3_usuario;
var tabla_tc_condominio_usuario, opcion_tc_condominio_usuario, fila_tc_condominio_usuario;

///:: DOM JS TIPO TABLA TC CONDOMINIO USUARIO :::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    div_tabla = f_creacion_tabla("tabla_tc_condominio_usuario","");
    $("#div_tabla_tc_condominio_usuario").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_tc_condominio_usuario","");

    $('#tabla_tc_condominio_usuario thead tr')
        .clone(true)
        .addClass('filters_tc_condominio_usuario')
        .appendTo('#tabla_tc_condominio_usuario thead');

    Accion='leer_tc_condominio_usuario';
    tabla_tc_condominio_usuario = $('#tabla_tc_condominio_usuario').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
            api.columns().eq(0).each(function (colIdx) {
                var cell = $('.filters_tc_condominio_usuario th').eq($(api.column(colIdx).header()).index());
                var title = $(cell).text();
                $(cell).html('<input type="text" placeholder="' + title + '" />');
                $('input',$('.filters_tc_condominio_usuario th').eq($(api.column(colIdx).header()).index()) )
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
                title       : 'VARIABLES DE USUARIO PARA CONDOMINIO'
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

    ///:: EVENTO DEL BOTON NUEVO TC condominio ::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_tc_condominio_usuario", function(){
        opcion_tc_condominio_usuario = "CREAR";
        f_limpia_tc_condominio_usuario();
        $("#form_tc_condominio_usuario").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta Variables de Usuario");
        $('#modal_crud_tc_condominio_usuario').modal('show');	    
    });

    ///:: BOTON EDITAR TC condominio ::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_tc_condominio_usuario", function(){
        opcion_tc_condominio_usuario = "EDITAR";
        f_limpia_tc_condominio_usuario();
        $("#tc_condominio_id_usuario").prop('disabled', true);
        fila_tc_condominio_usuario = $(this).closest("tr");	        
        tc_condominio_id_usuario = fila_tc_condominio_usuario.find('td:eq(0)').text();
        cond_cat1_usuario = fila_tc_condominio_usuario.find('td:eq(1)').text();
        cond_cat2_usuario = fila_tc_condominio_usuario.find('td:eq(2)').text();
        cond_cat3_usuario = fila_tc_condominio_usuario.find('td:eq(3)').text();

        $("#tc_condominio_id_usuario").val(tc_condominio_id_usuario);
        $("#cond_cat2_usuario").val(cond_cat2_usuario);
        $("#cond_cat1_usuario").val(cond_cat1_usuario);
        $("#cond_cat3_usuario").val(cond_cat3_usuario);
   
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Variables de Usuario");		
    
        $('#modal_crud_tc_condominio_usuario').modal('show');		   
    });


    ///:: CREA Y EDITA TC condominio ::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $('#form_tc_condominio_usuario').submit(function(e){                   
        let validar_tc_condominio_usuario="";      
        e.preventDefault();

        tc_condominio_id_usuario = $.trim($('#tc_condominio_id_usuario').val());    
        cond_cat1_usuario = $.trim($('#cond_cat1_usuario').val());    
        cond_cat2_usuario = $.trim($('#cond_cat2_usuario').val());
        cond_cat3_usuario = $.trim($('#cond_cat3_usuario').val());
    
        validar_tc_condominio_usuario = f_validar_tc_condominio_usuario(tc_condominio_id_usuario, cond_cat1_usuario, cond_cat2_usuario, cond_cat3_usuario);

        if(validar_tc_condominio_usuario=="invalido") {

        }else{
            if(opcion_tc_condominio_usuario == "CREAR") { Accion = 'crear_tc_condominio_usuario'; }
            if(opcion_tc_condominio_usuario == "EDITAR") { Accion = 'editar_tc_condominio_usuario'; }    
            $.ajax({
                url         : "ajax.php",
                type        : "POST",
                datatype    : "json",    
                data        : { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tc_condominio_id:tc_condominio_id_usuario, tc_categoria1:cond_cat1_usuario, tc_categoria2:cond_cat2_usuario,tc_categoria3:cond_cat3_usuario },    
                success: function(data) {
                    tabla_tc_condominio_usuario.ajax.reload(null, false);
                }
            });
            } 
            $('#modal_crud_tc_condominio_usuario').modal('hide');
    });
        
    ///:: BOTON BORRAR REGISTRO TC condominio :::::::::::::::::::::::::::::::::::::::::::::///  
    $(document).on("click", ".btn_borrar_tc_condominio_usuario", function(){
        fila_tc_condominio_usuario = $(this);           
        tc_condominio_id_usuario = $(this).closest('tr').find('td:eq(0)').text();     
        rpta_tc_condominio = 0;
        Swal.fire({
            title               : '¿Está seguro?',
            text                : "Se eliminará el registro "+tc_condominio_id_usuario+"!",
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
                rpta_tc_condominio = 1;
                Accion='borrar_tc_condominio_usuario';
                if (rpta_tc_condominio == 1) {            
                    $.ajax({
                    url         : "ajax.php",
                    type        : "POST",
                    datatype    : "json",
                    async       : false,    
                    data        : { MoS:MoS,NombreMoS:NombreMoS,Accion:Accion,tc_condominio_id:tc_condominio_id_usuario },   
                        success: function(data) {
                            tabla_tc_condominio_usuario.row(fila_tc_condominio_usuario.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });

});

///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::::::///
function f_validar_tc_condominio_usuario(p_tc_condominio_id_usuario, p_cond_cat1_usuario, p_cond_cat2_usuario, p_cond_cat3_usuario){
    f_limpia_tc_condominio_usuario();
    let rpta_validar_tc_condominio_usuario="";    

    if(p_cond_cat1_usuario==""){
        $("#cond_cat1_usuario").addClass("color-error" );
        rpta_validar_tc_condominio_usuario = "invalido";    
    }
    if(p_cond_cat2_usuario==""){
        $("#cond_cat2_usuario").addClass("color-error" );
        rpta_validar_tc_condominio_usuario = "invalido";    
    }
    if(p_cond_cat3_usuario==""){
        $("#cond_cat3_usuario").addClass("color-error" );
        rpta_validar_tc_condominio_usuario = "invalido";    
    }

    return rpta_validar_tc_condominio_usuario; 
}

///:: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::::::::::::::::::///
function f_limpia_tc_condominio_usuario(){
    $("#tc_condominio_id_usuario").removeClass("color-error" );
    $("#cond_cat1_usuario").removeClass("color-error" );
    $("#cond_cat2_usuario").removeClass("color-error" );
    $("#cond_cat3_usuario").removeClass("color-error" );
}