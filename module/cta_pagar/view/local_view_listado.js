///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: LISTADO CUENTAS POR PAGAR v 1.0 :::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: FECHA: 2023-11-01 09:50 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: VARIABLES GLOBALES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var tabla_listado_cta_pagar, opcion_listado_cta_pagar, fila_listado_cta_pagar, validar_listado_cta_pagar;
var fecha_inicio_listado, fecha_termino_listado;

fecha_inicio_listado = "";
fecha_termino_listado = "";
mi_carpeta = f_document_root();

///:: JS DOM LISTADO CUENTAS POR PAGAR ::::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){

    if(fecha_inicio_listado=="" && fecha_termino_listado==""){
        fecha_inicio_listado = f_calculo_fecha("hoy","-1 Months");
        fecha_termino_listado = f_calculo_fecha("hoy","0");
        $('#fecha_inicio_listado').val(fecha_inicio_listado);
        $('#fecha_termino_listado').val(fecha_termino_listado);
    }

    // Si hay cambios en el Fecha se ocultan botones y datatable
    $("#fecha_inicio_listado, #fecha_termino_listado").on('change', function () {
        $("#div_tabla_listado_cta_pagar").empty();
    });

    ///:: BOTONES DE LISTADO CUENTAS POR PAGAR ::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON BUSCAR :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_buscar_listado", function(){
        fecha_inicio_listado = $("#fecha_inicio_listado").val();
        fecha_termino_listado = $("#fecha_termino_listado").val();

        ///:: DATATABLE LISTADO CUENTAS POR PAGAR :::::::::::::::::::::::::::::::::::::::::///
        div_tabla = f_creacion_tabla("tabla_listado_cta_pagar","");
        $("#div_tabla_listado_cta_pagar").html(div_tabla);
        columnas_tabla = f_columnas_tabla("tabla_listado_cta_pagar","");

        $("#tabla_listado_cta_pagar").dataTable().fnDestroy();
        $('#tabla_listado_cta_pagar').show();

        // Setup - add a text input to each footer cell
        $('#tabla_listado_cta_pagar thead tr')
            .clone(true)
            .addClass('filters_listado_cta_pagar')
            .appendTo('#tabla_listado_cta_pagar thead');

        Accion = 'leer_listado_cta_pagar';
        tabla_listado_cta_pagar = $('#tabla_listado_cta_pagar').DataTable({
            //Color a las filas
            "rowCallback" : function(row,data,index){
                f_color_filas_listado_cta_pagar(row,data);
              }, 
            //Filtros por columnas
            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function (){
                var api = this.api();
                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters_listado_cta_pagar th').eq($(api.column(colIdx).header()).index());
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    // On every keypress in this input
                    $('input',$('.filters_listado_cta_pagar th').eq($(api.column(colIdx).header()).index()) ).off('keyup change').on('keyup change', function (e) {
                        e.stopPropagation();
                        // Get the search value
                        $(this).attr('title', $(this).val());
                        var regexr = '({search})'; //$(this).parents('th').find('select').val();
                        var cursorPosition = this.selectionStart;
                        // Search the column for that value
                        api.column(colIdx).search(
                            this.value != '' ? regexr.replace('{search}', '(((' + this.value + ')))'): '',
                            this.value != '',
                            this.value == ''
                        ).draw();
                        $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                    });
                });
            },
            deferRender     : true,
            scrollY         : 800,
            scrollCollapse  : true,
            scroller        : true,
            scrollX         : true,
            select          : { style: 'os' },
            fixedColumns    : {
                left: 1
            },
            fixedHeader     : {
                header : false
            },
            pageLength  : 50,
            language    : idioma_espanol,
            responsive  : "true",
            dom         : 'Blfrtip',
            buttons     : [
                {
                    extend      : 'excelHtml5',
                    text        : '<i class="fas fa-file-excel"></i> ',
                    titleAttr   : 'Exportar a Excel',
                    className   : 'btn btn-success',
                    title       : 'Cuentas por Pagar'
                },
            ],
            "ajax"      : {            
                "url"       : "ajax.php", 
                "method"    : 'POST', 
                "data"      : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, fecha_inicio:fecha_inicio_listado, fecha_termino:fecha_termino_listado}, 
                "dataSrc"   : ""
            },
            "columns"   : columnas_tabla,
            "order"     : [[0, 'desc']]
        });     
    });
    ///:: FIN EVENTO DEL BOTON BUSCAR :::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON EDITAR :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_cta_pagar", function(){
    });
    ///:: FIN EVENTO DEL BOTON EDITAR :::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: EVENTO DEL BOTON VER ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///       
    $(document).on("click", ".btn_ver_cta_pagar", function(){
    });
    ///:: FIN EVENTO DEL BOTON VER ;;;:::::::::::::::::::::::::::::::::::::::::::::::::::::///

    ///:: TERMINO DE BOTONES LISTADO CUENTAS PAGAR ::::::::::::::::::::::::::::::::::::::::///
});
///:: TERMINO JS DOM DOM LISTADO CUENTAS PAGAR ::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCIONES DE LISTADO CUENTAS PAGAR ::::::::::::::::::::::::::::::::::::::::::::::::::///

function f_color_filas_listado_cta_pagar(row,data){
    let color;
    // Columna Estado
    switch(data.dpag_estado)
    {
        case "CERRADO":
            color = "#53A258";
        break;
        case "OBSERVADO":
            color = "#EC515D";
        break;
        case "ANULADO":
            color = "#00A3D6";
        break;
        case "ABIERTO":
            color = "#FF9D0A";
        break;
        case "PENDIENTE CT":
            color = "#EC515D";
        break;
    }
    $("td:eq(2)",row).css({
      "color":color,
      "font-weight":"bold",
    });
}
