<?php

include'../private/connections.php';

try {
  $sql = "INSERT INTO TBBoeken (titel, schrijfer, genre, ISBNnummer, taal, aantalpaginas, voorraad, afbeelding, achterzijdeboek)
  VALUES (:titel, :schrijfer, :genre, :ISBNnummer, :taal, :aantalpaginas, :voorraad, :afbeelding, :achterzijdeboek)";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':titel', $_POST['titel']);
  $sth->bindParam(':schrijfer', $_POST['schrijfer']);
  $sth->bindParam(':genre', $_POST['genre']);
  $sth->bindParam(':ISBNnummer', $_POST['ISBNnummer']);
  $sth->bindParam(':taal', $_POST['taal']);
  $sth->bindParam(':aantalpaginas', $_POST['aantalpaginas']);
  $sth->bindParam(':voorraad', $_POST['voorraad']);
  $sth->bindParam(':afbeelding', $_POST['afbeelding']);
  $sth->bindParam(':achterzijdeboek', $_POST['achterzijdeboek']);
  $sth->execute();
  
  header('location: ../index.php?page=admin');
} catch (\Exception $e) {
  header('location: ../include/error.inc.php');
}

?>
