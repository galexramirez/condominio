<?php
class opciones_sidebar
    {
        function OpcionSimple($mod_nombre,$mod_nombre_vista,$mod_icono,$nombre_de_modulo)
        {
          $Activo="";
          if($mod_nombre==$nombre_de_modulo){
            $Activo='Id=Activo';
          }

        $html="   
          <li $Activo>
            <a href='$mod_nombre' class='nav-link ml-2'>
              $mod_icono
              $mod_nombre_vista
            </a>
          </li>
        ";
        return $html;       
        }   


        function OpcionMultiple($mod_nombre, $mod_nombre_vista, $mod_icono, $mod_plegable, $menu_plegable, $ultimo_registro, $nombre_de_modulo, $nombre_plegable)
        {
          $activo   = "";
          $expanded = "false";
          $collapse = "collapse";
      
          if($mod_nombre == $nombre_de_modulo){
            $activo = 'Id=activo';
          }
      
          if($mod_plegable == $nombre_plegable){
            $expanded = 'true';
            $collapse = "collapse show";
          }
      
          switch ($menu_plegable)
          {
            case "inicio":
              $html = " <li class='mb-1'>
                          <button class='btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed' data-toggle='collapse' data-target='#$mod_nombre_vista' aria-expanded='$expanded'>
                            $mod_icono &nbsp
                            $mod_nombre_vista
                          </button>
                          <div class='$collapse' id='$mod_nombre_vista'> 
                            <ul class='btn-toggle-nav list-unstyled fw-normal pb-1 small'>  
                      ";
            break;
            case "nuevo":
              $html = "     </ul>
                          </div>
                        </li> ";
              if($mod_nombre=="Plegable Ajustes"){
                $html .= "<li><hr class='dropdown-divider'></li>";
              }
              $html .=" <li class='mb-1'>
                          <button class='btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed' data-toggle='collapse' data-target='#$mod_nombre_vista' aria-expanded='$expanded'>
                            $mod_icono &nbsp
                            $mod_nombre_vista
                          </button>
                          <div class='$collapse' id='$mod_nombre_vista'> 
                            <ul class='btn-toggle-nav list-unstyled fw-normal pb-1 small'>  
                      ";
            break;
            case "submenu":
              $html = "       <li $activo>
                                <a class='nav-link ml-2' href='$mod_nombre'>
                                  $mod_icono &nbsp  
                                  $mod_nombre_vista
                                </a>
                              </li>
                      ";
            break;
          }
          if($ultimo_registro=="ultimo"){
            $html .= "       </ul>
                          </div>
                        </li> ";
          }
          return $html;       
        }    
          
       
}