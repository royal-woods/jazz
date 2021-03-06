<?php
include_once '../model/Genre.php';
include_once '../model/GenreBO.php';

# Get JSON as a string
$json_str = file_get_contents('php://input');
# Get as an object
$json_obj = json_decode($json_str);


$genre = $json_obj->genre;
$idGenre ="";
$GenreLogic = new GenreBO();
$GenreData = Genre::constructNewGenre($idGenre, $genre);
try{
  $GenreLogic->CreateGenre($GenreData);
  print true;
}
catch(Exception $e){
  header('HTTP/1.1 420 Method Failure');
  header('Content-Type: application/json; charset=UTF-8');
  die(json_encode (array('error'=>'Error al crear un nuevo genero')));
}

?>