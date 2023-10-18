///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: MIEMBRO DE DIRECTIVA v 1.0 FECHA: 22-11-2022 ::::::::::::::::::::::::::::::::::::::::///
//::: EDITAR TABLA MIEMBRO DE DIRECTIVA :::::::::::::::::::::::::::::::::::::::::::::::::::///
///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: INICIO DECLARACION DE VARIABLES :::::::::::::::::::::::::::::::::::::::::::::::::::::///
var tabla_miembro, array_miembro, fila_miembro, opcion_miembro, dm_miembro_nombre;
///:: FIN DECLARACION DE VARIABLES ::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: INICIO JS DOM MIEMBRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

$(document).ready(function(){
  $("#dm_miembro_nombre").on('change', function () {
    let data_miembro;
    let miembro_existe="NO";
    dm_miembro_nombre = $("#dm_miembro_nombre").val();

    array_miembro = tabla_miembro.rows().data().toArray();
    $.each(array_miembro, function(idx, obj){
      if(dm_miembro_nombre==obj.dm_miembro_nombre){
        miembro_existe = "SI";
      } 
alert("miembro "+dm_miembro_nombre+" Existe !!!");
    });

    data_miembro = f_buscar_data_bd("glo_roles","roles_nombre_corto",dm_miembro_nombre);
    $.each(data_miembro, function(idx, obj){ 
      dm_dni = obj.roles_dni;
      $("#dm_dni").val(dm_dni);
    });
    if(dm_edificio_descripcion!=""){
      $("#dm_departamento_id").html(f_select_residente(dm_condominio_nombre,dm_edificio_descripcion,dm_dni,"PROPIETARIO","ACTIVO","departamento_edificio"));  
    }else{
      $("#dm_edificio_descripcion").html(f_select_residente(dm_condominio_nombre,dm_edificio_descripcion,dm_dni,"PROPIETARIO","ACTIVO","edificio"));  
    }
  });

  $("#dm_edificio_descripcion").on('change', function () {
    dm_edificio_descripcion = $("#dm_edificio_descripcion").val();
    $("#dm_departamento_id").html(f_select_residente(dm_condominio_nombre,dm_edificio_descripcion,dm_dni,"PROPIETARIO","ACTIVO","departamento_edificio"));  
  });

  ///:: INICIO BOTONES DE MIEMBRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

  ///:: BOTON CREAR NUEVO MIEMBRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
  $(document).on("click", ".btn_directiva_miembro", function(){
    opcion_miembro = 1; /// CREAR
    f_limpia_miembro();
    f_combos_miembro();
    $("#form_modal_miembro").trigger("reset");

    dm_cargo                = "";
    dm_dni                  = "";
    dm_miembro_nombre       = "";
    dm_condominio_nombre    = $("#dire_condominio_nombre").val();
    dm_edificio_descripcion = $("#dire_edificio_descripcion").val();
    dm_departamento_id      = "";

    $("#dm_miembro_nombre").html(f_select_residente(dm_condominio_nombre,"","","PROPIETARIO","ACTIVO","nombre"));

    if(dm_edificio_descripcion!=""){
      $("#dm_edificio_descripcion").prop("disabled",true);
      $("#dm_edificio_descripcion").html(f_select_residente(dm_condominio_nombre,dm_edificio_descripcion,dm_dni,"PROPIETARIO","ACTIVO","edificio"));  
    }else{
      $("#dm_edificio_descripcion").prop("disabled",false);
    }

    $("#dm_cargo").val(dm_cargo);
    $("#d_dni").val(dm_dni);
    $("#dm_miembro_nombre").val(dm_miembro_nombre);
    $("#dm_condominio_nombre").val(dm_condominio_nombre);
    $("#dm_edificio_descripcion").val(dm_edificio_descripcion);
    $("#dm_departamento_id").val(dm_departamento_id);
    
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title_miembro").text("Alta de Miembros de Directiva");
    $('#modal_crud_miembro').modal('show');  
  });
  ///:: FIN BOTON NUEVO MIEMBRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

  ///:: BOTON GRABAR EN LA TABLA MIEMBRO ::::::::::::::::::::::::::::::::::::::::::::::::::///
  //$('#form_modal_miembro').submit(function(e){
  $(document).on("click", ".btn_guardar_miembro", function(){
    //e.preventDefault(); 
    t_validar_miembro       = "";
    dm_cargo                = $("#dm_cargo").val();
    dm_dni                  = $("#dm_dni").val();
    dm_miembro_nombre       = $("#dm_miembro_nombre").val();
    dm_condominio_nombre    = $("#dm_condominio_nombre").val();
    dm_edificio_descripcion = $("#dm_edificio_descripcion").val();
    dm_departamento_id      = $("#dm_departamento_id").val();
    
    t_validar_miembro = f_validar_miembro(dm_cargo, dm_dni, dm_miembro_nombre, dm_condominio_nombre, dm_edificio_descripcion, dm_departamento_id );
    if (t_validar_miembro=="invalido"){
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: '*Falta Completar Información !!!',
        showConfirmButton: false,
        timer: 1500
      })
    }else{  
      $("#btn_guardar_miembro").prop("disabled",true); // DESACTIVA el boton guardar para evitar multiples click
      if(opcion_miembro==2){
        tabla_miembro
          .row( fila_miembro.parents('tr') )
          .remove()
          .draw();
      }
      tabla_miembro.row.add( {
        "dm_cargo"                : dm_cargo,
        "dm_miembro_nombre"       : dm_miembro_nombre,
        "dm_edificio_descripcion" : dm_edificio_descripcion,
        "dm_departamento_id"      : dm_departamento_id,
      } ).draw();
      $("#btn_guardar_miembro").prop("disabled",false);
      $('#modal_crud_miembro').modal('hide');
    }
  });
  ///:: FIN BOTON GRABAR MIEMBRO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
  
  ///:: BOTON BORRAR MIEMBRO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
  $(document).on("click", ".btn_borrar_miembro", function(){
    dm_miembro_nombre = "";
    fila_miembro = $(this); 
    dm_miembro_nombre = fila_miembro.closest('tr').find('td:eq(1)').text();
    Swal.fire({
      title             : '¿Está seguro?',
      text              : "Se eliminará el miembro "+dm_miembro_nombre+" !!!",
      icon              : 'warning',
      showCancelButton  : true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor : '#d33',
      confirmButtonText : 'Si, eliminar!'
    }).then((result) => 
    {
      if (result.isConfirmed){
        tabla_miembro
          .row( fila_miembro.parents('tr') )
          .remove()
          .draw();
        Swal.fire(
          'Eliminado!',
          'El registro ha sido elimidado.',
          'success')
      }
    });
  });
  ///:: FIN BOTON BORRAR MIEMBRO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
  
  ///:: FIN DE BOTONES MIEMBRO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

});

///:: FIN JS DOM MIEMBRO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///


///:: INICIO FUNCIONES DE MIEMBRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: GENERACION DE TABLA DE DETALLE DE MIEMBROS ::::::::::::::::::::::::::::::::::::::::::///
function f_tabla_miembro(p_directiva_id){
  array_miembro = [];
  div_tabla = f_creacion_tabla("tabla_miembro","");
  $("#div_tabla_miembro").html(div_tabla);
  columnas_tabla = f_columnas_tabla("tabla_miembro","");

  Accion='leer_miembro';
  $.ajax({
    url: "ajax.php",
    type: "POST",
    datatype:"json",
    async: false,
    data: {MoS:MoS,NombreMoS:NombreMoS,Accion:Accion, directiva_id:p_directiva_id},    
    success: function(data){
      array_miembro = $.parseJSON(data);
    }
  });

  $("#tabla_miembro").dataTable().fnDestroy();
  $("#tabla_miembro").show();

  tabla_miembro = $('#tabla_miembro').DataTable({
    language: idioma_espanol,
    searching: false,
    info: false,
    lengthChange: false,
    pageLength: 5,
    responsive: true,
    data: array_miembro,
    columns: columnas_tabla
  });

}
///:: TERMINO GENERACION DE TABLA DE DETALLE DE MIEMBROS ::::::::::::::::::::::::::::::::::///


///:: VALIDA LOS CAMPOS DE MIEMBRO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::/// 
function f_validar_miembro(p_dm_cargo, p_dm_dni, p_dm_miembro_nombre, p_dm_condominio_nombre, p_dm_edificio_descripcion, p_dm_departamento_id){
  NoLetrasMayuscEspacio=/[^A-Z \Ñ]/;
  let rpta_validar_miembro="";
  f_limpia_miembro();
   
  if(p_dm_cargo==""){
    $("#dm_cargo").addClass("color-error");
    rpta_validar_miembro="invalido";
  }
  if(p_dm_dni==""){
    $("#dm_dni").addClass("color-error");
    rpta_validar_miembro="invalido";
  }
  if(p_dm_miembro_nombre==""){
    $("#dm_miembro_nombre").addClass("color-error");
    rpta_validar_miembro="invalido";
  }
  if(p_dm_condominio_nombre==""){
    $("#dm_condominio_nombre").addClass("color-error");
    rpta_validar_miembro="invalido";
  }
  if(p_dm_edificio_descripcion==""){
    $("#dm_edificio_descripcion").addClass("color-error");
    rpta_validar_miembro="invalido";
  }
  if(p_dm_departamento_id==""){
    $("#dm_departamento_id").addClass("color-error");
    rpta_validar_miembro="invalido";
  }
  return rpta_validar_miembro;
}
///:: FIN VALIDA LOS CAMPOS DE MIEMBRO :::::::::::::::::::::::::::::::::::::::::::::::::::/// 

///:: LIMPIA LOS CAMPOS CON ERROR :::::::::::::::::::::::::::::::::::::::::::::::::::::::::/// 
function f_limpia_miembro(){
  $("#dm_cargo").removeClass("color-error");
  $("#dm_miembro_nombre").removeClass("color-error");
  $("#dm_miembro_nombre").removeClass("color-error");
  $("#dm_condominio_nombre").removeClass("color-error");
  $("#dm_edificio_descripcion").removeClass("color-error");
  $("#dm_departamento_id").removeClass("color-error");
}
///:: FIN LIMPIA LOS CAMPOS CON ERROR :::::::::::::::::::::::::::::::::::::::::::::::::::::/// 

///:: ACTUALIZA COMBOS PARA MIEMBRO :::::::::::::::::::::::::::::::::::::::::::::::::::::::///
function f_combos_miembro(){
  let select_html_miembro="";
  
  select_html_miembro = f_select_categoria("tc_condominio","DIRECTIVA","CARGO");
  $("#dm_cargo").html(select_html_miembro);
}
///:: FIN ACTUALIZA COMBOS PARA MIEMBRO :::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: TERMINO FUNCIONES DE MIEMBRO ::::::::::::::::::::::::::::::::::::::::::::::::::::::::///