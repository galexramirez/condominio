///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///::: INICIO v 3.0 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: VARIABLES Y FUNCIONES CONDOMINIO ::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: FECHA: 2023-02-27 15:50 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: DECLARACION VARIABLES GLOBALES ::::::::::::::::::::::::::::::::::::::::::::::::::::::///
// MoS: Module o Services, NombreMoS: Nombre del modulo o servicio, Accion: Funcion a ejecutar
var MoS, NombreMoS, Accion, div_tab, div_tabla, div_boton, div_show, columnas_tabla;
MoS = "module";
NombreMoS = "ajuste_condominio";
// Variable para cambiar el lenguaje a español de un datatable
var idioma_espanol = {
  "lengthMenu": "&nbsp&nbsp&nbsp&nbspMostrar _MENU_ registros",
  "zeroRecords": "No se encuentran resultados",
  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
  "infoFiltered": "(Filtrado de un total de _MAX_ registros)",
  "sSearch": "Buscar:",
  "oPaginate": 
    {
      "sFirst": "Primero",
      "sLast": "Ultimo",
      "sNext": "Siguiente",
      "sPrevious": "Anterior"
    },
  "select":
    {
      "rows":
      {
        "_": "Seleccionadas %d filas",
        "0": "Click a una fila para seleccionarla",
        "1": "Seleccionada 1 fila"
      }
    },
  "sProcessing": "Procesando...",
};

///::::::::::::::::::::::::::::: JS DOM INICIO ::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function() {
  div_tab = f_creacion_tab("nav-tab-ajuste_condominio","");
  $("#nav-tab-ajuste_condominio").html(div_tab);

  $( "#tabs" ).tabs();
});
///::::::::::::::::::::::::::TERMINO JS DOM INICIO ::::::::::::::::::::::::::::::::::::::::///

///:::::::::::::::::::::::::::::: FUNCIONES DE INICIO :::::::::::::::::::::::::::::::::::::///
function f_select_categoria(p_tabla,p_ficha,p_categoria1){
  let rpta_select_categoria="";
  Accion='select_categoria';
  $.ajax({
    url: "ajax.php",
    type: "POST",
    datatype:"json",
    async: false,
    data: {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, tabla:p_tabla, tc_ficha:p_ficha, tc_categoria1:p_categoria1},    
    success: function(data){
      rpta_select_categoria = data;
    }
  });
  return rpta_select_categoria;
}

//::::::::::::::::::::::::::::::::: FUNCIONES ACCESOS :::::::::::::::::::::::::::::::::::::///
function f_creacion_tab(p_nombre_tab,p_tipo_tab){
  let rpta_tab="";
  Accion='creacion_tab';
  $.ajax({
    url: "ajax.php",
    type: "POST",
    datatype:"json",
    async: false,
    data: {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_tab:p_nombre_tab, tipo_tab:p_tipo_tab},    
    success: function(data){
      rpta_tab = data;
    }
  });
  return rpta_tab;
}

function f_creacion_tabla(p_nombre_tabla,p_tipo_tabla){
  let rpta_tabla="";
  Accion='creacion_tabla';
  $.ajax({
    url: "ajax.php",
    type: "POST",
    datatype:"json",
    async: false,
    data: {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_tabla:p_nombre_tabla, tipo_tabla:p_tipo_tabla},    
    success: function(data){
      rpta_tabla = data;
    }
  });
  return rpta_tabla;
}

function f_columnas_tabla(p_nombre_tabla,p_tipo_tabla){
  let rpta_columnas = "";
  Accion='columnas_tabla';
  $.ajax({
    url: "ajax.php",
    type: "POST",
    datatype:"json",
    async: false,
    data: {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_tabla:p_nombre_tabla,tipo_tabla:p_tipo_tabla},    
    success: function(data){
      rpta_columnas = $.parseJSON(data);
    }
  });
  return rpta_columnas;
}

function f_botones_formulario(p_nombre_formulario,p_nombre_objeto){
  let rpta_btn_formulario="";
  Accion='botones_formulario';
  $.ajax({
    url: "ajax.php",
    type: "POST",
    datatype:"json",
    async: false,
    data: {MoS:MoS,NombreMoS:NombreMoS,Accion:Accion,nombre_formulario:p_nombre_formulario,nombre_objeto:p_nombre_objeto},    
    success: function(data){
      rpta_btn_formulario = data;
    }
  });
  return rpta_btn_formulario;
}

function f_div_formulario(p_nombre_formulario,p_nombre_objeto){
  let rpta_div_formulario="";
  Accion='div_formulario';
  $.ajax({
    url: "ajax.php",
    type: "POST",
    datatype:"json",
    async: false,
    data: {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_formulario:p_nombre_formulario, nombre_objeto:p_nombre_objeto},    
    success: function(data){
      rpta_div_formulario = data;
    }
  });
  return rpta_div_formulario;
}

function f_mostrar_div(p_nombre_formulario,p_nombre_objeto,p_dato1, p_dato2){
  let rpta_mostrar_div="";
  Accion='mostrar_div';
  $.ajax({
    url: "ajax.php",
    type: "POST",
    datatype:"json",
    async: false,
    data: {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, nombre_formulario:p_nombre_formulario, nombre_objeto:p_nombre_objeto, dato1:p_dato1, dato2:p_dato2 },
    success: function(data){
      rpta_mostrar_div = data;
    }
  });
  return rpta_mostrar_div;
}