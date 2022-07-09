<?php
  if ($_SESSION['boek'] == '') {
    header("location: ../include/error.inc.php");
  } else {

    include'private/connections.php';

    $sql = "SELECT * FROM TBBoeken WHERE id = :id";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':id', $_SESSION['boek']);
    $sth->execute();

    while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
      echo '
        <form action="php/boekaanpassen.php" method="POST">
          <div class="container">
            <h1>boek aanpassen</h1>
            <p>pass een boek aan</p>
            <hr>

            <label for="psw-repeat"><b>titel</b></label>
            <input type="text" placeholder="titel" name="titel" id="titel" value="'.$row->titel.'" required>

            <label for="psw-repeat"><b>schrijfer</b></label>
            <input type="text" placeholder="schrijfer" name="schrijfer" id="schrijfer" value="'.$row->schrijfer.'" required>

            <label for="psw-repeat"><b>genre</b></label>
            <input type="text" placeholder="genre" name="genre" id="genre" value="'.$row->genre.'" required>

            <label for="psw-repeat"><b>ISBNnummer</b></label>
            <input type="text" placeholder="ISBNnummer" name="ISBNnummer" id="ISBNnummer" value="'.$row->ISBNnummer.'" required>

            <label for="psw-repeat"><b>taal</b></label>
            <input type="text" placeholder="taal" name="taal" id="taal" value="'.$row->taal.'" required>

            <label for="psw-repeat"><b>aantalpaginas</b></label>
            <input type="text" placeholder="aantalpaginas" name="aantalpaginas" id="aantalpaginas" value="'.$row->aantalpaginas.'" required>

            <label for="psw-repeat"><b>voorraad</b></label>
            <input type="text" placeholder="voorraad" name="voorraad" id="voorraad" value="'.$row->voorraad.'" required>

            <label for="psw-repeat"><b>afbeelding</b></label>
            <input type="text" placeholder="afbeelding" name="afbeelding" id="afbeelding" value="'.$row->afbeelding.'" required>

            <label for="email"><b>achterzijdeboek</b></label>
            <input type="text" placeholder="achterzijdeboek" name="achterzijdeboek" id="achterzijdeboek" value="'.$row->achterzijdeboek.'" rows="12" cols="50" required>

            <hr>

            <button type="submit" class="registerbtn">boek aanpassen</button>
          </div>
        </form>
    ';
  }
}
?>
