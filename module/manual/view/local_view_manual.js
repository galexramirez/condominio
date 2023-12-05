///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: REGISTRO  MANUAL DE USUARIO v 1.0 :::::::::::::::::::::::::::::::::::::::::::::::::::///
///:: CREAR Y EDITAR DETALLE DE MANUAL DE USUARIO :::::::::::::::::::::::::::::::::::::::::///
///::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::///

///:: DECLARACIONES DE VARIABLES GLOBALES :::::::::::::::::::::::::::::::::::::::::::::::::///
var manual_id, man_modulo_id, man_titulo, man_modulo_nombre, man_log, man_html;
var opcion_manual;

///:: JS DOM REGISTRO MANUAL DE USUARIO :::::::::::::::::::::::::::::::::::::::::::::::::::///
$(document).ready(function(){
  let select_manual = '';
  man_modulo_id = '';
  
  div_show = f_mostrar_div("form_seleccion_manual_registro","btn_seleccion_manual_registro","","");
  $("#div_btn_seleccion_manual_registro").html(div_show);
  select_manual = f_select_modulo_nombre();
  $("#man_modulo_nombre").html(select_manual);
  select_manual = f_select_combo("glo_manual", "NO", "man_titulo", "", "`man_modulo_id`='"+man_modulo_id+"'" );
  $("#man_titulo").html(select_manual);

  $(document).on('change', '.man_modulo_nombre, .man_titulo', function() {
    manual_id = '';
    man_modulo_id = '';
    man_modulo_nombre = $("#man_modulo_nombre").val();
    man_titulo = $("#man_titulo").val();
    man_modulo_id = f_buscar_dato("glo_modulo", "modulo_id", "`mod_nombre_vista`='"+man_modulo_nombre+"'");
    if(man_modulo_id!=='' && man_titulo!==''){
      manual_id = f_buscar_dato("glo_manual", "manual_id", "`man_modulo_id`='"+man_modulo_id+"' AND `man_titulo`='"+man_titulo+"'");
    }
    $("#manual_id").val(manual_id);
    select_manual = f_select_modulo_nombre();
    $("#man_modulo_nombre").html(select_manual);
    select_manual = f_select_combo("glo_manual", "NO", "man_titulo", "", "`man_modulo_id`='"+man_modulo_id+"'" );
    $("#man_titulo").html(select_manual);
    $("#man_modulo_nombre").val(man_modulo_nombre);
    $("#man_titulo").val(man_titulo);
    $("#div_manual_html").empty();
    div_show = f_mostrar_div("form_seleccion_manual_registro","btn_seleccion_manual_registro","","");
    $("#div_btn_seleccion_manual_registro").html(div_show);  
  });

  ///:: INICIO BOTONES DE CHECK LIST REGISTRO :::::::::::::::::::::::::::::::::::::::::::::///
  
  ///:: EVENTO BOTON BUSCAR REGISTRO MANUAL DE USUARIO ::::::::;;;;;:::::::::::::::::::::::///
  $(document).on("click", ".btn_cargar_manual_registro", function(){
    man_html = '';
    manual_id = $("#manual_id").val();
    if( manual_id!=='' ){
      man_html = f_buscar_dato("glo_manual_html", "man_html", "`manual_id`='"+manual_id+"'");
      opcion_manual = "EDITAR";
      f_cargar_html(man_html);
    }else{
      Swal.fire({
        position            : 'center',
        icon                : 'error',
        title               : "Ingresar Capítulo y Sub Capítulo !!!",
        showConfirmButton   : false,
        timer               : 1500
      })
    }
  });
  ///:: FIN EVENTO BOTON BUSCAR REGISTRO MANUAL DE USUARIO :::::::::::::::::::::::::::///

  ///:: EVENTO BOTON GUARDAR REGISTRO MANUAL DE USUARIO ::::::::::::::::::::::::::::::///
  $(document).on("click", ".btn_guardar_manual_registro", function(){
    manual_id = $("#manual_id").val();
    man_html = tinymce.get("man_html").getContent();

    if(manual_id===""){
      Swal.fire({
        icon  : 'error',
        title : 'MANUAL DE USUARIO...',
        text  : 'Falta completar información !!!'
      })
    }else{
      $("#btn_guardar_manual_registro").prop("disabled",true); 
      if(opcion_manual=="EDITAR"){
        Accion = "editar_manual_registro";
      }
      $.ajax({
        url       : "ajax.php",
        type      : "POST",
        datatype  : "json",
        async     : false,
        data      :  { MoS:MoS, NombreMoS:NombreMoS, Accion:Accion, manual_id:manual_id, man_html:man_html },
        success   : function(data) {
          Swal.fire(
            'Guardado!',
            'El registro ha sido guardado.',
            'success'
          )            
        }
      });
      div_show = f_mostrar_div("form_seleccion_manual_registro","btn_seleccion_manual_registro","","");
      $("#div_btn_seleccion_manual_registro").html(div_show);
      $("#div_manual_html").empty();
      $("#man_modulo_id").focus().select();
      $("#btn_guardar_manual_registro").prop("disabled",false);
    }
  });
  ///:: FIN EVENTO BOTON GUARDAR REGISTRO MANUAL DE USUARIO :::::::::::::::::::::::::::::::///

  ///:: EVENTO BOTON CANCELAR REGISTRO MANUAL DE USUARIO ::::::::::::::::::::::::::::::::::///
  $(document).on("click", ".btn_cancelar_manual_registro", function(){
    div_show = f_mostrar_div("form_seleccion_manual_registro","btn_seleccion_manual_registro","","");
    $("#div_btn_seleccion_manual_registro").html(div_show);
    $("#div_manual_html").empty();
    $("#man_modulo_id").focus().select();
  });
  ///:: FIN EVENTO BOTON CANCELAR REGISTRO MANUAL DE USUARIO ::::::::::::::::::::::::::::::///

  ///:: EVENTO BOTON LOG REGISTRO MANUAL DE USUARIO :::::::::::::::::::::::::::::::::::::::///
  $(document).on("click", ".btn_log_manual_registro", function(){
    $("#form_modal_log_manual").trigger("reset");
    manual_id = $("#manual_id").val();
    man_log = f_buscar_dato("glo_manual","man_log","`manual_id` = '"+manual_id+"'");
    $("#div_log_manual").html(man_log);
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Log");
    $('#modal_crud_log_manual').modal('show');
  });
  ///:: FIN EVENTO BOTON LOG REGISTRO MANUAL DE USUARIO :::::::::::::::::::::::::::::::::::///

  ///:: EVENTO BOTON VER REGISTRO MANUAL DE USUARIO :::::::::::::::::::::::::::::::::::::::///
  $(document).on("click", ".btn_ver_manual_registro", function(){
  });
  ///:: FIN EVENTO BOTON VER REGISTRO MANUAL DE USUARIO :::::::::::::::::::::::::::::::::::///

  ///:: TERMINO BOTONES DE CHECK LIST REGISTRO ::::::::::::::::::::::::::::::::::::::::::::///
});
///:: FUNCIONES REGISTRO MANUAL DE USUARIO ::::::::::::::::::::::::::::::::::::::::::::::::///

function f_cargar_html(p_man_html){

  div_show = f_mostrar_div("form_manual_html","div_manual_html",p_man_html,"");
  $("#div_manual_html").html(div_show);

  tinymce.init({
    selector: 'textarea#man_html',
    //plugins: 'image code',
    //toolbar: 'undo redo | link image | code',
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss code',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat | code',
    
    /* enable title field in the Image dialog*/
    image_title: true,
    /* enable automatic uploads of images represented by blob or data URIs*/
    automatic_uploads: true,
    /*
      URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
      images_upload_url: 'postAcceptor.php',
      here we add custom filepicker only to Image dialog
    */
    file_picker_types: 'image',
    /* and here's our custom image picker*/
    file_picker_callback: (cb, value, meta) => {
      const input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
  
      input.addEventListener('change', (e) => {
        const file = e.target.files[0];
  
        const reader = new FileReader();
        reader.addEventListener('load', () => {
          /*
            Note: Now we need to register the blob in TinyMCEs image blob
            registry. In the next release this part hopefully won't be
            necessary, as we are looking to handle it internally.
          */
          const id = 'blobid' + (new Date()).getTime();
          const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
          const base64 = reader.result.split(',')[1];
          const blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);
  
          /* call the callback and populate the Title field with the file name */
          cb(blobInfo.blobUri(), { title: file.name });
        });
        reader.readAsDataURL(file);
      });
  
      input.click();
    },
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
  }); 

  div_show = f_mostrar_div("form_seleccion_manual_registro","btn_seleccion_manual_registro","guardar","");
  $("#div_btn_seleccion_manual_registro").html(div_show);
}

function f_select_modulo_nombre(){
  let rpta_select = '';
  Accion = 'select_modulo_nombre';
  $.ajax({
    url       : "ajax.php",
    type      : "POST",
    datatype  : "json",
    async     : false,
    data      : {MoS:MoS, NombreMoS:NombreMoS, Accion:Accion},
    success   : function(data){
      rpta_select = data;
    }
  });
  return rpta_select;
}

///:: TERMINO FUNCIONES REGISTRO MANUAL DE USUARIO ::::::::::::::::::::::::::::::::::::::::///