<?php
/**
 * Esta aplicación crea tablas, campos y datos en los campos requeridos en la 
 * Tarea 6 de DWES de 2º DAW del Instituto FOC
 * @author Francisco Javier Martínez Rodríguez 44257244T<javimdaw@gmail.com>
 * @version 1.0.0
 * @copyright (c) 2021, javimdaw
 * Se realiza la conexión a mysquli con el usuario javimdaw y contraseña
 * 1234 que ya se han creado en phpmyadmin y a la base de datos "Libros"
 */
    $mysqli = new mysqli ("localhost", "javimdaw", "1234");
   
 /**
  * Realiza la gestión de errores en la conexión
  */
    if (!$mysqli->connect_error)
    {
/**
  * Establecemos el charset en utf8
  */
        $mysqli->set_charset ("utf8");
       
/**
 * Se selecciona la base de datos
 */
        $mysqli->select_db("Libros");
  /**
  * Crea la tabla Autor con los campos id, nombre, apellidos y nacionalidad
  */
    $sql="
        CREATE TABLE IF NOT EXISTS Autor (
        id INTEGER NOT NULL AUTO_INCREMENT,
        nombre VARCHAR (15),
        apellidos VARCHAR (25),
        nacionalidad VARCHAR (10),
        PRIMARY KEY (id)
        )";
 /**
  * Si se crea la tabla lanza un mensaje de confirmación y se insertan los datos
  * requeridos en la Tarea
  */
    if ($mysqli->query($sql) === TRUE)
    {
        echo "Tabla Autor creada";
        
        //Se insertan datos requeridos
        $sql1 = "INSERT INTO Autor (nombre, apellidos, nacionalidad) VALUES ('J.R.R.', 'Tolkien', 'Inglaterra')";
        $sql2 = "INSERT INTO Autor (nombre, apellidos, nacionalidad) VALUES ('Isaac', 'Asimov', 'Rusia')";
    
    if ($mysqli->query($sql1) && $mysqli->query($sql2))
    {
        echo "Inserción realizada con éxito";
    }
    else echo "Error insertando datos";
    }
     
   else echo "Error creando tabla Autor";
   
/**
  * Se crea la Tabla Libro con los campos id, titulo, f_publicacion e id_autor
  * Despues se insertan los datos requeridos en la Tarea
  */
   $sqllibro="
       CREATE TABLE IF NOT EXISTS Libro (
       id INTEGER NOT NULL AUTO_INCREMENT,
       titulo VARCHAR (50),
       f_publicacion VARCHAR (10),
       id_autor INTEGER (2) REFERENCES Autor(id),
       CONSTRAINT Libro_pk PRIMARY KEY(id)
       )";
   /**
  * Si se crea la tabla lanza un mensaje de confirmación y se insertan los datos
  * requeridos en la Tarea
  */
    if ($mysqli->query($sqllibro) === TRUE)
    {
        echo "Tabla Libro creada";
        
        //Se insertan datos requeridos
        $sqllibro1 = "INSERT INTO Libro (titulo, f_publicacion, id_autor) VALUES ('El Hobbit', '21/09/1937', 0)";
        $sqllibro2 = "INSERT INTO Libro (titulo, f_publicacion, id_autor) VALUES ('La Comunidad del Anillo', '29/07/1954', 0)";
        $sqllibro3 = "INSERT INTO Libro (titulo, f_publicacion, id_autor) VALUES ('Las Dos Torres', '11/11/1954', 0)";
        $sqllibro4 = "INSERT INTO Libro (titulo, f_publicacion, id_autor) VALUES ('El Retorno del Rey', '20/10/1955', 0)";
        $sqllibro5 = "INSERT INTO Libro (titulo, f_publicacion, id_autor) VALUES ('Un guijarro en el cielo', '19/01/1951', 1)";
        $sqllibro6 = "INSERT INTO Libro (titulo, f_publicacion, id_autor) VALUES ('Fundación', '1/06/1951', 1)";
        $sqllibro7 = "INSERT INTO Libro (titulo, f_publicacion, id_autor) VALUES ('Yo, robot', '02/12/1950', 1)";
        
    if ($mysqli->query($sqllibro1) && $mysqli->query($sqllibro2)&& $mysqli->query($sqllibro3)&& $mysqli->query($sqllibro4)
            && $mysqli->query($sqllibro5)&& $mysqli->query($sqllibro6) && $mysqli->query($sqllibro7))
    {
        echo "Inserción realizada con éxito";
    }
    else echo "Error insertando datos";
    }
     
   else echo "Error creando tabla Libro";
  }   

else echo "Error de conexión a BD: " . $mysqli->connect_error;

$mysqli->close();

?>