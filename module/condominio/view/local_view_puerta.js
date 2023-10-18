///:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: PUERTAS DE CONDOMINIO v 1.0 FECHA: 22-11-2022 ::::::::::::::::::::::::::::::::::::///
//::: EDITAR TABLA PUERTAS DE CONDOMINIO :::::::::::::::::::::::::::::::::::::::::::::::///
///:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: INICIO DECLARACION DE VARIABLES ::::::::::::::::::::::::::::::::::::::::::::::::::///
var tabla_puerta, array_puerta, fila_puerta, opcion_puerta;
///:: FIN DECLARACION DE VARIABLES :::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: INICIO JS DOM PUERTA :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

$(document).ready(function(){

  ///:: INICIO BOTONES DE PUERTA :::::::::::::::::::::::::::::::::::::::::::::::::::::::///

  ///:: BOTON CREAR NUEVA PUERTA :::::::::::::::::::::::::::::::::::::::::::::::::::::::///
  $(document).on("click", ".btn_puerta_condominio", function(){
    opcion_puerta = 1; /// CREAR
    f_limpia_puerta();
    $("#form_modal_puerta").trigger("reset");
    
    puerta_id     = "";
    pta_nombre    = "";
    pta_direccion = "";
    $("#puerta_id").val(puerta_id);
    $("#pta_nombre").val(pta_nombre);
    $("#pta_direccion").val(pta_direccion);

    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title_puerta").text("Alta de Puertas");
    $('#modal_crud_puerta').modal('show');
  
  });
  ///:: FIN BOTON NUEVA PUERTA :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

  ///:: BOTON GRABAR EN LA TABLA PUERTA ::::::::::::::::::::::::::::::::::::::::::::::::///
  $('#form_modal_puerta').submit(function(e){
    e.preventDefault(); 
    t_validar_puerta = "";
    puerta_id     = $("#puerta_id").val();
    pta_nombre    = $("#pta_nombre").val();
    pta_direccion = $("#pta_direccion").val();
    t_validar_puerta = f_validar_puerta(puerta_id, pta_nombre, pta_direccion);
    if (t_validar_puerta=="invalido"){
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: '*Falta Completar Información !!!',
        showConfirmButton: false,
        timer: 1500
      })
    }else{  
      $("#btn_guardar_puerta").prop("disabled",true); // DESACTIVA el boton guardar para evitar multiples click
      if(opcion_puerta==2){
        tabla_puerta
          .row( fila_puerta.parents('tr') )
          .remove()
          .draw();
      }
      tabla_puerta.row.add( {
        "puerta_id"       : puerta_id,
        "pta_nombre"      : pta_nombre,
        "pta_direccion"   : pta_direccion
      } ).draw();
      $("#btn_guardar_puerta").prop("disabled",false);
      $('#modal_crud_puerta').modal('hide');
    }
  });
  ///:: FIN BOTON GRABAR PUERTA ::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
  
  ///:: BOTON BORRAR PUERTA ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
  $(document).on("click", ".btn_borrar_puerta", function(){
    puerta_id="";
    fila_puerta = $(this); 
    puerta_id = fila_puerta.closest('tr').find('td:eq(0)').text();
    Swal.fire({
      title: '¿Está seguro?',
      text: "Se eliminará el registro "+puerta_id+" !!!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar!'
    }).then((result) => 
    {
      if (result.isConfirmed){
        tabla_puerta
          .row( fila_puerta.parents('tr') )
          .remove()
          .draw();
        Swal.fire(
          'Eliminado!',
          'El registro ha sido elimidado.',
          'success')
      }
    });
  });
  ///:: FIN BOTON BORRAR PUERTA ::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
  
  ///:: FIN DE BOTONES PUERTA ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

});

///:: FIN JS DOM PUERTA ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///


///:: INICIO FUNCIONES DE PUERTA :::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:::::::::::: GENERACION DE TABLA DE DETALLE DE ENTRADA MATERIALES :::::::::::::::::::///
function f_tabla_puerta(p_condominio_id){
  array_puerta = [];
  div_tabla = f_creacion_tabla("tabla_puerta","");
  $("#div_tabla_puerta").html(div_tabla);
  columnas_tabla = f_columnas_tabla("tabla_puerta","");

  Accion='leer_puerta';
  $.ajax({
    url: "ajax.php",
    type: "POST",
    datatype:"json",
    async: false,
    data: {MoS:MoS,NombreMoS:NombreMoS,Accion:Accion, condominio_id:p_condominio_id},    
    success: function(data){
      array_puerta = $.parseJSON(data);
    }
  });

  tabla_puerta = $('#tabla_puerta').DataTable({
    language: idioma_espanol,
    searching: false,
    info: false,
    lengthChange: false,
    pageLength: 5,
    responsive: true,
    data: array_puerta,
    columns: columnas_tabla
  });

  $("#tabla_puerta").DataTable().fnDestroy();
  $("#tabla_puerta").show();

}
///:::::::::::: TERMINO GENERACION DE TABLA DE DETALLE DE ENTRADA MATERIALES :::::::::::///


///:: VALIDA LOS CAMPOS DE PUERTA ::::::::::::::::::::::::::::::::::::::::::::::::::::::/// 
function f_validar_puerta(p_puerta_id, p_pta_nombre, p_pta_direccion){
  NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
  let rpta_validar_puerta="";
  f_limpia_puerta();
   
  if(p_pta_nombre==""){
    $("#pta_nombre").addClass("color-error");
    rpta_validar_puerta="invalido";
  }
  if(p_pta_direccion==""){
    $("#pta_direccion").addClass("color-error");
    rpta_validar_puerta="invalido";
  }
  return rpta_validar_puerta;
}
///:: FIN VALIDA LOS CAMPOS DE PUERTA ::::::::::::::::::::::::::::::::::::::::::::::::::/// 

///:: LIMPIA LOS CAMPOS CON ERROR ::::::::::::::::::::::::::::::::::::::::::::::::::::::/// 
function f_limpia_puerta(){
  $("#pta_nombre").removeClass("color-error");
  $("#pta_direccion").removeClass("color-error");
}
///:: FIN LIMPIA LOS CAMPOS CON ERROR ::::::::::::::::::::::::::::::::::::::::::::::::::/// 

///:: TERMINO FUNCIONES DE PUERTA ::::::::::::::::::::::::::::::::::::::::::::::::::::::///