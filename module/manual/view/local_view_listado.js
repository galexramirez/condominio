///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: MANUAL DE USUARIO 2023-11-13 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: LISTADO MANUAL DE USUARIO v 1.0 :::::::::::::::::::::::::::::::::::::::::::::::::::::///
///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: DECLARACION VARIABLES GLOBALES ::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var tabla_manual, fila_manual, sel_modulo_nombre, new_man_modulo_nombre, new_man_titulo;
var manual_id;

///:: DOM MANUAL DE USUARIO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
  let select_html  = "";
  select_html = f_select_modulo_nombre();
  $("#sel_modulo_nombre").html(select_html);

  div_show = f_botones_formulario("form_seleccion_listado_manual","btn_seleccion_listado_manual","");
  $("#div_btn_seleccion_listado_manual").html(div_show);

  ///:: BOTONES MANUAL DE USUARIO DE FLOTA ::::::::::::::::::::::::::::::::::::::::::::::::///

  ///:: EVENTO BOTON BUSCAR MANUAL DE USUARIO DE FLOTA ::::::::::::::::::::::::::::::::::::///
  $(document).on("click", ".btn_buscar_listado_manual", function(){
    sel_modulo_nombre = $("#sel_modulo_nombre").val();
    if(sel_modulo_nombre!==''){
      man_modulo_id = f_buscar_dato("glo_modulo", "modulo_id", "`mod_nombre_vista`='"+sel_modulo_nombre+"'");
      div_tabla     = f_creacion_tabla("tabla_manual","");
      $("#div_tabla_manual").html(div_tabla);
      columnas_tabla = f_columnas_tabla("tabla_manual","")
      
      $("#tabla_manual").dataTable().fnDestroy();
      $('#tabla_manual').show();
  
      // Setup - add a text input to each footer cell
      $('#tabla_manual thead tr')
        .clone(true)
        .addClass('filters_manual')
        .appendTo('#tabla_manual thead');
  
      Accion  = 'buscar_manual';
      tabla_manual = $('#tabla_manual').DataTable({
           orderCellsTop: true,
           fixedHeader: true,
           initComplete: function (){
             var api = this.api();
             // For each column
             api.columns().eq(0).each(function (colIdx) {
               // Set the header cell to contain the input element
               var cell = $('.filters_manual th').eq($(api.column(colIdx).header()).index());
               var title = $(cell).text();
               $(cell).html('<input type="text" placeholder="' + title + '" />');
               // On every keypress in this input
               $('input',$('.filters_manual th').eq($(api.column(colIdx).header()).index()) ).off('keyup change').on('keyup change', function (e) {
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
           // Para mostrar la barra scroll horizontal y vertical
           deferRender     : true,
           scrollY         : 800,
           scrollCollapse  : true,
           scroller        : true,
           scrollX         : true,
   
           fixedColumns    :
           {
             left          : 1
           },
           fixedHeader     :
           {
             header        : false
           },
   
        select        : {style: 'os'},
        language      : idioma_espanol,
        responsive    : "true",
        dom           : 'Blfrtip', 
        pageLength    : 50,
        buttons       : [
          {
            extend    : 'excelHtml5',
            text      : '<i class="fas fa-file-excel"></i> ',
            titleAttr : 'Exportar a Excel',
            className : 'btn btn-success',
            title     : 'MANUAL DE USUARIO'
          },
        ],
        "ajax"        : {            
          "url"       : "ajax.php", 
          "method"    : 'POST', 
          "data"      : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, man_modulo_id:man_modulo_id},
          "dataSrc"   : ""
        },
        "columns"     : columnas_tabla,
        "order"       : [[3, 'asc']]
      });  
    }else{
      Swal.fire({
        position            : 'center',
        icon                : 'error',
        title               : "Seleccionar Modulo !!!",
        showConfirmButton   : false,
        timer               : 1500
      })
    }
  });
  ///:: FIN EVENTO BOTON BUSCAR MANUAL DE USUARIO DE FLOTA ::::::::::::::::::::::::::::::::///

  ///:: EVENTO BOTON NUEVO MANUAL DE USUARIO ::::::::::::::::::::::::::::::::::::::::::::::///
  $(document).on("click", ".btn_nuevo_manual_registro", function(){
    f_limpia_manual_registro();
    $("#form_inspeccion").trigger("reset");
    opcion_manual = 'CREAR';
    new_man_modulo_nombre = '';
    new_man_titulo = ''
    select_html = f_select_modulo_nombre();
    $("#new_man_modulo_nombre").html(select_html);
    
    $("#new_man_modulo_nombre").val(new_man_modulo_nombre);
    $("#new_man_titulo").val(new_man_titulo);
    $("#btn_generar_manual_registro").prop("disabled",false);
        
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text( "ALTA MANUAL DE USUARIO");
    $('#modal_crud_manual_registro').modal('show');
  });
  ///:: FIN EVENTO BOTON NUEVO MANUAL DE USUARIO ::::::::::::::::::::::::::::::::::::::::::///
  
  ///:: EVENTO BOTON NUEVO MANUAL DE USUARIO DE FLOTA :::::::::::::::::::::::::::::::::::::///
  $(document).on("click", ".btn_editar_manual_registro", function(){
    fila_manual = $(this).closest('tr'); 
    manual_id = fila_manual.find('td:eq(1)').text();
    man_modulo_nombre = fila_manual.find('td:eq(2)').text();
    man_titulo = fila_manual.find('td:eq(3)').text();

    select_html = f_select_modulo_nombre();
    $("#man_modulo_nombre").html(select_html);
    select_html = f_select_combo("glo_manual", "NO", "man_titulo", "", "`man_modulo_id`='"+man_modulo_id+"'" );
    $("#man_titulo").html(select_html);
  
    $("#manual_id").val(manual_id);
    $("#man_modulo_nombre").val(man_modulo_nombre);
    $("#man_titulo").val(man_titulo);
    $('#nav-profile-tab').tab('show');
    div_show = f_mostrar_div("form_seleccion_manual_registro","btn_seleccion_manual_registro","","");
    $("#div_btn_seleccion_manual_registro").html(div_show);
    document.getElementById("btn_cargar_manual_registro").click();
  });
  ///:: FIN EVENTO BOTON NUEVO MANUAL DE USUARIO DE FLOTA :::::::::::::::::::::::::::::::::///

  ///:: EVENTO BOTON GUARDAR REGISTRO MANUAL DE USUARIO :::::::::::::::::::::::::::::::::::///
  $('#form_manual_registro').submit(function(e){                         
    e.preventDefault();
    let validar_manual_registro = "";
    let t_msg = '';
    new_man_modulo_nombre = $("#new_man_modulo_nombre").val();
    man_modulo_id = f_buscar_dato("glo_modulo", "modulo_id", "`mod_nombre_vista`='"+new_man_modulo_nombre+"'");
    new_man_titulo = $("#new_man_titulo").val();
    man_html = '';

    validar_manual_registro = f_valida_manual_registro(new_man_modulo_nombre, new_man_titulo);
   
    if(new_man_titulo == f_buscar_dato("glo_manual","man_titulo","`man_modulo_id`='"+man_modulo_id+"' AND `man_titulo`='"+new_man_titulo+"'")){
      validar_manual_registro = 'invalido';
      t_masg = '<br> Título ya existe !';
    }

    if(validar_manual_registro=="invalido"){
      Swal.fire({
        icon  : 'error',
        title : 'MANUAL DE USUARIO...',
        text  : 'Falta completar información !!!'+t_msg
      })

    }else{
      $("#btn_guardar_manual_registro").prop("disabled",true); 
      if(opcion_manual=="CREAR"){
        Accion = "crear_manual_registro";
      }
      $.ajax({
        url       : "ajax.php",
        type      : "POST",
        datatype  : "json",
        async     : false,
        data      :  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, man_modulo_id:man_modulo_id, man_titulo:new_man_titulo, man_html:man_html },
        success   : function(data) {
          tabla_manual.ajax.reload(null, false);
          Swal.fire(
            'Guardado!',
            'El registro ha sido guardado.',
            'success'
          )            
        }
      });
      $('#modal_crud_manual_registro').modal('hide');
    }
  });
  ///:: FIN EVENTO BOTON GUARDAR REGISTRO MANUAL DE USUARIO :::::::::::::::::::::::::::::::///

  ///:: EVENTO BOTON BORRAR REGISTRO MANUAL DE USUARIO ::::::::::::::::::::::::::::::::::::///
  $(document).on("click", ".btn_borrar_manual_registro", function(){
    fila_manual = $(this).closest('tr'); 
    manual_id = fila_manual.find('td:eq(1)').text();
    Swal.fire({
      title               : '¿Está seguro?',
      text                : "Se borrará el Manual ID. "+manual_id+" !",
      icon                : 'warning',
      showCancelButton    : true,
      confirmButtonColor  : '#3085d6',
      cancelButtonColor   : '#d33',
      confirmButtonText   : 'Si, borrar!'
    }).then((result) => {
      if (result.isConfirmed) {
        Accion = 'borrar_manual_registro';
        $.ajax({
            url         : "ajax.php",
            type        : "POST",
            datatype    : "json",    
            data        : { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, manual_id:manual_id },   
            success: function() {
              tabla_manual.ajax.reload(null, false);
              Swal.fire(
                  'Borrado!',
                  'El registro ha sido borrado.',
                  'success'
              )            
            }
        });
      }
    });
  });
  ///:: FIN EVENTO BOTON BORRAR REGISTRO MANUAL DE USUARIO ::::::::::::::::::::::::::::::::///
  
  ///:: EVENTO BOTON NUEVO MANUAL DE USUARIO DE FLOTA :::::::::::::::::::::::::::::::::::::///
  $(document).on("click", ".btn_ver_manual_registro", function(){
    let t_html = '';
    let t_modulo = '';
    let t_titulo = '';
    fila_manual = $(this).closest('tr'); 
    manual_id = fila_manual.find('td:eq(1)').text();
    t_modulo = fila_manual.find('td:eq(2)').text();
    t_titulo = fila_manual.find('td:eq(3)').text();
    t_html = f_buscar_dato("glo_manual_html", "man_html", "`manual_id`='"+manual_id+"'");
    $("#div_ver_manual_html").html(t_html);

    $("#form_modal_ver_manual").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text( t_modulo + " - " + t_titulo);
    $('#modal_crud_ver_manual').modal('show');	   
    $('#modal-resizable_ver_manual').resizable();
    $(".modal-dialog").draggable({
      cursor: "move",
      handle: ".dragable_touch",
    });         

  });
  ///:: FIN EVENTO BOTON NUEVO MANUAL DE USUARIO DE FLOTA :::::::::::::::::::::::::::::::::///

  ///:: TERMINO BOTONES MANUAL DE USUARIO DE FLOTA ::::::::::::::::::::::::::::::::::::::::///

});    
///:: TERMINO DOM MANUAL DE USUARIO DE FLOTA :::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCIONES MANUAL DE USUARIO DE FLOTA :::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::::::///
function f_valida_manual_registro(p_new_man_modulo_nombre, p_new_man_titulo){
  f_limpia_manual_registro();
  let rpta_valida_agregar_manual = "";
  
  if(p_new_man_modulo_nombre==""){
    $("#new_man_modulo_nombre").addClass("color-error");
    rpta_valida_agregar_manual = "invalido";
  }
  if(p_new_man_titulo==""){
    $("#new_man_titulo").addClass("color-error");
    rpta_valida_agregar_manual = "invalido";
  }
  return rpta_valida_agregar_manual;
}
///:: FUNCION PARA VALIDAR LOS DATOS INGRESADOS AL FORMULARIO :::::::::::::::::::::::::::::///

///:: REESTABLECE EL COLOR DE LOS CAMPOS INVALIDOS ::::::::::::::::::::::::::::::::::::::::/// 
function f_limpia_manual_registro(){
  $("#new_man_modulo_nombre").removeClass("color-error");
  $("#new_man_titulo").removeClass("color-error");
}
///:: FIN REESTABLECE EL COLOR DE LOS CAMPOS INVALIDOS ::::::::::::::::::::::::::::::::::::///

///:: TERMINO FUNCIONES MANUAL DE USUARIO DE FLOTA :::::::::::::::::::::::::::::::::::::::::::::::///