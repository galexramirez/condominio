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


        function OpcionMultiple()  /// por trabajar, aun no definido
        {
        
        $html="    
            <!-- Opcion dos niveles -->
            <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                     &nbsp;
                     <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-cloud-upload-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                        <path fill-rule='evenodd' d='M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z'/>
                  </svg>		
                    &nbsp;Carga Programacion
              </a>
              <div class='dropdown-menu position-static bg-light'>
                  <a class='dropdown-item  text-muted' href='ProgramacionCarga' >
                      <svg width='1.0625em' height='1em' viewBox='0 0 17 16' class='bi bi-exclamation-triangle' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' d='M7.938 2.016a.146.146 0 0 0-.054.057L1.027 13.74a.176.176 0 0 0-.002.183c.016.03.037.05.054.06.015.01.034.017.066.017h13.713a.12.12 0 0 0 .066-.017.163.163 0 0 0 .055-.06.176.176 0 0 0-.003-.183L8.12 2.073a.146.146 0 0 0-.054-.057A.13.13 0 0 0 8.002 2a.13.13 0 0 0-.064.016zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z'/>
                            <path d='M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z'/>
                      </svg>
                        Programación
                    </a>
                     <a class='dropdown-item text-muted' href='#'>
                      <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-dash-circle' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                        <path fill-rule='evenodd' d='M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                        <path fill-rule='evenodd' d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z'/>
                      </svg>
                      &nbsp;Ausentismo
                  </a>
                  <a class='dropdown-item text-muted' href='CargaAusentismo'>
                      <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-emoji-sunglasses' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' d='M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                            <path fill-rule='evenodd' d='M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM6.5 6.497V6.5h-1c0-.568.447-.947.862-1.154C6.807 5.123 7.387 5 8 5s1.193.123 1.638.346c.415.207.862.586.862 1.154h-1v-.003l-.003-.01a.213.213 0 0 0-.036-.053.86.86 0 0 0-.27-.194C8.91 6.1 8.49 6 8 6c-.491 0-.912.1-1.19.24a.86.86 0 0 0-.271.194.213.213 0 0 0-.036.054l-.003.01z'/>
                            <path d='M2.31 5.243A1 1 0 0 1 3.28 4H6a1 1 0 0 1 1 1v1a2 2 0 0 1-2 2h-.438a2 2 0 0 1-1.94-1.515L2.31 5.243zM9 5a1 1 0 0 1 1-1h2.72a1 1 0 0 1 .97 1.243l-.311 1.242A2 2 0 0 1 11.439 8H11a2 2 0 0 1-2-2V5z'/>
                      </svg>
                        &nbsp;Comportamiento
                  </a>
                  <a class='dropdown-item text-muted' href='#'>
                        <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-camera-reels' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                        <path fill-rule='evenodd' d='M0 8a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8zm11.5 5.175l3.5 1.556V7.269l-3.5 1.556v4.35zM2 7a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2z'/>
                        <path fill-rule='evenodd' d='M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'/>
                        <path fill-rule='evenodd' d='M9 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'/>
                      </svg>
                        &nbsp;Punto Fijo
                  </a>
                  <a class='dropdown-item text-muted' href='#'>
                        <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-person-check' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                          <path fill-rule='evenodd' d='M8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10zm4.854-7.85a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z'/>
                      </svg>
                        &nbsp;Acompañamiento
                    </a>
          
                 </div>
            </li>
            ";   
            
            return $html;       
        }    
       
}