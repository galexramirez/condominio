///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: MANUAL DE USUARIO 2023-11-10 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: INICIO v 1.0 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: DECLARACION VARIABLES GLOBALES ::::::::::::::::::::::::::::::::::::::::::::::::::::::///
var MoS, NombreMoS, Accion, div_tabs, div_tablas, div_boton, columnas_tabla, div_show, idioma_espanol, mi_carpeta;
MoS           = "module";
NombreMoS     = "manual";
mi_carpeta    = f_document_root();
idioma_espanol = {
  "lengthMenu"    : "&nbsp&nbsp&nbsp&nbspMostrar _MENU_ registros",
  "zeroRecords"   : "No se encuentran resultados",
  "info"          : "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
  "infoEmpty"     : "Mostrando registros del 0 al 0 de un total de 0 registros",
  "infoFiltered"  : "(Filtrado de un total de _MAX_ registros)",
  "sSearch"       : "Buscar:",
  "oPaginate"     : 
  {
    "sFirst": "Primero",
    "sLast": "Ultimo",
    "sNext": "Siguiente",
    "sPrevious": "Anterior"
  },
  "select"        :
  {
    "rows"        :
    {
      "_"       : "Seleccionadas %d filas",
      "0"       : "Click a una fila para seleccionarla",
      "1"       : "Seleccionada 1 fila"
    }
  },
  "sProcessing": "Procesando...",
};
  
///:: DOM JS INSPECCION DE FLOTA :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
  div_show = f_mostrar_div("contenido", "div_alertsDropdown_ayuda", NombreMoS, "");
  $("#div_alertsDropdown_ayuda").html(div_show);

  div_tabs = f_creacion_tab("nav-tab-manual","");
  $("#nav-tab-manual").html(div_tabs);
  $( "#tabs" ).tabs();
});
///:: TERMINO DOM INSPECCION DE FLOTA :::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCIONES INSPECCION DE FLOTA :::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: FUNCION QUE GENERA EL LISTADO DEL COMBO SELECT ::::::::::::::::::::::::::::::::::::::///
function f_select_combo(p_nombre_tabla, p_es_campo_unico, p_campo_select, p_campo_inicial, p_condicion_where, p_order_by){
  let rpta_select_combo = "";
  Accion = 'select_combo';
  $.ajax({
    url       : "ajax.php",
    type      : "POST",
    datatype  : "json",
    async     : false,
    data      : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_tabla:p_nombre_tabla, es_campo_unico:p_es_campo_unico, campo_select:p_campo_select, campo_inicial:p_campo_inicial, condicion_where:p_condicion_where, order_by:p_order_by},
    success   : function(data){
      rpta_select_combo = data;
    }
  });
  return rpta_select_combo;
}
///:: FIN DE FUNCION QUE GENERA EL LISTADO DEL COMBO SELECT :::::::::::::::::::::::::::::::///

///:: SELECT DE USUARIOS ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_select_roles(p_roles_perfil, p_roles_campo){
  let rpta_select_roles = "";
  Accion = 'select_roles';
  $.ajax({
    url       : "ajax.php",
    type      : "POST", 
    datatype  : "json",
    async     : false,
    data      : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, roles_perfil:p_roles_perfil, roles_campo:p_roles_campo},    
    success   : function(data){
      rpta_select_roles = data;
    }
  });
  return rpta_select_roles;
}

///:: CALCULO DE FECHAS :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_calculo_fecha(p_inicio, p_calculo){
  let rpta_fecha="";
  Accion = 'calculo_fecha';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, inicio:p_inicio, calculo:p_calculo},    
    success: function(data){
      rpta_fecha = data;
    }
  });
  return rpta_fecha;
}

// Compara la feche actual con la fecha ingresada
// rpta : fecha actual es "MAYOR" o "MENOR IGUAL"
function f_comparar_fecha_actual(p_fecha){
  let rpta_comparar = "";
  Accion = 'comparar_fecha_actual';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, fecha:p_fecha},    
    success : function(data){
      rpta_comparar = data;
    }
  });
  return rpta_comparar;
}

function f_diferencia_fecha(p_inicio, p_final){
  let rpta_diferencia = "";
  Accion = 'diferencia_fecha';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, inicio:p_inicio,final:p_final},    
    success: function(data){
      rptaDiferencia = data;
    }
  });
  return rpta_diferencia;
}

function f_dias_diferencia_fechas(p_inicio,p_final){
  let rpta_dias = "";
  Accion = 'dias_diferencia_fechas';
  $.ajax({
    url     : "Ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, inicio:p_inicio, final:p_final},    
    success: function(data){
      rpta_dias = data;
    }
  });
  return rpta_dias;
}

///:: BUSCAR DATA EN BD :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_buscardatabd(p_tablabd, p_campobd, p_databuscar){
  let rpta_data;
  Accion = 'buscardatabd';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tablabd:p_tablabd, campobd:p_campobd, databuscar:p_databuscar},    
    success: function(data){
      rpta_data = $.parseJSON(data);
    }
  });
  return rpta_data;
}

function f_buscar_data_bd(p_tabla, p_c_where){
  let rpta_data;
  Accion = 'buscar_data_bd';
  $.ajax({
    url       : "ajax.php",
    type      : "POST",
    datatype  : "json",
    async     : false,
    data      : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tabla:p_tabla, c_where:p_c_where},    
    success   : function(data){
      rpta_data = $.parseJSON(data);
    }
  });
  return rpta_data;
}

function f_buscar_dato(p_nombre_tabla, p_campo_buscar, p_condicion_where){
  let rpta_buscar = "";
  Accion = 'buscar_dato';
  $.ajax({
    url       : "ajax.php",
    type      : "POST",
    datatype  : "json",
    async     : false,
    data      : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_tabla:p_nombre_tabla, campo_buscar:p_campo_buscar, condicion_where:p_condicion_where},
    success   : function(data){
      rpta_buscar = data;
    }
  });
  return rpta_buscar;
}

function f_contar_dato(p_nombre_tabla, p_campo_buscar, p_condicion_where){
  let rpta_contar = "";
  Accion = 'contar_dato';
  $.ajax({
    url       : "ajax.php",
    type      : "POST",
    datatype  : "json",
    async     : false,
    data      : { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_tabla:p_nombre_tabla, campo_buscar:p_campo_buscar, condicion_where:p_condicion_where},
    success   : function(data){
      rpta_contar = data;
    }
  });
  return rpta_contar;
}

///:: UBICAR DIRECTORIO RAIZ ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_document_root(){
  let rpta_mi_carpeta = '';
  Accion = 'document_root';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion},    
    success: function(data){
      rpta_mi_carpeta = data;
    }
  });
  return rpta_mi_carpeta;
}

function f_ayuda_modulo(man_titulo){
  let man_modulo_id = f_buscar_dato("glo_modulo", "modulo_id", "`mod_nombre` = '"+NombreMoS+"'");
  let manual_id = f_buscar_dato("glo_manual", "manual_id", "`man_modulo_id` = '"+man_modulo_id+"' AND `man_titulo` = '"+man_titulo+"'");
  let man_html = f_buscar_dato("glo_manual_html", "man_html", "`manual_id`='"+manual_id+"'");
  $("#div_ver_ayuda_html").html(man_html);

  $("#form_modal_ver_ayuda").trigger("reset");
  $(".modal-header").css( "background-color", "#17a2b8");
  $(".modal-header").css( "color", "white" );
  $(".modal-title").text( man_titulo );
  $('#modal_crud_ver_ayuda').modal('show');	   
  $('#modal-resizable_ver_ayuda').resizable();
  $(".modal-dialog").draggable({
    cursor: "move",
    handle: ".dragable_touch",
  });         
}

///:: FUNCIONES ACCESOS :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_creacion_tab(p_nombre_tab,p_tipo_tab){
  let rpta_tab = "";
  Accion = 'creacion_tab';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype:"json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_tab:p_nombre_tab, tipo_tab:p_tipo_tab},    
    success: function(data){
      rpta_tab = data;
    }
  });
  return rpta_tab;
}

function f_creacion_tabla(p_nombre_tabla,p_tipo_tabla){
  let rpta_tabla = "";
  Accion = 'creacion_tabla';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_tabla:p_nombre_tabla, tipo_tabla:p_tipo_tabla},    
    success: function(data){
      rpta_tabla = data;
    }
  });
  return rpta_tabla;
}

function f_columnas_tabla(p_nombre_tabla,p_tipo_tabla){
  let rpta_columnas = "";
  Accion = 'columnas_tabla';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype:"json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_tabla:p_nombre_tabla,tipo_tabla:p_tipo_tabla},    
    success: function(data){
      rpta_columnas = $.parseJSON(data);
    }
  });
  return rpta_columnas;
}

function f_botones_formulario(p_nombre_formulario, p_nombre_objeto){
  let rpta_btn_formulario = "";
  Accion = 'botones_formulario';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype:"json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_formulario:p_nombre_formulario, nombre_objeto:p_nombre_objeto},    
    success: function(data){
      rpta_btn_formulario = data;
    }
  });
  return rpta_btn_formulario;
}

function f_div_formulario(p_nombre_formulario, p_nombre_objeto){
  let rpta_div_formulario = "";
  Accion = 'div_formulario';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_formulario:p_nombre_formulario, nombre_objeto:p_nombre_objeto},    
    success: function(data){
      rpta_div_formulario = data;
    }
  });
  return rpta_div_formulario;
}

function f_mostrar_div(p_nombre_formulario, p_nombre_objeto, p_dato1, p_dato2){
  let rpta_mostrar_div = "";
  Accion = 'mostrar_div';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_formulario:p_nombre_formulario, nombre_objeto:p_nombre_objeto, dato1:p_dato1, dato2:p_dato2 },
    success: function(data){
      rpta_mostrar_div = data;
    }
  });
  return rpta_mostrar_div;
}
///:: FIN FUNCIONES DE ACCESOS ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: TERMINO FUNCIONES MANUAL DE USUARIO :::::::::::::::::::::::::::::::::::::::::::::::::///