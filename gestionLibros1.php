<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gestionLibros1
 *
 * @author Javier
 */
class gestionLibros1 {
    //put your code here


/**
 * conexion a la BD Libros, recupera los datos en un objeto. Dará un error null
 * en caso de que se produzca un error.
 */

public function conexion($servidor, $usuario, $contrasena, $bd)
    {
        @$mysqli = new mysqli("localhost", "javimdaw", "1234", "Libros");
        if ($mysqli->connect_errno)
        {
            return null;
        }
    else
        {
        $mysqli->set_charset("utf8");
        return $mysqli;
        }
    }




/**
 * Consulta por Autor, hace un bucle y nos devuelve los datos en un array con 
 * todos las filas del resultado en un array asociativo
 * @param type $mysqli BD a la que pedimos información.
 * @param type $id Id del Autor sobre el que pedimos información.
 * @return type El resultado será un Array Asociativo de todas las filas que 
 * devuelve.
 */
    public function consultarAutor($mysqli, $id)
    {
        $conn = $mysqli->conexion();
        $sql = "SELECT * FROM Autor WHERE id='$id'";

        $resultset = $mysqli->query($sql);
    if ($resultset->num_rows > 0 && !$mysqli->error)
        {
            $resultado = $resultset->fetch_all(MYSQLI_ASSOC);

            return $resultado;
        }
            else
        {
            return null;
        }
        $conn->close();
    }



/**
 * Consulta para que devuelva todos los libros del id del autor solicitado.
 * @param type $mysqli BD a la que pedimos información.
 * @param type $id Id del Autor del que pedimos los libros.
 * @return type El resultado será un Array Asociativo de todas las filas que 
 * devuelve.
 */
    public function consultarLibros($mysqli, $id)
    {
        $conn = $mysqli->conexion();
        $sql = "SELECT * FROM Libro where id_autor='$id'";

        $resultset = $mysqli->query($sql);
    if ($resultset->num_rows > 0 && !$mysqli->error)
        {
        $resultado = $resultset->fetch_all(MYSQLI_ASSOC);
        return $resultado;
        }
            else
        {
            return null;
        }
                $conn->close();
    }
    


/**
 * Consulta para que devuelva todos los datos del id del libro solicitado.
 * @param type $mysqli BD a la que pedimos los datos del libro.
 * @param type $id Ide del libro del que pedimos todos los datos.
 * @return type Devuelve como resultado un Array Asociativo de todas las filas 
 * aunque en esta ocasión sólo dará una fila puesto que se pide los datos de un
 * único libro. Lo normal sería utilizar aquí un fetch_assoc. 
 */
    public function consultaDatosLibro($mysqli, $id)
    {
        $conn = $mysqli->conexion();
        $sql = "SELECT * FROM Libro where id='$id'";

        $resultset = $mysqli->query($sql);
    if ($resultset->num_rows > 0 && !$mysqli->error)
        {
        $resultado = $resultset->fetch_all(MYSQLI_ASSOC);
        return $resultado;
        }
            else
        {
            return null;
        }
    }

  
}


/**
 * Función para borrar los datos de un Autor y sus libros dados por parámetro
 * @param type $mysqli BD a la que pedimos los datos del libro.
 * @param type $id Id del autor del que pedimos borrar todos los datos.
 * @return type Devuelve nada o null
 */
    public function BorrarAutor($mysqli, $id)
    {
       
        @$mysqli = new mysqli("localhost", "javimdaw", "1234", "Libros");
        if ($mysqli->connect_errno)
{
	return null;
}
else
{
	mysqli->set_charset("utf8");
        return $mysqli;
        
}
    

    /* Deshabilitar autocommit */
$mysqli->autocommit(FALSE);
$mysqli->begin_transaction();
$error = "";
$all_query_ok =  $sql = "DELETE FROM Libro WHERE id === ($id)"
 &&  $sql = "DELETE FROM Autor WHERE id === ($id);"


/* Comprobamos si las operaciones han salido bien o mal para confirmar o revertir la
transacción */
if ($all_query_ok)
{
 echo "OK, commit";
 $mysqli->commit();
}
else
{
 echo "Error, rollback" . $error;
 $mysqli->rollback();
}

/* Activar nuevamente autocommit */
$mysqli->autocommit(TRUE);
$mysqli->close();
    }
    
    

/**
 * Función para borrar los datos de un libro dado el id por parámetro
 * @param type $mysqli BD a la que pedimos los datos del libro.
 * @param type $id Id del libro del que pedimos borrar todos los datos.
 * @return type Devuelve nada o null
 */
    public function BorrarLibro($mysqli, $id)
    {
       
        @$mysqli = new mysqli("localhost", "javimdaw", "1234", "Libros");
        if ($mysqli->connect_errno)
{
	return null;
}
else
{
	mysqli->set_charset("utf8");
        return $mysqli;
	}
	        
        $mysqli->query (
                $sql = "DELETE FROM Libro WHERE id === ($id);";
          )
        
        $resultset = $mysqli->query($sql);
    if ($resultset->num_rows > 0 && !$mysqli->error)
        {
        $resultado = $resultset->fetch_all(MYSQLI_ASSOC);
        return $resultado;
        }
            else
        {
            return null;
        }
        $mysqli->close ()
    }

    
    
    
}
?>