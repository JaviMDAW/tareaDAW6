<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>


<html>
    <head>
        <title>Consulta de Autor y sus libros</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
       <br/>
       <br/>
          <h1>Muestra los datos del Autor y de sus libros</h1>
        
        <div>Muestra los datos del Autor y de sus libros</div>
        
        <table>
            <thead>
                <tr><th colspan="3">Listado del Autor</th></tr>
                <tr><th>Nombre</th><th>Apellidos</th><th>Nacionalidad</th></tr>
            </thead>
            
<?php

    @$mysqli = new mysqli("localhost", "javimdaw", "1234", "Libros");
    if ($mysqli->connect_errno)
   {
        echo "Error de conexión: " . $mysqli->connect_error;
        die ("Pruebe de nuevo mas tarde");
   }
    else
   {
        //trabajar con conexión
        if (!$mysqli->set_charset ("utf8"))
        {
            echo "Error cargando urf8" . $mysqli->error;
        }
        else
            printf ("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
   }
   
    $query = "SELECT DISTINCT nombre, apellidos, nacionalidad FROM Autor";
           
            
    $result = $mysqli->query($query);
    
    //recorremos los datos
    
    $salida = '';
    while ($row = $result->fetch_object())
    {
      //imprimimos el nombre, apellidos y nacionalidad del autor y los datos de los libros de ese autor
        
    $salida .= '<tr>><td>' . $row->nombre . '</td><td>' . $row->apellidos . '</td><td>' . $row->nacionalidad . '</td><tr>';
        
     @$mysqli = new mysqli("localhost", "javimdaw", "1234", "Libros");
    if ($mysqli->connect_errno)
   {
        echo "Error de conexión: " . $mysqli->connect_error;
        die ("Pruebe de nuevo mas tarde");
   }
     $query = "SELECT titulo, f_publicacion FROM Libro";
           
            
    $result = $mysqli->query($query);
    
    $salida = '';
    while ($row = $result->fetch_object())
        {
    
     $salida .= '<tr>><td>' . $row->titulo . '</td><td>' . $row->f_publicacion . '</td><tr>';
    
        
        };
    }   
    echo $salida;
        
    //liberar la serie de resultados
        
    $result->free();
    
    //cerrar la conexión.
    
    $mysqli->close();
   
   
   ?>
        
        </table>
               
              
        
            
    </body>
</html>
