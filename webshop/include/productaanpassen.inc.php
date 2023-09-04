<?php
  include'private/connections.php';

  $sql = "SELECT * FROM producten WHERE id = :id";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':id', $_SESSION['product']);
  $sth->execute();

  while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
    echo '
      <form action="php/productaanpassen.php" method="POST">
        <div class="container">
          <h1>product aanpassen</h1>
          <p>pas een product aan</p>
          <hr>';
          include 'php/error.php';
          echo '
          <label for="psw-repeat"><b>name</b></label>
          <input type="text" placeholder="name" name="name" id="name" value="'.$row->name.'" required>

          <label for="email"><b>prijs</b></label>
          <input type="number" placeholder="prijs" name="prijs" id="prijs" value="'.$row->prijs.'" min="0" required>

          <label for="email"><b>voorraad</b></label>
          <input type="number" placeholder="voorraad" name="voorraad" id="voorraad" value="'.$row->voorraad.'" min="0" required>

          <label for="email"><b>beschrijving</b></label>
          <input type="text" placeholder="beschrijving" name="beschrijving" id="beschrijving" value="'.$row->beschrijving.'" required>';
        }
      $sql = 'SELECT name FROM catagorie';
      $sth = $conn->prepare($sql);
      $sth->execute();
      echo'
      <label for="catagire"><b>kies een catagorie</b></label>
      <select name="catagorie" >';
      while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        echo '<option type="dropdown" placeholder="catagorie" value="'.$row['name'].'">'.$row['name'].'</option>';
      }

      echo '
      </select>
      <hr>
      <button type="submit" class="registerbtn">product aanpassen</button>
    </div>
  </form>';
?>
