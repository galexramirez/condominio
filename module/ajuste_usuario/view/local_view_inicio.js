///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:::::::::::::::::::: AJUSTE USUARIO v 1.0 FECHA: 25-10-2022 ::::::::::::::::::::::::::::///
//::::::::::::::::::::::::::::: EDITAR PASSWORD DE USUARIO ::::::::::::::::::::::::::::::::///
///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///::::::::::::::::::::::::::::::: Declaracion de Variables :::::::::::::::::::::::::::::::///
var MoS, NombreMoS, Accion, idioma_espanol, div_tab, div_tabla, div_boton, div_show, columnas_tabla;
MoS='module';
NombreMoS='ajuste_usuario';
idioma_espanol={
    "lengthMenu": "&nbsp&nbsp&nbsp&nbspMostrar _MENU_ registros",
    "zeroRecords": "No se encuentran resultados",
    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(Filtrado de un total de _MAX_ registros)",
    "sSearch": "Buscar:",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Ultimo",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
    "sProcessing": "Procesando...",
};

///:::::::::::::::::::::::::::::::::: JS DOM INICIO AJUSTE USUARIO ::::::::::::::::::::::::///
$(document).ready(function(){

});
///::::::::::::::::::::::::::: TERMINO JS DOM INICIO AJUSTE USUARIO :::::::::::::::::::::::///

///:::::::::::::::::::::::::::::: FUNCIONES DE AJUSTE USUARIO :::::::::::::::::::::::::::::///

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
  let rpta_columnas="";
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

function f_mostrar_div(p_nombre_formulario, p_nombre_objeto, p_dato1, p_dato2){
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
//:::::::::::::::::::::::::::::: FIN FUNCIONES ACCESOS ::::::::::::::::::::::::::::::::::::///

///:::::::::::::::::::::::::TERMINO FUNCIONES DE AJUSTE USUARIO :::::::::::::::::::::::::::///