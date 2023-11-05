///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: INICIO v 3.0 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: VARIABLES Y FUNCIONES GLOBALES CUENTAS POR PAGAR ::::::::::::::::::::::::::::::::::::///
///:: FECHA: 2023-11-02 15:50 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: Declaracion de Variables GLOBALES :::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: MoS: Module o Services, NombreMoS: Nombre del modulo o servicio, Accion: Funcion a ejecutar
var MoS, NombreMoS, Accion, div_tab, div_tabla, div_boton, div_show, columnas_tabla, mi_carpeta;
mi_carpeta = f_document_root();
MoS = "module";
NombreMoS = "cta_pagar";
///:: Variable para cambiar el lenguaje a español de un datatable
var idioma_espanol = {
  "lengthMenu"  : "&nbsp&nbsp&nbsp&nbspMostrar _MENU_ registros",
  "zeroRecords" : "No se encuentran resultados",
  "info"        : "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
  "infoEmpty"   : "Mostrando registros del 0 al 0 de un total de 0 registros",
  "infoFiltered": "(Filtrado de un total de _MAX_ registros)",
  "sSearch"     : "Buscar:",
  "oPaginate"   : 
  {
    "sFirst"    : "Primero",
    "sLast"     : "Ultimo",
    "sNext"     : "Siguiente",
    "sPrevious" : "Anterior"
  },
  "select"      :
  {
    "rows"      :
    {
      "_"       : "Seleccionadas %d filas",
      "0"       : "Click a una fila para seleccionarla",
      "1"       : "Seleccionada 1 fila"
    }
  },
  "sProcessing" : "Procesando...",
};

///::::::::::::::::::::::::::::: JS DOM INICIO ::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function() {
  div_tab = f_creacion_tab("nav-tab-cta_pagar","");
  $("#nav-tab-cta_pagar").html(div_tab);

  div_tab = f_creacion_tab("nav-tab-ajustes_cta_pagar","");
  $("#nav-tab-ajustes_cta_pagar").html(div_tab);

  $( "#tabs" ).tabs();
});
///::::::::::::::::::::::::::TERMINO JS DOM INICIO ::::::::::::::::::::::::::::::::::::::::///

///:::::::::::::::::::::::::::::: FUNCIONES DE INICIO :::::::::::::::::::::::::::::::::::::///
function f_select_categoria(p_tabla, p_variable, p_categoria1, p_categoria2){
  let rpta_select_categoria = "";
  Accion = 'select_categoria';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tabla:p_tabla, tc_variable:p_variable, tc_categoria1:p_categoria1, tc_categoria2:p_categoria2},    
    success : function(data){
      rpta_select_categoria = data;
    }
  });
  return rpta_select_categoria;
}

function f_document_root(){
  let rpta_mi_carpeta = '';
  Accion = 'document_root';
  $.ajax({
    url       : "ajax.php",
    type      : "POST",
    datatype  : "json",
    async     : false,
    data      : { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion },
    success   : function(data){
      rpta_mi_carpeta = data;
    }
  });
  return rpta_mi_carpeta;
}

///:: CALCULO DE FECHAS :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_calculo_fecha(p_inicio, p_calculo){
  let rpta_fecha = "";
  Accion = 'calculo_fecha';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, inicio:p_inicio, calculo:p_calculo },
    success: function(data){
      rpta_fecha = data;
    }
  });
  return rpta_fecha;
}

function f_mayor_fecha(p_inicio, p_final){
  let rpta_mayor = "";
  Accion = 'mayor_fecha';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, inicio:p_inicio, final:p_final},    
    success: function(data){
      rpta_mayor = data;
    }
  });
  return rpta_mayor;
}

function f_diferencia_fecha(p_inicio, p_final){
  let rpta_diferencia = "";
  Accion = 'diferencia_fecha';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, inicio:p_inicio, final:p_final},    
    success: function(data){
      rpta_diferencia = data;
    }
  });
  return rpta_diferencia;
}

function f_calcular_diferencia_horas(p_hora_inicio,p_hora_final){
  let rpta_calculo = "";
  if(p_hora_inicio!="" && p_hora_final!=""){
    Accion = 'calcular_diferencia_horas';
    $.ajax({
      url     : "ajax.php",
      type    : "POST",
      datatype: "json",
      async   : false,    
      data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, hora_inicio:p_hora_inicio, hora_final:p_hora_final},
      success: function(data){
        rpta_calculo = data;
      }
    });
  }
  return rpta_calculo;
}
///:: FIN DE CALCULO DE FECHAS ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: BUSCAR DATA EN BD :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_buscar_data_bd(p_tabla_bd, p_campo_bd, p_data_buscar){
  let rpta_data;
  Accion = 'buscar_data_bd';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tabla_bd:p_tabla_bd, campo_bd:p_campo_bd, data_buscar:p_data_buscar},    
    success : function(data){
      rpta_data = $.parseJSON(data);
    }
  });
  return rpta_data;
}

function f_buscar_bd(p_tabla, p_c_where){
  let rpta_data;
  Accion = 'buscar_bd';
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
    data      : { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_tabla:p_nombre_tabla, campo_buscar:p_campo_buscar, condicion_where:p_condicion_where },
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
///:: FIN DE SELECT DE USUARIOS :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

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

//::::::::::::::::::::::::::::::::: FUNCIONES ACCESOS :::::::::::::::::::::::::::::::::::::///
function f_creacion_tab(p_nombre_tab,p_tipo_tab){
  let rpta_tab = '';
  Accion = 'creacion_tab';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_tab:p_nombre_tab, tipo_tab:p_tipo_tab},    
    success : function(data){
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
    success : function(data){
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
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_tabla:p_nombre_tabla,tipo_tabla:p_tipo_tabla},    
    success : function(data){
      rpta_columnas = $.parseJSON(data);
    }
  });
  return rpta_columnas;
}

function f_botones_formulario(p_nombre_formulario,p_nombre_objeto){
  let rpta_btn_formulario = "";
  Accion = 'botones_formulario';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
   data     : {MoS:MoS,NombreMoS:NombreMoS,Accion:Accion,nombre_formulario:p_nombre_formulario,nombre_objeto:p_nombre_objeto},    
    success : function(data){
      rpta_btn_formulario = data;
    }
  });
  return rpta_btn_formulario;
}

function f_div_formulario(p_nombre_formulario,p_nombre_objeto){
  let rpta_div_formulario = "";
  Accion = 'div_formulario';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_formulario:p_nombre_formulario, nombre_objeto:p_nombre_objeto},    
    success : function(data){
      rpta_div_formulario = data;
    }
  });
  return rpta_div_formulario;
}

function f_mostrar_div(p_nombre_formulario,p_nombre_objeto,p_dato1, p_dato2){
  let rpta_mostrar_div = "";
  Accion = 'mostrar_div';
  $.ajax({
    url     : "ajax.php",
    type    : "POST",
    datatype: "json",
    async   : false,
    data    : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_formulario:p_nombre_formulario, nombre_objeto:p_nombre_objeto, dato1:p_dato1, dato2:p_dato2 },
    success : function(data){
      rpta_mostrar_div = data;
    }
  });
  return rpta_mostrar_div;
}