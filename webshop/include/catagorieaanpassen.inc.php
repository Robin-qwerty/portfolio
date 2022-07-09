<?php
  include'private/connections.php';

  $sql = "SELECT * FROM catagorie WHERE id = :id";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':id', $_SESSION['catagorie']);
  $sth->execute();

  while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
    echo '
      <form action="php/catagorieaanpassen.php" method="POST">
        <div class="container">
          <h1>catagorie aanpassen</h1>
          <p>pass een catagorie aan</p>
          <hr>';
          include 'php/error.php';
          echo '
          <label for="psw-repeat"><b>titel</b></label>
          <input type="text" placeholder="name" name="name" id="name" value="'.$row->name.'" required>

          <label for="email"><b>beschrijving</b></label>
          <input type="text" placeholder="beschrijving" name="beschrijving" id="beschrijving" value="'.$row->beschrijving.'" required>

          <hr>

          <button type="submit" class="registerbtn">catagorie aanpassen</button>
        </div>
      </form>';
  }
//}
?>
