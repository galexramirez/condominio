///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///::::::::::::::::::::::::::::: TIPO DE CAMBIO v 3.0 :::::::::::::::::::::::::::::::::::::///
///:::::::::::::::::::: CREAR EDITAR BORRAR TIPO CAMBIO :::::::::::::::::::::::::::::::::::///
///:::::::::::: FECHA: 2022-10-27 15:50 :::::::::::::::::::::::::::::::::::::::::::::::::::///

///::::::::::::::::::::::::::: DECLARACION DE VARIABLES :::::::::::::::::::::::::::::::::::///
var tipo_cambio_id, tcam_fecha, tcam_moneda, tcam_tipo, tcam_valor;
var tcam_url, tcam_fecha_inicio, tcam_fecha_fin, tcam_moneda_carga;
var opcion_tipo_cambio, fila_tipo_cambio;

///::::::::::::::::::::::::::::::::::JS DOM TIPO CAMBIO :::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    ///:::::::::::::::::::: SE CREA LOS BOTONES DE TIPO CAMBIO ::::::::::::::::::::::::::::///
    div_boton = f_botones_formulario("form_seleccion_tipo_cambio","btn_seleccion_tipo_cambio");
    $("#div_btn_seleccion_tipo_cambio").html(div_boton);

    ///:::::::::::::::::::::::: DATATABLE TIPO CAMBIO :::::::::::::::::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_tipo_cambio","");
    $("#div_tabla_tipo_cambio").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_tipo_cambio","");

    Accion='leer_tipo_cambio';
    tabla_tipo_cambio = $('#tabla_tipo_cambio').DataTable({
        language: idioma_espanol,
        responsive: "true",
        dom: 'Blfrtip',
        buttons:[
            {
                extend:     'excelHtml5',
                text:       '<i class="fas fa-file-excel"></i> ',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success',
                title:      'Tipo de Cambio'
            },
        ],
        "ajax":{            
                "url": "ajax.php", 
                "method": 'POST', //usamos el metodo POST
                "data":{MoS:MoS, NombreMoS:NombreMoS, Accion:Accion}, //enviamos opcion 4 para que haga un SELECT
                "dataSrc":""
                },
        "columns":columnas_tabla,
        "order": [[1, 'desc']]
    });     

    ///::::::::::::::::::::::::::::::: BOTONES DE TIPO DE CAMBIO ::::::::::::::::::::::::::///
    
    ///::::::::::::::::::::::::::::: CREA Y EDITA TIPO CAMBIO :::::::::::::::::::::::::::::///
    $('#form_tipo_cambio').submit(function(e){
        e.preventDefault(); 
        let validar_tipo_cambio = "";
        tipo_cambio_id  = $.trim($('#tipo_cambio_id').val());    
        tcam_fecha      = $.trim($('#tcam_fecha').val());
        tcam_moneda     = $.trim($('#tcam_moneda').val());    
        tcam_tipo       = $.trim($('#tcam_tipo').val());
        tcam_valor      = $.trim($('#tcam_valor').val());

        validar_tipo_cambio = f_validar_tipo_cambio(tcam_fecha,tcam_moneda,tcam_tipo,tcam_valor);

        if(opcion_tipo_cambio == 1) {
            if(validar_tipo_cambio!="invalido") {   
                $("#btn_guardar_tipo_cambio").prop("disabled",true);
                Accion='crear_tipo_cambio'; /// CREAR
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tcam_fecha:tcam_fecha, tcam_moneda:tcam_moneda, tcam_tipo:tcam_tipo, tcam_valor:tcam_valor},
                    success: function(data) {
                        tabla_tipo_cambio.ajax.reload(null, false);
                    }
                });
                $('#modal_crud_tipo_cambio').modal('hide');
            } 
        }
        if(opcion_tipo_cambio == 2) {
            $("#btn_guardar_tipo_cambio").prop("disabled",true);
            if(validar_tipo_cambio!="invalido") {   
                Accion='editar_tipo_cambio';  /// EDITAR
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tipo_cambio_id:tipo_cambio_id, tcam_fecha:tcam_fecha, tcam_moneda:tcam_moneda, tcam_tipo:tcam_tipo,tcam_valor:tcam_valor},
                    success: function(data) {
                        tabla_tipo_cambio.ajax.reload(null, false);
                    }
                });
                $('#modal_crud_tipo_cambio').modal('hide');
            } 
        }
        $("#btn_guardar_tipo_cambio").prop("disabled",false);
    });
    ///::::::::::::::::::::::::: FIN CREA Y EDITA TIPO CAMBIO :::::::::::::::::::::::::::::///
    
    ///::::::::::::::::::::::::: CREA IMPORTA TIPO CAMBIO :::::::::::::::::::::::::::::::::///
    $('#form_importar_tipo_cambio').submit(function(e){ 
        e.preventDefault();
        let validar_importar_tipo_cambio = "";
        tcam_url            = $.trim($('#tcam_url').val());    
        tcam_fecha_inicio   = $.trim($('#tcam_fecha_inicio').val());
        tcam_fecha_fin      = $.trim($('#tcam_fecha_fin').val());    
        tcam_moneda_carga   = $.trim($('#tcam_moneda_carga').val());    

        validar_importar_tipo_cambio = f_validar_importar_tipo_cambio(tcam_url, tcam_fecha_inicio, tcam_fecha_fin, tcam_moneda_carga);

        if(validar_importar_tipo_cambio!="invalido") {
            $("#btn_cargar_tipo_cambio").prop("disabled",true);
            Accion='importar_tipo_cambio';
            $.ajax({
                url: "ajax.php",
                type: "POST",
                datatype:"json",    
                data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tcam_url:tcam_url, tcam_fecha_inicio:tcam_fecha_inicio, tcam_fecha_fin:tcam_fecha_fin, tcam_moneda:tcam_moneda_carga},
                success: function(data) {
                    tabla_tipo_cambio.ajax.reload(null, false);
                }
            });
            $('#modal_crud_importar_tipo_cambio').modal('hide');
            $("#btn_cargar_tipo_cambio").prop("disabled",false);
        } 
    });
    ///::::::::::::::::::::: FIN CREA IMPORTA TIPO CAMBIO :::::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::::::::: EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo_tipo_cambio", function(){
        opcion_tipo_cambio = 1; // CREAR 
        f_limpia_tipo_cambio();

        $("#form_tipo_cambio").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text( "Alta de Tipo de Cambio");
        $("#modal_crud_tipo_cambio").modal("show");	    
    });
    ///:::::::::::::::::::::::::: FIN EVENTO DEL BOTON NUEVO ::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::: EVENTO DEL BOTON CARGAR URL :::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_importar_tipo_cambio", function(){
        tcam_url = "https://estadisticas.bcrp.gob.pe/estadisticas/series/api/PD04637PD-PD04638PD/json/";
        tcam_fecha_inicio = "";
        tcam_fecha_fin = "";
        tcam_moneda_carga = "DOLARES";

        f_limpia_importar_tipo_cambio();
        $("#form_importar_tipo_cambio").trigger("reset");
        $("#tcam_url").val(tcam_url);
        $("#tcam_fecha_inicio").val(tcam_fecha_inicio);
        $("#tcam_fecha_fin").val(tcam_fecha_fin);
        $("#tcam_moneda_carga").val(tcam_moneda_carga);

        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text( "Importar Tipo de Cambio");

        $("#modal_crud_importar_tipo_cambio").modal("show");	    
    });
    ///::::::::::::::::::::::FIN  EVENTO DEL BOTON CARGAR URL :::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::::::::::::: BOTON EDITAR :::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_editar_tipo_cambio", function(){
        opcion_tipo_cambio = 2;// Editar
        f_limpia_tipo_cambio();

        fila_tipo_cambio    = $(this).closest("tr");	        
        tipo_cambio_id      = fila_tipo_cambio.find('td:eq(0)').text();
        tcam_fecha          = fila_tipo_cambio.find('td:eq(1)').text();
        tcam_moneda         = fila_tipo_cambio.find('td:eq(2)').text();
        tcam_tipo           = fila_tipo_cambio.find('td:eq(3)').text();
        tcam_valor          = fila_tipo_cambio.find('td:eq(4)').text();

        $("#tipo_cambio_id").val(tipo_cambio_id);
        $("#tcam_fecha").val(tcam_fecha);
        $("#tcam_moneda").val(tcam_moneda);
        $("#tcam_tipo").val(tcam_tipo);
        $("#tcam_valor").val(tcam_valor);
    
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Tipo de Cambio");		

        $('#modal_crud_tipo_cambio').modal('show');		   
    });

    ///:::::::::::::::::::::::: BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar_tipo_cambio", function(){
        fila_tipo_cambio = $(this);           
        tipo_cambio_id = fila_tipo_cambio.closest('tr').find('td:eq(0)').text();     

        rpta_borrar_tipo_cambio = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminara el ID "+tipo_cambio_id+"!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Eliminado!',
                    'El Id ha sido eliminado.',
                    'success'
                )
                rpta_borrar_tipo_cambio = 1;
                if (rpta_borrar_tipo_cambio == 1) {            
                    Accion='borrar_tipo_cambio';
                    $.ajax({
                        url: "ajax.php",
                        type: "POST",
                        datatype:"json",    
                        data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tipo_cambio_id:tipo_cambio_id },   
                        success: function() {
                            tabla_tipo_cambio.row(fila_tipo_cambio.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///:::::::::::::::::::::::: FIN BOTON BORRAR REGISTRO :::::::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::::::::::: BOTONES DE TIPO DE CAMBIO ::::::::::::::::::::::::::///
});
///::::::::::::::::::::::::::::: FIN JS DOM TIPO CAMBIO :::::::::::::::::::::::::::::::::::///

///:::::::::::::::::::::::::::::: FUNCIONES TIPO DE CAMBIO ::::::::::::::::::::::::::::::::///

///:::::::::::: FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO :::::::::::::::::::///
function f_validar_tipo_cambio(tcam_fecha,tcam_moneda,tcam_tipo,tcam_valor){
    f_limpia_tipo_cambio();

    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    var rpta_validar_tipo_cambio="";    

    if(tcam_fecha=="" ){
  
        rpta_validar_tipo_cambio="invalido";
    }
    
    if(tcam_moneda=="" || tcam_moneda.length>15  ){

        rpta_validar_tipo_cambio="invalido";
    }

    if(tcam_tipo==""  ||  tcam_moneda.length>15  ){

        rpta_validar_tipo_cambio="invalido";
    }

    if(tcam_valor==""  ){

        rpta_validar_tipo_cambio="invalido";
    }
    return rpta_validar_tipo_cambio; 
}
///:::::::::::: FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO :::::::::::::::::::///

///:::::::::::: FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO :::::::::::::::::::///
function f_validar_importar_tipo_cambio(p_tcam_url, p_tcam_fecha_inicio, p_tcam_fecha_fin, p_tcam_moneda_carga){
    f_limpia_importar_tipo_cambio();

    NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
    var rpta_validar_importar_tipo_cambio="";    

    if(p_tcam_url=="" ){
        $("#tcam_url").addClass("color-error");  
        rpta_validar_importar_tipo_cambio="invalido";
    }
    
    if(p_tcam_fecha_inicio==""  ){
        $("#tcam_fecha_inicio").addClass("color-error");  
        rpta_validar_importar_tipo_cambio="invalido";
    }

    if(p_tcam_fecha_fin==""  ){
        $("#tcam_fecha_fin").addClass("color-error");  
        rpta_validar_importar_tipo_cambio="invalido";
    }

    if(p_tcam_fecha_inicio=="" && p_tcam_fecha_fin=="" ){
        $("#tcam_fecha_inicio").addClass("color-error");  
        $("#tcam_fecha_fin").addClass("color-error");  
        rpta_validar_importar_tipo_cambio="invalido";
    }

    if(p_tcam_moneda_carga==""  ){
        $("#tcam_moneda_carga").addClass("color-error");  
        rpta_validar_importar_tipo_cambio="invalido";
    }

    return rpta_validar_importar_tipo_cambio; 
}
///:::::::::::: FUNCION PARA VALIDAR LOS DATSO INGRESADOS AL FORMULARIO :::::::::::::::::::///

///:::::::::::::::::: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::/// 
function f_limpia_tipo_cambio(){

}
///:::::::::::::::::: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::/// 

///:::::::::::::::::: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::/// 
function f_limpia_importar_tipo_cambio(){
    $("#tcam_url").removeClass("color-error");
    $("#tcam_fecha_inicio").removeClass("color-error");
    $("#tcam_fecha_fin").removeClass("color-error");
    $("#tcam_moneda_carga").removeClass("color-error");
}
///:::::::::::::::::: INVISIBILIZA LOS MENSAJE DE ALERTA DEL FORMULARIO :::::::::::::::::::/// 

///:::::::::::::::::::::: TERMINO FUNCIONES TIPO DE CAMBIO ::::::::::::::::::::::::::::::::///