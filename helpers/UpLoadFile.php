<?php

class UpLoadFile
{
  public function __construct(){

  }

  public function guardarImagen ($archivo,$nombre)
  {
      if(!isset($_SESSION ['mensaje'] )){
          $_SESSION["mensaje"];
          $_SESSION ['mensaje']['mensaje'];
          $_SESSION ['mensaje']['class'];
      }
      $target_dir = "public/";
      $target_file = $target_dir . basename($nombre);
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image

          $check = getimagesize($archivo["tmp_name"]);
          if ($check === false) {
             $_SESSION ['mensaje']['mensaje'] .= "El archivo $nombre no es una imagen ";
             $_SESSION ['mensaje']['class'] .= "w3-pale-red";
            return false;
          }
          // Check if file already exists

      if (file_exists($target_file)) {
          $_SESSION ['mensaje']['mensaje'] .= "El archivo $nombre ya existe ";
          $_SESSION ['mensaje']['class'] .= "w3-pale-red";
          return false;
      }

        // Check file size
      if ($archivo["size"] > 500000) {
          $_SESSION ['mensaje']['mensaje'] .= "El archivo $nombre es demasiado grande";
          $_SESSION ['mensaje']['class'] .= "w3-pale-red";
          return false;
      }

// Allow certain file formats
      if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif") {

          $_SESSION ['mensaje']['mensaje'] .= "El archivo $nombre no tiene una extension valida";
          $_SESSION ['mensaje']['class'] .= "w3-pale-red";
          return false;
      }


// if everything is ok, try to upload file

          if (move_uploaded_file($archivo["tmp_name"], $target_file)) {
              return true;
          } else {
              $_SESSION ['mensaje']['mensaje'] .= "El archivo no se pudo cargar";
              $_SESSION ['mensaje']['class'] .= "w3-pale-red";
              return false;
          }

  }
}