///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///::::::::::::::::::::::: MAESTRO v 3.0 FECHA: 25-10-2022 ::::::::::::::::::::::::::::::::///
///::::::::::::::::::: CREAR EVENTOS, EDITAR COLABORADORES ::::::::::::::::::::::::::::::::///
///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///::::::::::::::::::::::::::::::: Declaracion de Variables :::::::::::::::::::::::::::::::///
var opcion_maestro, tabla_maestro, foto_editar, fila_maestro;

///:::::::::::::::::::::::::::::::: JS DOM MAESTRO ::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
    div_boton = f_botones_formulario("form_seleccion_maestro","btn_seleccion_maestro");
    $("#div_btn_seleccion_maestro").html(div_boton);

    ///::::::::: COLOCA EL NOMBRE DEL ARCHIVO EN EL INPUT FILE ::::::::::::::::::::::::::::///
    $(document).on('change', '#maes_fotografia', function (event) {
        foto_editar = "";
        let nombre_archivo = event.target.files[0].name;
        let extension = nombre_archivo.split('.').pop();
        $("#label_maes_fotografia").text(nombre_archivo);
        
        let archivo = event.target.files[0];
        let reader = new FileReader();
        if (archivo) {
          reader.readAsDataURL(archivo );
          reader.onloadend = function () {
            foto_editar='<img src="' + reader.result + '" height="215px" width="220px" alt="" />';
            $("#div_fotografia_maestro").html(foto_editar);
          }
        }
    }); 

    ///::::::::::::::::::::::: CREACION DE DATATABLE MAESTRO ::::::::::::::::::::::::::::::///
    div_tabla = f_creacion_tabla("tabla_maestro","");
    $("#div_tabla_maestro").html(div_tabla);
    columnas_tabla = f_columnas_tabla("tabla_maestro","");

    Accion = 'leer_maestro';
    tabla_maestro = $('#tabla_maestro').DataTable({
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
        "method": 'POST', //usamos el metodo POST
        "data":{ MoS:MoS,NombreMoS:NombreMoS,Accion:Accion }, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns": columnas_tabla,
    "order": [[1, 'asc']]
    });     

    ///::::::::::::::::::::::::::::::: BOTONES DE MAESTRO :::::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::::: CREA Y EDITA MAESTRO ::::::::::::::::::::::::::::::::::::///
    $('#form_maestro').submit(function(e){                         
        e.preventDefault();
        let valida_fotografia ="";
        let valida_maestro = "";
        valida_fotografia = document.getElementById('maes_fotografia').value;

        maestro_id              = $.trim($('#maestro_id').val());    
        maes_apellidos_nombres  = $.trim($('#maes_apellidos_nombres').val());
        maes_cargo_actual       = $.trim($('#maes_cargo_actual').val());    
        maes_estado             = $.trim($('#maes_estado').val());    
        maes_fecha_ingreso      = $.trim($('#maes_fecha_ingreso').val());
        maes_fecha_cese         = $.trim($('#maes_fecha_cese').val());  
        maes_email              = $.trim($('#maes_email').val());
        maes_direccion          = $.trim($('#maes_direccion').val());
        maes_distrito           = $.trim($('#maes_distrito').val());
        maes_perfil_evaluacion  = $.trim($('#maes_perfil_evaluacion').val());
    
        valida_maestro = f_validar_maestro(maestro_id, maes_apellidos_nombres, maes_cargo_actual, maes_estado, maes_fecha_ingreso,maes_fecha_cese, maes_email, maes_direccion, maes_distrito, maes_perfil_evaluacion);
        if(maes_fecha_cese=="") {
            maes_fecha_cese = "NULL";
        }else{
            maes_fecha_cese = "'"+maes_fecha_cese+"'";
        }

        if(valida_maestro=="invalido"){
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '*Falta Completar Información!!!',
                showConfirmButton: false,
                timer: 1500
              })
        }else{
            $("#btn_guardar_maestro").prop("disabled",true);
            if(opcion_maestro = 1) {   /// CREAR
                Accion = 'crear_maestro';
                $("#btn_guardar_maestro").prop("disabled",true);
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS,NombreMoS:NombreMoS,Accion:Accion,maestro_id:maestro_id,maes_apellidos_nombres:maes_apellidos_nombres,maes_cargo_actual:maes_cargo_actual,maes_estado:maes_estado,maes_fecha_ingreso:maes_fecha_ingreso,maes_fecha_cese:maes_fecha_cese,maes_email:maes_email,maes_direccion:maes_direccion,maes_distrito:maes_distrito,maes_perfil_evaluacion:maes_perfil_evaluacion},    
                    success: function(data) {
                        if(valida_fotografia.length>0){
                            f_grabar_fotografia(maestro_id);
                        }
                        tabla_maestro.ajax.reload(null, false);
                    }
                });
                $('#modal_crud').modal('hide');
            } 
            if(opcion_maestro = 2) {   /// EDITAR
                Accion = 'editar_maestro';
                $("#btn_guardar_maestro").prop("disabled",true);
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS,NombreMoS:NombreMoS,Accion:Accion,maestro_id:maestro_id,maes_apellidos_nombres:maes_apellidos_nombres,maes_cargo_actual:maes_cargo_actual,maes_estado:maes_estado,maes_fecha_ingreso:maes_fecha_ingreso,maes_fecha_cese:maes_fecha_cese,maes_email:maes_email,maes_direccion:maes_direccion,maes_distrito:maes_distrito,maes_perfil_evaluacion:maes_perfil_evaluacion},    
                    success: function(data) {
                        if(valida_fotografia.length>0){
                            f_grabar_fotografia(maestro_id);
                        }
                        tabla_maestro.ajax.reload(null, false);
                    }
                });
                $('#modal_crud').modal('hide');
            } 
            $("#btn_guardar_maestro").prop("disabled",false);
        }
    });

    ///::::::::::::::::::::::::::::: BOTON NUEVO REGISTRO::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_nuevo", function(){		        
        opcion_maestro = 1; // CREAR
        f_limpia_maestro();          
        f_combos_maestro();
        $("#maestro_id").prop('disabled', false);
        $("#form_maestro").trigger("reset");
        
        foto_editar='<img src="module/maestro/view/img/usuario.png" height="215px" width="220px" alt="" />';
        $("#div_fotografia_maestro").html(foto_editar);
        $("#label_maes_fotografia").text("Seleccionar Archivo .jpg o .bmp");

        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Maestro");
        $('#modal_crud').modal('show');
    });
    ///::::::::::::::::::::::::: FIN BOTON NUEVO REGISTRO :::::::::::::::::::::::::::::::::///

    ///::::::::::::::::::::::::: BOTON EDITAR MAESTRO :::::::::::::::::::::::::::::::::::::///       
    $(document).on("click", ".btn_editar", function(){		        
        let foto_maestro="";
        foto_editar="";
        opcion_maestro = 2;// Editar
        f_limpia_maestro();
        f_combos_maestro();
        $("#maestro_id").prop('disabled', true);
        $("#form_maestro").trigger("reset");
        fila_maestro = $(this).closest("tr");

        maestro_id              = fila_maestro.find('td:eq(0)').text();
        maes_apellidos_nombres  = fila_maestro.find('td:eq(1)').text();
        maes_cargo_actual       = fila_maestro.find('td:eq(2)').text();
        maes_estado             = fila_maestro.find('td:eq(3)').text();
        maes_fecha_ingreso      = fila_maestro.find('td:eq(4)').text();
        maes_fecha_cese         = fila_maestro.find('td:eq(5)').text();
        maes_email              = fila_maestro.find('td:eq(6)').text();
        maes_direccion          = fila_maestro.find('td:eq(7)').text();
        maes_distrito           = fila_maestro.find('td:eq(8)').text();
        maes_perfil_evaluacion  = fila_maestro.find('td:eq(9)').text();

        $("#maestro_id").val(maestro_id);
        $("#maes_apellidos_nombres").val(maes_apellidos_nombres);
        $("#maes_cargo_actual").val(maes_cargo_actual);
        $("#maes_estado").val(maes_estado);
        $("#maes_fecha_ingreso").val(maes_fecha_ingreso);
        $("#maes_fecha_cese").val(maes_fecha_cese);
        $("#maes_email").val(maes_email);
        $("#maes_direccion").val(maes_direccion);
        $("#maes_distrito").val(maes_distrito);
        $("#maes_perfil_evaluacion").val(maes_perfil_evaluacion);
    
        foto_maestro = f_buscar_fotografia(maestro_id);
        if(foto_maestro == ""){
            foto_editar = '<img src="module/maestro/view/img/usuario.png" height="215px" width="220px" alt="" />';        
        }else{
            foto_editar = '<img src="' + foto_maestro + '" height="215px" width="220px" alt="" />';
        }
        $("#div_fotografia_maestro").html(foto_editar);
        $("#label_maes_fotografia").text("Seleccionar Archivo .jpg o .bmp");

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Maestro");		
        $('#modal_crud').modal('show');		   
    });
    ///::::::::::::::::::::: FIN BOTON EDITAR MAESTRO :::::::::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::::  BOTON BORRAR REGISTRO  ::::::::::::::::::::::::::::::::::///
    $(document).on("click", ".btn_borrar", function(){
        fila_maestro = $(this);           
        maestro_id = $(this).closest('tr').find('td:eq(0)').text();     
        let rpta_borrar_maestro = 0;
        Swal.fire({
            title: '¿Está seguro?',
            text: "Se eliminara el registro "+maestro_id+"!",
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
                rpta_borrar_maestro = 1;
                Accion='borrar_maestro';
                if (rpta_borrar_maestro == 1) {            
                    $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, maestro_id:maestro_id },   
                        success: function() {
                        tabla_maestro.row(fila_maestro.parents('tr')).remove().draw();
                        }
                    });
                }
            }
        });
    });
    ///:::::::::::::::::::::: FIN BOTON BORRAR REGISTRO  ::::::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::::: BOTON FOTOGRAFIA ::::::::::::::::::::::::::::::::::::::::///       
    $(document).on("click", ".btn_fotografia", function(){		        
        let imagen = "";
        let img_fotografia;
        fila_maestro = $(this).closest("tr");	        
        maestro_id = fila_maestro.find('td:eq(0)').text();
        imagen = f_buscar_fotografia(maestro_id);
        if(imagen==""){
            Swal.fire({
                icon: 'error',
                title: 'FOTOGRAFIA...',
                text: '*NO se ha registrado la fotografia del colaborador!'
            });
        }else{
            img_fotografia = '<img src="' + imagen + '" height="370px" width="390px" alt="" />';
            $("#div_mostrar_fotografia").html(img_fotografia);                  
            $(".modal-header").css("background-color", "#007bff");
            $(".modal-header").css("color", "white" );
            $(".modal-title").text("Fotografia de Maestro");		
            $('#modal_crud_fotografia').modal('show');		   
        }
    });
    ///:::::::::::::::::::::::: FIN BOTON FOTOGRAFIA ::::::::::::::::::::::::::::::::::::::///

    ///:::::::::::::::::::::::::: TERMINO BOTONES DE MAESTRO ::::::::::::::::::::::::::::::///
});    
///::::::::::::::::::::::::::::::: TERMINO DE JS DOM MAESTRO ::::::::::::::::::::::::::::::///



///:::::::::::::::::::::::::::::::::: FUNCIONES DE MAESTRO ::::::::::::::::::::::::::::::::///

///:::::::::::: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::///
function f_validar_maestro(p_maestro_id, p_maes_apellidos_nombres, p_maes_cargo_actual, p_maes_estado, p_maes_fecha_ingreso, p_maes_fecha_cese, p_maes_email, p_maes_direccion, p_maes_distrito,  p_maes_perfil_evaluacion){
    f_limpia_maestro();
    NoLetrasMayuscEspacio=/[^A-Z \Ñ \Ä \Ë \Ö \Ü \Á \É \Í \Ó \Ú]/;
    let rpta_validar_maestro="";    

    if(p_maestro_id=="" || isNaN(p_maestro_id)){
        $("#maestro_id").addClass("color-error");
        rpta_validar_maestro = "invalido";
    }
    
    if(p_maes_apellidos_nombres==""){
        $("#maes_apellidos_nombres").addClass("color-error");
        rpta_validar_maestro = "invalido";
    }

    if(p_maes_cargo_actual==""){
        $("#maes_cargo_actual").addClass("color-error");
        rpta_validar_maestro = "invalido";
    }

    if(p_maes_estado=="" || NoLetrasMayuscEspacio.test(p_maes_estado)){
        $("#maes_estado").addClass("color-error");
        rpta_validar_maestro = "invalido";
    }

    if(p_maes_fecha_ingreso==""){
        $("#maes_fecha_ingreso").addClass("color-error");
        rpta_validar_maestro = "invalido";
    }

    return rpta_validar_maestro; 
}
///:::::::::::: FIN FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::///

///::::::::::::::::: CAMBIA EL COLOR DE COMPOS OBSERVADOS EN LA VALIDACION ::::::::::::::::/// 
function f_limpia_maestro(){
    $("#maestro_id").removeClass("color-error");
    $("#maes_apellidos_nombres").removeClass("color-error");
    $("#maes_cargo_actual").removeClass("color-error");
    $("#maes_estado").removeClass("color-error");
    $("#maes_fecha_ingreso").removeClass("color-error");
    $("#maes_fecha_cese").removeClass("color-error");
    $("#maes_email").removeClass("color-error");
    $("#maes_direccion").removeClass("color-error");
    $("#maes_distrito").removeClass("color-error");
    $("#maes_perfil_evaluacion").removeClass("color-error");
}
///:::::::::::::: FIN CAMBIA EL COLOR DE COMPOS OBSERVADOS EN LA VALIDACION :::::::::::::::/// 

///::::::::::::::::::::::::::::::::: BUSCAR FOTOGRAFIA ::::::::::::::::::::::::::::::::::::///
function f_buscar_fotografia(p_maestro_id){
    let img = "";
    Accion='fotografia_maestro';
    $.ajax({
        url: "ajax.php",
        type: "POST",
        datatype:"json",    
        async: false,   
        data:  { MoS:MoS,NombreMoS:NombreMoS,Accion:Accion,maestro_id:p_maestro_id },
        success: function(data) {
            data = $.parseJSON(data);
            $.each(data, function(idx, obj){ 
                if(obj.b64_foto){
                    img  = 'data:image/jpg;base64,' + obj.b64_foto;
                }
            });
        }
    });	
    return img;
}
///::::::::::::::::::::::::::::: FIN BUSCAR FOTOGRAFIA ::::::::::::::::::::::::::::::::::::///

///:::::::::::::::::::::::::::::::::: GRABAR FOTOGRAFIA :::::::::::::::::::::::::::::::::::///
function f_grabar_fotografia(maestro_id){
    let blobFile = $('#maes_fotografia')[0].files[0];
    let formData = new FormData();
    Accion='grabar_fotografia';

    formData.append("MoS", MoS);
    formData.append("NombreMoS", NombreMoS);
    formData.append("Accion", Accion);
    formData.append("maestro_id", maestro_id);
    formData.append("maes_fotografia", blobFile);
    $.ajax({
        url: "ajax.php",
        type: "POST",
        datatype:"json",    
        data:  formData,   
        contentType:false,
        processData:false,
        success: function(data) {
        }
    });	
}
///::::::::::::::::::::::::::::::: FIN GRABAR FOTOGRAFIA ::::::::::::::::::::::::::::::::::///

///::::::::::::::::::::::::::: GENERA LOS COMBOS DE MAESTRO :::::::::::::::::::::::::::::::///
function f_combos_maestro(){
    let select_html_maestro="";
    
    select_html_maestro = f_select_categoria("glo_tc_maestro","MAESTRO","ESTADO");
    $("#maes_estado").html(select_html_maestro);

    select_html_maestro = f_select_categoria("glo_tc_maestro","MAESTRO","CARGO");
    $("#maes_cargo_actual").html(select_html_maestro);

    select_html_maestro = f_select_categoria("glo_tc_maestro","MAESTRO","PERFIL");
    $("#maes_perfil_evaluacion").html(select_html_maestro);

    select_html_maestro = f_select_categoria("glo_tc_maestro","MAESTRO","DISTRITO");
    $("#maes_distrito").html(select_html_maestro);

}
///::::::::::::::::::::::: FIN GENERA LOS COMBOS DE MAESTRO :::::::::::::::::::::::::::::::///

///:::::::::::::::::::::::::: TERMINO FUNCIONES DE MAESTRO ::::::::::::::::::::::::::::::::///