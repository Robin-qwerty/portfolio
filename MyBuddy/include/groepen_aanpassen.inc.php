<?php
  include'private/connections.php';

  $sql = "SELECT * FROM groepen WHERE groep_id = :groep_id";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':groep_id', $_SESSION['groepsid']);
  $sth->execute();

  if ($row = $sth->fetch(PDO::FETCH_OBJ)) {
    echo '
      <form action="php/groepen_aanpassen.php" method="POST">
        <div class="groepen">
          <h1 style="text-align: center;">groep aanpassen</h1>
          <p style="text-align: center;">pas je groep aan</p>
          <hr>';
          include 'php/error.php';
          echo '
          <label for="psw-repeat"><b>naam</b></label>
            <p>
          <input type="text" placeholder="naam" name="naam" id="naam" value="'.$row->naam.'" required>
            <p>
          <label for="email"><b>beschrijving</b></label>
            <p>
          <input type="text" placeholder="beschrijving" name="beschrijving" id="beschrijving" value="'.$row->beschrijving.'" required>
            <p>
          <hr>
          <button type="submit" class="registerbtn">groep aanpassen</button>
        </div>
      </form>
    ';
  }
?>
